<?php
    // include('../../service/dao/factoryE.php');
    // include('../../service/dao/factoryA.php');
    // include("../../service/dao/impFactory.php");
    include("../../service/interface/IDao.php");
    class userB{
        private $Dao;
        public function __construct(IDao $obj)
        {
            $this->Dao = ($obj->userClass()); 
        }
        public function listar(){
            if ($this->Dao->listarDatos()!=null) {
                return $this->Dao->listarDatos();
            }
            return null;
        }
        public function crear(): bool {
            // recibimos los datos del cliente
            $dto = new userD();
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $dto->setNombre($_POST['nombre']);
                $dto->setApellido($_POST['apellido']);
                $dto->setIdUsuario($_POST['dni']);
                $dto->setContrasenia($_POST['contrasenia']);
                // agregamos la foto en un carpeta separada del proyecto
                $dto->setFoto(isset($_FILES["foto"]['name'])?$_FILES["foto"]['name']:"");   
                $fecha = new DateTime();
                $NombreFoto = ($dto->getFoto()!='')?$fecha->getTimestamp()."_".$_FILES["foto"]['name']:"";
                $fotoTemp = $_FILES["foto"]['tmp_name'];
                $destino = "../../../usuario/$NombreFoto";
                $dto->setFoto($NombreFoto);
                if ($fotoTemp!='') {
                    move_uploaded_file($fotoTemp,$destino);
                }
                $dto->setNivel(isset($_POST['nivel'])?$_POST['nivel']:"Empleado");
                $dto->setEstado(isset($_POST["estado"]))?$_POST['estado']:"0";
                if ($this->Dao->crear($dto)) {
                    $mensaje = "Agregado";
                echo "<script>window.location.href = '../../view/user/view.php?mensaje=$mensaje';</script>";
                }else{
                    $mensaje = "inconcistencia%de%datos";
                    echo "<script>window.location.href = '../../view/user/new.php?alerta=$mensaje';</script>";
                }
                return false;
            }
            return false;   
        }
        public function eliminar($id){
            if ($this->Dao->eliminar($id)) {
                $mensaje = "Eliminado";
                echo "<script>window.location.href = '../../view/user/view.php?mensaje=$mensaje';</script>";
            }
        }
        public function datosFila($id){
            try {
                return $this->Dao->leer($id);
            } catch (\Throwable $th) {
                $mensaje = "Error..!";
                echo "<script>window.location.href = '../../view/user/view.php?mensaje=$mensaje';</script>";
            }
        }
        public function actualizar() {
            $dto = new userD();
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $dto->setNombre($_POST['nombre']);
                $dto->setApellido($_POST['apellido']);
                $dto->setIdUsuario($_POST['dni']);
                $dto->setContrasenia($_POST['contrasenia']);
                // agregamos la foto en un carpeta separada del proyecto
                $dto->setFoto(isset($_FILES["foto"]['name'])?$_FILES["foto"]['name']:"");   
                $fecha = new DateTime();
                $NombreFoto = ($dto->getFoto()!='')?$fecha->getTimestamp()."_".$_FILES["foto"]['name']:"";
                $fotoTemp = $_FILES["foto"]['tmp_name'];
                $destino = "../../../usuario/$NombreFoto";
                $dto->setFoto($NombreFoto);
                if ($fotoTemp!='') {
                    move_uploaded_file($fotoTemp,$destino);
                }
                $dto->setNivel(isset($_POST['nivel'])?$_POST['nivel']:"Empleado");
                $dto->setEstado(isset($_POST["estado"]))?$_POST['estado']:"0";
                if ($this->Dao->actualizar($dto)) {
                    $mensaje = "actualizado";
                echo "<script>window.location.href = '../../view/user/view.php?mensaje=$mensaje';</script>";
                }
                return false;
            }
            return false;
            
        }
    }
