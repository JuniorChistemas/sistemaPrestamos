<?php
    class recordB{
        private $Dao;
        public function __construct(IDao $obj)
        {
            $this->Dao = ($obj->recordClass()); 
        }
        // TABLA CLIENTE PARA ALMACENAR HISTORIAL
        public function historial($accion){
            try {
                $this->Dao->agregar($accion);
            } catch (\Throwable $th) {
            }
        }
        public function listar(){
            if ($this->Dao->Listar()!=null) {
                return $this->Dao->Listar();
            }
            return null;
        }
        
    }
?>