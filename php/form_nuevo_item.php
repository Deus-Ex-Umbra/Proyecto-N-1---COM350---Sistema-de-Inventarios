<?php
    $code_prod = $_GET["code_prod"];
    $code_inv = $_GET["code_inv"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Ítem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        .form-container input[type="text"], 
        .form-container input[type="number"], 
        .form-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Agregar Nuevo Ítem</h2>
        <?php echo "<form action='../php/insertitem.php?code_prod=".$code_prod."&code_inv=".$code_inv."' method='POST'>";
        ?>
            <label for="lotnumber">Número de Lote:</label>
            <input type="number" id="lotnumber" name="lotnumber" required>
            
            <label for="description">Descripción del Ítem:</label>
            <input type="text" id="description" name="description" required>
            
            <label for="observation">Observación:</label>
            <input type="text" id="observation" name="observation">
            
            <label for="dateentry">Fecha de Entrada:</label>
            <input type="date" id="dateentry" name="dateentry" required>
            
            <label for="dateexpiration">Fecha de Expiración:</label>
            <input type="date" id="dateexpiration" name="dateexpiration" required>
            
            <label for="unitprice">Precio Unitario:</label>
            <input type="number" id="unitprice" name="unitprice" step="0.01" required>
            
            <button type="submit">Agregar Ítem</button>
        </form>
    </div>
</body>
</html>