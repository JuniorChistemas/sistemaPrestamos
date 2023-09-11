<?php
    include_once("converter.php");
    include_once("../../model/dto/loanD.php");
    class loanConverter extends converter{
        public function entidad($dto)
        {
            $entidad = new loanE();
            $entidad->setIdUsuario(intval($dto->getIdUsuario()));
            $entidad->setIdCliente(intval($dto->getIdCliente()));
            $entidad->setCantidad(floatval($dto->getCantidad()));
            // Obtenemos fecha y pasamos a un formato apropiado para la base de datos
            date_default_timezone_set('America/Lima');
            $fechaObjeto = new DateTime();
            $fechaFormateada = $fechaObjeto->format('Y-m-d');
            $entidad->setFechaI($fechaFormateada);
            // agregamos los dias especificados por los requerimientos
            $fechaObjeto->modify("+28 days");
            $fechaFinal = $fechaObjeto->format('Y-m-d');
            // 
            $entidad->setFechaF($fechaFinal);
            $entidad->setGarantia($dto->getGarantia());
            $entidad->setInteres(intval($dto->getInteres()));
            $entidad->setEstado(intval($dto->getEstado())===1)?true:false;
            return $entidad;
        }
        public function dto($entidad)
        {
        }
    }
?>