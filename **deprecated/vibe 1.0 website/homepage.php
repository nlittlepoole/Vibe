  <?php 
  error_reporting(0);
  session_start();
    
    $loginUrl = $_SESSION['loginUrl'];
   ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Vibe</title>
		<meta name="description" content="A Social Directory">
		<meta property="og:title" content="Vibe" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="http://go-vibe.com/img/vibe.jpg" />
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href="/vibe.ico" rel="SHORTCUT ICON">
		<link rel="stylesheet" href="/css/bootstrap.css">
		<link rel="stylesheet" href="/css/bootstrap-responsive.css">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/main.css">

		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body data-spy="scroll" data-target="#top-bar">
		<!-- Header -->
		<header id="top-bar">
			<nav id="site-navigation">
				<h1 id="site-name" class="hide-text">VIBE</h1>
				<!--NOTE: We have a Chrome Bug with the way CONTACT is rendered -->
				<a href="#" id="menu-trigger" class="hide-text icon-menu">Main Menu</a>
				<!-- Main Navigation -->
				<ul class="menu nav">
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
		</header>

		<!-- Home Section -->
		<section id="home" class="page parallax"><div>
			<!-- Messaging Carousel -->
			<div id="home-messages" style="top: 40%;" class="carousel slide" data-interval="3000">
			  <!-- Messages -->
			  <div class="carousel-inner">
			    <div class="item active">
			    	<span><br /><span style="color: white">Vibe</span><br /><span style="font-size: 32px" class="stylized">the anonymous peer feedback network</span>
			    		<p style="margin-bottom: 0.1em"><button id="rounded_corners" class="btn btn-large btn-primary" style="background-color: #3B5998" onclick="location.href='<?php echo $loginUrl ?>'">Log in with Facebook 
			    			<i class="icon-circle-arrow-right" style="color: white" ></i>
		    			</button></p>
		    				<a style="font-size: 20px; font-weight: normal; font-family: sans-serif; color: white; text-transform: lowercase; text-decoration: underline" href="#about" id="aboutlink">Learn more</a>
	    			</span>
			    </div>
			  </div>
			</div>
			<div style="background-color: black; font-family: sans-serif; font-size: 18px; color: white; bottom: 3%; position: absolute; width: 100%; text-align: center">We promise we won't post anything to Facebook!</div>
		</div></section>

		<!-- About Section -->
		<section class="page">
			<div class="container" id="about">
				<div class="row-fluid">
					<h1 class="page-title">About</h1>
					<h2 class="page-subtitle">all about the first impression.</h2>
					<div class="text-section">
						<p>Have you ever wondered what impression you leave on an interviewer, friend, or relative? 
								Vibe gives you a concise summary of feedback from your peers by tracking specific traits. 
								You can also answer questions about others to give them feedback. And all answers are anonymous!
							You can browse the profiles of your friends and communities to see what people said about them.</p>	
					</div>
				</div> <!-- end row-fluid -->
				<!-- Services -->
				<div class="grid">
					<div class="row-fluid">
						<div class="span4">
							<h3 class="icon-thumbs-up">Feedback</h3>
							<p>Get anonymous feedback from your peers!</p>
						</div>
						<div class="span4">
							<h3 class="icon-heart">Profiles</h3>
							<p>View peoples' profiles to see what others said about them!</p>
						</div>
						<div class="span4">
							<h3 class="icon-trophy">Leaderboards</h3>
							<p>See how you compare to your communities!</p>
						</div>
					</div> <!-- end row-fluid -->
				</div> <!-- end grid -->
			</div> <!-- end container -->
		</section>

		<!-- Team Section -->
		<!--
		<section id="team" style="background: url(../img/greenwall1.jpg) no-repeat center center fixed" class="page">
			<div class="container">
				<h1 class="page-title" style="color: white">Team</h1>
				<h2 class="page-subtitle" style="color: white">Our Thinkers and Makers</h2>
				
				<div class="grid">
					<div class="row-fluid">
						<div class="span4">
							<img src="/img/noah1.jpg" alt="" class="profile" />
							<h3 style="color: white">Noah</h3>
							<h4 style="color: white">Co-founder</h4>
							<p style="color: white">Noah is a sophomore studying Computer Science with a minor in Economics. In his spare
								time, he enjoys playing ping pong, running, and playing ukelele.</p>
							<ul class="icons-list">
								<li><a href="http://www.facebook.com/emanuelstebbins" class="icon-facebook">Facebook</a></li>
								<li><a href="#" class="icon-twitter">Twitter</a></li>
								<li><a href="http://www.linkedin.com/in/noahstebbins" class="icon-linkedin">LinkedIn</a></li>
							</ul>
						</div>
						<div class="span4">
							<img src="/img/niger1.jpg" alt="" class="profile" />
							<h3 style="color: white">Niger</h3>
							<h4 style="color: white">Co-founder</h4>
							<p style="color: white">Niger is a sophomore studying Operations Research with a minor in Computer Science. When he's
								not watching Legend of Korra, he's probably playing ping pong, surfing subreddits, or listening
								to some Childish Gambino.</p>
							<ul class="icons-list">
								<li><a href="http://www.facebook.com/nlittlepoole" class="icon-facebook">Facebook</a></li>
								<li><a href="https://twitter.com/AlwayScheming" class="icon-twitter">Twitter</a></li>
								<li><a href="http://www.linkedin.com/pub/niger-little-poole/55/803/557" class="icon-linkedin">LinkedIn</a></li>
							</ul>
						</div>
						<div class="span4">
							<img src="/img/question.png" alt="" class="profile" />
							<h3 style="color: white">You?</h3>
							<h4 style="color: white">An Awesome Person</h4>
							<p style="color: white">Join Vibe today! Become a part of the next big thing in social feedback.</p>
						</div>
					</div> 
				</div> 
			</div> 
		</section>
		-->

		<!-- Contact Section -->
		<section id="contact" style="background: #258dc8; /* Old browsers */
