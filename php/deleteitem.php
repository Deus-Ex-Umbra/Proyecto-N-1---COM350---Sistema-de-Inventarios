<?php
    include("connection.php");
    $code_item = $_GET["code_item"];
    $code_prod = $_GET["code_prod"];
    $query = "DELETE FROM ITEM WHERE CODEITEM = ".$code_item.";";
    $result = mysqli_query($connection, $query);
?>