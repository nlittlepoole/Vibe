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
	case 'getFeed':
		getFeed($uid);
	break;

}
function getFeed($uid){
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

	$sql = " SELECT T1.PID, T1.Tagged,T2.Name,T1.Content,T1.Score,T1.Timestamp FROM( SELECT * FROM Posts WHERE `Tagged` IN ( SELECT `Friend` FROM Friends WHERE `UID`='$uid') )T1 Join (SELECT * FROM Users)T2 ON T1.Tagged=T2.UID ORDER BY T1.Timestamp DESC;";
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetchAll(PDO::FETCH_ASSOC); 
	$data=array("status"=>"200 Success","data"=>$data);
	pushResponse($data);
}
function addUser($uid,$token){
	$response_array['status'] = "200 Request Queued";
	pushResponse($response_array);
	$name=$_POST['name'];
	//$uid-mysql_real_escape_string($uid)
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$name=$conn->quote($name);
	$sql="INSERT INTO Users (`UID`, `Name`, `Notes`)
	    VALUES ('$uid',$name,'Test')
	        ON DUPLICATE KEY UPDATE `Notes` = 'Test2';"; 
	$st = $conn->prepare( $sql );
	$st->execute();
	$conn=null;
	addFriends($uid,$token);
}
function addFriends($uid,$token){
	$api="https://graph.facebook.com/v1.0/".$uid;
	$api=$api.'/friends?access_token='.$token;
	$friends=json_decode(file_get_contents($api),true);
	$friends=$friends['data'];

	//Set up sql insert queries
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$users_sql="INSERT INTO Users (`UID`, `Name`, `Notes`) VALUES";
	$me_sql="INSERT INTO Friends (`UID`,`Friend`) VALUES('$uid','$uid');";
	$friends_sql="INSERT INTO Friends (`UID`,`Friend`) VALUES";
	$me='("'. $uid .'",';
	foreach( $friends as $friend){
		$friends_sql=$friends_sql. $me.'"'.$friend['id'] .'"),';
		$users_sql=$users_sql.'("'.$friend['id'].'",'. $conn->quote($friend['name']).',"Not Active"),';
	}
	$friends_sql=rtrim($friends_sql,',');
	$users_sql=rtrim($users_sql,',')."ON DUPLICATE KEY UPDATE `Notes` = 'Friended';";
	//Insert new friends into user and friend tables. Also create a connection between user and himself
	$st = $conn->prepare( $users_sql );
	$st->execute();
	$st = $conn->prepare( $me_sql );
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
	pushResponse($data);
}
?>