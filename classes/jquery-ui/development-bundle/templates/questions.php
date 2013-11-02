
<!DOCTYPE html>
<html lang="en">
  <head>
          <?php 
      $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/php-sdk/facebook.php");
    require($path . "/config.php");
    session_start();
    $name = $_SESSION['name'];
    $pic = $_SESSION['pic'];
    $question = $_SESSION['question'];
    $facebook = $_SESSION['facebook'];
    ;
   ?>

    <meta charset="utf-8">
    <title>Vibe - Feedback for the Masses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">



	<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/bootstrap/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap-transition.js"></script>
    <script src="/bootstrap/js/bootstrap-alert.js"></script>
    <script src="/bootstrap/js/bootstrap-modal.js"></script>
    <script src="/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="/bootstrap/js/bootstrap-tab.js"></script>
    <script src="/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="/bootstrap/js/bootstrap-popover.js"></script>
    <script src="/bootstrap/js/bootstrap-button.js"></script>
    <script src="/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="/bootstrap/js/bootstrap-typeahead.js"></script>

    <!-- Le styles -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    
    <!-- jQuery stylesheet -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <!-- jQuery slider implementation -->
    <script>
  		$(function() {
    		var select = $( "#amount" );
    		var slider = $( "<div style='width:22em'><div id='slider'></div></div>" ).insertAfter( select ).slider({
      			min: 1,
      			max: 10,
      			range: "min",
      			value: select[ 0 ].selectedIndex + 1,
      			slide: function( event, ui ) {
        			select[ 0 ].selectedIndex = ui.value - 1;
      			}
    		});
    		$( "#amount" ).change(function() {
      			slider.slider( "value", this.selectedIndex + 1 );
    		});
  		}); 
  		
  		$(function() {
    		$( document ).tooltip();
  		});
  		
  </script>
  
    <style>

    /* GLOBAL STYLES
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */

    body {
      padding-bottom: 40px;
      color: #5a5a5a;
    }



    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      margin-top: 20px;
      margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }
    .navbar-wrapper .navbar {

    }

    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      text-shadow: 0 -1px 0 rgba(0,0,0,.5);
    }

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a {
      padding: 15px 20px;
    }

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }



    /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 60px;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }



    /* MARKETING CONTENT
    -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }


    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }



    /* RESPONSIVE CSS
    -------------------------------------------------- */

    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }

      .featurette {
        height: auto;
        padding: 0;
      }
      .featurette-image.pull-left,
      .featurette-image.pull-right {
        display: block;
        float: none;
        max-width: 40%;
        margin: 0 auto 20px;
      }
    }


    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

      .marketing .span4 + .span4 {
        margin-top: 40px;
      }

      .featurette-heading {
        font-size: 30px;
      }
      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }

    }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="/apple-touch-icon-precomposed" sizes="144x144" href="/bootstrap/img/apple-touch-icon-144-precomposed.png">
    <link rel="/apple-touch-icon-precomposed" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114-precomposed.png">
      <link rel="/apple-touch-icon-precomposed" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="/bootstrap/img/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="/bootstrap/img/favicon.png">
                                   
  </head>

  <body>
  	

    <!-- NAVBAR
    ================================================== -->
    <div class="navbar-wrapper">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">Vibe</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="templates/homepage.php">Home</a></li>
                <li><a href="templates/team.php">Team</a></li>
                <!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->
              </ul>
              <form class="navbar-form pull-right" 
              	<button type="submit" class="btn" href="/index.php?action=question"><i class="icon-long-arrow-right"></i>Log out</button>
              </form>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->




	 <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <center><div class="hero-unit">
      	<div style="height: 150px; width: 150px; overflow:hidden">
      		<img src=<?php echo $pic?> ./>
      	</div>	
        <h2><?php echo $name ?></h2>
        <p><?php echo $question[0] ?></p>
        <p>
        	<form id="ranking">
  			 <label for="amount"></label>
  			 <select name="amount"= id="amount" name="amount" style="/border: 0; color: #f6931f; font-weight: bold;" >
  			 	<option>1</option>
  			 	<option>2</option>
  			 	<option>3</option>
  			 	<option>4</option>
  			 	<option>5</option>
  			 	<option>6</option>
  			 	<option>7</option>
  			 	<option>8</option>
  			 	<option>9</option>
  			 	<option>10</option>
  			 </select>
  			 </form>
	    </p>
 
		<!--<div style="width: 40px;"><div id="slider"></div></div>-->
		<br />
		<form>
			<p>Comments?</p>
			<input type="text" name="comments" value="" />
		</form>
    <?php $params = array( 'next' => 'http://localhost/' );  ?>
		<p><a title="Submit" href="/index.php?action=question" class="btn btn-primary btn-large"><i class="icon-long-arrow-right"></i>Submit</a>
			<a title="Skip" href= <?php echo $facebook->getLogoutUrl($params); ?>  class="btn btn-primary btn-large"><i class="icon-ban-circle"></i></a>
        </p>
      </div></center>
     </div>

		<hr />
		<br />
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="/templates/questions.php">Back to top</a></p>
        <p>&copy; 2013 Company, Inc. &middot; <a href="/templates/questions.php">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->

    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script src="/bootstrap/js/holder.js"></script>
  </body>
</html>
