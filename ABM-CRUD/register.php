<?php
include ('conn.php');
$usu=$_POST["usuar"];
$pass=$_POST["passs"];

$HASH_PASS=password_hash($pass, PASSWORD_DEFAULT);

$email=$_POST["ermail"];
DATE_DEFAULT_TIMEZONE_SET("America/Argentina/Buenos_Aires");
$fecha= date("d/m/y");
$registro= "INSERT INTO usuarios(usuario, contraseña, email, fecha) VALUES ('$usu', '$HASH_PASS', '$email', '$fecha')";
     $resultado= mysqli_query($conn,$registro);
    if($resultado){
        echo "Te has registrado joder tio";
        header("location:./index.php");
    }else{
    echo "ERRORRRR";
}

?>