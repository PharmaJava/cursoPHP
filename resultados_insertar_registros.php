<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$c_art = $_GET["c_art"];
$secc = $_GET["secc"];
$n_art = $_GET["n_art"];
$pre = $_GET["pre"];
$fec = $_GET["fec"];
$imp = $_GET["imp"];
$p_ori = $_GET["p_ori"];

    require ("datos_conexion.php");

    $conexion= mysqli_connect($db_host, $db_usuario, $db_contra);

    if(mysqli_connect_errno()){

        echo "Fallo al conectar con la BBDD";

        exit();

    }

    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

    // mysqli_set_charset($conexion, "UTF-8");

    $sql= "INSERT INTO PRODUCTOS(CODIGO_ARTICULO, SECCION,NOMBRE_ARTICULO, PRECIO, 
    FECHA, IMPORTADO, PAIS_ORIGEN) VALUES (?,?,?,?,?,?,?)";

    $resultado= mysqli_prepare ($conexion, $sql);

    $ok= mysqli_stmt_bind_param ($resultado, "sssssss", $c_art, $secc,$n_art, $pre, $fec,$imp, $p_ori);

    $ok= mysqli_stmt_execute($resultado);

    if($ok==false){
        echo "Error al ejecutar la consulta";
    }else{

        

        echo "Agregado nuevo registro: <br><br>";
            echo "Código Artículo: $c_art <br>
            Sección: $secc <br>
            Nombre: $n_art <br>
            Precio: $pre <br>
            Fecha: $fec <br>
            Importado: $imp <br>
            País de origen: $p_ori";


        mysqli_stmt_close ($resultado);

    }





    ?>
</body>
</html>