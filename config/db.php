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
                return self::$conexion;
            } catch (Exception $e) {
                echo($e->getMessage());
            }
        }
        // aqui agregaremos la sentencia sql para ir agregando datos al historial, regresaremos aqui si no podemos hacer lo pensado
        // public static function historial($accion){

        // }
    }
?>