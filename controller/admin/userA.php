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
            $sentencia = $this->conexion->prepare("SELECT nombre,apellido,nivel,estado,foto FROM usuario WHERE idUsuario=:id");
            $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
            $sentencia->execute();      
            $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
            // echo($fila['nombre']);
            return $fila;
        }
        public function actualizar($dto){
            $converter = new userConverter();
            $validar = userVal::validar($dto);
            if($validar){
                $entidad = $converter->entidad($dto);
                $query = "UPDATE usuario SET nombre = :nombre, apellido = :apellido, nivel = :nivel, estado = :estado, foto = :foto, contrasenia = :contrasenia WHERE idUsuario = :id";
                $consulta = $this->conexion->prepare($query);
                $consulta->bindParam(':nombre', $entidad->getNombre(),PDO::PARAM_STR);
                $consulta->bindParam(':apellido', $entidad->getApellido(),PDO::PARAM_STR);
                $consulta->bindParam(':nivel', $entidad->getNivel(),PDO::PARAM_STR);
                $consulta->bindParam(':estado', $entidad->getEstado(),PDO::PARAM_INT);
                $consulta->bindParam(':foto', $entidad->getFoto(),PDO::PARAM_STR);
                $consulta->bindParam(':contrasenia', $entidad->getContrasenia(),PDO::PARAM_STR);
                $consulta->bindParam(':id', $entidad->getIdUsuario(),PDO::PARAM_STR);
                try {
                    $consulta->execute();
                    return true;
                } catch (PDOException $e) {
                    echo "Error en la actualización: " . $e->getMessage();
                }
            }else{
                return $validar;
            }
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
