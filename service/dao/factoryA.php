<?php
    include("../../controller/admin/customerA.php");
    class factoryA extends IDao{
        public function customerClass(): ICustomer{
            return new customerA();
        }
    }
?>