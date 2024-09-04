<?php
    include("connection.php");
    $quantity = $_GET["new_amount"];
    $code_item = $_GET["code_item"];
    $code_inv = $_GET["code_inv"];
    $query = "CALL UPDATEQUANTITYITEM(".$code_item.", ".$quantity.");";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Cantidad actualizada correctamente.'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
    } else {
        echo "<script>alert('Error al actualizar la cantidad del item: " . mysqli_error($connection) . "'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
    }
?>