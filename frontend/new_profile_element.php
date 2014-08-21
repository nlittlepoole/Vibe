<?php
	// for now, just profile element, but dynamic rendering in future

	// continue session
	session_start();

	$_SESSION['profile_elems_request'] = "http://api.go-vibe.com/api/user.php?action=getStream";
	$_SESSION['profile_elems_request'] .= "&uid=" . $_SESSION['userID']  . "&token=" . $_SESSION['token'];
	$_SESSION['profile_elems_request'] .= "&user=" . $_SESSION['prof_UID']; 
?>

<script type="text/javascript">

	$(function() {

		// JSON request for profile elements
		var profile_url = "<?php echo $_SESSION['profile_elems_request']; ?>";

		console.log('profile url of elements: ' + profile_url); 

		// grabbing JSON...
		$.getJSON(profile_url, function(data) {

			// simple working statement - for debugging if necessary
		    // console.log("The number of posts about this person is: " + data['data'].length);

		    if (!data.error) {

		        // looping through all posts
		        for(var i = 0; i < data['data'].length; i++) {

		        	// below content test for profile debugging - if necessary
		        	// console.log("Content of post is: " + data['data'][i]['Content']);

		        	// grabbing all of the names/UIDs of recipients
                    var tempPID = data['data'][i]['PID'];
                    var overall_timestamp   = data['data'][i]['Timestamp'];  

                    /* LIKES */

                    // grab total number of likes
                    
                    var total_agree = 0;

                    if(data['data'][i]['Score'] !== null) {
                        total_agree = data['data'][i]['Score'];
                    }

                    console.log('the total number of likes is: ' + total_agree); 

                    var show_like_info = "";

                    if(total_agree > 0) {
                        if(total_agree == 1) {
                            show_like_info = [
                                "<div class='bg-gray innerAll border-top border-bottom text-small'>",
                                    "<span><a href='#'>1 person likes this</a></span>",
                                "</div>"
                                ].join('\n');
                        }
                        else {
                            show_like_info = [
                                "<div class='bg-gray innerAll border-top border-bottom text-small'>",
                                    "<span><a href='#'>" + total_agree + " people like this</a></span>",
                                "</div>"
                                ].join('\n');
                        }
                    }

                    var like_submission_form = [
                        '<form class="like_form" name="like_form" method="post" action="#" style="display: none;">',
                            "<input type='hidden' class='hiddenID' name='uid' value='" + localStorage['uid'] + "'/>",
                            "<input type='hidden' class='hiddentoken' name='token' value='" + localStorage['token'] + "'/>",
                            "<input type='hidden' class='hiddenPID' name='pid' value='" + tempPID + "'/>",
                            "<input type='hidden' class='timestamp' name='timestamp' value='" + overall_timestamp + "'/>",
                            '<button type="submit" class="like_submit" name="like_submit" style="display: none; "></button>',
                        '</form>'
                        ].join('\n');

                    /* COMMENTS */

                    // number of comments
                    var num_comments = data['data'][i]['Comments'].length;

                    var comment_data = ""; 

                    for(var j = num_comments - 1; j >= 0; j--) {
                        
                    	// debugging comment
                        console.log("data of comment: " + data['data'][i]['Comments'][j]['Content']); 

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

		        	var all_comments = ""; 

		        	// do comments parsing of DB, once basic form is done...
		        	// also need to set up multi-tagging rendering (with name generation)...
		        	/*
		        	for(var j = 0; data['data'][i]['Comments'].length; j++) {
		        		all_comments += "<p>This is a comment!</p>";
		        	}
		        	*/

		        	var html_profile_content = 
						['<!-- DENOTES A SPECIFIC POST GROUP (NOT JUST ONE POST) -->',
						'<div class="widget profile-post-group">',
							'<!-- Info -->',
							'<div class="bg-primary">',
								'<div class="media">',
									'<div class="media-body innerTB" style="padding-left:20px;">',
										'<a href="" class="text-white strong">Someone</a>',
										'<span>upped the Chillness of ' + post_tagged_formatted_names,
										'on 15th January, 2014 <i class="icon-time-clock"></i></span>',
									'</div>',
								'</div>',
							'</div>',
							'<!-- Content -->',
							'<div class="innerAll">',
								'<p class="lead">' + data['data'][i]['Content'] + '</p>',
							'</div>',
							'<!-- Comment Header -->',
							'<div class="bg-gray innerAll border-top border-bottom text-small ">',
								'<span>View all <a href="" class="text-primary">1 Comment</a></span>',
							'</div>',
							'<!-- First Comment -->',
							"<!-- Rendered Comments -->",
							comment_data,
							'<input type="text" class="form-control" placeholder="Comment here...">',
						'</div>'
						].join('\n');

					// append this content to overally content (adding older and older posts to the tail)
					$('#posts_location').append(html_profile_content);
		        }
		    } 
		    else {
		    	// there was an error with grabbing JSON
		    	console.log('[STATUS] error grabbing JSON for profile elements');
		    }
		}); 
	});

</script>