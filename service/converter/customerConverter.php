<?php
    class customerConverter{
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