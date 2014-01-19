<?php

function initAchievementsCreate() {
	$uid = $_SESSION['userID']; 	
	$conn2 = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
    $sql2 = "SELECT * FROM user WHERE UID=$uid"; //sql query that returns the string of the question in the table
    $st2 = $conn2->prepare( $sql2 );// prevents user browser from seeing queries. Useful for security
    $st2->execute();//executes query above
    $data=$st2->fetch(); //$question source is set to result of query
    $conn2=null;
	
	//Pulling out achievements and storing them in SESSION
    $_SESSION['achievementsProgress'] = array($data['HelpingHand_progress'], $data['Pal_progress'], 
    $data['Advocate_progress'], $data['Comrade_progress'], $data['MotherTeresa_progress'], 
    $data['Diva_progress'], $data['King of the Hill_progress'], $data['Ideator_progress'], 
	$data['Visionairy_progress'], $data['Blogger_progress'], $data['Commander of Words_progress'], 
	$data['Viber_progress']);
	
	//Also set up the achievements too
	$_SESSION['achievementsInfo'] = achievements();
	
	colorWithVibe();
	
	//Set up a modified achievements array to display in the nav bar
	$achievementsNavBar = array();
	$currSize = 0;
	for($i = 0; $i < count($_SESSION['achievementsProgress']); $i++) {
		if($_SESSION['achievementsProgress'][$i] < 10) {	
			$achievementsNavBar[$currSize] = array($i + 1, $_SESSION['achievementsProgress'][$i]);	
			$currSize++;
		}
	}
	
	return $achievementsNavBar; 
}

function organizeNavBar($achievementsNavBar) {
	for($i = 0; $i < count($achievementsNavBar); $i++) {
		$localMax = $achievementsNavBar[$i][1]; 
		$localPos = $i;
		for($j = $i; $j < count($achievementsNavBar); $j++) {
			if($achievementsNavBar[$j][1] > $localMax) {
				$localMax = $achievementsNavBar[$j][1];
				$localPos = $j;
			}
		}
		//swap the largest element with the element at i
		$temp = $achievementsNavBar[$i];
		$achievementsNavBar[$i] = $achievementsNavBar[$localPos];
		$achievementsNavBar[$localPos] = $temp;
	}
	
	// PRESENT THE NAV BAR UP TOP!
	achievementsNotificationCreator($achievementsNavBar); 
	
	return $achievementsNavBar;
}

function achievements() {
	//return the proper two dimensional array of all the achievements	
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$achievements = array();
	
	$_SESSION['achievementsToAchieve'] = 0; 
	
	for($i=1; $i<13; $i++) {
		$sql = "SELECT * FROM achievements WHERE ID=$i"; 
	    $st = $conn->prepare( $sql );
	    $st->execute();
	    $data=$st->fetch();
		
		//Update the session so that we can use the overall information in the future
		$_SESSION['achievements'][$i - 1] = array(
			"ID" => $data['ID'],
			"name" => $data['name'],
			"category" => $data['category'],
			"description" => $data['description'],
			"color" => $data['color'],
		);
		$sliderColor;
		$tempPercent = $_SESSION['achievementsProgress'] [$i - 1] * 10;
		if($tempPercent <= 30) {
			$sliderColor = "danger";
		}
		elseif($tempPercent > 30 && ($tempPercent <= 70)) {
			$sliderColor = "warning";
		}
		else {
			$sliderColor = "success";
		}
		
		if($tempPercent < 100) {
			$_SESSION['achievementsToAchieve']++; 
		}
		
		$achievements[$i - 1] = '<div class="form-group">
										<div class="col-md-3">
											<h5>' . $data['name'] . '</h5>
										</div>
										<div class="col-md-3">
											<h5><em>' . $data['category'] . '</em></h5>
										</div>
										<div class="col-md-3">
											<h5>' . $data['description'] . '</h5>
										</div>
										<div class="col-md-3">
											<div class="progress progress-striped">
												<div class="progress-bar progress-bar-' . $sliderColor . '" role="progressbar" aria-valuenow="' . $tempPercent . '" aria-valuemin="0" aria-valuemax="100" style="width: '. $tempPercent . '%">
												</div>
											</div>
										</div>
										
									</div>';
	}

	$_SESSION['achievementsDone'] = 12 - $_SESSION['achievementsToAchieve']; 
	
	$_SESSION['achievementsToAchieveNum'] = '<span class="badge badge-success">' . $_SESSION['achievementsDone'] . '</span>';
	if($_SESSION['achievementsDone'] == 0) {
		$_SESSION['achievementsToAchieveNum'] = ""; 
	}
	

	if($_SESSION['achievementsToAchieve'] > 5) {
		$_SESSION['achievementsToAchieve'] = '<span class="badge">5+</span>';
	}
	else if($_SESSION['achievementsToAchieve'] == 0) {
		$_SESSION['achievementsToAchieve'] = ""; 
	}
	else {
		$_SESSION['achievementsToAchieve'] = '<span class="badge">' .  $_SESSION['achievementsToAchieve'] . '</span>';
	}
    
    $conn=null;
	
	return $achievements;
}

function achievementsNotificationCreator($achievementsNavBar) {
	$_SESSION['achievementsNavBar'] = array(); 
	for($i = 0; $i < 5; $i++) {
		$name = $_SESSION['achievements'][$achievementsNavBar[$i][0] - 1]["name"]; 
		$score = $achievementsNavBar[$i][1] * 10; 
		$sliderColor;
		if($score <= 30) {
			$sliderColor = "danger";
		}
		elseif($score > 30 && ($score <= 70)) {
			$sliderColor = "warning";
		}
		else {
			$sliderColor = "success";
		}
		$_SESSION['achievementsNavBar'][$i] = '
		<li>
			<a href="#">
			<span class="task">
				<span class="desc">
					'. $name . '
				</span>
				<span class="percent">
					' . $score . '%
				</span>
			</span>
			<span class="progress">
				<span style="width: ' . $score . '%;" class="progress-bar progress-bar-' . $sliderColor . '" aria-valuenow="' . $score . '" aria-valuemin="0" aria-valuemax="100">
				</span>
			</span>
			</a>
		</li>';
	}
}

function colorWithVibe() {
	$_SESSION['coloredVibes'] = array(
		'Attractiveness'=>"crimson",
		'Approachability'=>"brown",
		'Intelligence'=>"darkblue",
		'Style'=>"darkcyan",
		'Promiscuity'=>"darkgreen",
		'Humor'=>"darkorange",
		'Confidence'=>"darkviolet",
		'Fun'=>"darkslateblue",
		'Kindness'=>"deeppink",
		'Honesty'=>"indigo",
		'Reliability'=>"mediumorchid",
		'Happiness'=>"palevioletred",
		'Ambition'=>"seagreen",
		'Modesty'=>"black"
	);
}

?>