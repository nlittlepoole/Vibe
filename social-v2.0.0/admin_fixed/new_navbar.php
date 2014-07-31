<?php
    session_start(); 

    $_SESSION['my_profile_link'] = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" . $_SESSION['userID'] . "&name=" . $_SESSION['full_name'] . "";
?>
  <script>

      $(function() {
          // submission custom modifications
          $("#status-form").submit(function(event) {
              event.preventDefault();
              alert('you have triggered submit!')
          });

          // triggering submission upon ENTER
          $("#search-bar").keyup(function(event){
              if(event.keyCode == 13){
                  $("#search-submit").click();
              }
          });
      });
  </script>

<nav class="navbar navbar-default top-nav navbar-fixed-top" role="navigation">

  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target="#navbar-fixed-layout-collapse">
		<i class="fa fa-indent"></i>
      </button>
      <a class="navbar-brand" href="#"><img src="../assets//images/logo/logo.jpg" alt=""></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-fixed-layout-collapse">
      <ul class="nav navbar-nav">
        <li>
	          <a href="new_newsfeed.php">Newsfeed</a>
	     
        </li>
      </ul>

      <!-- search form -->
      <form class="navbar-form navbar-left hidden-sm" role="search" name="searchform" id="status-form" method="post" action="#">
        <div class="form-group inline-block">
          <input type="text" class="form-control" placeholder="Search" id="search-bar">
        </div>
        <button type="submit" class="btn btn-inverse" id="search-submit"><i class="fa fa-search fa-fw" style="display: none;"></i></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="innerLR"><button type="button" class="btn btn-info navbar-btn"><i class="fa fa-globe"></i></button></li>
        <li class="dropdown">
          <a href=<?php echo $_SESSION['my_profile_link']; ?>>
          <span class="pull-left innerR"><img src="../assets/images/people/35/16.jpg" alt="user" class="img-circle"></span>
              <?php echo $_SESSION['first_name']; ?>
          </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
