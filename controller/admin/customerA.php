<?php
include_once("../../service/interface/ICustomer.php");
include_once("../../config/db.php");
include("../../model/dto/customerD.php");
include("../../model/entity/customerE.php");
include("../../service/converter/customerConverter.php");
    class customerA implements ICustomer{
        private $conexion = null;
        public function __construct()
        {
            $this->conexion = db::conectar();
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
        public function listarDatos()
        {
            $sentencia = $this->conexion->query("SELECT idCliente,nombre,apellido,celular,domicilio,estado FROM cliente");
            $usuarios = array();
            while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)){
                $entidad = new customerE;
                $entidad->setIdCliente($row["idCliente"]);
                $entidad->setNombre($row["nombre"]);
                $entidad->setApellido($row["apellido"]);
                $entidad->setCelular($row["celular"]);
                $entidad->setDomicilio($row["domicilio"]);
                $entidad->setEstado($row["estado"]);
                $converter = new customerConverter();
                $DTO = $converter->dto($entidad);
                $usuarios[] = $DTO; 
            }
            return $usuarios;
        }
    }
?>