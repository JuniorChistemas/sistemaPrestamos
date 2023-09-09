<?php
include_once("../../service/interface/ILoan.php");
include_once("../../config/db.php");
class loanEm implements IProxy
{
    private $conexion = null;
    public function __construct()
    {
        $this->conexion = db::conectar();
    }
    public function crear($dto)
    {
    }
    public function leer($id)
    {
    }
    public function actualizar($dto)
    {
    }
    public function eliminar(string $id)
    {
    }
    public function CodigoCliente()
    {
    }
    public function listarDatos()
    {
    }
    public function llamarProcesos($estado)
    {
        
    }
}
