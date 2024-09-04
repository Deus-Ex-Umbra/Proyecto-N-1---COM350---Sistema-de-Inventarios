<?php
    include("connection.php");
    $code_item = $_GET["code_item"];
    $code_inv = $_GET["code_inv"];
    $code_prod = $_GET["code_prod"];
    $lotnumber = $_POST["lotnumber"];
    $description = $_POST["description"];
    $observation = $_POST["observation"];
    $dateentry = $_POST["dateentry"];
    $dateexpiration = $_POST["dateexpiration"];
    $unitprice = $_POST["unitprice"];
    $query = "CALL UPDATEITEM(". $code_item .", ". $lotnumber .", '". $description ."', '". $observation ."', '". $dateentry ."', '". $dateexpiration ."', ". $unitprice .", ". $code_prod .");";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Item actualizado correctamente.'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
    } else {
        echo "<script>alert('Error al actualizar item: " . mysqli_error($connection) . "'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
    }
?>