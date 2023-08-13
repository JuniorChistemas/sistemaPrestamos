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
            echo("---cree el objeto administrador----------");
        }
        public function listar(){
            echo("---------llamo los resultados----------");
            if ($this->Dao->listar()!=null) {
                return $this->Dao->listar();
            }
            return null;
        }
    }
