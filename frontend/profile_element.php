<?php
    session_start();

    // JSON profile request
    $_SESSION['profile_elems_request'] = "http://api.go-vibe.com/api/user.php?action=getStream&uid=";
    $_SESSION['profile_elems_request'] .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];
    $_SESSION['profile_elems_request'] .= "&user=" . $_SESSION['prof_UID'];

    // get votes request
    $_SESSION['my_votes'] = "http://api.go-vibe.com/api/user.php?action=getVotes&uid=";
    $_SESSION['my_votes'] .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];
?>

<!-- overall style to apply to profile content -->
<style type="text/css">
    .ban_elem:hover {
        color: black;
    }
</style>

<!-- overall settings to apply to loaded profile content -->
<script type="text/javascript">
    
    function hover_thumbs_trigger() {
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
    }

    $(window).load(function() {
        hover_thumbs_trigger();
    });
</script>

<!-- overrided like and dislike submission -->
<script type="text/javascript">

    function like_submit_trigger() {

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
    }

    function dislike_submit_trigger() {

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
    }
    
    $(window).load(function() {

        like_submit_trigger();
        dislike_submit_trigger();

    });
</script>

<!-- listeners for likes and dislikes -->
<script type="text/javascript">
    
    function like_dislike_click_trigger() {

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
    }

    $(window).load(function() {
        like_dislike_click_trigger();
    });
</script>

<!-- BAN ajax call -->
<script type="text/javascript">

    function ban_user() {
        // hover (light up thumbs up or thumbs down)
        $('.ban_link').on('click', function() {
            
            console.log('ban link has been triggered.');

            // need to send PID, and session data (UID & token)

            var my_uid = localStorage["uid"];
            var my_token = localStorage["token"]; 

            var my_pid = $(this).closest('.widget').find('.hiddenPID').first().val();

            $.ajax({
              type: 'POST',
              url: "http://api.go-vibe.com/api/user.php?action=blockUser",
              data: { uid: my_uid, token: my_token, pid: my_pid},
              success: function(data) {
                // ...
              }
            });
        
        });
    }

    $(window).load(function() {
        ban_user();
    });

</script>

