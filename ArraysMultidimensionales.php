<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

//multidimension: Frutas contienen, Leche contiene, y carne contiene...

$alimentos = array ("Fruta"=>array("tropical"=>"kiwi",
                                    "citrico"=>"mandarina",
                                     "otros"=>"manzana"   ),
                     "Leche"=>array("animal"=>"vaca",
                                    "vegetal"=>"coco" ), 
                     "Carne"=>array("vacuno"=>"lomo",
                                    "porcino"=>"pata"));

       
  //  echo $alimentos["carne"]["vacuno"];

                        //1 dimension, 2 dimension   
    foreach ($alimentos as $clave_alim=>$alim){

        echo "$clave_alim:<br>";


        //por cada 2 dimension, desdobla en clave y valor
        foreach ($alim as $clave => $valor){

            echo "$clave= $valor <br>";

        }

        echo "<br>";

    }


    //funcion propia de php para imprimir arrays
    echo var_dump($alimentos);


?>
    
</body>
</html>