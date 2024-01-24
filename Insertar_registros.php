<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php

  
    // $busqueda= $_GET["buscar"]; 

    require("datos_conexion.php");

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

    if (mysqli_connect_errno()) {
        echo "Fallo al conectar con la BBDD <br>";
        exit();
    }

    mysqli_set_charset($conexion, "utf8");

    // $consulta = "SELECT * FROM PRODUCTOS WHERE NOMBRE_ARTICULO LIKE '%$labusqueda%'";
    

    $consulta= "INSERT INTO PRODUCTOS (SECCION, NOMBRE_ARTICULO) VALUES ('Deportes', 'Raqueta Badminton')";
    
    $resultados = mysqli_query($conexion, $consulta);
    
    mysqli_close($conexion);


?>

</body>
</html>