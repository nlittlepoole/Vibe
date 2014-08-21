<?php
    
    session_start();

    // FRIEND LIST for Ajax & autocomplete
    
    $request = "http://api.go-vibe.com/api/user.php?action=getFriends&blocked=no&uid=";
    $request .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];

    $friends = json_decode(file_get_contents($request),true);
    $friends = $friends['data'];

    usort($friends, function($a, $b) {
        return strcmp($a['Name'], $b['Name']);
    });

    $_SESSION['friend_list'] = $friends;

?>

<!DOCTYPE html>

<!-- HTML header -->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

    <head>
        <title>Newsfeed</title>

        <!-- jQuery & jQuery UI -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- Font Awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Selectize -->
        <script type="text/javascript" src="http://api.go-vibe.com/selectize/selectize.js"></script>
        <link rel="stylesheet" type="text/css" href="http://api.go-vibe.com/selectize/selectize.default.css" />

        <!-- autocomplete code && form submission -->
        <script type="text/javascript">
            
            $(function() {

                localStorage.setItem("uid", '<?php echo $_SESSION["userID"]; ?>');
                localStorage.setItem("token", '<?php echo $_SESSION["token"]; ?>');
                
                // friends' list (as JSON data)
                var my_friends = <?php echo json_encode($_SESSION['friend_list']); ?>;

                var names_to_ID = {}; 
                var friends_names = new Array(); 

                for(var i = 0; i < my_friends.length; i++) {
                    
                    names_to_ID[String(my_friends[i]['Name'])] = String(my_friends[i]['UID']);      // name to UID
                    friends_names[i] = my_friends[i]['Name'];                                       // just name
                }

                /* SELECTIZE */

                var items = friends_names.map(function(x) { return { item: x }; });

                $('#inputFriend').selectize({
                    delimiter: '&&',
                    persist: false,
                    maxItems: 4,
                    options: items,
                    labelField: "item",
                    valueField: "item",
                    sortField: 'item',
                    searchField: 'item',
                    create: function(input) {
                        return {
                            value: input,
                            text: input
                        }
                    }
                });

                localStorage.setItem("friends_names", JSON.stringify(friends_names));
                localStorage.setItem("names_to_ID", JSON.stringify(names_to_ID));

                /* SUBMITTING A STATUS */

                $("#statusform").submit(function(event) {

                    event.preventDefault();
                    
                    var inputted_names = $('#statusform input[name="recipient_to_convert"]').val();
                    var inputted_vibe = $('#statusform input[name="status"]').val();

                    // names and IDs for post
                    var my_names    = inputted_names.split("&&");
                    var my_ids      = [];

                    var uid_string = ""; 

                    for(var i = 0; i < my_names.length; i++) {
                        
                        var curr_UID = names_to_ID[my_names[i]];
                        
                        // updating both the UID list and the UID serialized string
                        my_ids.push(curr_UID);
                        uid_string += curr_UID; 
                        
                        if(i < my_names.length - 1) {
                            uid_string += "&&"; 
                        }
                    }

                    $('#statusform input[name="recipient"]').val(uid_string); // fill in hidden element with UID serialized string
                    
                    $.post("http://api.go-vibe.com/api/vibe.php?action=postVibe", $("#statusform").serialize())

                        .done(function(data) {

                            // clear form elements
                            $('input[id="inputFriend"]').val("");
                            $('input[id="inputVibe"]').val("");

                            // trim front of JSON (i.e. the extraneous header)
                            var json_string = data.substring(String(data).indexOf('{')); 
                            returned_data   = JSON.parse(json_string);

                            /* RECIPIENTS */
 
                            var recipient_size = data['data'][i]['tagged'].length;
                            var post_tagged_formatted_names = "<span style='font-size:115%'>"; 

                            if(recipient_size == 1) {
                                
                                var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + my_ids[0] + "&name=" + my_names[0] + "";
                                
                                post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + my_names[0] + "</a>"; 
                            }
                            else if(recipient_size == 2) {
                                
                                var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + my_ids[0] + "&name=" + my_names[0] + "";
                                var temp_link2 = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + my_ids[1] + "&name=" + my_names[1] + "";
                                
                                post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + my_names[0] + "</a>" + " and " + "<a href='" + temp_link2 + "' class='text-white strong'>" + my_names[1] + "</a>"; 
                            }
                            else {

                                for(var z = 0; z < recipient_size; z++) {

                                    var temp_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=" + my_ids[z] + "&name=" + my_names[z] + "";
                                    
                                    if(z == recipient_size - 1) {       // last element
                                        post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + my_names[z] + "</a>&nbsp;";
                                    }
                                    else if(z == recipient_size - 2) {  // second-to-last element
                                        post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + my_names[z] + "</a>" + ", and ";
                                    }
                                    else {
                                        post_tagged_formatted_names += "<a href='" + temp_link + "' class='text-white strong'>" + my_names[z] + "</a>" + ", "; 
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
                                                            "<div class='media-body innerTB' style='padding-left:20px;'>",
                                                                "<span><i class='fa fa-arrow-up'></i> chillness of " + post_tagged_formatted_names,
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

                            $("#newsfeed_container").prepend(html_newsfeed_content);
                    });
                });

            });

            $(window).load(function() {

                /* LIKES */

                $('.widget').on('click', '.like_link', function() {

                    var is_unlike = $(this).hasClass("unlike_me").toString();

                    if(is_unlike == "true") {
                        $(this).text('like'); 
                    }
                    else {
                        // submit POST request associated with voting...

                        $(this).nextAll("form").submit(); 
                        // console.log('number of siblings of type form: ' + $(this).siblings("form").length)

                        // altering content dynamically - change to unlike and add dynamic increment on total # of likes there
                        var parse_like_text = $(this).parent().next().text(); 

                        console.log('text returned: ' + parse_like_text);

                        var to_add = "";

                        if (/^\s+$/.test(parse_like_text)) {    // only whitespace
                            to_add = "<span><a href='javascript:;'>" + "<span class='like_count'>1</span>" + " <i class='fa fa-thumbs-o-up'></i></a></span>";
                        }
                        else {
                            like_num = parseFloat(parse_like_text)
                            like_num += 1

                            to_add = "<span><a href='javascript:;'>" + "<span class='like_count'>" + like_num + "</span>" + " <i class='fa fa-thumbs-o-up'></i></a></span>";
                            $(this).parent().next().remove();

                        }

                        $(this).text('Unlike'); 
                        $(to_add).insertAfter($(this).parent());
                    }

                    $(this).toggleClass('unlike_me');   // switch classes
                });

                $(".like_form").submit(function(event) {
                  
                  // simply override normal send
                  event.preventDefault();

                  // debugging
                  console.log('like submission triggered...'); 

                  // grab value of comment and display it
                  var my_vote   = "agree";
                  var my_uid    = $(this).children('.hiddenID').val();
                  var my_token  = $(this).children('.hiddentoken').val();
                  var myPID     = $(this).children('.hiddenPID').val();

                  var my_timestamp = $(this).children('.timestamp').val();

                  console.log('timestamp of submission is: ' + my_timestamp);

                  // post request (modified)

                  $.ajax({
                      type: 'POST',
                      url: "http://api.go-vibe.com/api/vibe.php?action=vote",
                      data: { uid: my_uid, token: my_token, pid: myPID, vote: my_vote, timestamp : my_timestamp},
                      success: function(data) {
                          console.log('like mission accomplished.'); 
                          $('.like_form').each(function() {
                              this.reset();
                          });
                      },
                      async: true
                  });

                }); 

                // comment submissions - custom modifications
                $(".comment_form").submit(function(event) {
                  
                  // debugging
                  console.log('submission triggered...'); 

                  // grab value of comment and display it
                  var my_comment = $(this).children('.comment_input').val();
                  var my_uid = $(this).children('.hiddenID').val();
                  var my_token = $(this).children('.hiddentoken').val();
                  var myPID = $(this).children('.hiddenPID').val();

                  var current_elem = $(this);

                  // simply override normal send
                  event.preventDefault();

                  // post request (modified)

                  $.ajax({
                      type: 'POST',
                      url: "http://api.go-vibe.com/api/vibe.php?action=postComment",
                      data: { status: my_comment, uid: my_uid, token: my_token, pid: myPID},
                      success: function(data) {
                          console.log('comment mission accomplished.'); 
                          $('.comment_form').each(function() {
                              this.reset();
                          });

                          // append to current status the comment that you submitted

                          // insert comment above form (as a sibling) --> how to insert before something? (look online)
                          // you also need to find out where Niger does his timestamp insertion...

                          var comment_to_append = ""; 

                          var my_name = "<?php print($_SESSION['full_name']) ?>"; 
                          var my_uid = "<?php print($_SESSION['userID']) ?>"; 
                          var my_profile_load_name = "<?php print($_SESSION['my_profile_load_name']) ?>"; 

                          var my_prof_link = "http://api.go-vibe.com/social-v2.0.0/admin_fixed/new_profile.php?user=";
                          my_prof_link += my_uid + "&name=" + my_profile_load_name + "";

                          var pic_href = "https://graph.facebook.com/" + my_uid + "/picture?width=60&height=60";

                          comment_data = 
                                ['<!-- Comment -->', 
                                 '<div class="media border-bottom margin-none bg-gray">',
                                    '<a href="" class="pull-left innerAll half">',
                                        '<img src="' + pic_href + '" width="60" class="media-object">',
                                    '</a>',
                                    '<div class="media-body innerTB">',
                                        '<a href="#" class="pull-right innerT innerR text-muted">',
                                            '<i class="icon-reply-all-fill fa fa-2x"></i>',
                                        '</a>',
                                        '<a href="' + my_prof_link + '" class="strong text-inverse">' + my_name + '</a>    <small class="text-muted ">wrote on insert_time_here</small> <a href="" class="text-small">like</a>',
                                        '<div>' + my_comment + '</div>',
                                    '</div>',
                                '</div>',
                                ].join('\n');

                          console.log(comment_data);

                          $(comment_data).insertBefore(current_elem);

                          console.log("[STATUS] successfully inserted");
                      },
                      async: true
                  });

                  console.log('ajax called successfully'); 

                  // clear all old elements
                  // $('.vibe_newsfeed_posts').remove();

                  // clear form elements
                  // $('.comment_input').clear();

                  // trigger load of elements again (will have updated submission)
                  // $('#last_elems').load('newsfeed_element.php'); 

                }); 

            });

        </script>

        <!-- Ajax load scripts go at the top... -->
        <script type="text/javascript"> 

            $(function() {

                console.log('loading up the page...');
                
                // loading navbar...
                $('#new_navbar').load('new_navbar.php'); 
                console.log('navbar is loaded...');

                // loading sidebar...
                $('#new_sidebar').load('new_sidebar.php'); 
                console.log('sidebar is loaded...'); 

                // loading newsfeed elements...
                $('#last_elems').load('newsfeed_element.php'); 
                console.log('newsfeed element is loaded...');

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

                <div id="new_navbar"></div>

                <div class="container"><div class="innerAll">
                    <div class="row">
                        <div class="col-lg-9 col-md-8">
                            
                            <div class="timeline-cover">

                                <!-- VIBE SUBMIT FORM -->
                                <div class="widget widget-heading-simple widget-body-white">
                                    
                                    <div class="widget-body">
                                        <div class="innerLR">
                                            <div class="col-sm-12" style="padding: 0px; margin-bottom: 15px;">
                                                
                                                <!-- header or greeting -->
                                                <div class="bg-gray innerAll border-top border-bottom">
                                                    <h4 style="text-align: center; color: #428bca; margin-top: 5px; margin-bottom: 5px;" class="heading"><?php echo $_SESSION['first_name']; ?>, what's on your mind?</h4>
                                                </div>

                                            </div>
                                            <form name="status" id="statusform" class="form-horizontal" method="post" action="http://api.go-vibe.com/api/vibe.php?action=postVibe">
                                                
                                                <!-- friend selection -->
                                                <div class="form-group">
                                                    <label for="inputFriend" class="col-sm-2 control-label">Friend</label>
                                                    
                                                    <div class="col-sm-9">
                                                      <style type="text/css">
                                                        .selectize-control {
                                                          padding: 0px;
                                                          border-style: none;
                                                        }
                                                      </style>
                                                        <input type="text" class="form-control" id="inputFriend" name="recipient_to_convert" placeholder="Who's this about? Type in a Facebook friend!">
                                                        <input type="hidden" value="" name="recipient" />
                                                        <input type="hidden" value="newsfeed" name="post_source" />
                                                    </div>

                                                </div>

                                                <!-- hidden fields -->
                                                <div class="form-group">
                                                    <input type="hidden" name="uid" value=<?php echo '"' . $_SESSION['userID'] . '"' ?>>
                                                    <input type="hidden" name="token" value=<?php echo '"' . $_SESSION['token'] . '"' ?>>
                                                </div>

                                                <!-- Vibe content field -->
                                                <div class="form-group">
                                                    
                                                    <label for="inputVibe" class="col-sm-2 control-label">Vibe</label>
                                                    
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="status" id="inputVibe" placeholder="What do you want to say?">
                                                    </div>

                                                </div>

                                                <!-- submit field -->
                                                <div class="form-group">

                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" value="Submit" id="status_submit" class="btn btn-primary" style="width: 20%">Share&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                
                                </div>
                                <!-- // Widget END -->

                            <!-- end of TIMELINE COVER -->  
                            </div>
                            
                            <!-- HEADER Widget of NEWSFEED ELEMENTS -->
                            <div class="media">
                                
                                <a href="" class="btn btn-default pull-left">Today</a>
                                <div class="media-body">
                                      <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Share your mood...">

                                          <span class="input-group-btn">
                                              <button class="btn btn-primary" type="button">Search</button>
                                          </span>

                                      </div><!-- /input-group -->
                                </div>
                            </div>

                            <!-- actual TIMELINE -->
                            <ul class="timeline-activity list-unstyled" id="newsfeed_container">

                                <!-- loading NEWSFEED ELEMENTS here -->

                                <div id="last_elems"></div>

                            </ul>

                        </div>

                        <!-- loading SIDEBAR here -->
                        <div class="col-md-4 col-lg-3">

                            <div id="new_sidebar"></div>
                                
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

        <!-- minor design tweaks -->
        <script type="text/javascript">
            $(function() {
                // custom design change - (dark blue on hover instead of turquoise)

                $("#status_submit").on("mouseenter", function() {
                    $(this).css("background-color", "#275379");
                    $(this).css("border-color", "#275379");
                });

                $("#status_submit").on("mouseleave", function() {
                    $(this).css("background-color", "#428bca");
                    $(this).css("border-color", "#428bca");
                });
            });
        </script>
    </body>
</html>