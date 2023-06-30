<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM à la mode</title>
	<link rel="stylesheet" href="CSS/stHeader.css">
	<link rel="stylesheet" href="CSS/stAdmin.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        $id = $_GET['userid'];
    ?>

	<header>
		<h2>RM à la mode.</h2>
		<h3>le secret d'un grand style</h3>
      <hr class="logo_hr">
      <nav>
         <a href="principal.php?catalogo=1&userid=<?php echo $id;?>">Caballeros</a>
         <a href="principal.php?catalogo=2&userid=<?php echo $id;?>">Damas</a>
         <a href="principal.php?catalogo=3&userid=<?php echo $id;?>">Niños</a>
         <a href="compras.php?userid=<?php echo $id;?>">Compras</a>
      </nav>
   </header>
   
   <section class="casi-slider">
      	<a href="">
            <?php
                if($_GET['catalogo'] == '1') echo '<video src="IMG/video_moda_1.mp4" autoplay="autoplay" muted="muted" loop="loop">';
                else if($_GET['catalogo'] == '2') echo '<video src="IMG/video_moda_2.mp4" autoplay="autoplay" muted="muted" loop="loop">';
                else if($_GET['catalogo'] == '3') echo '<video src="IMG/video_moda_3.mp4" autoplay="autoplay" muted="muted" loop="loop">';
                else echo '<video src="IMG/video_moda.mp4" autoplay="autoplay" muted="muted" loop="loop">';
            ?>
      	   <video src="IMG/video_moda_2.mp4" autoplay="autoplay" muted="muted" loop="loop">
      	</a>
      	<!-- <a href="#">
      	   <video src="IMG/video_moda2.mp4" autoplay="autoplay" muted="muted" loop="loop">
      	</a> -->
        <?php
            if($_GET['catalogo'] == '1') echo "<h2>Catálogo de Caballeros</h2>";
            else if($_GET['catalogo'] == '2') echo "<h2>Catálogo de Damas</h2>";
            else if($_GET['catalogo'] == '3') echo "<h2>Catálogo de Niños</h2>";
            else echo "<h2>Catálogo General</h2>";
        ?>
   </section>

   <section class="catalogoGeneral">
    <?php
        $conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
        if(!$conn) {
            die("Conexión fallida: ".mysqli_connect_error());
        }

        $sql = 'SELECT nombre, precio, imagen, detalles, id_prenda FROM prendas ';
        if($_GET['catalogo'] == '1') $sql = "SELECT nombre, precio, imagen, id_prenda FROM prendas WHERE tipo = '1'";
        if($_GET['catalogo'] == '2') $sql = "SELECT nombre, precio, imagen, id_prenda FROM prendas WHERE tipo = '2'";
        if($_GET['catalogo'] == '3') $sql = "SELECT nombre, precio, imagen, id_prenda FROM prendas WHERE tipo = '3'";
        $ejecutar = mysqli_query($conn, $sql);
        
        $prendaCount = 0;
        $filaCount = 0;
        
        if(mysqli_num_rows($ejecutar) > 0) {
            while($datos = mysqli_fetch_array($ejecutar)) {
                $imgPrenda = $datos['imagen'];
                $nombrePrenda = $datos['nombre']; 
                $precioPrenda = $datos['precio']; 
                $idPrenda = $datos['id_prenda']; 
                
                if($prendaCount == 0) {
                    echo '<div class="filaPrendas">';
                }
        
                ?>
                <a href="<?php echo "producto.php?userid=".$id."&prodid=".$idPrenda;?>" class="prenda">
                    <div class="imgPrenda" style="background-image: url('<?php echo $imgPrenda; ?>')">
                        
                    </div>
                    <div class="detallePrenda">
                        <h2><?php echo $nombrePrenda; ?></h2>
                        <h3>$<?php echo $precioPrenda; ?></h3>
                    </div>
                </a>
                <?php
        
                $prendaCount++;
        
                if($prendaCount % 6 == 0) {
                    echo '</div>';
                    $filaCount++;
                    $prendaCount = 0;
                }
            }
        }
        
        if($prendaCount > 0 && $prendaCount < 6) {
            echo '</div>';
            $filaCount++;
        }
        
        if($filaCount == 0) {
            echo 'No hay prendas disponibles.';
        }

        mysqli_close($conn);
    ?>
</section>

   <section class="img-onvre-mujer">
      <a href="principal.php?catalogo=2&userid=<?php echo $id;?>">
         <div class="mujer">
            <img src="IMG/foto_moda.jpg" alt="">
            <div class="redirigir"><h2>Mujer</h2></div>
         </div>
      </a>
      <a href="principal.php?catalogo=1&userid=<?php echo $id;?>">
         <div class="onvre">
            <img src="IMG/foto_moda2.jpg" alt="">
            <div class="redirigir"><h2>Hombre</h2></div>
         </div>
      </a>
   </section>
</body>
</html>