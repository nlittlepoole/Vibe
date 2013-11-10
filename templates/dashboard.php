<!DOCTYPE html>
 <html lang="en" class="no-js"> <!--<![endif]-->
	<head>
		<!--This PHP establishes the local variables necessary for the questions Don't worry about this code now. As it doesn't do anything since I never coded functions for it-->
		<!--See the Questions file for the PHP -->
		<meta charset="utf-8">
		<title>Vibe</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="/css/bootstrap.css">
		<link rel="stylesheet" href="/css/bootstrap-responsive.css">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/main.css">
		<link rel="stylesheet" href="/jquery-ui/css/ui-lightness/jquery-ui-1.10.3.custom.css" />
		
		<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
		  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		  <script>
		  $(function() {
		    $( "#slider" ).slider({
		      value:1,
		      min: 1,
		      max: 5,
		      step: 1,
		      slide: function( event, ui ) {
		        $( "#amount" ).val(ui.value );
		      }
		    });
		    $( "#amount" ).val($( "#slider" ).slider( "value" ) );
		  });
		  $(function() {
		      $( "#accordion" ).accordion();
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
					<h1 id="questions-title" class="page-title">Dashboard</h1>
				</div> <!-- end row-fluid -->
				<!-- Services -->
				<div class="grid">
					<div class="row-fluid">
						<div class="span6">
								<div style="display: block; border-radius: 50%; margin-left: auto; margin-right: auto; height: 300px; 
								width: 300px; overflow:hidden">
	      							<img src="../img/profpic-sample1.jpg"/> 
	      						</div>	
	
	      						<div style="margin-top: 15px; text-align: left; margin-left: 20px">
	      							<table style="margin: 0px">
	      								<tr><td style="padding: 0px"><p><strong>Name: </strong></td><td style="padding: 0px">Noah Stebbins</p></td></tr>
										<tr><td style="padding: 0px"><p><strong>Communities:</strong></td><td style="padding: 0px">Columbia, Boeing, New York</p></td></tr>
										<tr><td style="padding: 0px"><p><strong>Points: </strong></td><td style="padding: 0px">824</p></td></tr>
										<tr><td style="padding: 0px"><p><strong># of Questions Answered: </strong></td><td style="padding: 0px">387</p></td></tr>
										<tr><td colspan="2"><p><button id="rounded_corners" class="btn btn-large btn-primary" style="background-color: #000033" >Go to Questions <i class="icon-circle-arrow-right" style="color: white" ></i></button></p></td></tr>
									</table>
								</div>
						</div>
						<div class="span6">
							<h1 class="page-title" style="margin-top: 0px">My Vibes</h1>
							<div id="accordion">
							  <p style="text-align: left"><strong><span>Attractiveness </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p style="text-align: left; margin-bottom: 0px"> Keywords: <em>Preppy, Nerdy, Professional</em></p>
							    <p style="text-align: left; margin-bottom: 0px" > Comments: </p>
							    <ul style="text-align: left">
							    	<li>"You are fat."</li>
							    	<li>"Bro, tone down on the polo."</li>
							    	<li>"Bro, do you even lift?"</li>
							    	<li>"Peter wuz here lolol"</li>
							    	<li>"Bro, do you even Keanu?"</li>
							    </ul>
							  </div>
							  <p style="text-align: left"><strong><span>Intelligence </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p style="text-align: left; margin-bottom: 0px"> Keywords: <em>Preppy, Nerdy, Professional</em></p>
							    <p style="text-align: left; margin-bottom: 0px" > Comments: </p>
							    <ul style="text-align: left">
							    	<li>"You are fat."</li>
							    	<li>"Bro, tone down on the polo."</li>
							    	<li>"Bro, do you even lift?"</li>
							    	<li>"Peter wuz here lolol"</li>
							    	<li>"Bro, do you even Keanu?"</li>
							    </ul>
							  </div>
							  <p style="text-align: left"><strong><span>Fashionability </span></strong><span style="float: right">7.7</span></p>
							  <div>
							    <p style="text-align: left; margin-bottom: 0px"> Keywords: <em>Preppy, Nerdy, Professional</em></p>
							    <p style="text-align: left; margin-bottom: 0px" > Comments: </p>
							    <ul style="text-align: left">
							    	<li>"You are fat."</li>
							    	<li>"Bro, tone down on the polo."</li>
							    	<li>"Bro, do you even lift?"</li>
							    	<li>"Peter wuz here lolol"</li>
							    	<li>"Bro, do you even Keanu?"</li>
							    </ul>
							  </div>
							  <p style="text-align: left"><strong><span>Ambition </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p style="text-align: left; margin-bottom: 0px"> Keywords: <em>Preppy, Nerdy, Professional</em></p>
							    <p style="text-align: left; margin-bottom: 0px" > Comments: </p>
							    <ul style="text-align: left">
							    	<li>"You are fat."</li>
							    	<li>"Bro, tone down on the polo."</li>
							    	<li>"Bro, do you even lift?"</li>
							    	<li>"Peter wuz here lolol"</li>
							    	<li>"Bro, do you even Keanu?"</li>
							    </ul>
							  </div>
							  <p style="text-align: left"><strong><span>Promiscuity </span></strong><span style="float: right">8.2</span></p>
							  <div>
							    <p style="text-align: left; margin-bottom: 0px"> Keywords: <em>Preppy, Nerdy, Professional</em></p>
							    <p style="text-align: left; margin-bottom: 0px" > Comments: </p>
							    <ul style="text-align: left">
							    	<li>"You are fat."</li>
							    	<li>"Bro, tone down on the polo."</li>
							    	<li>"Bro, do you even lift?"</li>
							    	<li>"Peter wuz here lolol"</li>
							    	<li>"Bro, do you even Keanu?"</li>
							    </ul>
							  </div>
							  <p style="text-align: left"><strong><span>Humor </span></strong><span style="float: right">6.7</span></p>
							  <div>
							    <p>
							    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
							    et malesuada fames ac turpis egestas. 
							    </p>
							    <p>
							    Suspendisse eu nisl. Nullam ut libero. 
							    </p>
							  </div>
							  <p style="text-align: left"><strong><span>Confidence </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p>
							    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
							    et malesuada fames ac turpis egestas. 
							    </p>
							    <p>
							    Suspendisse eu nisl. Nullam ut libero. 
							    </p>
							  </div>
							  <p style="text-align: left"><strong><span>Fun </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p>
							    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
							    et malesuada fames ac turpis egestas. 
							    </p>
							    <p>
							    Suspendisse eu nisl. Nullam ut libero. 
							    </p>
							  </div>
							  <p style="text-align: left"><strong><span>Kindness </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p>
							    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
							    et malesuada fames ac turpis egestas. 
							    </p>
							    <p>
							    Suspendisse eu nisl. Nullam ut libero. 
							    </p>
							  </div>
							  <p style="text-align: left"><strong><span>Awkwardness </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p>
							    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
							    et malesuada fames ac turpis egestas. 
							    </p>
							    <p>
							    Suspendisse eu nisl. Nullam ut libero. 
							    </p>
							  </div>
							  <p style="text-align: left"><strong><span>Honesty </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p>
							    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
							    et malesuada fames ac turpis egestas. 
							    </p>
							    <p>
							    Suspendisse eu nisl. Nullam ut libero. 
							    </p>
							  </div>
							  <p style="text-align: left"><strong><span>Dependability </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p>
							    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
							    et malesuada fames ac turpis egestas. 
							    </p>
							    <p>
							    Suspendisse eu nisl. Nullam ut libero. 
							    </p>
							  </div>
							  <p style="text-align: left"><strong><span>Humility </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p>
							    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
							    et malesuada fames ac turpis egestas. 
							    </p>
							    <p>
							    Suspendisse eu nisl. Nullam ut libero. 
							    </p>
							  </div>
							  <p style="text-align: left"><strong><span>Happiness </span></strong><span style="float: right">8.7</span></p>
							  <div>
							    <p>
							    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
							    et malesuada fames ac turpis egestas. 
							    </p>
							    <p>
							    Suspendisse eu nisl. Nullam ut libero. 
							    </p>
							  </div>
							</div>
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