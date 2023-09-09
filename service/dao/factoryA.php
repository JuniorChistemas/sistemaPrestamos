<?php
    include("../../controller/admin/userA.php");
    include("../../controller/admin/customerA.php");
    include("../../controller/admin/recordA.php");
    include("../../controller/admin/loanA.php");
    include_once("IDao.php");
    class factoryA extends IDao{
        public function userClass(): IUser{
            return new userA();
        }
        public function customerClass(): ICustomer
        {
            return new customerA();
        }
        public function recordClass(): IRecord
        {
            return new recordA();
        }
        public function loanClass():IProxy{
            return new loanA();
        }
    }
?>  