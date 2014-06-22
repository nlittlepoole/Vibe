<?php
// ininitialize variables
ini_set('display_errors',1); 
error_reporting(E_ALL);
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require_once( $root . "/config.php" );
require_once('request.php');
$uid =  $_REQUEST['uid'] ;
$token = $_REQUEST['token'];
$action = isset( $_GET['action'] ) && validToken($uid,$token) ? $_GET['action'] : ""; //sets $action to "Action" url fragment string if action isn't null

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
	case 'postVibe':
	$response_array['status'] = "200 Request Queued";
	pushResponse($response_array);
	postVibe($uid, $token, getVibe() );
	break;
	case 'getCloud':
	getCloud();
	break;
}

// returns json encoded url to the given user's vibe cloud
function getCloud(){
	$user = $_GET['user'];
	//runs cloud.py which generates a vibe cloud png at the returned url
	$command = 'sudo python cloud.py "'.$user.'" 2>&1';
	$temp = exec($command ,$output);
	//print_r($output);
	echo json_encode(array("url"=>"http://niger.go-vibe.com/view/cloud/" . $user . ".png"));
}

// generates list of vibes from an input status
function getVibe(){
	$output = [];
	$status = isset( $_POST['status'] ) ? $_POST['status'] : ""; //sets $action to "Action" url fragment string if action isn't null
	$status = addslashes($status);
	$command = "cat password.txt | sudo python vibe.py '$status' 2>&1";
	$temp = exec($command ,$output);
	print_r($output);
	return $output;
}

// adds temporary users that are going to be matched later
function addTempUser($uid,$name,$email){
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$name = $conn->quote($name);
	$sql = "INSERT INTO Users (`UID`, `Name`, `Notes`, `Email`)
	    VALUES ('$uid', $name, 'Test', '$email')
	        ON DUPLICATE KEY UPDATE `Notes` = 'Temp';"; 
	$st = $conn->prepare( $sql );
	$st->execute();
	$conn = null;

}
// posts vibe status to database along with vibes for the status
function postVibe($uid, $token, $vibes){
	//Grab Request Parameters
	$status = isset( $_POST['status'] ) ? $_POST['status'] : "";
	$pid = hash("sha256", $status);
	$email= isset( $_POST['email'] ) ? $_POST['email'] : "";
	//$email="nsteb1993@gmail.com";
	$hash_id=hash("sha256", $email);
	$author = isset( $_POST['uid'] ) ? $_POST['uid'] : "";
	$recipient = isset( $_POST['recipient'] ) ? $_POST['recipient'] : "";

	// setup temp user if user doesn't exist
	if($recipient == "" || $email != ""){
		// add temporary UID
		$recipient = $hash_id;
		addTempUser($recipient, "Temp User", $email);

		// send Email
		$url = 'http://niger.go-vibe.com/api/notification.php?action=sendEmail';
    	$post_data = array('uid' => $uid, 'token' => $token, 'email' => $email, 'status' => $status, 'user' => $recipient);
    	post($url, $post_data);

    	// Add temporary friend to friend graph
    	$url = 'http://niger.go-vibe.com/api/user.php?action=addFriend';
    	$post_data = array('uid' => $uid, 'token' => $token, 'user' => $recipient);
    	post($url, $post_data);
	}


	//Connect to VibeSocial DBMS
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$status=$conn->quote($status); //Clean up user statuses to prevent SQL injections

	$sql = "INSERT INTO Posts (`PID`,`Content`,`Author`,`Tagged`) VALUES ('$pid',$status,'$author','$recipient');";
	$st = $conn->prepare( $sql );
	$st->execute();
	foreach($vibes as $vibe){
		$sql = "INSERT INTO Vibes (`Vibe`, `UID`, `Score`)
		VALUES ('$vibe','$recipient',1)
		ON DUPLICATE KEY UPDATE `Score` = `Score`+ 1;";
		$st = $conn->prepare( $sql );
		$st->execute();
	}
}
?>