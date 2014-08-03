<?php
	session_start();

	$_SESSION['newsfeed_elems_request'] = "http://api.go-vibe.com/api/user.php?action=getFeed&uid=";
	$_SESSION['newsfeed_elems_request'] .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];
?>

<script type="text/javascript">
	$(function(){
		
		// REQUEST to get newsfeed elements
		var newsfeed_url = "<?php echo $_SESSION['newsfeed_elems_request']; ?>";

		// GRABBING THE JSON of newsfeed elements
		$.getJSON(newsfeed_url, function(data) {

			// testing against errors
			// alert("REAL DATA: " + data['data']);

		    if (!data.error) {

		        // PARSING RESULTS
		        for(var i = 0; i < data['data'].length; i++) {
		        	
		        	var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + data['data'][i]['Tagged'] + "&name=" + data['data'][i]['Name'] + "";

		        	// grab the first element and store it in session data
		        	if(i == 0) {

		        		var most_recent_pid = String(data['data'][0]['PID']); 

		        		// alert('most recent pid is ' + most_recent_pid + ' and local storaged value is now ' + String(localStorage.getItem("latest_pid")));

		        		if (String(localStorage.getItem("latest_pid")) != "null value") {
		        			// alert("you made it to the if by accident"); 

		        			if(localStorage.getItem("latest_pid") == most_recent_pid) {
		        				// alert('not doing any append update!');
		        				return; 
		        			}
		        			else {
		        				// alert('we have triggered a difference!');
		        			
			        			// NOTE: the returned content is different than the rendered content!
			        			var curr_pid = most_recent_pid
			        			var j = 0; 

			        			var html_newsfeed_content = ""; 

			        			// alert("current pid: " + curr_pid + ", local storage item: " + localStorage.getItem("latest_pid"));
			        			while(String(curr_pid) !== String(localStorage.getItem("latest_pid"))) {
			        				// alert("current pid: " + curr_pid + ", local storage item: " + localStorage.getItem("latest_pid"));
			        				var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + data['data'][j]['Tagged'] + "&name=" + data['data'][j]['Name'] + "";

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
																		"<span>upped <a href='" + temp_link + "' class='text-white strong'>" + data['data'][j]['Name'] + "'s Chillness</a>",
																		"on 15th January, 2014 <i class='icon-time-clock'></i></span>",
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
															all_comments, 
															"<!-- User input comments -->",
															"<input type='text' class='form-control' style='border: none;' placeholder='Comment here...'>",
														"</div>",
													"</div>",
											"</div>",
										"</li>",
										].join('\n');

									j += 1;
									curr_pid = data['data'][j]['PID']; 
			        			}

			        			// debugger; 
			        			$('#newsfeed_container').prepend(html_newsfeed_content);
			        			// debugger; 

			        			most_recent_pid = data['data'][0]['PID'];
		        				localStorage.setItem("latest_pid", most_recent_pid);
		        				// alert('leaving after difference triggering!');
		        				return; 
		        			}
		        		}
		        		else {
		        			// first time going through
		        			most_recent_pid = data['data'][0]['PID'];
		        			localStorage.setItem("latest_pid", most_recent_pid);
		        			// alert('IMPORTANT: localstorage item set to ' + most_recent_pid); 
		        		} 
		        	}

		        	var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + data['data'][i]['Tagged'] + "&name=" + data['data'][i]['Name'] + "";

		        	var all_comments = ""; 

		        	// do comments parsing of DB, once basic form is done...
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
														"<span>upped <a href='" + temp_link + "' class='text-white strong'>" + data['data'][i]['Name'] + "'s Chillness</a>",
														"on 15th January, 2014 <i class='icon-time-clock'></i></span>",
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
											all_comments, 
											"<!-- User input comments -->",
											"<input type='text' class='form-control' style='border: none;' placeholder='Comment here...'>",
										"</div>",
									"</div>",
							"</div>",
						"</li>",
						].join('\n');

					$('#newsfeed_container').append(html_newsfeed_content);
		        }
		    } 
		    else {

		    	// WARNING! ERROR TRIGGERED.
		        console.log("WARNING: ERROR TRIGGERED LOADING DATA..."); 
		    }
		});
	});

</script>