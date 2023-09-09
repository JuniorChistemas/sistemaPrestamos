<?php
    class userVal{
        public static function validar(userD $entity){
            if(empty($entity->getNombre()) || (!preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/', $entity->getNombre()))){
                // echo("El nombre es obligatorio y solo se debe escribir letras o espacios");
                return false;
            }
            if(empty($entity->getApellido()) || (!preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/', $entity->getApellido()))){
                // echo("El apellido es obligatorio y solo se debe escribir letras o espacios");
                return false;
            }
            if(empty($entity->getContrasenia())){
                // echo("Contraseña es un campo obligatorio");
                return false;
            }
            // validaciones para el DNI
            if(strlen($entity->getIdUsuario())>8){
                // echo("El número no debe exceder de 8 dígitos. el primer numero es: ".$entity->getIdUsuario());
                return false;
            }
            return true;
        }
    }
?>