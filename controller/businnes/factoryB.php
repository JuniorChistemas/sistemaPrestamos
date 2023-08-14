<?php
    // include("customerB.php");
    include("userB.php");
    include("../../service/dao/impFactory.php");
    class factoryB{
        private static $singleton;
        private static $fabrica;
        private function __construct()
        {
            $general = new impFactory();
            // $nivel = $_SESSION['nivel']?? null;
            self::$fabrica = new ($general->Condicional("administrador"));
        }
        private static function inicio(){
            self::$singleton = new self();
        }
        public static function getInicio(): self{
            if (self::$singleton === null) {
                self::inicio();
            }
            return self::$singleton;
        }
        // public function getCliente(): ClienteB{
        //     return new ClienteB(self::$fabrica);
        // }
        public function getUsuario(): UserB{
            return new UserB(self::$fabrica);
        }
        // public function getVenta(): VentaB{
        //     return new VentaB(self::$fabrica);
        // }
    }