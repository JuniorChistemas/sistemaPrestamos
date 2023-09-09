<?php
    class loanE{
        private String $idPrestamo;
        private int $idUsuario;
        private int $idCliente;
        private float $cantidad;
        private String $fechaI;
        private String $fechaF;
        private String $garantia;
        private int $interes;
        private bool $estado;
        public function getIdPrestamo(){
            return $this->idPrestamo;
        }
        public function setIdPrestamo(String $idPrestamo){
            $this->idPrestamo=$idPrestamo;
        }
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function setIdUsuario(int $idUsuario){
            $this->idUsuario=$idUsuario;
        }
        public function getIdCliente(){
            return $this->idCliente;
        }
        public function setIdCliente(int $idCliente){
            $this->idCliente = $idCliente;
        }
        public function getCantidad(){
            return $this->cantidad;
        }
        public function setCantidad(float $cantidad){
            $this->cantidad = $cantidad;
        }
        public function getFechaI(){
            return $this->fechaI;
        }
        public function setFechaI(String $fechaI){
            $this->fechaI=$fechaI;
        }
        public function getFechaF(){
            return $this->fechaF;
        }
        public function setFechaF(String $fechaF){
            $this->fechaF = $fechaF;
        }
        public function getGarantia(){
            return $this->garantia;
        }
        public function setGarantia(String $garantia){
            $this->garantia = $garantia;
        }
        public function getInteres(){
            return $this->interes;
        }
        public function setInteres(int $interes){
            $this->interes = $interes;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function setEstado(bool $estado){
            $this->estado = $estado;
        }
    }
?>