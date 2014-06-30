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

	$sql = "Select T1.PID, T1.Tagged, T2.Name, T1.Content, T1.Agree, T1.Disagree, T1.Timestamp From (SELECT A.PID,Tagged,Content,Agree,Disagree,Timestamp FROM (Select * From Posts Where `Tagged` In (Select `Friend` From Friends Where `UID` = '$uid'))A Join (Select DISTINCT PID From Posts Where `Tagged` In (Select `Friend` From Friends Where `UID` = '712337857') LIMIT 10)B On A.Pid = B.PID)T1 Join (Select * From Users) T2 On T1.Tagged = T2.UID Order By T1.timestamp Desc;";
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetchAll(PDO::FETCH_ASSOC); 
	$data=groupByKey($data);
	$data = array("status" => "200 Success", "friend" => $data);
	if(isset($_GET['community'])){
		$sql = "SELECT PID,B.Name,Tagged,Content,Agree,Disagree,A.Timestamp,A.Name as Community,LID FROM (SELECT * FROM (SELECT T1.UID,T2.LID,T2.Name FROM (SELECT UID,LID FROM Located WHERE LID IN ( SELECT LID FROM Located where UID='$uid' )) T1 JOIN (SELECT * FROM Locations) T2 on T1.LID=T2.LID)L JOIN (SELECT * FROM Posts)R ON L.UID=R.Tagged)A JOIN (SELECT Name,UID FROM Users) B ON A.Tagged=B.UID ORDER BY A.Timestamp DESC LIMIT 200;";
		$st = $conn->prepare($sql);
		$st->execute();
		$community = $st->fetchAll(PDO::FETCH_ASSOC);
		$data['community']=$community; 
	}
	$conn=null;
	pushResponse($data);
}
function groupByKey($array) {
    $return = array();
    //Group 
    foreach($array as $post) {
        if(isset($return[$post['PID'] ] )){
        	array_push($return[ $post['PID'] ], $post);
        }
        else{
        	$return[ $post['PID'] ]=array($post);
        }

    }
    // Create Comment Tree
    $result=array();
    foreach($return as $thread){
    	usort($thread, "cmp");
    	$post = array_pop($thread);
    	$post['Comments'] = $thread;
    	array_push($result, $post);

    }
    return $result;
}
function cmp($a, $b)
{
	$a = strtotime($a['Timestamp']);
	$b = strtotime($b['Timestamp']);
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? 1 : -1;
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

	//makes request to add user's community data
	$url = 'http://niger.go-vibe.com/api/location.php?action=addUser';
    $post_data = array('uid' => $uid, 'token' => $token);
    post($url, $post_data);

    //switches over to dealing with friends
	addFriends($uid, $token);
}
// adds friends to friends graph
function addFriends($uid, $token){
	$api = "https://graph.facebook.com/v1.0/" . $uid;
	$api = $api.'/friends?access_token=' . $token;
	$friends = json_decode(file_get_contents($api), true);
	$friends = $friends['data'];
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
	// Insert new friends into user and friend tables. Also create a connection between user and himself
	$st = $conn->prepare( $users_sql );
	$st->execute();
	$st = $conn->prepare( $me_sql );
	$st->execute();
	$st = $conn->prepare( $friends_sql );
	$st->execute();
	$conn = null;

	// makes request to add user's friends' community data
	$url = 'http://niger.go-vibe.com/api/location.php?action=addFriends';
    $post_data = array('uid' => $uid, 'token' => $token);
    post($url, $post_data);

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