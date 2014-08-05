<?php
    
    // keep track of session data
    session_start();

    // FRIENDS LIST: grab friend's data from Facebook

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

<!-- overall page settings -->
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<head>
    
    <title>Newsfeed</title>

    <!-- jQuery & jQuery UI -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <!-- font awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Selectize plugins (jQuery and its CSS) -->
    <script type="text/javascript" src="http://api.go-vibe.com/selectize/selectize.js"></script>
    <!-- <script type="text/javascript" src="http://api.go-vibe.com/selectize/examples/js/index.js"></script> -->
    <link rel="stylesheet" type="text/css" href="http://api.go-vibe.com/selectize/examples/css/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="http://api.go-vibe.com/selectize/selectize.default.css" />

    <!-- autocomplete code && form submission -->
    <script type="text/javascript">

        // initializing the last stored element to none
        localStorage.setItem("latest_pid", "null value");
        
        $(function() {
            
            // friends' list (as JSON data)
            var my_friends = <?php echo json_encode($_SESSION['friend_list']); ?>;

            var names_to_ID = {}; 
            var friends_names = new Array(); 

            for(var i = 0; i < my_friends.length; i++) {
                
                // storing mapping of name to UID
                names_to_ID[String(my_friends[i]['Name'])] = String(my_friends[i]['UID']);
                
                // simply storing names
                friends_names[i] = my_friends[i]['Name'];
            }

            // autocomplete with list of friends' names
            /*
            if(friends_names.length != 0) {
                $("#inputFriend").autocomplete({
                     source: friends_names
                });
            }   
            */

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

            // submission custom modifications
            $("#statusform").submit(function(event) {

                event.preventDefault();
                
                var inputted_names = $('#statusform input[name="recipient_to_convert"]').val();

                var my_names = inputted_names.split("&&");

                var uid_string = ""; 

                for(var i = 0; i < my_names.length; i++) {
                    var desired_uid = names_to_ID[my_names[i]];
                    uid_string += desired_uid; 
                    if(i < my_names.length - 1) {
                        uid_string += "&&"; 
                    }
                }

                // filling in hidden element with desired UID string
                $('#statusform input[name="recipient"]').val(uid_string);
                var inputted_uids = $('#statusform input[name="recipient"]').val();

                console.log('inputted names: ' + inputted_names); 
                console.log('inputted UIDs: ' + inputted_uids);
                
                $.post("http://api.go-vibe.com/api/vibe.php?action=postVibe", $("#statusform").serialize())

                    .done(function(data) {

                        // clear form elements
                        $('input[id="inputFriend"]').val("");
                        $('input[id="inputVibe"]').val("");

                        // trigger load of elements again (will have updated submission)
                        $('#last_elems').load('newsfeed_element.php'); 
                });
            });

            // periodic action
            function update() {
                $('#last_elems').load('newsfeed_element.php'); 
            }

            setInterval(update, 60000);     // send the GET request every 60 seconds


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

        /* comment submissions */
        $(function() {

            console.log('jQuery code wrote is able to be used.');
          
          // custom modifications
          $(".comment_form").submit(function(event) {
              
              // debugging
              console.log('you sent something!'); 

              // simply override normal send
              event.preventDefault();
          });
          

          // triggering submission upon ENTER
          $(".comment_input").keyup(function(event){
              if(event.keyCode == 13){

                  console.log('triggered click...');
                  debugger; 
                  $(".comment_submit").click();
              }
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

    <style type="text/css">
      
      .ui-autocomplete {
           max-height: 400px;
           overflow-y: auto;
           overflow-x: hidden;      /* prevent horizontal scrollbar */
      }

    </style>

</head>

<body class=" scripts-async menu-right-hidden">
    
    <!-- main container -->
    <div class="container-fluid ">

        
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
        var basePath = '',
        commonPath = '../assets/',
        rootPath = '../',
        DEV = false,
        componentsPath = '../assets/components/';
    
        // theme color variables
        var primaryColor = '#275379',
        dangerColor = '#b55151',
        successColor = '#609450',
        infoColor = '#4a8bc2',
        warningColor = '#ab7a4b',
        inverseColor = '#45484d';
    
        // primary color
        var themerPrimaryColor = primaryColor;

        App.Config = {
            ajaxify_menu_selectors: ['#menu'],
            ajaxify_layout_app: false   };

    </script>

    <!-- instant click (JS third party library) -->
    <script src="../../customjs/instantclick.min.js" data-no-instant></script>
    <script data-no-instant>InstantClick.init();</script>
    
</body>
</html>