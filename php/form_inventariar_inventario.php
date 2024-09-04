<?php
    include("connection.php");
    $code_inv = $_GET["code_inv"];
?>

<form action="../php/insertinventariedinventory.php<?php echo "?code_inv=".$code_inv; ?>" method="POST">
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