<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historial - Tienda de Ropa</title>
  <link rel="stylesheet" href="CSS/stHeader.css">
  <link rel="stylesheet" href="CSS/stStock.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>

<body>
    <?php
		error_reporting(E_ALL & ~E_WARNING);
		error_reporting(0);
        if($_GET['userid'] != '6'){
            header("location:index.php");
        }
    ?>
    <header>
        <h2>RM à la mode.</h2>
        <h3>le secret d'un grand style</h3>
        <hr class="logo_hr">
    </header>
    <section class="contStock">
        <div class="titulo">
            <h1 id="tituloStock">Stock de Productos</h1>
            <hr id="lineaTitulo">
        </div>

        <?php
            $totalStock = 0;

            $conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
            if (!$conn) die("Conexión fallida: " . mysqli_connect_error());

            $sql = "SELECT imagen, nombre, stock FROM prendas";
            $ejecutar = mysqli_query($conn, $sql);

            if (mysqli_num_rows($ejecutar) > 0) {
                while ($datos = mysqli_fetch_array($ejecutar)) {
                    $totalStock += $datos['stock'];
                    ?>
                    <article class="cajaStock">
                        <div class="prendaCantStock">
                            <h3><?php echo 'x'.$datos['stock']; ?></h3>
                        </div>
                        <div class="prendaStockInfo">
                            <h4><?php echo $datos['nombre']; ?></h4>
                        </div>
                        <div class="prendaStockIMG" style="background-image: url('<?php echo $datos['imagen']; ?>');"></div>
                    </article>
                    <?php
                }
            } 
            mysqli_close($conn);
        ?>
        <article class="cajaStock">
            <div class="prendaStockTotal" #id="totalStock">
                <h2 id="total">Stock total: <?php echo $totalStock; ?> productos</h2>
            </div>
        </article>
    </section>
</body>

</html>
