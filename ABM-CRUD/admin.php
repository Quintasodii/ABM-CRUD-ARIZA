
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="admin.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin.php</title>
</head>
<body>
<h1>
<div type="div1">Lectura</div>

</h1>
<br>
<br>
<?php
include ('conn.php');
$LECT="SELECT * FROM usuarios";
$RESULT= mysqli_query($conn, $LECT);
?>
<table>
<tr>
    <th>usuario</th>
    <th>contraseña</th>
    <th>email</th>
    <th>fecha de ingreso</th>
</tr>
<?php
while($row= mysqli_fetch_array($RESULT)){
echo '<tr><td>'.$row['usuario'].'</td>';
echo '<td>'.$row['contraseña'].'</td>';
echo '<td>'.$row['email'].'</td>';
echo '<td>'.$row['fecha'].'</td></tr>';
}
mysqli_free_result($RESULT);
?>
</table>
<div>
    <br>
</div>
<a href="index.php">Iniciar Sesion</a>
<a href="borrar.php">Borrar Cuentas</a>
<a href="update.php">Cambiar Contraseña</a>
</body>
</html>