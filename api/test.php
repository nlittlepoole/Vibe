<?php
$urls = array(
    'http://facebook.com/nicole.seleme',
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

foreach($urls as $url) {
    curl_setopt($ch, CURLOPT_URL, $url);
    $out = curl_exec($ch);

    // line endings is the wonkiest piece of this whole thing
    $out = str_replace("\r", "", $out);

    // only look at the headers
    $headers_end = strpos($out, "\n\n");
    if( $headers_end !== false ) { 
        $out = substr($out, 0, $headers_end);
    }   

    $headers = explode("\n", $out);
    foreach($headers as $header) {
        if( substr($header, 0, 10) == "Location: " ) { 
            $target = substr($header, 10);

            echo "[$url] redirects to [$target]<br>";
            continue 2;
        }   
    }   

    echo "[$url] does not redirect<br>";
}
?>