<?php
    include_once("converter.php");
    include("../../model/dto/recordD.php");
    class recordConverter extends converter{
        public function entidad($dto)
        {
            $entidad = new recordE();
            $entidad->setIdHistorial($dto->getIdHistorial());
            $fechaObjeto = new DateTime($dto->getFecha());
            // formato
            $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:s');
            $entidad->setFecha($fechaFormateada);
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
            // el formato para español se debe de habilitar una extencion en el servidor xammp 
            $localizador = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE, null, null, 'dd \'de\' MMMM \'de\' y, h:mm a');
            $fechaFormateada = $localizador->format($fechaObjeto);
            $dto->setFecha($fechaFormateada);
            $dto->setNombre($entidad->getNombre());
            $dto->setAccion($entidad->getAccion());
            return $dto;
        }
    }
?>