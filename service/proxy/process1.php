<?php
    class process1{
        public function verififacer($estado):bool{  
            // aqui es el pre accion que se lanazara antes de iniciar el proceso principal
            if($estado===1){
                return true;
            }else{
                return false;
            }
        }
    }
?>