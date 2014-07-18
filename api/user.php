<?php

	// config settings
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	
	// file imports
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once($root . "/config.php");
	require_once('request.php');

	// URL fragments
	$uid = $_REQUEST['uid'];
	$token = $_REQUEST['token'];
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
			getFeed($uid);
		break;
		case 'blockUser':
			blockUser($uid);
		break;
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

		// retrieve overall feed information associated with friends
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

		$sql = "SELECT PID,Name,Content,Agree,Disagree,Timestamp FROM POSTS WHERE PID IN SELECT * FROM Tagged WHERE UID='$uid'";
		$st = $conn->prepare($sql);
		$st->execute();
		
		// modify results (include comments below main posts)
		$data = $st->fetchAll(PDO::FETCH_ASSOC); 
		$data = groupByKey($data);
		for($data as &$post){
			$pid = $post['PID'];
			$sql = "SELECT Name,UID FROM Users WHERE UID IN (SELECT UID FROM Tagged WHERE PID='$pid' )";
			$st = $conn->prepare($sql);
			$st->execute();
			
			// modify results (include comments below main posts)
			$tagged= $st->fetchAll(PDO::FETCH_ASSOC); 
			$post['tagged'] = $tagged;
		}
		$data = array("status" => "200 Success", "data" => $data);
		$conn = null;

		// push results
		pushResponse($data);
	}

	function getFeed($uid){

		// retrieve overall feed information associated with friends
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

		$sql = "Select T1.PID, T1.Tagged, T2.Name, T1.Content, T1.Agree, T1.Disagree, T1.Timestamp From (SELECT A.PID,Tagged,Content,Agree,Disagree,Timestamp FROM (Select * From Posts Where `Tagged` In (Select `Friend` From Friends Where `UID` = '$uid'))A Join (Select DISTINCT PID From Posts Where `Tagged` In (Select `Friend` From Friends Where `UID` = '$uid') LIMIT 150)B On A.Pid = B.PID)T1 Join (Select * From Users) T2 On T1.Tagged = T2.UID Order By T1.timestamp Desc;";
		$st = $conn->prepare($sql);
		$st->execute();
		
		// modify results (include comments below main posts)
		$data = $st->fetchAll(PDO::FETCH_ASSOC); 
		
		$data = groupByKey($data);
		$data = array("status" => "200 Success", "data" => $data);
		$conn = null;

		// push results
		pushResponse($data);
	}

	function groupByKey($array) {

		// group elements under same PID (original post & comments)
	    $return = array();

	    foreach($array as $post) {
	        
	        if(isset($return[$post['PID']])) {
	        	array_push($return[$post['PID']], $post);
	        }

	        else{
	        	$return[$post['PID']] = array($post);
	        }
	    }
	    
	    // put comments under main post
	    $result = array();
	    foreach($return as $thread) {
	    	
	    	// compare posts by timestamp and put comments under oldest post (original)
	    	usort($thread, "cmp");

	    	$post = array_pop($thread);
	    	$post['Comments'] = $thread;
	    	
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

	// adds user & friends to user and friends databases
	function addUser($uid, $token){
		
		// response OK
		$response_array['status'] = "200 Request Queued";
		pushResponse($response_array);

		// parsing specific user info
		$name = $_POST['name'];
		$email = $_POST['email'];

		// insert user into DB
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$name = $conn->quote($name);

		$sql = "INSERT INTO Users (`UID`, `Name`, `Notes`, `Email`)
		    		VALUES ('$uid', $name, 'Test', '$email')
		        		ON DUPLICATE KEY UPDATE `Notes` = 'Test2';"; 
		
		$st = $conn->prepare($sql);
		$st->execute();
		$conn = null;

		// makes request to add user data
		$url = 'http://niger.go-vibe.com/api/location.php?action=addUser';
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
		$url = 'http://niger.go-vibe.com/api/location.php?action=addFriends';
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