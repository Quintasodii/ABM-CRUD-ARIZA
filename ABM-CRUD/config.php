<?php
//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID | Copiar "Aqui tu ID DE CLIENTE"
$google_client->setClientId('757359844055-2aonvnll31r8j0nukhse52jf097l2qia.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key Aqui tu CLAVE
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI | URL AUTORIZADO
$google_client->setRedirectUri('http://localhost/ABM-CRUD/admin.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>
