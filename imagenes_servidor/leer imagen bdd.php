<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

require("datos_conexion.php");

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

if (mysqli_connect_errno()) {
    echo "Fallo al conectar con la BBDD <br>";
    exit();
}

mysqli_set_charset($conexion, "utf8");

$consulta="SELECT FOTO FROM PRODUCTOS WHERE CODIGOARTICULO='AR01'";

$resultado=mysqli_query($conexion, $consulta);

while($fila=mysqli_fetch_array($resultado)){

    $ruta_img=$fila["FOTO"];

}

    ?>

    <div>

    <img src="/img/<?php echo $ruta_img; ?> "alt="Imagen del primer articulo" width="25%"/> 

</div>
</body>
</html>