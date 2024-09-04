<?php
include("connection.php");
$code_prod = $_GET["code_prod"];
$code_inv = $_GET["code_inv"];
$query = "SELECT * FROM ITEMBYPRODUCT WHERE CODPROD = " . $code_prod . ";";
$queryexpirated = "CALL GETALLIDEXPIRATEDITEMSBYPRODUCT(" . $code_prod . ");";
$result = mysqli_query($connection, $query);
$resultexpirated = mysqli_query($connection, $queryexpirated);
$expirated = array();
if (mysqli_num_rows($resultexpirated) != 0) {
    while ($row = mysqli_fetch_array($resultexpirated)) {
        array_push($expirated, $row["CODEITEM"]);
    }
}
?>
<?php if (count($expirated) > 0): ?>
    <h3 style='color: #ffcccb;'>Hay <?php echo count($expirated); ?> items expirados</h3>
<?php endif; ?>
<!--<form action="searchitem.php" method="post">
    <input type="hidden" name="code_prod" value="<?php echo $code_prod; ?>">
    <input type="hidden" name="code_inv" value="<?php echo $code_inv; ?>">
    <select name="column">
        <?php 
            //$querycolumns = "CALL GETALLCOLUMNSNAME('ITEM');"; 
            //try {
            //    $connectionaux = new mysqli("localhost", "root", "", "DBINVENTORIES");
            //} catch(Exception $_ex) {
            //    echo "Error: " . $connectionaux->connect_error;
            //}
            //$resultcolumns = mysqli_query($connectionaux, $querycolumns);
            //if ($resultcolumns && mysqli_num_rows($resultcolumns) != 0) {
            //    while ($row = mysqli_fetch_array($resultcolumns)) {
            //        $column_name = $row["COLUMN_NAME"];
        ?>
            <option value="<?php echo htmlspecialchars($column_name); ?>"><?php echo htmlspecialchars($column_name); ?></option>
        <?php 
            //    }
            //}
            //$connectionaux->close();
        ?>
    </select>
    <input type="text" name="search" placeholder="Texto a buscar">
    <button type="submit">Buscar</button>
</form>!-->
<table>
    <thead>
        <tr>
            <th>Número de Lote</th>
            <th>Descripción</th>
            <th>Observación</th>
            <th>Fecha de Entrada</th>
            <th>Fecha de Expiración</th>
            <th>Cantidad</th>
            <th>Valor Total</th>
            <th>Precio Unitario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($result)): ?>
            <?php
            $is_expirated = in_array($row["CODEITEM"], $expirated);
            $originalAmount = $row["TOTALAMOUNT"];
            ?>
            <tr class='item' id='item<?php echo $row["CODEITEM"]; ?>' style='background-color: <?php echo $is_expirated ? '#ffcccb' : 'transparent'; ?>;'>
                <td><?php echo $row["LOTNUMBER"]; ?></td>
                <td><?php echo $row["DESCRIPTIONITEM"]; ?></td>
                <td><?php echo $row["OBSERVATION"]; ?></td>
                <td><?php echo $row["DATEENTRY"]; ?></td>
                <td><?php echo $row["DATEEXPIRATION"]; ?></td>
                <td class='total-amount' data-codeitem='<?php echo $row["CODEITEM"]; ?>' data-original-amount='<?php echo $originalAmount; ?>'>
                    <div class='modify-buttons'>
                        <button class='decrement' onclick='decrementAmount(this)'>-</button>
                        <span class='amount-value'><?php echo $originalAmount; ?></span>
                        <button class='increment' onclick='incrementAmount(this)'>+</button>
                    </div>
                    <div class='confirm-buttons' style='display:none;'>
                        <button class='cancel' onclick='cancelChange(this)'>✖</button>
                        <button class='confirm' onclick='confirmChange(this, "<?php echo $row["CODEITEM"]; ?>" , "<?php echo $code_inv; ?>")'>✔</button>
                    </div>
                </td>
                <td><?php echo $row["TOTALVALUE"]; ?></td>
                <td><?php echo $row["UNITPRICE"]; ?></td>
                <td>
                    <a href='form_modificar_item.php?code_prod=<?php echo $code_prod; ?>&code_item=<?php echo $row["CODEITEM"]; ?>&code_inv=<?php echo $code_inv; ?>'><button style='background-color: blue; font-family: Arial, sans-serif; color: white'><img src='../multimedia/images/elements/edit.svg' alt='Editar' width='20' height='20'>Editar</button></a>
                    <a href='deleteitem.php?code_item=<?php echo $row["CODEITEM"]; ?>&code_inv=<?php echo $code_inv; ?>'><button style='background-color: red; font-family: Arial, sans-serif; color: white'><img src='../multimedia/images/elements/trash.svg' alt='Eliminar' width='20' height='20'>Eliminar</button></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>