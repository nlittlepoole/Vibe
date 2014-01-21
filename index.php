<?php
ob_start();
session_start(); //initializes the PHP session and allows php to access cookie/url fragment data
ini_set('max_execution_time', 300);
//Start up code for any instance of Vibe runtime
require( "config.php" ); //pulls in global variables from config.php
require("php-sdk/facebook.php"); //imports facebook api methods and objects
$config = array(); //initializes $config as an array
$config['appId'] = APP_ID; //$ Facebook App ID code for Vibe, assigned by facebook to Niger Little-Poole
$config['secret'] = APP_SECRET; //FAcebook secret code for vibe
$_SESSION['configArray'] = $config;
$facebook = new Facebook($config); //App ID and passcode used to initialize session authoirzation for facebook API
$token = $facebook->getAccessToken(); //Authorization token is grabbed from URL fragment, if user hasn't logged in it will return an invalid token
$_SESSION['myToken'] = $token;
$uid = $facebook->getUser(); // Facebook user ID number is returned, if facebook isn't logged in or exception, it returns 0
$_SESSION['userID'] = $uid; 
$action = isset( $_GET['action'] ) && $uid ? $_GET['action'] : ""; //sets $action to "Action" url fragment string if action isn't null

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
  case 'login': //login occurs after user hits login button on homepage.php, mostly just sets up environment to play vibe 
    require( CLASS_PATH . "/Web/User.php");
    $_SESSION['logoutUrl'] = $facebook->getLogoutUrl(array( 'next' => 'http://localhost') ); //logout url is created and stored to the session data.
    $_SESSION['friends'] = array_delete($facebook->api('/me/friends'),$uid); //user's friend list is a json that is decoded from the graph url and returned as a 2d array 
    addUser($facebook,$uid,$token); //adds user ID to mysql USER table, method does nothing if ID already exists and activates the ID if information exists but this is the first time the user has logged in
    topFriends($facebook,$uid,$token); // pulls users top friends using the top friends function
    //header('Location: /index.php?action=dashboard&force=1'); // index is reloaded but with question prameter. Now that environment is set up index.php is reloaded with the intent of answring questiosn
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
    achievementsBox(); 
    $force=$_GET['force'];
    dashboard($facebook,$uid,$token,$force);
    if($_SESSION['redirect']){
        $redirect=$_SESSION['redirect'];
        $_SESSION['redirect']=null;
        header('Location:'.$redirect);
    }
    else{
      header('Location: /website/dashboard.php');
    }                            // Force php-output-cache to flush to browser.

  break;
  case 'submit'://a user submits a question
    require( CLASS_PATH . "/Web/Question.php");
    submit($facebook,$uid,$token );
    header('Location: /index.php?action=question');
    break;
	
  case 'submit2':
	//The settings page has been populated with information  
	require( CLASS_PATH . "/Web/Settings.php");
  	$_SESSION['redirect']=' /index.php?action=profile&profile=' . $_SESSION['userID'];
	header('Location:/index.php?action=dashboard&force=1');
	  
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
  case 'disable':
  require( CLASS_PATH . "/Web/User.php");
  disable($uid);
  header('Location:'.$_SESSION['logoutUrl'] );
  break;
  case 'removeComment':
    require( CLASS_PATH . "/Web/User.php");
    $index=$_GET['comment'];
    if(isset($_GET['comment'])){
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
      $sql = "SELECT Comments FROM user WHERE UID=$uid"; //sql query that returns the string of the question in the table
      $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
      $st->execute();//executes query above
      $data=$st->fetch();
      $comments=removeComment($data['Comments'],$index);
      $sql = "UPDATE user SET Comments='$comments' WHERE UID='$uid';";
      $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
      $st->execute();//executes query above
      $conn=null;
    }
    header('Location: /index.php?action=dashboard&force=1');
  break;
  case 'spam':
  require( CLASS_PATH . "/Web/User.php");
  $id=$_GET['id'];
  $id2=$_GET['id2'];
  if(checkUID($id) && checkUID($id2)){
    reportSpam($id,$id2);
  }
  header('Location: /index.php?action=dashboard');
  break;
  default: //this is the default setting, it simply take sthe user to the homepage. It also creates the facebook login url 
    //when a user logs in through facebook, the are simply going to a special link created by the facebook api. The api uses our AP ID and password to generate the link
    $params = array(
                  'scope' => "friends_photos, user_photos,user_education_history,read_friendlists,read_stream,user_work_history,user_photo_video_tags, friends_photo_video_tags,friends_education_history,friends_work_history,user_birthday,friends_birthday,user_location,friends_location,friends_hometown,user_hometown", //these are the permissions Vibe needs from facebook
                  'redirect_uri' => 'http://localhost/index.php?action=login' //this is the link that facebook will redirect the browser to after succesful login
                );
    $loginUrl = $facebook->getLoginUrl($params); //the facebook getLoginUrl() is an api method that uses the permissions and redirct url to create a unique login url
    $_SESSION['loginUrl'] = $loginUrl; //the log in url is saved in the Session data so that the homepage can use it
    header('Location: /website/homepage.php'); //the browser is redirected to the homepage. 
}
?>