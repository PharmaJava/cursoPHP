<?php

    require "Conexion.php";
    require "DevuelveProducts.php";


    class DevuelveProductos extends Conexion{

        public function DevuelveProducto() {

        parent::__construct() ;   
    }

    public function get_productos(){

        $resultado=$this->conexion_db->query('SELECT * FROM PRODUCTOS');

        $productos= $resultado->fetch_all(MYSQLI_ASSOC);

        return $productos;
    }
    }

?>

<?php
$productos = new DevuelveProducts();


$array_productos = $productos->get_productos();
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