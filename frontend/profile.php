<?php

	// keep track of session data
	session_start();

	// grabbing person's UID & name info
	$_SESSION['prof_UID'] 	= isset($_GET['user']) ? $_GET['user'] : "";

	// picture URL request
	$pic = "https://graph.facebook.com/" . $_SESSION['prof_UID'] . "/picture?width=200&height=200";

	// FB Graph API request to grab user's communities
	$_SESSION['user_networks_request'] = "http://api.go-vibe.com/api/location.php?action=getLocations&uid=";
	$_SESSION['user_networks_request'] .= $_SESSION['prof_UID'] . "&token=" . $_SESSION['token'];

	// wordcloud URL
	$_SESSION['wordcloud_URL'] = "http://api.go-vibe.com/view/cloud/" . $_SESSION['prof_UID'] . ".png";

	// check if the profile is of the person viewing it
	$_SESSION['is_own_profile'] = False;

	if($_SESSION['prof_UID'] == $_SESSION['userID']) { $_SESSION['is_own_profile'] = True; }
?>

<!DOCTYPE html>

<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
	<head>
		<title>Profile</title>

		<!-- jQuery & jQuery UI -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

		<!-- jQuery UI tooltip -->
		<script type="text/javascript">
			$(function() {
				// $(document).tooltip();
			});
		</script>

		<!-- font awesome -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

		<!-- initial caching and helper functions -->
        <script type="text/javascript">

            // get today's formatted date
            function get_formatted_date() {
              var current_date = new Date();

              var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

              post_month    = monthNames[current_date.getUTCMonth()];
              post_date     = current_date.getUTCDate();

              var date_append = ""; 

              if(post_date % 10 === 1) {
                date_append = "st";
              }
              else if(post_date % 10 === 2) {
                date_append = "nd";
              }
              else if(post_date % 10 === 3) {
                date_append = "rd";
              }
              else {
                date_append = "th";
              }

              return post_month + " " + post_date + date_append;
            }
        </script>

		<!-- grabbing profile name JavaScript -->
		<script type="text/javascript">
			$(function() {
				var prof_UID = '<?php echo $_SESSION["prof_UID"]; ?>';
				console.log('profile UID: ' + prof_UID);

				var id_to_names = JSON.parse(localStorage["ID_to_names"]); 
				localStorage["current_prof_name"] = id_to_names[prof_UID];

				$('#current_profile_name').text(localStorage["current_prof_name"]);
			});
		</script>

		<!-- person's communities (unique to Profile) -->
		<script type="text/javascript">

			// initializing the last stored element to none
			localStorage["latest_pid_profile"] = "null value";

			$(function() {

				// JSON of person's communities
				var user_networks_url = "<?php echo $_SESSION['user_networks_request']; ?>";

				$.getJSON(user_networks_url, function(data) {

					var network_string 	= ""; 
					var num_networks 	= data['data'].length;

					for(var i = 0; i < num_networks; i++) {
			
						// limit output of communities
						if(i < 1) {
							network_string += data['data'][i]['Name'] + '<br />'; 
						}
					}

					$('#network_info').html(network_string);
				});

			});
		</script>

		<!-- form listeners (once page has been completely loaded) -->
        <script type="text/javascript">

            function comment_submit_trigger() {
                // submission of comment
                $(".comment_form").submit(function(event) {

                      event.preventDefault();

                      var my_comment  = $(this).children('.comment_input').val();
                      var my_uid      = $(this).children('.hiddenID').val();
                      var my_token    = $(this).children('.hiddentoken').val();
                      var myPID       = $(this).children('.hiddenPID').val();

                      var current_elem = $(this);

                      $.ajax({
                          type: 'POST',
                          url: "http://api.go-vibe.com/api/vibe.php?action=postComment",
                          data: { status: my_comment, uid: my_uid, token: my_token, pid: myPID},
                          success: function(data) {
                              $('.comment_form').each(function() {
                                  this.reset();
                              });

                              // APPENDING COMMENT

                              var comment_to_append = ""; 

                              var my_name               = localStorage["my_name"]; 
                              var my_uid                = "<?php print($_SESSION['userID']) ?>"; 
                              var my_profile_load_name  = "<?php print($_SESSION['my_profile_load_name']) ?>"; 

                              var my_prof_link = "http://api.go-vibe.com/frontend/profile.php?user=" + my_uid;

                              var pic_href = "https://graph.facebook.com/" + my_uid + "/picture?width=60&height=60";

                              var formatted_datetime = get_formatted_date();

                              comment_data = 
                                    ['<!-- Comment -->', 
                                     '<div class="media border-bottom margin-none bg-gray">',
                                        '<a href="" class="pull-left innerAll half">',
                                            '<img src="' + pic_href + '" width="60" class="media-object">',
                                        '</a>',
                                        '<div class="media-body innerTB">',
                                            '<a href="' + my_prof_link + '" class="strong text-inverse">' + my_name + '</a>',    
                                            '<small class="text-muted ">wrote on ' + formatted_datetime + '</small>',
                                            '<div>' + my_comment + '</div>',
                                        '</div>',
                                    '</div>',
                                    ].join('\n');

                              $(comment_data).insertBefore(current_elem);
                          }
                      });
                }); 
            }

            $(window).load(function() {
                comment_submit_trigger();
            });

        </script>

        <!-- event listeners (once page has been completely loaded) -->
        <script type="text/javascript">

            $(window).load(function() {

                // 'VIEW ALL' comments trigger
                $('.widget').on('click', '.comment_data_header', function() {
                    $(this).closest(".widget").children(".comment").css("display", "block");
                    $(this).remove();
                });

            });

        </script>

		<!-- wordcloud checker (removes invalid pic if cannot be found) -->
		<script type="text/javascript">
			$(function() {
				$('#wordcloud_pic').error(function() {
				  $('#wordcloud_pic').remove();
				});
			});
		</script>

		<!-- loading webelements and using getStream for notifications -->
        <script type="text/javascript"> 

            $(function() {

                // JSON request for profile elements
                var profile_url = "<?php echo $_SESSION['profile_elems_request']; ?>";

                $('#navbar').load('navbar.php');
                $('#posts_location').load('profile_element.php'); 

                // grabbing JSON...
                $.getJSON(profile_url, function(data) {

                    if (!data.error) {
                        
                        // simple working statement - for debugging if necessary
                        console.log("# of posts about this person is: " + data['data'].length);
                        localStorage["getStream"] = JSON.stringify(data['data']);

                        // loading sidebar...
                        $('#sidebar').load('sidebar.php');
                    }
                    else {
                        // ...
                    }
                });

            });
        </script> 

		<!-- overall settings -->
		<?php require_once("webpage_settings.php"); ?>
	</head>
	<body class="scripts-async menu-right-hidden">
		
		<!-- Main Container Fluid -->
		<div class="container-fluid ">
		
			<!-- Content START -->
			<div id="content">
				
				<!-- loading NAVBAR here... -->	
				<div id="navbar"></div>

				<!-- <div class="layout-app">  -->
				<div class="container"><div class="innerAll">
					<div class="row">
						<div class="col-lg-9 col-md-8">
							
							<div class="timeline-cover">	
								<div class="cover image ">
									<div style="height: 50px"></div>
									<ul class="list-unstyled">
										<li class="active"><a href="index.html?lang=en"><i class="fa fa-fw fa-user"></i> <span>Profile</span></a></li>
									</ul>
								</div>
								<div class="widget cover image">	
									<div class="widget-body padding-none margin-none">
										<div class="photo">
											<!-- NOTE: on failure (i.e. FB 2.0 non-user), it should load up a default gray person symbol -->
											<img src=<?php echo '"' . $pic .'"' ?> class="img-circle" style="width: 100px"/> 
										</div>
										<div class="innerAll pull-left">
											<h3 class="margin-none" id="current_profile_name"></h3>
											<span id="network_info"></span>
										</div>
										<div class="innerAll pull-left border-left">
											<img style="width: 70%; margin-left: auto; margin-right: auto; display: block" id="wordcloud_pic" src=<?php echo $_SESSION['wordcloud_URL'] ?> />
											<!--
											<p class="lead margin-none ">
												<i class="fa fa-quote-left text-muted fa-fw"></i> Hello! This is an optional caption.
											</p>
											-->
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>

							<!-- structure of profile post -->
							
							<!-- denotes one post and all of its comments (for now) -->
							<div id="posts_location"></div>

						</div>

						<!-- STARTING WIDGETS ON THE SIDE -->
						<div class="col-md-4 col-lg-3">

							<!-- load SIDEBAR here... -->	
							<div id="sidebar"></div>
								
						</div>
						<!-- // Content END -->
						
						<div class="clearfix"></div>
					</div>
					<!-- // Main Container Fluid END -->
				</div></div>

				<!-- Global -->
				<script data-id="App.Config">
					var basePath = '',
					commonPath = '../assets/',
					rootPath = '../',
					DEV = false,
					componentsPath = '../assets/components/';
				
					var primaryColor = '#25ad9f',
					dangerColor = '#b55151',
					successColor = '#609450',
					infoColor = '#4a8bc2',
					warningColor = '#ab7a4b',
					inverseColor = '#45484d';
				
					var themerPrimaryColor = primaryColor;

					App.Config = {
					ajaxify_menu_selectors: ['#menu'],
					ajaxify_layout_app: false	};
				
				</script>			
	</body>
</html>