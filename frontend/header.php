<?php 
session_start();
//go home if user isn't logged in
if(!isset($_SESSION['userID'])){
	header("Location:http://localhost");
}
//store friends in session to speed up feed reloads
//if(!isset($_SESSION['newsfeed_reload']) || (time() - $_SESSION['newsfeed_reload'] > 120) ){
if(true){
	$request = "http://localhost/api/user.php?action=getFriends&blocked=no&uid=". $_SESSION['userID'];
	$request = $request."&token=".$_SESSION['token'];

	$friends = json_decode(file_get_contents($request),true);

	$friends = $friends['data'];

	usort( $friends , function( $a ,$b ){
		return strcmp($a['Name'],$b['Name']);
	});
	$_SESSION['friend_list']=$friends;
	$_SESSION['newsfeed_reload']=time();
}
?>