<?php

    // config settings 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once($root . "/config.php");

    // authenticate user access token & UID (means that api requests will only work for someone with valid UID)
    function validToken($uid, $token) {

        /*
        $url = "https://graph.facebook.com/debug_token?input_token=$token&access_token=" . APP_TOKEN;
        $response = json_decode(file_get_contents($url), true);
        */

        return true;
    }

    // pushing JSON encoded response (NOTE: currently inefficient, leading to long waits)
    function pushResponse($response_array, $type){
        /*
        ob_start(); 
        echo json_encode($response_array);
        
        header('Connection: close');
        header('Content-Length: '. ob_get_length());
        
        ob_end_flush();
        ob_flush();
         flush(); */
        switch ($type) {
            case 'POST':
                ignore_user_abort(true);
                header("Connection: close\r\n");
                header("Content-Encoding: none\r\n");  
                ob_start();   
                ob_clean();     
                $response = json_encode($response_array);
                echo $response;  
                $size = ob_get_length()+2;
                header("Content-Length: $size",TRUE);  
                ob_end_flush();
                flush();
            break;   
            case 'GET':
                echo json_encode($response_array);  
            break;
        }
    }

    // current post framework to send asynchronous POST requests between different files
    function post($url, $post_data) {
        foreach($post_data as $key => $value) {
            $post_items[] = $key . '=' . $value;
        }

        $post_string = implode ('&', $post_items);

        // create cURL connection
        $curl_connection = curl_init($url);

        // set options
        curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl_connection, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
        curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

        // set data to be posted
        curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);

        // perform our request
        $result = curl_exec($curl_connection);

        //show information regarding the request
        print_r(curl_getinfo($curl_connection));
        echo curl_errno($curl_connection) . '-' . curl_error($curl_connection);

        //close the connection
        curl_close($curl_connection);

        var_dump($result);  
    }
    
?>