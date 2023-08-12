<?php
    include("ICustomer.php");
    abstract class IDao{
        public abstract function customerClass():ICustomer;
    }
?>