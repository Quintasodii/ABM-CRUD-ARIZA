<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Actualizar1.php</title>
</head>
<body>
    <div aling="center">
    <br>
    <?php
    include ("conn.php");
    echo '<form action="updatear.php" method="post">Nombre<br>';
    $sSQL="SELECT usuario FROM usuarios ORDER BY usuario";
    $result=mysqli_query($conn, $sSQL);
    echo '<select name="user">';
    while ($row=mysqli_fetch_array($result)) {
        echo '<option>'.$row["usuario"];
    }
    mysqli_free_result($result);
    ?>
    </select>
    <br><br><br>
    Nombre: <br>
    <input type="text" name="userr">
    Contraseña:
    <input type="password" name="passs">
    Email:
    <input type="email" name="ermail">
    <input type="submit" value="ACTUALIZAR">
</body>
</html>