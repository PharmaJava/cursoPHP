<?php


    $busqueda= $_GET["buscar"]; 
    

    require("datos_conexion.php");

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

    if (mysqli_connect_errno()) {
        echo "Fallo al conectar con la BBDD <br>";
        exit();
    }

    mysqli_set_charset($conexion, "utf8");

    // $consulta = "SELECT * FROM PRODUCTOS WHERE NOMBRE_ARTICULO LIKE '%$busqueda%'";
      
    $consulta = "SELECT * FROM PRODUCTOS WHERE NOMBRE_ARTICULO = '$busqueda'";

   echo "$consulta <br><br>";


    $resultados = mysqli_query($conexion, $consulta);

    echo "<table>";
    while ($fila = mysqli_fetch_assoc($resultados)) {
        echo "<tr>";
        echo "<td>" . $fila['SECCION'] . "</td>";
        echo "<td>" . $fila['NOMBRE_ARTICULO'] . "</td>";
        echo "<td>" . $fila['PRECIO'] . "</td>";
        echo "<td>" . $fila['FECHA'] . "</td>";
        echo "<td>" . $fila['PAIS_ORIGEN'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($conexion);
?>