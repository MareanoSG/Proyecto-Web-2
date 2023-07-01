<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin - Tienda de Ropa</title>

   <link rel="stylesheet" href="CSS/stHeader.css">
   <link rel="stylesheet" href="CSS/stAdmin.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">

</head>
<body>
   <?php
        if($_GET['userid'] != '6'){
            header("location:index.php");
        }
   ?>
   <div class="contenedor">
   <div class="contenido">
      <h3><span>Administrar</span></h3>
      <h1>Bienvenido, <span>vendedor</span>.</h1>
      <p>¿Qué acción desea realizar?</p>
      <a href="subir.php?userid=6" class="btn">Subir prenda</a>
      <a href="stock.php?userid=6" class="btn">Ver stock</a>
      <a href="ventas.php?userid=6" class="btn">Ver ventas</a>
   </div>

</div>

</body>
</html>