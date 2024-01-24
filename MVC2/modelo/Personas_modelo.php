<?php
class Personas_model {
    private $db;
    private $personas;

    public function __construct() {
        require_once("modelo/Conectar.php");
        $this->db = Conectar::conexion();
        $this->personas = array();
    }

    public function get_personas($empezar_desde, $tamagno_pagina) {
        $consulta = $this->db->prepare("SELECT * FROM datos_usuarios LIMIT $empezar_desde, $tamagno_pagina");
        $consulta->execute();

        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->personas[] = $filas;
        }
        
        return $this->personas;
    }
}

?>