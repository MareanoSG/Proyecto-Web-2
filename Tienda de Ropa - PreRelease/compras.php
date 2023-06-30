<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras- Tienda de Ropa</title>
    <link rel="stylesheet" href="CSS/stHeader.css">
    <link rel="stylesheet" href="CSS/stCompras.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>
    <a id="botonBajar" href="#irAbajo">Ir abajo</a>
    <header>
        <h2>RM à la mode.</h2>
        <h3>le secret d'un grand style</h3>
        <hr class="logo_hr">
    </header>
    <section class="cajaCompras">
        <div class="titulo">
            <h1 id="tituloHistorial">Historial de compras</h1>
            <hr id="lineaTitulo">
        </div>
        <?php
            $user_ID = $_GET['userid'];
            if($user_ID == 0){
                header("location:index.php");
            }
            
            $conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
            if (!$conn) {
                die("Conexión fallida: " . mysqli_connect_error());
            }
            
            $sql = "SELECT MIN(id_compra) as min, MAX(id_compra) as max FROM compras;";
            $ejecutar = mysqli_query($conn, $sql);
            $datos = mysqli_fetch_array($ejecutar);
            $min = $datos['min'];
            $max = $datos['max'];

            $sql = "SELECT c.id_compra, c.cantidad, c.total, c.fecha, p.nombre, p.imagen 
                    FROM compras c 
                    INNER JOIN prendas p ON c.id_prenda = p.id_prenda 
                    WHERE c.id_compra BETWEEN $min AND $max AND c.id_comprador = '$user_ID';";
            $ejecutar = mysqli_query($conn, $sql);

            if (mysqli_num_rows($ejecutar) > 0) {
                while ($datos = mysqli_fetch_array($ejecutar)) {
                    $imgPrenda = $datos['imagen'];
                    $nombrePrenda = $datos['nombre']; 
                    ?>
                    <article class="cajaPrenda">
                        <div class="prendaInfo">
                            <h4><?php echo $datos['fecha']; ?></h4>
                            <h2><?php echo 'x'.$datos['cantidad']." ".$nombrePrenda; ?></h2>
                            <h3><?php echo '$'.$datos['total']; ?></h3> 
                        </div>
                        <div class="prendaIMG" style="background-image: url('<?php echo $imgPrenda; ?>');">
                        </div>
                    </article>
                <?php
                }
            } else {
                echo '<h5>No has hecho compras aún.</h5>';
            }
            mysqli_close($conn);
        ?>
        <div id="irAbajo"></div>
    </section>
</body>
</html>
