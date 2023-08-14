<?php
    // include('../../service/dao/factoryE.php');
    // include('../../service/dao/factoryA.php');
    // include("../../service/dao/impFactory.php");
    include("../../service/interface/IDao.php");
    class userB{
        private $Dao;
        public function __construct(IDao $obj)
        {
            $this->Dao = ($obj->userClass()); 
        }
        public function listar(){
            if ($this->Dao->listarDatos()!=null) {
                // print_r($this->Dao->listarDatos());
                return $this->Dao->listarDatos();
            }
            return null;
        }
    }
