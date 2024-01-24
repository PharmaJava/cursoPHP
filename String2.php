<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .resaltar{
        color:#F00;
        font-weight:bold;
    }
    </style>

<body>
    <?php
 $variable1="Casa";
 $variable2="CASA";

// $resultado= strcmp($variable1,$variable2); //Devuelve 1 si son iguales y 0!=
$resultado = strcasecmp($variable1,$variable2); //Devuelve 1 si no son iguales

if (!$resultado){ // con ! hacemos que sea un upsidedown

    echo"Coinciden";
}else{

    echo" NO Coinciden";
}

// echo "El resultado es " . $resultado;

?>
</body>
</html>