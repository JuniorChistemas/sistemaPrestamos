<?php
interface ICustomer {
    public function crear($entidad);
    public function leer($id);
    public function actualizar($entidad);
    public function eliminar(String $id);
    public function listar();
    public function listarDatos();
    public function CodigoCliente();
}
?>