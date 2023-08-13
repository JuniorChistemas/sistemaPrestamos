<?php
// es este archivo debemos de configurar los datos para conectar a la base de datos
    class db{
        private static $conexion;
        public static function conectar(){
            $servidor="localhost";
            $nombre = "financiera";
            $usuario = "root";
            // cambiar contraseña y si no tiene dejar en blanco
            $contrasenia ="19151423";
            try {
                self::$conexion = new PDO("mysql:host=$servidor;dbname=$nombre",$usuario,$contrasenia);
                echo("---conecto a la base de datos");
                return self::$conexion;
            } catch (Exception $e) {
                echo($e->getMessage());
            }
        }
        // esto posiblemente no va ya que PDO se cierra automaticamente.
        public static function cerrar(){
            if(self::$conexion){
                try {
                    mysqli_close(self::$conexion);
                    self::$conexion=null;
                } catch (\Throwable $th) {
                }
            }
        }
    }
?>