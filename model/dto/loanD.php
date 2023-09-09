<?php
    class loanD{
        private String $idPrestamo;
        private String $idUsuario;
        private String $idCliente;
        private String $cantidad;
        private String $fechaI;
        private String $fechaF;
        private String $garantia;
        private String $interes;
        private String $estado;
        public function getIdPrestamo(){
            return $this->idPrestamo;
        }
        public function setIdPrestamo(String $idPrestamo){
            $this->idPrestamo=$idPrestamo;
        }
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function setIdUsuario(String $idUsuario){
            $this->idUsuario=$idUsuario;
        }
        public function getIdCliente(){
            return $this->idCliente;
        }
        public function setIdCliente(String $idCliente){
            $this->idCliente = $idCliente;
        }
        public function getCantidad(){
            return $this->cantidad;
        }
        public function setCantidad(String $cantidad){
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
        public function setInteres(String $interes){
            $this->interes = $interes;
        }
        public function getEstado(){
            return $this->estado;
        }
        public function setEstado(String $estado){
            $this->estado = $estado;
        }
    }
?>