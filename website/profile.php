<?php 
	error_reporting(0);
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/config.php");
	require($path . "/php-sdk/facebook.php");
    
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "Invite more Friends to Vibe for Comments"; //sets $action to "Action" url fragment string if action isn't null
    $profile= isset( $_GET['user'] ) ? $_GET['user'] : "";
    if(!$profile || !$_SESSION['profile']){
    	header('Location: /index.php?action=profile&profile='.$profile);
    	//header('Location: /index.php?action=profile&profile='.$profile);
		exit(0); 
    }  
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "Invite more Friends to Vibe for Comments"; 
    $pic="http://graph.facebook.com/" . $profile . "/picture?width=300&height=300";

	toggleInfo($profile, $_SESSION['myToken']);
	displayVibes($profile); 

	function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}
	
	
	function displayVibes($uid) {
		//Grab the vibes from the database that are not toggled off
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	   	$sql = "SELECT attractivenessDisableDate,affabilityDisableDate,intelligenceDisableDate,styleDisableDate,promiscuityDisableDate,humorDisableDate,confidenceDisableDate,funDisableDate,kindnessDisableDate,honestyDisableDate,reliabilityDisableDate,happinessDisableDate,ambitionDisableDate,humilityDisableDate FROM user WHERE UID=" . $uid;
	   	//$sql = "SELECT attractivenessDisableDate FROM user WHERE UID=" . $uid;
	   	$st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
	   	$st->execute();//executes query above
	   
	   	$data=$st->fetch();
		
		$conn = null;
		
		//AMBITION
		$ambitionKeys;
		if(isset($_SESSION['profile']['Ambition_Keywords'])) {$ambitionKeys = $_SESSION['profile']['Ambition_Keywords']; }
		else {$ambitionKeys = ""; }
		
		$ambitionScore;
		if($_SESSION['profile']['Ambition']) {$ambitionScore = $_SESSION['profile']['Ambition'];}
		else {$ambitionScore = "--"; }
		
		if($data['ambitionDisableDate'] == "") {
			$_SESSION['ambitionDisp'] = '<tr><td style="color: #0d638f;">Ambition</td><td>' . 
			$ambitionScore . '</td><td><em>' . $ambitionKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['ambitionDisp'] = ""; 
		}
		
		//AFFABILITY
		$affabilityKeys;
		if(isset($_SESSION['profile']['Affability_Keywords'])) {$affabilityKeys = $_SESSION['profile']['Affability_Keywords']; }
		else {$affabilityKeys = ""; }
		
		$affabilityScore;
		if($_SESSION['profile']['Affability']) {$affabilityScore = $_SESSION['profile']['Affability'];}
		else {$affabilityScore = "--"; }
		
		if($data['affabilityDisableDate'] == "") {
			$_SESSION['affableDisp'] = '<tr><td style="color: #0d638f;">Approachability</td><td>' . 
			$affabilityScore . '</td><td><em>' . $affabilityKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['affableDisp'] = ""; 
		}
		
		//INTELLIGENCE
		$intelligenceKeys;
		if(isset($_SESSION['profile']['Intelligence_Keywords'])) {$intelligenceKeys = $_SESSION['profile']['Intelligence_Keywords']; }
		else {$intelligenceKeys = ""; }
		
		$intelligenceScore;
		if($_SESSION['profile']['Intelligence']) {$intelligenceScore = $_SESSION['profile']['Intelligence'];}
		else {$intelligenceScore = "--"; }
		
		if($data['intelligenceDisableDate'] == "") {
			$_SESSION['intelligenceDisp'] = '<tr><td style="color: #0d638f;">Intelligence</td><td>' . 
			$intelligenceScore . '</td><td><em>' . $intelligenceKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['intelligenceDisp'] = ""; 
		}
		
		//STYLE
		$styleKeys;
		if(isset($_SESSION['profile']['Style_Keywords'])) {$styleKeys = $_SESSION['profile']['Style_Keywords']; }
		else {$styleKeys = ""; }
		
		$styleScore;
		if($_SESSION['profile']['Style']) {$styleScore = $_SESSION['profile']['Style'];}
		else {$styleScore = "--"; }
		
		if($data['styleDisableDate'] == "") {
			$_SESSION['styleDisp'] = '<tr><td style="color: #0d638f;">Style</td><td>' . 
			$styleScore . '</td><td><em>' . $styleKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['styleDisp'] = ""; 
		}
		
		//PROMISCUITY
		$promiscuityKeys;
		if(isset($_SESSION['profile']['Promiscuity_Keywords'])) {$promiscuityKeys = $_SESSION['profile']['Promiscuity_Keywords']; }
		else {$promiscuityKeys = ""; }
		
		$promiscuityScore;
		if($_SESSION['profile']['Promiscuity']) {$promiscuityScore = $_SESSION['profile']['Promiscuity'];}
		else {$promiscuityScore = "--"; }
		
		if($data['promiscuityDisableDate'] == "") {
			$_SESSION['promiscuityDisp'] = '<tr><td style="color: #0d638f;">Promiscuity</td><td>' . 
			$promiscuityScore . '</td><td><em>' . $promiscuityKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['promiscuityDisp'] = ""; 
		}
		
		//HUMOR
		$humorKeys;
		if(isset($_SESSION['profile']['Humor_Keywords'])) {$humorKeys = $_SESSION['profile']['Humor_Keywords']; }
		else {$humorKeys = ""; }
		
		$humorScore;
		if($_SESSION['profile']['Humor']) {$humorScore = $_SESSION['profile']['Humor'];}
		else {$humorScore = "--"; }
		
		if($data['humorDisableDate'] == "") {
			$_SESSION['humorDisp'] = '<tr><td style="color: #0d638f;">Humor</td><td>' . 
			$humorScore . '</td><td><em>' . $humorKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['humorDisp'] = ""; 
		}
		
		//CONFIDENCE
		$confidenceKeys;
		if(isset($_SESSION['profile']['Confidence_Keywords'])) {$confidenceKeys = $_SESSION['profile']['Confidence_Keywords']; }
		else {$confidenceKeys = ""; }
		
		$confidenceScore;
		if($_SESSION['profile']['Confidence']) {$confidenceScore = $_SESSION['profile']['Confidence'];}
		else {$confidenceScore = "--"; }
		
		if($data['confidenceDisableDate'] == "") {
			$_SESSION['confidenceDisp'] = '<tr><td style="color: #0d638f;">Confidence</td><td>' . 
			$confidenceScore . '</td><td><em>' . $confidenceKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['confidenceDisp'] = ""; 
		}
		
		//FUN
		$funKeys;
		if(isset($_SESSION['profile']['Fun_Keywords'])) {$funKeys = $_SESSION['profile']['Fun_Keywords']; }
		else {$funKeys = ""; }
		
		$funScore;
		if($_SESSION['profile']['Fun']) {$funScore = $_SESSION['profile']['Fun'];}
		else {$funScore = "--"; }
		
		if($data['funDisableDate'] == "") {
			$_SESSION['funDisp'] = '<tr><td style="color: #0d638f;">Fun</td><td>' . 
			$funScore . '</td><td><em>' . $funKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['funDisp'] = ""; 
		}
		
		//KINDNESS
		$kindnessKeys;
		if(isset($_SESSION['profile']['Kindness_Keywords'])) {$kindnessKeys = $_SESSION['profile']['Kindness_Keywords']; }
		else {$kindnessKeys = ""; }
		
		$kindnessScore;
		if($_SESSION['profile']['Kindness']) {$kindnessScore = $_SESSION['profile']['Kindness'];}
		else {$kindnessScore = "--"; }
		
		if($data['kindnessDisableDate'] == "") {
			$_SESSION['kindnessDisp'] = '<tr><td style="color: #0d638f;">Kindness</td><td>' . 
			$kindnessScore . '</td><td><em>' . $kindnessKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['kindnessDisp'] = ""; 
		}
		
		//HONESTY
		$honestyKeys;
		if(isset($_SESSION['profile']['Honesty_Keywords'])) {$honestyKeys = $_SESSION['profile']['Honesty_Keywords']; }
		else {$honestyKeys = ""; }
		
		$honestyScore;
		if($_SESSION['profile']['Honesty']) {$honestyScore = $_SESSION['profile']['Honesty'];}
		else {$honestyScore = "--"; }
		
		if($data['honestyDisableDate'] == "") {
			$_SESSION['honestyDisp'] = '<tr><td style="color: #0d638f;">Honesty</td><td>' . 
			$honestyScore . '</td><td><em>' . $honestyKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['honestyDisp'] = ""; 
		}
		
		//RELIABILITY
		$reliabilityKeys;
		if(isset($_SESSION['profile']['Reliability_Keywords'])) {$reliabilityKeys = $_SESSION['profile']['Reliability_Keywords']; }
		else {$reliabilityKeys = ""; }
		
		$reliabilityScore;
		if($_SESSION['profile']['Reliability']) {$reliabilityScore = $_SESSION['profile']['Reliability'];}
		else {$reliabilityScore = "--"; }
		
		if($data['reliabilityDisableDate'] == "") {
			$_SESSION['reliabilityDisp'] = '<tr><td style="color: #0d638f;">Reliability</td><td>' . 
			$reliabilityScore . '</td><td><em>' . $reliabilityKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['reliabilityDisp'] = ""; 
		}
		
		//HAPPINESS
		$happinessKeys;
		if(isset($_SESSION['profile']['Happiness_Keywords'])) {$happinessKeys = $_SESSION['profile']['Happiness_Keywords']; }
		else {$happinessKeys = ""; }
		
		$happinessScore;
		if($_SESSION['profile']['Happiness']) {$happinessScore = $_SESSION['profile']['Happiness'];}
		else {$happinessScore = "--"; }
		
		if($data['happinessDisableDate'] == "") {
			$_SESSION['happinessDisp'] = '<tr><td style="color: #0d638f;">Happiness</td><td>' . 
			$happinessScore . '</td><td><em>' . $happinessKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['happinessDisp'] = ""; 
		}
		
		//ATTRACTIVENESS
		$attractiveKeys;
		if(isset($_SESSION['profile']['Attractiveness_Keywords'])) {$attractiveKeys = $_SESSION['profile']['Attractiveness_Keywords']; }
		else {$attractiveKeys = ""; }
		
		$attractiveScore;
		if($_SESSION['profile']['Attractiveness']) {$attractiveScore = $_SESSION['profile']['Attractiveness'];}
		else {$attractiveScore = "--"; }
		
		if($data['attractivenessDisableDate'] == null) {
			$_SESSION['attractiveDisp'] = '<tr><td style="color: #0d638f;">Attractiveness</td><td>' . 
			$attractiveScore . '</td><td><em>' . $attractiveKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['attractiveDisp'] = ""; 
		}
		
		//HUMILITY
		$humilityKeys;
		if(isset($_SESSION['profile']['Humility_Keywords'])) {$humilityKeys = $_SESSION['profile']['Humility_Keywords']; }
		else {$humilityKeys = ""; }
		
		$humilityScore;
		if($_SESSION['profile']['Humility']) {$humilityScore = $_SESSION['profile']['Humility'];}
		else {$humilityScore = "--"; }
		
		if($data['humilityDisableDate'] == "") {
			$_SESSION['humilityDisp'] = '<tr><td style="color: #0d638f;">Modesty</td><td>' . 
			$humilityScore . '</td><td><em>' . $humilityKeys .'</em></td></tr>'; 
		}
		else {
			$_SESSION['humilityDisp'] = ""; 
		}
	}

	function toggleInfo($uid, $token) {
	   $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	   $sql = "SELECT displayLocation,displayBirthdate,websiteURL,blurb,showNumFriends,totalAnswers FROM user WHERE UID=" . $uid;
	   $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
	   $st->execute();//executes query above
	   
	   $data=$st->fetch();
	   
	   //Graph API Request for person's birth date and location
	   $graph_url = "https://graph.facebook.com/" . $uid . "/?fields=location,birthday,gender&access_token=" . $token; 
       $facebookBDateAndLoc = json_decode(file_get_contents($graph_url), true); 
	   
	   $dispBday = $facebookBDateAndLoc['birthday'];
	   $dispLoc = $facebookBDateAndLoc['location']['name'];
	   
       $_SESSION['dispLoc'] = $dispLoc; 
       $_SESSION['dispBday'] = $dispBday;
	   
	   //SHOW NUMBER OF FRIENDS
	   if($data['showNumFriends'] == 0) {
	   	 $_SESSION['friendsDisplay'] = '
	   	 <li>
			<a href="#">Friends
				<span>
					' . $_SESSION['profile']['Friends'] . '
				</span>
			</a>
		</li>';
	   }
	   else {
	     $_SESSION['friendsDisplay'] = "";
	   }
	   
	   //SHOW YOUR BLURB
	   if($data['blurb'] != "") {
	   	  $_SESSION['dispBlurb'] = '<p>' . $data['blurb']. '</p>';
	   }
	   else {
	   	  $_SESSION['dispBlurb'] = '';
	   }
	   
	   //SHOW YOUR LOCATION
	   if($data['displayLocation'] == 1) {
	   	 $_SESSION['displayLocation'] = '<li><i class="fa fa-map-marker"></i> ' . $_SESSION['dispLoc']. ' </li>';
	   }
	   else {
	   	 $_SESSION['displayLocation'] = ""; 
	   }

       //SHOW YOUR BIRTHDATE
	   if($data['displayBirthdate'] == 1) {
	   	 $_SESSION['displayBirthday'] = '<li><i class="fa fa-calendar"></i> ' . $_SESSION['dispBday']. ' </li>';
	   }
	   else {
	   	 $_SESSION['displayBirthday'] = ""; 
	   }
	   
	   //SHOW YOUR WEBSITE LINK IF IT EXISTS
	   
	   if($data['websiteURL'] == "") {
	     $_SESSION['displaySite'] = ""; 	
	   }
	   else {
	   	 //ERROR CHECKING
	   	 if(strpos($data['websiteURL'], "www.") === FALSE) {
	   	     $data['websiteURL'] = "www." . $data['websiteURL'];
	   	 }
	   	 
	   	 if(strpos($data['websiteURL'], "http://") === FALSE) {
	   	     $data['websiteURL'] = "http://" . $data['websiteURL'];
	   	 }	 
		
	     $_SESSION['displaySite'] = '<li><a href="' . $data['websiteURL'] . '"><i class="fa fa-laptop"></i> Website</a></li>'; 
	   }
	   
	   $conn = null;
	}
    
