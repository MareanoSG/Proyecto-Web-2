<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Tienda de Ropa</title>
    <link rel="stylesheet" href="CSS/stHeader.css">
    <link rel="stylesheet" href="CSS/stLogin.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>
	<div class="contenido">
		<header>
			<h2>RM à la mode.</h2>
			<h3>le secret d'un grand style</h3>
        	<hr class="logo_hr">
		</header>
		<div class="login">
			<form class="formLogin" method="post" action="#"> 
				<input type="text" id="" name="user" placeholder="Usuario">
				<input type="password" id="" name="password" placeholder="Contraseña">
				<input type="submit" value="Iniciar sesión" name="LogIn">
				<?php
					error_reporting(E_ALL & ~E_WARNING);
					error_reporting(0);
					if($_GET['err'] == 'user'){
						echo "<h4>Usuario no encontrado</h4>";
					}
					else if($_GET['err'] == 'pass'){
						echo "<h4>Contraseña incorrecta</h4>";
					}
				?>
			</form>
		</div>
	</div>
	<?php
		if(isset($_POST['LogIn'])){
	   		$userForm = $_POST['user'];
			$passForm = $_POST['password'];

			$conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
			if (!$conn) die("Conexión fallida: " . mysqli_connect_error());
			$sql = "SELECT user_id, nombre, pass, tipo FROM cuentas WHERE nombre = '$userForm'";

	      	$ejecutar = mysqli_query($conn, $sql);
			if (mysqli_num_rows($ejecutar) > 0) {
				$datos = mysqli_fetch_array($ejecutar);
				
				if($datos['pass'] == $passForm)
				{
					$user['U_ID'] = $datos['user_id'];
					$user['U_Nombre'] = $datos['nombre'];
					$user['U_Pass'] = $datos['pass'];
					$user['U_Tipo'] = $datos['tipo'];
					
					if($user['U_Tipo'] == '2') header("location:admin.php?userid=6");
                    else header("location:principal.php?userid=".$user['U_ID']);
				}						
				else{
					header("location:index.php?err=pass"); //contraseña incorrecta
				}
			}
			else header("location:index.php?err=user"); //usuario desconocido

			mysqli_close($conn);
		}
	?>
</body>
</html>