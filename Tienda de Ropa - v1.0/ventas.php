<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historial de Ventas - Tienda de Ropa</title>
  <link rel="stylesheet" href="CSS/stHeader.css">
  <link rel="stylesheet" href="CSS/stCompras.css">
  <link rel="stylesheet" href="CSS/stVentas.css">
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
    <a id="botonBajar" href="#irAbajo">Ir abajo</a>
    <header>
        <h2>RM à la mode.</h2>
        <h3>le secret d'un grand style</h3>
        <hr class="logo_hr">
    </header>
    <section class="cajaCompras">
        <div class="titulo">
            <h1 id="tituloHistorial">Historial de ventas</h1>
            <hr id="lineaTitulo">
        </div>

        <?php
          $totalVentas = 0.00;

          $conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
          if (!$conn) die("Conexión fallida: " . mysqli_connect_error());

          $sql = "SELECT MIN(id_compra) as min, MAX(id_compra) as max FROM compras;";
          $ejecutar = mysqli_query($conn, $sql);
          $datos = mysqli_fetch_array($ejecutar);
          $min = $datos['min'];
          $max = $datos['max'];

          $sql = 
          "SELECT compras.id_compra, compras.id_prenda, compras.id_comprador, 
          compras.cantidad, compras.total, compras.fecha, prendas.nombre, 
          prendas.imagen, cuentas.nombre AS nombreUsuario FROM compras
          JOIN prendas ON compras.id_prenda = prendas.id_prenda
          JOIN cuentas ON compras.id_comprador = cuentas.user_id;";

          $ejecutar = mysqli_query($conn, $sql);

        if (mysqli_num_rows($ejecutar) > 0) {
          while ($datos = mysqli_fetch_array($ejecutar)) {
              $totalVentas += $datos['total'];
              ?>
              <article class="cajaPrenda">
                <div class="prendaMonto">
                  <h3><?php echo '+$'.$datos['total']; ?></h3>
                </div>
                <div class="prendaInfo">
                  <h4><?php echo "Vendido el ".$datos['fecha']." a ".$datos['nombreUsuario']; ?></h4>
                  <h2><?php echo 'x'.$datos['cantidad']." ".$datos['nombre']; ?></h2>
                </div>
                <div class="prendaIMG" style="background-image: url('<?php echo $datos['imagen']; ?>');">
                </div>
              </article>
            <?php
          }
        } 
        else echo '<h5>No se han encontrado ventas.</h5>';

        mysqli_close($conn);
      ?>
      <article class="cajaPrenda">
        <div class="prendaMonto">
          <h3><?php echo '$'.$totalVentas; ?></h3>
        </div>
        <div class="prendaInfo">
          <h2 id="total">Total recaudado en ventas</h2>
        </div>
      </article>

      <div id="irAbajo"></div>
    </section>
</body>

</html>
