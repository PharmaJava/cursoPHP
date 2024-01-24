<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


    $busqueda_sec= $_POST["seccion"];
    $busqueda_porig= $_POST["p_orig"];


try{

    $base= new PDO ('mysql:host=localhost; dbname=pruebas' ,'root', '');

    $base->exec("SET CHARACTER SET utf8");

    $sql= "SELECT NOMBRE_ARTICULO, SECCION, PRECIO, PAIS_ORIGEN FROM PRODUCTOS 
    WHERE SECCION = :SECC AND PAIS_ORIGEN = :PORIG";

    $resultado= $base-> prepare ($sql); //objeto base llama al metodo prepare

    $resultado->execute(array(":SECC"=>$busqueda_sec, ":PORIG"=>$busqueda_porig)); 

    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

        echo "Nombre Articulo: " . $registro ["NOMBRE_ARTICULO"] . 
            " Seccion: " . $registro ["SECCION"] . " Precio: " . $registro ["PRECIO"]. 
            " Pais de origen: " . $registro ["PAIS_ORIGEN"] . "<br>";

    }

    $resultado->closeCursor();


}catch(Exception $e){

    die ('Error: ' . $e->GetMessage());

}finally{

    $base=null;
}


?>
</body>
</html>
