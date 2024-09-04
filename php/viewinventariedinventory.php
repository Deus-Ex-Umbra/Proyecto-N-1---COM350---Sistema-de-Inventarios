<?php
    include("connection.php");
    $code_inv = $_GET["code_inv"];
    $query = "SELECT * FROM HISTORYINVENTORYBYINVENTORY WHERE CODINV = $code_inv;";
    $result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Inventario</title>
</head>
<body>
    <div class="contenedor">
    <div class="encabezado">
        <a href="../">
        <div class="logo">
                <div class="bg">
                      <div class="logoPagina">
                          <img src="../multimedia/images/elements/farmacia.png">
                          <h1>San Agustin</h1>
                      </div>
                </div>
                <div class="blob"></div>
            </div>
        </div>
        </a>
        <div class="contenido">

<h2>Tarjeta de Control Físico y Valorado - PEPS</h2>
<table class="table">
    <thead class="cell">
        <tr class="row">
            <th class="cell" rowspan="2">Fecha</th>
            <th class="cell" rowspan="2">Detalle</th>
            <th class="cell" rowspan="2">Factura N. Salida</th>
            <th class="cell" colspan="3">Cantidad Física</th>
            <th class="cell" colspan="5">Costos</th>
        </tr>
        <tr class="row">
            <th class="cell">Entrada</th>
            <th class="cell">Salida</th>
            <th class="cell">Saldo</th>
            <th class="cell">C. Unit.</th>
            <th class="cell">Compra</th>
            <th class="cell">Débito</th>
            <th class="cell">Crédito</th>
            <th class="cell">Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_array($result)) {?>
                <tr class="row">
                    <td class="cell"><?php echo $row['DATEQUERY']; ?></td>
                    <td class="cell"><?php echo $row['DETAIL']; ?></td>
                    <td class="cell"><?php echo $row['EXITDOCUMENT']; ?></td>
                    <td class="cell"><?php echo $row['ENTRYAMOUNT']; ?></td>
                    <td class="cell"><?php echo $row['OUTPUTAMOUNT']; ?></td>
                    <td class="cell"><?php echo $row['BALANCEEO']; ?></td>
                    <td class="cell"><?php echo $row['DEBIT']; ?></td>
                    <td class="cell"><?php echo $row['CREDIT']; ?></td>
                    <td class="cell"><?php echo $row['BALANCEDC']; ?></td>
                </tr>
            <?php
            }
        ?>
    </tbody>
</table>
<a href="../php/form_inventariar_inventario.php?<?php echo "code_inv=".$code_inv;?>">
    <button class="inventariar">
        Inventariar Producto
    </button>
</a>
        </div>
    </div>
</body>
