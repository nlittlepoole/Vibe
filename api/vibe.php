<?php

	// config settings setup
	ob_start(); 
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	session_start();

	// file imports
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once($root . "/config.php");
	require_once('request.php');

	// grabbing URL fragments
	$uid =  $_REQUEST['uid'] ;
	$token = $_REQUEST['token'];
	$action = isset($_GET['action']) && validToken($uid,$token) ? $_GET['action'] : ""; 

	// parsing action fragment of URL to run method
	switch ($action) {

		case 'postVibe':
			// response OK.
			postVibe($uid, $token, getVibe(isset( $_POST['status']) ? $_POST['status'] : "" ));
		break;
		case 'postComment':
			// response OK.
			$response_array['status'] = "200 Request Queued";
			pushResponse($response_array);
			postComment($uid, $token);
		break;
		case 'deleteVibe':
			// response OK.
			$response_array['status'] = "200 Request Queued";
			pushResponse($response_array);
			deleteVibe();
		break;
		case 'getCloud':
			getCloud();
		break;
		case 'vote':
			$response_array['status'] = "200 Request Queued";
			pushResponse($response_array);
			vote($uid);
		break;
	}

	// increases agree or disagree for vibe post
	function vote($uid) {
		
		$pid = $_POST['pid'];
		$vote = $_POST['vote'] =='agree' ? 1: -1;
		$timestamp = $_POST['timestamp'];
		// grab necessary data about post
		$sql = "SELECT A.PID, UID as Tagged, Author, Content FROM (SELECT * FROM Posts WHERE TIMESTAMP = '$timestamp' AND PID = '$pid')A JOIN Tagged on A.PID = Tagged.PID"; 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		
		$st = $conn->prepare($sql);
		$st->execute();
		$data = $st->fetch();
		$tagged = $data['Tagged'];
		$status = $data['Content'];

		$vibes = getVibe($status);
		
		foreach($vibes as $vibe){
			$sql = "INSERT INTO Vibes (`Vibe`, `UID`, `Score`)
				VALUES ('$vibe','$tagged',1)
					ON DUPLICATE KEY UPDATE `Score` = `Score`+ $vote;";
			$st = $conn->prepare( $sql );
			$st->execute();
		}
			$sql = "INSERT INTO Liked (UID, PID, Timestamp,Vote) VALUES('$uid','$pid','$timestamp',$vote) ON DUPLICATE KEY UPDATE `Vote` = $vote , Timestamp = '$timestamp';";	
			$st = $conn->prepare( $sql );
			$st->execute();
		$conn = null;
	}

	// Delete a Vibe Post or comment
	function deleteVibe() {
		
		$pid = $_POST['pid'];
		$timestamp = $_POST['timestamp'];
		// grab necessary data about post
		$sql = "SELECT A.PID, UID as Tagged, Author, Content,Type FROM (SELECT * FROM Posts WHERE TIMESTAMP = '$timestamp' AND PID = '$pid')A JOIN Tagged on A.PID = Tagged.PID"; 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		
		$st = $conn->prepare($sql);
		$st->execute();
		$data = $st->fetch();
		$type = $data['Type'];
		$vibes = getVibe($status);

		foreach($vibes as $vibe){
			$sql = "INSERT INTO Vibes (`Vibe`, `UID`, `Score`)
				VALUES ('$vibe','$tagged',1)
					ON DUPLICATE KEY UPDATE `Score` = `Score`-1";
			$st = $conn->prepare( $sql );
			$st->execute();
		}
		if($type =="Master"){
			$sql = "DELETE FROM Posts WHERE PID = '$pid'";	
			$st = $conn->prepare( $sql );
			$st->execute();
			$conn = null;
		}
		else{
			$sql = "DELETE FROM Posts WHERE PID = '$pid' and Timestamp = '$timestamp'";	
			$st = $conn->prepare( $sql );
			$st->execute();
			$conn = null;
		}
	}

	// return JSON encoded url to the user's Vibe cloud
	function getCloud() {

		$user = $_GET['user'];
		
		// runs cloud.py generating cloud PNG at returned URL
		$command = 'sudo python cloud.py "' . $user . '" 2>&1';
		$temp = exec($command, $output);
		
		echo json_encode(array("url"=>"http://niger.go-vibe.com/view/cloud/" . $user . ".png"));
	}

	// generate vibes for given status
	function getVibe($status) {
		
		$output = [];
		$status = addslashes($status);

		$command = "cat password.txt | sudo python vibe.py '$status' 2>&1";
		$temp = exec($command ,$output);
		
		print_r($output);
		return $output;
	}

	// add temp user that'll be matched to FB(?) later
	function addTempUser($uid, $name,$note) {

		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$name = $conn->quote($name);

		$sql = "INSERT INTO Users (`UID`, `Name`, `Notes`)
		    VALUES ('$uid', $name, '$note')
		        ON DUPLICATE KEY UPDATE `Notes` = '$note';"; 
		
		$st = $conn->prepare($sql);
		$st->execute();
		$conn = null;
	}

	function idType($string){
		if(substr($string,0,1)=='@' ){
			return "twitter";
		}
		elseif(filter_var($string, FILTER_VALIDATE_EMAIL)){
			return "email";
		}

		elseif(isset($_POST['phone']) && (bool)preg_match("/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/", $string) ){
			return "phone";
		}
		else{
			return "default";
		}
	}

	function getMatchingUID($hash){
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

		$sql = "SELECT UID FROM Linked WHERE TEMP='$hash'";
		$st = $conn->prepare($sql);
		$st->execute();
		
		// modify results (include comments below main posts)
		$data = $st->fetch(PDO::FETCH_NUM); 
		$conn = null; 
		return $data;
	}

	// post tweet & associated vibes to DB
	function postVibe($uid, $token, $vibes){

		$status = isset($_POST['status']) ? $_POST['status'] : "";
		$pid = hash("sha256", $status . $uid . rand(0, 1000) );

		$response_array['status'] = "200 Request Queued";
		$response_array['PID'] = $pid;
		pushResponse($response_array);

		$author = isset($_POST['uid']) ? $_POST['uid'] : "";
		$recipients = isset($_POST['recipient']) ? $_POST['recipient'] : "";
		$recipients = explode("&&",$recipients);
		// setup temp user if user does not exist
		foreach($recipients as &$recipient){
			$hash_id = hash("sha256", $recipient);
			$type = idType($recipient);
			if($type != "default"){
				$match = getMatchingUID( $hash_id )[0];
				if(!$match){
					addTempUser($hash_id, "Temp User", $type);
					switch ($type) {
						case 'email':
							$email = $recipient;
							$recipient = $hash_id;

							// send email
							$url = 'http://api.go-vibe.com/api/notification.php?action=sendEmail';
					    	$post_data = array('uid' => $uid, 'token' => $token, 'email' => $email, 'status' => $status, 'user' => $recipient);
					    	post($url, $post_data);

					    break;
					    case 'twitter':
							$twitter = $recipient;
							$recipient = $hash_id;
							// send tweet
							$url = 'http://api.go-vibe.com/api/notification.php?action=sendTweet';
					    	$post_data = array('uid' => $uid, 'token' => $token, 'twitter' => $twitter, 'status' => $status, 'user' => $recipient);
					    	post($url, $post_data);


					    break;
					}
					// Add temp friend to friend graph
			    	$url = 'http://api.go-vibe.com/api/user.php?action=addFriend';
			    	$post_data = array('uid' => $uid, 'token' => $token, 'user' => $recipient);
			    	post($url, $post_data);
	    		}
	    		else{
	    			$recipient = $match;
	    		}
			}
		}
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$status=$conn->quote($status); //Clean up user statuses to prevent SQL injections

		$sql = "INSERT INTO Posts (`PID`, `Content`, `Author` ,`Type`) VALUES ('$pid', $status, '$author','Master');";
		$st = $conn->prepare($sql);
		$st->execute();

		foreach($recipients as $tagged){
			$sql = "INSERT INTO Tagged (`UID`, `PID`)
				VALUES ('$tagged','$pid');";
			
			$st = $conn->prepare( $sql );
			$st->execute();
		}
		foreach($vibes as $vibe) {
			$sql = "INSERT INTO Vibes (`Vibe`, `UID`, `Score`)
				VALUES ('$vibe','$recipient',1)
					ON DUPLICATE KEY UPDATE `Score` = `Score`+ 1;";
			
			$st = $conn->prepare( $sql );
			$st->execute();
		}
		$conn = null;
	}

	function postComment($uid, $token){

		// add POST components
		$status = isset($_POST['status']) ? $_POST['status'] : "";
		$pid = isset($_POST['pid']) ? $_POST['pid'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";

		$hash_id = hash("sha256", $email);
		$author = isset($_POST['uid']) ? $_POST['uid'] : "";

		$recipient = isset($_POST['recipient']) ? $_POST['recipient'] : "";

		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$status = $conn->quote($status); //Clean up user statuses to prevent SQL injections

		// add post to DB
		$sql = "INSERT INTO Posts (`PID`,`Content`,`Author`,`Type`) VALUES ('$pid',$status,'$author','Child');";
		$st = $conn->prepare($sql);
		
		$st->execute();
		
		$conn = null;
	}
?>