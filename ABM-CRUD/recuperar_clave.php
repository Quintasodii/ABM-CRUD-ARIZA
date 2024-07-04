<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">

	<title>Olvido de Password</title>

	<style>
		body {
    		display: flex;
    		justify-content: center;
    		align-items: center;
    		height: 100vh;
    		background-image: url(https://www.stpetersacademy.com.pa/wp-content/uploads/2018/06/fondo-login-spa.jpg);
    		margin-top: 0px;
    		font-family: Arial, sans-serif;
		}

		h2 {
			font-family: "Silkscreen", cursive;
		}

		#env {
    		background-color: #fff;
    		padding: 20px 40px;
    		border-radius: 10px;
    		box-shadow: 0px 0px 60px rgba(198, 166, 100, 0.5);
    		box-sizing: content-box;
		}

		#enviar {
   			background-color: #9cf;
   			color: #fff;
   			border: none;
   			border-radius: 5px;
   			width: 60%;
   			font-size: 16px;
   			margin-left: 65px;
		}

		#enviar:hover {
    		background-color: #e55;
		}

		#elmail {
    		font-size: 14px;
    		margin-left: 75px;
		}
	</style>
</head>

<body>
	<form id="env" action="recuperar_clave.php" method="post">
		<h2>RECUPERE SU CONTRASEÑA</h2>
		
		<input id="elmail" type="email: " name="email" placeholder="Ingrese su Email">
		<br><br>
		<input id="enviar" type="submit" value="Enviar">
	</form>

	<?php 
	if (isset($_POST['email']) && !empty($_POST['email'])) {
		//Conexion con la base
		//$conn = mysqli_connect("Quinta", "localhost", "gugu", "datacenter");
		include ("conn.php");
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$c = "SELECT *, IFNULL(email, 'usuarios') as email FROM usuarios WHERE email='$email' LIMIT 1";
		$f = mysqli_query($conn, $c);
		$a = mysqli_fetch_assoc($f);
		if (!$a) {
			$_SESSION['error'] = 'Usuario inexistente';
			//header( "Location: ./index.php" );
			die();
		}
		//generar una clave aleatoria y el token

		$token = md5($a['email'] . time() . rand(1000, 9999));
		$clave_nueva = rand(10000000, 99999999);
		$idusuario = $a['email'];
		$c2 = "INSERT INTO recuperar SET email='$email', TOKEN='$token', FECHA_ALTA=NOW(), CLAVE_NUEVA='$clave_nueva' ON DUPLICATE KEY UPDATE TOKEN='$token', CLAVE_NUEVA='$clave_nueva'";
		mysqli_query($conn, $c2);

		$link = "http://localhost/ABM-CRUD/recuperar_clave_confirmar.php?e=$email&t=$token";

		//envío de mail
		$mensaje = <<<EMAIL
		<p>Hola {$a['email']}</p>
		<p>Has solicitado recuperar tu contraseña. El sistema te ha generado una nueva clave que es: <code style='background: lightyellow; color: darkred; padding: 1px 2px;'>$clave_nueva</code></p>
		<p>Pero antes de poder usarla, deberás hacer <a href='$link'>clic en este vínculo</a> o copiar este código en la URL de tu navegador</p>
		<code style='background: black; color: white; padding: 4px;'>$link</code>
		<p>Si tú no has hecho esta solicitud, ignora el presente mensaje</p>
		EMAIL;

		echo $mensaje;

		//enviar ese mail 
		//redireccionar al formulario....
	}
	?>
</body>
</html>
