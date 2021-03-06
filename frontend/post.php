<?php
    
    session_start();

    include("header.php");

    // FRIEND LIST for Ajax & autocomplete
    
    $request = "http://api.go-vibe.com/api/user.php?action=getFriends&blocked=no&uid=";
    $request .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];

    $friends = json_decode(file_get_contents($request),true);
    $friends = $friends['data'];

    usort($friends, function($a, $b) {
        return strcmp($a['Name'], $b['Name']);
    });

    $_SESSION['friend_list'] = $friends;

    $_SESSION['profile_elems_request'] = "http://api.go-vibe.com/api/user.php?action=getStream";
    $_SESSION['profile_elems_request'] .= "&uid=" . $_SESSION['userID']  . "&token=" . $_SESSION['token'];
    $_SESSION['profile_elems_request'] .= "&user=" . $_SESSION['userID']; 

    // get votes request (my votes)
    $_SESSION['my_votes'] = "http://api.go-vibe.com/api/user.php?action=getVotes&uid=";
    $_SESSION['my_votes'] .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];

?>

<!DOCTYPE html>

<!-- HTML header -->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

    <head>
        <title>Post</title>

        <!-- jQuery & jQuery UI -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- Font Awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Selectize -->
        <script type="text/javascript" src="http://api.go-vibe.com/selectize/selectize.js"></script>
        <link rel="stylesheet" type="text/css" href="http://api.go-vibe.com/selectize/selectize.default.css" />

        <!-- initial caching and helper functions -->
        <script type="text/javascript">

            // get today's formatted date
            function get_formatted_date() {
              var current_date = new Date();

              var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

              post_month    = monthNames[current_date.getMonth()];
              post_date     = current_date.getDate();

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

        <!-- overall settings to apply to loaded post content -->
        <script type="text/javascript">
            $(window).load(function() {

                // hover (light up thumbs up or thumbs down)
                $('.fa-thumbs-down, .fa-thumbs-up').filter('.fa-lg').hover(function() {
                    var color = $(this).css('color');

                    if(color == "rgb(128, 128, 128)") {
                        $(this).css('color', '#428bca');
                    }

                }, function() {

                    var color = $(this).css('color');
                    var has_user_stamped_class = $(this).hasClass('chosen');

                    if((color != "rgb(128, 128, 128)") && !has_user_stamped_class) {
                        $(this).css('color', 'gray');
                    }

                });
            });
        </script>

        <!-- overrided like and dislike submission -->
        <script type="text/javascript">
            
            $(window).load(function() {

                // submission of LIKE
                $(".like_form").submit(function(event) {
                  
                  event.preventDefault();

                  var my_vote       = "agree";

                  var my_uid        = $(this).children('.hiddenID').val();
                  var my_token      = $(this).children('.hiddentoken').val();
                  var myPID         = $(this).children('.hiddenPID').val();
                  var my_timestamp  = $(this).children('.timestamp').val();

                  $.ajax({
                      type: 'POST',
                      url: "http://api.go-vibe.com/api/vibe.php?action=vote",
                      data: { uid: my_uid, token: my_token, pid: myPID, vote: my_vote, timestamp : my_timestamp},
                      success: function(data) {
                          $('.like_form').each(function() {
                              this.reset();
                          });
                      }
                  });
                });

                // submission of DISLIKE
                $(".dislike_form").submit(function(event) {
                  
                  event.preventDefault();

                  var my_vote       = "disagree";

                  var my_uid        = $(this).children('.hiddenID').val();
                  var my_token      = $(this).children('.hiddentoken').val();
                  var myPID         = $(this).children('.hiddenPID').val();
                  var my_timestamp  = $(this).children('.timestamp').val();

                  $.ajax({
                      type: 'POST',
                      url: "http://api.go-vibe.com/api/vibe.php?action=vote",
                      data: { uid: my_uid, token: my_token, pid: myPID, vote: my_vote, timestamp : my_timestamp},
                      success: function(data) {
                          $('.dislike_form').each(function() {
                              this.reset();
                          });
                      }
                  });
                });

            });
        </script>

        <!-- listeners for likes and dislikes -->
        <script type="text/javascript">
            $(window).load(function() {
                
                // a 'LIKE' or 'DISLIKED' is clicked
                $('.post_choice_agree, .post_choice_disagree').on('click', function() {

                    // only do something if it has not already been chosen
                    if(!$(this).hasClass('chosen')) {
                        if($(this).hasClass('post_choice_agree')) {
                            
                            // light it up and turn other one off
                            $(this).css('color', '#428bca');
                            $(this).next().css('color', 'gray');

                            // trigger form submit
                            $(this).nextAll("form.like_form").submit(); 

                            // trigger like/dislike change
                            var current_like_number     = parseInt($(this).closest('.widget').find('.like_count').text());
                            var current_dislike_number  = parseInt($(this).closest('.widget').find('.dislike_count').text());

                            $(this).closest('.widget').find('.like_count').text(current_like_number + 1);

                            // toggle chosen class
                            $(this).addClass('chosen');

                            if($(this).next().hasClass('chosen')) {
                                $(this).next().removeClass('chosen');
                                $(this).closest('.widget').find('.dislike_count').text(current_dislike_number - 1);
                            }
                            else {
                                // ...
                            }
                        }
                        else if($(this).hasClass('post_choice_disagree')){
                            
                            // light it up and turn other one off
                            $(this).css('color', '#428bca');
                            $(this).prev().css('color', 'gray');

                            // trigger form submit
                            $(this).nextAll("form.dislike_form").submit(); 

                            // trigger like/dislike count change
                            var current_like_number     = parseInt($(this).closest('.widget').find('.like_count').text());
                            var current_dislike_number  = parseInt($(this).closest('.widget').find('.dislike_count').text());

                            $(this).closest('.widget').find('.dislike_count').text(current_dislike_number + 1);

                            // toggle chosen class
                            $(this).addClass('chosen');

                            if($(this).prev().hasClass('chosen')) {
                                $(this).prev().removeClass('chosen');
                                $(this).closest('.widget').find('.like_count').text(current_like_number - 1);
                            }
                            else {
                                // ...
                            }
                        }
                        else {
                            // ...
                        }
                    }
                });
            });
        </script>

        <!-- form listeners (once page has been completely loaded) -->
        <script type="text/javascript">

            $(window).load(function() {

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

                              var my_prof_link = "http://api.go-vibe.com/frontend/profile?user=" + my_uid;

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

        <!-- loading webelements and using getStream for notifications -->
        <script type="text/javascript"> 

            $(function() {

                // JSON request for profile elements
                var profile_url = "<?php echo $_SESSION['profile_elems_request']; ?>";

                $('#navbar').load('navbar.php');
                $('#last_elems').load('newsfeed_element.php');

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
        
        <!-- main container -->
        <div class="container-fluid">
            
            <!-- being overall content -->
            <div id="content">
                
                <!-- loading NAVBAR here -->    

                <div id="navbar"></div>
                <div id="sidebar"></div>

                <div class="container"><div class="innerAll">
                    <div class="row">
                        <div class="col-lg-9 col-md-8">
                            
                            <!-- HEADER Widget of NEWSFEED ELEMENTS -->
                            <div class="media">
                                
                                <a href="" class="btn btn-default pull-left">Timeline</a>
                                <div class="media-body" style="visibility: hidden;">
                                      <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Share your mood...">

                                          <span class="input-group-btn">
                                              <button class="btn btn-primary" type="button">Search</button>
                                          </span>

                                      </div><!-- /input-group -->
                                </div>
                            </div>

                            <!-- actual TIMELINE -->
                            <ul class="timeline-activity list-unstyled" id="post_container">

                                <!-- loading NEWSFEED ELEMENTS here -->

                            </ul>

                        </div>

                                
                    </div>
                    <!-- // Content END -->
                    
                    <div class="clearfix"></div>
                    <!-- // Sidebar menu & content wrapper END -->
                    
                    <!-- Footer -->
                    <div id="footer" class="hidden-print">
                        
                        <!-- potential footer goes here -->
                
                    </div>
                    <!-- // Footer END -->
                            
                </div></div>
                <!-- // Main Container Fluid END -->
            </div>
        </div>

       
        <script type="text/javascript">

        	// render unique content with POST variables and jQuery

		    $(function() {

		        // USER'S LIKE HISTORY

		        var my_votes_url = "<?php echo $_SESSION['my_votes']; ?>";

		        $.getJSON(my_votes_url, function(vote_data) {

		            my_votes = {};

		            if (!vote_data.error) {
		                
		                // filling up all recorded votes
		                for(var i = 0; i < vote_data['data'].length; i++) {
		                    my_votes[vote_data['PID']] = vote_data['Vote']; 
		                }


		                var stringified_data = '<?php echo $_POST["currJSON"]; ?>';

                    console.log(stringified_data);

		                var data = JSON.parse(stringified_data);

		                // console.log("PID within the JSON is: " + data['PID']);


                        //  grab overall info about post
                        var post_PID            = data['PID']; 
                        var post_timestamp      = data['Timestamp']; 

                        /* LIKES */

                        var my_post_like = "";

                        if(post_PID in my_votes) {
                            
                            // you have upvoted this post
                            if(my_votes[post_PID] > 0) {
                                // my_post_like = "<a href='javascript:;' class='like_link unlike_me'>Unlike</a>";
                                my_post_like = "<i class='fa fa-lg fa-thumbs-up chosen post_choice_agree' style='color: #428bca'></i>";
                                my_post_like += "&nbsp;&nbsp;&nbsp;<i class='fa fa-lg fa-thumbs-down post_choice_disagree' style='color: gray'></i>";
                            }

                            // you have downvoted this post
                            else if(my_votes[post_PID] < 0) {
                                my_post_like = "<i class='fa fa-lg fa-thumbs-up post_choice_agree' style='color: gray'></i>";
                                my_post_like += "&nbsp;&nbsp;&nbsp;<i class='fa fa-lg fa-thumbs-down chosen post_choice_disagree' style='color: #428bca'></i>";
                            }

                            // you are currently neutral
                            else {
                                my_post_like = "<i class='fa fa-lg fa-thumbs-up post_choice_agree' style='color: gray'></i>";
                                my_post_like += "&nbsp;&nbsp;&nbsp;<i class='fa fa-lg fa-thumbs-down post_choice_disagree' style='color: gray'></i>";
                            }
                        }
                        else {
                            my_post_like = "<i class='fa fa-lg fa-thumbs-up post_choice_agree' style='color: gray'></i>";
                            my_post_like += "&nbsp;&nbsp;&nbsp;<i class='fa fa-lg fa-thumbs-down post_choice_disagree' style='color: gray'></i>";
                        }
                        
                        var total_likes     = 0;
                        var total_agrees    = data['Agree']; 
                        var total_disagrees = data['Disagree']; 

                        if(data['Score'] !== null) {
                            total_likes = data['Score'];
                        }

                        var like_submission_form = [
                                '<form class="like_form" name="like_form" method="post" action="#" style="display: none;">',
                                    "<input type='hidden' class='hiddenID' name='uid' value='" + localStorage['uid'] + "'/>",
                                    "<input type='hidden' class='hiddentoken' name='token' value='" + localStorage['token'] + "'/>",
                                    "<input type='hidden' class='hiddenPID' name='pid' value='" + post_PID + "'/>",
                                    "<input type='hidden' class='timestamp' name='timestamp' value='" + post_timestamp + "'/>",
                                    '<button type="submit" class="like_submit" name="like_submit" style="display: none; "></button>',
                                '</form>'
                                ].join('\n');

                        var dislike_submission_form = [
                            '<form class="dislike_form" name="dislike_form" method="post" action="#" style="display: none;">',
                                "<input type='hidden' class='hiddenID' name='uid' value='" + localStorage['uid'] + "'/>",
                                "<input type='hidden' class='hiddentoken' name='token' value='" + localStorage['token'] + "'/>",
                                "<input type='hidden' class='hiddenPID' name='pid' value='" + post_PID + "'/>",
                                "<input type='hidden' class='timestamp' name='timestamp' value='" + post_timestamp + "'/>",
                                '<button type="submit" class="dislike_submit" name="dislike_submit" style="display: none; "></button>',
                            '</form>'
                            ].join('\n');

                        var show_like_info = [
                            "<div class='bg-gray innerAll border-top border-bottom text-small'>",
                                "<span>",
                                    my_post_like,
                                    "<!-- Like Submission Form -->", 
                                    like_submission_form,
                                    "<!-- Dislike Submission Form -->", 
                                    dislike_submission_form,
                                "</span>",
                                "<span style='float: right;'>",
                                    "<i class='fa fa-thumbs-up' style='color: #606060  '></i>&nbsp;<span class='like_count'>" + total_agrees + "</span>",
                                    "&nbsp;&nbsp;",
                                    "<i class='fa fa-thumbs-down' style='color: #606060  '></i>&nbsp;<span class='dislike_count'>" + total_disagrees + "</span>",
                                "</span>",
                            "</div>"
                            ].join('\n');

                        /* COMMENTS */

                        var num_comments = data['Comments'].length;  // # of comments
                        var show_more_comments = "";                            // 'show all comments' option

                        if(num_comments > 4) {
                            show_more_comments = [
                                "<div class='bg-gray innerAll border-top border-bottom text-small comment_data_header'>",
                                    "<span><a href='javascript:;'>view all " + num_comments + " comments</a></span>",
                                "</div>"
                                ].join('\n');
                        }

                        var comment_data = ""; 

                        for(var j = num_comments - 1; j >= 0; j--) {

                            // comment info
                            var comment_content     = data['Comments'][j]['Content']; 
                            var comment_timestamp   = data['Comments'][j]['formatted_time'];
                            var comment_author_UID  = data['Comments'][j]['Author_UID'];
                            var comment_author_name = data['Comments'][j]['Author_Name'];

                            var temp_link   = "http://api.go-vibe.com/frontend/profile.php?user=" + comment_author_UID;
                            var pic_href    = "https://graph.facebook.com/" + comment_author_UID + "/picture?width=60&height=60";

                            var beginning_tag = "<div class='comment'>"; 
                            var closing_tag = "</div>"; 

                            if(j > 3) {
                                beginning_tag   = '<div class="comment" style="display: none">';
                                closing_tag     = '</div>';
                            }

                            comment_data += 
                                ['<!-- comment -->', 
                                 beginning_tag,
                                 '<div class="media border-bottom margin-none bg-gray">',
                                    '<a href="" class="pull-left innerAll half">',
                                        '<img src="' + pic_href + '" width="60" class="media-object">',
                                    '</a>',
                                    '<div class="media-body innerTB">',
                                        '<a href="#" class="pull-right innerT innerR text-muted">',
                                            '<i class="icon-reply-all-fill fa fa-2x"></i>',
                                        '</a>',
                                        '<a href="' + temp_link + '" class="strong text-inverse">' + comment_author_name + '</a>    <small class="text-muted ">wrote on ' + comment_timestamp + '</small>',
                                        '<div>' + comment_content + '</div>',
                                    '</div>',
                                '</div>',
                                closing_tag
                                ].join('\n');
                        }

                        /* RECIPIENTS */
     
                        var recipient_size = data['Tagged'].length;
                        var post_tagged_formatted_names = "<span style='font-size:115%'>"; 

                        if(recipient_size == 1) {
                            
                            var temp_link = "http://api.go-vibe.com/frontend/profile.php?user=" + data['Tagged'][0]['UID'];
                            
                            post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['Tagged'][0]['Name'] + "</a>"; 
                        }
                        else if(recipient_size == 2) {
                            
                            var temp_link = "http://api.go-vibe.com/frontend/profile.php?user=" + data['Tagged'][0]['UID'];
                            var temp_link2 = "http://api.go-vibe.com/frontend/profile.php?user=" + data['Tagged'][1]['UID'];
                            
                            post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['Tagged'][0]['Name'] + "</a>" + " and " + "<a href='" + temp_link2 + "' class='text-white strong'>" + data['Tagged'][1]['Name'] + "</a>"; 
                        }
                        else {

                            for(var z = 0; z < recipient_size; z++) {

                                var temp_link = "http://api.go-vibe.com/frontend/profile.php?user=" + data['Tagged'][z]['UID'];
                                
                                if(z == recipient_size - 1) {       // last element
                                    post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['Tagged'][z]['Name'] + "</a>&nbsp;";
                                }
                                else if(z == recipient_size - 2) {  // second-to-last element
                                    post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['Tagged'][z]['Name'] + "</a>" + ", and ";
                                }
                                else {
                                    post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['Tagged'][z]['Name'] + "</a>" + ", "; 
                                }

                            }
                        }

                        post_tagged_formatted_names += "</span>";

                        /* BODY OF CONTENT */

                        var html_newsfeed_content = 
                            ["<li class='active vibe_newsfeed_posts'>", 
                                "<span class='marker'></span>",
                                "<div class='block' style='padding-right: 0px;'>",
                                    "<div class='caret'></div>",
                                        "<div class='inline-block box-generic' style='width: 100%; border: 1px solid #ececec;''>",
                                            "<!-- SOCIAL MEDIA POST FOR TESTING PURPOSES -->",
                                            "<div class='widget'>",
                                                "<!-- Info -->",
                                                "<div class='bg-primary'>",
                                                    "<div class='media'>",
                                                        "<div class='media-body innerTB' style='padding-left:10px;'>",
                                                            "<span>about " + post_tagged_formatted_names,
                                                            " on " + data['formatted_time'] + "&nbsp;</span>",
                                                        "</div>",
                                                    "</div>",
                                                "</div>",
                                                "<!-- Content -->",
                                                "<div class='innerAll'>",
                                                    "<p class='lead' style='display : inline;'>" + data['Content'] + "</p>",
                                                "</div>",
                                                "<!-- Show overall like info -->",
                                                show_like_info,
                                                "<!-- Show more comments? -->", 
                                                show_more_comments,
                                                "<!-- Rendered Comments -->",
                                                comment_data, 
                                                "<!-- User input comments -->",
                                                '<form class="comment_form" name="comment_form" method="post" action="#">',
                                                    "<input type='text' class='form-control comment_input' name='status' style='border: none;' placeholder='Comment here...'>",
                                                    "<input type='hidden' class='hiddenID' name='uid' value='" + localStorage['uid'] + "'/>",
                                                    "<input type='hidden' class='hiddentoken' name='token' value='" + localStorage['token'] + "'/>",
                                                    "<input type='hidden' class='hiddenPID' name='pid' value='" + post_PID + "'/>",
                                                    '<button type="submit" class="comment_submit" name="comment_submit" style="display: none; "></button>',
                                                '</form>',
                                            "</div>",
                                        "</div>",
                                "</div>",
                            "</li>",
                            ].join('\n');

                        // append content (add to tail)
                        $('#post_container').append(html_newsfeed_content);  
		            }
		        });
		    });

		</script>
       

        <!-- global settings (scripts) -->
        <script data-id="App.Config">
            
            // theme path variables
            var basePath    = '',
            commonPath      = '../assets/',
            rootPath        = '../',
            DEV             = false,
            componentsPath  = '../assets/components/';
        
            // theme color variables
            var primaryColor    = '#275379',
            dangerColor         = '#b55151',
            successColor        = '#609450',
            infoColor           = '#4a8bc2',
            warningColor        = '#ab7a4b',
            inverseColor        = '#45484d';
        
            var themerPrimaryColor = primaryColor;  // primary color

            App.Config = {
                ajaxify_menu_selectors: ['#menu'],
                ajaxify_layout_app: false   };

        </script>
    </body>
</html>