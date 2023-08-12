<?php
    include("factoryA.php");
    include("factoryE.php");
    class impFactory{
        public function condicional($nivel){
            switch ($nivel) {
                case 'Administrador':
                    return new factoryA();
                    break;
                case 'Empleado':
                    return new factoryE();
                default:
                    return null;
                    break;
            }
        }
    }
?>