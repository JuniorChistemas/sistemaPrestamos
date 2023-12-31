<?php
include("../../template/aside.php");
include("../../template/header.php");
include("../../controller/businnes/factoryB.php");
$fabrica = factoryB::getInicio();
$clienteBo = $fabrica->getUsuario();
$hola = $clienteBo->listar();
if (isset($_GET['codigo'])) {
    $clienteBo->eliminar($_GET['codigo']);
}
?>
<button class="new position-absolute top-0 end-0 m-5" id="usuario">Agregar usuario</button>
<div class="alert alert-primary col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5" role="alert" style=" text-align: center;font-size: medium;">
    <strong>TABLA DE USUARIO</strong>
</div>
<main>
    <div class="container my-4 p-5" style="background-color: #e8f5ff;">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table id="datatable_users" class="table table-striped">
                    <caption>
                        Datos principales
                    </caption>
                    <thead>
                        <tr>
                            <th class="centered">Foto</th>
                            <th class="centered">NIVEL</th>
                            <th class="centered">DNI</th>
                            <th class="centered">NOMBRE</th>
                            <th class="centered">Apellidos</th>
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
        var datos = <?php echo json_encode($hola) ?>;
        const boton = document.getElementById('usuario');
        boton.addEventListener('click', () => {
            window.location.href = 'new.php';
        });
    </script>
    <script src="../../public/javascript/tablaD.js"></script>
    </div>
</main>
<?php
include("../../template/footer.php");
?>