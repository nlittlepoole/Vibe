  <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   require($path . "/php-sdk/facebook.php");
   require($path . "/config.php");
   session_start();
   $config = array(); //initializes $config as an array
    $config['appId'] = APP_ID; //$ Facebook App ID code for Vibe, assigned by facebook to Niger Little-Poole
    $config['secret'] = APP_SECRET; //FAcebook secret code for vibe
    $_SESSION['configArray'] = $config;
    $facebook = new Facebook($config); //App ID and passcode used to initialize session authoirzation for facebook API
    $token = $facebook->getAccessToken(); //Authorization token is grabbed from URL fragment, if user hasn't logged in it will return an invalid token
    $uid = $facebook->getUser(); // Facebook user ID number is returned, if facebook isn't logged in or exception, it returns 0
    if($uid!='712337857' && $uid!='100003582610055'){
        header('Location:/index.php' ); 
    }
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
    $sql = "SELECT Count(id),SUM(totalAnswers) FROM user"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $all=$st->fetchAll(); //$question source is set to result of query
    $profileCount=$all[0][0];
    $totalAnswers=$all[0][1];
    $sql = "SELECT Count(*) FROM user WHERE Active=1"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $activeCount=$st->fetch();
    $activeCount=$activeCount[0];
    $sql="SELECT COUNT(*) FROM USER WHERE DATE_SUB(CURDATE(),INTERVAL 30 MINUTE) <=STR_TO_DATE(LastLogin, '%Y-%m-%d %H:%i:%s')";
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $online=$st->fetch();
    $online=$online[0];
    $sql = "SELECT Count(*) FROM directory"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $communityCount=$st->fetch();
    $communityCount=$communityCount[0];
    $sql = "SELECT Name,Users,UID FROM directory  ORDER BY Users DESC Limit 10"; //sql query that returns the string of the question in the table
    $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
    $st->execute();//executes query above
    $largestCommunities=$st->fetchAll();



   ?>
<html>
<head>
</head>
<body>
<h1> Welcome to Vibe's Admin Panel</h1>
<br><h3> This is an analytics tracker for the vibosphere</h3>
<br>Online Users:  <?php echo $online ?>
<br>Total Users: <?php echo $activeCount ?>
<br>Total Profiles: <?php echo $profileCount ?>
<br>Questions Answered: <?php echo $totalAnswers ?>
<br>Total Communities: <?php echo $communityCount?>
<br>Largest Communities:
<?php foreach($largestCommunities as $community){
  echo '<br><li><a href="/index.php?action=location&location='.$community['UID'].'">'.$community['Name'].':'.$community['Users'].'</a>';
}

?>


</body>
</html>