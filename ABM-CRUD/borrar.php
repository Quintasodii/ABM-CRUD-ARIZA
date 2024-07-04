<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="borrar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            include ('conn.php');
            echo '<form action="borrado.php" method="post"> usuarios <br>';
            $sSQL= "SELECT usuario from usuarios ORDER BY usuario";
            $resultado= mysqli_query($conn, $sSQL);
            echo  '<Select name="usuario">';
            while($row=mysqli_fetch_array($resultado)){
            echo '<option>'.$row["usuario"];
            }
            mysqli_free_result($resultado);
        ?>
        </select>
        <input type="submit" value="BORRAR">
        </form>
    </div>
</body>
</html>