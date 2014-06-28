<?php 
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Vibe</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Always force latest IE rendering engine or request Chrome Frame -->
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

  <link href="stylesheets/application-f144f88f.css" media="screen" rel="stylesheet" type="text/css" />

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
  <![endif]-->

</head>

<body id="page_layout" class="index">
  <section id="header_bar_banner">
    <div id="header_bar" class="container">
      <div class="sixteen columns">
        <div id="logo">
          <a href="index.html"><img src="https://s3.amazonaws.com/HookFeed/HookFeed_Logo_Light.png" width="150"></a>
        </div>
        <nav>
          <a href="pricing/index.html">About</a>
          <a href="https://secure.hookfeed.com/login">Login</a>
        </nav>
      </div><!-- END .sixteen.columns -->
    </div><!-- END #header_bar.container -->
  </section><!-- END #header_bar_banner -->

  <section id="headline_banner">
  <div id="headline" class="container">
    <div class="sixteen columns">
      <h1>Want to be a bro?</h1>
      <h2>We take your compliments to the next level.</h2>
      <a href=<?php echo '"'. $_SESSION['loginUrl'] . '"' ?>> SIGN UP WITH FACEBOOK</a>
    </div><!-- END .sixteen.columns -->
    <div class="sixteen columns" id="main_graphic">
      <img src="https://s3.amazonaws.com/HookFeed/main_hero_image.png" width="800" class="scale-with-grid">
    </div>
  </div><!-- END #headline.container -->
</section><!-- END #headline_banner -->

<section id="testimonial_banner">
  <div class="container testimonial">
    <div class="twelve columns offset-by-two">
      <h2>"Got something good to say about a buddy? We've got the platform for you."</h2>
      <div class="john-collison">
        <a href="https://twitter.com/collision"><img src="small_prof_pic.jpg" width="160" height="160" id="john" class="person scale-with-grid"></a>
        <h3 style="margin-bottom: 5px"><a href="https://twitter.com/collision">Noah Stebbins</a></h3>
        <h4><a href="https://stripe.com">Co-Founder of Vibe</a></h4>
      </div>
    </div>
  </div><!-- END #testimonial.container -->
</section><!-- END #testimonial -->

<section id="benefits_banner">
  <div id="benefits" class="container">
    <div class="row">
      <div class="twelve columns offset-by-two">
        <h1>There are only three things women need in life: food, water, and <em>compliments</em>.</h1>
      </div>
    </div>

    <div class="row">
      <div class="nine columns">
        <img src="https://s3.amazonaws.com/HookFeed/potential_earnings.png" width="520" class="scale-with-grid">
      </div>
      <div class="six columns offset-by-one">
        <h3>A REPO OF LOVE</h3>
        <h2>What do friends have to say about you?</h2>
        <p>Anything about a particular person on your mind? <strong>Write a short Vibe about that special someone. </strong>Other people in the community can see, and <em>like</em> any particular Vibe. <strong>Put-downs hit the Great Wall of Spam Filters. </strong></p>
      </div>
    </div>

    <hr style="margin-top: 0px; margin-bottom: 0px" />

    <div class="row">
      <div class="six columns">
        <h3>SUMMARIZED FEEDBACK</h3>
        <h2>A Synopsis of You</h2>
        <p>Every Vibe has a corresponding feeling, or <em>sentiment</em> that is tracked. Recurring sentiments are attached to your word wall, so you can see <strong>a synopsis of peer commentary in one place</strong>. Ace that next interview with feedback from the people you love. </p>
      </div>
      <div class="nine columns offset-by-one">
        <img src="https://s3.amazonaws.com/HookFeed/customers_at_risk.png" width="520" class="scale-with-grid">
      </div>
    </div>
</section>

<section class="cta_banner">
  <div id="cta" class="container">
    <div class="nine columns">
      <h2>Surf accolades in <b>one click</b></h2>
      <h3>Communal Feedback. 100% Positive.</h3>
    </div>
    <div class="six columns offset-by-one">
      <a href="pricing/index.html">Sign up</a>
    </div>
</section>

  <section id="footer_banner">
    <div id="footer" class="container">
      <footer class="sixteen columns">
        <a href="blog/index.html">Blog</a>
        <a href="mailto:support@hookfeed.com">Support</a>
        <a href="pricing/index.html#faqs_banner">FAQs</a>
        <a href="mailto:joelle@hookfeed.com?subject=Why%20I%20%3C3%20HookFeed%20(and%20why%20HookFeed%20should%20%3C3%20me%20back)">We're Hiring!</a>
        <a href="privacy-policy/index.html">Privacy Policy</a>
        <a href="terms-of-service/index.html">Terms &amp; Conditions</a>
        <a href="http://www.madeinsd.org" class="madeinsd">Made with <img src="https://s3.amazonaws.com/HookFeed/heart.png" width="25"> in Sunny San Diego</a>
      </footer>
    </div>
  </section>

</body>
</html>