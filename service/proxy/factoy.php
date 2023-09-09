<?php
    class factory{
        // con esto garantizamos que siempre se creara el proxy en lugar del proceso principal como hace suponer. Esta clase no la vamos a utilizar ya que nosotros estamos trbaajando con un abstract factory y con ello ya garantizamos que llamaremos a la clase adecuada.
        // public static function Proceso():IProxy{
        //     return new loanA();
        // }
    }
?>