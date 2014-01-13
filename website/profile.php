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
					' . $_SESSION['numberOfFriends'] . '
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
<meta name="MobileOptimized" content="320">
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
	
	<script src="../jQuery/jquery.js"></script> 
    <script> 
    $(function(){
      $("#includedContent").load("header.php"); 
    });
    </script> 
    
    <div id="includedContent"></div>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
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
						Communities
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
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1><?php echo $_SESSION['profile']['Name'] ?></h1>
												<?php echo $_SESSION['dispBlurb'] ?>
												<?php echo $_SESSION['disabledTest'] ?>
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
																	PEOPLE ANSWERED <i class="fa fa-img-up"></i>
																</span>
																<span class="sale-num">
																	2000
																</span>
															</li>
															<!--
															<li>
																<span class="sale-info">
																	 TOTAL ACHIEVEMENTS<i class="fa fa-img-down"></i>
																</span>
																<span class="sale-num">
																	<?php echo $_SESSION['numAchievementsCompleted'] ?>
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
																Qualities
															</th>
														</tr>
														</thead>
														<tbody>
														<tr>
															<td style="color: #0d638f;">
																Attractiveness
															</td>
															<td>
																<?php echo $_SESSION['profile']['Attractiveness'] ? $_SESSION['profile']['Attractiveness']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Attractiveness_Keywords']) ? $_SESSION['profile']['Attractiveness_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Affability
															</td>
															<td>
																<?php echo $_SESSION['profile']['Affability'] ? $_SESSION['profile']['Affability']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Affability_Keywords']) ? $_SESSION['profile']['Affability_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Intelligence
															</td>
															<td>
																<?php echo $_SESSION['profile']['Intelligence'] ? $_SESSION['profile']['Intelligence']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Intelligence_Keywords']) ? $_SESSION['profile']['Intelligence_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Style
															</td>
															<td>
																<?php echo $_SESSION['profile']['Style'] ? $_SESSION['profile']['Style']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Style_Keywords']) ? $_SESSION['profile']['Style_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Promiscuity
															</td>
															<td>
																<?php echo $_SESSION['profile']['Promiscuity'] ? $_SESSION['profile']['Promiscuity']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Promiscuity_Keywords']) ? $_SESSION['profile']['Promiscuity_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Humor
															</td>
															<td>
																<?php echo $_SESSION['profile']['Humor'] ? $_SESSION['profile']['Humor']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Humor_Keywords']) ? $_SESSION['profile']['Humor_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Confidence
															</td>
															<td>
																<?php echo $_SESSION['profile']['Confidence'] ? $_SESSION['profile']['Confidence']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Confidence_Keywords']) ? $_SESSION['profile']['Confidence_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Fun
															</td>
															<td>
																<?php echo $_SESSION['profile']['Fun'] ? $_SESSION['profile']['Fun']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Fun_Keywords']) ? $_SESSION['profile']['Fun_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Kindness
															</td>
															<td>
																<?php echo $_SESSION['profile']['Kindness'] ? $_SESSION['profile']['Kindness']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Kindness_Keywords']) ? $_SESSION['profile']['Kindness_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Honesty
															</td>
															<td>
																<?php echo $_SESSION['profile']['Honesty'] ? $_SESSION['profile']['Honesty']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Honesty_Keywords']) ? $_SESSION['profile']['Honesty_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Reliability
															</td>
															<td>
																<?php echo $_SESSION['profile']['Reliability'] ? $_SESSION['profile']['Reliability']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Reliability_Keywords']) ? $_SESSION['profile']['Reliability_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Happiness
															</td>
															<td>
																<?php echo $_SESSION['profile']['Happiness'] ? $_SESSION['profile']['Happiness']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Happiness_Keywords']) ? $_SESSION['profile']['Happiness_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Ambition
															</td>
															<td>
																<?php echo $_SESSION['profile']['Ambition'] ? $_SESSION['profile']['Ambition']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Ambition_Keywords']) ? $_SESSION['profile']['Ambition_Keywords']: "N/A" ?>
															</em></td>
														</tr>
														<tr>
															<td style="color: #0d638f;">
																Humility
															</td>
															<td>
																<?php echo $_SESSION['profile']['Humility'] ? $_SESSION['profile']['Humility']: "--" ?>
															</td>
															<td><em>
																<?php echo isset($_SESSION['profile']['Humility_Keywords']) ? $_SESSION['profile']['Humility_Keywords']: "N/A" ?>
															</em></td>
														</tr>
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
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 2013 &copy; Metronic by keenthemes.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
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
