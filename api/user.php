<?php

	// config settings
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	
	// file imports
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once($root . "/config.php");
	require_once('request.php');

	// URL fragments
	$uid 	= $_REQUEST['uid'];
	$token 	= $_REQUEST['token'];
	$action = isset($_REQUEST['action']) && validToken($uid, $token) ? $_REQUEST['action'] : "";

	// parsing based on action fragment
	switch ($action) {
		case 'addUser':
			addUser($uid, $token);
		break;
		case 'addFriends':
			// only for testing purposes
			addFriends($uid,$token);
		break;
		case 'addFriend':
			addFriend($uid,$token);
		break;
		case 'getFriends':
			getFriends($uid, $token);
		break;
		case 'getFeed':
			getFeed($uid);
		break;
		case 'getStream':
			getStream($uid);
		break;
		case 'blockUser':
			blockUser($uid);
		case 'search':
			search($uid);
		break;
		case 'getVotes':
			getVotes($uid);
		break;
	}

	function getVotes($uid){
		// retrieve all likes associated specific user
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$sql = "SELECT PID,Vote FROM Liked WHERE UID = '$uid'";
		$st = $conn->prepare($sql);
		$st->execute();
		
		// modify results (include comments below main posts)
		$data = $st->fetchAll(PDO::FETCH_ASSOC);
		$data = array("status" => "200 Success", "data" => $data);
		$conn = null;

		// push results
		pushResponse($data); 
	}
	// implemented search functionality API (grabs all relevant names)
	function search($uid) {
		$keyword = $_GET['keyword'];
		$output = [];

		$command = "python search.py '$keyword' '$uid'";
		$temp = exec($command ,$output);

		$data = [];
		foreach($output as $row){
			$temp = explode("||", $row);
			$result = array('Name' => $temp[0], 'UID' => $temp[1]);
			array_push($data, $result );
		}
		$data = array("status" => "200 Success", "data" => $data);
		pushResponse($data);
	}

	// enable a blocked status on a friendship
	function blockUser($uid) {

		// push response
		$response_array['status'] = "200 Request Queued";
		pushResponse($response_array);
		
		$user = $_POST['user'];
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$sql = "UPDATE Friends SET Blocked=1 WHERE `UID` = '$user' AND `Friend` = '$uid' ;";
		
		$st = $conn->prepare($sql);
		$st->execute();
	}
	function getStream($uid){
		$user = $_GET['user'];

		// retrieve overall feed information associated specific user
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$sql = "SELECT PID,Content,Author as Author_Name, UID as Author_UID, Timestamp FROM (SELECT PID,Content,Author,Timestamp FROM Posts WHERE PID IN (SELECT PID FROM Tagged WHERE UID='$user')) A JOIN (SELECT Name, UID FROM Users)B ON A.Author= B.UID";
		$st = $conn->prepare($sql);
		$st->execute();
		
		// modify results (include comments below main posts)
		$data = $st->fetchAll(PDO::FETCH_ASSOC); 
		$data = groupByKey($data);
		foreach($data as &$post){
			$pid = $post['PID'];
			$timestamp = $post['Timestamp'];
			$sql = "SELECT Name,UID FROM Users WHERE UID IN (SELECT UID FROM Tagged WHERE PID='$pid' )";
			$st = $conn->prepare($sql);
			$st->execute();
			
			// modify results (include comments below main posts)
			$tagged= $st->fetchAll(PDO::FETCH_ASSOC); 
			$post['tagged'] = $tagged;


			$sql = "SELECT SUM(Vote) as Total, Sum( Case When Vote< 0 Then 1 Else 0 End ) As Disagree , Sum( Case When Vote > 0 Then 1 Else 0 End ) As Agree FROM Liked GROUP BY PID,Timestamp HAVING Timestamp = '$timestamp' AND pid = '$pid';";
			$st = $conn->prepare($sql);
			$st->execute();
			
			// modify results (include comments below main posts)
			$votes= $st->fetch(); 
			$post['Agree'] = $votes['Agree'];
			$post['Disagree'] = $votes['Disagree'];
			$post['Score'] = $votes['Total'];
		}
		$data = array("status" => "200 Success", "data" => $data);
		$conn = null;

		// push results
		pushResponse($data);
	}

	function getFeed($uid){

		// retrieve overall feed information associated with friends
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$offset = isset($_GET['offset']) ? $_GET['offset']:'0';
		$sql = "SELECT PID, Author as Author_UID, Content, Timestamp, Name as Author_Name FROM (SELECT A.PID,A.Author,Content,Timestamp FROM((SELECT * FROM Posts)A JOIN (SELECT DISTINCT PID FROM (SELECT PID,UID,Timestamp FROM Tagged ORDER BY Timestamp DESC)T1 JOIN (SELECT Friend FROM Friends WHERE UID='$uid')T2 ON T1.UID=T2.Friend LIMIT 10 OFFSET $offset)B ON A.PID=B.PID ) ORDER BY Timestamp DESC)X JOIN (SELECT UID, Name FROM Users)Y ON X.Author=Y.UID;";
		$st = $conn->prepare($sql);
		$st->execute();
		
		// modify results (include comments below main posts)
		$data = $st->fetchAll(PDO::FETCH_ASSOC); 
		
		$data = groupByKey($data);
		foreach($data as &$post){

			$pid = $post['PID'];
			$timestamp = $post['Timestamp'];

			$sql = "SELECT Name,UID FROM Users WHERE UID IN (SELECT UID FROM Tagged WHERE PID='$pid' )";
			$st = $conn->prepare($sql);
			$st->execute();
			
			// modify results (include comments below main posts)
			$tagged= $st->fetchAll(PDO::FETCH_ASSOC); 
			$post['tagged'] = $tagged;

			$sql = "SELECT SUM(Vote) as Total, Sum( Case When Vote < 0 Then 1 Else 0 End) As Disagree , Sum(Case When Vote > 0 Then 1 Else 0 End) As Agree FROM Liked GROUP BY PID,Timestamp HAVING Timestamp = '$timestamp' AND pid = '$pid';";
			$st = $conn->prepare($sql);
			$st->execute();
			
			// modify results (include comments below main posts)
			$votes= $st->fetch(); 
			$post['Agree'] = $votes['Agree'];
			$post['Disagree'] = $votes['Disagree'];
			$post['Score'] = $votes['Total'];
		}
		$data = array("status" => "200 Success", "data" => $data);
		$conn = null;

		// push results
		pushResponse($data);
	}

	function groupByKey($array) {

		// group elements under same PID (original post & comments)
	    $return = array();

	    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

	    foreach($array as &$post) {
	    	// formatted time
	    	$timestamp = $post['Timestamp'];

			$format = 'Y-m-d H:i:s';
			$post_date = DateTime::createFromFormat($format, $timestamp);

			// this formatted time is what needs to be altered as the years, months, and days change
			$post['formatted_time'] = date_format($post_date, 'F jS');

			// modify results (include comments below main posts)
	        
	        if(isset($return[$post['PID']])) {
	        	array_push($return[$post['PID']], $post);
	        }

	        else{
	        	$return[$post['PID']] = array($post);
	        }
	    }

	    $conn = null; 
	    
	    // put comments under main post
	    $result = array();
	    foreach($return as $thread) {
	    	
	    	// compare posts by timestamp and put comments under oldest post (original)
	    	usort($thread, "cmp");
	    	$post = array_pop($thread);
	    	$post['Author_UID']="";
	    	$post['Author_Name']="";
	    	$post['Comments'] = $thread;
	    	foreach($post['Comments'] as &$comment){
	    		$comment['Comments'] = array();
	    	}
	    	
	    	array_push($result, $post);
	    }
	    return $result;
	}

	// comparing by timestamp
	function cmp($a, $b) {

		$a = strtotime($a['Timestamp']);
		$b = strtotime($b['Timestamp']);
	    
	    if ($a == $b) {
	        return 0;
	    }
	    
	    return ($a < $b) ? 1 : -1;
	}

	function matchUser($hash,$uid){
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

		$sql = "UPDATE Users SET UID='$uid' WHERE UID='$hash'";
		$st = $conn->prepare($sql);
		$st->execute();

		$sql = "UPDATE Friends SET Friend='$uid' WHERE Friend='$hash'";
		$st = $conn->prepare($sql);
		$st->execute();

		$sql = "UPDATE Tagged SET UID='$uid' WHERE UID='$hash'";
		$st = $conn->prepare($sql);
		$st->execute();

		$sql = "UPDATE Vibes SET UID='$uid' WHERE UID='$hash'";
		$st = $conn->prepare($sql);
		$st->execute();

		$sql = "UPDATE Notifications SET UID='$uid' WHERE UID='$hash'";
		$st = $conn->prepare($sql);
		$st->execute();

		$sql = "INSERT INTO Linked (`UID`, `Temp`)VALUES ('$uid', '$hash');"; 
		$st = $conn->prepare($sql);
		$st->execute();

		// this will cascade delete anything that is left over from previous update statements
		$sql = "DELETE FROM Users WHERE UID='$hash'"; 
		$st = $conn->prepare($sql);
		$st->execute();

		$conn =null;
	}

	// adds user & friends to user and friends databases
	function addUser($uid, $token){

		// parsing specific user info
		$name = $_POST['name'];
		$email = $_POST['email'];

		// match user to any vibe posts that may have come from referal hash
		if (isset( $_POST['ref'] ) ){
			matchUser($_POST['ref'], $uid);
		}
		// insert user into DB
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$name = $conn->quote($name);

		$sql = "INSERT INTO Users (`UID`, `Name`, `Notes`, `Email`)
		    		VALUES ('$uid', $name, 'Test', '$email')
		        		ON DUPLICATE KEY UPDATE `Notes` = 'Active' , `Name` = '$name';"; 
		
		$st = $conn->prepare($sql);
		$st->execute();
		
		// link email to limit future referals

		$hash_id = hash("sha256",$email);
		$sql = "INSERT INTO Linked (`UID`, `Temp`)
		    		VALUES ('$uid', '$hash_id');"; 
		
		$st = $conn->prepare($sql);
		$st->execute();

		$conn = null;

		// response OK
		$response_array['status'] = "200 Request Queued";
		pushResponse($response_array);

		// makes request to add user data
		$url = 'http://api.go-vibe.com/api/location.php?action=addUser';
	    $post_data = array('uid' => $uid, 'token' => $token);
	    post($url, $post_data);

	    //switches over to dealing with friends
		addFriends($uid, $token);
	}

	// add friends to DB
	function addFriends($uid, $token){
		
		// graph API request
		$api = "https://graph.facebook.com/v1.0/" . $uid;
		$api = $api . '/friends?access_token=' . $token;
		
		$friends = json_decode(file_get_contents($api), true);
		$friends = $friends['data'];
		
		// adding all relationships to DB
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		
		// adding to users & friends DBs
		$users_sql = "INSERT INTO Users (`UID`, `Name`, `Notes`) VALUES";
		$me_sql = "INSERT INTO Friends (`UID`,`Friend`) VALUES ('$uid','$uid');";
		$friends_sql = "INSERT INTO Friends (`UID`,`Friend`) VALUES";
		
		$me = '("' . $uid . '",';
		
		foreach($friends as $friend) {
			$id = $friend['id'];
			$friends_sql = $friends_sql . $me . "'$id'),";
			$users_sql = $users_sql . '("' . $friend['id'] . '",' . $conn->quote($friend['name']) . ',"Not Active"),';
		}

		$friends_sql = rtrim($friends_sql, ',');
		$users_sql = rtrim($users_sql, ',') . "ON DUPLICATE KEY UPDATE `Notes` = 'Friended';";
		
		// adding to DB
		$st = $conn->prepare($users_sql); $st->execute();
		$st = $conn->prepare($me_sql); $st->execute();
		$st = $conn->prepare($friends_sql); $st->execute();
		
		$conn = null;

		// request to add community data
		$url = 'http://api.go-vibe.com/api/location.php?action=addFriends';
	    $post_data = array('uid' => $uid, 'token' => $token);
	    post($url, $post_data);

	}

	// add individual friend
	function addFriend($uid, $token){
		
		// response OK.
		$response_array['status'] = "200 Request Queued";
		pushResponse($response_array);
		
		$user = $_POST['user'];

		// add friend to DB
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "INSERT INTO Friends (`UID`,`Friend`) VALUES ('$uid','$user');";
		
		$st = $conn->prepare( $sql );
		$st->execute();
		$conn = null;

	}

	// get friends' names & UID from DB
	function getFriends($uid, $token) {

		$blocked = isset( $_GET['blocked'] ) ? $_GET['blocked'] : "";
		
		if($blocked == 'no') {
			$sql = "SELECT `UID`,`Name` FROM Users WHERE `UID` IN (SELECT `Friend` FROM Friends WHERE `UID`='$uid' AND `Blocked`=0)";
		}
		else {
			$sql = "SELECT `UID`,`Name` FROM Users WHERE `UID` IN (SELECT `Friend` FROM Friends WHERE `UID`='$uid')";
		
		}

		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$st = $conn->prepare($sql);
		$st->execute();

		$data = $st->fetchAll(); 
		$data = array("status"=>"200 Success", "data"=>$data);

		// push JSON data
		pushResponse($data);
	}

?>