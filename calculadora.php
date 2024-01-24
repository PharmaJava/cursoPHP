<style>
.resultado{
    color: #F00;
    font-weight:bold;
    font-size:32px;
}
</style>
<?php

if (isset($_POST["button"])) {// si el usuario ha pulsado el botón
    $numero1 = $_POST["num1"];
    $numero2 = $_POST["num2"];
    $operacion = $_POST["operacion"];

    calcular($operacion);
}

function calcular($calculo){
    global $numero1, $numero2;

    if (!strcmp("Suma", $calculo)) {
        $resultado = $numero1 + $numero2;
        echo "<p class='resultado'> El resultado es: $resultado</p>";
    } elseif (!strcmp("Resta", $calculo)) {
        $resultado = $numero1 - $numero2;
        echo "<p class='resultado'> El resultado es: $resultado</p>";
    } elseif (!strcmp("Multiplicación", $calculo)) {
        $resultado = $numero1 * $numero2;
        echo "<p class='resultado'> El resultado es: $resultado</p>";
    } elseif (!strcmp("División", $calculo)) {
        $resultado = $numero1 / $numero2;
        echo "<p class='resultado'> El resultado es: $resultado</p>";
    } elseif (!strcmp("Módulo", $calculo)) {
        $resultado = $numero1 % $numero2;
        echo "<p class='resultado'> El resultado es: $resultado</p>";
    } elseif (!strcmp("Incremento", $calculo)) {
        $numero1++;
        $resultado = $numero1;
        echo "<p class='resultado'> El resultado es: $resultado</p>";
    } elseif (!strcmp("Decremento", $calculo)) {
        $numero1--;
        $resultado = $numero1 ;
        echo "<p class='resultado'> El resultado es: $resultado</p>";
    }
}
?>