<?php
include("../../template/aside.php");
include("../../template/header.php");
include("../../controller/businnes/factoryB.php");
$fabrica = factoryB::getInicio();
$clienteBo = $fabrica->getUsuario();
$hola = $clienteBo->listar();
?>
<main>
        <div class="container my-4" style="background-color: blanchedalmond;">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <table id="datatable_users" class="table table-striped">
                        <caption>
                            DataTable.js Demo
                        </caption>
                        <thead>
                            <tr>
                                <th class="centered">#</th>
                                <th class="centered">Name</th>
                                <th class="centered">Email</th>
                                <th class="centered">City</th>
                                <th class="centered">Company</th>
                                <th class="centered">Status</th>
                                <th class="centered">Options</th>
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