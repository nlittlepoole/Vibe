<!DOCTYPE html>

<!-- File has been changed to a PHP file -->

<!-- START UP THE SESSION -->
<?php 
	error_reporting(0);
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/config.php");
	require($path . "/php-sdk/facebook.php"); //imports facebook api methods and objects
    
    buildCheckBoxes();
    
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "Invite more Friends to Vibe for Comments"; //sets $action to "Action" url fragment string if action isn't null
    $dashboard=$_SESSION['dashboard'];
    $pic=$dashboard['pic'];
  
  
   function buildCheckBoxes(){
   	   //CURRENTLY WORKING ON THIS -- DO NOT TOUCH!
       $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	   $sql = "SELECT attractivenessDisableDate,affabilityDisableDate,intelligenceDisableDate,styleDisableDate,promiscuityDisableDate,humorDisableDate,confidenceDisableDate,funDisableDate,kindnessDisableDate,honestyDisableDate,reliabilityDisableDate,happinessDisableDate,ambitionDisableDate,humilityDisableDate FROM user WHERE UID=" . $_SESSION['userID'];
	   $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
	   $st->execute();//executes query above
	   $data=$st->fetch(); 
	   
	   $traitsOn = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0); 
	   
	   $test = 0;
	   if($data['attractivenessDisableDate'] != "") {
	       $traitsOn[0] = 1; 
	   }
	   if($data['affabilityDisableDate'] != "") {
	       $traitsOn[1] = 1; 
	   }
	   if($data['intelligenceDisableDate'] != "") {
	       $traitsOn[2] = 1; 
	   }
	   if($data['styleDisableDate'] != "") {
	       $traitsOn[3] = 1; 
	   }
	   if($data['promiscuityDisableDate'] != "") {
	       $traitsOn[4] = 1; 
	   }
	   if($data['humorDisableDate'] != "") {
	       $traitsOn[5] = 1; 
	       $test = 1; 
	   }
	   if($data['confidenceDisableDate'] != "") {
	       $traitsOn[6] = 1; 
	   }
	   if($data['funDisableDate'] != "") {
	       $traitsOn[7] = 1; 
	   }
	   if($data['kindnessDisableDate'] != "") {
	       $traitsOn[8] = 1; 
	   }
	   if($data['honestyDisableDate'] != "") {
	       $traitsOn[9] = 1; 
	   }
	   if($data['reliabilityDisableDate'] != "") {
	       $traitsOn[10] = 1; 
	   }
	   if($data['happinessDisableDate'] != "") {
	       $traitsOn[11] = 1; 
	   }
	   if($data['ambitionDisableDate'] != "") {
	       $traitsOn[12] = 1; 
	   }
	   if($data['humilityDisableDate'] != "") {
	       $traitsOn[13] = 1; 
	   }
	   
	   $conn = null; 
	   
	   $_SESSION['vibetraits'] = array("attractiveness", "affability", "intelligence", "style", 
	   "promiscuity", "humor", "confidence", "fun", "kindness", "honesty", "reliability", 
	   "happiness", "ambition", "humility");
	   
	   
	   
	   $_SESSION['traitsSettings'] = array(); 
	   for($i = 0; $i < 14; $i++) {
	       $purchase = "Purchase now for " . 30 . " points";
		   $disabled = ""; 
		   if($traitsOn[$i] == 1) {
		   	  	
		   	  $datetime2 = new DateTime(date("Y-m-d H:i:s", time()));
		      $datetime1 = new DateTime($data[$_SESSION['vibetraits'][$i] . "DisableDate"]);
		      $interval = $datetime1->diff($datetime2);
		      
		      $time=$interval->format('%a');
			  $timeRemaining = 7 - $time; 
		      if($time==='0 days'){
		        $time=$interval->format('%h hrs');
		        if($time==='0 hrs'){
		          $time=$interval->format('%i mins');
		        }       
		      }
			   
		   	   $purchase = $timeRemaining . " days remaining";
			   $disabled = "disabled"; 
		   }   	
		
	       $_SESSION['traitsSettings'][$i] = '<tr>
				<td>
					' . $_SESSION['vibetraits'][$i] . '
				</td>
				<td>
					' . $purchase . '
				</td>
				<td>
					<label class="checkbox" ' . $disabled . '>
					<input type="checkbox" name="checkbox' . ($i + 1) . '" value="option' . ($i + 1) . '" ' . $disabled . '> 
					</label>
				</td>
			</tr>';
	   	
	   }
   }  
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
<title>Settings</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
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

<script text="text/javascript">
function validateForm()
{
	var x = document.forms["settingsform"]["websitelink"].value;
	if (x.indexOf('.com') < 0 || x.indexOf('.edu') < 0 || x.indexOf('.org') < 0 || x.indexOf('.us') < 0 || x.indexOf('.net') < 0)
	{
		//alert("Problem!"); 
	    document.getElementById("websiteURL").className+=' has-error';
	    document.getElementById("helpWebsite").innerHTML='Please enter a valid website URL!'; 
	    return false;
	}
}
</script>

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
				<li class="start ">
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
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Settings <small>vibe</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="/index.php">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Settings</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			
			<div class="row">
				<div class="col-md-12 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box green ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> User Settings
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="" class="reload"></a>
								<a href="" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" method="post" action="searchresults.php" onsubmit="return validateForm()" name="settingsform">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Blurb</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="blurb" placeholder="Enter blurb" maxlength="100">
											<span class="help-block">
												This is a short blurb that will appear under your name on your profile.
											</span>
										</div>
									</div>
									<div class="form-group" id="websiteURL">
										<label class="col-md-3 control-label">Website</label>
										<div class="col-md-9">
											<div class="input-icon left">
												<i class="fa fa-laptop"></i>
												<input type="text" class="form-control" name="websitelink" placeholder="Website URL">
												<span class="help-block" id="helpWebsite">
												A link to your website that will appear on your profile. Optional.
												</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label"><span class="tooltips" data-container="body" data-original-title="You can disable up to seven of your Vibe scores for a week each.">Disable Vibe Scores <i class="fa fa-question-circle"></i></span></label>
										
											<div class="checkbox-list">
												<div class="table-responsive">
													<table class="table table-striped table-hover">
													<tbody>
														<?php 
															foreach($_SESSION['traitsSettings'] as $traitSet){
																echo $traitSet;
															} 
														?>
													</tbody>
													</table>
												</div>
												
												
												
											
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Display location?</label>
										<div class="col-md-9">
											<div class="radio-list">
												<label class="radio-inline">
												<input type="radio" name="optionsLocations" id="optionsLocations1" value="option1"> Yes </label>
												<label class="radio-inline">
												<input type="radio" name="optionsLocations" id="optionsLocations2" value="option2" checked> No </label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Display birthdate?</label>
										<div class="col-md-9">
											<div class="radio-list">
												<label class="radio-inline">
												<input type="radio" name="optionsBirthdate" value="bdate1"> Yes </label>
												<label class="radio-inline">
												<input type="radio" name="optionsBirthdate" value="bdate2" checked> No </label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Display # of friends?</label>
										<div class="col-md-9">
											<div class="radio-list">
												<label class="radio-inline">
												<input type="radio" name="optionsFriends" id="optionsFriends1" value="option1" checked> Yes </label>
												<label class="radio-inline">
												<input type="radio" name="optionsFriends" id="optionsFriends2" value="option2"> No </label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<input type="submit" class="btn green" />
										<!-- <input type="button" class="btn default" /> -->
									</div>
								</div>
							</form>
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