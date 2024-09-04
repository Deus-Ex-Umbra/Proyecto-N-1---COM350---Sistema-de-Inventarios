<?php
    include("connection.php");
    $code_inv = $_GET["code_inv"];
    $query = "SELECT * FROM HISTORYINVENTORYBYINVENTORY WHERE CODINV = $code_inv;";
    $result = mysqli_query($connection, $query);
?>
<h2>Tarjeta de Control Físico y Valorado - PEPS</h2>

<table>
    <thead>
        <tr>
            <th rowspan="2">Fecha</th>
            <th rowspan="2">Detalle</th>
            <th rowspan="2">Factura N. Salida</th>
            <th colspan="3">Cantidad Física</th>
            <th colspan="4">Costos</th>
        </tr>
        <tr>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Saldo</th>
            <th>Débito</th>
            <th>Crédito</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while ($row = mysqli_fetch_array($result)) {?>
                <tr>
                    <td><?php echo $row["DATEQUERY"];?></td>
                    <td><?php echo $row["DETAIL"];?></td>
                    <td><?php echo $row["EXITDOCUMENT"];?></td>
                    <td><?php echo $row["ENTRYAMOUNT"];?></td>
                    <td><?php echo $row["OUTPUTAMOUNT"];?></td>
                    <td><?php echo $row["BALANCEEO"];?></td>
                    <td><?php echo $row["DEBIT"];?></td>
                    <td><?php echo $row["CREDIT"];?></td>
                    <td><?php echo $row["BALANCEDC"];?></td>
                </tr>
            <?php
            }
        ?>
    </tbody>
</table>
<a href="../php/form_inventariar_inventario.php?<?php echo "code_inv=".$code_inv;?>">
    <button>
        Inventariar Producto
    </button>
</a>
