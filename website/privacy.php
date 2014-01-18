<!DOCTYPE html>


<!-- START UP THE SESSION -->
<?php 
	error_reporting(0);
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/config.php");
    
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "Invite more Friends to Vibe for Comments"; //sets $action to "Action" url fragment string if action isn't null
    $dashboard=$_SESSION['dashboard'];
    $pic=$dashboard['pic'];
	
	//FOR NOW I CANNOT GET ADVOCATES TO CALL ITSELF ON THE ACHIEVEMENTS PAGE
    //require($path . "/" . CLASS_PATH . "/Web/Achievements.php");
	//achievementsNotificationCreator($achievementsNavBar); 
	//$_SESSION['achievementsInfo'] = achievements();
?>

<!-- ACHIEVEMENTS -->

<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Privacy Policy</title>
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

<!-- BEGIN PAGE SPECIFIC CONTENT HERE -->

<div class="clearfix">
</div>
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
					<a href="/index.php">
					<i class="fa fa-home"></i>
					<span class="title">
						Home
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<li class="start active">
					<a href="privacy.php">
					<i class="fa fa-eye"></i>
					<span class="title">
						Privacy Policy
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<li class="start">
					<a href="terms.php">
					<i class="fa fa-book"></i>
					<span class="title">
						Terms and Conditions
					</span>
					<span class="selected">
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
			
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Privacy Policy <small>Vibe</small>
					<!-- FILL THIS WITH THE PROF PIC OF THE COMMUNITY'S FACEBOOK PAGE -->
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Privacy Policy</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->

			<div class="clearfix">
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Privacy Policy
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="note note-success">
								
								<!-- BEGIN PRIVACY POLICY -->
								
								<p>
Last revised: January 5th, 2014<br>
 <br />
INTRODUCTION<br>
Vibe LLC (&ldquo;Vibe&rdquo;, &ldquo;Us&rdquo;, &ldquo;Our&rdquo; or &ldquo;We&rdquo;) is concerned about privacy matters and wants you to be familiar with how We collect, use and disclose your personal information.<br>
 <br />
This Privacy Policy is incorporated into and forms part of the terms of service or use of any website or software application or service operated or provided by Vibe (collectively, &ldquo;Services&rdquo; and each is a &ldquo;Service&rdquo;).<br>
 <br />
By using a Service or otherwise providing Us with your personal information, you are accepting the practices described in this Privacy Policy, as they may be amended by Us from time to time, and agreeing to Our collection and use of your personal information in accordance with this Privacy Policy. The terms in this Privacy Policy may be changed so you should review it periodically for changes.<br>
 <br>
