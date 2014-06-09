<?php

session_start(); //initializes the PHP session and allows php to access cookie/url fragment data
ini_set('max_execution_time', 300);
//Start up code for any instance of Vibe runtime
require_once( "config.php" ); //pulls in global variables from config.php
require("php-sdk/facebook.php"); //imports facebook api methods and objects
require("api/request.php"); //allows for post requests to api
$config = array(); //initializes $config as an array
$config['appId'] = APP_ID; //$ Facebook App ID code for Vibe, assigned by facebook to Niger Little-Poole
$config['secret'] = APP_SECRET; //FAcebook secret code for vibe
$facebook = new Facebook($config); //App ID and passcode used to initialize session authoirzation for facebook API
$token = $facebook->getAccessToken(); //Authorization token is grabbed from URL fragment, if user hasn't logged in it will return an invalid token
$_SESSION['token'] = $token;
echo $token;
$uid = $facebook->getUser(); // Facebook user ID number is returned, if facebook isn't logged in or exception, it returns 0
$_SESSION['userID'] = $uid; 

$action = isset( $_GET['action'] ) && $uid ? $_GET['action'] : ""; //sets $action to "Action" url fragment string if action isn't null

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
  case 'login': //login occurs after user hits login button on homepage.php, mostly just sets up environment to play vibe 
   // require( CLASS_PATH . "/Web/User.php");
    $_SESSION['logoutUrl'] = $facebook->getLogoutUrl(array( 'next' => 'http://go-vibe.com') ); //logout url is created and stored to the session data.
    //$_SESSION['friends'] = array_delete($facebook->api('/me/friends'),$uid); //user's friend list is a json that is decoded from the graph url and returned as a 2d array 
    //addUser($facebook,$uid,$token); //adds user ID to mysql USER table, method does nothing if ID already exists and activates the ID if information exists but this is the first time the user has logged in
    //topFriends($facebook,$uid,$token); // pulls users top friends using the top friends function
    $data= $facebook->api('/me/?fields=gender,name,email');//facebook graph api link is created to find gender
    $url = 'http://niger.go-vibe.com/api/user.php?action=addUser';
    $post_data = array('uid' => $uid, 'name' => $data['name']);
    // use key 'http' even if you send the request to https://...
    //create array of data to be posted
    //traverse array and prepare data for posting (key1=value1)
    post($url,$post_data,$token);
    //header('Location: /view/success.php'); // index is reloaded but with question prameter. Now that environment is set up index.php is reloaded with the intent of answring questiosn
  break;
  default: //this is the default setting, it simply take sthe user to the homepage. It also creates the facebook login url 
    //when a user logs in through facebook, the are simply going to a special link created by the facebook api. The api uses our AP ID and password to generate the link
    $params = array(
                  'scope' => "email,manage_notifications,friends_photos, user_photos,user_education_history,read_friendlists,read_stream,user_work_history,user_photo_video_tags, friends_photo_video_tags,friends_education_history,friends_work_history,user_birthday,friends_birthday,user_location,friends_location,friends_hometown,user_hometown", //these are the permissions Vibe needs from facebook
                  'redirect_uri' => 'http://niger.go-vibe.com/index.php?action=login' //this is the link that facebook will redirect the browser to after succesful login
                );
    $loginUrl = $facebook->getLoginUrl($params); //the facebook getLoginUrl() is an api method that uses the permissions and redirct url to create a unique login url
    $_SESSION['loginUrl'] = $loginUrl; //the log in url is saved in the Session data so that the homepage can use it
    header('Location: /website/homepage.php'); //the browser is redirected to the homepage. 
}
?>