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
<title>Terms and Conditions</title>
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
				<li class="start">
					<a href="privacy.php">
					<i class="fa fa-eye"></i>
					<span class="title">
						Privacy Policy
					</span>
					<span class="selected">
					</span>
					</a>
				</li>
				<li class="start active">
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
					Terms and Conditions <small>Vibe</small>
					<!-- FILL THIS WITH THE PROF PIC OF THE COMMUNITY'S FACEBOOK PAGE -->
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Terms and Conditions</a>
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
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Vibe TERMS OF USE
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
								
								<!-- BEGIN TERMS AND CONDITIONS -->
<p>Date last revised: January 7th 2013</p>

<p>The following terms and conditions (&ldquo;Terms of Use&rdquo;) set forth the legally binding terms and conditions for your use of the website located at go-vibe.com, all other sites owned and operated by Vibe LLC (&ldquo;Vibe&rdquo;, &ldquo;Us&rdquo;, &ldquo;Our&rdquo; or &ldquo;We&rdquo;) that redirect to go-vibe.com, and all subdomains (collectively, the &ldquo;Site&rdquo;), and the services owned, operated and offered by Vibe. The services offered by Vibe include the Site, any Vibe-branded URL, any mobile services offered or made available by Vibe, and any other features, content, or applications offered from time to time by Vibe in connection with Vibe&rsquo;s business (collectively, the &ldquo;Services&rdquo;).</p>

