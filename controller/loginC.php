<?php
    require_once('../config/db.php');
    class login{
        private $conexion = null;
        private $row;
        public function __construct()
        {
            $this->conexion = db::conectar();
        }
        public function getUsuario($usuario){
            $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
            $resul = $this->conexion->query($query);
            if ($resul->rowCount()>0) {
                $this->row = $resul->fetch(PDO::FETCH_ASSOC);
                return $this->row;
            }
            return null;
        }
        public function getDatos(){
            return $this->row;
        }
    }
    class loginControlador{
        public function login($usuario,$password){
            $usuarioN = new login();
            $getUsuario = $usuarioN->getUsuario($usuario);
            session_start();
            $_SESSION['nivel'] =  $getUsuario['nivel'];
            $_SESSION['usuario'] =  $getUsuario['nombre'];
            $_SESSION['foto'] = $getUsuario['foto'];
            $_SESSION['codigo'] = $getUsuario['idUsuario'];
            if ($getUsuario && password_verify($password,$getUsuario['Contrasenia'])) {
                echo "<script>window.location.href = '../views/Inicio/sistema.php';</script>";
                exit;
            }else{
                echo("hola no entre :(");
            }
        }
        public function cerrar(){
            session_destroy();
            echo "<script>window.location.href = '../views/login.php';</script>";
        }
    }
?>