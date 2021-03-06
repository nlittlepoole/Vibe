<?php
	
	// PHP settings
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	
	// file imports
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once($root . "/config.php");
	require_once('request.php');

	// REQUEST components
	$uid 	= $_REQUEST['uid'];
	$token 	= $_REQUEST['token'];

	$action = isset($_REQUEST['action']) && validToken($uid, $token) ? $_REQUEST['action'] : "";

	// trigger method from action URL fragment
	switch ($action) {
		case 'addUser':
			$response_array['status'] = "200 Request Queued";
			pushResponse($response_array,"POST");

			addUser($uid, $token);
		break;
		case 'addFriends':
			$response_array['status'] = "200 Request Queued";
			pushResponse($response_array, "POST");

			addFriends($uid, $token);
		break;
		case 'getFeed':
			getFeed();
		break;
		case 'getLocations':
			getLocations($uid, $token);
		break;
	}

	// return JSON of user communities
	function getLocations($uid, $token){
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		
		$sql = "SELECT LID,Name FROM Locations WHERE `LID` IN (SELECT LID FROM Located WHERE UID  = '$uid')";
		$st = $conn->prepare($sql);
		$st->execute();
		
		$data = $st->fetchAll(PDO::FETCH_ASSOC); 
		$data = array("status" => "200 Success", "data" => $data);
		
		$conn = null;
		
		// push JSON data
		pushResponse($data, "GET");
	}

	// JSON encode the newsfeed of given UID
	function getFeed() {

		// offset used for infinite scroll
		$offset = isset($_GET['offset']) ? $_GET['offset']:'0';
		$lid = $_GET['lid'];

		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$sql = "SELECT A.PID,Content,Timestamp FROM((SELECT * FROM Posts)A JOIN (SELECT DISTINCT PID FROM (SELECT PID,UID,Timestamp FROM Tagged ORDER BY Timestamp DESC)T1 JOIN (SELECT `UID` FROM Located WHERE `LID` = '$lid')T2 ON T1.UID=T2.UID LIMIT 10 OFFSET $offset)B ON A.PID=B.PID )ORDER BY Timestamp DESC";
		$st = $conn->prepare($sql);
		$st->execute();
		
		$data = $st->fetchAll(PDO::FETCH_ASSOC); 
		$data = groupByKey($data);

		// modifying post info returned, by enclosing score info and all people tagged
		foreach($data as &$post){
			$pid = $post['PID'];
			$timestamp = $post['Timestamp'];
			
			$sql = "SELECT Name,UID FROM Users WHERE UID IN (SELECT UID FROM Tagged WHERE PID='$pid' )";
			$st = $conn->prepare($sql);
			$st->execute();
			
			// modify results (include comments below main posts)
			$tagged= $st->fetchAll(PDO::FETCH_ASSOC); 
			$post['tagged'] = $tagged;

			$sql = "SELECT SUM(Vote) as Total, Sum(Case When Vote < 0 Then 1 Else 0 End) As Disagree, Sum(Case When Vote > 0 Then 1 Else 0 End) As Agree FROM Liked GROUP BY PID,Timestamp HAVING Timestamp = '$timestamp' AND pid = '$pid';";
			$st = $conn->prepare($sql);
			$st->execute();
			
			// modify results (include comments below main posts)
			$votes = $st->fetch(); 

			$post['Agree'] 		= $votes['Agree'];
			$post['Disagree']	= $votes['Disagree'];
			$post['Score'] 		= $votes['Total'];
		}

		$data = array("status" => "200 Success", "data" => $data);
		$conn = null;
		
		pushResponse($data, "GET");
	}

	function groupByKey($array) {
	    
	    $return = array();

	    foreach($array as $post) {
	        if(isset($return[$post['PID']])) {
	        	array_push($return[ $post['PID']], $post);
	        }
	        else {
	        	$return[ $post['PID'] ]=array($post);
	        }
	    }
	    
	    // put comments under original post
	    $result = array();
	    
	    foreach($return as $thread) {	
	    	usort($thread, "cmp");
	    	
	    	$post = array_pop($thread);
	    	$post['Comments'] = $thread;
	    	
	    	array_push($result, $post);
	    }

	    return $result;
	}

	function cmp($a, $b)
	{
		$a = strtotime($a['Timestamp']);
		$b = strtotime($b['Timestamp']);
	    
	    if($a == $b) {
	    	return 0;
	    }

	    return ($a < $b) ? 1 : -1;
	}


	// takes facebook user & adds all communities to Location index and establishes relationships
	function addUser($uid, $token) {

		//retrieve info from facebook
		$api = "https://graph.facebook.com/v1.0/" . $uid;
		$api = $api.'?fields=work,education,location,hometown&access_token=' . $token;
		
		$sources = json_decode(file_get_contents($api), true);

		// only use current places and sort by type
		$places = array();

		if(isset($sources['work'][0])) {
			$place = array("name" => $sources['work'][0]['employer']['name'], "LID" => $sources['work'][0]['employer']['id'], "Relationship" => "Work");
			array_push($places, $place);
		}

		if(isset($sources['location'])) {
			$place = array("name" => $sources['location']['name'], "LID" => $sources['location']['id'], "Relationship" => "Lives");
			array_push($places, $place);
		}

		if(isset($sources['hometown'])){
			$place = array("name" => $sources['hometown']['name'], "LID" => $sources['hometown']['id'], "Relationship" => "Hometown");
			array_push($places, $place);
		}

		if(isset($sources['education'])) {
			foreach($sources['education'] as $school) {
				if(!isset($school['year']) or (int)$school['year']['name'] > 2014) {
					$place = array("name" => $school['school']['name'], "LID" => $school['school']['id'], "Relationship" => "School");
					array_push($places, $place);
				}
			}
		}

		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

		foreach($places as $place){

			$LID = $place['LID'];
			$name = addslashes($place['name']);
			$relationship = $place['Relationship'];

			$sql = "INSERT INTO Locations (`LID`,`Name`) Values ('$LID','$name')";
			$st = $conn->prepare($sql);
			$st->execute();
			
			$sql = "INSERT INTO Located (`LID`,`UID`,`Relationship`) Values ('$LID','$uid','$relationship')";
			$st = $conn->prepare($sql);
			$st->execute();
		}

		$conn = null;
	}

	function addFriends($uid, $token) {

		// graph API request for friend data
		$api = "https://graph.facebook.com/v1.0/" . $uid;
		$api = $api . '/friends/?fields=work,education,location,hometown&access_token=' . $token;
		
		$friends = json_decode(file_get_contents($api), true);
		$friends = $friends['data'];

		// same process for each friend as add_user; will ignore users it can pull for so V2 compatible
		foreach($friends as $friend) {
			
			$places = array();
			$user = $friend['id'];
			
			if(isset($friend['work'][0])) {
				$place = array("name" => $friend['work'][0]['employer']['name'], "LID" => $friend['work'][0]['employer']['id'], "Relationship" => "Work");
				array_push($places, $place);
			}

			if(isset($friend['location'])) {
				$place = array("name" => $friend['location']['name'], "LID" => $friend['location']['id'], "Relationship" => "Lives");
				array_push($places, $place);
			}

			if(isset($friend['hometown'])) {
				$place = array("name" => $friend['hometown']['name'], "LID" => $friend['hometown']['id'], "Relationship" => "Hometown");
				array_push($places, $place);
			}

			if(isset($friend['education'])) {
				foreach($friend['education'] as $school) {
					if(!isset($school['year']) or (int)$school['year']['name'] > 2014) {
						$place = array("name" => $school['school']['name'], "LID" => $school['school']['id'], "Relationship" => "School");
						array_push($places, $place);
					}
				}
			}

			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			
			foreach($places as $place) {
				$LID = $place['LID'];
				$name = addslashes($place['name']);
				$relationship = $place['Relationship'];

				$sql = "INSERT INTO Locations (`LID`,`Name`) Values ('$LID','$name')";
				$st = $conn->prepare($sql);	$st->execute();
				
				$sql = "INSERT INTO Located (`LID`,`UID`,`Relationship`) Values ('$LID','$user','$relationship')";
				$st = $conn->prepare($sql);	$st->execute();
			}

			$conn=null;
		}
	}
?>