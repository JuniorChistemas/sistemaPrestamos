<?php
include("../../template/aside.php");
include("../../template/header.php");
include("../../controller/businnes/factoryB.php");
$fabrica = factoryB::getInicio();
$clienteBo = $fabrica->getUsuario();
$hola = $clienteBo->listar();
?>
<div class="alert alert-primary col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5" role="alert">
    <strong>TABLA DE USUARIOS </strong> practicando el converter y DTO
</div>

<main>
        <div class="container my-4 p-5" style="background-color: #e8f5ff;">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <table id="datatable_users" class="table table-striped">
                        <caption>
                            DataTable.js Demo
                        </caption>
                        <thead>
                            <tr>
                                <th class="centered">#</th>
                                <th class="centered">DNI</th>
                                <th class="centered">Nombre</th>
                                <th class="centered">Apellidos</th>
                                <th class="centered">Nivel</th>
                                <th class="centered">Estado</th>
                                <th class="centered">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody_users"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            var datos = <?php echo json_encode($hola)?>;
        </script>
        <script src="../../public/javascript/tablaD.js"></script>
    </div>
    </main>
<?php
include("../../template/footer.php");
?>