<?php
    class customerE{
        // este es la clase que se va comunicar con la base de datos
        // el nombre y el apellido se guardaran en mayusculas 
        private String $IdCliente;
        private String $Nombre;
        private String $Apellido;
        private String $Celular;
        private String $Domicilio;
        private bool $Estado;
        public function __construct(String $IdCliente, String $Nombre, String $Apellido, String $Celular, String $Domicilio, bool $Estado){
            $this->IdCliente = $IdCliente;
            $this->Nombre = $Nombre;
            $this->Apellido = $Apellido;
            $this->Celular = $Celular;
            $this->Domicilio = $Domicilio;
            $this->Estado = $Estado;
        }
        public function getIdCliente():String{
            return $this->IdCliente;
        }
        public function getNombre():String{
            return $this->Nombre;
        }
        public function getApellido():String{
            return $this->Apellido;
        }
        public function getCelular():String{
            return $this->Celular;
        }
        public function getDomicilio():String{
            return $this->Domicilio;
        }
        public function isEstado():bool{
            return $this->Estado;
        }
        public function setIdCliente(String $IdCliente){
            $this->IdCliente = $IdCliente;
        }
        public function setNombre(String $Nombre){
            $this->Nombre = $Nombre;
        }
        public function setApellido(String $Apellido){
            $this->Apellido = $Apellido;
        }
        public function setCelular(String $Celular){
            $this->Celular = $Celular;
        }
        public function setDomicilio(String $Domicilio){
            $this->Domicilio = $Domicilio;
        }
        public function setEstado(bool $Estado){
            $this->Estado = $Estado;
        }
    }
?>