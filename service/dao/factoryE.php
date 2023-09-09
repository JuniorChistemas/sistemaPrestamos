<?php
    include("../../controller/employee/userE.php");
    include("../../controller/employee/customerEm.php");
    include("../../controller/employee/recordEm.php");
    include("../../controller/employee/loanEm.php");
    include_once("IDao.php");
    class factoryE extends IDao{
        public function userClass() :IUser{
            return new userE();
        }
        public function customerClass(): ICustomer
        {
            return new customerEm();
        }
        public function recordClass(): IRecord{
            return new recordEm();
        }
        public function loanClass():IProxy{
            return new loanEm();
        }
    }
?>