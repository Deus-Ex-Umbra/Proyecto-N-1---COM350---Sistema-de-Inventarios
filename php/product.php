<?php
    include("connection.php");
    $code_inv = $_GET["code_inv"];
    $query = "SELECT * FROM PRODUCTBYINVENTORYFULL WHERE CODINV = ".$code_inv.";";
    $result = mysqli_query($connection, $query);
    $queryexpirated = "CALL GETALLIDPRODEXPIRATEDITEMSBYPRODUCT(".$code_inv.");";
    $resultexpirated = mysqli_query($connection, $queryexpirated);
    
    $expirated = array();
    if (mysqli_num_rows($resultexpirated) != 0) {
        while($row = mysqli_fetch_array($resultexpirated)) {
            array_push($expirated, $row["CODEPROD"]);
        }
    }

    //Bótón alineado a la izquierda para retroceder
    echo "<button onclick='javascript:cargarInventarios()' style='background-color: #9F13C2;'><img src='../multimedia/images/back.svg' alt='Atrás' width='20' height='20'></button>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Descripción</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Valor Total</th>";
    echo "<th>Categoría</th>";
    echo "<th>Proveedor</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($result)) {
        if (in_array($row["CODEPROD"], $expirated)) {
            echo "<tr class='product' id='product".$row["CODEPROD"]."' style='background-color: #ffcccb;' onclick='javascript:cargarItem(".$row["CODEPROD"].")'>";
        } else {
            echo "<tr class='product' id='product".$row["CODEPROD"]."' onclick='javascript:cargarItem(".$row["CODEPROD"].")'>";
        }
        echo "<td>".$row["NAMEEPROD"]."</td>";
        echo "<td>".$row["DESCRIPTIONPROD"]."</td>";
        echo "<td>".$row["TOTALAMOUNT"]."</td>";
        echo "<td>".$row["TOTALVALUE"]."</td>";
        echo "<td>".$row["NAMECAT"]."</td>";
        echo "<td>".$row["NAMESUP"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='7'>";
        echo "<div class='items' id='t".$row["CODEPROD"]."'></div>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>
