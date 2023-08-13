<?php
    class userE{
        private String $idUsuario;
        private String $nombre;
        private String $apellido;
        private String $contrasenia;
        private String $foto;
        private String $nivel;
        private bool $estado;
        // public function __construct(String $idUsuario,String $nombre,String $apellido,String $contrasenia,String $foto, String $nivel,bool $estado)
        // {
        //     $this->idUsuario = $idUsuario;
        //     $this->nombre = $nombre;
        //     $this->apellido = $apellido;
        //     $this->contrasenia = $contrasenia;
        //     $this->foto = $foto;
        //     $this->nivel = $nivel;
        //     $this->estado = $estado;
        // }
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function setIdUsuario(String $idUsuario){
            $this->idUsuario = $idUsuario;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre(String $nombre){
            $this-> nombre = $nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function setApellido(String $apellido){
            $this->apellido = $apellido;
        }
        public function getContrasenia(){
            return $this->contrasenia;
        }
        public function setContrasenia($contrasenia){
            $this->contrasenia = $contrasenia;
        }
        public function getFoto(){
            return $this->foto;
        }
        public function setFoto(String $foto){
            $this->foto = $foto;
        }
        public function getNivel(){
            return $this->nivel;
        }
        public function setNivel(String $nivel){
            $this->nivel = $nivel;
        }
        public function getEstado():bool{
            return $this->estado;
        }
        public function setEstado(bool $estado){
            $this->estado = $estado;
        }
        // public 
    
    }
?>