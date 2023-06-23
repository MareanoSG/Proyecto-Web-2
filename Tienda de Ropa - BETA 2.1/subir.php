<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Prendas - Tienda de Ropa</title>
    <link rel="stylesheet" href="css/stylesHeader.css">
    <link rel="stylesheet" href="css/styleSubir.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h2>RM à la mode.</h2>
        <h3>le secret d'un grand style</h3>
        <hr class="logo_hr">
    </header>
    <section class="subirPrenda">
        <div class="titulo">
            <h2>Subir nueva prenda</h2>
        </div>
        <form class="formSubir" action="#" method="POST" enctype="multipart/form-data">
            <div class="caja-form1">
                <input id="nombre" required type="text" maxlength="200" name="nombre" placeholder="Nombre">
                <div class="cajaPrecio">
                    <h3>$</h3><input id="precio" required type="number" maxlength="20" min="0.01" step="0.01"
                        name="precio" placeholder="0,00">
                </div>
            </div>
            <textarea id="descripcion" required maxlength="1000" name="detalles"
                placeholder="Descripción del producto"></textarea>

            <div class="caja-form2">
                <input id="stock" required type="number" min="1" step="1" name="stock" placeholder="Stock">
                <input id="imagen" required type="file" name="imagen">
            </div>

            <input id="enviar" type="submit" value="Registrar" name="registrar">
        </form>
        <?php
        if (isset($_POST['registrar'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $detalles = $_POST['detalles'];
            $stock = $_POST['stock'];

            $imagen = $_FILES['imagen']['name'];
            $imagen_tmp = $_FILES['imagen']['tmp_name'];

            $imagen = 'IMG/' . $imagen;

            if (move_uploaded_file($imagen_tmp, $imagen)) {
                $conn = mysqli_connect("localhost", "root", "", "tienda_de_ropa");
                if (!$conn) {
                    die("Conexión fallida: " . mysqli_connect_error());
                }

                $nombre = mysqli_real_escape_string($conn, $nombre);
                $detalles = mysqli_real_escape_string($conn, $detalles);

                $sql = "INSERT INTO prendas (nombre, precio, detalles, stock, imagen) VALUES ('$nombre', $precio, '$detalles', $stock, '$imagen')";

                $ejecutar = mysqli_query($conn, $sql);
                mysqli_close($conn);
            }
        }
        ?>
    </section>
</body>

</html>
