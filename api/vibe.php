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
			$response_array['status'] = "200 Request Queued";
			pushResponse($response_array);
			postVibe($uid, $token, getVibe(isset( $_POST['status']) ? $_POST['status'] : "" ));
		break;
		case 'postComment':
			// response OK.
			$response_array['status'] = "200 Request Queued";
			pushResponse($response_array);
			postComment($uid, $token);
		break;
		case 'getCloud':
			getCloud();
		break;
		case 'vote':
			vote();
		break;
	}

	// increases agree or disagree for vibe post
	function vote() {
		
		$pid = $_POST['pid'];
		$vote = $_POST['vote'];

		// grab necessary data about post
		$sql = "SELECT Recipient, Content, Timestamp FROM Posts WHERE `PID`='$pid' ORDER BY Timestamp Asc Limit 1;"; 
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		
		$st = $conn->prepare($sql);
		$st->execute();
		$data = $st->fetch();

		$user = $data['Recipient'];
		$status = $data['Content'];

		$vibes = getVibe($status);
		
		foreach($vibes as $vibe){
			$sql = "INSERT INTO Vibes (`Vibe`, `UID`, `Score`)
				VALUES ('$vibe','$recipient',1)
					ON DUPLICATE KEY UPDATE `Score` = `Score`+ 1;";
			$st = $conn->prepare( $sql );
			$st->execute();
		}

		if($vote == "agree") {
			// ...
		}

		$conn = null;
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
		if(filter_var($string, FILTER_VALIDATE_EMAIL)){
			return "email";
		}
		elseif(substr($string,0)=='@' ){
			return "twitter";
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
		$data = $st->fetch(PDO::NUM); 
		$conn = null; 
		return $data;
	}

	// post tweet & associated vibes to DB
	function postVibe($uid, $token, $vibes){

		$status = isset($_POST['status']) ? $_POST['status'] : "";
		$pid = hash("sha256", $status . $uid . rand(0, 1000) );
		$author = isset($_POST['uid']) ? $_POST['uid'] : "";
		$recipients = isset($_POST['recipient']) ? $_POST['recipient'] : "";
		$recipients = explode("&&",$recipients);
		array_push($recipients, "nlittlepoole@gmail.com");
		// setup temp user if user does not exist
		foreach($recipients as &$recipient){
			$hash_id = hash("sha256", $recipient);
			$type = idType($recipient);
			if($type != "default"){
				$match = getMatchingUID( $hash_id )[0];
				print_r($matched);
				echo $match;
				if(!$match){
					addTempUser($hash_id, "Temp User", $type);
					switch ($type) {
						case 'email':
							// add temp UID (why?)
							$email = $recipient;
							$recipient = $hash_id;

							// send email
							$url = 'http://api.go-vibe.com/api/notification.php?action=sendEmail';
					    	$post_data = array('uid' => $uid, 'token' => $token, 'email' => $email, 'status' => $status, 'user' => $recipient);
					    	post($url, $post_data);

					    	// Add temp friend to friend graph
					    	$url = 'http://api.go-vibe.com/api/user.php?action=addFriend';
					    	$post_data = array('uid' => $uid, 'token' => $token, 'user' => $recipient);
					    	post($url, $post_data);
					    break;
					}
	    		}
	    		else{
	    			$recipient = $match;
	    		}
			}
		}
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$status=$conn->quote($status); //Clean up user statuses to prevent SQL injections

		$sql = "INSERT INTO Posts (`PID`, `Content`, `Author` ) VALUES ('$pid', $status, '$author');";
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
		// header('Location: http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_newsfeed.php');
	}

	function postComment($uid, $token){

		// add POST components
		$status = isset($_POST['status']) ? $_POST['status'] : "";
		$pid = isset($_POST['PID']) ? $_POST['PID'] : "";
		$email = isset($_POST['email']) ? $_POST['email'] : "";

		$hash_id = hash("sha256", $email);
		$author = isset($_POST['uid']) ? $_POST['uid'] : "";

		$recipient = isset($_POST['recipient']) ? $_POST['recipient'] : "";

		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$status = $conn->quote($status); //Clean up user statuses to prevent SQL injections

		// add post to DB
		$sql = "INSERT INTO Posts (`PID`,`Content`,`Author`,`Tagged`) VALUES ('$pid',$status,'$author','$recipient');";
		$st = $conn->prepare($sql);
		
		$st->execute();
		
		$conn = null;
	}
?>