WHAT IS PERSONAL INFORMATION<br>
Personal information means any information about an identifiable individual given to Vibe by that individual. Personal information includes such things as age, telephone number, e-mail addresses and mailing address. Information about an individual collected from other Vibe users is not protected under this privacy agreement. <br /><br />
WE ARE ACCOUNTABLE TO YOU<br>
Vibe is responsible for all personal information within its possession or control, including any personal information that is transferred to third parties for legal, regulatory, processing, storage or other purposes. We have employees who are accountable for compliance with these privacy and security principles. Our privacy officer is responsible for Our compliance and commitment to this Privacy Policy. We require a comparable level of protection from Our third party relations.<br><br />
WE LET YOU KNOW WHY WE COLLECT AND USE YOUR PERSONAL INFORMATION<br>
Vibe identifies the purpose for which your personal information is collected and will be used or disclosed. If that purpose is not listed below, We will do this before or at the time the information is actually being collected. All personal information collected by Us from Service visitors, registered users and other individuals (as applicable) is collected, at a minimum, for the following purposes:<br>
to administer and manage the Services and Our business operations;<br>
to identify or contact users of Services, respond to user inquiries and otherwise maintain relations with users;<br>
to provide users and prospective users with information about Our Services;<br>
to provide services requested by Our users;<br>
to bill, process and/or collect payment;<br>
to help prevent or investigate fraud, theft of power or other breaches of the law;<br>
to request user participation in surveys or contests;<br>
to comply with legal and governmental requirements;<br>
to perform statistical analyses of user behaviour and characteristics, in order to measure interest in and use of the various sections of a Service so as to improve design, navigation and experience of such Service; and/or<br>
fulfilling any other purpose that would be reasonably apparent to the average person at the time that We collect it.<br><br />
WE WILL OBTAIN YOUR CONSENT TO COLLECT, USE AND/OR DISCLOSE YOUR PERSONAL INFORMATION<br>
Vibe will obtain your consent before, or when, We collect, use and/or disclose your personal information. By accepting services from Us, using the Service, or otherwise providing Us with your personal information, you will be deemed to consent to Our use of your personal information for the purposes outlined above. Otherwise, Vibe will obtain your express consent (by verbal, written or electronic agreement) to collect, use or disclose your personal information. You can change your consent preferences at any time by contacting Vibe (please refer to the &ldquo;How to Contact Us&rdquo; section below).<br>
Vibe will not use or disclose your personal information for purposes other than those for which it was collected, except with your consent or as permitted or required by law or regulatory authorities. Your consent to the collection, use and/or disclosure of your personal information may be either express or implied, depending on the circumstances, the purposes for which such personal information is being collected and the sensitivity of the information.<br><br />
WE LIMIT COLLECTION OF YOUR PERSONAL INFORMATION<br>
Vibe collects only the information required to provide Our products and services to you. Vibe will collect personal information only by clear, fair and lawful means. We will not, as a condition of supplying you with a product or service, require you to consent to the collection, use or disclosure of information beyond that required to fulfill the specified, legitimate purpose.<br><br />
WHAT INFORMATION DO WE COLLECT?<br>
We may collect the following types of information from you:<br>
Registration Information: When You sign up for a user account for any of the Services, We will collect personal information, such as your name, email address and,other identifying information.<br>
IP Information: In general, We collect and use anonymous information and data regarding your access and use of Services and the Services. When you visit Services via a web browser, Our servers record the information that your browser automatically sends whenever visiting or using any of the Services, including Your web request, the Internet Protocol (&ldquo;IP&rdquo;) address and browser configuration of your Device (as defined below), the date and time of your request, the uniform resource locator of the referring and/or exiting websites. In this Privacy Policy, &ldquo;Device&rdquo; means a computer, mobile phone, handset, tablet or other device enabled for internet access and/or communication.<br>
Tags and Analytical Tracking: As part of making the Services available, We use tracking tools such as scripts, internet tags, cookies, graphic tags, web beacons and similar means (collectively, &ldquo;Tags&rdquo;) on the Services to enhance functionality and navigation for Our Service users. Portions of the Services may use analytical tools that are operated by Us and third party providers (collectively, the &ldquo;Analytical Tools&rdquo;).<br><br />
Vibe Feedback: Vibe collects information from its question and answer service. This information is collected anonymously.<br>
We may use Tags on the Services to count users and to recognize users by accessing Tags. Being able to access Tags allows Us to personalize the Services and improve your experience at the Services. We may also include Tags in HTML-formatted e-mail messages that We send to determine which e-mail messages were opened.<br>
Tags do not collect or contain your personal information. Information tracked through these mechanisms includes, but is not limited to: (i) your IP address and other IP information set out in (b) above; (ii) the type of web browser and operating system being used; (iii) the pages of Services that you visit; and/or (iv) other websites that you have viewed before visiting one of the Services. Some types of Tags, such as cookies, may be disabled whereas others may not. If you wish to disable cookies, refer to your browser help menu to learn how to disable cookies. Please note that if you disable cookies, you may be unable to access some customized features on the Services. Cookies do not collect or contain your personal information.<br><br />
In the case of Analytical Tools, the information generated by the Tags about your use of the Services (including your IP address) may be transmitted to and stored on servers located outside of Ontario including, but not limited to, other Canadian provinces and the United States. The information generated by the Tags may also be transferred to third party providers of Analytical Tools. This information will be used for the purpose of evaluating your use of the Services, compiling reports on Services activity and providing other services relating to Services activity and Internet usage. The third party providers of Analytical Tools may also transfer this information to other third parties where they are required to do so by law, or where such third parties process the information on their behalf.<br>
By using a Service, you consent to the processing of data about you by third party providers of Analytical Tools in the manner and for the purposes set out above.<br><br />
Information that You Provide: We may occasionally request from You or You may otherwise voluntarily provide Us with information that personally identifies You (including, but not limited to, product or service purchases, user support, contests, feedback, surveys and forums). We may receive personal information about You from a broad range of activities through the Services, including, but not limited to, Your inputs to the Services and general correspondence with Us. Depending on the service used, the personal information We collect may include contact information and demographic information.<br><br />
User communications: When You send email or other communications to Us, We may retain those communications in order to process Your inquiries, respond to Your requests and improve the Services and the Services.<br>
Under certain exceptional circumstances, Vibe may have a legal duty or right to collect, use or disclose your personal information without your knowledge or consent. In accordance with applicable laws, We will not disclose any consumer information (which may include personal information) without your written consent, except where consumer information is required to be disclosed: (i) for billing or market operation purposes; (ii) for law enforcement purposes; or (iii) for the purpose of complying with a legal requirement.<br><br />
We do not disclose personal information to any organization or person for any reason except as set out in this Privacy Policy and for the following purposes: (i) We may use service providers located outside of the United States, and, if applicable, your personal information may be processed and stored in other countries and therefore may be subject to disclosure under the laws of those jurisdictions; (ii) in the unlikely event of a proposed transfer of Vibe&rsquo;s business or assets (or a part thereof), or a merger or amalgamation of Vibe with another entity, We may disclose your personal information to third parties, such as prospective purchasers of Vibe&rsquo;s shares, business or assets, and to their lawyers, accountants, financial advisors, agents and other representatives as necessary for the purposes of such transaction and upon completion of such a transaction, your information will be one of the transferred assets; and/or (iii) where We otherwise have your express consent.<br>
You are deemed to consent to disclosure of your personal information for those purposes. If your personal information is shared by Us with third parties, those third parties are bound by appropriate agreements with Vibe to secure and protect the confidentiality of your personal information.<br><br />
Vibe will retain your personal information only for so long as is necessary to fulfill the purpose for which it was collected and to meet Our legal and contractual obligations. We will employ explicit retention periods for closed accounts, after which the personal information is destroyed or made anonymous.<br><br />
THE SECURITY OF YOUR PERSONAL INFORMATION IS A PRIORITY FOR Vibe<br>
We take steps to safeguard your personal information, regardless of the format in which it is held, including, but not limited to: (i) physical security measures, such as restricted access facilities and locked cabinets; (ii) electronic security measures for computerized personal information such as password protection, database encryption and personal identification numbers; (iii) organizational processes such as limiting access to your personal information to a selected group of individuals; and (iv) contractual obligations with third parties who need access to your personal information requiring them to protect and secure your personal information.<br><br />
WE ARE OPEN ABOUT OUR PRIVACY AND SECURITY POLICY<br>
We are committed to providing you with understandable and easily available information about Our policy and practices related to management of your personal information. This policy and any related information is available at all times on the Services or on request. To contact Us, refer to the &ldquo;How to Contact Us&rdquo; section below.<br><br />
WE PROVIDE ACCESS TO YOUR PERSONAL INFORMATION STORED BY US<br>
You can request access to your information stored by Us. Upon receiving such a request, Vibe will: (i) obtain satisfactory proof to confirm your identity; (ii) inform you about what type of information it has on record or in its control, how such information is used and to whom the information may have been disclosed; (iii) provide you with access to your information so you can review and verify the accuracy and completeness and request changes to the information; and (iv) make any necessary updates to your information. To access your personal information, refer to the &ldquo;How to Contact Us&rdquo; section below.<br><br />
WE RESPOND TO YOUR QUESTIONS, CONCERNS AND COMPLAINTS ABOUT PRIVACY<br>
Vibe responds in a timely manner to your questions, concerns and complaints about the privacy of your personal information and Our privacy policies and procedures.<br><br />
OTHER WEBSITES<br>
The Services have links to third party websites that Vibe does not own or maintain. Links to other websites or other resources which are not created or controlled by Vibe (&ldquo;Linked Sites&rdquo;) are intended for convenience only. Linked Sites are wholly independent from Vibe, therefore Vibe has no control over any products, services, materials, or other information contained in or available through these third party websites. We make no representations or warranties about the privacy practices of those websites. Therefore, access to any third party websites through Services, regardless of whether the third party website is a Linked Site or not, is entirely at your own risk and it is your responsibility to take all protective measures to guard against viruses or other destructive devices, programs.<br><br />
HOW TO CONTACT US<br>
You may contact Us by emailing Us at teamvibe@go-vibe.com If your questions, concerns and complaints have not been resolved to your satisfaction <br>
</p>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
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