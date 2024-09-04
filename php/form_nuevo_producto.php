<?php
$code_inv = $_GET["code_inv"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="float"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group input[type="file"] {
            display: none;
        }

        .form-group .upload-label {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border: 2px dashed #ccc;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            color: #999;
            font-size: 16px;
        }

        .form-group .upload-label i {
            font-size: 48px;
            margin-bottom: 10px;
            color: #007bff;
        }

        .form-group .upload-label span {
            display: block;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Agregar Producto</h2>
        <?php echo "<form action='insertproduct.php?code_inv=".$code_inv."' method='POST' enctype='multipart/form-data'>"; ?>
        
        <div class="form-group">
            <label for="name">Nombre del Producto</label>
            <input type="text" id="name" name="NAMEEPROD" placeholder="Nombre del Producto" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" id="description" name="DESCRIPTIONPROD" placeholder="Descripción del Producto" required>
        </div>
        <div class="form-group">
            <label for="category">Categoría</label>
            <select id="category" name="CODCAT" required>
                <option value="">Seleccione una Categoría</option>
                <?php
                    include("connection.php");
                    $query = "SELECT * FROM CATEGORY;";  // Actualizamos el nombre de la vista
                    $result = mysqli_query($connection, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='".$row["CODECAT"]."'>".$row["NAMECAT"]."</option>";
                        }
                    } else {
                        echo "<option value=''>No hay categorías disponibles</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="supplier">Proveedor</label>
            <select id="supplier" name="CODSUP" required>
                <option value="">Seleccione un Proveedor</option>
                <?php
                    $query = "SELECT * FROM SUPPLIER;";  // Actualizamos el nombre de la vista
                    $result = mysqli_query($connection, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='".$row["CODESUP"]."'>".$row["NAMESUP"]."</option>";
                        }
                    } else {
                        echo "<option value=''>No hay proveedores disponibles</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Agregar Producto</button>
        </div>
        </form>
    </div>
    
    <script>
        const fileInput = document.getElementById('photo');
        const label = document.querySelector('.upload-label span');

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length > 0) {
                label.textContent = fileInput.files[0].name;
            } else {
                label.textContent = 'Haz clic para añadir una imagen';
            }
        });
    </script>
</body>
</html>
