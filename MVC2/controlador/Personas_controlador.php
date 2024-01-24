<?php
 require_once("modelo/Personas_modelo.php");

 $persona = new Personas_model();
 $matrizPersonas = $persona->get_personas($empezar_desde, $tamagno_pagina);
 
 require_once("vista/Personas_view.php");
 

?>
