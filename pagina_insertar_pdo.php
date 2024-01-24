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
    $busqueda_seccion= $_POST["seccion"];
    $busqueda_precio= $_POST["precio"];
    $busqueda_fecha= $_POST["fecha"];
    $busqueda_importado= $_POST["importado"];
    $busqueda_porig= $_POST["p_orig"];
    $busqueda_nart= $_POST["n_art"];


try{

    $base= new PDO ('mysql:host=localhost; dbname=pruebas' ,'root', '');

    $base->exec("SET CHARACTER SET utf8");

    $sql="INSERT INTO PRODUCTOS (CODIGO_ARTICULO, SECCION, NOMBRE_ARTICULO, PRECIO, FECHA, IMPORTADO, PAIS_ORIGEN)
    VALUES (:c_art, :seccion, :n_art, :precio, :fecha, :importado, :p_orig)";

    $resultado= $base-> prepare ($sql); //objeto base llama al metodo prepare

    

    $resultado-> execute(array(":c_art"=>$busqueda_cart, ":seccion"=>$busqueda_seccion, ":n_art"=>$busqueda_nart,
    ":precio"=>$busqueda_precio,":fecha"=>$busqueda_fecha,":importado"=>$busqueda_importado,":p_orig"=>$busqueda_porig));

    // while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

    //     echo "Nombre Articulo: " . $registro ["NOMBRE_ARTICULO"] . 
    //         " Seccion: " . $registro ["SECCION"] . " Precio: " . $registro ["PRECIO"]. 
    //         " Pais de origen: " . $registro ["PAIS_ORIGEN"] . "<br>";

    // }

    echo "Registro insertado";

    $resultado->closeCursor();


}catch(Exception $e){

    die ('Error: ' . $e->GetMessage());

}finally{

    $base=null;
}


?>
</body>
</html>
