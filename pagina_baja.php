<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<input type="text" id="usuario" placeholder="Usuario">
<br>
<input type="password" id="contra" placeholder="Contraseña">
<br>
<button type="submit">Dar baja</button>

<body>
<?php



require("datos_conexion.php");

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

$usuario = mysqli_real_escape_string ($conexion, $_GET["usu"]);
$contra= mysqli_real_escape_string ($conexion, $_GET["con"]);

$usuario= $_GET["usu"];
$contra= $_GET["con"];


if (mysqli_connect_errno()) {
    echo "Fallo al conectar con la BBDD <br>";
    exit();
}

mysqli_set_charset($conexion, "utf8");

$consulta= "DELETE FROM USUARIOS WHERE USUARIO='$usuario' and CONTRA ='$contra'";

echo "$consulta<br><br>";

mysqli_query($conexion,$consulta);

if(mysqli_affected_rows($conexion)>0){
    echo "Baja procesada";

}else{
    echo "No se ha encontrado usuarios";
}


mysqli_close($conexion);


?>

</body>
</html>