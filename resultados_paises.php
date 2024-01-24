<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $pais = $_GET["buscar"];

    require ("datos_conexion.php");

    $conexion= mysqli_connect($db_host, $db_usuario, $db_contra);

    if(mysqli_connect_errno()){

        echo "Fallo al conectar con la BBDD";

        exit();

    }

    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

    // mysqli_set_charset($conexion, "UTF-8");

    $sql= "SELECT CODIGO_ARTICULO, SECCION, PRECIO, PAIS_ORIGEN FROM PRODUCTOS WHERE PAIS_ORIGEN= ?";

    $resultado= mysqli_prepare ($conexion, $sql);

    $ok= mysqli_stmt_bind_param ($resultado, "s", $pais);

    $ok= mysqli_stmt_execute($resultado);

    if($ok==false){
        echo "Error al ejecutar la consulta";
    }else{

        $ok=mysqli_stmt_bind_result ($resultado, $codigo, $seccion, $precio, $pais);

        echo "Articulos encontrados: <br><br>";

        while (mysqli_stmt_fetch($resultado)){
            
            echo $codigo . " " . $seccion. " " . $precio . " " . $pais . " <br> " ;
        }

        mysqli_stmt_close ($resultado);

    }





    ?>
</body>
</html>