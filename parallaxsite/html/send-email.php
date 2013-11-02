<?php
  // Define some constants
  define( "RECIPIENT_NAME", "Your name" ); // Replace with your name
  define( "RECIPIENT_EMAIL", "email@domain.com" ); // Replace with your email
  define( "EMAIL_SUBJECT", "Visitor Message" );
  // Read the form values
  $success = false;
  $senderName = isset( $_POST['sender-name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['sender-name'] ) : "";
  $senderEmail = isset( $_POST['sender-email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['sender-email'] ) : "";
  $message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";
  
  // If all values exist, send the email
  if ( $senderEmail && $message ) {  
    
    require_once('phpMailer/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->IsMail();
    
    $mail->From = RECIPIENT_EMAIL;
    $mail->FromName = 'Site Visitor';
    $mail->AddReplyTo($senderEmail, $senderName);
    $mail->Subject = EMAIL_SUBJECT;
    $mail->AddAddress(RECIPIENT_EMAIL, RECIPIENT_NAME);
    $mail->Body = $message;   
    $success = $mail->Send();
    
  } # end if no error
  // Return an appropriate response to the browser
  if ( isset($_GET["ajax"]) ) {
    echo $success ? "success" : "error";
  } else {
?>
<html>
  <head>
    <title>Thanks!</title>
  </head>
  <body>
  <?php if ( $success ) echo "<p>Thanks for sending your message! We'll get back to you shortly.</p>" ?>
  <?php if ( !$success ) echo "<p>There was a problem sending your message. Please try again.</p>" ?>
  <p>Click your browser's Back button to return to the page.</p>
  </body>
</html>
<?php
  }
?>