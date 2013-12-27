<?php
ob_start();
session_start(); //initializes the PHP session and allows php to access cookie/url fragment data
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

//Switch case determines what to do next based on the input arguments from the action URL fragment("?=action" in the URL)
switch ( $action ) {
  case 'login': //login occurs after user hits login button on homepage.php, mostly just sets up environment to play vibe 
    addUser($uid); //adds user ID to mysql USER table, method does nothing if ID already exists and activates the ID if information exists but this is the first time the user has logged in
    topFriends(); // pulls users top friends using the top friends function
    $graph_url="https://graph.facebook.com/" . $uid . "/friends?access_token=" . $token; //graph url is made to access the user's friendlist
    $_SESSION['friends'] = json_decode(file_get_contents($graph_url), true); //user's friend list is a json that is decoded from the graph url and returned as a 2d array
    header('Location: /index.php?action=dashboard'); // index is reloaded but with question prameter. Now that environment is set up index.php is reloaded with the intent of answring questiosn
    break;
  case 'question'://occurs after a login or another question, this case handles generating a new question and friend
    $params = array( 'next' => 'http://localhost' ); // redirect url is passed to facebook object
    $_SESSION['logoutUrl'] = $facebook->getLogoutUrl($params); //logout url is created and stored to the session data.
    question(); // calls the question function that pulls a user and question and places the data in the Session cache
    header('Location: /templates/questions.php'); //sends browser to questions page with Session Data containing questions input above
    break;
  case 'dashboard'://occurs after a login or another question, this case handles generating a new question and friend
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
    $sql = "SELECT * FROM user WHERE UID=$uid"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $data=$st->fetch(); //$question source is set to result of query
    $new_communities='';
    $user_profile = $facebook->api('/me','GET');
    $data['Name']=$user_profile['name'];
    $communities=split('&&',$data['Communities']);
    foreach($communities as $community){
        $new_communities=$new_communities.'<a href="/index.php?action=location?location='.$community.'" style="color: #006699">'.$community.'</a>, ';
    }
    $new_communities=substr($new_communities, 0, -1);
    $data['Communities']=$new_communities;
    $data['Attractiveness_Comments']=split('&&',$data['Attractiveness_Comments']);
    $data['Awkwardness_Comments']= isset($data['Awkwardness_Comments']) ? split('&&',$data['Awkwardness_Comments']) : " ";
      if(isset($data['Awkwardness_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Awkwardness_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Awkwardness_Keywords']=$new_keyword;
      }
    $data['Intelligence_Comments']= isset($data['Intelligence_Comments']) ? split('&&',$data['Intelligence_Comments']) : " ";
      if(isset($data['Intelligence_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Intelligence_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Intelligence_Keywords']=$new_keyword;
      }
    $data['Fashionability_Comments']= isset($data['Fashionability_Comments']) ? split('&&',$data['Fashionability_Comments']) : " ";
      if(isset($data['Fashionability_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Fashionability_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Fashionability_Keywords']=$new_keyword;
      }
    $data['Promiscuity_Comments']= isset($data['Promiscuity_Comments']) ? split('&&',$data['Promiscuity_Comments']) : " ";
      if(isset($data['Promiscuity_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Promiscuity_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Promiscuity_Keywords']=$new_keyword;
      }
    $data['Humor_Comments']= isset($data['Humor_Comments']) ? split('&&',$data['Humor_Comments']) : " ";
      if(isset($data['Humor_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Humor_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Humor_Keywords']=$new_keyword;
      }
    $data['Confidence_Comments']= isset($data['Confidence_Comments']) ? split('&&',$data['Confidence_Comments']) : " ";
      if(isset($data['Confidence_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Confidence_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Confidence_Keywords']=$new_keyword;
      }
    $data['Fun_Comments']= isset($data['Fun_Comments']) ? split('&&',$data['Fun_Comments']) : " ";
      if(isset($data['Fun_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Fun_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Fun_Keywords']=$new_keyword;
      }
    $data['Kindness_Comments']= isset($data['Kindness_Comments']) ? split('&&',$data['Kindness_Comments']) : " ";
      if(isset($data['Kindness_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Kindness_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Kindness_Keywords']=$new_keyword;
      }
    $data['Honesty_Comments']= isset($data['Honesty_Comments']) ? split('&&',$data['Honesty_Comments']) : " ";
      if(isset($data['Honesty_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Honesty_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Honesty_Keywords']=$new_keyword;
      }
    $data['Dependability_Comments']= isset($data['Dependability_Comments']) ? split('&&',$data['Dependability_Comments']) : " ";
      if(isset($data['Dependability_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Dependability_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Dependability_Keywords']=$new_keyword;
      }
    $data['Satisfaction_Comments']= isset($data['Satisfaction_Comments']) ? split('&&',$data['Satisfaction_Comments']) : " ";
      if(isset($data['Satisfaction_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Satisfaction_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Satisfaction_Keywords']=$new_keyword;
      }
    $data['Ambition_Comments']= isset($data['Ambition_Comments']) ? split('&&',$data['Ambition_Comments']) : " ";
      if(isset($data['Ambition_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Ambition_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Ambition_Keywords']=$new_keyword;
      }
    $data['Humility_Comments']= isset($data['Humility_Comments']) ? split('&&',$data['Humility_Comments']) : " ";
      if(isset($data['Humility_Keywords'])){
        $new_keyword='';
        $max=0;
        $keywords=split('&&',$data['Humility_Keywords']);
        foreach($keywords as $keyword){
            if($keyword[0]>$max){
              $max=$keyword[0];
              $new_keyword=$keyword;
            }
        }
        $new_keyword=str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'',$new_keyword );
        $data['Humility_Keywords']=$new_keyword;
      }
    $data["pic"]="http://graph.facebook.com/" . $uid . "/picture?width=300&height=300";
    $_SESSION['dashboard']=$data;
    $conn=null;
	/* Modified to send to the new dashboard (Noah) */
    header('Location: /NEWTEMPLATE/dashboard.php'); //sends browser to questions page with Session Data containing questions input above
    flush();                             // Force php-output-cache to flush to browser.

  break;
  case 'submit'://a user submits a question
    $recipient=$_SESSION['recipient'];
    $attribute=isset( $_SESSION['attribute'] ) ? $_SESSION['attribute'] : "";
    $positive=isset( $_SESSION['positive'] ) ? $_SESSION['positive'] + "" : "";
    $slider=2*$_POST["slideVal"]; //Slider value needs to be multiplied by two since slider has 5 notches
    $comment=isset( $_POST["commentsVal"] ) ? $_POST["commentsVal"] : "";

    $affiliations=isset($_SESSION['affiliations']) ? $_SESSION['affiliations'] : "";
    $keywords=$slider>7 && $_SESSION['keywords']!="" ? $_SESSION['keywords']:"null";
    $vibe= new Vibe($uid, $recipient,$attribute,$keywords,$affiliations);
    if(!$positive){
      $slider=10-$slider;
    }
    $vibe->setAnswer($slider,$comment);
    $vibe->recordToTable();
    header('Location: /index.php?action=question');
    break;
  default: //this is the default setting, it simply take sthe user to the homepage. It also creates the facebook login url 
    global $facebook; //global is necessary to maintain scope. PHP has slightly different scope rules than other high level languages and this line is necessary to keep accessing the facebook api
    //when a user logs in through facebook, the are simply going to a special link created by the facebook api. The api uses our AP ID and password to generate the link
    $params = array(
                  'scope' => "friends_photos, user_groups, user_photos,user_education_history,read_friendlists,read_stream,user_work_history,user_photo_video_tags, friends_photo_video_tags,friends_education_history,friends_work_history", //these are the permissions Vibe needs from facebook
                  'redirect_uri' => 'http://localhost/index.php?action=login' //this is the link that facebook will redirect the browser to after succesful login
                );
    $loginUrl = $facebook->getLoginUrl($params); //the facebook getLoginUrl() is an api method that uses the permissions and redirct url to create a unique login url
    $_SESSION['loginUrl'] = $loginUrl; //the log in url is saved in the Session data so that the homepage can use it
    header('Location: /templates/homepage.php'); //the browser is redirected to the homepage. 
}
//question function responsible for using Vibe database and facebook fql database to generate a question and a user to ask the question about
function question(){
    //globals are necessary to maintain scope in PHP
    global $token;
    global $facebook;
    global $uid;
    
    //Useful variables are initialized here at the beginning of the code
    $question;
    $attribute;
    $random=rand(0,1); //random is set to 0 or 1
    $recipient=0;
    $name;
    
    //Placed in a while loop to make sure that php doesn't proceed without a valid user
    while(!$recipient){
        //if $random is 0, the code only uses top friends and picks from any of the vibe questions
        if($random==0){
            $question_source=getQuestion(14); //calls the getQuestion(int) function to get the data of a question out of the Vibosphere database. This is a php array
            $attribute=$question_source['id']; // $question_id is set to the attribute number in the table, this will be changed later to Attribute
            $question=$question_source['question']; //$question is set to the string of the question picked
            $result=$_SESSION['topFriends']; //the top friends array, which contains a users top friends, is returned and set to $result
            $_SESSION['keywords']=$question_source['keywords'];
            $random=rand(0,sizeof($result)-1); //random is set to an integer between 0(inclusive) and the size of the array of top friends(non inclusive)
            $recipient=$result[$random] ['uid']; //$random is used as the index of the top friends array and the user id is returned 
            $grab='https://graph.facebook.com/' . $recipient; //$grab is set to the graph url of the friend selected
            $data = json_decode(file_get_contents($grab), true); //the graph data is natively a json file, the stock php decode method is used to decode the user's json data to a 2d array
            $name=$data['name']; //name is set to the user's name
        }
        else{
            $question_source=getQuestion(5); //only the first four questions, which are first vibe questions, are used to get question data
            $question=$question_source['question']; //question String is set to $question
            $attribute=$question_source['id']; //question ID is set to $question_id, will later be changed to attribute
            $_SESSION['keywords']=$question_source['keywords'];
            $user=$_SESSION['friends'];
            $random=rand(0,sizeof($user['data']));
            $recipient=$user['data'][$random]['id'];
            $name=$user['data'][$random]['name'];
        } 
    }
    //$recipient=712337857;
    $question= str_replace("name", $name, $question); 
    $pic=getPictures($recipient);
    $_SESSION['affiliations']=friendAffiliations($recipient);
    $_SESSION['question'] = $question;
    $_SESSION['attribute'] = $attribute;
    $_SESSION['pic'] = $pic;
    $_SESSION['recipient'] = $recipient; 
}

function getPictures($recipient){
    global $facebook;
    $fql="SELECT src_big FROM photo WHERE aid IN (SELECT aid FROM album WHERE owner = $recipient AND type = 'profile') LIMIT 4; ";
    $param=array(//facebook api uses arrays to store components of query's and then runs them out of $facebook->api(array of parameters)
            'method'    => 'fql.query',
            'query'     => $fql,
            'callback'  => ''
        );
    $result = $facebook->api($param); //result is set to 3d array returned by the fql api. This is an expensive query, it takes the longest of any facebook api query
    $photos=array();
    foreach($result as $photo){
     $photos[]=$photo['src_big'];
    }
    while(sizeof($photos)<4){
      array_push($photos, "http://graph.facebook.com/" . $recipient . "/picture?width=300&height=300");
    }
    return $photos[0];
}
//addUser(int) function checks if a user is in the Vibosphere database, it adds them if they are not, activates them if they are in there but not active, and ignores if they are in the database
function addUser( $input_id ) {
    $input_id=$input_id."";
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT Active FROM user WHERE UID= $input_id"; //gets the active status of the user with $input_id as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $raw=$st->fetch(); //sets raw to be the raw data returned from the sql command, raw is always an array, even if only one element is being queried
    $active=$raw['Active']; //sets $active to the user's active status
    if(!$raw){ //if the user isn't in Vibosphere, they are added with a true active status
        $graph_url="https://graph.facebook.com/" . $input_id . "/?fields=gender"; //facebook graph api link is created to find gender
        $data = json_decode(file_get_contents($graph_url), true); //decoded json data is returned as an array using above graph api link
        $gender=$data['gender']; //$gender is set to user gender
        $affiliations=getAffiliations(); //$affiliations is set to result of affiliations function defined below
         $sql = "INSERT INTO user  (UID,Active,Gender,Communities) VALUES('$input_id','1','$gender','$affiliations')"; //user is added to Vibosphere database
        $st = $conn->prepare( $sql );
          $st->execute(); //query is executed
    }
    else { //the user is in the database but not active, theyare simply set to active
         $graph_url="https://graph.facebook.com/" . $input_id . "/?fields=gender"; //facebook graph api is used to create gender query
        $data = json_decode(file_get_contents($graph_url), true); //user data json is decrypted and returned as an array
        $gender=$data['gender']; //gender is set
        $affiliations=getAffiliations(); //affiliations is set to the result of the affilations function defined below
            $sql = "UPDATE user SET Active=1,Gender=$gender, Communities=$affiliations WHERE =$input_id;"; //query is set to update the user to active and add their gender and communities
             $st = $conn->prepare( $sql ); //protection line used to hide queries from browsers
             $st->execute(); //command above is executed
    }
    $conn=null; //connection to the database is closed. Must do this to prevent memory leaks and performance slowdowns
  }
//function used to create a list of a user's top friends. This function will only be called once per vibe session when the user first logs in.
// the top friends list is saved in the session and refered to whenever the user gets a close friends question. This is done for efficiency reasons
function topFriends(){
    // globals are necessary for scope reasons in php. The $uid $token and $facebook are just the same ones as earlier in index.php
    global $uid;
    global $token;
    global $facebook;
    $statuses = $facebook->api('/me/statuses');
    $top_frds=array();
    foreach($statuses['data'] as $status){
    // processing likes array for calculating fanbase. 
      foreach($status['likes']['data'] as $likesData){
          $top_frds[] = array('uid'=>$likesData['id']); 
      }
      foreach($status['comments']['data'] as $comArray){
     // processing comments array for calculating fanbase
                $top_frds[] =array('uid'=> $comArray['from']['id']); 
      }
    }
   
    $_SESSION['topFriends'] = $top_frds; //top friends is added to the session data to be used by the app whenever necessary
  }

//getQuestion(int) returns an question using the $input as the upward bound of questions that can be pulled
function getQuestion($input){
    $attribute= rand(1,$input); //4andom is set to a number between 1 and $input
    $random=rand(1,10);
    $question="Question" . $random;
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
    $sql = "SELECT $question, Attribute FROM question WHERE id=$attribute"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $question_source=$st->fetch(); //$question source is set to result of query
    $question=$question_source[0]; //sets question to the question field of the question table
    $keywords="";
    if(strpos($question, '(')){
      $keywords=strrchr($question, "("); //sets keywords in question string equal to keywords
      $question=substr($question,0,strrpos($question, '(')); //takes out keyword from question string
    }
    if(strpos($question, '*') === FALSE){
      $_SESSION['positive']=1;
    }
    else{
       $question=substr($question, 1);
      $_SESSION['positive']=0;
    }
    $attribute=$question_source[1]; //sets attribute

    $conn = null;
    return (array( // returns the the sql table id # of the question and its string. Will be changed later to return attribute and not ID #
            'id'    => $attribute,
            'question' => $question,
            'keywords' =>$keywords,
        ));
  }

//getAffilitaions() uses the facebook fql of the graph api to return a user's community
function getAffiliations(){
   global $facebook; //global variable necessary for scope in php
   $affiliations=array(); // intializs the affiliations array
       $fql="SELECT education,work FROM user WHERE uid= me()";  // fql query that returns a user's work and education information
       $param=array( //param aray is used to package queries in facebook's fql system
          'method'    => 'fql.query',
          'query'     => $fql,
          'callback'  => ''
      );
       $result  = $facebook->api($param); //result is set to the 5d array that is returned after executing the query above
       $education=$result[0]['education']; //education is set to the 3d education array that is 2 dimensions in from the result array
       foreach($education as $school){ //education array is iterated over and each school name is added to affiliations
           //php is shitty at concatenation so it is easier to add all the elements to an array and concatenate at the end
           array_push($affiliations, $school['school']['name'] . "&&");
       }
        $work=$result[0]['work']; //$ work is set to the 3d education array that is 2 dimensions in from result array
       foreach($work as $employer){ //work is iterated over and each employer name and location name is added to $affiliations
          $employer['employer']['id'];
           array_push($affiliations, $employer['employer']['name'] . "&&");
           array_push($affiliations, $employer['location']['name'] . "&&"); //I decided to the use the locations of a user's job because facebook doesn't have that info for schools
       }
       $sum=''; //sum is initialized
       foreach($affiliations as $id){// loops through all the $affiliations added in the above loops and concatenates them into one string seperated by "&&"
           $sum=$sum . $id; 
       }
       return substr($sum, 0, -2); //returns concatenated string of affiliations
}
function friendAffiliations($input){
   global $facebook; //global variable necessary for scope in php
   $affiliations=array(); // intializs the affiliations array
       $fql="SELECT education,work FROM user WHERE uid= $input";  // fql query that returns a user's work and education information
       $param=array( //param aray is used to package queries in facebook's fql system
          'method'    => 'fql.query',
          'query'     => $fql,
          'callback'  => ''
      );
       $result  = $facebook->api($param); //result is set to the 5d array that is returned after executing the query above
       $education=$result[0]['education']; //education is set to the 3d education array that is 2 dimensions in from the result array
       foreach($education as $school){ //education array is iterated over and each school name is added to affiliations
           //php is shitty at concatenation so it is easier to add all the elements to an array and concatenate at the end
           array_push($affiliations, $school['school']['name']."||". $school['school']['id'] . "&&");
       }
        $work=$result[0]['work']; //$ work is set to the 3d education array that is 2 dimensions in from result array
       foreach($work as $employer){ //work is iterated over and each employer name and location name is added to $affiliations
           array_push($affiliations, $employer['employer']['name'] . "||" . $employer['employer']['id'] .  "&&");
           array_push($affiliations, $employer['location']['name'] . "||". $employer['location']['id'] . "&&"); //I decided to the use the locations of a user's job because facebook doesn't have that info for schools
       }
       $affiliations=array_unique($affiliations);
       $sum=''; //sum is initialized
       foreach($affiliations as $id){// loops through all the $affiliations added in the above loops and concatenates them into one string seperated by "&&"
           $sum=$sum . $id; 
       }
       $sum;
       return substr($sum, 0, -2); //returns concatenated string of affiliations
}
?>