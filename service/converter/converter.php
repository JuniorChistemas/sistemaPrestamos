<?php
    abstract class converter{
        // funciones abastractas que ayudan a las clases a convertir y facilitar la fluides de los datos
        public abstract function entidad($dto);
        public abstract function dto($entidad);
    }
?>