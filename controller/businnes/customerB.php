<?php
    class customerB{
        private $Dao;
        public function __construct(IDao $obj)
        {
            $this->Dao = ($obj->customerClass()); 
        }
        public function listar(){
            if ($this->Dao->listarDatos()!=null) {
                return $this->Dao->listarDatos();
            }
            return null;
        }
        public function crearCliente(){
            try {
                $dto = new customerD();
                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $dto->setNombre($_POST['nombre']);
                    $dto->setApellido($_POST['apellido']);
                    $dto->setIdCliente($_POST['dni']);
                    $dto->setCelular($_POST['celular']);
                    $dto->setDomicilio($_POST['domicilio']);
                    $dto->setEstado(isset($_POST["estado"]))?$_POST['estado']:"0";
                    if ($this->Dao->crear($dto)) {
                        $mensaje = "Agregado";
                    echo "<script>window.location.href = '../../view/customer/view.php?mensaje=$mensaje';</script>";
                    }else{
                        $mensaje = "inconcistencia-de-datos";
                        echo "<script>window.location.href = '../../view/customer/new.php?alerta=$mensaje';</script>";
                    }
                }
            } catch (\Throwable $th) {
                echo($th);
            }
        }
        public function eliminar($id){
            if ($this->Dao->eliminar($id)) {
                $mensaje = "Eliminado";
                echo "<script>window.location.href = '../../view/customer/view.php?mensaje=$mensaje';</script>";
            }
        }
        public function datosFila($id){
            try {
                return $this->Dao->leer($id);
            } catch (\Throwable $th) {
                $mensaje = "Error..!";
                echo "<script>window.location.href = '../../view/customer/view.php?mensaje=$mensaje';</script>";
            }
        }
        public function actualizarCliente(){
            try {
                $dto = new customerD();
                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $dto->setNombre($_POST['nombre']);
                    $dto->setApellido($_POST['apellido']);
                    $dto->setIdCliente($_POST['dni']);
                    $dto->setCelular($_POST['celular']);
                    $dto->setDomicilio($_POST['domicilio']);
                    $dto->setEstado(isset($_POST['estado']))?$_POST['estado']:"0";
                    if ($this->Dao->actualizar($dto)) {
                        $mensaje = "Actualizado";
                    echo "<script>window.location.href = '../../view/customer/view.php?mensaje=$mensaje';</script>";
                    }else{
                        $mensaje = "inconcistencia-de-datos";
                        echo "<script>window.location.href = '../../view/customer/new.php?alerta=$mensaje';</script>";
                    }
                }
            } catch (\Throwable $th) {
                echo($th);
            }
        }
    }
?>