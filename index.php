<?php

// session start
ob_start();
session_start(); 
ini_set('max_execution_time', 300);

// file requirements
require_once( "config.php" ); 
require("php-sdk/facebook.php"); 
require("api/request.php"); 

// config
$config = array();
$config['appId'] = APP_ID; 
$config['secret'] = APP_SECRET; 

// facebook & token
$facebook = new Facebook($config); 
$token = $facebook->getAccessToken(); 
$_SESSION['token'] = $token;
echo $token;

// fb info parsing
$uid = $facebook->getUser(); 
$_SESSION['userID'] = $uid; 

$action = isset($_GET['action']) && $uid ? $_GET['action'] : ""; 

$_SESSION['full_name'] = "";

if(isset($_GET['ref'])) {
    $_SESSION['ref'] = $_GET['ref'];
}

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch($action) {

  case 'login': 
    // login hits upon 'login' from homepage

    // logout URL created
    $_SESSION['logoutUrl'] = $facebook->getLogoutUrl(array('next' => 'http://api.go-vibe.com')); 
    
    // basic graph API request
    $data = $facebook->api('/me/?fields=gender,name,email');

    $url = 'http://api.go-vibe.com/api/user.php?action=addUser';
    $post_data = array('uid' => $uid, 'name' => $data['name'], 'token' => $token, 'email' => $data['email'] );

    // full name -- SESSION data
    $_SESSION['full_name'] = $data['name']; 

    // first name -- SESSION data
    $name_split = explode(' ', trim($_SESSION['full_name']));
    $_SESSION['first_name'] = $name_split[0];
    $_SESSION['my_profile_load_name'] = $name_split[0] . "%20" . $name_split[1];

    // add referal hash
    if( isset($_SESSION['ref']) ){
        $post_data['ref'] = $_SESSION['ref'];
    }

    // actually posting user information to database
    post($url, $post_data);

    // automatically take user to the new newsfeed
    $iphone     = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $android    = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre    = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry      = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod       = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");

    if ($iphone || $android || $palmpre || $ipod || $berry == true) { 
        header('Location: /frontend_mobile/newsfeed');  // redirect the user to a different page, designed for mobile
    }
    else {
        header('Location: /frontend/newsfeed');
    }

  break;

  case 'newsfeed':
    // take user to the new newsfeed
    header('Location: /frontend/newsfeed');

  break;

  default: 
    // default option (triggered upon initially going to 'api.go-vibe.com')

    $params = array(
                  'scope' => "email,manage_notifications, user_photos,user_education_history,read_friendlists,read_stream,user_work_history,user_birthday,user_location,user_hometown,user_friends", //these are the permissions Vibe needs from facebook
                  'redirect_uri' => 'http://api.go-vibe.com/index.php?action=login' 
                );

    // login URL created & stored in SESSION data
    $loginUrl = $facebook->getLoginUrl($params); 
    $_SESSION['loginUrl'] = $loginUrl; 

    // redirected to new home page 
    header('Location: http://api.go-vibe.com/landing/index.php');

}
?>