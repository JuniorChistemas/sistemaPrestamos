<?php
    // require_once("c:/xampp/htdocs/proyecto-1/dao/factoryA.php");
    // require_once("factoryE.php");
    // include("../interface/IDao.php");
    include("factoryA.php");
    class impFactory{
        public function condicional($nivel){
            switch ($nivel) {
                case 'administrador':
                    echo("----------holaa---------");
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