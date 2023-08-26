<?php
    abstract class IDao{
        public abstract function userClass():IUser;
        public abstract function customerClass():ICustomer;
    }
?>