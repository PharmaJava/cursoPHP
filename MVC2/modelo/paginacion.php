<?php


require_once("Conectar.php");

$base = Conectar::conexion();

$tamagno_pagina = 3;

if (isset($_GET["pagina"])) {
    if ($_GET["pagina"] == 1) {
        header("Location: index.php");
    } else {
        $pagina = $_GET["pagina"];
    }
} else {
    $pagina = 1;
}

$empezar_desde = ($pagina - 1) * $tamagno_pagina;

$sql_total = "SELECT * FROM DATOS_USUARIOS";

$resultado = $base->prepare($sql_total);
$resultado->execute();

$num_filas = $resultado->rowCount();
$total_paginas = ceil($num_filas / $tamagno_pagina);




 //la funcion ceil redondea el resultado



?>