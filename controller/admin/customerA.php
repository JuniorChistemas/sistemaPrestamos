<?php
include_once("../../service/interface/ICustomer.php");
include_once("../../config/db.php");
include("../../model/dto/customerD.php");
include("../../model/entity/customerE.php");
include("../../service/converter/customerConverter.php");
include("../../model/validator/customerVal.php");
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
                // aqui podemos agregar el historial a la tabla de registro pero antes de ello necesitamos el login implementado para utilizar variables globales
                //     $nivelUsuario = $_SESSION['nivel'] ?? null;
                // $Usuario = $_SESSION['nombre'] ?? null;
                // $codigo = $_SESSION['idUsuario'] ?? null;
                // $fecha = new DateTime();
                // $fechaFormateada = $fecha->format('Y-m-d H:i:s');
                // echo($fechaFormateada);
                // $_SESSION[]
                // $query2 = "INSERT INTO historial(fecha,usuario,accion) VALUES ('$fechaFormateada','$Usuario','agregue nuevo cliente')";
                // echo($query2);
                // if ($this->conexion->query($query2)) {
                    return true;
                // }
                // return true;
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
        $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
        return $fila;
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
        $sentencia = $this->conexion->prepare("SELECT* FROM cliente");
        $sentencia->execute();
        $lista = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }
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
