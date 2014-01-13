<?php 

	recordSettings($_SESSION['userID']);

	function recordSettings($uid) {
	   $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
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
	   $disabledDates = ""; 
	   for($i = 0; $i < 14; $i++){
			$disabledDates = $disabledDates . $_POST['checkbox' . ($i + 1)] . " ";
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
	   displayBirthdate='$showBirthdate', websiteURL='$websiteLink', showNumFriends='$showFriends', 
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