<?php
    include_once("../../config/db.php");
    include_once("../../service/interface/IRecord.php");
    include_once("../../service/converter/recordConverter.php");
    class recordEm implements IRecord{
        private $conexion = null;
        public function __construct()
        {
            $this->conexion = db::conectar();
        }
        public function Eliminar()
        {
            
        }
        public function Listar()
        {
            $sentencia = $this->conexion->query("SELECT idHistorial,fecha,usuario,accion FROM historial");
            $historial = array();
            while ($row=$sentencia->fetch(PDO::FETCH_ASSOC)) {
                $record = new recordE();
                $record->setIdHistorial($row["idHistorial"]);
                $record->setFecha($row["fecha"]);
                $record->setNombre($row["usuario"]);
                $record->setAccion(($row["accion"]));
                $converter = new recordConverter();
                $DTO = $converter->dto($record);
                $historial[] = $DTO;
            }
            return $historial;
        }
        public function agregar($entidad)
        {
            
        }
    }
?>