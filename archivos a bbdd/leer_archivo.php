<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$Id="";
$contenido="";
$tipo="";


require("datos_conexion.php");

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

if (mysqli_connect_errno()) {
    echo "Fallo al conectar con la BBDD <br>";
    exit();
}

mysqli_set_charset($conexion, "utf8");

$consulta="SELECT * FROM ARCHIVOS WHERE ID=1";

$resultado=mysqli_query($conexion, $consulta);

while($fila=mysqli_fetch_array($resultado)){

    $Id= $fila["Id"];

    $contenido=$fila["Contenido"];

    $tipo=$fila["Tipo"];

}

echo "Id: ".$Id . "<br>";

echo "Tipo: ". $tipo . "<br>";

echo "<img src='data: image/jpeg; base64,".  base64_encode($contenido) . "'>";

    ?>

    <div>

    <img src="/img/<?php echo $ruta_img; ?> "alt="Imagen del primer articulo" width="25%"/> 

</div>
</body>
</html>