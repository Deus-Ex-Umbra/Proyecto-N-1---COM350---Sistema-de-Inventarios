<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Inventario</title>
</head>
<body>
    <div class="contenedor">
    <div class="encabezado">
        <a href="index.php">
        <div class="logo">
                <div class="bg">
                      <div class="logoPagina">
                          <img src="multimedia/images/elements/farmacia.png">
                          <h1>San Agustin</h1>
                      </div>
                </div>
                <div class="blob"></div>
            </div>
        </div>
        </a>
        <div class="contenido">
            <div class="inventario" id="inventory">
            <?php
                include("./php/connection.php");
                $query = "SELECT * FROM VIEWINVENTORY;";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $codeInv = $row["CODEINV"];
                    $expiredQuery = "SELECT GETQUANTITYITEMSEXPIRATESBYINVENTORY($codeInv) AS expiredCount;";
                    $expiredResult = mysqli_query($connection, $expiredQuery);
                    $expiredRow = mysqli_fetch_array($expiredResult);
                    $expiredCount = $expiredRow['expiredCount'];
                    echo "<div class='contenedor'>";
                    echo "<a href='php/viewproduct.php?code_inv=".$row["CODEINV"]."'>";
                    echo "<div class='tarjetas' id=".$row["CODEINV"]."'>";
                    echo "<div class='informacion'>";
                    echo "<img src='multimedia/images/inventories/" .$row['PHOTOINV'] ."' width='220px' height='420px'>";
                    echo "<h2>".$row['NAMEINV']."</h2>";
                    echo "<p>".$row['DESCRIPTIONINV']."</p>";
                    echo "<div class='ubicacion'>";
                    echo "<p> <strong> Ubicacion: </strong>".$row['UBICATIONINV']."</p>";
                    echo "</div>";
                    echo "<div class='detalles'>";
                    echo "<div class='cantidad'>";
                    echo "<strong>".$row['TOTALAMOUNT']."</strong>";
                    echo "<span>Articulos</span>";
                    echo "</div>";
                    echo "<div class='precio'>";
                    echo "<strong>".$row['TOTALVALUEINV']." Bs.</strong>";
                    echo "<span>Valor Total</span>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
                ?>

                <a href="./html/form_nuevo_inventario.html">
                <div class="contenido">
                    <div class="inventario" id="inventory">
                            <div class="nuevo" onclick="javascript:">
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