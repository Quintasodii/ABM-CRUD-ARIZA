<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updatear.php</title>
</head>
<body>
    <?php
    include ("conn.php");
    $USUA=$_POST["user"];
    $USER=$_POST["userr"];
    $PASS=$_POST["passs"];
    $EMAIL=$_POST["ermail"];
    DATE_DEFAULT_TIMEZONE_SET("America/Argentina/Buenos_Aires");
    $FECHAARG= date("d/m/y");
    $sSQL="UPDATE usuarios SET usuario='$USER', email='$EMAIL', contraseña='$PASS', fecha='$FECHAARG' WHERE usuario='$USER'";
    $resultadin= mysqli_query($conn, $sSQL);
    if ($resultadin) {
        header("location:./admin.php");
    }
    ?>
    
</body>
</html>