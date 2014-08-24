<?php
    session_start(); 

    $_SESSION['my_profile_link'] = "http://api.go-vibe.com/frontend/profile.php?user=";
    $_SESSION['my_profile_link'] .= $_SESSION['userID'] . "&name=" . $_SESSION['my_profile_load_name'] . "";

    $_SESSION['my_profile_pic'] = "https://graph.facebook.com/" . $_SESSION['userID'] . "/picture?width=70&height=70";

?>
  <script>

      var temp_friends = JSON.parse(localStorage["friends_names"]);
      var temp_names_to_ID = JSON.parse(localStorage["names_to_ID"]);

      // alert(localStorage["names_to_ID"]);
      
      $(function() {
        $("#search-bar").autocomplete({
           source: temp_friends
        });
      });

      $(function() {
          // submission custom modifications
          
          $("#status-form").submit(function(event) {
              
              // simply override normal send
              event.preventDefault();
          });
          

          // triggering submission upon ENTER
          $("#search-bar").keyup(function(event){
              if(event.keyCode == 13){
                  console.log('triggered click.');
                  $("#search-submit").click();

                  load_profile(); 
              }
          });

          function load_profile() {
              var person_name = $('#status-form input[name="search-bar"]').val();

              temp_link = "http://api.go-vibe.com/frontend/profile.php?user=" 
              temp_link += temp_names_to_ID[person_name] + "&name=" + person_name + "";

              // console.log('you have triggered load submit with UID of: ' + temp_names_to_ID[person_name]);

              window.location.href = temp_link;
          }
      });

      $(window).load(function() {

        var is_visible = false;

        $(document).on('click', '#notifications_trigger', function() {
            console.log('click triggered');
            
            if(!is_visible) {
              var offset = $('#custom_globe').offset();
              
              var top_offset = $(document).scrollTop() + 44;
              top_offset += "px";

                $('#notifications_toolbar').css({
                 'position' : 'absolute',
                 'left'     : offset.left + 6,
                 'top'      : top_offset,
                 'z-index'  : '10000'
              });

              $('#notifications_toolbar').show();
              is_visible = true;
            }
            else {
              $('#notifications_toolbar').hide();
              is_visible = false;
            }
        });
      });
  </script>

  <style type="text/css">
      .ui-autocomplete {
           max-height: 400px;
           overflow-y: auto;
           overflow-x: hidden;
      }

      .ui-corner-all {
           font-size: 13px;
           font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      }

      .nav_elem:hover {
        opacity: 0.6;
      }

  </style>

  <script type="text/javascript">

    // quick heuristic so that both 'Newsfeed' and Vibe icon fade together
    $('.homepage_nav').hover(function() {
      $('.homepage_nav').css('opacity', '0.6');
    }, function() {
      $('.homepage_nav').css('opacity', '1');
    });

  </script>

<nav class="navbar navbar-default top-nav navbar-fixed-top" role="navigation">

  <div class="container"><div class="col-lg-9 col-md-8">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target="#navbar-fixed-layout-collapse"><i class="fa fa-indent"></i></button>
      <a class="navbar-brand homepage_nav" href="http://api.go-vibe.com/index.php?action=newsfeed"><img src="http://api.go-vibe.com/landing/vibe72dpi-rgb.gif" style="width: 32px;" alt=""></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-fixed-layout-collapse">
      <ul class="nav navbar-nav">
        <li><a class="homepage_nav" href="http://api.go-vibe.com/index.php?action=newsfeed">Newsfeed</a></li>
      </ul>

      <!-- SEARCH WIDGET -->
      <form class="navbar-form navbar-left hidden-sm" role="search" name="searchform" id="status-form" method="post" action="#">
        <div class="form-group inline-block">
          <input type="text" class="form-control" placeholder="Search for people" id="search-bar" name="search-bar">
        </div>
        <button type="submit" class="btn btn-inverse" id="search-submit" style="display: none;"><i class="fa fa-search fa-fw"></i></button>
      </form>

      <!-- NOTIFICATIONS AND PROFILE LINKS -->
      <ul class="nav navbar-nav navbar-right">
        <li class="innerLR"><span class="nav_elem"><a id="notifications_trigger" href='javascript:;'><i class="fa fa-bell fa-fw" id="custom_globe" style="color: black; width: 30px"></i></a></span></li>
        <!-- <li class="innerLR"><a id="" href='javascript:;'><img src="http://api.go-vibe.com/frontend/nav_globe.png" id="custom_globe" style="width: 36px;" /></a></li> -->
        <li class="dropdown">
          <a href=<?php echo $_SESSION['my_profile_link']; ?>><span class="nav_elem">
            <span class="pull-left innerR"><img src=<?php echo $_SESSION['my_profile_pic']; ?> alt="user" class="img-circle" style="width: 36px;"></span>
            <?php echo $_SESSION['first_name']; ?>
          </span></a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid --></div>
</nav>
