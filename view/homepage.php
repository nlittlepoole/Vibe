  <?php 
  error_reporting(0);
  session_start();
  $path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . "/php-sdk/facebook.php");
require_once($path . "/config.php");
    
    $loginUrl = $_SESSION['loginUrl'];
   ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Vibe</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

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
					<li><a href="#team">Team</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
		</header>

		<!-- Home Section -->
		<section id="home" class="page parallax">
			<!-- Messaging Carousel -->
			<div id="home-messages" class="carousel slide" data-interval="3000">
			  <!-- Messages -->
			  <div class="carousel-inner">
			    <div class="item active">
			    	<span>Vibe: A Social Experiment<br /><p><button id="rounded_corners" class="btn btn-large btn-primary" style="background-color: #000033" onclick="location.href='<?php echo $loginUrl ?>'">Log in with Facebook <i class="icon-circle-arrow-right" style="color: white" ></i></button></p></span>
			    </div>
			  </div>
			</div>
		</section>

		<!-- About Section -->
		<section id="about" class="page">
			<div class="container">
				<div class="row-fluid">
					<h1 class="page-title">About</h1>
					<h2 class="page-subtitle">Feedback for Everyone</h2>
					<div class="text-section">
						<p>Have you ever wondered how you came across during an interview? Were you making eye contact? Did you maintain a consistent tone? At Vibe, we believe you should have access to this information. It's helpful to have feedback from a third party.</p>
						<p>Vibe sets you up with a list of questions about you that your peers will answer. Over time, responses from your friends will generate a summary of the vibe you give off to your community. We protect and privatize your feedback so only <em>you</em> receive it. Set up an account for free with us today!</p>
					</div>
				</div> <!-- end row-fluid -->
				<!-- Services -->
				<div class="grid">
					<div class="row-fluid">
						<div class="span4">
							<h3 class="icon-thumbs-up">Feedback</h3>
							<p>Get a third party perspective with a summary of question results on your own privatized dashboard.</p>
						</div>
						<div class="span4">
							<h3 class="icon-heart">Communities</h3>
							<p>Answer questions from both your peers and people in your local community.</p>
						</div>
						<div class="span4">
							<h3 class="icon-trophy">Leaderboards</h3>
							<p>See how you fare for a particular question in the local community.</p>
						</div>
					</div> <!-- end row-fluid -->
				</div> <!-- end grid -->
			</div> <!-- end container -->
		</section>

		<!-- Team Section -->
		<section id="team" style="background: url(../img/greenwall1.jpg) no-repeat center center fixed" class="page">
			<div class="container">
				<h1 class="page-title" style="color: white">Team</h1>
				<h2 class="page-subtitle" style="color: white">Our Thinkers and Makers</h2>
				<!-- Team Members -->
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
								to Drake's new album.</p>
							<ul class="icons-list">
								<li><a href="http://www.facebook.com/nlittlepoole" class="icon-facebook">Facebook</a></li>
								<li><a href="#" class="icon-twitter">Twitter</a></li>
								<li><a href="http://www.linkedin.com/pub/niger-little-poole/55/803/557" class="icon-linkedin">LinkedIn</a></li>
							</ul>
						</div>
						<div class="span4">
							<img src="/img/question.png" alt="" class="profile" />
							<h3 style="color: white">You?</h3>
							<h4 style="color: white">An Awesome Person</h4>
							<p style="color: white">Join Vibe today! Become a part of the next big thing in social feedback.</p>
						</div>
					</div> <!-- end row-fluid -->
				</div> <!-- end grid -->
			</div> <!-- end container -->
		</section>

		<!-- Contact Section -->
		<section id="contact" class="page">
			<div class="container">
				<h1 class="page-title">Contact</h1>
				<h2 class="page-subtitle">Get in Touch!</h2>
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
	            <li class="icon-map-marker">Columbia University<br>New York, NY<br>10027</li>
	            <li class="icon-envelope">teamgovibe@gmail.com</li>
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

		<!-- Footer -->
		<footer id="main-footer">
			<p>&copy; 2013 Strand by <a href="http://www.glorm.com">Glorm</a></p>
		</footer>

		<!-- Preloader -->
		<div id="preloader"></div>
		
		<!-- Plugins & Scripts -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
		<script>window.jQuery || document.write('<script src="/js/jquery.min.js" type="text/javascript"><\/script>')</script>
		<script src="/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
		<script src="/js/jquery.flexslider-min.js" type="text/javascript"></script>
		<script src="/js/jquery.isotope.min.js" type="text/javascript"></script>
		<script src="/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
		<script src="/js/main.js" type="text/javascript"></script>

		<script type="text/javascript">
			//Twitter feed
		  $('#tweets').tweet({
		  	modpath: 'twitter/index.php',
		    username: 'twitter', // Enter Twitter Username Here
		    count: 1,
		    template: [
					'{text}{time}'
				].join( '' ), 
		    loading_text: "loading tweets..."
		  });
	  </script>

	</body>
</html>
