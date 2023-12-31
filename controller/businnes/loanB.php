<?php
    class loanB{
        private $Dao;
        private $record;
        public function __construct(IDao $obj)
        {
            $this->Dao = ($obj->loanClass()); 
            $this->record = new recordB($obj);
        }
        public function crearPrestamo(){
            try {
                $dto = new loanD();
                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $dto->setIdUsuario($_POST['usuario']);
                    $dto->setIdCliente($_POST['cliente']);
                    $dto->setCantidad($_POST['cantidad']);
                    $dto->setGarantia($_POST['garantia']);
                    $dto->setInteres(isset($_POST['interes'])?$_POST['interes']:"15");
                    $dto->setEstado(isset($_POST["estado"]))?$_POST['estado']:"0";
                    if ($this->Dao->llamarProcesos($dto)) {
                        $accion = $dto->getIdUsuario();
                        $accion2 = $dto->getIdCliente();
                        $this->record->historial("usuario $accion agrego prestamo $accion2");
                        $mensaje = "Agregado";
                        echo "<script>window.location.href = '../../view/loan/new.php?mensaje=$mensaje';</script>";
                    }else{
                        $mensaje = "cliente no apto";
                        echo "<script>window.location.href = '../../view/loan/new.php?alerta=$mensaje';</script>";
                    }
                }
            } catch (\Throwable $th) {
                echo $th;
            }
        }
    }
