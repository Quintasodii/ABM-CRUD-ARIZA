<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio de Sesión</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+Grund:wght@100..400&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <style>
        body {
            background-image: url(https://www.stpetersacademy.com.pa/wp-content/uploads/2018/06/fondo-login-spa.jpg);
            background-size: cover;
            display: block;
            align-items: center;
            margin-left: 120px;
            font-family: Arial, sans-serif;
        }

        h3 {
            font-family: "Silkscreen", cursive;
            text-align: center;
        }

        h4 {
            font-family: "Playwrite DE Grund", cursive; 
            text-align: center;
        }

        .container {
            display: block;
            align-items: center;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            margin-top: 150px;
            margin-left: 515px;
            padding: 20px 30px;
            width:350px;
            box-shadow: 0px 0px 60px rgba(198, 166, 100, 0.5);
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        #us {
            font-size: 18px;
            font-family: "Playwrite DE Grund", cursive;
            color: #000;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #9cf;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #9cf;
            font-size: 16px;
            color: #fff;
        }

        .btn:hover{
            background-color: #e22;
            color: #fff;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #0cf;
            text-decoration: none;
        }

        .forgot-password a:hover {
            color: #e55;
        }

        .sign-up{
            text-align: center;
        }

        .sign-up a{
            text-decoration: none;
            color: #0cf;
        }

        .sign-up a:hover {
            color: #e55;
        }

        #google, form-group {
            color: #0cf;
            font-size: 14px;

        }

        #google:hover {
            color: #e55;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h3><b>BIENVENIDO!</b></h3>
    <h4>Inicia sesion en tu cuenta</h4>
    <br>
    <form action="validar.php" method="POST">
        <div class="form-group">
            <input type="text" id="username" placeholder="Usuario" name="usuar" required>
        </div>
        <div class="form-group">
            <input type="password" id="password" placeholder="Contraseña" name="passs" required>
        </div>
        <button type="submit" class="btn">Ingresar</button>
        <div class="forgot-password">
            <a href="recuperar_clave.php">¿Olvido su contraseña?</a>
        </div>
        <div class="sign-up">
            <a href="registrarse.php">Registrate</a>
        </div>
    </form>
</div>
</body>

<?php

//Include Configuration File
include('config.php');

$login_button = '';

if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

//Ancla para iniciar sesión
if (!isset($_SESSION['access_token'])) {
    $login_button = '<a id="google" href="' . $google_client->createAuthUrl() . '"">Iniciar sesion con Google</a>';
}
?>

<html>
<head>
    
</head>

<body>
<div class="container">
    <br />
    <div>
        <div class="col-lg-4 offset-4">
            <div class="card">
                <?php
                if ($login_button == '') {
                    echo '<div class="card-header">Welcome User</div><div class="card-body">';
                    echo '<img src="' . $_SESSION["user_image"] . '" class="rounded-circle container"/>';
                    echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
                    echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
                    echo '<h3><a href="logout.php">Logout</a></h3></div>';
                } else {
                    echo '<div align="center">' . $login_button . '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>