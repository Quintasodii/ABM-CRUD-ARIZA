<?php
include ('conn.php');
$usu=$_POST["usuar"];
$pass=$_POST["passs"];
$consulta= "SELECT * FROM usuarios where '$usu'= usuario";
$resultado= mysqli_query($conn, $consulta);
$shash=mysqli_fetch_assoc($resultado);
$pow=$shash['contraseña'];
if (password_verify($pass, $pow)) {
    header("location:./admin.php");
}else{
    header("location:./index.php");
}
?>