<?php
    include("connection.php");
    $code_inv = $_GET["code_inv"];
    $query = "CALL DELETEINVENTORY(".$code_inv.");";
    $result = mysqli_query($connection, $query);
?>