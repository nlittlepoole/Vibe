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

					console.log(post_tagged_formatted_names);

		        	// looking @ first element returned (i.e. most recent post)
		        	if(i == 0) {

		        		var most_recent_pid = String(data['data'][0]['PID']); 

		        		if (String(localStorage.getItem("latest_pid_profile")) != "null value") {
		        			// in this case, the data has already been loaded @ least once before in session

		        			if(localStorage.getItem("latest_pid_profile") == most_recent_pid) {
		        				// no changes since we still have latest pointer to same post so do nothing with JSON returned
		        				return; 
		        			}
		        			else {
		        				// latest pointer to JSON data and locally stored pointer are not the same (i.e. we have new content!)
		        			
			        			var curr_pid 	= most_recent_pid
			        			var j 			= 0; 

			        			var html_profile_content = ""; 

			        			// loop through to where we finally get to pointer match (new content is finally all accounted for)
			        			while(String(curr_pid) != String(localStorage.getItem("latest_pid_profile"))) {

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
												'<p class="lead">' + data['data'][j]['Content'] + '</p>',
											'</div>',
											'<!-- Comment Header -->',
											'<div class="bg-gray innerAll border-top border-bottom text-small ">',
												'<span>View all <a href="" class="text-primary">1 Comment</a></span>',
											'</div>',
											'<!-- First Comment -->',
											'<div class="media border-bottom margin-none bg-gray">',
												'<a href="" class="pull-left innerAll half">',
													'<img src="../assets//images/people/100/2.jpg" width="60" class="media-object">',
												'</a>',
												'<div class="media-body innerTB">',
													'<a href="#" class="pull-right innerT innerR text-muted">',
														'<i class="icon-reply-all-fill fa fa-2x "></i>',
													'</a>',
													'<a href="" class="strong text-inverse">Adrian Demian</a> <small class="text-muted ">wrote on Jan 15th, 2014</small> <a href="" class="text-small">like</a>',
													'<div>That $5 is worth it though.</div>',
												'</div>',
											'</div>',
											'<input type="text" class="form-control" placeholder="Comment here...">',
										'</div>'
										].join('\n');

									j += 1;
									curr_pid = data['data'][j]['PID']; 	// updating curr PID as looping through
			        			}

			        			// prepending all of this HTML (of new posts that haven't been rendered before)...
			        			$('#posts_location').prepend(html_profile_content);

			        			// update the locally stored value of latest PID
			        			most_recent_pid = data['data'][0]['PID'];
		        				localStorage.setItem("latest_pid_profile", most_recent_pid);

		        				return; 
		        			}
		        		}
		        		else {
		        			// first time going through, so just set the locally stored value
		        			// now body of loop will continue to be called (didn't return)

		        			most_recent_pid = data['data'][0]['PID'];
		        			localStorage.setItem("latest_pid_profile", most_recent_pid);
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
							'<div class="media border-bottom margin-none bg-gray">',
								'<a href="" class="pull-left innerAll half">',
									'<img src="../assets//images/people/100/2.jpg" width="60" class="media-object">',
								'</a>',
								'<div class="media-body innerTB">',
									'<a href="#" class="pull-right innerT innerR text-muted">',
										'<i class="icon-reply-all-fill fa fa-2x "></i>',
									'</a>',
									'<a href="" class="strong text-inverse">Adrian Demian</a> <small class="text-muted ">wrote on Jan 15th, 2014</small> <a href="" class="text-small">like</a>',
									'<div>That $5 is worth it though.</div>',
								'</div>',
							'</div>',
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