<?php 
    include("connection.php");
    $code_prod = $_GET["code_prod"];
    $detail = $_POST["DETAIL"];
    $exitdocument = $_POST["EXITDOCUMENT"];
    $query = "CALL CREATEHISTORYPRODUCT('".$detail."', '".$exitdocument."', ".$code_prod.");";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Inventariado correctamente.'); window.location.href='../php/viewinventariedproduct.php?code_prod=$code_prod';</script>";
    } else {
        echo "<script>alert('Error al inventariar: " . mysqli_error($connection) . "'); window.location.href='../php/viewinventariedproduct.php?code_prod=$code_prod';</script>";
    }
?>