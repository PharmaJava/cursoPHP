<?php

class Compra_vehiculo {

    private $precio_base;

    static $ayuda = 4500;

    public function __construct($gama) {
        if ($gama == "urbano") {
            $this->precio_base = 10000;
        } else if ($gama == "compacto") {
            $this->precio_base = 20000;
        } else if ($gama == "berlina") {
            $this->precio_base = 30000;
        }
    }

	static function descuento_gobierno(){

		if (date("m-d-y")> "12-08-2023"){
			self::$ayuda=4500;
		}
	}

    public function climatizador() {
        $this->precio_base += 2000;
    }

    public function navegador_gps() {
        $this->precio_base += 2500;
    }

    public function tapiceria_cuero($color) {
        if ($color == "blanco") {
            $this->precio_base += 3000;
        } else if ($color == "beige") {
            $this->precio_base += 3500;
        } else {
            $this->precio_base += 5000;
        }
    }

    public function precio_final() {
        return $this->precio_base - self::$ayuda;//para hacer referencia a una variable estatica
    }
}

?>