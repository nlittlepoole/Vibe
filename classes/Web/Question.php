<?php
require( CLASS_PATH . "/Web/User.php");
require( CLASS_PATH . "/Web/AchievementTrackers.php");
//question function responsible for using Vibe database and facebook fql database to generate a question and a user to ask the question about
function question($facebook,$uid,$token ){
    
    //Useful variables are initialized here at the beginning of the code
    $question;
    $attribute;
    $random=rand(0,4); //random is set from 0 to 4
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
		$question= str_replace("thelr", "their", $question); 
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

// COMPARISON QUESTION

function question2($facebook,$uid,$token ){
    
    //Useful variables are initialized here at the beginning of the code
    $question;
    $attribute;
    $random=rand(0,4); //random is set from 0 to 4
    //$random=0;
    // TWO RECIPIENTS
    $recipient1 = 0;
	$recipient2 = 0; 
    
    $name1;
    $name2; 
	
	$_SESSION['Name1'];
	$_SESSION['Name2'];
    
    //Placed in a while loop to make sure that php doesn't proceed without a valid user
    while((!$recipient1 || $recipient1 == $uid) && (!$recipient2 || $recipient2 == $uid)){
    	
        if(true){
        	// THIS CODE IS FOR TOP FRIENDS	
        	$question_source = getQuestion2(14); 
            $attribute = $question_source['id']; // $question_id is set to the attribute number in the table, this will be changed later to Attribute
            $question = $question_source['question']; //$question is set to the string of the question picked
            $result = $_SESSION['topFriends']; //the top friends array, which contains a users top friends, is returned and set to $result
            $_SESSION['keywords'] = $question_source['keywords'];
            $random1 = rand(0,sizeof($result) - 1); 
			$random2 = rand(0,sizeof($result) - 1); 
			while($random1 == $random2) {
				$random1 = rand(0,sizeof($result) - 1); 
			}
			
            $recipient1 = $result[$random1] ['uid']; //$random is used as the index of the top friends array and the user id is returned 
            $recipient2 = $result[$random2] ['uid'];
			
			while($recipient1 == $recipient2) {
				$random1 = rand(0,sizeof($result) - 1); 
				$recipient1 = $result[$random1] ['uid']; 
			}
            
            $grab1 = 'https://graph.facebook.com/' . $recipient1; //$grab is set to the graph url of the friend selected
            $grab2 = 'https://graph.facebook.com/' . $recipient2;
            
            $data1 = json_decode(file_get_contents($grab1), true); 
			$data2 = json_decode(file_get_contents($grab2), true);
            
            $name1 = $data1['name']; 
            $name2 = $data2['name'];
			
            $_SESSION['Gender1'] = $data['gender1'];
            $_SESSION['Name1'] = $name1;
			$_SESSION['Gender2'] = $data['gender2'];
            $_SESSION['Name2'] = $name2;
        }
        else{
        	// THIS CODE IS FOR NOT TOP FRIENDS
            $question_source = getQuestion(14);
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

    $pic1 = getPictures($recipient1);
	$pic2 = getPictures($recipient2);
	
    $_SESSION['affiliations1'] = getAffiliations($facebook,$recipient1,$token);
    $_SESSION['question'] = $question;
    $_SESSION['attribute'] = $attribute;
    $_SESSION['pic1'] = $pic1;
    $_SESSION['recipient1'] = $recipient1;
	
	$_SESSION['affiliations2'] = getAffiliations($facebook,$recipient2,$token);
    $_SESSION['pic2'] = $pic2;
    $_SESSION['recipient2'] = $recipient2;  
}

function getQuestion2($input){
    $attribute = rand(1,$input); //4andom is set to a number between 1 and $input
    $random = rand(1,10);

    $question = "Question" . $random;
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
    $sql = "SELECT $question, Attribute FROM comparison WHERE id=$attribute"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $question_source=$st->fetch(); //$question source is set to result of query
    $conn = null;
    $question = $question_source[0]; //sets question to the question field of the question table
    
    // KEYWORDS FOR NOW ARE EMPTY --> CHANGE THE TRANSACTION CODE TO ACCOMODATE THIS
    $keywords="";
    if(strpos($question, '*') === FALSE){
      $_SESSION['positive']=1;
    }
    else{
       $question=substr($question, 1);
      $_SESSION['positive']=0;
    }
    $_SESSION['null'] = 1; //CHANGE THIS TO ZERO IF THERE ARE NO SCORE TRACKING
     
    $attribute=$question_source[1]; //sets attribute

    return (array( // returns the the sql table id # of the question and its string. Will be changed later to return attribute and not ID #
            'id'    => $attribute,
            'question' => $question,
            'keywords' =>$keywords,
    ));
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
	totalpointachievementTrackers(); 
	
    require( CLASS_PATH . "/Vibe.php" );
	
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

// LDAPARSER

function zeroAnalysis($recipient1, $recipient2, $attribute) {
	
	// if there is space, add B to the threeblock
	// NAMEs of the threeblocks will be threeBlock1Attractiveness
	
	$nameThreeBlock1 = "threeBlock1" . $attribute; 
	$nameThreeBlock2 = "threeBlock2" . $attribute; 
	$nameThreeBlock3 = "threeBlock3" . $attribute; 
	
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$sql ="SELECT $nameThreeBlock1,$nameThreeBlock2,$nameThreeBlock3 FROM user WHERE UID=$recipient1 ";
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetch(); 
	
	$amount = 0; 
	// ADD TO THE THREEBLOCK IF NOT FULL YET
	for($i = 0; $i < count($data); $i++) {
		if($data[$i]) {
			//a UID exists in the threeblock
			$amount++; 
		}
	}
	
	// NOW WE LOOK AT TOTAL NUMBER OF THINGS STORED
	if($amount == 0) {
		//nothing yet in the threeblock, add the other person's UID to the beginning!
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE user SET $nameThreeBlock1='$recipient2' WHERE UID='$recipient1';";
		$st = $conn->prepare($sql);
		$st->execute();
		
		$conn = null; 
		
	}
	else if($amount == 1) {
		//only one thing in the threeblock
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE user SET $nameThreeBlock2='$recipient2' WHERE UID='$recipient1';";
		$st = $conn->prepare($sql);
		$st->execute();
		
		$conn = null; 
	}
	else if($amount == 2) {
		//two things in the threeblock but still room
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE user SET $nameThreeBlock3='$recipient2' WHERE UID='$recipient1';";
		$st = $conn->prepare($sql);
		$st->execute();
		
		$conn = null; 
	}
	else {
		//threeblock is full --> begin AVERAGE COMPARISON PHASE here
		
		//AVERAGE COMPARISON
		
		//REMEMBER TO ADD B AT THE END
		
	}
	$conn = null;
}

function averageComparison($attribute, $recipient2, $uid1, $uid2, $uid3) {
	//go into each on of the UIDs
	
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$sql ="SELECT $attribute FROM user WHERE UID=$uid1";	
	$sql2 ="SELECT $attribute FROM user WHERE UID=$uid2";
	$sql3 ="SELECT $attribute FROM user WHERE UID=$uid3";
	
	$st = $conn->prepare($sql);
	$st->execute();
	$data = $st->fetch(); 
	
	$value1; $value2; $value3; $totalValues = 0; 
	
	if($data[0] != 0) {
		//there is a recording!
		$totalValues++; 
		$value1 = $data[0]; 
	}
	
	$st2 = $conn->prepare($sql2);
	$st2->execute();
	$data2 = $st2->fetch(); 
	
	if($data2[0] != 0) {
		//there is a recording!
		$totalValues++; 
		$value2 = $data2[0]; 
	}
	
	$st3 = $conn->prepare($sql3);
	$st3->execute();
	$data3 = $st3->fetch(); 
	
	if($data3[0] != 0) {
		//there is a recording!
		$totalValues++; 
		$value3 = $data3[0]; 
	}
		
	//now you have the right value for totalValues so you can compute the weighted average	
		
	$conn = null;
}

function submit2($facebook,$uid,$token ){
	//This is the function that gets called when the user submits a question.
	$_SESSION['dashboard']['Points']=$_SESSION['dashboard']['Points'] + 1;
	helpinghandTracker(); 
	palTracker();
	advocateTracker(); 
	comradeTracker();
	motherteresaTracker();
	totalpointachievementTrackers(); 
	
    require( CLASS_PATH . "/Vibe.php" );
	
    $recipient1 = $_SESSION['recipient1'];
	$recipient2 = $_SESSION['recipient2'];
	
	$comment = ""; 
	
    $attribute = isset($_SESSION['attribute']) ? $_SESSION['attribute'] : "";
    $positive = isset($_SESSION['positive']) ? $_SESSION['positive'] + "" : "";
	
    $gender1 = isset($_SESSION['Gender2']) ? $_SESSION['Gender1']: "male";
	$gender2 = isset($_SESSION['Gender2']) ? $_SESSION['Gender2']: "male";
	
    $null = true;
	
	// look up their pre-existing Vibe scores for the trait
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$sql ="SELECT $attribute FROM user WHERE UID=$recipient1 ";
	$sql2 = "SELECT $attribute FROM user WHERE UID=$recipient2";
	$st = $conn->prepare($sql);
	$st->execute();
	$st2 = $conn->prepare($sql2);
	$st2->execute();
	$data = $st->fetch(); 
	$data2 = $st2->fetch(); 
	
	$conn = null;
	
	$prevScore1 = $data[0]; 
	$prevScore2 = $data2[0];
    
    // $slider = $_POST["slideVal"];
    $slider1 = 0; 
	$slider2 = 0; 
    
    $personPressed = $_POST["name1"];
	//$personPressed2 = $_POST["name2"];
	
	// NOW WE HAVE ALL OF THE CODE WE NEED FOR SETUP
	
	// HERE BEGINS THE OVERALL STRUCTURE OF PARSING WHAT TO DO
	
    if($personPressed != "" && $personPressed != null) {
    	// first person was pressed
		
		if(($prevScore1 == 0 && $prevScore2 == 0) || ($prevScore1 == null && $prevScore2 == null)) {
			// no data yet for either 
			
			$slider1 = 6; 
			$slider2 = 4; 
			
			$name1 = isset($_SESSION['Name1']) ? $_SESSION['Name1'] : "Unknown";
		    $affiliations1 = isset($_SESSION['affiliations1']) ? $_SESSION['affiliations1'] : "";
			
			$name2 = isset($_SESSION['Name2']) ? $_SESSION['Name2'] : "Unknown";
		    $affiliations2 = isset($_SESSION['affiliations2']) ? $_SESSION['affiliations2'] : "";
		    
		    $keywords = "null"; 
		    
		    $vibe = new Vibe($uid, $recipient1,$attribute,$keywords,$affiliations1,$gender1,$name1);
		    $vibe2 = new Vibe($uid, $recipient2,$attribute,$keywords,$affiliations2,$gender2,$name2);
			
		    if(!$positive){$slider1 = 10 - $slider1;}
			if(!$positive){$slider2 = 10 - $slider2;}
			
		    $vibe->setAnswer($slider1, $comment); 
		    $vibe->recordToTable();
		    
			$vibe2->setAnswer($slider2, $comment); 
		    $vibe2->recordToTable();
		}
		else if($prevScore1 == 0 && $prevScore2 != 0 || ($prevScore1 == null && $prevScore2 != null) || ($prevScore1 == 0 && $prevScore2 != null) || ($prevScore1 == 0 && $prevScore2 != null)) {
			// prevScore1 should be at least as high as prevScore2
			$slider1 = $prevScore2;
			
			// ONE TRANSACTION
			
			$name1 = isset($_SESSION['Name1']) ? $_SESSION['Name1'] : "Unknown";
		    $affiliations1 = isset($_SESSION['affiliations1']) ? $_SESSION['affiliations1'] : "";
		    
		    $keywords = "null"; 
		    
		    $vibe = new Vibe($uid, $recipient1,$attribute,$keywords,$affiliations1,$gender1,$name1);
			
		    if(!$positive){$slider1 = 10 - $slider1;}
			
		    $vibe->setAnswer($slider1, $comment); 
		    $vibe->recordToTable();
		}
		else if($prevScore1 != 0 && $prevScore2 == 0 || ($prevScore1 != null && $prevScore2 == null) || ($prevScore1 != 0 && $prevScore2 == null) || ($prevScore1 != 0 && $prevScore2 == null)) {
			// pointless since we do not know what prevScore2 is worth yet
			
			// DO NOTHING
		}
		else {
			// we have values for both so we can do some determinism based on values
			if($prevScore1 > $prevScore2) {
				// we got the output we expected
				
				if(($prevScore1 - $prevScore2 <= 2) && (10 - $prevScore1 < 2)) {
				
					$name1 = isset($_SESSION['Name1']) ? $_SESSION['Name1'] : "Unknown";
				    $affiliations1 = isset($_SESSION['affiliations1']) ? $_SESSION['affiliations1'] : "";
				    
				    $keywords = "null"; 
				    
				    $vibe = new Vibe($uid, $recipient1,$attribute,$keywords,$affiliations1,$gender1,$name1);
					
				    if(!$positive){$slider1 = 10 - $slider1;}
					
				    $vibe->setAnswer($slider1, $comment); 
				    $vibe->recordToTable();
				}
				else {
					// DO NOTHING
				}
			}
			else if($prevScore1 < $prevScore2){
				// we did NOT get the output we expected -- good!
				
				$slider1 = $prevScore2; 
				$slider2 = ($prevScore1 + $prevScore2) / 2; 
				
				$name1 = isset($_SESSION['Name1']) ? $_SESSION['Name1'] : "Unknown";
			    $affiliations1 = isset($_SESSION['affiliations1']) ? $_SESSION['affiliations1'] : "";
				
				$name2 = isset($_SESSION['Name2']) ? $_SESSION['Name2'] : "Unknown";
			    $affiliations2 = isset($_SESSION['affiliations2']) ? $_SESSION['affiliations2'] : "";
			    
			    $keywords = "null"; 
			    
			    $vibe = new Vibe($uid, $recipient1,$attribute,$keywords,$affiliations1,$gender1,$name1);
			    $vibe2 = new Vibe($uid, $recipient2,$attribute,$keywords,$affiliations2,$gender2,$name2);
				
			    if(!$positive){$slider1 = 10 - $slider1;}
				if(!$positive){$slider2 = 10 - $slider2;}
				
			    $vibe->setAnswer($slider1, $comment); 
			    $vibe->recordToTable();
			    
				$vibe2->setAnswer($slider2, $comment); 
			    $vibe2->recordToTable();
			}
			else {
				// do the increment one of total for the one that won!
				
				$slider1 = $prevScore1; 
				
				$name1 = isset($_SESSION['Name1']) ? $_SESSION['Name1'] : "Unknown";
			    $affiliations1 = isset($_SESSION['affiliations1']) ? $_SESSION['affiliations1'] : "";
			    
			    $keywords = "null"; 
			    
			    $vibe = new Vibe($uid, $recipient1,$attribute,$keywords,$affiliations1,$gender1,$name1);
				
			    if(!$positive){$slider1 = 10 - $slider1;}
				
			    $vibe->setAnswer($slider1, $comment); 
			    $vibe->recordToTable();
			}
		}
    }
	else {
		// second person was pressed
		
		if(($prevScore1 == 0 && $prevScore2 == 0) || ($prevScore1 == null && $prevScore2 == null)) {
			// no data yet for either 
			
			$slider1 = 4; 
			$slider2 = 6; 
			
			$name1 = isset($_SESSION['Name1']) ? $_SESSION['Name1'] : "Unknown";
		    $affiliations1 = isset($_SESSION['affiliations1']) ? $_SESSION['affiliations1'] : "";
			
			$name2 = isset($_SESSION['Name2']) ? $_SESSION['Name2'] : "Unknown";
		    $affiliations2 = isset($_SESSION['affiliations2']) ? $_SESSION['affiliations2'] : "";
		    
		    $keywords = "null"; 
		    
		    $vibe = new Vibe($uid, $recipient1,$attribute,$keywords,$affiliations1,$gender1,$name1);
		    $vibe2 = new Vibe($uid, $recipient2,$attribute,$keywords,$affiliations2,$gender2,$name2);
			
		    if(!$positive){$slider1 = 10 - $slider1;}
			if(!$positive){$slider2 = 10 - $slider2;}
			
		    $vibe->setAnswer($slider1, $comment); 
		    $vibe->recordToTable();
		    
			$vibe2->setAnswer($slider2, $comment); 
		    $vibe2->recordToTable();
		}
		else if($prevScore1 == 0 && $prevScore2 != 0 || ($prevScore1 == null && $prevScore2 != null) || ($prevScore1 == 0 && $prevScore2 != null) || ($prevScore1 == 0 && $prevScore2 != null)) {
			// slider2 should be at least as high as prevScore1
			
			$slider2 = $prevScore1;
			
			// ONE TRANSACTION
			
			$name2 = isset($_SESSION['Name2']) ? $_SESSION['Name2'] : "Unknown";
		    $affiliations2 = isset($_SESSION['affiliations2']) ? $_SESSION['affiliations2'] : "";
		    
		    $keywords = "null"; 
		    
		    $vibe = new Vibe($uid, $recipient2,$attribute,$keywords,$affiliations2,$gender2,$name2);
			
		    if(!$positive){$slider2 = 10 - $slider2;}
			
		    $vibe->setAnswer($slider2, $comment); 
		    $vibe->recordToTable();
		}
		else if($prevScore1 != 0 && $prevScore2 == 0 || ($prevScore1 != null && $prevScore2 == null) || ($prevScore1 != 0 && $prevScore2 == null) || ($prevScore1 != 0 && $prevScore2 == null)) {
			// pointless because we do not know what prevScore1 is worth yet
			
			// DO NOTHING
		}
		else {
			// we have values for both so we can do some determinism based on values
			if($prevScore1 > $prevScore2) {
				// we did NOT get the output we expected -- good!
				
				$slider1 = ($prevScore1 + $prevScore2) / 2; 
				$slider2 = $prevScore1; 
				
				$name1 = isset($_SESSION['Name1']) ? $_SESSION['Name1'] : "Unknown";
			    $affiliations1 = isset($_SESSION['affiliations1']) ? $_SESSION['affiliations1'] : "";
				
				$name2 = isset($_SESSION['Name2']) ? $_SESSION['Name2'] : "Unknown";
			    $affiliations2 = isset($_SESSION['affiliations2']) ? $_SESSION['affiliations2'] : "";
			    
			    $keywords = "null"; 
			    
			    $vibe = new Vibe($uid, $recipient1,$attribute,$keywords,$affiliations1,$gender1,$name1);
			    $vibe2 = new Vibe($uid, $recipient2,$attribute,$keywords,$affiliations2,$gender2,$name2);
				
			    if(!$positive){$slider1 = 10 - $slider1;}
				if(!$positive){$slider2 = 10 - $slider2;}
				
			    $vibe->setAnswer($slider1, $comment); 
			    $vibe->recordToTable();
			    
				$vibe2->setAnswer($slider2, $comment); 
			    $vibe2->recordToTable();
			}
			else if($prevScore1 < $prevScore2){
				// we got the output we expected
				
				if(($prevScore2 - $prevScore1 <= 2) && (10 - $prevScore2 < 2)) {
				
					$name2 = isset($_SESSION['Name2']) ? $_SESSION['Name2'] : "Unknown";
				    $affiliations2 = isset($_SESSION['affiliations2']) ? $_SESSION['affiliations2'] : "";
				    
				    $keywords = "null"; 
				    
				    $vibe = new Vibe($uid, $recipient2,$attribute,$keywords,$affiliations2,$gender2,$name2);
					
				    if(!$positive){$slider2 = 10 - $slider2;}
					
				    $vibe->setAnswer($slider2, $comment); 
				    $vibe->recordToTable();
				}
				else {
					// DO NOTHING
				}
			}
			else {
				// do the increment one of total for the one that won!
				
				$slider2 = $prevScore2; 
				
				$name2 = isset($_SESSION['Name2']) ? $_SESSION['Name2'] : "Unknown";
			    $affiliations2 = isset($_SESSION['affiliations2']) ? $_SESSION['affiliations2'] : "";
			    
			    $keywords = "null"; 
			    
			    $vibe = new Vibe($uid, $recipient2,$attribute,$keywords,$affiliations2,$gender2,$name2);
				
			    if(!$positive){$slider2 = 10 - $slider2;}
				
			    $vibe->setAnswer($slider2, $comment); 
			    $vibe->recordToTable();
			}
		}
	}
    // NOTE: In this case, there is no '$comment'
}
?>