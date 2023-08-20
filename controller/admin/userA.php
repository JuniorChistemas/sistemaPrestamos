<?php
    include("../../service/interface/IUser.php");
    include("../../config/db.php");
    include("../../model/entity/userE.php");
    include("../../service/converter/userConverter.php");
    include("../../model/validator/userVal.php");
    class userA implements IUser{
        private $conexion = null;
        public function __construct()
        {   
            $this->conexion = db::conectar();
        }
        public function crear($dto){
            $converter = new userConverter();
            $validar = userVal::validar($dto);
            // $entidad = $converter->entidad($dto);
            if($validar){
                    $entidad = $converter->entidad($dto);
                    $datos = array(
                    'idUsuario' => $entidad->getIdUsuario(),
                    'nombre' => $entidad->getNombre(),
                    'apellido' => $entidad->getApellido(),
                    'contrasenia' => $entidad->getContrasenia(),
                    'foto' => $entidad->getFoto(),
                    'nivel' => $entidad->getNivel(),
                    'estado' => intval($entidad->getEstado())
                    );
                $columnas = implode(', ', array_keys($datos));
                $valores = "'" . implode("', '", array_values($datos)) . "'";           
                $query = "INSERT INTO usuario ($columnas) VALUES ($valores)"; 
                echo($query);
                if ($this->conexion->query($query) === false) {
                    return false;
                }else{
                    return true;
                }
            }else{
                return $validar;
            }
        }
        public function leer($id)
        {           
        }
        public function actualizar($entidad){
        }
        public function eliminar(string $id){
            $query = "DELETE FROM usuario WHERE idUsuario = '$id';";
            if ($this->conexion->query($query)) {
                return true;
            }
            return false;
        }
        public function listar(){
            $sentencia = $this->conexion->prepare("SELECT* FROM usuario");
            $sentencia->execute();
            $lista = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
        public function listarDatos(){
            $sentencia = $this->conexion->query("SELECT idUsuario,nombre,apellido,nivel,estado FROM usuario");
            $usuarios = array();
            while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)){
                $entidad = new userEm();
                $entidad->setIdUsuario($row["idUsuario"]);
                $entidad->setNombre($row["nombre"]);
                $entidad->setApellido($row["apellido"]);
                $entidad->setNivel($row["nivel"]);
                $entidad->setEstado($row["estado"]);
                $converter = new userConverter();
                $DTO = $converter->dto($entidad);
                $usuarios[] = $DTO; 
            }
            return $usuarios;
        }
        public function CodigoCliente(){       
        }
    }
