<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Regístrese</h1>
        <form action="final.php" method="post">
            <input name="usuario" type="text" placeholder="Ingrese su usuario" required>
            <input name="pass" type="password" placeholder="Ingrese su contraseña" required>
            <input name="email" type="email" placeholder="Ingrese su email" required>
            <input name="register" type="submit" value="Registrarse">
        </form>
    </div>
</body>
</html>
