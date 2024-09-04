<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
</head>
<body>
    <div class="contenedor">
        <div class="encabezado">
            <a href="./index.php">
            <div class="logo">
                <img src="multimedia/images/elements/logo.png" width="80px">
                <h1>FARMACIA</h1>
            </div>
            </a>
        </div>
        <div class="contenido">
            <div class="inventario" id="inventory">
            <?php
                include("./php/viewinventory.php");
            ?>
            <a href="./html/form_nuevo_inventario.html">
                <div class="contenido">
                    <div class="inventario" id="inventory">
                            <div class="nuevo">
                                <img src="multimedia/images/elements/agregar.png" width="250px">
                            </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
    </div>
    <script src="javascript/index.js"></script>
</body>
</html>