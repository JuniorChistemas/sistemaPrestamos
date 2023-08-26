<?php
    include("factoryA.php");
    include("factoryE.php");
    class impFactory{
        public function condicional($nivel){
            switch ($nivel) {
                case 'administrador':
                    return new factoryA();
                    break;
                case 'empleado':
                    return new factoryE();
                default:
                    return new factoryA();
                    break;
            }
        }
    }
?>