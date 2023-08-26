<?php
    include_once("../../service/interface/IUser.php");
    include_once("../../config/db.php");
    class userE implements IUser{
        private $conexion = null;
        public function __construct()
        {   
            $this->conexion = db::conectar();
        }
        public function crear($dto){
            echo("ingrese aqui");
        }
        public function leer($id)
        {           
        }
        public function actualizar($entidad){
        }
        public function eliminar(string $id){
        }
        public function listar(){
            $sentencia = $this->conexion->prepare("SELECT* FROM usuario");
            $sentencia->execute();
            $lista = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
        public function listarDatos()
        {
            $sentencia = $this->conexion->query("SELECT idUsuario,nombre,apellido,nivel,estado,foto FROM usuario");
            $usuarios = array();
            while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)){
                $entidad = new userEm();
                $entidad->setIdUsuario($row["idUsuario"]);
                $entidad->setNombre($row["nombre"]);
                $entidad->setApellido($row["apellido"]);
                $entidad->setNivel($row["nivel"]);
                $entidad->setEstado($row["estado"]);
                $entidad->setFoto($row["foto"]);
                $converter = new userConverter();
                $DTO = $converter->dto($entidad);
                $usuarios[] = $DTO; 
            }
            return $usuarios;
        }
        public function CodigoCliente(){       
        }
    }
?>