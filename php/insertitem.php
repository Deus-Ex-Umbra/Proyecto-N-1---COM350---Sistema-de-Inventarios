<?php
    include("connection.php");
    $code_prod = $_GET["code_prod"];
    $code_inv = $_GET["code_inv"];
    $lotnumber = $_POST["lotnumber"];
    $description = $_POST["description"];
    $observation = $_POST["observation"];
    $dateentry = $_POST["dateentry"];
    $dateexpiration = $_POST["dateexpiration"];
    $unitprice = $_POST["unitprice"];
    $query = "CALL INSERTITEM(".$lotnumber.", '".$description."', '".$observation."', '".$dateentry."', '".$dateexpiration."', ".$unitprice.", ".$code_prod.");";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Cantidad actualizada correctamente.'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
    } else {
        echo "<script>alert('Error al actualizar la cantidad del item: " . mysqli_error($connection) . "'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
    }
?>