<p>PLEASE READ THE TERMS OF USE CAREFULLY BEFORE USING THE SERVICES AS THEY CONTAIN IMPORTANT INFORMATION REGARDING YOUR LEGAL RIGHTS, REMEDIES AND OBLIGATIONS. THESE INCLUDE VARIOUS LIMITATIONS AND EXCLUSIONS. PLEASE NOTE THAT BY AGREEING TO THE TERMS OF USE, YOU MAY BE GRANTING OR TRANSFERRING VALUABLE INTELLECTUAL PROPERTY RIGHTS TO Vibe FOR ITS COMMERCIAL USE.<br><br />
1. Acceptance. By accessing and/or using the Services, you agree to be bound by the Terms of Use, whether you are a &ldquo;Visitor&rdquo; (which means that you simply browse the Services, or otherwise use the Services without being registered) or you are a &ldquo;Member&rdquo; (which means that you have registered to use the Services). The term &ldquo;User&rdquo; refers to a Visitor or a Member. You are authorized to use the Services only if you agree to abide by all applicable laws, rules and regulations (&ldquo;Applicable Law&rdquo;) and the terms of the Terms of Use. In addition, in consideration for becoming a Member and/or making use of the Services, you must indicate your acceptance of the Terms of Use during the registration process. Thereafter, you may create your account (your &ldquo;Account&rdquo;), and its associated profile(s) in accordance with the terms of this document.<br><br />
The Terms of Use, together with all documents, policies, contest rules, and agreements incorporated into the Terms of Use by reference (&ldquo;Other Terms&rdquo;), constitutes the entire agreement between you and Vibe and supersedes all prior and contemporaneous agreements, proposals or representations, written or oral, concerning its subject matter. If you do not agree to be bound by the Terms of Use (or any applicable Other Terms) and to abide by all Applicable Law, you are not authorized to use the applicable Services and must discontinue use of all Services.<br>
Note that all of the Terms of Use are subject to the laws of the place where you live, and some of them might not be binding on you under those laws.<br /><br />
2. Definitions. Capitalized terms used in the Terms of Use and not otherwise elsewhere in the Terms of Use, shall have the following meanings:<br />
(a) &ldquo;App&rdquo; means any software application, including mobile or web applications whether written for the iOS, Android, Blackberry, Windows (desktop and/or mobile), Chrome, Mozilla or other operating systems and/or platforms.<br>
(b) &ldquo;Analytics&rdquo; means any reports, analysis, Content, data or other information that is made available by Vibe to an Originator with respect to the evaluation of an App Concept by Members.<br>
(c) &ldquo;Commercialize&rdquo; and &ldquo;Commercialization&rdquo; means to develop, make, have made, license, distribute, have distributed, resell, market, promote, sell or otherwise commercialize.<br>
(d) &ldquo;Content&rdquo; means any text, files, images, pictures, photos, video, animation, information, music, sound, audio, illustrations, data, works, works of authorship, applications, or any other materials.<br>
(e) &ldquo;Contribution&rdquo; means a Member&rsquo;s contribution to an App Concept, including any evaluations, ideas, concepts, discoveries, inventions, developments, improvements, enhancements, modifications, suggestions, feedback and/or comments relating to: (i) such App Concept (or subsequent iterations of the App Concept); (ii) the features and functionality of the App Concept; (iii) the look and feel of the App Concept; (iv) the branding, marketing and/or promotion of an App Concept; and/or (v) the Commercialization of the App Concept.<br>
(f) &ldquo;include&rdquo; and &ldquo;including&rdquo; mean, as the case may be, &ldquo;include, but not limited to&rdquo; or &ldquo;including, but not limited to&rdquo;.<br>
(g) &ldquo;Person&rdquo; means a natural person or any legal, commercial or governmental entity, such as, but not limited to, a corporation, general partnership, joint venture, limited partnership, limited liability company, trust, business association, group acting in concert, or any person acting in a representative capacity.<br>
(h) &ldquo;Personal Information&rdquo; means any information about an identifiable individual provided by that individual.<br>
(i) &ldquo;Post&rdquo; means to transmit, submit, display or publish.<br>
(j) &ldquo;Your Data&rdquo; means: (i) any data or information about you, including Personal Information, that you post to the Services or otherwise provide to Vibe by you; and (ii) any data or information derived from or generated by your use of the Services.<br>
(k) &ldquo;Answer and Comment&rdquo; means any information submitted using Vibe&rsquo;s question services. <br><br />
3. Eligibility. Use of the Services and registration to be a Member for the Services (&ldquo;Membership&rdquo;) is void where prohibited. By using the Services, you represent and warrant that: (a) all registration information you submit is truthful and accurate; (b) you will maintain the accuracy of such information; (c) your use of the Services does not violate any Applicable Law; and (d) you are 18 years of age or older or are the authorized guardian of the minor whose account that the Membership is being created and for whom you are authorizing to use the Services. In cases where you have authorized a minor to use the Services, you recognize that you are fully responsible for: (i) the online conduct of such minor; (ii) controlling the minor&rsquo;s access to and use of the Services; and (iii) the consequences of any misuse by the minor. You acknowledge that some of the portions of the Services may contain content that is inappropriate for minors and that Vibe has no obligation to monitor the Services.<br><br />
4. Modification of Terms of Use. Vibe reserves the right to modify the Terms of Use at any time and from time to time, and each such modification shall be effective upon posting on the Services. All material modifications will apply prospectively only. Your continued use of the Services following any such modification constitutes your agreement to be bound by and your acceptance of the Terms of Use as so modified. It is therefore important that you review the Terms of Use regularly. If you do not agree to be bound by such modified Terms of Use, you must discontinue use of the Services immediately.<br><br />
5. Summary of Services.<br>
The Services are in Beta. Please be aware that the Services are currently under development by Vibe and are being offered to you with potentially limited availability at this time. During this development period (or beta period), you may see and/or have access to some, but not all, of the features, portions and functionality of the Services. You may also have access to certain features and functions of the Services that may be modified or discontinued at any time without notice to you.<br>
You understand and acknowledge that the Services are being provided in &ldquo;Beta&rdquo;, and are made available on an &ldquo;AS IS&rdquo; and &ldquo;AS AVAILABLE&rdquo; basis for the purpose of providing Vibe with feedback on the quality and usability of the Services. The Services may be unreliable and should not be used for any purpose other than the evaluation of the Services.<br><br />
Vibe reserves the right to modify, suspend or stop the Services (or any part thereof), either temporarily or permanently, at any time or from time to time, with or without prior notice to you. Without limiting the foregoing, Vibe may provide notice of any such changes to the Services by posting them on its websites and/or via the Services. Vibe reserves the right to modify or replace any of its policies and practices related to the Services. To the extent that any of the foregoing requires a medication of the Terms Of Use, such modification will be made in accordance with Section 4. You agree that Vibe shall not be liable to you or any third party for any modification or cessation of the Services. You acknowledge that Vibe has no express or implied obligation to provide, or continue to provide, the Services, or any part thereof, now or in the future; and in addition, Vibe may at any time, upon prior notice as required by applicable law, institute charges or fees for the Services.<br>
(a) Description of the Services. Vibe is a platform that allows users to answer questions about other individuals. Vibe, using its proprietary systems and algorithms, compiles Analytics based on Members&rsquo; evaluations of individuals and makes such Analytics available to all Vibe Users. By using Vibe, the answers, which constitute a form of your data, become the sole property of Vibe in perpetuity. Vibe retains the right to freely publish and distribute this data as described in the corresponding Privacy Policy. </p>

