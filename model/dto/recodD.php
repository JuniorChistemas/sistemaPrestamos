<?php
    class recordD{
        public String $idHistorial;
        public String $fecha;
        public String $nombre;
        public String $accion;
        public function getIdHistorial(){
            return $this->idHistorial;
        }
        public function setIdHistorial(String $idHistorial){
            $this->idHistorial = $idHistorial;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function setFecha(String $fecha){
            $this->fecha = $fecha;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre(String $nombre){
            $this->nombre = $nombre;
        }
        public function getAccion(){
            return $this->accion;
        }
        public function setAccion(String $accion){
            $this->accion = $accion;
        }
    }
?>