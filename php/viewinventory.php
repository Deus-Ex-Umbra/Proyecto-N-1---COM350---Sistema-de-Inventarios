<?php
include("./php/connection.php");

$query = "SELECT * FROM VIEWINVENTORY;";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result)) {
    $codeInv = $row["CODEINV"];
    $expiredQuery = "SELECT GETQUANTITYITEMSEXPIRATESBYINVENTORY($codeInv) AS expiredCount;";
    $expiredResult = mysqli_query($connection, $expiredQuery);
    $expiredRow = mysqli_fetch_array($expiredResult);
    $expiredCount = $expiredRow['expiredCount'];
?>
    <a href="./php/viewproduct.php?code_inv=<?php echo $row['CODEINV']; ?>">
        <div class='tarjetas' id="<?php echo $row['CODEINV']; ?>">
            <div class='informacion'>
                <h2><?php echo $row['NAMEINV']; ?></h2>
                <img src="multimedia/images/inventories/<?php echo $row['PHOTOINV']; ?>" width='220px' height='420px'>
                <p><?php echo $row['DESCRIPTIONINV']; ?></p>
                <div class='ubicacion'>
                    <p><?php echo $row['UBICATIONINV']; ?></p>
                </div>
                <div class='detalles'>
                    <div class='cantidad'>
                        <p>Total: <?php echo $row['TOTALAMOUNT']; ?></p>
                    </div>
                    <div class='precio'>
                        <p><?php echo $row['TOTALVALUEINV']; ?> Bs.</p>
                    </div>
                </div>
                <?php if ($expiredCount > 0) { ?>
                    <div class='vencidos'>
                        <p>Productos Expirados: <?php echo $expiredCount; ?></p>
                    </div>
                <?php } ?>
                <div class='acciones'>
                </div>
            </div>
        </div>
    </a>
<?php 
}
?>