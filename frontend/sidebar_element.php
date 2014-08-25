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
                var html_notification_content = [
                    '<div class="media border-bottom innerAll margin-none">',
                        '<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>',
                        '<div class="media-body">',
                            '<a href="" class="pull-right text-muted innerT half">',
                                '<i class="fa fa-comments"></i> 4',
                            '</a>',
                            '<h5 class="margin-none"><a href="" class="text-inverse">Someone upped your Kindness</a></h5>',
                            '<small>on February 12th, 2014 </small>',
                        '</div>',
                    '</div>',
                    ].join('\n');

                $('#notification_elems').append(html_notification_content);
                console.log(html_notification_content);
            }
            else {
                console.log('[ERROR] rendering notification elements');     // error with JSON
            }
        });

    });

</script>