<?php
	session_start();
?>

<script type="text/javascript">
	$(function(){
		
		// REQUEST
		var newsfeed_url = "<?php echo $_SESSION['newsfeed_elems_request']; ?>";

		// GRABBING THE JSON
		$.getJSON(newsfeed_url, function(data) {

			// TESTING AGAINST ERRORS
			// alert("DATA:" + typeof(data['data']));

		    if (!data.error) {

		        // PARSING RESULTS
		        for(var i = 0; i < data['data'].length; i++) {
		        	
		        	var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + data['data'][i]['Tagged'] + "&name=" + data['data'][i]['Name'] + "";

		        	var all_comments = ""; 

		        	for(var j = 0; data['data'][i]['Comments'].length; j++) {
		        		all_comments += "<p>This is a comment!</p>";
		        	}

		        	var html_newsfeed_content = 
		        		["<li class='active'>", 
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
		        alert("WARNING: ERROR TRIGGERED LOADING DATA..."); 
		    }
		});
	});

</script>