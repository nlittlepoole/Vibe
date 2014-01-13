<?php
function profiled($facebook,$uid,$token){
    require_once( CLASS_PATH . "/Web/Dashboard.php");
    require_once( CLASS_PATH . "/Web/User.php");
    require_once( CLASS_PATH . "/Web/Notification.php");
    if($uid){
        $user=$uid;
        if(isset($_GET['profile']) && $_GET['profile']!=$user ){
         $user=$_GET['profile'];
         if(checkFriend($_GET['profile']) && checkUID($_GET['profile'])){
           $_SESSION['profile']=profile($facebook,$user,$token ); 
         }
         else if(checkActive($_GET['profile'])){
            $_SESSION['profile']=profile($facebook,$user,$token );
         }
         else{
            $_SESSION['profile']=profile($facebook,-1,$token );
         }
        }
        else{
            $_SESSION['profile']=$_SESSION['dashboard'];
        }
    return 'Location: /website/profile.php?user='.$user;
    flush(); 
    }
    else{
      $_SESSION['profile']=null;
      echo $_SESSION['redirect']="index.php?action=profile&profile=".$_GET['profile'];
      return "Location: /index.php";
    }
}
function search($query,$facebook,$uid,$token){
    $users=friendsExact($query);
    $users=array_unique(array_merge($users,affiliatesExact($query,$uid)));
    $users=array_unique(array_merge($users,friendsLoose($query)));
    $users=array_unique(array_merge($users,affiliatesLoose($query,$uid)));
    $users=array_unique(array_merge($users,everyone($query)));
    $communities=communities($query);
    return Array($users,$communities);
}
function friendsExact($query){
    $friends=$_SESSION['friends'];
    $result=Array();
    for($x=0;$x<sizeof($friends['data']);$x++){
        if(stristr($friends['data'][$x]['name'], $query)){
            $result[$x]= '<tr><td>1</td><td><a href="/index.php?action=profile&profile='.$friends['data'][$x]['id'].'""><img src="http://graph.facebook.com/'.$friends['data'][$x]['id'].'/picture"  height="42" width="42">'.$friends['data'][$x]['name'].'</a></td></tr>';
        }
    }
    return $result;

}
function friendsLoose($query){
    $friends=$_SESSION['friends'];
    $result=Array();
    $queries=split(' ',$query);
    for($x=0;$x<sizeof($friends['data']);$x++){
        foreach($queries as $test){
            if(stristr($friends['data'][$x]['name'], $test)){
                $result[$x]= '<tr><td>1</td><td><a href="/index.php?action=profile&profile='.$friends['data'][$x]['id'].'""><img src="http://graph.facebook.com/'.$friends['data'][$x]['id'].'/picture"  height="42" width="42">'.$friends['data'][$x]['name'].'</a></td></tr>';
            } 
        }

    }
    return $result;
}
function affiliatesExact($query, $uid){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT Communities FROM user WHERE UID='".$uid."'"; //gets the active status of the user with $input_id as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $communities=$st->fetch();
    $communities=split('&&',$communities['Communities']);
    $users=Array();
    foreach($communities as $community){
            $sql = "SELECT Name,UID FROM user WHERE Communities LIKE '%".$community."%' AND Name LIKE '%".$query."%'"; //gets the active status of the user with $input_id as a user ID
            $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
            $st->execute(); //executes the sql query found above
            $users=array_unique(array_merge($users,$st->fetchAll()));

    }
    for($x=0;$x<sizeof($users);$x++){
        $users[$x]='<tr><td>1</td><td><a href="/index.php?action=profile&profile='.$users[$x]['UID'].'""><img src="http://graph.facebook.com/'.$users[$x]['UID'].'/picture"  height="42" width="42">'.$users[$x]['Name'].'</a></td></tr>';
    }
    return $users;
} 
function affiliatesLoose($query, $uid){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT Communities FROM user WHERE UID='".$uid."'"; //gets the active status of the user with $input_id as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $communities=$st->fetch();
    $communities=split('&&',$communities['Communities']);
    $users=Array();
    $queries=split(' ',$query);
    $query='';
    for($x=0;$x<sizeof($queries);$x++){ 
        if($queries[$x]){
            $query=$query." OR Name LIKE '%". $queries[$x] ."%'";
        }
    }
     $query=substr($query,3);
    foreach($communities as $community){
            $sql = "SELECT Name,UID FROM user WHERE Communities LIKE '%".$community."%' AND $query"; //gets the active status of the user with $input_id as a user ID
            $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
            $st->execute(); //executes the sql query found above
            $users=array_unique(array_merge($users,$st->fetchAll()));

    }
    for($x=0;$x<sizeof($users);$x++){
        $users[$x]= '<tr><td>1</td><td><a href="/index.php?action=profile&profile='.$users[$x]['UID'].'""><img src="http://graph.facebook.com/'.$users[$x]['UID'].'/picture"  height="42" width="42">'.$users[$x]['Name'].'</a></td></tr>'  ;$users[$x]['Name'] . ":" .$users[$x]['UID'];
    }
    return $users;
} 
function everyone($query){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT Name, UID FROM user WHERE Name LIKE '%".$query."%'"; //gets the active status of the user with $input_id as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $users=$st->fetchAll();
    for($x=0;$x<sizeof($users);$x++){
        $users[$x]= '<tr><td>1</td><td><a href="/index.php?action=profile&profile='.$users[$x]['UID'].'""><img src="http://graph.facebook.com/'.$users[$x]['UID'].'/picture"  height="42" width="42">'.$users[$x]['Name'].'</a></td></tr>'  ;
    }
    return isset($users) ? $users : Array();
}
function communities($query){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT Name, UID FROM directory WHERE Name LIKE '%".$query."%'"; //gets the active status of the user with $input_id as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $communities=$st->fetchAll();
}
?>