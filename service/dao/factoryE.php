<?php
    include("../../controller/employee/customerE.php");
    class factoryE extends IDao{
        public function customerClass(): ICustomer{
            return new customerEm();
        }
    }
?>