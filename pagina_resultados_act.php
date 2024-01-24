<?php


    $busqueda= $_GET["buscar"]; 

    require("datos_conexion.php");

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

    if (mysqli_connect_errno()) {
        echo "Fallo al conectar con la BBDD <br>";
        exit();
    }

    mysqli_set_charset($conexion, "utf8");

    $consulta = "SELECT * FROM PRODUCTOS WHERE NOMBRE_ARTICULO LIKE '%$busqueda%'";
    $resultados = mysqli_query($conexion, $consulta);

    echo "<table>";
    while ($fila = mysqli_fetch_assoc($resultados)) {
        // echo "<tr>";

        echo "<form action='Actualizar.php' method= 'get'>";
        echo "<input type='text' name='c_art' value='" . $fila['CODIGO_ARTICULO'] . "'><br>";
        echo "<input type='text' name='n_art' value='" . $fila['NOMBRE_ARTICULO'] . "'><br>";
        echo "<input type='text' name='seccion' value='" . $fila['SECCION'] . "'><br>";
        echo "<input type='text' name='importado' value='" . $fila['IMPORTADO'] . "'><br>";
        echo "<input type='text' name='precio' value='" . $fila['PRECIO'] . "'><br>";
        echo "<input type='text' name='fecha' value='" . $fila['FECHA'] . "'><br>";
        echo "<input type='text' name='p_orig' value='" . $fila['PAIS_ORIGEN'] . "'><br>";
        
        echo "<input type='submit' name='enviando' value='Actualizar!'>";

        echo "<td>" . $fila['CODIGO_ARTICULO'] . "</td>";
        echo "<td>" . $fila['SECCION'] . "</td>";
        echo "<td>" . $fila['NOMBRE_ARTICULO'] . "</td>";
        echo "<td>" . $fila['PRECIO'] . "</td>";
        echo "<td>" . $fila['FECHA'] . "</td>";
        echo "<td>" . $fila['PAIS_ORIGEN'] . "</td>";
        echo "<td>" . $fila['IMPORTADO'] . "</td>";
        echo "</tr>";
        echo"</form>";
    }
    echo "</table>";

    mysqli_close($conexion);
?>