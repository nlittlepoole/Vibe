<?php
// initialize environment
ini_set('display_errors',1); 
error_reporting(E_ALL);
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "/config.php");
require_once('request.php');

// Get API paramers
$uid=  $_REQUEST['uid'] ;
$token=$_REQUEST['token'];
$action = isset( $_REQUEST['action'] ) && validToken($uid, $token) ? $_REQUEST['action'] : "";

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
	case 'addUser':
		addUser($uid, $token);
	break;
	//only for testing
	case 'addFriends':
		addFriends($uid,$token);
	break;
	case 'addFriend':
		addFriend($uid,$token);
	break;
	case 'getFriends':
		getFriends($uid, $token);
	break;
	case 'getFeed':
		getFeed($uid);
	break;
	case 'blockUser':
		blockUser($uid);
	break;

}
// enables a block on the friendship between users
function blockUser($uid){
	$response_array['status'] = "200 Request Queued";
	pushResponse($response_array);
	$user = $_POST['user'];
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$sql = "UPDATE Friends SET Blocked=1 WHERE `UID` = '$user' AND `Friend` = '$uid' ;";
	$st = $conn->prepare($sql);
	$st->execute();
}

// json encodes the newsfeed of the given UID
function getFeed($uid){
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

	$sql = " SELECT T1.PID, T1.Tagged, T2.Name, T1.Content, T1.Score, T1.Timestamp FROM ( SELECT * FROM Posts WHERE `Tagged` IN ( SELECT `Friend` FROM Friends WHERE `UID`='$uid') )T1 Join (SELECT * FROM Users) T2 ON T1.Tagged=T2.UID ORDER BY T1.Timestamp DESC;";
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetchAll(PDO::FETCH_ASSOC); 
	$data = array("status" => "200 Success", "data" => $data);
	pushResponse($data);
}

// adds the given user and their friends to the User table and Friends Graph
function addUser($uid, $token){
	$response_array['status'] = "200 Request Queued";
	pushResponse($response_array);
	$name = $_POST['name'];
	$email = $_POST['email'];
	//$uid-mysql_real_escape_string($uid)
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$name = $conn->quote($name);
	$sql = "INSERT INTO Users (`UID`, `Name`, `Notes`, `Email`)
	    VALUES ('$uid', $name, 'Test', '$email')
	        ON DUPLICATE KEY UPDATE `Notes` = 'Test2';"; 
	$st = $conn->prepare( $sql );
	$st->execute();
	$conn = null;
	addFriends($uid, $token);
}
// adds friends to friends graph
function addFriends($uid, $token){
	$api = "https://graph.facebook.com/v1.0/" . $uid;
	$api = $api.'/friends?access_token=' . $token;
	$friends = json_decode(file_get_contents($api), true);
	$friends = $friends['data'];
	print_r($friends);
	//Set up sql insert queries
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$users_sql = "INSERT INTO Users (`UID`, `Name`, `Notes`) VALUES";
	$me_sql = "INSERT INTO Friends (`UID`,`Friend`) VALUES('$uid','$uid');";
	$friends_sql = "INSERT INTO Friends (`UID`,`Friend`) VALUES";
	$me = '("'. $uid .'",';
	foreach( $friends as $friend){
		$id=$friend['id'];
		$friends_sql = $friends_sql . $me. "'$id'),";
		$users_sql = $users_sql . '("' . $friend['id'] . '",' . $conn->quote($friend['name']) . ',"Not Active"),';
	}
	$friends_sql = rtrim($friends_sql, ',');
	$users_sql = rtrim($users_sql, ',') . "ON DUPLICATE KEY UPDATE `Notes` = 'Friended';";
	//Insert new friends into user and friend tables. Also create a connection between user and himself
	$st = $conn->prepare( $users_sql );
	$st->execute();
	$st = $conn->prepare( $me_sql );
	$st->execute();
	$st = $conn->prepare( $friends_sql );
	$st->execute();
	$conn = null;

}
// adds a friend to friends graph
function addFriend($uid, $token){
	$response_array['status'] = "200 Request Queued";
	pushResponse($response_array);
	$user = $_POST['user'];
	//Set up sql insert queries
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$sql = "INSERT INTO Friends (`UID`,`Friend`) VALUES('$uid','$user');";
	//Insert new friends into user and friend tables. Also create a connection between user and himself
	$st = $conn->prepare( $sql );
	$st->execute();
	$conn = null;

}
// json encodes list of the given user's friends from the Friend graph
function getFriends($uid,$token){
	$blocked = isset( $_GET['blocked'] ) ? $_GET['blocked'] : "";
	if($blocked=='no'){
		$sql = "SELECT `UID`,`Name` FROM Users WHERE `UID` IN (SELECT `Friend` FROM Friends WHERE `UID`='$uid' AND `Blocked`=0)";
	}
	else{
		$sql = "SELECT `UID`,`Name` FROM Users WHERE `UID` IN (SELECT `Friend` FROM Friends WHERE `UID`='$uid')";
	
	}
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetchAll(); 
	$data = array("status"=>"200 Success","data"=>$data);
	pushResponse($data);
}
?>