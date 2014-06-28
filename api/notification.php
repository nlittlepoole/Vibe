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
	case 'sendEmail':
	sendEmail();
	break;
}

// returns json encoded url to the given user's vibe cloud
function sendEmail(){
	$user = $_POST['user'];
	$status = isset( $_POST['status'] ) ? $_POST['status'] : "";
	$email = isset( $_POST['email'] ) ? $_POST['email'] : "";
	$status = addslashes($status);
	//runs cloud.py which generates a vibe cloud png at the returned url
	$command = "sudo python sendEmail.py $email $user '$status'  2>&1";
	$temp = exec($command ,$output);
	//print_r($output);
	echo json_encode(array("url"=>"http://localhost/view/cloud/" . $user . ".png"));
}

?>