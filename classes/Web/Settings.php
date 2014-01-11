<?php 

	$profile= isset( $_GET['user'] ) ? $_GET['user'] : "";
	recordSettings($profile);

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
	   
	   //Update the information in the user database based on what settings options the user picked
	   $sql = "UPDATE user SET blurb='$updatedBlurb', displayLocation='$showLocations', displayBirthdate='$showBirthdate', websiteURL='$websiteLink', showNumFriends='$showFriends' WHERE UID=" . $uid;
	   $st = $conn->prepare( $sql );
	   $st->execute();
	   
	   // FOR NOW I WILL NOT TAMPER WITH THE CHECKBOX VALUES AND TRY TO PARSE THAT.
	   $conn = null; 
	   
	}
?>