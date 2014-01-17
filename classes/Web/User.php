<?php
function removeComment($comments,$index){
  $comments=split('&&',$comments);
  unset($comments[$index]); // remove item at index 0
  $comments = array_values($comments);
  $result='';
  foreach($comments as $comment){
    $result=$result.$comment."&&";
  }
  return substr($result,0,-2);
}
/*
Checks if user is in the database
*/
function checkUID($uid){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT id FROM user WHERE UID= $uid"; //gets the active status of the user with $uid as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $raw=$st->fetch();
    if(!$raw){
      return false;
    }
    else{
     return true; 
    } 
}
/*
Reports user for spam
*/
function reportSpam($id,$id2){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT Spam FROM user WHERE UID= $id2"; //gets the active status of the user with $uid as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $raw=$st->fetch();
    $spam=strpos($raw[0], $id) !== FALSE ? $raw[0] : $raw[0] ."##" . $id;
    echo $sql = "UPDATE user SET Spam='$spam' WHERE UID= '$id2'"; //gets the active status of the user with $uid as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
}
/*
Checks if user is in the database
*/
function checkFriend($uid){
    $friends=$_SESSION['friends']['data'];
    foreach($friends as $friend){
      if($friend['id']=$uid){
        return true;
      }
    }
    return false;
}
/*
Returns true if user exists and is active, otherwise false
*/
function checkActive($uid){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT Active FROM user WHERE UID= $uid"; //gets the active status of the user with $uid as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $raw=$st->fetch();
    if(!$raw){
      return false;
    }
    else{
     return true; 
    } 
}
function refresh($uid){
  $datetime1;
  if(!$_SESSION['refresh']){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT LastLogin FROM user WHERE UID= $uid"; //gets the active status of the user with $uid as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $raw=$st->fetch();
    $datetime1 = new DateTime($raw[0]);
  }
  else{
    $datetime1=$_SESSION['refresh'];
  }
  $datetime2 = new DateTime(date("Y-m-d H:i:s", time()));
  
  $interval = $datetime1->diff($datetime2);
  $time=$interval->format('%i');
  return ((int)$time)>5;
}
//addUser(int) function checks if a user is in the Vibosphere database, it adds them if they are not, activates them if they are in there but not active, and ignores if they are in the database
function addUser( $facebook,$uid,$token ) {
    $check=checkUID($uid);
    $now=date("Y-m-d H:i:s", time());
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    if(!$check){ //if the user isn't in Vibosphere, they are added with a true active status
        $graph_url="https://graph.facebook.com/" . $uid . "/?fields=gender,name"; //facebook graph api link is created to find gender
        $data = json_decode(file_get_contents($graph_url), true); //decoded json data is returned as an array using above graph api link
        $gender=$data['gender']; //$gender is set to user gender
        $name=$data['name'];
        $friends= sizeof($_SESSION['friends']['data']);
        $affiliations=getAffiliations($facebook,$uid,$token); //$affiliations is set to result of affiliations function defined below
         echo $sql = "INSERT INTO user  (Name,UID,Active,Gender,Communities,Friends,LastLogin) VALUES('$name','$uid','1','$gender','$affiliations',$friends,'$now')"; //user is added to Vibosphere database
        $st = $conn->prepare( $sql );
          $st->execute(); //query is executed
    }
    else { //the user is in the database but not active, theyare simply set to active
        $graph_url="https://graph.facebook.com/" . $uid . "/?fields=gender,name"; //facebook graph api is used to create gender query
        $data = json_decode(file_get_contents($graph_url), true); //user data json is decrypted and returned as an array
        $gender=$data['gender']; //gender is set
        $name=$data['name'];
        $friends= sizeof($_SESSION['friends']['data']);
        $affiliations=getAffiliations($facebook,$uid,$token); //affiliations is set to the result of the affilations function defined below
             echo $sql = "UPDATE user SET Active='1',Gender='$gender', Communities='$affiliations',  Name='$name', Friends=$friends, LastLogin='$now' WHERE UID='$uid';"; //query is set to update the user to active and add their gender and communities
             $st = $conn->prepare( $sql ); //protection line used to hide queries from browsers
             $st->execute(); //command above is executed
    }
    $conn=null; //connection to the database is closed. Must do this to prevent memory leaks and performance slowdowns
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
function array_delete($array, $element) {
    return array_diff($array, [$element]);
}

//function used to create a list of a user's top friends. This function will only be called once per vibe session when the user first logs in.
// the top friends list is saved in the session and refered to whenever the user gets a close friends question. This is done for efficiency reasons
function topFriends($facebook,$uid,$token){
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
    $top_frds=array_delete($top_frds,$uid);
    $_SESSION['topFriends'] = $top_frds;
    print_r($_SESSION['topFriends']); //top friends is added to the session data to be used by the app whenever necessary
  }
  //getAffilitaions() uses the facebook fql of the graph api to return a user's community
function getAffiliations($facebook,$uid,$token){
       $result = $facebook->api('/'.$uid.'?fields=location,hometown,education,work');
       $affiliations=array();
       $hometown=$result['hometown']; //education is set to the 3d education array that is 2 dimensions in from the result array
       array_push($affiliations, $hometown['name']."||". $hometown['id'] . "&&");
       $location=$result['location']; //education is set to the 3d education array that is 2 dimensions in from the result array
       array_push($affiliations, $location['name']."||". $location['id'] . "&&");
       $education=$result['education']; //education is set to the 3d education array that is 2 dimensions in from the result array
       $index=sizeof($education)-1;
       array_push($affiliations, $education[$index]['school']['name']."||". $education[$index]['school']['id'] . "&&");
       $work=$result['work']; //education is set to the 3d education array that is 2 dimensions in from the result array
       $index=sizeof($work)-1;
       array_push($affiliations, $work[$index]['employer']['name']."||". $work[$index]['employer']['id'] . "&&");
       $affiliations=array_unique($affiliations);
       $sum=''; //sum is initialized
       foreach($affiliations as $id){// loops through all the $affiliations added in the above loops and concatenates them into one string seperated by "&&"
           if($id!="||"){
              $sum=$sum . $id; 
           }
       }
       return substr($sum, 0, -2); //returns concatenated string of affiliations
       
}
function getPercentiles($community,$score){
  $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
  echo $sql = "SELECT Attribute,Average, Deviation FROM `$community`"; //sql query that returns the string of the question in the table
  $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
  $st->execute();//executes query above
  $stats=$st->fetchAll(); //$question source is set to result of query
  $result=Array();
  $positive=true;
  foreach($stats as $stat){
    if($stat[2]>0){
      $avg=$stat[1];
      $dev=$stat[2];
      $temp=($score[$stat['Attribute']]-$avg)/$dev;
      $positive=$temp>0;
      $percentile=cdf_2tail($temp);
      if($positive){
        $percentile=1-$percentile/2;
      }
      else{
        $percentile=$percentile/2;
      }
      $result[$stat['Attribute']]=$percentile>0.15 ? (int)($percentile*100)."%" :"N/A";
    }
    else{
      $result[$stat['Attribute']]="N/A";
    }

  }
    $conn = null;
    return $result;
}
function erf($x)
{
    $pi = 3.1415927;
    $a = (8*($pi - 3))/(3*$pi*(4 - $pi));
    $x2 = $x * $x;

    $ax2 = $a * $x2;
    $num = (4/$pi) + $ax2;
    $denom = 1 + $ax2;

    $inner = (-$x2)*$num/$denom;
    $erf2 = 1 - exp($inner);

    return sqrt($erf2);
}

function cdf($n)
{
         return (1 - erf($n / sqrt(2)))/2;
         //I removed the $n < 0 test which inverses the +1/-1
}

function cdf_2tail($n)
{
        return 2*cdf($n);
            //After a little more digging around, the two tail test is simply 2 x the cdf.
}
?>