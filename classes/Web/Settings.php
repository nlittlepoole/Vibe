<?php 

	recordSettings($_SESSION['userID']);

	function recordSettings($uid) {	
	   $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	   
	   //GET TOTAL NUMBER OF POINTS AND CHANGE THAT IN ADDITION TO SESSION DATA
	   $sql = "SELECT Points FROM user WHERE UID=" . $uid;
	   $st = $conn->prepare( $sql );
	   $st->execute();
	   
	   $dataInitial=$st->fetch(); 
	   $currentPoints = $dataInitial['Points'];
	   
	   $updatedBlurb = $_POST["blurb"]; 
	   $websiteLink =  $_POST["websitelink"];
	   
	   $showLocations = 0; 
	   if($_POST["optionsLocations"] == "option1") {
	       $showLocations = 1; 
	   }
	   
	   $showBirthdate = 0; 
	   if($_POST["optionsBirthdate"] == "bdate1") {
	       $showBirthdate = 1; 
	   }
	   
	   $showFriends = 0; 
	   if($_POST["optionsFriends"] == "option2") {
	       $showFriends = 1; 
	   }
	   
	   //UPDATE THE DISABLED DATES OF THE USER
	   $traitsListed = array("attractiveness", "affability", "intelligence", "style", "promiscuity", "humor", "confidence", "fun", "kindness", 
	   "honesty", "reliability", "happiness", "ambition"); 
	   $disabledDates = ""; 
	   $totalNum = 0;
	   for($i = 0; $i < 14; $i++){
	   		$sql = "SELECT " . $traitsListed[$i] . "DisableDate FROM user WHERE UID=" . $uid; 
			$st = $conn->prepare($sql);
	   		$st->execute();
			$dataTrait = $st->fetch();
			$desiredField = $traitsListed[$i] . "DisableDate"; 
			
			$disabledDates = $disabledDates . $_POST['checkbox' . ($i + 1)] . " ";
		    if($_POST['checkbox' . ($i + 1)] != "" && $dataTrait[$desiredField] == "") {
		    	$currentPoints -= 30; //subtract points from total number of points
		    }
	   }
	   $_SESSION['disabledTest'] = $disabledDates; 
	   
	   $disabledDates = str_replace("option", "", $disabledDates);
	   $disabledDates = substr($disabledDates, 0, -1); //remove trailing space character
	   $disabledArray = explode(" ", $disabledDates);
	   
	   $disableChecker = array(); 
	   foreach($disabledArray as $disableLoc) { 
	       $disableChecker[$disableLoc - 1] = date("Y-m-d H:i:s", time()); 
	   } 
	   
	   /*
	    DEBUGGING CODE
	   $_SESSION['disableLoc'] = ""; 
	   $i = 0; 
	   foreach($disableChecker as $disableElem) {
	   	   $_SESSION['disableLoc'] .= $i . ">>" . $disableElem . "<br />";
	   	   $i++; 
	   }
	   */
	   
	   //Update the information in the user database based on what settings options the user picked
	   $sql = "UPDATE user SET blurb='$updatedBlurb', displayLocation='$showLocations', 
	   Points='$currentPoints', displayBirthdate='$showBirthdate', websiteURL='$websiteLink', showNumFriends='$showFriends', 
	   attractivenessDisableDate='$disableChecker[0]', affabilityDisableDate='$disableChecker[1]', 
	   intelligenceDisableDate='$disableChecker[2]', styleDisableDate='$disableChecker[3]', 
	   promiscuityDisableDate='$disableChecker[4]', humorDisableDate='$disableChecker[5]', 
	   confidenceDisableDate='$disableChecker[6]', funDisableDate='$disableChecker[7]', 
	   kindnessDisableDate='$disableChecker[8]', honestyDisableDate='$disableChecker[9]', 
	   reliabilityDisableDate='$disableChecker[10]', happinessDisableDate='$disableChecker[11]', 
	   ambitionDisableDate='$disableChecker[12]', humilityDisableDate='$disableChecker[13]' WHERE UID=" . $uid;
	   
	   //$_SESSION['disableLoc'] = $sql;
	   $st = $conn->prepare( $sql );
	   $st->execute();
	   
	   // FOR NOW I WILL NOT TAMPER WITH THE CHECKBOX VALUES AND TRY TO PARSE THAT.
	   $conn = null; 
	   
	}
?>