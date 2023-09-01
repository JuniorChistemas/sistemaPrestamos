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
            $query = "SELECT * FROM usuario WHERE idUsuario = '$usuario'";
            $resul = $this->conexion->query($query);
            if ($resul->rowCount()>0) {
                $this->row = $resul->fetch(PDO::FETCH_ASSOC);
                return $this->row;
            }
            return null;
        }
    }
    class loginControlador{
        public function login($usuario,$password){
            $usuarioN = new login();
            $getUsuario = $usuarioN->getUsuario(intval($usuario));
            session_start();
            $_SESSION['nivel'] =  $getUsuario['nivel'];
            $_SESSION['nombre'] =  $getUsuario['nombre'];
            $_SESSION['codigo'] = $getUsuario['idUsuario'];
            if ($getUsuario!==null && password_verify($password,$getUsuario['contrasenia'])) {
                echo("entre al sistema");
                echo "<script>window.location.href = '../view/web/principal.php';</script>";
                exit;
            }else{
                echo "<script> alert('DATOS INCORRECTOS') ;</script>";
            }
        }
    }
?>