<script type="text/javascript">

    $(function() {

        // USER'S LIKE HISTORY

        var my_votes_url = "<?php echo $_SESSION['my_votes']; ?>";

        $.getJSON(my_votes_url, function(data) {

            my_votes = {};

            if (!data.error) {
                
                // filling up all recorded votes
                for(var i = 0; i < data['data'].length; i++) {
                    my_votes[data['data'][i]['PID']] = data['data'][i]['Vote']; 
                }

                // profile
                var profile_url = "<?php echo $_SESSION['profile_elems_request']; ?>";
                console.log(profile_url);      // for debugging purposes

                $.getJSON(profile_url, function(data) {

                    if (!data.error) {

                        // loop through posts
                        for(var i = 0; i < data['data'].length; i++) {

                            //  grab overall info about post
                            var post_PID            = data['data'][i]['PID']; 
                            var post_timestamp      = data['data'][i]['Timestamp']; 

                            /* LIKES */

                            // var my_post_like = "<a href='javascript:;' class='like_link'>Like</a>";
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
                            var total_agrees    = data['data'][i]['Agree']; 
                            var total_disagrees = data['data'][i]['Disagree']; 

                            if(data['data'][i]['Score'] !== null) {
                                total_likes = data['data'][i]['Score'];
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

                            var num_comments = data['data'][i]['Comments'].length;  // # of comments
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
                                comment_content     = data['data'][i]['Comments'][j]['Content']; 
                                comment_timestamp   = data['data'][i]['Comments'][j]['formatted_time'];
                                comment_author_UID  = data['data'][i]['Comments'][j]['Author_UID'];
                                comment_author_name = data['data'][i]['Comments'][j]['Author_Name'];

                                var temp_link   = "http://api.go-vibe.com/frontend/profile?user=" + comment_author_UID;
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
                                            '<a href="' + temp_link + '" class="strong text-inverse">' + comment_author_name + '</a>    <small class="text-muted ">wrote on ' + comment_timestamp + '</small>',
                                            '<div>' + comment_content + '</div>',
                                        '</div>',
                                    '</div>',
                                    closing_tag
                                    ].join('\n');
                            }

                            /* RECIPIENTS */
         
                            var recipient_size = data['data'][i]['Tagged'].length;
                            var post_tagged_formatted_names = "<span style='font-size:115%'>"; 

                            if(recipient_size == 1) {
                                
                                var temp_link = "http://api.go-vibe.com/frontend/profile?user=" + data['data'][i]['Tagged'][0]['UID'];
                                
                                post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['Tagged'][0]['Name'] + "</a>"; 
                            }
                            else if(recipient_size == 2) {
                                
                                var temp_link = "http://api.go-vibe.com/frontend/profile?user=" + data['data'][i]['Tagged'][0]['UID'];
                                var temp_link2 = "http://api.go-vibe.com/frontend/profile?user=" + data['data'][i]['Tagged'][1]['UID'];
                                
                                post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['Tagged'][0]['Name'] + "</a>" + " and " + "<a href='" + temp_link2 + "' class='text-white strong'>" + data['data'][i]['Tagged'][1]['Name'] + "</a>"; 
                            }
                            else {

                                for(var z = 0; z < recipient_size; z++) {

                                    var temp_link = "http://api.go-vibe.com/frontend/profile?user=" + data['data'][i]['Tagged'][z]['UID'];
                                    
                                    if(z == recipient_size - 1) {       // last element
                                        post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['Tagged'][z]['Name'] + "</a>&nbsp;";
                                    }
                                    else if(z == recipient_size - 2) {  // second-to-last element
                                        post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['Tagged'][z]['Name'] + "</a>" + ", and ";
                                    }
                                    else {
                                        post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['Tagged'][z]['Name'] + "</a>" + ", "; 
                                    }

                                }
                            }

                            post_tagged_formatted_names += "</span>";

                            // adding widget to block user if this is their own profile
                            var block_html = "";
                            var is_own_profile = '<?php echo $_SESSION["is_own_profile"]; ?>';
                            
                            if(is_own_profile == 1) {
                                block_html = "<a href='#' class='ban_link' style='color: white'><span class='ban_elem' title='Would you like to ban this user?' style='float: right; margin-right: 10px;'>" + '<i class="fa fa-ban"></i>' + "</span></a>";
                            }

                            /* BODY OF CONTENT */

                            var html_profile_content = 
								['<!-- DENOTES A SPECIFIC POST GROUP (NOT JUST ONE POST) -->',
									'<div class="widget profile-post-group vibe_profile_posts">',
										'<!-- Info -->',
										'<div class="bg-primary">',
											'<div class="media">',
												'<div class="media-body innerTB" style="padding-left:10px;">',
													"<span>about " + post_tagged_formatted_names,
                                                    " on " + data['data'][i]['formatted_time'] + "&nbsp;</span>",
                                                    block_html,
												'</div>',
											'</div>',
										'</div>',
										'<!-- Content -->',
										'<div class="innerAll">',
											'<p class="lead" style="display : inline;">' + data['data'][i]['Content'] + '</p>',
										'</div>',
										"<!-- Show overall like info -->",
                                        show_like_info,
                                        "<!-- Show more comments? -->", 
                                        show_more_comments,
                                        "<!-- Rendered Comments -->",
                                        comment_data, 
										'<form class="comment_form" name="comment_form" method="post" action="#">',
                                            "<input type='text' class='form-control comment_input' name='status' style='border: none;' placeholder='Comment here...'>",
                                            "<input type='hidden' class='hiddenID' name='uid' value='" + localStorage['uid'] + "'/>",
                                            "<input type='hidden' class='hiddentoken' name='token' value='" + localStorage['token'] + "'/>",
                                            "<input type='hidden' class='hiddenPID' name='pid' value='" + post_PID + "'/>",
                                            '<button type="submit" class="comment_submit" name="comment_submit" style="display: none; "></button>',
                                        '</form>',
									'</div>'
								].join('\n');

							// append this content to overally content (adding older and older posts to the tail)
							$('#posts_location').append(html_profile_content);
                        }
                    } 
                    else {
                        console.log('[ERROR] rendering profile elements');     // error with JSON
                    }
                });
            }
            else {
                console.log('[ERROR] rendering profile elements');     // error with JSON
            }

        });
    });

</script>