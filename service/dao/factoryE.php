<?php
    // include("../../controller/employee/customerEm.php");
    include("../../controller/employee/userE.php");
    include("../interface/IDao.php");
    // require_once("c:/xampp/htdocs/proyecto-1/controller/admin/userA.php");
    // require_once("c:/xampp/htdocs/proyecto-1/service/interface/IDao.php");
    class factoryE extends IDao{
        // public function customerClass(): ICustomer{
        //     return new customerEm();
        // }
        public function userClass() :IUser{
            return new userE();
        }
    }
?>