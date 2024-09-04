<?php
$code_inv = $_GET["code_inv"];
include("connection.php");
if (!isset($_POST["search"])) $query = "SELECT * FROM PRODUCTBYINVENTORYFULL WHERE CODINV = " . $code_inv . ";";
else $query = "SELECT * FROM PRODUCTBYINVENTORYFULL WHERE CODINV = " . $code_inv . " AND " . $_POST["column"] . " LIKE '%" . $_POST["search"] . "%';";
$result = mysqli_query($connection, $query);
$queryexpirated = "CALL GETALLIDPRODEXPIRATEDITEMSBYINVENTORY(" . $code_inv . ");";
$resultexpirated = mysqli_query($connection, $queryexpirated);
$expirated = [];
if (mysqli_num_rows($resultexpirated) != 0) {
    while ($row = mysqli_fetch_array($resultexpirated)) {
        array_push($expirated, $row["CODEPROD"]);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Productos</title>
</head>
<body>
    <div class="contenedor">
        <div class="encabezado">
            <a href="../index.php">
            <div class="logo">
                <div class="bg">
                      <div class="logoPagina">
                          <img src="../multimedia/images/elements/farmacia.png">
                          <h1>San Agustin</h1>
                      </div>
                </div>
                <div class="blob"></div>
            </div>
            </a>
            <div class=filtros>
            <form action="viewproduct.php<?php echo "?code_inv=" . $code_inv?>" method="post">
                    <input type="hidden" name="code_prod" value="<?php echo $code_prod; ?>">
                    <input type="hidden" name="code_inv" value="<?php echo $code_inv; ?>">
                
                    <select class=".select" name="column">
                        <?php 
                        $querycolumns = "CALL GETALLCOLUMNSNAME('PRODUCTBYINVENTORYFULL');"; 
                        try {
                            $connectionaux = new mysqli("localhost", "root", "", "DBINVENTORIES");
                        } catch(Exception $_ex) {
                            echo "Error: " . $connectionaux->connect_error;
                        }
                        $resultcolumns = mysqli_query($connectionaux, $querycolumns);
                        if ($resultcolumns && mysqli_num_rows($resultcolumns) != 0) {
                            while ($row = mysqli_fetch_array($resultcolumns)) {
                                $column_name = $row["COLUMN_NAME"];
                                if ($column_name != 'CODEPROD' && $column_name != 'CODINV' && $column_name != 'PHOTOPROD') {
                                    $column_name_es = '';
                                    switch ($column_name) {
                                        case 'NAMEEPROD':
                                            $column_name_es = 'NOMBRE DEL PRODUCTO';
                                            break;
                                        case 'DESCRIPTIONPROD':
                                            $column_name_es = 'DESCRIPCIÓN DEL PRODUCTO';
                                            break;
                                        case 'TOTALAMOUNT':
                                            $column_name_es = 'CANTIDAD TOTAL';
                                            break;
                                        case 'TOTALVALUE':
                                            $column_name_es = 'VALOR TOTAL';
                                            break;
                                        case 'NAMECAT':
                                            $column_name_es = 'CATEGORÍA';
                                            break;
                                        case 'NAMESUP':
                                            $column_name_es = 'PROVEEDOR';
                                            break;
                                        case 'NAMEBRAND':
                                            $column_name_es = 'MARCA';
                                            break;
                                        default:
                                            $column_name_es = $column_name;
                                    }
                        ?>
                            <option value="<?php echo htmlspecialchars($column_name); ?>"><?php echo htmlspecialchars($column_name_es); ?></option>
                    <?php 
                                }
                            }
                        }
                        $connectionaux->close();
                    ?>
                    </select>
                    <div class="buscador">
                    <div class="input-wrapper">
                        <button class="icon">
                            <i class="fa fa-search"></i>
                        </button>
                    <input type="text" name="search" class="input" placeholder="search.."/>
                </div>
            </div>
            </div>
            </form>
        </div>
        <div class="contenido">
            <div class="inventario" id="inventory">
                
            <div class="btn-group">
            <a href="form_nuevo_producto.php?code_inv=<?php echo $code_inv; ?>">
                <button class="btn left">
                    Agregar Producto
                </button>
            </a>
            <a href="viewinventariedinventory.php?code_inv=<?php echo $code_inv; ?>">
                <button class="btn rigth">
                    Inventariar Producto
                </button>
            </a>
        </div>
                <table class='table'>
                    <tr class="row">
                        <th class="cell">Nombre</th>
                        <th class="cell">Descripción</th>
                        <th class="cell">Cantidad</th>
                        <th class="cell">Valor Total</th>
                        <th class="cell">Categoría</th>
                        <th class="cell">Proveedor</th>
                        <th class="cell">Marca</th>
                        <th class="cell">Acciones</th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($result)): ?>
                        <?php
                        $is_expirated = in_array($row["CODEPROD"], $expirated);
                        ?>
                        <tr class="row" id="product<?php echo $row['CODEPROD']; ?>" style="background-color: <?php echo $is_expirated ? '#ffcccb' : 'transparent'; ?>;">
                            <td class="cell"><?php echo $row["NAMEEPROD"]; ?></td>
                            <td class="cell"><?php echo $row["DESCRIPTIONPROD"]; ?></td>
                            <td class="cell"><?php echo $row["TOTALAMOUNT"]; ?></td>
                            <td class="cell"><?php echo $row["TOTALVALUE"]; ?></td>
                            <td class="cell"><?php echo $row["NAMECAT"]; ?></td>
                            <td class="cell"><?php echo $row["NAMESUP"]; ?></td>
                            <td class="cell"><?php echo $row["NAMEBRAND"]; ?></td>
                            <td class="cell">
                                <a href="form_nuevo_item.php?code_prod=<?php echo $row['CODEPROD']; ?>&code_inv=<?php echo $code_inv; ?>"><button class="btn-icon"><i class="fas fa-plus"></i> Agregar</button></a>
                                <a href="form_modificar_producto.php?code_prod=<?php echo $row['CODEPROD']; ?>&code_inv=<?php echo $code_inv; ?>"><button class="btn-icon"><i class="fas fa-edit"></i> Editar</button></a>
                                <a href="deleteproduct.php?code_prod=<?php echo $row['CODEPROD']; ?>&code_inv=<?php echo $code_inv; ?>"><button class="btn-icon"><i class="fas fa-trash"></i> Eliminar</button></a>
                                <a href="viewinventariedproduct.php?code_prod=<?php echo $row['CODEPROD']; ?>&code_inv=<?php echo $code_inv; ?>"><button class="btn-icon"><i class="fas fa-book"></i> Inventariar</button></a>
                                <button class="btn-icon" onclick="javascript:cargarItemsPorProducto(<?php echo $row['CODEPROD']; ?>, <?php echo $code_inv; ?>)"><i class="fas fa-chevron-down"></i> Items</button>
                            </td>
                        </tr>
                        <tr class="row-sub" id="items">
                            <td class="cell" colspan='1'></td>
                            <td class="cell" colspan='7'>
                                <div class='items' id='t<?php echo $row["CODEPROD"]; ?>'></div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    <script src="../javascript/index.js"></script>
</body>
</html>
