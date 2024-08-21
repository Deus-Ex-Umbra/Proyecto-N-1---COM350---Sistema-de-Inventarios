<?php
    include("connection.php");
    $query = "SELECT * FROM VIEWINVENTORY;";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='tarjetas' id=".$row["CODEINV"]." onclick='javascript:cargarProductos(".$row["CODEINV"].")'>";
        echo "<div class='informacion'>";
        echo "<h2>".$row['NAMEINV']."</h2>";
        echo "<img src='../multimedia/images/paquete.png' width='120px'>";
        echo "<p>".$row['DESCRIPTIONINV']."</p>";
        echo "<div class='detalles'>";
        echo "<div class='cantidad'>";
        echo "<p>Total: ".$row['TOTALAMOUNT']."</P>";
        echo "</div>";
        echo "<div class='precio'>";
        echo "<p>".$row['TOTALVALUEINV']." Bs.</p>";
        echo "</div>";
        echo "</div>";
        echo "<div class='acciones'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
?>