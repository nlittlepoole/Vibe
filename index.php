<?php
require( "config.php" );
require("php-sdk/facebook.php");
session_start();

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$config = array();
$config['appId'] = '162254093981266';
$config['secret'] = '7387b4372a38f8db30ae8834dd193c5b'; 
$facebook = new Facebook($config);
echo $uid = $facebook->getUserFromAccessToken();

switch ( $action ) {
  case 'login':
    //addUser($uid);
    //topFriends();
   //header('Location: /index.php?action=question');
    break;
  case 'question':
      $params = array( 'next' => 'http://nl2418.kd.io' );
      $_SESSION['logoutUrl'] = $facebook->getLogoutUrl($params); 
   question();
  header('Location: /templates/questions.php');
    break;
  default:
    global $facebook;
    $params = array(
                  'scope' => "friends_photos, user_groups, user_photos,user_education_history,read_friendlists,read_stream,user_work_history",
                  'redirect_uri' => 'http://vibe-c9-nl2418.c9.io/index.php?action=login'
                 ////'cookie' => true
                );
    $loginUrl = $facebook->getLoginUrl($params);
    $_SESSION['loginUrl'] = $loginUrl;
    header('Location: /templates/homepage.php');
}
function question(){
    global $token;
    global $facebook;
    global $uid;

    $question;
    $question_id;
    $random=rand(0,1);
    $recipient;
    $name;
    while(!$recipient){
        if($random==0){
            $question_source=getQuestion(20);
            $question_id=$question_source['id'];
            $question=$question_source['question'];
            $result=$_SESSION['topFriends'];
            $random=rand(0,sizeof($result));
            for ($x=0; $x<=$random; $x++){
                $recipient=$result[$x] ['uid'];
            }  
            $grab='https://graph.facebook.com/' . $recipient;
            $data = json_decode(file_get_contents($grab), true);
            $name=$data['name'];
        }
        else{
            $question_source=getQuestion(4);
            $question=$question_source['question'];
            $question_id=$question_source['id'];
              $graph_url="https://graph.facebook.com/" . $uid . "/friends?access_token=" . $token;
            $user = json_decode(file_get_contents($graph_url), true);
            $college = null;
            $peopleid=array();
            $names=array();
            foreach($user["data"] as $education) {
                 $college = $education;
                 array_push($peopleid, $college['id']);
                 array_push($names, $college['name']);
            }
            $random=rand(0,sizeof($peopleid));
            $recipient=$peopleid[$random];
            $name=$names[$random];  
        } 
    }

       

    $expanded = explode(" ", $name);
    $question= str_replace(" I ", " " . $expanded[0] . " ", $question);
    $pic="http://graph.facebook.com/" . $recipient . "/picture?width=200&height=200";
    $_SESSION['name'] = $name;
    $_SESSION['question'] = $question;
    $_SESSION['question_id'] = $question_id;
    $_SESSION['pic'] = $pic;
    $_SESSION['recipient'] = $recipient; 
}
function addUser( $input_id ) {
    global $facebook;
    

    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    
    $sql = "SELECT Active FROM user WHERE id= $input_id";
    $st = $conn->prepare( $sql );
    $st->execute();
    echo $raw=$st->fetch();
    $add=$raw['Active'];
    if(!$raw){
        $graph_url="https://graph.facebook.com/" . $input_id . "/?fields=gender";
        $data = json_decode(file_get_contents($graph_url), true);
        $gender=$data['gender'];
        $affiliations=getAffiliations();
         echo 'Add new User';
         $sql = "INSERT INTO user  (id,Active,Gender,Communities) VALUES('$input_id','1','$gender','$affiliations')";
        $st = $conn->prepare( $sql );
          $st->execute();
    }
    else if($add==0){
         $graph_url="https://graph.facebook.com/" . $input_id . "/?fields=gender";
        $data = json_decode(file_get_contents($graph_url), true);
        $gender=$data['gender'];
        $affiliations=getAffiliations();
            $sql = "UPDATE user SET Active=1,Gender=$gender, Communities=$affiliations WHERE id=$input_id;";
             $st = $conn->prepare( $sql );
             $st->execute();
            echo 'Activate User';
    }
    $conn=null;
  }
function topFriends(){
      global $uid;
      global $token;
      global $facebook;
    $fql="SELECT actor_id FROM stream WHERE actor_id!=me() AND filter_key = 'others' AND source_id = me() LIMIT 300";
    $param=array(
            'method'    => 'fql.query',
            'query'     => $fql,
            'callback'  => ''
        );
    $result   = $facebook->api($param);
    $top_frds=array();
    foreach($result as $result1)
    {
        $top_frds[]=$result1['actor_id'];
    }
    $new_array = array();
    foreach ($top_frds as $key => $value) {
        if(isset($new_array[$value]))
             $new_array[$value] += 1;
        else
            $new_array[$value] = 1;
    }
    $top_frds=array();
    foreach($new_array as $tuid => $trate){
        $top_frds[]=array('uid'=>$tuid,'rate'=>$trate);
    }
    $_SESSION['topFriends'] = $top_frds;
  }
  
function getQuestion($input){
    $question_number= rand(1,$input);
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT Question FROM question WHERE id=$question_number";
    $st = $conn->prepare( $sql );
    $st->execute();
    $question_source=$st->fetch();
    $conn = null;
    return (array(
            'id'    => $random,
            'question' => $question_source,
        ));
  }
function getAffiliations(){
    global $facebook;
     $affiliations=array();
         $fql="SELECT education,work FROM user WHERE uid= me()";
         $param=array(
            'method'    => 'fql.query',
            'query'     => $fql,
            'callback'  => ''
        );
         $result  = $facebook->api($param);
         $education=$result[0]['education'];
         foreach($education as $school){
              $school['school']['id'];
             array_push($affiliations, $school['school']['id'] . "&&");
         }
          $work=$result[0]['work'];
         foreach($work as $employer){
            $employer['employer']['id'];
             array_push($affiliations, $employer['employer']['id'] . "&&");
             array_push($affiliations, $employer['location']['id'] . "&&");
         }
         $sum='';
         foreach($affiliations as $id){
             $sum=$sum . $id;
         }
         return $sum;
}
?>