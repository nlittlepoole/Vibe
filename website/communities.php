<?php 
	error_reporting(0);
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/config.php");
    $location= isset( $_GET['location'] ) ? $_GET['location'] : "";
    if(!$location || !$_SESSION['location']){
    	header('Location:/index.php?action=location&location='.$location);
    	exit;
    }  
	$dashboard=$_SESSION['dashboard'];
    $pic=$dashboard['pic'];  
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
?>
<!DOCTYPE html>

<!-- File has been changed to a PHP file -->

<!-- START UP THE SESSION -->



<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.3
Version: 1.5.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Communities</title>
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

<div class="clearfix">
</div>
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
				<li class="">
					<a href="/index.php?action=dashboard">
					<i class="fa fa-home"></i>
					<span class="title">
						Dashboard
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
				<li class="start active">
					<a href="javascript:;">
					<i class="fa fa-heart"></i>
					<span class="title">
						Communities
					</span>
					<span class="selected">
					</span>
					<span class="arrow ">
					</span>
					</a>
					<ul class="sub-menu">
						<?php echo $_SESSION['dashboard']['Communities'] ?>
					</ul>
				</li>
				<li id="frontend-link" class="" data-placement="right" data-original-title="See Achievements">
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
						<img height="100px" src=<?php echo '"'.$_SESSION['location']['Picture'].'"' ?>  />
					<?php echo $_SESSION['location']['Name'] ?> <small>Communities</small> <li><div class="fb-share-button" data-href=<?php echo '"'. curPageURL(). '"' ?> data-type="button_count"></div></li></a><a href= <?php echo '"http://twitter.com/share?url='. curPageURL(). '&text=&hashtags=Vibe,dummy"' ?> target="_blank"><img src="/img/share_twitter.jpg" alt="Twitter" width="100" height="25"></a>
					<a href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false"> <img src="http://www.reddit.com/static/spreddit10.gif" height="25" alt="submit to reddit" border="0" /></a>
					<!-- FILL THIS WITH THE PROF PIC OF THE COMMUNITY'S FACEBOOK PAGE -->
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
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
			
			<div class="clearfix">
			</div>

			<!-- REVAMPED RATINGS OF COMMUNITY - TEMPLATE -->
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Voted Most
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
							</div>
						</div>
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">Attractiveness</a>
								</li>
								<li class="">
									<a href="#tab_1_2" data-toggle="tab">Affability</a>
								</li>
								<li class="">
									<a href="#tab_1_3" data-toggle="tab">Intelligence</a>
								</li>
								<li class="">
									<a href="#tab_1_4" data-toggle="tab">Style</a>
								</li>
								<li class="">
									<a href="#tab_1_5" data-toggle="tab">Humor</a>
								</li>
								<li class="">
									<a href="#tab_1_6" data-toggle="tab">Confidence</a>
								</li>
								<li class="">
									<a href="#tab_1_7" data-toggle="tab">Fun</a>
								</li>
								<li class="">
									<a href="#tab_1_8" data-toggle="tab">Kindness</a>
								</li>
								<li class="">
									<a href="#tab_1_9" data-toggle="tab">Honesty</a>
								</li>
								<li class="">
									<a href="#tab_1_10" data-toggle="tab">Happiness</a>
								</li>
								<li class="">
									<a href="#tab_1_11" data-toggle="tab">Ambition</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_1_1">
									<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Attractiveness'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_2">
									<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Affability'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_3">
									<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Intelligence'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_4">
																		<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Style'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_5">
																											<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Humor'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_6">
									<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Confidence'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_7">
									<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Fun'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_8">
									<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Kindness'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_9">
									<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Honesty'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_10">
									<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Happiness'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_11">
									<div class="note note-success">
										<h4>Your Percentile: <?php echo $_SESSION['location']['Percentiles']['Ambition'] ?></h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Guys</h4>
									</div>
									<div style="display:inline-block; width:49%">
										<h4>Girls</h4>
									</div>
									<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank1'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank2'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank5'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="table-responsive" style="display:inline-block; width:49%">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank7'] ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank8'] ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank9'] ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Rank10'] ?>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>

			<div class="clearfix">
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-comments"></i>Community Summary
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
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
										Attribute
									</th>
									<th>
										Overall Score
									</th>
									<th>
										Characteristics
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										1
									</td>
									<td>
										Attractiveness
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Average'] ? $_SESSION['location'][0]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][0]['Keywords'] ? $_SESSION['location'][0]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Affability
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Average'] ? $_SESSION['location'][1]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][1]['Keywords'] ? $_SESSION['location'][1]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Intelligence
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Average'] ? $_SESSION['location'][2]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][2]['Keywords'] ? $_SESSION['location'][2]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Style
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Average'] ? $_SESSION['location'][3]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][3]['Keywords'] ? $_SESSION['location'][3]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										Promiscuity
									</td>
									<td>
										<?php echo $_SESSION['location'][4]['Average'] ? $_SESSION['location'][4]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][4]['Keywords'] ? $_SESSION['location'][4]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										6
									</td>
									<td>
										Humor
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Average'] ? $_SESSION['location'][5]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][5]['Keywords'] ? $_SESSION['location'][5]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										7
									</td>
									<td>
										Confidence
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Average'] ? $_SESSION['location'][6]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][6]['Keywords'] ? $_SESSION['location'][6]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										8
									</td>
									<td>
										Fun
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Average'] ? $_SESSION['location'][7]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][7]['Keywords'] ? $_SESSION['location'][7]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										9
									</td>
									<td>
										Kindness
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Average'] ? $_SESSION['location'][8]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][8]['Keywords'] ? $_SESSION['location'][8]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										10
									</td>
									<td>
										Honesty
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Average'] ? $_SESSION['location'][9]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][9]['Keywords'] ? $_SESSION['location'][9]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										11
									</td>
									<td>
										Reliability
									</td>
									<td>
										<?php echo $_SESSION['location'][10]['Average'] ? $_SESSION['location'][10]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][10]['Keywords'] ? $_SESSION['location'][10]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										12
									</td>
									<td>
										Happiness
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Average'] ? $_SESSION['location'][11]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][11]['Keywords'] ? $_SESSION['location'][11]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										13
									</td>
									<td>
										Ambition
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Average'] ? $_SESSION['location'][12]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][12]['Keywords'] ? $_SESSION['location'][12]['Keywords']: "N/A" ?>
									</td>
								</tr>
								<tr>
									<td>
										14
									</td>
									<td>
										Humility
									</td>
									<td>
										<?php echo $_SESSION['location'][13]['Average'] ? $_SESSION['location'][13]['Average']: "--" ?>
									</td>
									<td>
										<?php echo $_SESSION['location'][13]['Keywords'] ? $_SESSION['location'][13 ]['Keywords']: "N/A" ?>
									</td>
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
<?php 
    $_SESSION['location']=null;  
?>
