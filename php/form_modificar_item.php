<?php
    $code_prod = $_GET["code_prod"];
    $code_item = $_GET["code_item"];
    $code_inv = $_GET["code_inv"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Ítem</title>
</head>
<body>
    <div class="form-container">
        <h2>Modificar Ítem</h2>
        <form action="../php/updateitem.php?<?php echo "code_prod=".$code_prod."&code_item=".$code_item."&code_inv=".$code_inv; ?>" method="POST">    
            <label for="lotnumber">Número de Lote:</label>
            <input type="number" id="lotnumber" name="lotnumber" required>
            <label for="description">Descripción del Ítem:</label>
            <input type="text" id="description" name="description" required>
            <label for="observation">Observación:</label>
            <input type="text" id="observation" name="observation">
            <label for="dateentry">Fecha de Entrada:</label>
            <input type="date" id="dateentry" name="dateentry" required>
            <label for="dateexpiration">Fecha de Expiración:</label>
            <input type="date" id="dateexpiration" name="dateexpiration" required>    
            <label for="unitprice">Precio Unitario:</label>
            <input type="number" id="unitprice" name="unitprice" required>
            <button type="submit">Modificar Ítem</button>
        </form>
    </div>
</body>
</html>