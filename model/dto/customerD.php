<?php
    class customerD{
        public String $IdCliente;
        public String $Nombre;
        public String $Apellido;
        public String $Celular;
        public String $Domicilio;
        public String $Estado;
        // public function __construct(String $IdCliente, String $Nombre, String $Apellido, String $Celular, String $Domicilio, String $Estado){
        //     $this->IdCliente = $IdCliente;
        //     $this->Nombre = $Nombre;
        //     $this->Apellido = $Apellido;
        //     $this->Celular = $Celular;
        //     $this->Domicilio = $Domicilio;
        //     $this->Estado = $Estado;
        // }
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
        public function isEstado():String {
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
        public function setEstado(String $Estado){
            $this->Estado = $Estado;
        }
    }
?>