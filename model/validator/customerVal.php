<?php
    class customerVal{
        public static function validar(customerD $entity){
            if(empty($entity->getNombre()) || (!preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/', $entity->getNombre()))){
                // echo("El nombre es obligatorio y solo se debe escribir letras o espacios");
                return false;
            }
            if(empty($entity->getApellido()) || (!preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/', $entity->getApellido()))){
                // echo("El apellido es obligatorio y solo se debe escribir letras o espacios");
                return false;
            }
            // validaciones para el DNI
            if(strlen($entity->getIdCliente())!==8){
                // echo("El número no debe exceder de 8 dígitos. el primer numero es: ".$entity->getIdCliente());
                return false;
            }
            if(strlen($entity->getCelular())!==9){
                // echo("El número no debe exceder de 9 dígitos ");
                return false;
            }
            return true;
        }
    }
?>