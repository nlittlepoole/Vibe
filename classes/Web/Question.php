<?php
require( CLASS_PATH . "/Web/User.php");
require( CLASS_PATH . "/Web/AchievementTrackers.php");
//question function responsible for using Vibe database and facebook fql database to generate a question and a user to ask the question about
function question($facebook,$uid,$token ){
    
    //Useful variables are initialized here at the beginning of the code
    $question;
    $attribute;
    $random=rand(0,4); //random is set to 0 or 1
    //$random=0;
    $recipient=0;
    $name;
    
    //Placed in a while loop to make sure that php doesn't proceed without a valid user
    while(!$recipient || $recipient==$uid){
        //if $random is 0, the code only uses top friends and picks from any of the vibe questions
        if($random<4){
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
            $_SESSION['Gender']=$data['gender'];
            $_SESSION['Name']=$name;
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
            $_SESSION['Name']=$name;
            $grab='https://graph.facebook.com/' . $recipient; //$grab is set to the graph url of the friend selected
            $data = json_decode(file_get_contents($grab), true); //the graph data is natively a json file, the stock php decode method is used to decode the user's json data to a 2d array
            $_SESSION['Gender']=$data['gender'];
        } 
    }
    //$recipient=712337857;
    $question= str_replace("name", $name, $question); 
    if($_SESSION['Gender']=="female"){
        $question= str_replace("their", "her", $question);
        $question= str_replace("themselves", "herself", $question); 
        $question= str_replace("them", "her", $question);  
		$question= str_replace("ther", "their", $question); 
    }
    else{
        $question= str_replace("their", "his", $question); 
        $question= str_replace("themselves", "himself", $question);
        $question= str_replace("attractive", "good looking", $question); 
        $question= str_replace("them", "him", $question);  
		$question= str_replace("thelr", "their", $question); 
		$question= str_replace("suit", "dress", $question); 
    }
    $pic=getPictures($recipient);
    $_SESSION['affiliations']=getAffiliations($facebook,$recipient,$token);
    $_SESSION['question'] = $question;
    $_SESSION['attribute'] = $attribute;
    $_SESSION['pic'] = $pic;
    $_SESSION['recipient'] = $recipient; 
}



//getQuestion(int) returns an question using the $input as the upward bound of questions that can be pulled
function getQuestion($input){
    $attribute= rand(1,$input); //4andom is set to a number between 1 and $input
    $random=rand(1,3);
    //$random=1;
    if($random>1){
      $random=rand(2,10);
    }
    else{
      $random=1;
    }
    $question="Question" . $random;
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
    $sql = "SELECT $question, Attribute FROM question WHERE id=$attribute"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $question_source=$st->fetch(); //$question source is set to result of query
    $conn = null;
    $question=$question_source[0]; //sets question to the question field of the question table
    $keywords="";
    if(strpos($question, '(')){
      $keywords=strrchr($question, "("); //sets keywords in question string equal to keywords
      $keywords=split('&&',$keywords);
      if(count($keywords)>1){
        $keywords[0]=$keywords[0].")";
        $keywords[1]="(".$keywords[1];
      }
      $question=substr($question,0,strrpos($question, '(')); //takes out keyword from question string
    }
    if(strpos($question, '*') === FALSE){
      $_SESSION['positive']=1;
    }
    else{
       $question=substr($question, 1);
      $_SESSION['positive']=0;
    }
    if(strpos($question, '^') === FALSE){
      $_SESSION['null']=1;
    }
    else{
      $question=substr($question, 1);
      $_SESSION['null']=0;
    }    
    $attribute=$question_source[1]; //sets attribute

    return (array( // returns the the sql table id # of the question and its string. Will be changed later to return attribute and not ID #
            'id'    => $attribute,
            'question' => $question,
            'keywords' =>$keywords,
    ));
}

function submit($facebook,$uid,$token ){
	//This is the function that gets called when the user submits a question.
	$_SESSION['dashboard']['Points']=$_SESSION['dashboard']['Points']+1;
	helpinghandTracker(); 
	palTracker();
	advocateTracker(); 
	comradeTracker();
	motherteresaTracker();
	
    require( CLASS_PATH . "/Vibe.php" );
    //notify($facebook,$uid,$token);
	
    $recipient=$_SESSION['recipient'];
    $attribute=isset( $_SESSION['attribute'] ) ? $_SESSION['attribute'] : "";
    $positive=isset( $_SESSION['positive'] ) ? $_SESSION['positive'] + "" : "";
    $gender=isset( $_SESSION['Gender'] ) ? $_SESSION['Gender']: "male";
    $null=isset( $_SESSION['null'] ) ? $_SESSION['null'] + "" : "";
    
    $slider=2*$_POST["slideVal"]; //Slider value needs to be multiplied by two since slider has 5 notches
    $comment=isset( $_POST["commentsVal"] ) && $_POST["commentsVal"]!="" ? $attribute ."##" .date("Y-m-d H:i:s", time())."##". $_SESSION['question'] . ": " .'"' .str_replace(":","{(!)}",(str_replace(array("|",'"',"##","&&",":"),'',$_POST["commentsVal"]) . '"')) ."##" .$uid : "";
    $comment=str_replace("'","***",$comment);
    
    $name=isset($_SESSION['Name']) ?$_SESSION['Name']:"Unknown";
    $affiliations=isset($_SESSION['affiliations']) ? $_SESSION['affiliations'] : "";
    $keywords=$slider>7 && $_SESSION['keywords']!="" ? $_SESSION['keywords'][0]:"null";
    
    if($keywords=="" || $keywords=="null"){
      $keywords=$slider<3 && isset($_SESSION['keywords'][1])  ? $_SESSION['keywords'][1]:"null";
    }
    
    $vibe= new Vibe($uid, $recipient,$attribute,$keywords,$affiliations,$gender,$name);
    
    if(!$positive){
      $slider=10-$slider;
    }
	
    if(!$null){
      $slider="null";
    }
	
    $vibe->setAnswer($slider,$comment);
    $vibe->recordToTable();
}
?>