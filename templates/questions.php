
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--This php establishes the local varibles necessary for the questions Don't worry about this code now. As it doesn't do anything since I never coded functinons for it-->
    <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/php-sdk/facebook.php");
    require($path . "/config.php");
    session_start();
    $name = $_SESSION['name'];
    $recipient=$_SESSION['recipient'];
    $pic = $_SESSION['pic'];
    $question = $_SESSION['question'];
    $logoutURL = $_SESSION['logoutUrl'];
    $question_id=$_SESSION['question_id'];
    $vibe= new Vibe($name, $recipient, $question_id);
   ?>
</head>
<body>
</body></body>
</html>