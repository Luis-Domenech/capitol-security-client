<?php 
    shell_exec( 'git reset --hard' );
    shell_exec( 'git pull' );
    // Make an api call too to keep heroku dyno alive 
    $ch = curl_init();
    $url = "https://capitol-security.herokuapp.com/api/check";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

?>