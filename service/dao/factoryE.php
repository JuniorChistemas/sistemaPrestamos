<?php
    include("../../controller/employee/userE.php");
    include("../interface/IDao.php");
    class factoryE extends IDao{
        public function userClass() :IUser{
            return new userE();
        }
    }
?>