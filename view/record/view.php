<?php
include("../../template/aside.php");
include("../../template/header.php");
include("../../controller/businnes/factoryB.php");
$fabrica2 = factoryB::getInicio();
$clienteB = $fabrica2->getRecord();
$dataCustomer = $clienteB->listar();
?>
<button class="new position-absolute top-0 end-0 m-5" id="cliente">Eliminar historial</button>
<div class="alert alert-primary col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5" role="alert" style=" text-align: center;font-size: medium;">
    <strong>HISTORIAL DE EVENTOS</strong>
</div>
<main>
    <div class="container my-4 p-5" style="background-color: #e8f5ff;">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table id="datatable_record" class="table table-striped">
                    <caption>
                        Datos principales
                    </caption>
                    <thead>
                        <tr>
                            <th class="centered">N°</th>
                            <th class="centered">Fecha</th>
                            <th class="centered">NOMBRE</th>
                            <th class="centered">Accion</th>
                            <th class="centered">Estado</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody_record"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var datos = <?php echo json_encode($dataCustomer) ?>;
        const boton = document.getElementById('cliente');
        boton.addEventListener('click', () => {
            window.location.href = 'new.php';
        });
    </script>
    <script src="../../public/javascript/record.js"></script>
    </div>
</main>
<?php
include("../../template/footer.php");
?>
