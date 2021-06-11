<?php

//start session on web page
// session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('831702613816-jv3rl7t5vovmdghcui19js7ue32fe9s6.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('syVk-qqHT0aM-X8TI8rFK3R3');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/DE-Project/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?> 