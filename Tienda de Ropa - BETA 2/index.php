<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Tienda de Ropa</title>
    <link rel="stylesheet" href="css/styleHeader.css">
    <link rel="stylesheet" href="css/styleLogin.css">
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
			<form class="formLogin" method="post" action=""> 
				<input type="text" id="" name="user" placeholder="Usuario">
				<input type="password" id="" name="password" placeholder="Contraseña">
				<input type="submit" value="Iniciar sesión" name="LogIn">
			</form>
			<?php
				$user = array
				(
					'U_ID' => 0,
					'U_Nombre' => '',
					'U_Pass' => '',
					'U_Tipo' => 0,
					'U_Saldo' => 0
				);

				if(isset($_POST['LogIn'])){
					$userForm = $_POST['user'];
					$passForm = $_POST['password'];

					$conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
					if (!$conn) die("Conexión fallida: " . mysqli_connect_error());
					$sql = "SELECT user_id, nombre, pass, tipo, saldo FROM cuentas WHERE nombre = '$userForm'";

					$ejecutar = mysqli_query($conn, $sql);
					if (mysqli_num_rows($ejecutar) > 0) {
						$datos = mysqli_fetch_array($ejecutar);
						
						if($datos['pass'] == $passForm)
						{
							?>
							<?php
							$user['U_ID'] = $datos['user_id'];
							$user['U_Nombre'] = $datos['nombre'];
							$user['U_Pass'] = $datos['pass'];
							$user['U_Tipo'] = $datos['tipo'];
							$user['U_Saldo'] = $datos['saldo'];
						}						
						else echo "<h4>Contraseña incorrecta</h4>";
					}
					else echo "<h4>Usuario no encontrado</h4>";
					if($user["U_Tipo"]=='1')
					{
						header("location:principal.php");
					}
					elseif($user["U_Tipo"]=='2')
					{
						header("location:admin.php");
					}
					mysqli_close($conn);
				}
			?>
		</div>
	</div>
</body>
</html>