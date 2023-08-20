<?php
    include("../../controller/admin/userA.php");
    class factoryA extends IDao{
        public function userClass(): IUser{
            return new userA();
        }
    }
?>