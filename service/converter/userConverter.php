<?php
include("converter.php");
include("../../model/dto/userD.php");
    class userConverter extends converter{
        // funcion para convertir a entidad
        public function entidad($dto)
        {
            // private String $idUsuario;
            // private String $nombre;
            // private String $apellido;
            // private String $contrasenia;
            // private String $foto;
            // private String $nivel;
            // private bool $estado;
            $entidad = new userEm();
            // el dto por acepta numeros y por ello se al pasar a entidad se debe pasar como texto
            $entidad->setIdUsuario(strval($dto->getIdUsuario()));
            // conversion a mayusculas
            $entidad->setNombre(strtoupper($dto->getNombre()));
            $entidad->setApellido(strtoupper($dto->getApellido()));
            // encriptamos la contraseña
            $entidad->setContrasenia(password_hash($dto->getContrasenia(),PASSWORD_BCRYPT));
            //                          tratamiento de foto 
            // $entity->setFoto(isset($_FILES["foto"]['name'])?$_FILES["foto"]['name']:"");   
            // $fecha = new DateTime();
            // $NombreFoto = ($entity->getFoto()!='')?$fecha->getTimestamp()."_".$_FILES["foto"]['name']:"";
            // $fotoTemp = $_FILES["foto"]['tmp_name'];
            // $destino = "../../public/img/imgUsuarios/$NombreFoto";
            // if ($fotoTemp!='') {
            //     move_uploaded_file($fotoTemp,$destino);
            // }
            // $entidad->setFoto(isset($_FILES[$dto->getFoto()]['name'])?$_FILES[$dto->getFoto()]['name']:"");
            // $fecha = new DateTime();
            // $nombreFoto = $entidad->getFoto()
            $entidad->setFoto($dto->getFoto());
            //              nivel
            $entidad->setNivel(strtolower($dto->getNivel()));
            //              estado
            if($dto->getEstado()==="ACTIVO"){
                $entidad->setEstado(1);
            }else{
                $entidad->setEstado(0);
            }
            return $entidad;
        }
         // funcion para convertir a DTO
        public function dto($entidad)
        {
            // $entidad = new userEm();
            $dto = new userD();
            $dto->setIdUsuario(intval($entidad->getIdUsuario()));
            $dto->setNombre($entidad->getNombre());
            $dto->setApellido($entidad->getApellido());
            // $dto->setContrasenia(($entidad->getNivel()==="administrador")?$entidad->getContrasenia():"*******");
            // $dto->setFoto($entidad->getFoto());
            $dto->setNivel($entidad->getNivel());
            $dto->setEstado((intval($entidad->getEstado())===1)?"ACTIVO":"INACTIVO");
            return $dto;
        }
    }
?>