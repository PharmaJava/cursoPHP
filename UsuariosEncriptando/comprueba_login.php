<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    try{

        $login=htmlentities(addslashes($_POST["login"]));

        $password=htmlentities(addslashes($_POST["password"]));

        $contador=0;

        $base= new PDO ("mysql:host=localhost; dbname=pruebas", "root", "");
        
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * FROM USUARIO_PASS WHERE USUARIOS= :login";

        $resultado= $base->prepare ($sql);

        $resultado->execute(array(":login"=>$login));

        while($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
            
            if(password_verify($password, $registros['password'])){

        $contador++;


        }
    }

    if($contador>0){

        echo "Usuario registrado";

    }else{

        echo "Usuario NO registrado";
    }

        $resultado->closeCursor();

        //rescatamos user pass de la otra pagina



    }catch(Exception $e){

        die ("Error: ". $e->getMessage());
    }


?>
</body>
</html>