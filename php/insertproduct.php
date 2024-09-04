<?php
include("connection.php");
//INSERTPRODUCT(IN _NAMEPROD VARCHAR(128), IN _DESCRIPTIONPROD VARCHAR(256), IN _CODINV INT, IN _CODCAT INT, IN _CODSUP INT, IN _PHOTOPROD VARCHAR(512))
$code_inv = $_GET["code_inv"];
$name = $_POST["NAMEEPROD"];
$description = $_POST["DESCRIPTIONPROD"];
$category = (int)$_POST["CODCAT"];
$supplier = (int)$_POST["CODSUP"];
$query = "CALL INSERTPRODUCT('".$name."', '".$description."', ".$code_inv.", ".$category.", ".$supplier.", '');";
$result = mysqli_query($connection, $query);
if ($result) {
    echo "<script>alert('Producto agregado correctamente.'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
} else {
    echo "<script>alert('Error al agregar el producto: " . mysqli_error($connection) . "'); window.location.href='viewproduct.php?code_inv=".$code_inv."';</script>";
}
?>
