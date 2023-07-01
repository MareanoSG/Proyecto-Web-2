<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RM à la mode</title>
	<link rel="stylesheet" href="CSS/stHeader.css">
	<link rel="stylesheet" href="CSS/stProducto2.css">
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
        $idPrenda = $_GET['prodid'];

        $conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
        if(!$conn) {
            die("Conexión fallida: ".mysqli_connect_error());
        }

        $sql = 'SELECT nombre, imagen, detalles, precio, stock FROM prendas WHERE id_prenda = '.$idPrenda;
        $ejecutar = mysqli_query($conn, $sql);
        $datos = mysqli_fetch_array($ejecutar);
        $nombrePrenda = $datos['nombre'];
        if($nombrePrenda == null ) header('location:principal.php?userid='.$id);
        $imgPrenda = $datos['imagen'];
        $detallesPrenda = $datos['detalles'];
        $precioPrenda = $datos['precio'];
        $stockPrenda = $datos['stock'];


        mysqli_close($conn);
    ?>

	<header>
		<h2>RM à la mode.</h2>
		<h3>le secret d'un grand style</h3>
        <nav>
            <a href="principal.php?userid=<?php echo $id;?>">Principal</a>
            <a href="principal.php?catalogo=1&userid=<?php echo $id;?>">Caballeros</a>
            <a href="principal.php?catalogo=2&userid=<?php echo $id;?>">Damas</a>
            <a href="principal.php?catalogo=3&userid=<?php echo $id;?>">Niños</a>
        </nav>
    </header>
    <div class="cajaProducto">
        <section class="infoProducto">
            <div class="cajaProducto_img" style="background-image: url('<?php echo $imgPrenda; ?>')"></div>
            <div class="cajaProducto_info">
                <h3><?php echo $nombrePrenda; ?></h3>
                <h4><?php echo $detallesPrenda; ?></h4>
                <hr>
                <form class="cajaComprar" action="producto.php?userid=<?php echo $id; ?>&prodid=<?php echo $idPrenda;?>" method="POST">
                    <h5>$<?php echo $precioPrenda; ?></h5>
                    <input type="number" name="cantidad" value=1 min="1" max="<?php echo $stockPrenda; ?>">
                    <input type="submit" name="comprar" value="COMPRAR">
                </form>
            </div>
        </section>
    </div>
    <?php
        if(isset($_POST['comprar'])){
            $subtotal = $_POST['cantidad'] * $precioPrenda;
            $iva = $subtotal * 0.21;
            $total = $subtotal + $iva + 150;
            $fechaActual = date('Y-m-d H:i:s e');
            ?>
            <style>
                .cajaProducto{
                    display: none;
                }
            </style>

            <div class="ticket">
                <h1>Compra realizada</h1>
                <div>
                    <h2>x<?php echo $_POST['cantidad']." ".$nombrePrenda; ?>:</h2>  <h2>$<?php echo number_format($subtotal, 2, ',', '.'); ?></h2>
                </div>
                <div class="subtotal">
                    <h2>Subtotal:</h2>  <h2>$<?php echo number_format($subtotal, 2, ',', '.'); ?></h2>
                </div>
                <div class="iva">
                    <h2>IVA (+21,00%):</h2>  <h2>$<?php echo number_format($iva, 2, ',', '.'); ?></h2>
                </div>
                <div class="costoenvio">
                    <h2>C. Envio:</h2>  <h2>$150,00</h2>
                </div>
                <div class="total">
                    <h2>Total:</h2> <h2>$<?php echo number_format($total, 2, ',', '.'); ?></h2>
                </div>
            </div>
            <?php
            
            $conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
            if (!$conn) {
                die("Conexión fallida: " . mysqli_connect_error());
            }
            
            $cant = $_POST['cantidad'];
            $fechaActual = date('Y-m-d H:i:s e');
            
            $sqlInsert = "INSERT INTO compras (id_prenda, id_comprador, cantidad, total, fecha) VALUES ('$idPrenda', '$id', '$cant', '$total', '$fechaActual')";
            
            if (mysqli_query($conn, $sqlInsert)) {
                $sqlUpdate = "UPDATE prendas SET stock = stock - '$cant' WHERE id_prenda = '$idPrenda'";
                if (mysqli_query($conn, $sqlUpdate)) {
                    
                } else {
                    
                }
            } else {
                
            }
            
            mysqli_close($conn);
        }
        ?>

</body>
</html>