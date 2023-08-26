<?php
    include("../../controller/employee/userE.php");
    include("../../controller/employee/customerEm.php");
    include_once("IDao.php");
    class factoryE extends IDao{
        public function userClass() :IUser{
            return new userE();
        }
        public function customerClass(): ICustomer
        {
            return new customerEm();
        }
    }
?>