<?php
    session_start();

    $_SESSION['newsfeed_elems_request'] = "http://api.go-vibe.com/api/user.php?action=getFeed&uid=";
    $_SESSION['newsfeed_elems_request'] .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];
?>

<script type="text/javascript">
    $(function() {
        
        // JSON request for newsfeed elements
        var newsfeed_url = "<?php echo $_SESSION['newsfeed_elems_request']; ?>";

        // grabbing JSON...
        $.getJSON(newsfeed_url, function(data) {

            if (!data.error) {

                // looping through all posts
                for(var i = 0; i < data['data'].length; i++) {

                    // grabbing all of the names/UIDs of recipients
                    var tempPID = data['data'][i]['PID']; 

                    // first print console info to the console
                    var num_comments = data['data'][i]['Comments'].length;

                    var comment_data = ""; 

                    for(var j = num_comments - 1; j >= 0; j--) {
                        // console.log("data of comment: " + data['data'][i]['Comments'][j]['Content']); 

                        current_comment = data['data'][i]['Comments'][j]['Content']; 
                        current_timestamp = data['data'][i]['Comments'][j]['formatted_time'];

                        current_author = data['data'][i]['Comments'][j]['Author'];
                        current_author_name = data['data'][i]['Comments'][j]['post_author'];

                        comment_data += 
                            ['<!-- First Comment -->', 
                             '<div class="media border-bottom margin-none bg-gray">',
                                '<a href="" class="pull-left innerAll half">',
                                    '<img src="../assets//images/people/100/2.jpg" width="60" class="media-object">',
                                '</a>',
                                '<div class="media-body innerTB">',
                                    '<a href="#" class="pull-right innerT innerR text-muted">',
                                        '<i class="icon-reply-all-fill fa fa-2x"></i>',
                                    '</a>',
                                    '<a href="" class="strong text-inverse">' + current_author_name + '</a>    <small class="text-muted ">wrote on ' + current_timestamp + '</small> <a href="" class="text-small">like</a>',
                                    '<div>' + current_comment + '</div>',
                                '</div>',
                            '</div>',
                            ].join('\n');

                    }

                    // creating a temp string for each post (link to profile of all people tagged...)

                    var recipient_size = data['data'][i]['tagged'].length;
                    var post_tagged_formatted_names = ""; 

                    if(recipient_size == 1) {
                        
                        var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + data['data'][i]['tagged'][0]['UID'] + "&name=" + data['data'][i]['tagged'][0]['Name'] + "";
                        
                        post_tagged_formatted_names = "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['tagged'][0]['Name'] + "</a>"; 
                    }
                    else if(recipient_size == 2) {
                        
                        var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + data['data'][i]['tagged'][0]['UID'] + "&name=" + data['data'][i]['tagged'][0]['Name'] + "";
                        var temp_link2 = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + data['data'][i]['tagged'][1]['UID'] + "&name=" + data['data'][i]['tagged'][1]['Name'] + "";
                        
                        post_tagged_formatted_names = "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['tagged'][0]['Name'] + "</a>" + " and " + "<a href='" + temp_link2 + "' class='text-white strong'>" + data['data'][i]['tagged'][1]['Name'] + "</a>"; 
                    }
                    else {
                        for(var z = 0; z < recipient_size; z++) {

                            var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + data['data'][i]['tagged'][z]['UID'] + "&name=" + data['data'][i]['tagged'][z]['Name'] + "";
                            
                            if(z == recipient_size - 1) {
                                // last element (special case)
                                post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['tagged'][z]['Name'] + "</a>&nbsp;";
                            }
                            else if(z == recipient_size - 2) {
                                // second to last element (special case)
                                post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['tagged'][z]['Name'] + "</a>" + ", and";
                            }
                            else {
                                // typical case
                                post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['tagged'][z]['Name'] + "</a>" + ", "; 
                            }

                        }
                    }

                    // the below console printer shows the new name
                    // console.log(post_tagged_formatted_names);

                    // looking @ first element returned (i.e. most recent post)
                    if(i == 0) {

                        var most_recent_pid = String(data['data'][0]['PID']); 

                        if (String(localStorage.getItem("latest_pid")) != "null value") {
                            // in this case, the data has already been loaded @ least once before in session

                            if(localStorage.getItem("latest_pid") == most_recent_pid) {
                                // no changes since we still have latest pointer to same post so do nothing with JSON returned
                                return; 
                            }
                            else {
                                // latest pointer to JSON data and locally stored pointer are not the same (i.e. we have new content!)
                            
                                var curr_pid    = most_recent_pid
                                var j           = 0; 

                                var html_newsfeed_content = ""; 

                                // loop through to where we finally get to pointer match (new content is finally all accounted for)
                                while(String(curr_pid) !== String(localStorage.getItem("latest_pid"))) {

                                    html_newsfeed_content += 
                                        ["<li class='active vibe_newsfeed_posts'>", 
                                            "<span class='marker'></span>",
                                            "<div class='block'>",
                                                "<div class='caret'></div>",
                                                    "<div class='inline-block box-generic' style='width: 100%; border: 1px solid #ececec;''>",
                                                        "<!-- SOCIAL MEDIA POST FOR TESTING PURPOSES -->",
                                                        "<div class='widget'>",
                                                            "<!-- Info -->",
                                                            "<div class='bg-primary'>",
                                                                "<div class='media'>",
                                                                    "<div class='media-body innerTB' style='padding-left:20px;'>",
                                                                        "<a href='#' class='text-white strong'>Someone</a>",
                                                                        "<span>upped the Chillness of " + post_tagged_formatted_names,
                                                                        "<br />on&nbsp;" + data['data'][j]['formatted_time'] + "&nbsp;<i class='icon-time-clock'></i></span>",
                                                                    "</div>",
                                                                "</div>",
                                                            "</div>",
                                                            "<!-- Content -->",
                                                            "<div class='innerAll'>",
                                                                "<p class='lead'>" + data['data'][j]['Content'] + "</p>",
                                                            "</div>",
                                                            "<!-- Comment -->",
                                                            "<div class='bg-gray innerAll border-top border-bottom text-small'>",
                                                                "<span>Be the first to leave a comment!</span>",
                                                            "</div>",
                                                            "<!-- Rendered Comments -->",
                                                            comment_data, 
                                                            "<!-- User input comments -->",
                                                            '<form class="comment_form" name="comment_form" method="post" action="#">',
                                                            "<input type='text' class='form-control comment_input' name='status' style='border: none;' placeholder='Comment here...'>",
                                                            "<input type='hidden' class='hiddenID' name='uid' value='" + localStorage['uid'] + "'/>",
                                                            "<input type='hidden' class='hiddentoken' name='token' value='" + localStorage['token'] + "'/>",
                                                            "<input type='hidden' class='hiddenPID' name='pid' value='" + tempPID + "'/>",
                                                            '<button type="submit" class="comment_submit" name="comment_submit" style="display: none; "></button>',
                                                        '</form>',
                                                        "</div>",
                                                    "</div>",
                                            "</div>",
                                        "</li>",
                                        ].join('\n');

                                    j += 1;
                                    curr_pid = data['data'][j]['PID'];  // updating curr PID as looping through
                                }

                                // prepending all of this HTML (of new posts that haven't been rendered before)...
                                $('#newsfeed_container').prepend(html_newsfeed_content);

                                // update the locally stored value of latest PID
                                most_recent_pid = data['data'][0]['PID'];
                                localStorage.setItem("latest_pid", most_recent_pid);

                                return; 
                            }
                        }
                        else {
                            // first time going through, so just set the locally stored value
                            // now body of loop will continue to be called (didn't return)

                            most_recent_pid = data['data'][0]['PID'];
                            localStorage.setItem("latest_pid", most_recent_pid);
                        } 
                    }

                    var all_comments = ""; 

                    // do comments parsing of DB, once basic form is done...
                    // also need to set up multi-tagging rendering (with name generation)...
                    /*
                    for(var j = 0; data['data'][i]['Comments'].length; j++) {
                        all_comments += "<p>This is a comment!</p>";
                    }
                    */

                    var html_newsfeed_content = 
                        ["<li class='active vibe_newsfeed_posts'>", 
                            "<span class='marker'></span>",
                            "<div class='block'>",
                                "<div class='caret'></div>",
                                    "<div class='inline-block box-generic' style='width: 100%; border: 1px solid #ececec;''>",
                                        "<!-- SOCIAL MEDIA POST FOR TESTING PURPOSES -->",
                                        "<div class='widget'>",
                                            "<!-- Info -->",
                                            "<div class='bg-primary'>",
                                                "<div class='media'>",
                                                    "<div class='media-body innerTB' style='padding-left:20px;'>",
                                                        "<a href='#' class='text-white strong'>Someone</a>",
                                                        "<span>upped the Chillness of " + post_tagged_formatted_names,
                                                        "<br />on&nbsp;" + data['data'][i]['formatted_time'] + "&nbsp;<i class='icon-time-clock'></i></span>",
                                                    "</div>",
                                                "</div>",
                                            "</div>",
                                            "<!-- Content -->",
                                            "<div class='innerAll'>",
                                                "<p class='lead'>" + data['data'][i]['Content'] + "</p>",
                                            "</div>",
                                            "<!-- Comment -->",
                                            "<div class='bg-gray innerAll border-top border-bottom text-small'>",
                                                "<span>Be the first to leave a comment!</span>",
                                            "</div>",
                                            "<!-- Rendered Comments -->",
                                            comment_data, 
                                            "<!-- User input comments -->",
                                            '<form class="comment_form" name="comment_form" method="post" action="#">',
                                                "<input type='text' class='form-control comment_input' name='status' style='border: none;' placeholder='Comment here...'>",
                                                "<input type='hidden' class='hiddenID' name='uid' value='" + localStorage['uid'] + "'/>",
                                                "<input type='hidden' class='hiddentoken' name='token' value='" + localStorage['token'] + "'/>",
                                                "<input type='hidden' class='hiddenPID' name='pid' value='" + tempPID + "'/>",
                                                '<button type="submit" class="comment_submit" name="comment_submit" style="display: none; "></button>',
                                            '</form>',
                                        "</div>",
                                    "</div>",
                            "</div>",
                        "</li>",
                        ].join('\n');

                    // append this content to overally content (adding older and older posts to the tail)
                    $('#newsfeed_container').append(html_newsfeed_content);
                }
            } 
            else {
                // there was an error with grabbing JSON
                console.log('[STATUS] error grabbing JSON for newsfeed elements');
            }
        });
    });

</script>