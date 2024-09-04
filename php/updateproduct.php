<?php 
    include("connection.php");
    $code_prod = $_GET["code_prod"];
    $code_inv = $_GET["code_inv"];
    $name = $_POST["NAMEEPROD"];
    $description = $_POST["DESCRIPTIONPROD"];
    $category = $_POST["CODCAT"];
    $supplier = $_POST["CODSUP"];
    $query = "CALL UPDATEPRODUCT(". $code_prod .", '". $name ."', '". $description ."', ". $code_inv .", ". $category .", ". $supplier .", '');";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Producto agregado correctamente.'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
    } else {
        echo "<script>alert('Error al agregar el producto: " . mysqli_error($connection) . "'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
    }
?>