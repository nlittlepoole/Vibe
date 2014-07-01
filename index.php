<?php

ob_start();
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

$_SESSION['full_name'] = "";

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
  case 'login': //login occurs after user hits login button on homepage.php, mostly just sets up environment to play vibe 
    $_SESSION['logoutUrl'] = $facebook->getLogoutUrl(array( 'next' => 'http://localhost') ); //logout url is created and stored to the session data.
    $data= $facebook->api('/me/?fields=gender,name,email');

    $url = 'http://localhost/api/user.php?action=addUser';
    $post_data = array('uid' => $uid, 'name' => $data['name'], 'token' => $token, 'email' => $data['email'] );

    // full name
    $_SESSION['full_name'] = $data['name']; 

    // first name
    $name_split = explode(' ', trim($_SESSION['full_name']));
    $_SESSION['first_name'] = $name_split[0];

    post($url, $post_data);
    // header('Location: /view/feed.php');
    header('Location: /social-v2.0.0/admin_fixed/new_newsfeed.php');


  break;
  default: //this is the default setting, it simply take sthe user to the homepage. It also creates the facebook login url 
    //when a user logs in through facebook, the are simply going to a special link created by the facebook api. The api uses our AP ID and password to generate the link
    $params = array(
                  'scope' => "email,manage_notifications, user_photos,user_education_history,read_friendlists,read_stream,user_work_history,user_birthday,user_location,user_hometown,user_friends", //these are the permissions Vibe needs from facebook
                  'redirect_uri' => 'http://localhost/index.php?action=login' //this is the link that facebook will redirect the browser to after succesful login
                );
    $loginUrl = $facebook->getLoginUrl($params); //the facebook getLoginUrl() is an api method that uses the permissions and redirct url to create a unique login url
    $_SESSION['loginUrl'] = $loginUrl; //the log in url is saved in the Session data so that the homepage can use it
    // header('Location: /view/home.php'); //the browser is redirected to the homepage. 
    header('Location: /view/new_home.php');

}
?>