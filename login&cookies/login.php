<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1, h2 {
            text-align: center;
        }
        table {
            width: 25%;
            background-color: #FFC;
            border: 2px dotted #F00;
            margin: auto;
        }
        .izq {
            text-align: right;
        }
        .der {
            text-align: left;
        }
        td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php

$autenticado=false;

if (isset($_POST["enviar"])) {
    try {
        $base = new PDO("mysql:host=localhost;dbname=pruebas", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM USUARIO_PASS WHERE USUARIOS = :login AND PASSWORD = :password";

        $resultado = $base->prepare($sql);

        // Rescatamos usuario y contraseña de la página anterior
        $login = htmlentities(addslashes($_POST["login"]));
        $password = htmlentities(addslashes($_POST["password"]));

        $resultado->bindValue(":login", $login);
        $resultado->bindValue(":password", $password);

        $resultado->execute();

        $numero_registro = $resultado->rowCount();

        if ($numero_registro != 0) {
          
            $autenticado=true;

            if(isset($_POST["recordar"])){

                setcookie("nombre_usuario", $_POST ["login"], time()+84600);
            }


        } else {
            echo "Error. Usuario o contraseña incorrecta";
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
<?php

if($autenticado==false){

    if(!isset($_COOKIE["nombre_usuario"])){
        include("formulario.php");
}
}

if(isset($_COOKIE["nombre_usuario"])){

    echo "Hola " . $_COOKIE["nombre_usuario"];
}else if($autenticado==true){
    echo "Hola " . $_POST["login"];
}
?>


<h2>CONTENIDO DE LA WEB</h2>
<table width="800" border="0">
    <tr>
        <td><img src="imagen1.jpg" width="300" height="166"></td>
        <td><img src="imagen2.jpg" width="300" height="166"></td>
    </tr>
    <tr>
        <td><img src="imagen3.jpg" width="300" height="166"></td>
        <td><img src="imagen4.jpg" width="300" height="166"></td>
    </tr>
</table>

<?php
    
    if($autenticado==true || isset ($_COOKIE["nombre_usuario"])){

        include("zonaregistrados.html");
        
    }
?>
</body>
</html>
