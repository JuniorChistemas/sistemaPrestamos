<?php
    include("converter.php");
    class recordConverter extends converter{
        public function entidad($dto)
        {
            $entidad = new recordE();
            $entidad->setIdHistorial($dto->getIdHistorial());
            $fechaObjeto = new DateTime($dto->getFecha());
            // formato
            $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:s');
            $entidad->getFecha($dto->getFecha($fechaFormateada));
            $entidad->setNombre($dto->getNombre());
            $entidad->setAccion($dto->getAccion());
            return $entidad;
        }
        public function dto($entidad)
        {
            $dto = new recordD();
            // $entidad = new recordE();
            $dto->setIdHistorial($entidad->getIdHistorial());
            // fecha
            $fechaObjeto = new DateTime($entidad->getFecha());
            // formato
            $fechaFormateada = $fechaObjeto->format('d \d\e F \d\e Y, g:i A');
            $dto->setFecha($fechaFormateada);
            $dto->getNombre($entidad->getNombre());
            $dto->getAccion($entidad->getAccion());
            return $dto;
        }
    }
?>