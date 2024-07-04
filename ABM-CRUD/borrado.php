<?php
include ("conn.php");
$mort=$_POST['usuario'];
$sSQL= "DELETE FROM usuarios WHERE usuario='$mort'";
$result=mysqli_query($conn, $sSQL);
if ($result) {
    echo "Usuario Borrado";
    header("location:./admin.php");
}
?>

