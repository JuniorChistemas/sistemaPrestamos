<?php
include_once("../../service/interface/ICustomer.php");
include_once("../../config/db.php");
include_once("../../model/dto/customerD.php");
include_once("../../model/entity/customerE.php");
include_once("../../service/converter/customerConverter.php");
include_once("../../model/validator/customerVal.php");
class customerA implements ICustomer
{
    private $conexion = null;
    public function __construct()
    {
        $this->conexion = db::conectar();
    }
    public function crear($dto)
    {
        $converter = new customerConverter();
        $validar = customerVal::validar($dto);
        if ($validar) {
            $entidad = $converter->entidad($dto);
            $datos = array(
                'idCliente' => $entidad->getIdCliente(),
                'nombre' => $entidad->getNombre(),
                'apellido' => $entidad->getApellido(),
                'celular' => $entidad->getCelular(),
                'domicilio' => $entidad->getDomicilio(),
                'estado' => intval($entidad->isEstado())
            );
            $columnas = implode(', ', array_keys($datos));
            $valores = "'" . implode("', '", array_values($datos)) . "'";
            $query = "INSERT INTO cliente ($columnas) VALUES ($valores)";
            if ($this->conexion->query($query)) {
                return true;
            } else {
                return false;
            }
        } else {
            return $validar;
        }
    }
    public function leer($id)
    {
        $sentencia = $this->conexion->prepare("SELECT* FROM cliente WHERE idCliente=:id");
        $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
        $sentencia->execute();
        $usuarios = array();
        $row = $sentencia->fetch(PDO::FETCH_ASSOC);
        $entidad = new customerE;
        $entidad->setIdCliente($row["idCliente"]);
        $entidad->setNombre($row["nombre"]);
        $entidad->setApellido($row["apellido"]);
        $entidad->setCelular($row["celular"]);
        $entidad->setDomicilio($row["domicilio"]);
        $entidad->setEstado($row["estado"]);
        $converter = new customerConverter();
        $DTO = $converter->dto($entidad);
        $customerDArray[] = $DTO;
        // -----------------
        if (!empty($customerDArray)) {
            $primerCustomerD = $customerDArray[0]; 
            $datosArray = array(
                'IdCliente' => $primerCustomerD->IdCliente,
                'Nombre' => $primerCustomerD->Nombre,
                'Apellido' => $primerCustomerD->Apellido,
                'Celular' => $primerCustomerD->Celular,
                'Domicilio' => $primerCustomerD->Domicilio,
                'Estado' => $primerCustomerD->Estado
            );
            return $datosArray;
        } else {
            return null;
        }
    }
    public function actualizar($dto)
    {
        $converter = new customerConverter();
        $validar = customerVal::validar($dto);
        if ($validar) {
            $entidad = $converter->entidad($dto);
            $query = "UPDATE cliente SET nombre = :nombre, apellido= :apellido, celular = :celular, domicilio = :domicilio, estado = :estado WHERE idCliente = :id";
            $consulta = $this->conexion->prepare($query);
            $consulta->bindParam(':nombre', $entidad->getNombre(), PDO::PARAM_STR);
            $consulta->bindParam(':apellido', $entidad->getApellido(), PDO::PARAM_STR);
            $consulta->bindParam(':celular', $entidad->getCelular(), PDO::PARAM_STR);
            $consulta->bindParam(':domicilio', $entidad->getDomicilio(), PDO::PARAM_STR);
            $consulta->bindParam(':estado', $entidad->isEstado(), PDO::PARAM_INT);
            $consulta->bindParam(':id', $entidad->getIdCliente(), PDO::PARAM_INT);
            try {
                $consulta->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error en la actualización: " . $e->getMessage();
            }
        } else {
            return $validar;
        }
    }
    public function eliminar(string $id)
    {
        $query = "DELETE FROM cliente WHERE idCliente = '$id';";
        echo ($query);
        if ($this->conexion->query($query)) {
            return true;
        }
        return false;
    }
    public function listar()
    {
        // funcion no implementada
    }
    // funcion para que el sistema cree codigos de manera automatica, no implementada
    public function CodigoCliente()
    {
    }
    public function listarDatos()
    {
        $sentencia = $this->conexion->query("SELECT idCliente,nombre,apellido,celular,domicilio,estado FROM cliente");
        $usuarios = array();
        while ($row = $sentencia->fetch(PDO::FETCH_ASSOC)) {
            $entidad = new customerE;
            $entidad->setIdCliente($row["idCliente"]);
            $entidad->setNombre($row["nombre"]);
            $entidad->setApellido($row["apellido"]);
            $entidad->setCelular($row["celular"]);
            $entidad->setDomicilio($row["domicilio"]);
            $entidad->setEstado($row["estado"]);
            $converter = new customerConverter();
            $DTO = $converter->dto($entidad);
            $usuarios[] = $DTO;
        }
        return $usuarios;
    }
}
