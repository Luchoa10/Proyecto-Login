<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Olvido de Password</title>
</head>
<body>
	<form action="recuperar_clave.php" method="post">
		EMAIL<input type="MAIL" name="MAIL" placeholder="Ingrese Email">
		<br><input type="submit" value="Enviar">
	</form>

	<?php 
	if (isset($_POST['MAIL']) && !empty($_POST['MAIL'])) {
		//Conexion con la base
		//$CONN = mysqli_connect("localhost", "root", "", "nusuario");
		include ("db.php");
		$MAIL = mysqli_real_escape_string($CONN, $_POST['MAIL']);
		$c = "SELECT *, IFNULL(MAIL, 'datos') as MAIL FROM datos WHERE MAIL='$MAIL' LIMIT 1";
		$f = mysqli_query($CONN, $c);
		$a = mysqli_fetch_assoc($f);
		if (!$a) {
			$_SESSION['error'] = 'Usuario inexistente';
			//header( "Location: ../" );
			die();
		}
		//generar una clave aleatoria y el token

		$token = md5($a['MAIL'] . time() . rand(1000, 9999));
		$clave_nueva = rand(10000000, 99999999);
		$idusuario = $a['MAIL'];
		$c2 = "INSERT INTO recuperar SET EMAIL='$MAIL', TOKEN='$token', F., ECHA_ALTA=NOW(), CLAVE_NUEVA='$clave_nueva' ON DUPLICATE KEY UPDATE TOKEN='$token', CLAVE_NUEVA='$clave_nueva'";
		mysqli_query($CONN, $c2);

		$link = "http://localhost/recuperar_clave_confirmar.php?e=$MAIL&t=$token";

		//envío de mail
		$mensaje = <<<EMAIL
		<p>Hola {$a['MAIL']}</p>
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
