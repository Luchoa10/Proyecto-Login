<?php
include('db.php');

// Si se envió el formulario de login
if(isset($_POST['login'])){
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    
    // Consultar la base de datos para verificar las credenciales
    $sql = "SELECT * FROM datos WHERE USUARIO = '$usuario'";
    $result = mysqli_query($conex, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['pass'];
    
        if (password_verify($password, $hashedPassword)) {
            // Contraseña correcta, iniciar sesión
        
            session_start();
            $_SESSION["usuario"] = $usuario;
            header("Location: accesocorrecto.php");
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        // Usuario inexistente
        echo "Usuario inexistente.";
    }
    
    mysqli_close($conex);
    
}

// Si se envió el formulario de registro
if(isset($_POST['register'])){
    $mail = $_POST['email'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $fecha = date("d/m/y/H:i");
    
    // Insertar los datos en la tabla 'datos'
    $consulta_registro = "INSERT INTO datos (USUARIO, PASS, FECHA, MAIL) VALUES ('$usuario', '$pass', '$fecha', '$mail')";
    $resultado_registro = mysqli_query($CONN, $consulta_registro);
    
    if($resultado_registro){
        echo "Te inscribiste OK";
    } else {
        echo "Ocurrió un error al registrarte";
    }
}

mysqli_close($CONN);
?>
