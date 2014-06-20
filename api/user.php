<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
$root=$_SERVER['DOCUMENT_ROOT'];
require_once( $root ."/config.php" );
require_once('request.php');
$uid=  $_REQUEST['uid'] ;
$token=$_REQUEST['token'];
$action = isset( $_REQUEST['action'] ) && validToken($uid,$token) ? $_REQUEST['action'] : "";
//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
	case 'addUser':
		addUser($uid,$token);
	break;
	case 'getFriends':
		getFriends($uid,$token);
	break;

}

function addUser($uid,$token){
	$name=$_POST['name'];
	//$uid-mysql_real_escape_string($uid)
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$name=$conn->quote($name);
	$sql="INSERT INTO Users (`UID`, `Name`, `Notes`)
	    VALUES ('$uid',$name,'Test')
	        ON DUPLICATE KEY UPDATE `Notes` = 'Test2';";
	$response_array['status'] = "200 Request Queued";  
	$st = $conn->prepare( $sql );
	$st->execute();
	$conn=null;
	addFriends($uid,$token);
	echo json_encode($response_array);
}
function addFriends($uid,$token){
	$api="https://graph.facebook.com/v1.0/".$uid;
	$api=$api.'/friends?access_token='.$token;
	$friends=json_decode(file_get_contents($api),true);
	$friends=$friends['data'];

	//Set up sql insert queries
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$users_sql="INSERT INTO Users (`UID`, `Name`, `Notes`) VALUES";
	$friends_sql="INSERT INTO Friends (`UID`,`Friend`) VALUES ";
	$me='("'. $uid .'",';
	foreach( $friends as $friend){
		$friends_sql=$friends_sql. $me.'"'.$friend['id'] .'"),';
		$users_sql=$users_sql.'("'.$friend['id'].'",'. $conn->quote($friend['name']).',"Not Active"),';
	}
	$friends_sql=rtrim($friends_sql,',');
	$users_sql=rtrim($users_sql,',')."ON DUPLICATE KEY UPDATE `Notes` = 'Friended';";
	
	$st = $conn->prepare( $users_sql );
	$st->execute();
	$st = $conn->prepare( $friends_sql );
	$st->execute();
	$conn=null;

}
function getFriends($uid,$token){
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$sql = 'SELECT `UID`,`Name` FROM Users WHERE `UID` IN (SELECT `Friend` FROM Friends WHERE `UID`="'.$uid.'")';
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetchAll(); 
	$data=array("status"=>"200 Success","data"=>$data);
	echo json_encode($data);
}
?>