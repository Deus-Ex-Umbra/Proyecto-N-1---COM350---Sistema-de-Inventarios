<?php
    include("connection.php");
    $code_inv = $_GET["code_inv"];
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
    <title>Document</title>
</head>
<body>
    <div class="inv">
    <form class="form_inv" action="../php/insertinventariedinventory.php<?php echo "?code_inv=".$code_inv; ?>" method="POST">
    <p class="heading">Formulario para Inventariar</p>
    <div class="form-group">
        <label for="DETAIL"></label>
        <input class="input" placeholder="Detalles" type="text" id="DETAIL" name="DETAIL">
    </div>
    <div class="form-group">
        <label for="EXITDOCUMENT"></label>
        <input class="input" placeholder="Documento de Salida" type="text" id="EXITDOCUMENT" name="EXITDOCUMENT">
    </div>
    <button class="btn" type="submit">Inventariar</button>
</form>
    </div>
</body>
</html>