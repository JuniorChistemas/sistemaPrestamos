<?php
    class recordB{
        private $Dao;
        public function __construct(IDao $obj)
        {
            $this->Dao = ($obj->recordClass()); 
        }
        // TABLA CLIENTE PARA ALMACENAR HISTORIAL
        public function agregarCliente(){
            $accion = 'se agrego un cliente nuevo';
            try {
                $this->Dao->agregar($accion);
            } catch (\Throwable $th) {
            }
        }
        public function actualizarCliente($accion){
            // $accion = 'se agrego un cliente nuevo';
            try {
                $this->Dao->agregar($accion);
            } catch (\Throwable $th) {
            }
        }
        public function eliminarCliente(){
            $accion = 'se elimino un cliente nuevo';
            try {
                $this->Dao->agregar($accion);
            } catch (\Throwable $th) {
            }
        }
        // **********************************************************************************************
        public function agregarUsuario(){
            $accion = 'se agrego un cliente nuevo';
            try {
                $this->Dao->agregar($accion);
            } catch (\Throwable $th) {
            }
        }
    }
?>