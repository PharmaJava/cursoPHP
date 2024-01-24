<?php
require("DevuelveProductos.php");

$pais= $_GET["buscar"];

$productos = new DevuelveProductos(); 

$array_productos = $productos->get_productos($pais);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    foreach ($array_productos as $elemento) {
        echo "<table><tr><td>";
        echo $elemento['CODIGO_ARTICULO'] . "</td><td>";
        echo $elemento['NOMBRE_ARTICULO'] . "</td><td>";
        echo $elemento['SECCION'] . "</td><td>";
        echo $elemento['PRECIO'] . "</td><td>";
        echo $elemento['FECHA'] . "</td><td>";
        echo $elemento['IMPORTADO'] . "</td><td>";
        echo $elemento['PAIS_ORIGEN'] . "</td></tr></table>";

        echo "<br>";
        echo "<br>";
    }
    ?>
</body>
</html>
