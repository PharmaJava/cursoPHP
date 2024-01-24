<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
                    //direccion, nombreUsua, Contra, BBDD         
    $conexion= new mysqli ("localhost","root","", "pruebas");

    if ($conexion->connect_errno)   {
        echo "Fallo la conexion " . $conexion->connect_errno ;
    }

        $sql="SELECT * FROM PRODUCTOS";

    //$resultados= mysqli_query($conexion, $sql); antigua manera

    $resultados=$conexion->query($sql);

    if($conexion->errno) {
        die($conexion->error);

    }
    while($fila=$resultados->fetch_array()){
        echo "<table><tr><td>";
        echo  $fila['0'] . " </td><td>";
        echo  $fila['1'] . " </td><td>";
        echo  $fila['2'] . " </td><td>";
        echo  $fila['3'] .  "</td><td>";
        echo  $fila['4'] .  "</td><td>
        </tr></table>";
       
    }

    $conexion->close();





?>
</body>
</html>