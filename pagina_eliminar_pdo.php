<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $busqueda_cart= $_POST["c_art"];
    

try{

    $base= new PDO ('mysql:host=localhost; dbname=pruebas' ,'root', '');

    $base->exec("SET CHARACTER SET utf8");

    $sql= "DELETE FROM productos WHERE CODIGO_ARTICULO=:c_art";

    $resultado= $base-> prepare ($sql); //objeto base llama al metodo prepare

    $resultado->execute(array(":c_art"=>$busqueda_cart));


    echo "Registro Eliminado";

    $resultado->closeCursor();


}catch(Exception $e){

    die ('Error: ' . $e->GetMessage());

}finally{

    $base=null;
}


?>
</body>
</html>
