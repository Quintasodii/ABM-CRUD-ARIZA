<?php
// Conexion con la base
$conn = mysqli_connect("Quinta", "localhost", "gugu", "datacenter"); 

// Obtener las credenciales del formulario
$usuario = $_POST['usuario'];
$password = $_POST['contraseña'];


// Verificar si el usuario existe en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['contraseña'];

    if (password_verify($password, $hashedPassword)) {
        // Contraseña correcta, iniciar sesión
    
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: admin.php");
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta.";
    }
} else {
    // Usuario inexistente
    echo "Usuario inexistente.";
}

mysqli_close($conn);
?>
