<?php
    // include("../../controller/admin/customerA.php");
    include("../../controller/admin/userA.php");
    // include("../interface/IDao.php");
    // include("../interface/IUser.php");
    // require_once("c:/xampp/htdocs/proyecto-1/service/interface/IDao.php");
    class factoryA extends IDao{
        public function userClass(): IUser{
            echo("---------inicializo");
            return new userA();
        }
    }
?>