<?php

    // config settings 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once($root . "/config.php");

    // authenticate user access token & UID
    function validToken($uid, $token) {

        $url = "https://graph.facebook.com/debug_token?input_token=$token&access_token=" . APP_TOKEN;
        $response = json_decode(file_get_contents($url), true);
        
        return true;
    }

    // pushing JSON encoded response
    function pushResponse($response_array){
        
        ob_start(); 
        echo json_encode($response_array);
        
        header('Connection: close');
        header('Content-Length: '. ob_get_length());
        
        ob_end_flush();
        ob_flush();
        flush();
    }

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