<!DOCTYPE html>
 <html lang="en" class="no-js"> <!--<![endif]-->
	<head>
		<!--This PHP establishes the local variables necessary for the questions Don't worry about this code now. As it doesn't do anything since I never coded functions for it-->
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
    switch ( $action ) {
  		case 'test':
	  	    $question=array("Is Noah Stebbins confident?",);
	    	$pic="../img/profpic-sample1.jpg";
	    	$next="questions.php?action=test";
	    break;
	    default:
		    $pic = $_SESSION['pic'];
		    $question = $_SESSION['question'];
		    $next="/index.php?action=question";
    }

   ?>
		<meta charset="utf-8">
		<title>Vibe</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="/css/bootstrap.css">
		<link rel="stylesheet" href="/css/bootstrap-responsive.css">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/main.css">
		
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		  <script>
		  $(function() {
				$("#amount_slider").slider({
			    handle: "myhandle",
			    orientation: "horizontal",
			    range: false,
			    min: 1,
			    max: 5,
			    value: 1,
			    step: 1,
			    animate: true,
			    change: function (event, ui) {       
			        $("#amount_field").val(ui.value);
			        $("#amountDisp").text(ui.value);
			        calculate();
			    },
			     slide: function (event, ui) {
			        $("#amount_field").val(ui.value);
			        $("#amountDisp").text(ui.value);        
			    }
				});
		  });
		  </script>

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
					<li><a href="#questions">Questions</a></li>
				</ul>
			</nav>
		</header>

		<!-- Questions Section -->
		<section id="questions" class="page">
			<div class="container" id="questions-container">
				<div class="row-fluid">
					<h1 id="questions-title" class="page-title">Questions</h1>
				</div> <!-- end row-fluid -->
				<!-- Services -->
				<div class="grid">
					<div class="row-fluid">
						<div class="span12">
							<h3 class="page-subtitle" style="font-weight: normal" id="questions-header"><?php echo $question?></h3>
							<div style="display: block; margin-left: auto; margin-right: auto; ">
      							<img src="/img/profpic-sample1.jpg" style="height: 300px; width: 300px; overflow:hidden; border-radius: 50%"> 
      							<!--<img src=<?php echo $pic ?> style="height: 300px; width: 300px; overflow:hidden; border-radius: 50%"> -->
      						</div>	

      <!-- Main hero unit for a primary marketing message or call to action -->
			      <!--<p>
					  <label for="amount"></label>
					  <input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" />
					</p> -->
					<form action="/index.php?action=submit" method="post">
						<p style="text-align: center; margin-top: 20px">
					    <div id="amount_slider" style="display: block; margin-left: auto; margin-right: auto">
					    	<div id="red"></div>
					    	<div id="yellow"></div>
					    	<div id="green"></div>
					    </div>
					    <br />
					    <input type="hidden" id="amount_field" name="slideVal">
					    </p>
						<input type="text" name="commentsVal" style="width: 300px" placeholder="Comments?" maxlength="40" />
						<br />
						<input id="rounded_corners2" class="btn btn-primary btn-large" type="submit" />
						<button title="Skip" id="rounded_corners2" class="btn btn-primary btn-large" onclick="location.href='/index.php?action=question'" ><i class="icon-ban-circle"></i></button>
					</form>
						
						<br />
						</div>
					</div> <!-- end row-fluid -->
				</div> <!-- end grid -->
			</div> <!-- end container -->
		</section>

		<!-- Footer -->
		<footer id="main-footer">
			<p>&copy; 2013 Strand by <a href="http://www.glorm.com">Glorm</a></p>
		</footer>

		<!-- Preloader -->
		<div id="preloader"></div>
		
		<!-- Plugins & Scripts -->
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
		<script>window.jQuery || document.write('<script src="/js/jquery.min.js" type="text/javascript"><\/script>')</script> -->
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
