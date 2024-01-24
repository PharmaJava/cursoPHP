<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    try {

        $base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "");   

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $base->exec("SET CHARACTER SET utf8");

        $tamagno_paginas=3;

        if (isset($_GET["pagina"])){
            if ($_GET["pagina"]==1){

                header ("Location:index.php");
            }else{
                $pagina=$_GET["pagina"];
            }
    }else{
        $pagina=1;
    }

    

        $empezar_desde= ($pagina-1) *$tamagno_paginas;

        $sql_total = "SELECT NOMBRE_ARTICULO, SECCION, PRECIO, PAIS_ORIGEN FROM PRODUCTOS WHERE SECCION= 'DEPORTE'";
        

        $resultado = $base->prepare($sql_total);

        $resultado->execute(array());

        $num_filas=$resultado->rowCount();

        $total_paginas=ceil($num_filas/$tamagno_paginas); //la funcion ceil redondea el resultado

        echo "Numero de registros de la consulta: ".$num_filas . "<br>";
        echo "Mostramos " . $tamagno_paginas . " registros por pagina <br>";
        echo "Mostrando la pagina " . $pagina . " de " . $total_paginas. "<br>"; 

       

        $resultado->closeCursor();

        $sql_limite= "SELECT NOMBRE_ARTICULO, SECCION, PRECIO, PAIS_ORIGEN FROM PRODUCTOS WHERE SECCION= 'DEPORTE'
        LIMIT $empezar_desde,$tamagno_paginas";

        $resultado = $base->prepare($sql_limite);

        $resultado->execute(array());

        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {

            echo "Nombre Articulo: " . $registro["NOMBRE_ARTICULO"] . " Seccion: " . $registro["SECCION"] .
            " Precio: " . $registro["PRECIO"] . " Pais: " . $registro["PAIS_ORIGEN"] . "<br>";
        }

    } catch (Exception $e) {

        echo "Linea de error: " . $e->getLine();
    }


    //----------------PAGINACION--------------//

    for ($i=1; $i<=$total_paginas; $i++) {

        echo "<a href='?pagina=" . $i . "'>" . $i . "</a>";
    }



    ?>
</body>
</html>
