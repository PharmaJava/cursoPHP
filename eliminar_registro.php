<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

  $cod=$_GET["c_art"];
  $sec=$_GET["seccion"];
  $nom=$_GET["n_art"];
  $pre=$_GET["precio"];
  $fec=$_GET["fecha"];
  $imp=$_GET["importado"];
  $por=$_GET["p_orig"];
// $busqueda= $_GET["buscar"]; 

require("datos_conexion.php");

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

if (mysqli_connect_errno()) {
    echo "Fallo al conectar con la BBDD <br>";
    exit();
}

mysqli_set_charset($conexion, "utf8");

// $consulta = "SELECT * FROM PRODUCTOS WHERE NOMBRE_ARTICULO LIKE '%$labusqueda%'";


$consulta= "DELETE FROM PRODUCTOS WHERE CODIGO_ARTICULO='$cod'";

$resultados = mysqli_query($conexion, $consulta);

if($resultados==false){

    echo "Error en la consulta";

}else{

    //echo "Registro eliminado <br><br>";

    //echo mysqli_affected_rows ($conexion);
    if(mysqli_affected_rows($conexion)==0){
        echo "No hay registros que eliminar con ese criterio <br><br>";
    }else{
        echo "Se han eliminado " . mysqli_affected_rows($conexion) . " registro";
    }
    

}

mysqli_close($conexion);


?>

</body>
</html>