background: -moz-linear-gradient(left,  #258dc8 35%, #258dc8 44%, #1a2389 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(35%,#258dc8), color-stop(44%,#258dc8), color-stop(100%,#1a2389)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left,  #258dc8 35%,#258dc8 44%,#1a2389 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left,  #258dc8 35%,#258dc8 44%,#1a2389 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left,  #258dc8 35%,#258dc8 44%,#1a2389 100%); /* IE10+ */
background: linear-gradient(to right,  #258dc8 35%,#258dc8 44%,#1a2389 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#258dc8', endColorstr='#1a2389',GradientType=1 ); /* IE6-9 */
" class="page">
			<div class="container">
				<h1 class="page-title">Contact</h1>
				<h2 class="page-subtitle">get in touch!</h2>
				<div class="row-fluid">
					<div class="span8 main-form">
						<h3>Send Us a Message</h3>
						<p id="response"></p>
						<form method="post" action="/send-email.php" id="contact-form">
							<label for="sender-name" class="hide-text">Your Name</label>
							<input type="text" name="sender-name" id="sender-name" placeholder="Your Name" />
		          <label for="sender-email" class="hide-text">Your Email</label>
		          <input type="text" name="sender-email" id="sender-email" placeholder="Your Email" required />
		          <label for="message" class="hide-text">Your Message</label>
		          <textarea name="message" id="message" rows="6" required placeholder="Your Message"></textarea>	
		          <input type="submit" name="submit" id="submit" value="Send &raquo;" class="btn btn-inverse" />
						</form>
					</div> <!-- end main-form -->
					<div class="span4 sidebar">
						<h3>Contact Info</h3>
						<ul class="info-list">
	            <li class="icon-map-marker">6536 Lerner Hall<br />2920 Broadway<br>New York, NY<br>10027</li>
	            <li class="icon-envelope">team@go-vibe.com</li>
	          </ul>
	          <h3>Social Media</h3>
	          <ul class="icons-list">
	            <li><a href="" title="Facebook" class="icon-facebook">Facebook</a></li>
	            <li><a href="" title="Twitter" class="icon-twitter">Twitter</a></li>
	            <li><a href="" title="LinkedIn" class="icon-linkedin">LinkedIn</a></li>
	          </ul>
					</div> <!-- end sidebar -->
				</div> <!-- end row-fluid -->
			</div> <!-- end container -->
		</section>
		
		<!-- BEGIN FOOTER -->
		<footer id="main-footer">
			 <p style="text-align: center; color: #999999;">
				 2014 &copy; Vibe LLC. &nbsp;&nbsp;&nbsp;
		
				 <a href="/website/terms.php">Terms and Conditions</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 <a href="/website/privacy.php">Privacy Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;
			 </p>
		</footer>
		<!-- END FOOTER -->
		

		<!-- Preloader -->
		<div id="preloader"></div>
		
		<!-- Plugins & Scripts -->
		
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>-->
		<script>window.jQuery || document.write('<script src="/js/jquery.min.js" type="text/javascript"><\/script>')</script>
		<script src="/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
		<script src="/js/jquery.flexslider-min.js" type="text/javascript"></script>
		<!-- <script src="/js/jquery.isotope.min.js" type="text/javascript"></script>-->
		<!--<script src="/js/jquery.magnific-popup.min.js" type="text/javascript"></script>-->
		<script src="/js/main.js" type="text/javascript"></script>
		
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47556210-1', 'go-vibe.com');
  ga('send', 'pageview');

</script>
<!--<?php echo isset($_SESSION['redirect']) ? "<script type='text/javascript'>alert('Log in to use Vibe Communities and Profiles!');</script>" :"" ?>-->
	</body>
</html>
