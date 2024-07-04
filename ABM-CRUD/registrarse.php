<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+Grund:wght@100..400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">

    <title>Registro</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            background-image: url(https://www.stpetersacademy.com.pa/wp-content/uploads/2018/06/fondo-login-spa.jpg);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        h2 {
            font-size: 28px;
            font-family: "Silkscreen", cursive;
            text-align: center;
        }  

        .register-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px 30px;
            width:350px;
            box-shadow: 0px 0px 60px rgba(198, 166, 100, 0.5);
        }

        .register-container input {
            width: 100%;
            height: 30px;
            font-size: 12px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #9cf;
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
            background-color: #0bf;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #e22;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <form action="register.php" method="post">
                <h2>REGISTRATE!</h2>
                <input type="text" placeholder="Nombre de usuario" name="usuar" required>
                <br><br>
                <input type="password" placeholder="Contraseña" name="passs" required>
                <br><br>
                <input type="email" placeholder="Email" name="ermail" required>
                <br><br>
            <button type="submit" class="btn">Registrarse</button>
        </form>
    </div>
</body>
</html>
