<?php
    include("connection.php");
    $name = $_POST["NAMEINV"];
    $description = $_POST["DESCRIPTIONINV"];
    $ubication = $_POST["UBICATIONINV"];
    $photo = $_FILES["PHOTOINV"];
    if ($photo["error"] > 0) {
        echo "Error: " . $photo["error"] . "<br>";
    } else {
        move_uploaded_file($photo["tmp_name"], "../multimedia/images/inventories/" . $photo["name"]);
        $query = "CALL INSERTINVENTORY('".$name."', '".$description."', '".$ubication."', '".$photo["name"]."');";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo "<script>alert('Inventario agregado exitosamente');</script>";
            echo "<script>window.location.href = '../index.php';</script>";
        } else {
            echo "<script>alert('Error al agregar el inventario');</script>";
            echo "<script>window.location.href = '../index.php';</script>";
        }
    }
?>