<?php
    include_once("../../config/db.php");
    include_once("../../service/interface/IRecord.php");
    include("../../model/entity/recordE.php");
    class recordA implements IRecord{
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
        public function agregar(String $accion)
        {
            // obtenemos la fecha actual
            date_default_timezone_set('America/Lima');
            $fechaObjeto = new DateTime();
            $fechaHoraActual = $fechaObjeto->format('Y-m-d H:i:s');
            // guardamos datos
            $entidad = new recordE();
            $entidad->setFecha($fechaHoraActual);
            $entidad->setNombre($_SESSION['nombre']);
            $entidad->setAccion($accion);
            $datos = array(
                'fecha' =>  $entidad->getFecha(),
                'usuario' =>  $entidad->getNombre(),
                'accion' => $entidad->getAccion()
            );
            $columnas = implode(', ', array_keys($datos));
            $valores = "'" . implode("', '", array_values($datos)) . "'";           
            $query = "INSERT INTO historial ($columnas) VALUES ($valores)"; 
            echo($query);
            if($this->conexion->query($query)){
                $entidad==null;
                return true;
            }else{
                return false;
            }
        }
    }
?>