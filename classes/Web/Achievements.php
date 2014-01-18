<?php
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
		$tempPercent = $_SESSION['achievementsProgress'][$i - 1] * 10;
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