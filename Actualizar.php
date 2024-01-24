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


$consulta = "Update PRODUCTOS SET CODIGO_ARTICULO='$cod', SECCION='$sec', NOMBRE_ARTICULO='$nom', 
PRECIO='$pre', FECHA='$fec', IMPORTADO='$imp', PAIS_ORIGEN='$por' WHERE CODIGO_ARTICULO='$cod'";

$resultados = mysqli_query($conexion, $consulta);

if($resultados==false){

    echo "Error en la consulta";

}else{

    echo "Registro guardado<br><br>";

    echo "<table><tr><td>$cod</td><td>";
    
    echo "<table><tr><td>$sec</td><td>";
    
    echo "<table><tr><td>$nom</td><td>";
    
    echo "<table><tr><td>$pre</td><td>";
    
    echo "<table><tr><td>$fec</td><td>";
    
    echo "<table><tr><td>$imp</td><td>";
    
    echo "<table><tr><td>$por</td><td></table>";

}

mysqli_close($conexion);


?>

</body>
</html>