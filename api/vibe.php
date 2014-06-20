<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
session_start();
$root=$_SERVER['DOCUMENT_ROOT'];
require_once( $root ."/config.php" );
require_once('request.php');
$uid=  $_REQUEST['uid'] ;
$token=$_REQUEST['token'];
$action = isset( $_GET['action'] ) && validToken($uid,$token) ? $_GET['action'] : ""; //sets $action to "Action" url fragment string if action isn't null

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
	case 'postVibe':
		postVibe(getVibe());
	break;
	case 'getCloud':
		getCloud();
	break;
}

function getCloud(){
		$uid=isset( $_GET['uid'] ) ? $_GET['uid'] : "";
		$command='sudo python cloud.py "'.$uid.'" 2>&1';
		$temp = exec($command ,$output);
		print_r($output);
		echo "http://niger.go-vibe.com/view/cloud/".$uid.".png";

}
function getVibe(){
	$output=[];
	$status = isset( $_POST['status'] ) ? $_POST['status'] : ""; //sets $action to "Action" url fragment string if action isn't null
	$command='cat password.txt | sudo python vibe.py "'.$status.'" 2>&1';
	$temp = exec($command ,$output);
	print_r($output);
	return $output;
}
function postVibe($vibes){
	$status = isset( $_POST['status'] ) ? $_POST['status'] : "";
	$pid=hash("sha256",$status);
	$uid=isset( $_POST['uid'] ) ? $_POST['uid'] : "";
	$recipient = isset( $_POST['recipient'] ) ? $_POST['recipient'] : "";
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$sql="INSERT INTO Posts (`PID`, `UID`, `Content`,`Score`)
		    VALUES ('$pid','$uid','$status',1);";
	$st = $conn->prepare( $sql );
	$st->execute();
	foreach($vibes as $vibe){
		$sql="INSERT INTO Vibes (`Vibe`, `UID`, `Score`)
		    VALUES ('$vibe','$uid',1)
		        ON DUPLICATE KEY UPDATE `Score` = `Score`+1;";
		$response_array['status'] = "200 Request Queued";  
		$st = $conn->prepare( $sql );
		$st->execute();

	}
	$conn=null;
}
?>