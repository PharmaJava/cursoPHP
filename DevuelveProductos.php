<?php

    require "Conexion.php";


    class DevuelveProductos extends Conexion{

        public function DevuelveProducto() {

            parent::__construct() ;   
    }

    public function get_productos($dato){

        $sql= "SELECT * FROM PRODUCTOS WHERE PAIS_ORIGEN='" .$dato . "'";

        $sentencia=$this->conexion_db->prepare($sql);

        $sentencia->execute(array());

        $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        $sentencia->closeCursor();

        return $resultado;

        $this->conexion_db=null;


        // $resultado=$this->conexion_db->query('SELECT * FROM PRODUCTOS WHERE PAIS_ORIGEN="' . $dato . '"');  

        // $productos= $resultado->fetch_all(MYSQLI_ASSOC);

        // return $productos;
    }
    }

?>