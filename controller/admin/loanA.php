<?php
include_once("../../service/interface/IProxy.php");
include_once("../../config/db.php");
include("../../model/dto/loanD.php");
include("../../model/entity/loanE.php");
include("../../service/converter/loanConverter.php");
// include("../../model/validator/customerVal.php");
// en esta clase se establece el preProceso en el cual se ejecutara antes de la accion principal
class process1
{
    private $conexion = null;
    public function __construct()
    {
        $this->conexion = db::conectar();
    }
    private function suma($id){
        try {
            $sentencia = $this->conexion->prepare("SELECT SUM(cantidad) AS suma FROM prestamo WHERE idCliente:id");
            $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
            $sentencia->execute();
            $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
            $num = intval($fila['suma']);
            if ($num<=3000) {
                return true;
            }else{
                return false;
            }
            return $num;
        } catch (\Throwable $th) {
            return -1;
        }
    }
    private function estado($id){
        try {
            $sentencia = $this->conexion->prepare("SELECT estado FROM cliente WHERE idCliente:id");
            $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
            $sentencia->execute();
            $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
            $num = intval($fila['estado']);
            if ($num===1) {
                return true;
            }else{
                return false;
            }
            return $num;
        } catch (\Throwable $th) {
            return -1;
        }
    }
    public function aprobar($id){
        if ($this->suma($id)&&$this->estado($id)) {
            return true;
        }else{
            return false;
        }
    }
}
// el proceso principal para cuando se crea un nuevo registro
class process2 implements IProxy
{
    private $conexion = null;
    public function __construct()
    {
        $this->conexion = db::conectar();
    }
    // creamos 3 metodos para generar mas consumo y en el cual se comsumira si en el proceso 1 ha pasado el filtro y de no ser así el proceso 2 nunca utilizara recursos.
    private function cantidad()
    {
        try {
            $sentencia = $this->conexion->prepare("SELECT COUNT(*) AS numFilas FROM prestamo");
            $sentencia->execute();
            $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
            $num = intval($fila['numFilas']) + 1;
            return $num;
        } catch (\Throwable $th) {
            return -1;
        }
    }
    private function codigo():String{
        try {
            $codigo = $this->generarCodigo()."-".$this->cantidad();
            return $codigo;
        } catch (\Throwable $th) {
            
        }
    }
    private function generarCodigo()
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitudCodigo = 3;
        $codigo = '';

        for ($i = 0; $i < $longitudCodigo; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }

        return $codigo;
    }
    public function llamarProcesos($dto)
    {
        $converter = new loanConverter();
        $entidad = $converter->entidad($dto);
        $datos = array(
            'idPrestamo' => $this->codigo(),
            'idUsuario' => $entidad->getIdUsuario(),
            'idCliente' => $entidad->getIdCliente(),
            'cantidad' => $entidad->getCantidad(),
            'fechaI' => $entidad->getFechaI(),
            'fechaF' => $entidad->getFechaF(),
            'garantia' => $entidad->getGarantia(),
            'interes' => $entidad->getInteres(),
            'estado' => $entidad->getEstado()
        );
        $columnas = implode(', ', array_keys($datos));
        $valores = "'" . implode("', '", array_values($datos)) . "'";
        $query = "INSERT INTO prestamo ($columnas) VALUES ($valores)";
        if ($this->conexion->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
// proceso pos que se lanza despues del proceso principal, este proceso quiero agregar metodos que ayuden a crear el PDF o a consumir una API para enviar mensaje al cliente.
class process3
{
// por implementar
}
class loanA implements IProxy
{
    // este es el proceso que el usuario ejecutara
    public function llamarProcesos($dto)
    {
        $proceso1 = new process1();
        if ($proceso1->aprobar($dto->getIdCliente())) {
            $proceso2 = new Process2();
            if ($proceso2->llamarProcesos($dto)) {
                // llamamos al proceso 3 proximamente
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
