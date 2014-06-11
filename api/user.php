<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
$root=$_SERVER['DOCUMENT_ROOT'];
require_once( $root ."/config.php" );
require_once('request.php');

 //initializes the PHP session and allows php to access cookie/url fragment data
$action = isset( $_GET['action'] ) && validToken($_POST['uid'],$_POST['token']) ? $_GET['action'] : ""; //sets $action to "Action" url fragment string if action isn't null

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
	case 'addUser':
		addUser();
	break;
}

function addUser(){
	$uid=$_POST['uid'];
	$name=$_POST['name'];
	//$uid-mysql_real_escape_string($uid)
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$sql="INSERT INTO Users (`UID`, `Name`, `Notes`)
	    VALUES ('$uid','$name','Test')
	        ON DUPLICATE KEY UPDATE `Notes` = 'Test2';";
	$response_array['status'] = "200 Request Queued";  
	$st = $conn->prepare( $sql );
	$st->execute();
	$conn=null;
	echo json_encode($response_array);
}
?>