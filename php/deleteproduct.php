<?php 
    include("connection.php");
    $code_prod = $_GET["code_prod"];
    $query = "CALL DELETEPRODUCT($code_prod);";
    $result = mysqli_query($connection, $query); 
?>