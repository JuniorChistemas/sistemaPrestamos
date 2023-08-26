<?php
    class customerConverter{
        public function entidad($dto){
            // $dto = new customerD;
            $entidad = new customerE();
            $entidad->setIdCliente(intval($dto->getIdCliente()));
            $entidad->setNombre(strtoupper($dto->getNombre()));
            $entidad->setApellido(strtoupper($dto->getApellido())); 
            $entidad->setCelular(intval($dto->getCelular()));
            $entidad->setDomicilio(strtolower($dto->getDomicilio()));
            $entidad->setEstado(intval($dto->isEstado())===1)?true:false;
            return $entidad;
        }
        public function dto($entidad)
        {
            // $entidad = new customerE();
            $dto = new customerD();
            $dto->setIdCliente(strlen(strval($entidad->getIdCliente()))===8?$entidad->getIdCliente():"0".$entidad->getIdCliente());
            $dto->setNombre($entidad->getNombre());
            $dto->setApellido($entidad->getApellido());
            $dto->setCelular("+51".$entidad->getCelular());
            $dto->setDomicilio($entidad->getDomicilio());
            $dto->setEstado((intval($entidad->isEstado())===1)?"ACTIVO":"INACTIVO");
            return $dto;
        }
    }
?>