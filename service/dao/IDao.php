<?php
    abstract class IDao{
        public abstract function userClass():IUser;
        public abstract function customerClass():ICustomer;
        public abstract function recordClass():IRecord;
        // patron proxy
        public abstract function loanClass():IProxy;
    }
?>