<?php
    session_start();

    // JSON notifications request
    $_SESSION['notification_elems_request'] = "http://api.go-vibe.com/api/notification.php?action=getNotifications&uid=";
    $_SESSION['notification_elems_request'] .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];
?>

<script type="text/javascript">

    $(function() {

        // USER'S LIKE HISTORY

        var my_notifications_url = "<?php echo $_SESSION['notification_elems_request']; ?>";

        $.getJSON(my_notifications_url, function(data) {

            if (!data.error) {

                var notification_length = data['data'].length;

                for(var i = 0; i < notification_length; i++) {
                    var curr_classif    = data['data'][i]['Class'];
                    var curr_message    = data['data'][i]['Message'];
                    var curr_data       = data['data'][i]['Data'];
                    var curr_timestamp  = data['data'][i]['Timestamp'];

                    console.log("POST: " + curr_classif + " " + curr_message + " " + curr_data + " " + curr_timestamp);

                    var html_notification_content = "";

                    if(curr_classif == "posted about you") {

                        var curr_pid = curr_data;   // the data is actually the PID of the post

                        // '<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>',

                        var html_notification_content = [
                            '<div class="media border-bottom innerAll margin-none">',
                                '<div class="media-body">',
                                    '<a href="" class="pull-right text-muted innerT half">',
                                        '<i class="fa fa-comments"></i> 4',
                                    '</a>',
                                    '<h5 class="margin-none"><a href="" class="text-inverse">Someone wrote about you!</a></h5>',
                                    '<small>on February 12th, 2014 </small>',
                                '</div>',
                            '</div>',
                            ].join('\n');

                        $('#notification_elems').append(html_notification_content);
                    }
                }
            }
            else {
                console.log('[ERROR] rendering notification elements');     // error with JSON
            }
        });

    });

</script>