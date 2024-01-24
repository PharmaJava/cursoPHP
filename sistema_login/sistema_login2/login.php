<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        h1,h2{text-align:center;}
        table{
            width:25%;
            background-color:#FFC;
            boarder:2px dotted #F00;
            margin:auto;
        }
        .izq{
            text-align:right:
        }
        .der{
            text-align:left;
        }
        td{
            text-align:center;
            padding:10px;
        }

        </style>
</head>
<body>

<?php

        if (isset($_POST["enviar"])){
    try{

        $base= new PDO ("mysql:host=localhost; dbname=pruebas", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * FROM USUARIO_PASS WHERE USUARIOS= :login AND PASSWORD= :password";

        $resultado= $base->prepare ($sql);

        //rescatamos user pass de la otra pagina

        $login=htmlentities(addslashes($_POST["login"]));

        $password=htmlentities(addslashes($_POST["password"]));

        $resultado->bindValue(":login", $login);

        $resultado->bindValue(":password", $password);
        
        $resultado->execute();

        $numero_registro= $resultado->rowCount();

        if($numero_registro!=0){

           // echo"<h2>Adelante!</h2>";    

           
        }else{

          echo "Error. Usuario o contraseña incorrecta";
        }

    }catch(Exception $e){

        die ("Error: ". $e->getMessage());
    }

        }
?>

<?php

    if(!isset($_SESSION["usuario"])){

    include("formulario.html");

}else{
    
    echo "Usuario: " . $_SESSION ["usuario"];

}

?>

    <h2>CONTENIDO DE LA WEB</h2>
    <table width=800" border="0">
    <tr>
        <td><img src="imagen1.jpg" width= "300" height="166"></td>
        <td><img src="imagen2.jpg" width= "300" height="166"></td>
    </tr>
    <tr>
    <td><img src="imagen3.jpg" width= "300" height="166"></td>
    <td><img src="imagen4.jpg" width= "300" height="166"></td>
    </tr>
    </table>



</body>
</html>