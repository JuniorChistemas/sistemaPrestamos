<?php
include("../../service/interface/ICustomer.php");
    class customerA implements ICustomer{
        public function __construct()
        {
        }
        public function crear($entidad){
        }
        public function leer($id)
        {           
        }
        public function actualizar($entidad){
        }
        public function eliminar(string $id){
        }
        public function listar(){
            // $sentencia = $this->conexion->prepare("SELECT* FROM cliente");
            // $sentencia->execute();d
            // $lista = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            // return $lista;
        }
        public function CodigoCliente(){       
        }
    }
?>