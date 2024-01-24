<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    //php deja omitir indices
    // $semana[0]= "Lunes";
    // $semana[]= "Martes";
    // $semana[]= "Miercoles";

    $semana= array("Lunes", "Martes", "Miercoles", "Jueves");

    echo $semana[3]. "<br>";
    //array asociativo
    $datos= array ("Nombre"=>"Juan", "Apellido"=>"Gomez", "Edad"=>"36");

    $datos["Pais"]= "España";  //para agregar datos a un array asociativo

    echo $datos["Apellido"]. "<br>";

    //comprobar si es un array o no

    if(is_array($datos )){

        echo "Es un Array <br>";

     }else{
        echo "No lo es ";

     }
 //para recorrer el bucle inventamos 2 variables porque una es para "nombre" y otro para "juan"
     foreach ($datos as $clave=>$valor){

        echo "A $clave le corresponde el $valor <br>";

     }

     $diassemana []="lunes";
     $diassemana []="martes";
     $diassemana []="miercoles";
     $diassemana []="jueves";

     for($i=0;$i<count($diassemana);$i++){

        echo $diassemana[$i] . "<br>";
     }

     $diassemana[]="viernes";

     for($i=0;$i<count($diassemana);$i++){

        echo $diassemana[$i] . "<br>";
     }


     $arrayindexado= array ("Lunes", "Martes", "Miercoles", "Jueves");

     //para ordenar el array
     sort ($arrayindexado);
     for ($i=0;$i<count($arrayindexado);$i++){

        echo $arrayindexado[$i] . "<br>";

     }

?>
    
</body>
</html>