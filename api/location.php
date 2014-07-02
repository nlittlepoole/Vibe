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
		$response_array['status'] = "200 Request Queued";
		pushResponse($response_array);
		addUser( $uid,$token);
	break;
	case 'addFriends':
		$response_array['status'] = "200 Request Queued";
		pushResponse($response_array);
		addFriends( $uid,$token);
	break;
	case 'getFeed' :
		getFeed();
	break;
	case 'getLocations':
		getLocations($uid,$token);
	break;


}
// returns json of a user's communities
function getLocations($uid, $token){
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$sql = "SELECT LID,Name FROM Locations WHERE `LID` IN (SELECT LID FROM Located WHERE UID  = '$uid') ";
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetchAll(PDO::FETCH_ASSOC); 
	$data = array("status" => "200 Success", "data" => $data);
	$conn=null;
	pushResponse($data);
}

// json encodes the newsfeed of the given UID
function getFeed(){
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$lid=$_GET['LID'];
	$sql = "SELECT T1.PID, T1.Tagged, T2.Name, T1.Content, T1.Agree, T1.Disagree, T1.Timestamp FROM (SELECT A.PID, Tagged, Content, Agree, Disagree, A.Timestamp FROM (SELECT * FROM Posts WHERE `Tagged` IN (SELECT `UID` FROM Located WHERE `LID` = '$lid'))A JOIN (SELECT DISTINCT PID FROM Posts WHERE `Tagged` IN (SELECT `UID` FROM Located WHERE `LID` = '$lid') LIMIT 10)B ON A.Pid = B.PID)T1 JOIN (SELECT * FROM Users) T2 ON T1.Tagged = T2.UID;";
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetchAll(PDO::FETCH_ASSOC); 
	$data=groupByKey($data);
	$data = array("status" => "200 Success", "data" => $data);
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


// takes a facebook user and adds all their communities to our Location index and establishes the relationships
function addUser($uid,$token){
	//retrieve info from facebook
	$api = "https://graph.facebook.com/v1.0/" . $uid;
	$api = $api.'?fields=work,education,location,hometown&access_token=' . $token;
	$sources = json_decode(file_get_contents($api), true);

	//only use current places and sort by type
	$places = array();
	if( isset( $sources['work'][0] ) ){
		$place = array("name" => $sources['work'][0]['employer']['name'], "LID" => $sources['work'][0]['employer']['id'], "Relationship" => "Work");
		array_push($places, $place);
	}
	if( isset( $sources['location']) ){
		$place = array("name" => $sources['location']['name'], "LID" => $sources['location']['id'], "Relationship" => "Lives");
		array_push($places, $place);
	}
	if( isset( $sources['hometown'] ) ){
		$place = array("name" => $sources['hometown']['name'], "LID" => $sources['hometown']['id'], "Relationship" => "Hometown");
		array_push($places, $place);
	}
	if( isset( $sources['education'] ) ){
		foreach($sources['education'] as $school){
			if(!isset($school['year']) or (int)$school['year']['name'] > 2014 ){
				$place=array("name" => $school['school']['name'], "LID" => $school['school']['id'], "Relationship" => "School");
				array_push($places, $place);
			}
		}
	}

	//run sql queries for inserts
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	foreach($places as $place){
		$LID = $place['LID'];
		$name = addslashes($place['name']);
		$relationship = $place['Relationship'];
		$sql = "INSERT INTO Locations (`LID`,`Name`) Values ('$LID','$name')";
		$st = $conn->prepare($sql);
		$st->execute();
		$sql = "INSERT INTO Located (`LID`,`UID`,`Relationship`) Values ('$LID','$uid','$relationship')";
		$st = $conn->prepare($sql);
		$st->execute();
	}
	$conn=null;
}
function addFriends($uid,$token){
	//Get Friend Data
	$api = "https://graph.facebook.com/v1.0/" . $uid;
	$api = $api.'/friends/?fields=work,education,location,hometown&access_token=' . $token;
	$friends = json_decode(file_get_contents($api), true);
	$friends = $friends['data'];

	//Same Process for each friend as add_user. This will ignore users it can pull for so v2 compatible
	foreach($friends as $friend){
		$places = array();
		$user=$friend['id'];
		if( isset( $friend['work'][0] ) ){
			$place = array("name" => $friend['work'][0]['employer']['name'], "LID" => $friend['work'][0]['employer']['id'], "Relationship" => "Work");
			array_push($places, $place);
		}
		if( isset( $friend['location']) ){
			$place = array("name" => $friend['location']['name'], "LID" => $friend['location']['id'], "Relationship" => "Lives");
			array_push($places, $place);
		}
		if( isset( $friend['hometown'] ) ){
			$place = array("name" => $friend['hometown']['name'], "LID" => $friend['hometown']['id'], "Relationship" => "Hometown");
			array_push($places, $place);
		}
		if( isset( $friend['education'] ) ){
			foreach($friend['education'] as $school){
				if(!isset($school['year']) or (int)$school['year']['name'] > 2014 ){
					$place=array("name" => $school['school']['name'], "LID" => $school['school']['id'], "Relationship" => "School");
					array_push($places, $place);
				}
			}
		}

		//run sql queries for inserts
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		foreach($places as $place){
			$LID = $place['LID'];
			$name = addslashes($place['name']);
			$relationship = $place['Relationship'];
			$sql = "INSERT INTO Locations (`LID`,`Name`) Values ('$LID','$name')";
			$st = $conn->prepare($sql);
			$st->execute();
			$sql = "INSERT INTO Located (`LID`,`UID`,`Relationship`) Values ('$LID','$user','$relationship')";
			$st = $conn->prepare($sql);
			$st->execute();
		}
		$conn=null;
	}

}
?>