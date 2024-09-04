<?php
    include("connection.php");
    $code_prod = $_GET["code_prod"];
?>

<form action="../php/insertinventariedproduct.php<?php echo "?code_prod=".$code_prod; ?>" method="POST">
    <div class="form-group">
        <label for="DETAIL">Detalle</label>
        <input type="text" class="form-control" id="DETAIL" name="DETAIL" required>
    </div>
    <div class="form-group">
        <label for="EXITDOCUMENT">Documento de Salida</label>
        <input type="text" class="form-control" id="EXITDOCUMENT" name="EXITDOCUMENT" required>
    </div>
    <button type="submit" class="btn btn-primary">Inventariar</button>
</form>