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
	postVibe( getVibe() );
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
	$status = addcslashes($status);
	$command = "cat password.txt | sudo python vibe.py '$status' 2>&1";
	$temp = exec($command ,$output);
	print_r($output);
	return $output;
}

// posts vibe status to database along with vibes for the status
function postVibe($vibes){
	//Grab Request Parameters
	$status = isset( $_POST['status'] ) ? $_POST['status'] : "";
	$pid = hash("sha256", $status);
	$author = isset( $_POST['uid'] ) ? $_POST['uid'] : "";
	$recipient = isset( $_POST['recipient'] ) ? $_POST['recipient'] : "";

	//Connect to VibeSocial DBMS
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$status=$conn->quote($status); //Clean up user statuses to prevent SQL injections

	$sql = "INSERT INTO Posts (`PID`,`Content`,`Score`,`Author`,`Tagged`) VALUES ('$pid',$status,1,'$author','$recipient');";
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