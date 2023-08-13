<?php
    include('../../service/dao/factoryE.php');
    include('../../service/dao/factoryA.php');
    class customerB{
        private $Dao;
        public function __construct(IDao $obj)
        {
            $this->Dao = ($obj->userClass()); 
        }
        public function listar(){
            if ($this->Dao->listar()!=null) {
                return $this->Dao->listar();
            }
            return null;
    }
    }
?>