<?php
    session_start();
    // include('config.php');
    //Reset OAuth access token
    // $google_client->revokeToken();
    setcookie('login','',time()-3600);
    session_unset();
    session_destroy();

    header("location:index.php");

?>
