<?php
ob_start();
session_start(); //initializes the PHP session and allows php to access cookie/url fragment data
ini_set('max_execution_time', 300);
//Start up code for any instance of Vibe runtime
require( "config.php" ); //pulls in global variables from config.php
require("php-sdk/facebook.php"); //imports facebook api methods and objects
$action = isset( $_GET['action'] ) ? $_GET['action'] : ""; //sets $action to "Action" url fragment string if action isn't null
$config = array(); //initializes $config as an array
  $config['appId'] = APP_ID; //$ Facebook App ID code for Vibe, assigned by facebook to Niger Little-Poole
  $config['secret'] = APP_SECRET; //FAcebook secret code for vibe
$facebook = new Facebook($config); //App ID and passcode used to initialize session authoirzation for facebook API
$token = $facebook->getAccessToken(); //Authorization token is grabbed from URL fragment, if user hasn't logged in it will return an invalid token
$uid = $facebook->getUser(); // Facebook user ID number is returned, if facebook isn't logged in or exception, it returns 0
$_SESSION['userID'] = $uid; 

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
  case 'login': //login occurs after user hits login button on homepage.php, mostly just sets up environment to play vibe 
    require( CLASS_PATH . "/Web/User.php");
    $_SESSION['logoutUrl'] = $facebook->getLogoutUrl(array( 'next' => 'http://localhost') ); //logout url is created and stored to the session data.
    addUser($facebook,$uid,$token); //adds user ID to mysql USER table, method does nothing if ID already exists and activates the ID if information exists but this is the first time the user has logged in
    topFriends($facebook,$uid,$token); // pulls users top friends using the top friends function
    $_SESSION['friends'] = json_decode(file_get_contents("https://graph.facebook.com/" . $uid . "/friends?access_token=" . $token), true); //user's friend list is a json that is decoded from the graph url and returned as a 2d array
    $_SESSION['numberOfFriends'] = max(array_map('count', $_SESSION['friends'])); 
    header('Location: /index.php?action=dashboard'); // index is reloaded but with question prameter. Now that environment is set up index.php is reloaded with the intent of answring questiosn
    break;
  case 'question'://occurs after a login or another question, this case handles generating a new question and friend
    require( CLASS_PATH . "/Web/Question.php");
    question($facebook,$uid,$token); // calls the question function that pulls a user and question and places the data in the Session cache
    header('Location: /website/questions.php'); //sends browser to questions page with Session Data containing questions input above
    break;
  case 'location':
  require( CLASS_PATH . "/Web/Community.php");
  location($facebook,$uid,$token);
    break;
  case 'dashboard'://occurs after a login or another question, this case handles generating a new question and friend
      require( CLASS_PATH . "/Web/Dashboard.php");
    dashboard($facebook,$uid,$token);

	/* Modified to send to the new dashboard (Noah) */
    header('Location: /website/dashboard.php'); //sends browser to questions page with Session Data containing questions input above
    flush();                             // Force php-output-cache to flush to browser.

  break;
  case 'submit'://a user submits a question
    require( CLASS_PATH . "/Web/Question.php");
    submit($facebook,$uid,$token );
    header('Location: /index.php?action=question');
    break;
	
  case 'submit2':
	//The settings page has been populated with information  
	require( CLASS_PATH . "/Web/Settings.php");
	header('Location: /index.php?action=profile&profile=' . $_SESSION['userID']);
	  
  break;	
  case 'search':
    require( CLASS_PATH . "/Web/Search.php");
    $_SESSION['Results']=search($_POST["Query"],$facebook,$uid,$token);
    header('Location:/website/results.php');
  break;
  case 'profile':
    require( CLASS_PATH . "/Web/Search.php");
    $redirect=profiled($facebook,$uid,$token);
    header($redirect);
  break;
	
  default: //this is the default setting, it simply take sthe user to the homepage. It also creates the facebook login url 
    //when a user logs in through facebook, the are simply going to a special link created by the facebook api. The api uses our AP ID and password to generate the link
    $params = array(
                  'scope' => "friends_photos, user_groups, user_photos,user_education_history,read_friendlists,read_stream,user_work_history,user_photo_video_tags, friends_photo_video_tags,friends_education_history,friends_work_history", //these are the permissions Vibe needs from facebook
                  'redirect_uri' => 'http://localhost/index.php?action=login' //this is the link that facebook will redirect the browser to after succesful login
                );
    $loginUrl = $facebook->getLoginUrl($params); //the facebook getLoginUrl() is an api method that uses the permissions and redirct url to create a unique login url
    $_SESSION['loginUrl'] = $loginUrl; //the log in url is saved in the Session data so that the homepage can use it
    header('Location: /website/homepage.php'); //the browser is redirected to the homepage. 
}
?>