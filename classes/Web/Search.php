<?php
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
            $result[$x]= $friends['data'][$x]['name'] . ":" .$friends['data'][$x]['id'];
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
                $result[$x]= $friends['data'][$x]['name'] . ":" .$friends['data'][$x]['id'];
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
        $users[$x]= $users[$x]['Name'] . ":" .$users[$x]['UID'];
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
        $users[$x]= $users[$x]['Name'] . ":" .$users[$x]['UID'];
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
        $users[$x]= $users[$x]['Name'] . ":" .$users[$x]['UID'];
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