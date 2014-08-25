<?php

        $response_array = array("test"=>"test");         
        echo json_encode($response_array); 
        echo sizeof(json_encode($response_array));
        $size = ob_get_length();   
         echo "OB: $size";
?>