<p>6. Privacy and Cookies. You can view Vibe&rsquo;s privacy policy (the &ldquo;Privacy Policy&rdquo;) here [NTD: insert a link to the privacy policy], which is incorporated into the Terms of Use by reference. The Privacy Policy provides your rights and Vibe&rsquo;s responsibilities with regard to Vibe&rsquo;s collection and use of Personal Information as well as Our use of internet tags, cookies, graphic tags and web beacons (collectively, &ldquo;Tags&rdquo;). We will not use Personal Information or Tags in any way inconsistent with the purposes and limitations provided in the Privacy Policy. By accepting the Terms of Use, you hereby consent to: (i) Vibe&rsquo;s collection and use of your Personal Information in accordance with the Privacy Policy and the Terms of Use; and (ii) Vibe&rsquo;s placement and use of Tags as described in the Privacy Policy. The Privacy Policy may be updated from time to time at Our discretion. Changes will be effective upon posting to the Site.<br><br />
7. Accounts. When you sign up to become a Member, you will have to register for and create an account (&ldquo;Account&rdquo;) in order to access and use the Services. You represent and warrant to Us that all information that you submit when you register for your Account is accurate, current and complete, and that you will keep your Account information accurate, current and complete. If We have reason to believe that any of your Account information is untrue, inaccurate, out-of-date or incomplete, We reserve the right, in Our sole and absolute discretion, to terminate your Account. You are solely responsible for the activity that occurs on your Account, whether authorized by you or not, and you must keep your Account information secure. You must notify Us immediately of any breach of security or unauthorized use of your Account. WE WILL NOT BE LIABLE FOR ANY LOSS YOU INCUR DUE TO ANY UNAUTHORIZED USE OF YOUR ACCOUNT. YOU, HOWEVER, MAY BE LIABLE FOR ANY LOSS INCURRED BY US OR OTHERS CAUSED BY YOUR ACCOUNT, WHETHER CAUSED BY YOU OR BY AN UNAUTHORIZED PERSON. The foregoing sentence shall survive the termination of the Terms of Use. Vibe retains ownership of User account data, regardless of any Intellectual Property Rights or personal information in your data.<br><br />
8. Profiles and Profile Settings. We may allow you to create multiple profiles associated with your Account on certain aspects of, or all of the Services. We may offer you, from time to time, the ability to choose how you share or make your profile, or aspects of it, available to others by means of &ldquo; Settings&rdquo;, which functionality may change as the Services evolve. Vibe currently makes all profiles of Members public. We will make good faith efforts to honour Profile Settings, but are not responsible for errors and reserve the right to change the way Settings and preferences work from time to time, so visit your Profile Settings regularly to ensure that the reflect your preferences and to see how We may have added or changed how you can exercise choice. You may not use any profile for purpose of impersonation, deception or confusion. You acknowledge and agree that any risks associated with profiles are borne solely by you. WE WILL NOT BE LIABLE FOR ANY LOSS YOU INCUR DUE TO ANY UNAUTHORIZED USE OF YOUR ACCOUNT. YOU, HOWEVER, MAY BE LIABLE FOR ANY LOSS INCURRED BY US OR OTHERS CAUSED BY YOUR ACCOUNT, WHETHER CAUSED BY YOU OR BY AN UNAUTHORIZED PERSON. The foregoing sentence shall survive the termination of the Terms of Use.<br><br />
9. The Rights that You Grant to Vibe.<br>
(a) Rights Vibe Requires to Your Data. Subject to the Privacy Policy, You hereby grant to Us a world-wide fully-paid, royalty-free, perpetual, unrestricted, transferable, sublicensable, worldwide right and license to use Your Data to: (i) to provide the Services to you; and (ii) extract information (collectively, &ldquo;Extracted Data&rdquo;) to create derivative works therefrom. You agree that, notwithstanding the generality of the foregoing, We own and may disclose, publish and otherwise use Extracted Data, whether as part of derivative works or otherwise, solely on an Aggregate Basis (as defined below) to any Person and by any means, including in connection with Analytics, case studies, press releases, or other communications. We shall own exclusive rights, including all Intellectual Property Rights, in and to all derivative works. We shall be entitled to the unrestricted use and dissemination of all derivative works for any purpose, commercial or otherwise, without acknowledgment or compensation to you. For greater certainty, We are prohibited from disclosing Your Data other than on an Aggregate Basis; provided that We may disclose Your Data where We have your express written consent or as otherwise set forth in the Terms of Use. &ldquo;Aggregate Basis&rdquo; means that We combine Your Data and/or parts of information collected or processed from you in a manner that does not contain or disclose any Personal Information.<br>
(b) Rights Vibe Requires for Feedback/Suggestions about the Services. Vibe is always improving the Services and developing new features and opportunities. If you have ideas, comments, suggestions or other feedback regarding improvements or additions to any of the Services, Vibe would like to hear them. However, (i) any submission will be subject to the Terms of Use; and (ii) Vibe does not desire that you send post or upload any information that is confidential or proprietary to you or to any other Person or Vibe. By submitting comments, messages, suggestions, ideas, concepts, feedback or other information about the Services, Vibe and/or its operations (collectively, &ldquo;Submissions&rdquo;) to Vibe, you thereby, and hereby: (a) represent and warrant that none of the Submissions are confidential or proprietary to you or to any other Person; and (b) grant Vibe and its affiliates a fully paid-up, royalty-free, perpetual, irrevocable, unrestricted, transferable, sublicensable, worldwide right and license to: (i) use, copy, publish, transmit, perform and display the Submissions for any purpose; (ii) create derivative works from such Submissions; and (iii) implement and use the Submissions and any suggestions, concepts or ideas contained therein without compensation to you. Furthermore, you agree that Vibe is not responsible for the confidentiality of any Submissions.<br>
(b) Media Waiver. You agree that Vibe has the absolute right and permission to use your name, voice, image, likeness, and your applicable Answer and Comments, as well as representations made by you, in any media (including, without limitation, television, print, radio and the Internet), world-wide, for the purposes of advertising, promoting, reporting and disseminating information about Vibe.<br><br />
10. The Rights that Vibe Grants to You. The Services contain Content owned by Vibe (&ldquo;Vibe Content&rdquo;). Vibe Content is protected by copyright, trademark, patent, trade secret and other laws, and Vibe owns and retains all rights in the Vibe Content and the Services. Vibe hereby grants you a limited, revocable, non-sublicensable license to reproduce and display the Vibe Content (excluding any software code) solely for your personal use in connection with viewing and using the Services. The Services contain Member Content. Except as otherwise provided within the Terms of Use, you may not copy, download, modify, translate, publish, broadcast, transmit, distribute, perform, display, sell or otherwise use any Member Content appearing on or through the Services (including in Analytics). The Services contain Content of third party licensors that are not Users (such licensors, &ldquo;Third Party Licensors&rdquo; and such content &ldquo;Third Party Content&rdquo;). Third Party Content is protected by copyright, trademark, patent, trade secret and other laws, and each Third Party Licensor retains all rights in its Third Party Content. You are hereby granted a limited, revocable, non-sublicensable license to view, or listen to, as applicable, the Third Party Content solely for your personal, non-commercial use in connection with viewing and using the Services. Except for the foregoing limited license, and except as otherwise expressly provided in writing by Vibe, you are granted no right, title or interest in any Third Party Content. You are only granted a limited license and there is not a sale with respect to Third Party Content. Except as otherwise provided within the Terms of Use or directly authorized by Vibe and/or a Third Party Licensor on the Services (e.g., as part of a promotion that encourages you to download specific Third Party Content for your use in connection with such promotion), you may not copy, download, modify, translate, publish, broadcast, transmit, distribute, perform, display, sell or otherwise use any Third Party Content.</p>

