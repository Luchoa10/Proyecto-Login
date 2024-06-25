<?php

//Include Configuration File
include('config.php');
$login_button = '';

if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

//Ancla para iniciar sesión
if (!isset($_SESSION['access_token'])) {
    $login_button = '<a href="' . $google_client->createAuthUrl() . '" style=" background: #dd4b39; border-radius: 5px; color: white; display: block; font-weight: bold; padding: 20px; text-align: center; text-decoration: none; width: 200px;">Login With Google</a>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Gris claro */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #343a40; /* Gris oscuro */
        }
        form {
            margin-top: 20px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc; /* Gris */
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            color: #495057; /* Gris medio */
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #212529; /* Negro */
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #343a40; /* Gris oscuro al pasar el cursor */
        }
        a {
            text-decoration: none;
            color: #007bff; /* Azul */
            display: block;
            text-align: center;
            margin-top: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Bienvenido Nuevamente!</h1>
        <form action="final.php" method="post">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="pass" placeholder="Contraseña" required>
            <input type="submit" name="login" value="Iniciar sesión">
        </form> 
        <a href="form.php">Nuevo usuario</a>
        <a href="recuperar_clave.php">¿Olvido su contraseña?</a>
        <?php
            if ($login_button != '') {
                echo '<div class="text-center mt-4">O inicia sesión con:</div>';
                echo '<div class="text-center">' . $login_button . '</div>';
            }
            ?>
    </div>
</body>
</html>
