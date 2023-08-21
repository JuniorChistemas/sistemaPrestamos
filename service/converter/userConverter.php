<?php
include("converter.php");
include("../../model/dto/userD.php");
// include("../../model/entity/userE.php");
    class userConverter extends converter{
        // funcion para convertir a entidad
        public function entidad($dto)
        {
            $entidad = new userEm();
            // el dto acepta texto y por ello al pasar a entidad se debe pasar como int
            $entidad->setIdUsuario(intval($dto->getIdUsuario()));
            // conversion a mayusculas
            $entidad->setNombre(strtoupper($dto->getNombre()));
            $entidad->setApellido(strtoupper($dto->getApellido()));
            // encriptamos la contraseña
            $entidad->setContrasenia(password_hash($dto->getContrasenia(),PASSWORD_BCRYPT));
            // $entidad->setContrasenia($dto->getContrasenia()===null?"":password_hash($dto->getContrasenia(),PASSWORD_BCRYPT));
            $entidad->setFoto($dto->getFoto());
            //              nivel
            $entidad->setNivel(strtolower($dto->getNivel()));
            //              estado
            $entidad->setEstado(intval($dto->getEstado())===1)?true:false;
            return $entidad;
        }
         // funcion para convertir a DTO
        public function dto($entidad)
        {
            // $entidad = new userEm();
            $dto = new userD();
            $dto->setIdUsuario(strlen(strval($entidad->getIdUsuario()))===8?$entidad->getIdUsuario():"0".$entidad->getIdUsuario());
            $dto->setNombre($entidad->getNombre());
            $dto->setApellido($entidad->getApellido());
            // $dto->setContrasenia(($entidad->getNivel()==="administrador")?$entidad->getContrasenia():"*******");
            $dto->setFoto("../../../../usuario/".$entidad->getFoto());
            $dto->setNivel($entidad->getNivel());
            $dto->setEstado((intval($entidad->getEstado())===1)?"ACTIVO":"INACTIVO");
            return $dto;
        }
    }
?>