<?php
    include("factoryA.php");
    // include("factoryE.php");
    class impFactory{
        public function condicional($nivel){
            switch ($nivel) {
                case 'administrador':
                    return new factoryA();
                    // echo("hola2");
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