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

                        get_stream = JSON.parse(localStorage["getStream"])

                        // check if this post exists in getStream - since you're looking at original posts, you don't need a timestamp
                        // (each original post can be defined strictly by PID)

                        for(var j = 0; j < get_stream.length; j++) {

                            // if the PIDs match, we found our original post in the db so we can add that content to our notifications returned
                            if(get_stream[j]["PID"] == curr_pid) {

                                var post_content = get_stream[j]["Content"];
                                var post_content_abbrev = '"' + post_content + '"';

                                if(post_content.length > 20) {
                                    var post_content_abbrev = '"' + post_content.substring(0, 20) + '..."';
                                }

                                // GET request to render post page

                                var html_notification_content = [
                                '<div class="media border-bottom innerAll margin-none">',
                                    '<div class="media-body">',
                                        '<a href="" class="pull-right text-muted innerT half">',
                                            '<i class="fa fa-comments"></i> 4',
                                        '</a>',
                                        '<h5 class="margin-none"><a href="javascript:;" class="text-inverse notif_link">Someone wrote about you!</a></h5>',
                                        '<small><a href="">' + post_content_abbrev + '</a></small>',
                                        '<small class="pid_notif_post" style="display: none;">' + curr_pid + '</small>',
                                        '<small class="timestamp_notif_post" style="display: none;">' +  get_stream[j]["PID"] + '</small>',
                                    '</div>',
                                '</div>',
                                ].join('\n');

                            $('#notification_elems').append(html_notification_content);
                            }
                        }
                    }
                }
            }
            else {
                console.log('[ERROR] rendering notification elements');     // error with JSON
            }
        });

    });

</script>