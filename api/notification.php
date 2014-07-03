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
	case 'addNotification':
		addnNotification($uid, $token);
	break;
	case 'getNotifications':
		getNotifications($uid);
	break;
	case 'clearNotification':
		clearNotification();
	break;
}

// adds a notification to the database
function addNotification($uid, $token){
	// response code
	$response_array['status'] = "200 Request Queued";
	pushResponse($response_array);

	// get parameters
	$class = $_POST['class'];
	$message = $_POST['message'];
	$data = $_POST['data'];

	// generates NID, the assumption is that all three of these shouldn't ever be the same
	$nid = hash("sha256", $uid . $message . $data);

	// runs SQL
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$sql = "INSERT INTO Notifications (`NID`,`UID`,`Message`,`Class`,`Data`) VALUES ('$nid','$uid','$message','$class','$data') ";
	$st = $conn->prepare($sql);
	$st->execute();
	$conn = null;
}
// clears the specified Notification from the database
function clearNotification(){
	$response_array['status'] = "200 Request Queued";
	pushResponse($response_array);
	$nid = $_POST['NID'];
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$sql = "DELETE * FROM Notifications WHERE NID='$nid'; ";
	$st = $conn->prepare($sql);
	$st->execute();
	$conn = null;
}

// returns json object of notifications
function getNotifications($uid){
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

	$sql = "SELECT * FROM Notifications WHERE UID='$uid'; ";
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetchAll(PDO::FETCH_ASSOC); 
	$data = array("status" => "200 Success", "data" => $data);
	$conn = null;
	pushResponse($data);
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
	echo json_encode(array("url"=>"http://niger.go-vibe.com/view/cloud/" . $user . ".png"));
}

?>