<?php
    include("../../controller/admin/userA.php");
    include("../../controller/admin/customerA.php");
    include_once("IDao.php");
    class factoryA extends IDao{
        public function userClass(): IUser{
            return new userA();
        }
        public function customerClass(): ICustomer
        {
            return new customerA();
        }
    }
?>  