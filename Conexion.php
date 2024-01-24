<?php

    require ("config.php");

    class Conexion {
        protected $conexion_db;
    
        public function __construct() {

            //con PDO


            try{

                $this->conexion_db = new PDO('mysql:host=localhost;dbname=pruebas', 'root', '');

                $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion_db->exec("SET CHARACTER SET utf8");
                return $this->conexion_db;

            }catch (Exception $e){

                echo "La linea de error es: " . $e->getline();
            }



            // con mysqli
            // $this->conexion_db = new mysqli(DB_HOST, DB_USER, DB_CONTRA, DB_NOMBRE);
    
            // if ($this->conexion_db->connect_errno) {
            //     echo "Fallo al conectar a MySql: " . $this->conexion_db->connect_error;
            //     return;
            // }
    
            // $this->conexion_db->set_charset(DB_CHARSET);
        }
    }
    

?>