<p>11. Fees and Payment. Becoming a Member is free. However, We may charge fees for certain Services. When you use a Service that has a fee, you will have an opportunity to review and accept the fees that you will be charged. Changes to fees are effective after We provide you with notice by posting the changes on the Site. Vibe may add new services for additional fees and charges, or proactively amend fees and charges for existing services, at any time in its sole discretion. You are responsible for paying all fees and taxes associated with your use of fee-based Services. Fees may be paid for by providing a valid credit card or through such other means as We make available from time to time (the &ldquo;Payment Method&rdquo;). Payments may be processed by Our third party billing and payment processing provider(s) (the &ldquo;Billing Provider&rdquo;). When you provide Us with your information about your Payment Method, that information, along with other Personal Information about you, will be shared with the Billing Provider for the purposes of processing your payments. You hereby consent to the collection, use and disclosure of your Personal Information by and to the Billing Provider for the foregoing purposes. You further acknowledge and agree that the Billing Provider may also collect your Personal Information and/or other information about you and the collection and use of such information will be subject to the terms of such Billing Provider&rsquo;s privacy policy, which may be made available to you during the payment information registration process. You acknowledge and agree that We shall have no liability to you in connection with the use and disclosure of your Personal Information when collected by the Billing Provider. The foregoing sentence shall survive the termination of the Terms of Use.<br><br />
12. Permitted and Prohibited Use of the Services.<br>
(a) Use of the Services. Services are for the personal non-commercial use of Users. Vibe reserves the right to remove commercial content in its sole discretion. Illegal and/or unauthorized use of the Services, including, without limitation, collecting usernames, user id numbers, and/or e-mail addresses of Members by electronic or other means for the purpose of sending unsolicited e-mail or unauthorized framing of or linking to the Services, or employing third party promotional sites or software to promote profiles for money, is prohibited. Commercial advertisements, affiliate links, and other forms of unauthorized data collection or solicitation may be removed from Member profiles, and/or posts without notice or explanation and may result in termination of Membership privileges. Vibe reserves the right to take appropriate legal action, including, without limitation, referral to law enforcement, for any illegal or unauthorized use of the Services.<br>
(b) Prohibited Content. You are solely responsible for the Content that you post on, through or in connection with any of the Services, and any material or information that you transmit to other Members and for your interactions with other Users. The following are examples of the kind of Content that is illegal or prohibited to post on, through or in connection with the Services. Vibe reserves the right to investigate and take appropriate legal action against anyone who, in Vibe&rsquo;s sole discretion, violates this provision, including, without limitation, removing the offending Content from the Services, terminating the Membership of such violators and/or reporting such Content or activities to law enforcement authorities. Prohibited Content includes Content that, in the sole discretion of Vibe: (i) is pornographic or contains sexually explicit content (including nudity) or offensive subject matter or contains a link to an adult website; (ii) contains graphic or gratuitous violence; (iii) conveys a message of hate against any individual or group based upon their race, religion, age, gender, nationality, sexual orientation or language; (iv) encourages or glorifies drug use; (v) solicits other users for passwords or personally identifiable information; (vi) is predatory in nature, or is submitted for the purpose of harassment; (vii) is highly repetitive and/or unwanted, including &ldquo;Spam&rdquo; messages; (viii) is offensive or promotes or otherwise incites racism, bigotry, hatred or physical harm of any kind against any group or individual; (ix) solicits or is designed to solicit personal information from anyone under 18; (x) publicly posts information that poses or creates a privacy or security risk to any Person; (xi) constitutes or promotes information that you know is false or misleading or promotes illegal activities or conduct that is abusive, threatening, obscene, defamatory or libelous; (xii) furthers or promotes any criminal activity or enterprise or provides instructional information about illegal activities including making or buying illegal weapons, violating someone&rsquo;s privacy, or providing or creating computer viruses; (xiii) involves commercial activities and/or sales without prior written consent from Vibe such as contests, sweepstakes, barter, advertising, or pyramid schemes; or (xiv) violates or attempts to violate the privacy rights, publicity rights, copyrights, trademark rights, contract rights or any other rights of any Person.<br>
(c) Prohibited Activity. You shall not use the Services in any fashion except as expressly permitted by the Terms of Use. Without limiting the generality of the foregoing, You shall not directly or indirectly, do any of the following acts: (i) reverse engineer, de-compile, disassemble or otherwise attempt to discover the source code or underlying algorithms of the Services, the Site and/or any part of either of them; (ii) modify, translate, or create derivative works based on any portion of the Services and/or the Services; (iii) circumventing or modifying, attempting to circumvent or modify, or encouraging or assisting any other person in circumventing or modifying any security technology or software that is part of the Services; (iv) publish or disclose to any Person the Reports; (v) create any link to the Services or frame or mirror any Content contained or accessible from the Services; (vi) wilfully tamper with the security of any portion of the Services, the Site and/or any part of either of them; (vii) knowingly access data on or available through the Services and/or the Site not intended for You; (viii) attempt to probe, scan or test the vulnerability of any portion of the Services and/or the Site or to breach the security or authentication measures without proper authorization; (ix) unlawfully use, transmit, disseminate or otherwise make available content on or through the Services that is unlawful, threatening, abusive, libellous, slanderous, defamatory or otherwise offensive or illegal; (x) providing or using &ldquo;tracking&rdquo; or monitoring functionality in connection with the Services, including, without limitation, to identify any other Person&rsquo;s actions or other activities on the Services; (xi) impersonating or attempting to impersonate Us or Our employees (including, without limitation, the use of email addresses associated with any of the foregoing); (xii) using the account, username, or password of another user of the Services at any time or disclosing Your password to any third party or permitting any third party to access Your Account; or (xiii) violate any Applicable Law.<br><br />
16. Vibe&rsquo;s General Right to Delete Content. Vibe may reject, refuse to post or delete any Content for any or no reason, including Content that in the sole judgment of Vibe violates the Terms of Use or which may be offensive, illegal or violate the rights of any Person, or harm or threaten the safety of any Person. Vibe assumes no responsibility for monitoring the Services for inappropriate Content or conduct. If at any time Vibe chooses, in its sole discretion, to monitor the Services, Vibe nonetheless assumes no responsibility for the Content, no obligation to modify or remove any inappropriate Content, and no responsibility for the conduct of the User submitting any such Content.<br><br />
17. Interactions with Third Parties and Users. We are under no obligation to become involved in disputes between any Users, or between Users and any third party arising in connection with the use of the Services. You acknowledge and agree that your correspondences or interactions with any third parties that you interact with through the Services, including any Users, are solely as between you and such third parties. You agree that Vibe will not be responsible or liable in any way for any loss or damage of any kind incurred as a result of, or in connection with, any interaction between you and any other party. Vibe reserves the right, but has no obligation, to become involved in any way with any dispute between you and another party arising out of or that is connection with the Services. Vibe IS NOT RESPONSIBLE FOR AND MAKES NO REPRESENTATIONS, WARRANTIES, CONDITIONS OR UNDERTAKINGS OF ANY KIND, WHETHER EXPRESS OR IMPLIED, AS TO SERVICES, ANY USER CONTENT OR THE ACCURACY AND RELIABILITY OF THE USER CONTENT POSTED THROUGH OR IN CONNECTION WITH THE SERVICES, AND SUCH USER CONTENT DOES NOT NECESSARILY REFLECT THE OPINIONS OR POLICIES OF Vibe. Vibe IS NOT RESPONSIBLE FOR THE CONDUCT, WHETHER ONLINE OR OFFLINE, OF ANY USER OF THE SERVICES.<br><br />
18. Communications from Us. You acknowledge and agree that Vibe may, send messages including notifications, special offers, promotions, commercial advertisements, and marketing materials, in connection with the Services. You can control what type of communications you receive from the Services by logging into your account and choosing the appropriate notifications settings or by following the unsubscribe instructions contained at the bottom of commercial e-mails.<br><br />
19. User Presentation of Vibe or Vibe Products. Users may choose to produce a web application (including, without limitation, a website, blog, Facebook page, Twitter page, or similar) promoting or otherwise presenting Vibe or Vibe products. Any such application must comply with the following guidelines:<br>
(a) Post the following notice clearly and conspicuously on each and every page within an application: &ldquo;This application is not affiliated with, endorsed by, or in any manner provided or controlled by Vibe Corp. Vibe Corp. assumes no liability for the content of this application.&rdquo;<br>
(b) If using any Vibe branding (including, without limitation, Vibe or Vibe product brand names or logos), do not distort or alter the brand appearance. For example, do not change any spelling, do not add or merge words, and do not alter color, font or dimensions.<br>
(c) If using any Vibe Content (e.g. still photos or videos), include the following attribution: &ldquo;&copy; Vibe Corp. All rights reserved.&rdquo; adjacent to each instance of imagery.<br>
(d) Do not claim any untrue association with Vibe. Vibe Users are not employees, consultants, contractors or agents of Vibe.<br>
(e) Do not include the Vibe name or other Vibe brand name in a domain name (including, without limitation, Facebook page URL or Twitter page URL).<br><br />
20. Term and Termination. The Terms of Use, and any posted revision to the Terms of Use, shall remain in full force and effect while you use the Services or are a Member. You may terminate your Membership at any time, for any reason, by following the steps and procedures made available by Vibe from time to time. Vibe may terminate your Membership at any time, for any or no reason, with or without prior notice or explanation, and without liability. Furthermore, Vibe reserves the right, in its sole discretion, to reject, refuse to post or remove any posting (including, without limitation, private messages, e-mails and instant messages (as applicable) (collectively, &ldquo;messages&rdquo;)) by you, or to deny, restrict, suspend, or terminate your access to all or any part of the Services at any time, for any or no reason, with or without prior notice or explanation, and without liability. In addition, Vibe reserves the right, in its sole discretion, to reassign or rename your profile URL. Vibe expressly reserves the right to remove your profile and/or deny, restrict, suspend, or terminate your access to all or any part of the Services if Vibe determines, in its sole discretion, that you have violated the Terms of Use or pose a threat to Vibe, its employees, business partners, Users and/or the public. Even after Membership is terminated, the Terms of Use will remain in effect.<br><br />
21. Third Party Websites and Links. Websites and User Content may contain links to or the content of/from third party websites (collectively, &ldquo;Third Party Websites&rdquo;). Third Party Websites are not owned or controlled by Vibe, therefore Vibe has no control over any domain name, products, services, materials or other information in or available through Third Party Websites. We assume no responsibility for any Third Party Websites including any content within on or available at a Third Party Website. You agree that You assume all risk when accessing any Third Party Websites, and release Vibe from any and all liability resulting from the access and/or use of Third Party Websites. Access to any Third Party Websites through the Services, regardless of whether a Third Party Website is linked from the Services, is entirely at your own risk and it is your responsibility to take all protective measures to guard against viruses or other destructive devices, programs. Vibe makes no representations, warranties, conditions or undertakings regarding, nor endorses, any Third Party Websites.<br><br />
22. Accuracy of Content. Vibe cannot, does not and will not guarantee the accuracy, completeness and quality of any Content appearing on, or otherwise made available by, the Services (including any Analytics made available to You). You acknowledge and agree that reliance on any Content accessible through the Services, including Analytics, is solely at Your own risk. We will not be liable for any error or misinformation provided by You. You further acknowledge and agree that any Analytics that We make available to You do not provide or contain all information that may be relevant or necessary for the Commercialization (including those of an economic, financial or operational nature). WE WILL NOT BE LIABLE TO YOU OR ANY OTHER PERSON FOR THE USE, MISUSE OR RELIANCE ON ANY CONTENT.<br><br />
23. Disclaimers. EXCEPT AS EXPLICITLY PROVIDED IN THE TERMS OF USE, Vibe MAKES NO REPRESENTATIONS, WARRANTIES, CONDITIONS OR UNDERTAKINGS OF ANY KIND, EXPRESS OR IMPLIED, REGARDING THE SERVICES AND/OR ANY CONTENT, PRODUCTS OR SERVICES PROVIDED ON THE SERVICES, ALL OF WHICH ARE PROVIDED ON AN &ldquo;AS IS&rdquo; AND &ldquo;AS AVAILABLE&rdquo; BASIS. Vibe DOES NOT WARRANT THE ACCURACY, COMPLETENESS, CURRENCY, RELIABILITY OR SUITABILITY OF THE OPERATION OF THE SERVICES, OR ANY OF THE CONTENT OR DATA FOUND ON THE SERVICES, AND EXPRESSLY DISCLAIMS ALL WARRANTIES AND CONDITIONS IN RESPECT OF THE SERVICES, ITS CONTENT OR DATA, AND ANY PRODUCTS OR SERVICES OFFERED FOR SALE ON THE SERVICES, INCLUDING IMPLIED WARRANTIES AND CONDITIONS OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT, AND THOSE ARISING BY STATUTE OR OTHERWISE IN LAW OR FROM A COURSE OF DEALING OR USAGE OF TRADE. Vibe IS NOT RESPONSIBLE FOR LATE, LOST, INCOMPLETE, ILLEGIBLE, MISDIRECTED OR STOLEN MESSAGES OR MAIL, UNAVAILABLE NETWORK CONNECTIONS, FAILED, INCOMPLETE, GARBLED OR DELAYED COMPUTER TRANSMISSIONS, ON-LINE FAILURES, HARDWARE, SOFTWARE OR OTHER TECHNICAL MALFUNCTIONS OR DISTURBANCES OR ANY OTHER COMMUNICATIONS FAILURES OR CIRCUMSTANCES AFFECTING, DISRUPTING OR CORRUPTING COMMUNICATIONS. Vibe ASSUMES NO RESPONSIBILITY, AND WILL NOT BE LIABLE FOR, ANY DAMAGES TO, OR ANY VIRUSES AFFECTING YOUR COMPUTER EQUIPMENT OR OTHER PROPERTY ON ACCOUNT OF YOUR ACCESS TO, USE OF, OR BROWSING ON THE SERVICES OR YOUR DOWNLOADING OF ANY CONTENT FROM THE SERVICES.<br><br />
24. LIMITATION OF LIABILITY. YOU AGREE THAT UNDER NO CIRCUMSTANCES WILL Vibe OR ANY OF ITS OFFICERS, DIRECTORS, EMPLOYEES OR AGENTS, BE LIABLE TO YOU FOR ANY INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES WHATSOEVER, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES, WHETHER BASED ON WARRANTY, CONTRACT, TORT, OR ANY OTHER LEGAL THEORY, AND WHETHER ARISING BY LAW, STATUTE, USAGE OF TRADE, CUSTOM, COURSE OF DEALING OR PERFORMANCE, OR AS A RESULT OF THE NATURE OF THE TERMS OF USE OR IN CONFORMITY WITH USAGE, EQUITY OR LAW OR OTHERWISE, ARISING OUT OF OR IN CONNECTION WITH THE SERVICES INCLUDING ANY: (A) USE, INABILITY TO USE OR PERFORMANCE OF ANY OF THE SERVICES OR SERVICES; (B) ERRORS, MISTAKES, OR INACCURACIES OF ANY Vibe CONTENT OR USER CONTENT; (C) BUGS OR VIRUSES WHICH MAY BE TRANSMITTED TO OR THROUGH ANY OF THE SERVICES; AND/OR (D) INTERRUPTION OR CESSATION OF ANY OF THE SERVICES OR OF TRANSMISSION OF THE SERVICES (INCLUDING, THE SITE), EVEN IF Vibe HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. IN ADDITION, IN NO EVENT WILL Vibe&rsquo;S CUMULATIVE OR AGGREGATE LIABILITY TO YOU FOR DIRECT DAMAGES OF ANY KIND OR NATURE EXCEED AN AMOUNT EQUAL TO FIVE HUNDRED DOLLARS (CDN $500.00).<br><br />
25. Indemnification. You agree to indemnify and hold harmless Vibe and its officers, directors, employees, licensees and distributors from and against any and all loss, liability, damage, cost, expense, charge, fine, penalty or assessment including the costs and expenses of any claim, demand, action, cause of action, suit, arbitration, investigation, proceeding, complaint, settlement or compromise and all interest, punitive damages, fines, penalties (including legal costs on a full indemnity basis) arising out of, or asserted in connection with: (i) your use of the Services in violation of the Terms of Use; (ii) a breach of the Terms of Use; (iii) any Content that you post on, through, or in connection with the Services; (iv) your violation of the rights of any other Person; and/or (v) any claims by third parties alleging any of the foregoing.<br><br />
26. Security. Vibe reserves the right to fully cooperate with any law enforcement authorities or court order requesting or directing Vibe to disclose the identity of anyone posting any e-mail or other messages, or publishing or otherwise making available any other user-generated content that is believed or alleged (reasonably or not) to violate the Terms of Use or any law or regulation. You acknowledge and agree that Vibe may investigate any violations of law and may cooperate with law enforcement authorities in prosecuting you in this regard.<br><br />
27. Mobile Access. Use of the Service may be available through a compatible mobile device, Internet and/or network access (&ldquo;Mobile Access&rdquo;) and may require software. You may not have access to all of the same services, features, functionality, content or information when accessing the Services through Mobile Access and you must access the Services through a technology other than Mobile Access on a regular basis to access the features, functionality, content and information of the Services. You agree that you are solely responsible for these requirements, including any applicable changes, updates and fees as well as the terms of your agreement with your mobile device and telecommunications provider.<br><br />
28. Governing Law. The Terms of Use shall be governed by and construed in accordance with the lthe federal laws of the United States applicable therein, without regards to conflict of laws principles. You hereby irrevocably attorn to the exclusive jurisdiction of the courts of the United States.<br><br />
29. General Provisions. The Terms of Use, and any rights or licenses granted or waived herein, may not be transferred or assigned by you, but may be assigned by Vibe without restriction. In the event that any provision is determined to be unenforceable or invalid, that provision will nonetheless be enforced to the fullest extent permitted by applicable law, and that determination will not affect the validity and enforceability of any other remaining provisions of the Terms of Use. The failure of Vibe to exercise or enforce any right or provision of the Terms of Use shall not operate as a waiver of such right or provision. The headings used in the Terms of Use are included for convenience only and will not limit or otherwise affect the Terms of Use.<br>
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47556210-1', 'go-vibe.com');
  ga('send', 'pageview');

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>