<!DOCTYPE html>

<!-- File has been changed to a PHP file -->

<!-- START UP THE SESSION -->
<?php 
	error_reporting(0);
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/config.php");
    
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "Invite more Friends to Vibe for Comments"; //sets $action to "Action" url fragment string if action isn't null
    $dashboard=$_SESSION['dashboard'];
    $pic=$dashboard['pic'];
	
    
?>


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
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start">
					<a href="dashboard.php">
					<i class="fa fa-home"></i>
					<span class="title">
						Dashboard
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<li class="">
					<a href="questions.php">
					<i class="fa fa-question"></i>
					<span class="title">
						Questions
					</span>
					</a>
				</li>
				<li class="active">
					<a href="javascript:;">
					<i class="fa fa-heart"></i>
					<span class="title">
						Communities
					</span>
					<span class="arrow ">
					</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="layout_session_timeout.html">
							Columbia University</a>
						</li>
						<li>
							<a href="layout_idle_timeout.html">
							Boeing</a>
						</li>
						<li>
							<a href="layout_language_bar.html">
							Bloomingdale High School</a>
						</li>
					</ul>
				</li>
				<li id="frontend-link" class="tooltips" data-placement="right" data-original-title="Frontend&nbsp;Theme For&nbsp;Metronic&nbsp;Admin">
					<a href="http://keenthemes.com/preview/index.php?theme=metronic_frontend" target="_blank">
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
					<a href="javascript:;">
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
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm" style="height: 50px">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>
							THEME COLOR
						</span>
						<ul>
							<li class="color-black current color-default" data-style="default">
							</li>
							<li class="color-blue" data-style="blue">
							</li>
							<li class="color-brown" data-style="brown">
							</li>
							<li class="color-purple" data-style="purple">
							</li>
							<li class="color-grey" data-style="grey">
							</li>
							<li class="color-white color-light" data-style="light">
							</li>
						</ul>
					</div>
					<div class="theme-option">
						<span>
							Layout
						</span>
						<select class="layout-option form-control input-small">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
							Header
						</span>
						<select class="header-option form-control input-small">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
							Sidebar
						</span>
						<select class="sidebar-option form-control input-small">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
							Sidebar Position
						</span>
						<select class="sidebar-pos-option form-control input-small">
							<option value="left" selected="selected">Left</option>
							<option value="right">Right</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
							Footer
						</span>
						<select class="footer-option form-control input-small">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>
			<!-- END STYLE CUSTOMIZER -->
			
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						<img height="100px" src="/website/assets/img/columbiaTEMP.jpg" />
					Columbia University <small>communities</small>
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
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_2">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_3">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_4">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_5">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_6">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_7">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_8">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_9">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_10">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
									</td>
								</tr>
								</tbody>
								</table>
							</div>
								</div>
								<div class="tab-pane fade in" id="tab_1_11">
									<div class="note note-success">
										<h4>Percentile: .95</h4>
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										John Smith
									</td>
								</tr>
								<tr>
									<td>
										2
									</td>
									<td>
										Brad Jones
									</td>
								</tr>
								<tr>
									<td>
										3
									</td>
									<td>
										Carl Johnson
									</td>
								</tr>
								<tr>
									<td>
										4
									</td>
									<td>
										Andrew Kerker
									</td>
								</tr>
								<tr>
									<td>
										5
									</td>
									<td>
										AJ Simpson
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
										<!-- CHANGE ALL OF THESE SO THEY GRAB FROM THE COMMUNITY ASSOCIATIVE ARRAY -->
										<?php echo $_SESSION['dashboard']['Attractiveness'] ? $_SESSION['dashboard']['Attractiveness']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Attractiveness_Keywords']) ? $_SESSION['dashboard']['Attractiveness_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Affability'] ? $_SESSION['dashboard']['Affability']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Affability_Keywords']) ? $_SESSION['dashboard']['Affability_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Intelligence'] ? $_SESSION['dashboard']['Intelligence']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Intelligence_Keywords']) ? $_SESSION['dashboard']['Intelligence_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Style'] ? $_SESSION['dashboard']['Style']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Style_Keywords']) ? $_SESSION['dashboard']['Style_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Promiscuity'] ? $_SESSION['dashboard']['Promiscuity']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Promiscuity_Keywords']) ? $_SESSION['dashboard']['Promiscuity_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Humor'] ? $_SESSION['dashboard']['Humor']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Humor_Keywords']) ? $_SESSION['dashboard']['Humor_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Confidence'] ? $_SESSION['dashboard']['Confidence']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Confidence_Keywords']) ? $_SESSION['dashboard']['Confidence_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Fun'] ? $_SESSION['dashboard']['Fun']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Fun_Keywords']) ? $_SESSION['dashboard']['Fun_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Kindness'] ? $_SESSION['dashboard']['Kindness']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Kindness_Keywords']) ? $_SESSION['dashboard']['Kindness_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Honesty'] ? $_SESSION['dashboard']['Honesty']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Honesty_Keywords']) ? $_SESSION['dashboard']['Honesty_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Reliability'] ? $_SESSION['dashboard']['Reliability']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Reliability_Keywords']) ? $_SESSION['dashboard']['Reliability_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Happiness'] ? $_SESSION['dashboard']['Happiness']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Happiness_Keywords']) ? $_SESSION['dashboard']['Happiness_Keywords']: "N/A" ?>
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
										<?php echo $_SESSION['dashboard']['Ambition'] ? $_SESSION['dashboard']['Ambition']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Ambition_Keywords']) ? $_SESSION['dashboard']['Ambition_Keywords']: "N/A" ?> 
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
										<?php echo $_SESSION['dashboard']['Humility'] ? $_SESSION['dashboard']['Humility']: "--" ?>
									</td>
									<td>
										<?php echo isset($_SESSION['dashboard']['Humility_Keywords']) ? $_SESSION['dashboard']['Humility_Keywords']: "N/A" ?>
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