<?php
function location($facebook,$uid,$token){
    if(isset( $_GET['location']) && $uid){
      $location =$_GET['location'];
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //database connection is established uisng credentials in config.php
      $sql = "SELECT Name,Picture FROM directory WHERE UID=$location"; //sql query that returns the string of the question in the table
      $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
      $st->execute();//executes query above
      $raw=$st->fetchAll();
      print_r($raw);
      if($raw){
        $sql = "SELECT * FROM `$location`"; //sql query that returns the string of the question in the table
        $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
        $st->execute();//executes query above
        $data=$st->fetchAll();
        foreach($data as &$attribute){
          $keywords=split('&&',$attribute['Keywords']);
          $keyword="";
          $max=0;
          foreach($keywords as &$quality){
            $count=stristr($quality,'(',true);
            if($count>$max){
              $max=$count;
              $keyword="#".str_replace(array(1,2,3,4,5,6,7,8,9,0,')','(',' '),'', $quality);
            }
          }
          $attribute['Keywords']=$keyword;
        }
        $sql = "SELECT * FROM user WHERE UID=$uid"; //sql query that returns the string of the question in the table
        $st = $conn->prepare( $sql );// prevents user browser from seeing queries. Useful for security
        $st->execute();//executes query above
        $user=$st->fetch(); //$question source is set to result of query
          $scores=Array(
          "Affability"=>$user['Affability'],
          "Ambition"=>$user['Ambition'],
          "Attractiveness"=>$user['Attractiveness'],
          "Confidence"=>$user['Confidence'],
          "Fun"=>$user['Fun'],
          "Happiness"=>$user['Happiness'],
          "Honesty"=>$user['Attractiveness'],
          "Humility"=>$user['Humility'],
          "Humor"=>$user['Humor'],
          "Intelligence"=>$user['Intelligence'],
          "Kindness"=>$user['Kindness'],
          "Promiscuity"=>$user['Promiscuity'],
          "Reliability"=>$user['Reliability'],
          "Style"=>$user['Style'],
          );
        $data['Percentiles']=getPercentiles($location,$scores);
        $data['Picture']=$raw[0][1];
        $data['Name']=$raw[0][0];
        $_SESSION['location']=$data;
         header('Location: /website/communities.php?location='.$location); //sends browser to questions page with Session Data containing questions input above
        flush();                             // Force php-output-cache to flush to browser.
      }
      else{
        sleep(5);
        echo "<script type='text/javascript'>alert('Sorry this Community does not have Vibe data yet!');</script>";
        header('Location:/index.php?action=location');
      }
    }
    else{
      if(!$uid){
        sleep(5);
        echo "<script type='text/javascript'>alert('Log in to use Vibe Communities!');</script>";
        header('Location:/index.php');
      }
      else{
        sleep(5);
        echo "<script type='text/javascript'>alert('Invalid Request');</script>";
        header('Location:/index.php?action=dashboard');

      }
      
    }
}
?>