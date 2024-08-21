<?php
    include("connection.php");
    $code_prod = $_GET["code_prod"];
    $query = "SELECT * FROM ITEMBYPRODUCT WHERE CODPROD = ".$code_prod.";";
    $queryexpirated = "CALL GETALLIDEXPIRATEDITEMSBYPRODUCT(".$code_prod.");";
    $result = mysqli_query($connection, $query);
    $resultexpirated = mysqli_query($connection, $queryexpirated);
    $expirated = array();
    if (mysqli_num_rows($resultexpirated) != 0) {
        while($row = mysqli_fetch_array($resultexpirated)) {
            array_push($expirated, $row["CODEITEM"]);
        }
    }

    if (count($expirated) > 0) {
        echo "<h3 style='color: #ffcccb;'>Hay ".count($expirated)." items expirados</h3>";
    }
    echo "<table>";
    echo "<tr>";
    echo "<th>Número de Lote</th>";
    echo "<th>Descripción</th>";
    echo "<th>Observación</th>";
    echo "<th>Fecha de Entrada</th>";
    echo "<th>Fecha de Expiración</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Valor Total</th>";
    echo "<th>Precio Unitario</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($result)) {
        if(in_array($row["CODEITEM"], $expirated)) {
            echo "<tr class='item' id='item".$row["CODEITEM"]."' style='background-color: #ffcccb;'>";
        } else {
            echo "<tr class='item' id='item".$row["CODEITEM"]."'>";
        }
        echo "<td>".$row["LOTNUMBER"]."</td>";
        echo "<td>".$row["DESCRIPTIONITEM"]."</td>";
        echo "<td>".$row["OBSERVATION"]."</td>";
        echo "<td>".$row["DATEENTRY"]."</td>";
        echo "<td>".$row["DATEEXPIRATION"]."</td>";
        echo "<td>".$row["TOTALAMOUNT"]."</td>";
        echo "<td>".$row["TOTALVALUE"]."</td>";
        echo "<td>".$row["UNITPRICE"]."</td>";
        echo "<td><button onclick='javascript:eliminarItem(".$row["CODEITEM"].", " . $code_prod . ")' style='background-color: red;'><img src='../multimedia/images/trash.svg' alt='Eliminar' width='20' height='20'></button>";
        echo "</tr>";
    }
?>