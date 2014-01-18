<?php 
	error_reporting(0);
    session_start();
    if(!$_SESSION['userID']){
    	header('Location:/index.php'); 
    }
    $dashboard = $_SESSION['dashboard'];
    $pic = $dashboard['pic'];

    
?>
<!DOCTYPE html>

<!-- File has been changed to a PHP file -->

<!-- START UP THE SESSION -->

<!-- HTML CONTENT -->

<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Dashboard</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
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
				<li class="start active ">
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
				<li id="frontend-link" class="tooltips" data-placement="right" data-original-title="View Achievements">
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
					<h3 class="page-title">
					Dashboard <small>personalized feedback</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="/index.php">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Dashboard</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-star"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $_SESSION['dashboard']['Points'] ?>
							</div>
							<div class="desc">
								 Points
							</div>
						</div>
						<a class="more" href="#">
						Spend Points <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo ($_SESSION['dashboard']['Comments_Size']) ?>
							</div>
							<div class="desc">
								Comments
							</div>
						</div>
						<a class="more" href="#commentsSection">
						View Comments <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-question"></i>
						</div>
						<div class="details">
							<div class="number">
								<!-- for now we just put 0, we'll track this later -->
								<?php echo $_SESSION['dashboard']['newAnswers'] ?>
							</div>
							<div class="desc">
								New Answers
							</div>
						</div>
						<a class="more" href="/index.php?action=question">
						Answer More <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-trophy"></i>
						</div>
						<div class="details">
							<div class="number">
								+4
							</div>
							<div class="desc">
								Achievements
							</div>
						</div>
						<a class="more" href="/website/achievements.php">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-comments"></i>Feedback
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Vibe
									</th>
									<th>
										Strength
									</th>
									<th>
										Impressions
									</th>
									<th>
										Global Percentile
									</th>

								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents an individuals perceived physical attractiveness">
										Attractiveness
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Attractiveness'] ? $_SESSION['dashboard']['Attractiveness']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Attractiveness_Keywords']) ? $_SESSION['dashboard']['Attractiveness_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Attractiveness'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents how an individual is perceived in conversation and other social interaction">
										Approachability
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Affability'] ? $_SESSION['dashboard']['Affability']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Affability_Keywords']) ? $_SESSION['dashboard']['Affability_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Affability'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents the amount and type of intelligence an individual is perceived to have">
										Intelligence
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Intelligence'] ? $_SESSION['dashboard']['Intelligence']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Intelligence_Keywords']) ? $_SESSION['dashboard']['Intelligence_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Intelligence'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents the amount and type of style an individual is perceived to have">
										Style
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Style'] ? $_SESSION['dashboard']['Style']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Style_Keywords']) ? $_SESSION['dashboard']['Style_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Style'] ?>
									</td>									
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents the nature and amount of romantic engagements in an individual's life">
										Promiscuity
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Promiscuity'] ? $_SESSION['dashboard']['Promiscuity']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Promiscuity_Keywords']) ? $_SESSION['dashboard']['Promiscuity_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Promiscuity'] ?>
									</td>
								</tr>
								<tr>
									<td>
										6
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents how funny a user is perceived to be and why">
										Humor
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Humor'] ? $_SESSION['dashboard']['Humor']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Humor_Keywords']) ? $_SESSION['dashboard']['Humor_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Humor'] ?>
									</td>
								</tr>
								<tr>
								<tr>
									<td>
										7
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents an individual's inner and outer confidence">
										Confidence
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Confidence'] ? $_SESSION['dashboard']['Confidence']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Confidence_Keywords']) ? $_SESSION['dashboard']['Confidence_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Confidence'] ?>
									</td>
								</tr>
								<tr>
								<tr>
									<td>
										8
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents how much an individual's friends enjoy their company and why">
										Fun
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Fun'] ? $_SESSION['dashboard']['Fun']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Fun_Keywords']) ? $_SESSION['dashboard']['Fun_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Fun'] ?>
									</td>
								</tr>
								<tr>
								<tr>
									<td>
										9
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents how kind an individual is to other">
										Kindness
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Kindness'] ? $_SESSION['dashboard']['Kindness']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Kindness_Keywords']) ? $_SESSION['dashboard']['Kindness_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Kindness'] ?>
									</td>
								</tr>
								<tr>
								<tr>
									<td>
										10
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents how honest an individual is with their friends">
										Honesty
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Honesty'] ? $_SESSION['dashboard']['Honesty']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Honesty_Keywords']) ? $_SESSION['dashboard']['Honesty_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Honesty'] ?>
									</td>
								</tr>
								<tr>
								<tr>
									<td>
										11
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents how dependable an individual is">
										Reliability
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Reliability'] ? $_SESSION['dashboard']['Reliability']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Reliability_Keywords']) ? $_SESSION['dashboard']['Reliability_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Reliability'] ?>
									</td>
								</tr>
								<tr>
								<tr>
									<td>
										12
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents how happy an individual is perceived to be and why">
										Happiness
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Happiness'] ? $_SESSION['dashboard']['Happiness']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Happiness_Keywords']) ? $_SESSION['dashboard']['Happiness_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Happiness'] ?>
									</td>
								</tr>
								<tr>
								<tr>
									<td>
										13
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents how much  ambition an individual is perceived to be and how">
										Ambition
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Ambition'] ? $_SESSION['dashboard']['Ambition']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Ambition_Keywords']) ? $_SESSION['dashboard']['Ambition_Keywords']: "N/A" ?> 
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Ambition'] ?>
									</td>
								</tr>
								<tr>
								<tr>
									<td>
										14
									</td>
									<td>
										<span style="color: #0d638f;" class="tooltips" data-container="body" data-original-title="Represents an individual's humility">
										Modesty
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Humility'] ? $_SESSION['dashboard']['Humility']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Humility_Keywords']) ? $_SESSION['dashboard']['Humility_Keywords']: "N/A" ?>
									</td>
									<td>
										<?php echo $_SESSION['dashboard']['Percentiles']['Humility'] ?>
									</td>
								<tr>
								</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			
			<div class="clearfix">
			</div>
			
			<div class="row ">
				<div class="col-md-4 col-sm-4">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-trophy"></i>Achievements
							</div>
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
								<ul class="feeds">
									<?php foreach($_SESSION['msgBoxDisp'] as $achievementDisp){
										echo $achievementDisp;
									} ?>
								</ul>
							</div>
							<div class="scroller-footer">
								<div class="pull-right">
									<a href="achievements.php">See All Achievements <i class="m-icon-swapright m-icon-gray"></i></a> &nbsp;
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8" id="commentsSection">
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-comments"></i>Comments
							</div>
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
								<ul class="feeds">
									<?php 
									foreach($_SESSION['dashboard']['Comments'] as $comment){
										echo $comment;
										} ?>
									
								</ul>
							</div>
							<div class="scroller-footer">
								<div class="pull-right">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix">
			</div>
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
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Commented out below so the pop-up notifications don't happen! (Noah)-->
<!-- <script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script> -->
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/index.js" type="text/javascript"></script>
<script src="assets/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   App.init(); // initlayout and core plugins
   Index.init();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Index.initDashboardDaterange();
   Index.initIntro();
   Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>