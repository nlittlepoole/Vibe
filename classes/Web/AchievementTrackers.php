<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . "/config.php");

function helpinghandTracker() {
	
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT fiveblockHelpingHand,HelpingHand_progress,counterHelpingHand,lastdateHelpingHand FROM user WHERE UID=" . $_SESSION['userID'];
    $st = $conn->prepare($sql);
    $st->execute();
    $data = $st->fetch();
	
	$st->execute();
				  
	$conn = null; 
	
	//TEST CODE
	
	
	if($data['HelpingHand_progress'] != 10) {
		if($data['fiveblockHelpingHand'] != 5) {
			// the five-block is not yet full so your question will increment five block
			$fiveblockVar = $data['fiveblockHelpingHand'] + 1;
			// now check if five-block is 5 so you can increment counter!
			if($fiveblockVar == 5) {

		      	  // they have the achievement for helping hand!
		      	  $data['HelpingHand_progress'] = 10; // update progress
		      	  
		      	  $newDate = date('Y-m-d'); 
		      	  
		      	  $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
				  $sql = "UPDATE user SET counterHelpingHand=1, HelpingHand_progress=10,lastdateHelpingHand='$newDate',fiveblockHelpingHand=5 WHERE UID=" . $_SESSION['userID'];
				  $st = $conn->prepare($sql);
			      $st->execute();
				
				  $conn = null;   	  
				  return;
			}
			else  {
				// Update the user's five block number in the database since now it is indeed one higher!
				$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			
			    $sql = "UPDATE user SET fiveblockHelpingHand=$fiveblockVar WHERE UID=" . $_SESSION['userID'];
			    $st = $conn->prepare($sql);
		        $st->execute();
				
				$conn = null; 
				return;
			}
		}
	    else {
	    	// the five block is already 5 so do not do anything
	    	// the user has already capped out the number of questions for the day and counter has already been incremented
	    }
	}
	else {
		// do nothing because the user already has the achievement
	}
	 
	
}

function advocateTracker() {
	
	$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT fiveblockAdvocate,Advocate_progress,counterAdvocate,lastdateAdvocate FROM user WHERE UID=" . $_SESSION['userID'];
    $st = $conn->prepare($sql);
    $st->execute();
    $data = $st->fetch();
	
	$conn = null; 
	
	if($data['Advocate_progress'] != 10) {
		if($data['fiveblockAdvocate'] != 5) {
			// the five-block is not yet full so your question will increment five block
			$data['fiveblockAdvocate']++;
			// now check if five-block is 5 so you can increment counter!
			if($data['fiveblockAdvocate'] == 5) {
				  // the user now has answered five questions so increment counter, but only if it has been one day GMT
				  
				  // GIVEN THAT THE USER HAS ALREADY DONE A PREVIOUS FIVE BLOCK --> ALSO CHECK IF "" IS INDEED NULL CONDITION
				  if($data['lastdateAdvocate'] != "") {
					  $currentDatetime = date('Y-m-d');
				      $datetime1 = $data['lastdateAdvocate'];
					  
					  $currentTime = explode("-", $currentDatetime);
					  $currentYear = $currentTime[0]; 
					  $currentMonth = $currentTime[1]; 
					  $currentDay = $currentTime[2]; 
					  
					  $prevTime = explode("-", $datetime1);
					  $prevYear = $prevTime[0]; 
					  $prevMonth = $prevTime[1]; 
					  $prevDay = $prevTime[2]; 
					  
					  if(($currentYear - $prevYear == 0) && ($currentMonth - $prevMonth == 0) && ($currentDay - $prevDay == 1)) {
					      // the user has indeed completed their last five-block yesterday GMT
					      
					      // so now we can increment counter for them, but first we must check if now they have the achievement
					      $data['counterAdvocate']++;
						  $data['Advocate_progress'] = $data['Advocate_progress'] + 3; 
						  
					      // do they have the achievement?
					      if($data['counterAdvocate'] == 3) {
					      	  // they have the achievement for advocate!
					      	  $data['Advocate_progress'] = 10; // update progress
					      	  
					      	  $newDate = date('Y-m-d'); 
					      	  
					      	  $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	    					  $sql = "UPDATE user SET counterAdvocate=3, Advocate_progress=10,lastdateAdvocate='$newDate' WHERE UID=" . $_SESSION['userID'];
	    					  $st = $conn->prepare($sql);
						      $st->execute();
							
							  $conn = null;   	  
					      	  
					      }
						  else {
						  	  // they do not have the achievement yet
						  	  
						  	  $newDate = date('Y-m-d'); 
							  $counterVar = $data['counterAdvocate']; 
							  $progressVar = $data['Advocate_progress']; 
					      	  
					      	  $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	    					  $sql = "UPDATE user SET counterAdvocate='$counterVar', Advocate_progress='$progressVar',lastdateAdvocate='$newDate' WHERE UID=" . $_SESSION['userID'];
	    					  $st = $conn->prepare($sql);
						      $st->execute();
							
							  $conn = null;
						  }
					      
					  }
					  else {
					  	  // the user has been inconsistent
					  	  $data['counterAdvocate'] = 1; // reset counter
					  	  $data['Advocate_progress'] = 3; // reset progress
					  	  
					  	  $newDate = date('Y-m-d'); 
					  	  
					  	  // Update the user's progress, his counter, and his last date of completed five block
					  	  $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    					  $sql = "UPDATE user SET counterAdvocate=1, Advocate_progress=3,lastdateAdvocate='$newDate' WHERE UID=" . $_SESSION['userID'];
    					  $st = $conn->prepare($sql);
					      $st->execute();
						
						  $conn = null;   	  
					  }      
				  }
				  else {
				  	// the user does not have a previous five-block, this will be his first one!
				  	$data['counterAdvocate'] = 1; // reset counter
					$data['Advocate_progress'] = 3; // reset progress
					
					$newDate = date('Y-m-d'); 
					
					//Update the user's progress, his counter, and his last date of completed five block
					
					$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
				    $sql = "UPDATE user SET counterAdvocate=1, Advocate_progress=3,lastdateAdvocate='$newDate' WHERE UID=" . $_SESSION['userID'];
				    $st = $conn->prepare($sql);
			        $st->execute();
				  }
			}
			// Update the user's five block number in the database since now it is indeed one higher!
			$fiveblockVar = $data['fiveblockAdvocate']; 
			
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			
		    $sql = "UPDATE user SET fiveblockAdvocate='$fiveblockVar' WHERE UID=" . $_SESSION['userID'];
		    $st = $conn->prepare($sql);
	        $st->execute();
			
			$conn = null; 
		}
	    else {
	    	// the five block is already 5 so do not do anything
	    	// the user has already capped out the number of questions for the day and counter has already been incremented
	    }
	}
	else {
		// do nothing because the user already has the achievement
	}
	
}

?>