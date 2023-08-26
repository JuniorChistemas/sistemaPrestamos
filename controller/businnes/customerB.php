<?php
    // include('../../service/dao/factoryE.php');
    // include('../../service/dao/factoryA.php');
    // include("../../service/interface/IDao.php");
    class customerB{
        private $Dao;
        public function __construct(IDao $obj)
        {
            $this->Dao = ($obj->customerClass()); 
        }
        public function listar(){
            if ($this->Dao->listarDatos()!=null) {
                return $this->Dao->listarDatos();
            }
            return null;
        }   
    }
?>