?>
<!DOCTYPE html>

<!-- HTML BODY OF USER'S PROFILE -->

<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Profile</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta property="og:title" content=<?php  echo '"'. $_SESSION['profile']['Name'] . "'s". 'Profile"' ?> />
<meta property="og:type" content="website" />
<meta type="og:url" content= <?php  echo '"'.curPageURL() ?>.'"' ?> >
<meta property="og:image" content="/img/Niger1.jpg" />
<meta name="MobileOptimized" content="320">
<link href="/vibe.ico" rel="SHORTCUT ICON">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/pages/profile.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=257473684410281";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 	<script src="../jQuery/jquery.js"></script> 
<script src="../jQuery/jquery.js"></script> 
    <script>  
    $(function(){
      $("#includedContent").load("header.php"); 
    });
    </script> 
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <div id="includedContent"></div>


<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="start"><span class="title"><h2 style="text-align: center; color: white">VIBE</h2></span></li>
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="/index.php?action=search" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" name="Query" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start">
					<a href="/index.php?action=dashboard">
					<i class="fa fa-home"></i>
					<span class="title">
						Dashboard
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<li class="">
					<a href="/index.php?action=question">
					<i class="fa fa-question"></i>
					<span class="title">
						Questions
					</span>
					</a>
				</li>
				<li class="">
					<a href="javascript:;">
					<i class="fa fa-heart"></i>
					<span class="title">
						My Leaderboards
					</span>
					<span class="arrow ">
					</span>
					</a>
					<ul class="sub-menu">
						<?php echo $_SESSION['dashboard']['Communities'] ?>
					</ul>
				</li>
				<li id="frontend-link" class="tooltips" data-placement="right" data-original-title="Frontend&nbsp;Theme For&nbsp;Metronic&nbsp;Admin">
					<a href="achievements.php">
					<i class="fa fa-trophy"></i>
					<span class="title">
						Achievements
					</span>
					</a>
				</li>
				<!--
				<li id="forum-link" class="tooltips" data-placement="right" data-original-title="Community&nbsp;Question Request&nbsp;Forum">
					<a href="javascript:;">
					<i class="fa fa-comments"></i>
					<span class="title">
						Forum
					</span>
					</a>
				</li>
				<li id="frontend-link" class="tooltips" data-placement="right" data-original-title="Vibe&nbsp;Community Blog">
					<a href="http://blog.go-vibe.com">
					<i class="fa fa-book"></i>
					<span class="title">
						Blog
					</span>
					</a>
				</li>
				-->
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="/index.php">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Profile</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">Profile</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li>
												<img src=<?php echo $pic ?> class="img-responsive" alt=""/>
											</li>
											<?php echo $_SESSION['friendsDisplay'] ?>
										</ul>
										<a href= <?php echo '"http://www.facebook.com/sharer/sharer.php?s=100&p[url]='. curPageURL(). '&p[title]='. $_SESSION['profile']['Name'].' &#39;s Vibe Profile&p[summary]="' ?>  target="_blank">
											<img src="/img/facebook-logo.png" height="36px" />
										</a>&nbsp;
										<a href=<?php echo '"https://twitter.com/share?url='. curPageURL(). '&text=&hashtags=Vibe" style="text-align:bottom"' ?>>
											<img src="/img/icon-twitter.png" height="36px" />
										</a>
										<a href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false"> 
											<img src="/img/icon-reddit.png" height="36px"/>
										</a>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1><?php echo $_SESSION['profile']['Name'] ?></h1>
												<!-- ADD SOME SMART CODE TO SHOW USER FIRST NAME -->
												<?php 
													$tempName = explode(" ", $_SESSION['profile']['Name']); 
													$_SESSION['nameFirst'] = $tempName[0];
												?>
												<?php echo $_SESSION['dispBlurb'] ?>
												<!-- FOR DEBUGGING<?php echo $_SESSION['disabledTest'] ?> -->
												<ul class="list-inline">
													<?php echo $_SESSION['displayLocation'] ?>
													<?php echo $_SESSION['displayBirthday'] ?>
													<?php echo $_SESSION['displaySite'] ?>
												</ul>
											</div>
											<!--end col-md-8-->
											<div class="col-md-4">
												<div class="portlet sale-summary">
													<div class="portlet-title">
														<div class="caption">
															Summary
														</div>
													</div>
													<div class="portlet-body">
														<ul class="list-unstyled">
															<li>
																<span class="sale-info">
																	 Questions Answered about <?php echo $_SESSION['nameFirst']; ?> <i class="fa fa-img-up"></i>
																</span>
																<span class="sale-num">
																	<?php echo $_SESSION['profile']['totalAnswers'] ?>
																</span>
															</li>
															<!--
															<li>
																<span class="sale-info">
																	 TOTAL ACHIEVEMENTS<i class="fa fa-img-down"></i>
																</span>
																<span class="sale-num">
																	<?php echo $_SESSION['achievementsDone'] ?>
																</span>
															</li>
															-->
															<li>
																
																<span class="sale-info">
																	POINTS
																</span>
																<span class="sale-num">
																	<?php echo $_SESSION['profile']['Points'] ?>
																</span>
																
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!--end col-md-4-->
										</div>
										<!--end row-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_1_11" data-toggle="tab">Vibes</a>
												</li>
												<li>
													<a href="#tab_1_22" data-toggle="tab">Comments</a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
													<div class="portlet-body">
														<table class="table table-striped table-bordered table-advance table-hover">
														<thead>
														<tr>
															<th>
																Vibe
															</th>
															<th class="hidden-xs">
																Strength
															</th>
															<th>
																Impressions
															</th>
														</tr>
														</thead>
														<tbody>
														<?php echo $_SESSION['attractiveDisp'] ?>
														<?php echo $_SESSION['affabilityDisp'] ?>
														<?php echo $_SESSION['intelligenceDisp'] ?>
														<?php echo $_SESSION['styleDisp'] ?>
														<?php echo $_SESSION['promiscuityDisp'] ?>
														<?php echo $_SESSION['humorDisp'] ?>
														<?php echo $_SESSION['confidenceDisp'] ?>
														<?php echo $_SESSION['funDisp'] ?>
														<?php echo $_SESSION['kindnessDisp'] ?>
														<?php echo $_SESSION['honestyDisp'] ?>
														<?php echo $_SESSION['reliabilityDisp'] ?>
														<?php echo $_SESSION['happinessDisp'] ?>
														<?php echo $_SESSION['ambitionDisp'] ?>
														<?php echo $_SESSION['humilityDisp'] ?>
														</tbody>
														</table>
													</div>
												</div>
												<!--tab-pane-->
												<div class="tab-pane" id="tab_1_22">
													<div class="tab-pane active" id="tab_1_1_1">
														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
															<ul class="feeds">
																<?php 
																foreach($_SESSION['profile']['Comments'] as $comment){
																	echo $comment;
																} ?>
															</ul>
														</div>
													</div>
												</div>
												<!--tab-pane-->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- FOOTER -->
    <script> 
    $(function(){
      $("#footerContent").load("footer.php"); 
    });
    </script> 
    
    <div id="footerContent"></div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   App.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
<?php $_SESSION['profile']=null ?>
