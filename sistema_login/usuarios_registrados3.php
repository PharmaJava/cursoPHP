<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

session_start();

if(!isset($_SESSION["usuario"])){

    header("location:login.php");

}



?>


    <h1>Bienvenidos Usuarios</h1>

    <?php

    echo "Usuario: ". $_SESSION ["usuario"]."<br><br>";

?>

    <p>Esto es informacion solo para usuarios registrados</p>
    <p><a href="usuarios_registrados1.php">Volver</a></p>
</body>
</html>