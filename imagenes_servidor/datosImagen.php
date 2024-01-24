<?php
//Recibimos los datos de la imagen

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_imagen=$_FILES['imagen']['type'];
$tamagno_imagen=$_FILES['imagen']['size'];

echo $tipo_imagen;

//solo subimos imagenes con este tipo de longitud
if($tamagno_imagen<=1000000){

    //con esto controlamos el tipo de archivo que subimos
if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png"){
//Ruta de la carpeta destino en servidor
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/img/';

//Movemos la imagen del directorio temporal al directorio escogido
move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino . $nombre_imagen);
}else{
    echo " Solo se pueden subir imagenes";
}
}else{

    echo "El tamaño es demasiado grande TWSS";
}



require("datos_conexion.php");

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

if (mysqli_connect_errno()) {
    echo "Fallo al conectar con la BBDD <br>";
    exit();
}

mysqli_set_charset($conexion, "utf8");

// $sql = "INSERT INTO PRODUCTOS (FOTO) VALUES ('$nombre_imagen')";
$sql= "UPDATE PRODUCTOS SET FOTO='$nombre_imagen' WHERE CODIGOARTICULO='AR01'";
$resultado = mysqli_query($conexion, $sql);










?>