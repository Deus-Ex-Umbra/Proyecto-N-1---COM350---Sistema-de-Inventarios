<?php 
    include("connection.php");
    $code_inv = $_GET["code_inv"];
    $detail = $_POST["DETAIL"];
    $exitdocument = $_POST["EXITDOCUMENT"];
    $query = "CALL CREATEHISTORYINVENTORY('".$detail."', '".$exitdocument."', ".$code_inv.");";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Inventariado correctamente.'); window.location.href='../php/viewinventariedinventory.php?code_inv=$code_inv';</script>";
    } else {
        echo "<script>alert('Error al inventariar: " . mysqli_error($connection) . "'); window.location.href='../php/viewinventariedinventory.php?code_inv=$code_inv';</script>";
    }
?>