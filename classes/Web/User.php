<?php
//addUser(int) function checks if a user is in the Vibosphere database, it adds them if they are not, activates them if they are in there but not active, and ignores if they are in the database
function addUser( $input_id ) {
    $input_id=$input_id."";
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT id FROM user WHERE UID= $input_id"; //gets the active status of the user with $input_id as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $raw=$st->fetch(); //sets raw to be the raw data returned from the sql command, raw is always an array, even if only one element is being queried
    if(!$raw){ //if the user isn't in Vibosphere, they are added with a true active status
        $graph_url="https://graph.facebook.com/" . $input_id . "/?fields=gender,name"; //facebook graph api link is created to find gender
        $data = json_decode(file_get_contents($graph_url), true); //decoded json data is returned as an array using above graph api link
        $gender=$data['gender']; //$gender is set to user gender
        $name=$data['name'];
        $affiliations=getAffiliations(); //$affiliations is set to result of affiliations function defined below
         $sql = "INSERT INTO user  (Name,UID,Active,Gender,Communities) VALUES('$name','$input_id','1','$gender','$affiliations')"; //user is added to Vibosphere database
        $st = $conn->prepare( $sql );
          $st->execute(); //query is executed
    }
    else { //the user is in the database but not active, theyare simply set to active
        $graph_url="https://graph.facebook.com/" . $input_id . "/?fields=gender,name"; //facebook graph api is used to create gender query
        $data = json_decode(file_get_contents($graph_url), true); //user data json is decrypted and returned as an array
        $gender=$data['gender']; //gender is set
        $name=$data['name'];
        $affiliations=getAffiliations(); //affiliations is set to the result of the affilations function defined below
            echo $sql = "UPDATE user SET Active='1',Gender='$gender', Communities='$affiliations',  Name='$name' WHERE UID='$input_id';"; //query is set to update the user to active and add their gender and communities
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
           array_push($affiliations, $school['school']['name']."||". $school['school']['id'] . "&&");
       }
        $work=$result[0]['work']; //$ work is set to the 3d education array that is 2 dimensions in from result array
       foreach($work as $employer){ //work is iterated over and each employer name and location name is added to $affiliations
          $employer['employer']['id'];
           array_push($affiliations, $employer['employer']['name'] . "||" . $employer['employer']['id'] .  "&&");
           array_push($affiliations, $employer['location']['name'] . "||". $employer['location']['id'] . "&&"); //I decided to the use the locations of a user's job because facebook doesn't have that info for schools
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