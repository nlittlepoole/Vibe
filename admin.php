<html>
<head>
</head>
<body>
  <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/php-sdk/facebook.php");
    require($path . "/config.php");
    session_start();
    $facebook = $_SESSION['facebook'];
    $params = array(
                  'scope' => "friends_photos, user_groups, user_photos,user_education_history,email,user_location,user_education_histor,read_friendlists",
                  'redirect_uri' => 'http://go-vibe.com/index.php?action=login'
                );
    echo $facebook->getLoginUrl($params);
   ?>
</body>
</html>