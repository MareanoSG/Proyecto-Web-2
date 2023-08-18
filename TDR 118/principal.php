<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM à la mode</title>
    <link rel="stylesheet" href="CSS/styHeader.css">
    <link rel="stylesheet" href="CSS/styAdmin.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <?php
		error_reporting(E_ALL & ~E_WARNING);
		error_reporting(0);
        $id = $_GET['userid'];

        if($_GET['catalogo'] == '1') $catName = 'Caballeros';
        else if($_GET['catalogo'] == '2') $catName = 'Damas';
        else if($_GET['catalogo'] == '3') $catName = 'Niños';
        else  $catName = 'General';

    ?>
    <div class="caja_filtros">
        <section class="menu_filtros">
            <form action="#" method="POST">
                <h2><p>Filtros.</p><a href="#" onclick="removeFilter()">×</a></h2>

                <h5>Tipo de Prendas</h5>

                <select name="tipo1" id="">
                    <option value="0">Todo</option>
                    <option value="1">Invierno</option>
                    <option value="2">Primavera</option>
                    <option value="3">Verano</option>
                    <option value="4">Otoño</option>
                </select>
                <select name="tipo2" id="">
                    <option value="0">Unisex</option>
                    <option value="1">Caballero</option>
                    <option value="2">Dama</option>
                    <option value="3">Niños</option>
                </select>

                <div id="precio1">
                    <h5>Desde ($)</h5>
                    <input type="number" name="precioMin" placeholder="Precio mínimo" value="1" min=0.01 step=0.01>
                </div>
                <div id="precio2">
                    <h5>Hasta ($)</h5>
                    <input type="number" name="precioMax" placeholder="Precio máximo" value="1000000" min=0.01 step=0.01>
                </div>
                <input type="submit" value="FILTRAR" name=filtrar>
                <?php
                    if(isset($_POST['filtrar'])){
                        header("location:principal.php?userid=".$id."&filter=1&catalogo=".$_POST['tipo2']."&tipo=".$_POST['tipo1']."&min=".$_POST['precioMin']."&max=".$_POST['precioMax']);
                    }
                ?>
            </form>
        </section>
    </div>
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
        <form action="#" method="POST">
            <input type="search" name="busqueda" placeholder="Buscar en <?php echo $catName; ?>..." required>
            <!--<a href="#" onclick="showFilter()">Filtrar</a>-->
            <input type="submit" name="enviarBusqueda">
        </form>
        <?php 
            $filtroBusqueda = '';
            $buscar = true;
            if(isset($_POST['enviarBusqueda'])){
                $filtroBusqueda = $_POST['busqueda'];
            }
        ?>
        <?php
            if($_GET['catalogo'] == '1') echo '<video src="IMG/video_moda_1.mp4" autoplay="autoplay" muted="muted" loop="loop">';
            else if($_GET['catalogo'] == '2') echo '<video src="IMG/video_moda_2.mp4" autoplay="autoplay" muted="muted" loop="loop">';
            else if($_GET['catalogo'] == '3') echo '<video src="IMG/video_moda_3.mp4" autoplay="autoplay" muted="muted" loop="loop">';
            else echo '<video src="IMG/video_moda.mp4" autoplay="autoplay" muted="muted" loop="loop">';
        ?>
      	<video src="IMG/video_moda_2.mp4" autoplay="autoplay" muted="muted" loop="loop">

      	<!-- <a href="#">
      	   <video src="IMG/video_moda2.mp4" autoplay="autoplay" muted="muted" loop="loop">
      	</a> -->
   </section>

   <section class="catalogoGeneral">
    <?php
        $conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
        if(!$conn) {
            die("Conexión fallida: ".mysqli_connect_error());
        }

        $sql = "SELECT nombre, precio, imagen, id_prenda, stock FROM prendas";
        if (isset($_GET['filter']) && $_GET['filter'] == '1') {
            $tipo1 = $_GET['catalogo'];
            $tipo2 = $_GET['tipo'];
            $precioMin = (int)$_GET['min'];
            $precioMax = (int)$_GET['max'];
            $sql = "SELECT nombre, precio, imagen, detalles, id_prenda, stock FROM prendas WHERE tipo = '$tipo1' AND tipo2 = '$tipo2' AND precio >= '$precioMin' AND precio <= '$precioMax'";
        } else {
            if ($_GET['catalogo'] == '1'){
                if($filtroBusqueda != ''){
                    $sql = "SELECT nombre, precio, imagen, id_prenda, stock FROM prendas WHERE tipo = '1' AND nombre = '$filtroBusqueda'";
                }
                else{
                    $sql = "SELECT nombre, precio, imagen, id_prenda, stock FROM prendas WHERE tipo = '1'";
                }
            }
            if ($_GET['catalogo'] == '2'){
                if($filtroBusqueda != ''){
                    $sql = "SELECT nombre, precio, imagen, id_prenda, stock FROM prendas WHERE tipo = '2' AND nombre = '$filtroBusqueda'";
                }
                else{
                    $sql = "SELECT nombre, precio, imagen, id_prenda, stock FROM prendas WHERE tipo = '2'";
                }
            }
            if ($_GET['catalogo'] == '3'){
                if($filtroBusqueda != ''){
                    $sql = "SELECT nombre, precio, imagen, id_prenda, stock FROM prendas WHERE tipo = '3' AND nombre = '$filtroBusqueda'";
                }
                else{
                    $sql = "SELECT nombre, precio, imagen, id_prenda, stock FROM prendas WHERE tipo = '3'";
                }
            }
        }
        $ejecutar = mysqli_query($conn, $sql);
        
        $prendaCount = 0;
        $filaCount = 0;
        
        if(mysqli_num_rows($ejecutar) > 0) {
            while($datos = mysqli_fetch_array($ejecutar)) {
                $imgPrenda = $datos['imagen'];
                $nombrePrenda = $datos['nombre']; 
                $precioPrenda = $datos['precio']; 
                $idPrenda = $datos['id_prenda']; 
                $stockPrenda = $datos['stock']; 
                
                if($prendaCount == 0) {
                    echo '<div class="filaPrendas">';
                }

                $linkPrenda = '';
                $disponible = false;
                
                if($stockPrenda >= '1'){
                    $linkPrenda = 'producto.php?userid='.$id.'&prodid='.$idPrenda;
                    $disponible = true;
                }
                ?>
                <a href="<?php echo $linkPrenda;?>" class="prenda">
                    <div class="imgPrenda" style="background-image: url('<?php echo $imgPrenda; ?>')">
                        
                    </div>
                    <div class="detallePrenda">
                        <h2><?php echo $nombrePrenda; ?></h2>
                        <?php
                            if($disponible == true){
                                echo '<h3>$'.number_format($precioPrenda, 2, ',', '.').'</h3>';
                            }
                            else if($disponible == false){
                                echo '<h3 style="color: red">AGOTADO</h3>';
                            }
                        ?>
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
             <?php
                if($_GET['catalogo'] == '2') echo '<img src="IMG/foto_moda3.jpg" alt=""/>';
                else echo '<img src="IMG/foto_moda.jpg" alt=""/>';
            ?>
            <div class="redirigir">
                <h2>
                    <?php
                     if($_GET['catalogo'] == '2') echo 'Niño';
                     else echo 'Mujer';
                   ?>
                </h2>
            </div>
         </div>
      </a>
      <a href="principal.php?catalogo=1&userid=<?php echo $id;?>">
         <div class="onvre">
            <?php
                if($_GET['catalogo'] == '1') echo '<img src="IMG/foto_moda3.jpg" alt=""/>';
                else echo '<img src="IMG/foto_moda2.jpg" alt=""/>';
            ?>
            <div class="redirigir">
                <h2>
                    <?php
                     if($_GET['catalogo'] == '1') echo 'Niño/a';
                     else echo 'Hombre';
                   ?>
                </h2>
            </div>
         </div>
      </a>
   </section>
    <script src="JS/filtros.js"></script>
</body>
</html>