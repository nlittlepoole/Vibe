<!DOCTYPE html>

<!-- START UP THE SESSION -->

<?php 
    error_reporting(0);
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/config.php");
    
    $action = isset( $_GET['action'] ) ? $_GET['action'] : ""; //sets $action to "Action" url fragment string if action isn't null
    $recipient;
    $pic;
    $question;
    $question_id;
    $vibe;
    $next;
    $logoutURL = $_SESSION['logoutUrl'];
	
	$dashboard=$_SESSION['dashboard'];
    $profpic=$dashboard['pic'];
	
    switch ( $action ) {
  		case 'test':
	  	    $question="Is Noah Stebbins confident?";
	    	$pic="/img/profpic-sample1.jpg";
	    	$next="questions.php?action=test";
	    break;
	    default:
		    $pic = $_SESSION['pic'];
		    $question = $_SESSION['question'];
		    $next="/index.php?action=question";
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
<title>Question | Vibe</title>
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
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.css" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
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
	<script src="../jQuery/jquery.js"></script> 
    <script> 
    $(function(){
      $("#includedContent2").load("sidebar.php"); 
    });
    </script> 
    
    <div id="includedContent2"></div>
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
			<!-- BEGIN PAGE HEADER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Questions <small>Vibe</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="/index.php?action=dashboard">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Questions</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Question:
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body form">
							<div class="note note-info">
								<h4 class="block"><?php echo $question ?></h4>
							</div>
							<div style="display: block; margin-left: auto; margin-right: auto">
								<img src=<?php echo $pic ?> style="width: 300px; overflow:hidden; border-radius: 50%">
							</div>
							<form role="form" class="form-horizontal form-bordered" action="/index.php?action=submit" method="post">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Vibe Score</label>
										<div class="col-md-4">
											<div id="slider-snap-inc" class="slider bg-green">
											</div>
											<input type="hidden" id="slider-snap-inc-amount" name="slideVal"/>
										</div>
									</div>
									<div class="form-group last">
										<label class="col-md-3 control-label">Comments</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="commentsVal" placeholder="Enter comments" maxlength="60">
											<span class="help-block">
												Please enter any comments above.
											</span>
										</div>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<input type="submit"  class="btn green">
										<button type="button" onclick="location.href='/index.php?action=question'" class="btn default">Skip</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
		<!-- BEGIN CONTENT -->
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
	<script src="assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js"></script>
	<script src="assets/scripts/ui-jqueryui-sliders.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   App.init();  // set current page
   UIjQueryUISliders.init();
});
	</script>
	<!-- END JAVASCRIPTS -->
	</body>
	<!-- END BODY -->
	</html>