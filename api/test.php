<?php
    ini_set('display_errors',1); 
    error_reporting(E_ALL);
        $user = "712337857";
        $status = "stat";
        $email = "nlittlepoole@gmail.com";
        echo $email;
        $status = addslashes($status);
        
        // runs sendEmail.py which deals with sending the email
        $command = "sudo python sendEmail.py $email $user '$status'  2>&1";
        $temp = exec($command, $output);
        print_r($output);
?>