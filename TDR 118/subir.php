<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Prendas - Tienda de Ropa</title>
    <link rel="stylesheet" href="CSS/styHeader.css">
    <link rel="stylesheet" href="CSS/stySubir.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style>
        .titulo {
            background-image: none;
        }
    </style>
</head>

<body>
    <?php
    error_reporting(E_ALL & ~E_WARNING);
    error_reporting(0);
    if ($_GET['userid'] != '6') {
        header("location:index.php");
    }
    ?>
    <header>
        <h2>RM à la mode.</h2>
        <h3>le secret d'un grand style</h3>
        <hr class="logo_hr">
    </header>
    <section class="subirPrenda">
        <div class="titulo">
            <h2 id="tituloSubirPrenda">Subir nueva prenda</h2>
        </div>
        <form class="formSubir" action="#" method="POST" enctype="multipart/form-data">
            <div class="caja-form1">
                <input id="nombre" required type="text" maxlength="200" name="nombre" placeholder="Nombre">
                <div class="cajaPrecio">
                    <h3>$</h3><input id="precio" required type="number" maxlength="20" min="0.01" step="0.01"
                        name="precio" placeholder="0,00">
                </div>
            </div>
            <textarea id="descripcion" required maxlength="700" name="detalles" placeholder="Descripción del producto"></textarea>
            <div class="caja-form2">
                <input id="stock" required type="number" min="1" step="1" name="stock" placeholder="Stock">
                <input id="imagen" required type="file" accept=".jpg" name="imagen" onchange="mostrarPrevisualizacionImagen(event)">
                <select name="tipo" id="">
                    <option value="0">Unisex</option>
                    <option value="1">Caballero</option>
                    <option value="2">Dama</option>
                    <option value="3">Niños</option>
                </select>
                <select name="tipoEstacion" id="">
                    <option value="0">Todas las estaciones</option>
                    <option value="1">Invierno</option>
                    <option value="2">Primavera</option>
                    <option value="3">Verano</option>
                    <option value="4">Otoño</option>
                </select>
            </div>

            <input id="enviar" type="submit" value="Registrar" name="registrar">
        </form>
        <?php
        if (isset($_POST['registrar'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $detalles = $_POST['detalles'];
            $stock = $_POST['stock'];
            $tipoa = $_POST['tipo'];
            $tipob = $_POST['tipoEstacion'];

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

                $sql = "INSERT INTO prendas (nombre, precio, detalles, stock, imagen, tipo, tipo2) VALUES ('$nombre', $precio, '$detalles', $stock, '$imagen', '$tipoa', '$tipob')";

                $ejecutar = mysqli_query($conn, $sql);
                mysqli_close($conn);
            }
        }
        ?>
        <script>
            function mostrarPrevisualizacionImagen(event) {
                var input = event.target;
                var titulo = document.querySelector('.titulo');
                var tituloTexto = document.getElementById('tituloSubirPrenda');

                if (input.files && input.files[0]) {
                    var lector = new FileReader();

                    lector.onload = function (e) {
                        titulo.style.backgroundImage = "url('" + e.target.result + "')";
                        tituloTexto.style.display = 'none';
                    }
                    lector.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </section>
</body>

</html>
