<?php
    session_start();

    // JSON newsfeed request
    $_SESSION['newsfeed_elems_request'] = "http://api.go-vibe.com/api/user.php?action=getFeed&uid=";
    $_SESSION['newsfeed_elems_request'] .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];

    // get votes request
    $_SESSION['my_votes'] = "http://api.go-vibe.com/api/user.php?action=getVotes&uid=";
    $_SESSION['my_votes'] .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];
?>

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

                // NEWSFEED
                var newsfeed_url = "<?php echo $_SESSION['newsfeed_elems_request']; ?>";

                $.getJSON(newsfeed_url, function(data) {

                    if (!data.error) {

                        // loop through posts
                        for(var i = 0; i < data['data'].length; i++) {

                            //  grab overall info about post
                            var post_PID            = data['data'][i]['PID']; 
                            var post_timestamp      = data['data'][i]['Timestamp']; 

                            /* LIKES */

                            var my_post_like = "<a href='javascript:;' class='like_link'>Like</a>";

                            if(post_PID in my_votes) {
                                
                                // you have upvoted this post
                                if(my_votes[post_PID] > 0) {
                                    // my_post_like = "<a href='javascript:;' class='like_link unlike_me'>Unlike</a>";
                                    my_post_like = "<i class='fa fa-lg fa-thumbs-up' style='color: #428bca'></i>";
                                    my_post_like += "&nbsp;&nbsp;&nbsp;<i class='fa fa-lg fa-thumbs-down' style='color: gray'></i>";
                                }

                                // you have downvoted this post
                                else if(my_votes[post_PID] < 0) {
                                    my_post_like = "<i class='fa fa-lg fa-thumbs-up' style='color: gray'></i>";
                                    my_post_like += "&nbsp;&nbsp;&nbsp;<i class='fa fa-lg fa-thumbs-down' style='color: #428bca'></i>";
                                }

                                // you are currently neutral
                                else {
                                    my_post_like = "<i class='fa fa-lg fa-thumbs-up' style='color: gray'></i>";
                                    my_post_like += "&nbsp;&nbsp;&nbsp;<i class='fa fa-lg fa-thumbs-down' style='color: gray'></i>";
                                }
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

                            var show_like_info = [
                                "<div class='bg-gray innerAll border-top border-bottom text-small'>",
                                    "<span>",
                                        my_post_like,
                                        "<!-- Like Submission Form -->", 
                                        like_submission_form,
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

                                var temp_link   = "http://api.go-vibe.com/frontend/profile.php?user=" + comment_author_UID + "&name=" + comment_author_name + "";
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
         
                            var recipient_size = data['data'][i]['Tagged'].length;
                            var post_tagged_formatted_names = "<span style='font-size:115%'>"; 

                            if(recipient_size == 1) {
                                
                                var temp_link = "http://api.go-vibe.com/frontend/profile.php?user=" + data['data'][i]['Tagged'][0]['UID'] + "&name=" + data['data'][i]['Tagged'][0]['Name'] + "";
                                
                                post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['Tagged'][0]['Name'] + "</a>"; 
                            }
                            else if(recipient_size == 2) {
                                
                                var temp_link = "http://api.go-vibe.com/frontend/profile.php?user=" + data['data'][i]['Tagged'][0]['UID'] + "&name=" + data['data'][i]['Tagged'][0]['Name'] + "";
                                var temp_link2 = "http://api.go-vibe.com/frontend/profile.php?user=" + data['data'][i]['Tagged'][1]['UID'] + "&name=" + data['data'][i]['Tagged'][1]['Name'] + "";
                                
                                post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['Tagged'][0]['Name'] + "</a>" + " and " + "<a href='" + temp_link2 + "' class='text-white strong'>" + data['data'][i]['Tagged'][1]['Name'] + "</a>"; 
                            }
                            else {

                                for(var z = 0; z < recipient_size; z++) {

                                    var temp_link = "http://api.go-vibe.com/frontend/profile.php?user=" + data['data'][i]['Tagged'][z]['UID'] + "&name=" + data['data'][i]['Tagged'][z]['Name'] + "";
                                    
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
                                                                "<span><i class='fa fa-user'></i> " + post_tagged_formatted_names,
                                                                " on " + data['data'][i]['formatted_time'] + "&nbsp;</span>",
                                                            "</div>",
                                                        "</div>",
                                                    "</div>",
                                                    "<!-- Content -->",
                                                    "<div class='innerAll'>",
                                                        "<p class='lead' style='display : inline;'>" + data['data'][i]['Content'] + "</p>",
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
                            $('#newsfeed_container').append(html_newsfeed_content);
                        }
                    } 
                    else {
                        console.log('[ERROR] rendering newsfeed elements');     // error with JSON
                    }
                });
            }
            else {
                console.log('[ERROR] rendering newsfeed elements');     // error with JSON
            }

        });
    });

</script>