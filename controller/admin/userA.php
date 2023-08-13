<?php
    include("../../service/interface/IUser.php");
    include("../../config/db.php");
    class userA implements IUser{
        private $conexion = null;
        public function __construct()
        {   
            echo("voy a conectarme");
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
            $sentencia = $this->conexion->prepare("SELECT* FROM usuario");
            echo("----ejecuto la sentencia---");
            $sentencia->execute();
            $lista = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
        public function CodigoCliente(){       
        }
    }
?>