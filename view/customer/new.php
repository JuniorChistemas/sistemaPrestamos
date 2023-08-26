<?php
include("../../template/aside.php");
include("../../template/header.php");
include("../../controller/businnes/factoryB.php");
$fabrica = factoryB::getInicio();
$cliente = $fabrica->getCliente();
if ($_POST) {
    $cliente->crearCliente();
}
?>
<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 400px;">
    <form class="form" method="post" enctype="multipart/form-data">
        <p class="title">Registro de nuevo cliente </p>
        <p class="message">Todos los datos son validados. </p>
        <label>
            <input required="" placeholder="" type="text" class="input" name="nombre">
            <span>Nombre</span>
        </label>
        <label>
            <input required="" placeholder="" type="text" class="input" name="apellido">
            <span>Apellidos</span>
        </label>
        <div class="flex">
            <label>
                <input required="" placeholder="" type="number" class="input" name="celular">
                <span>Celular</span>
            </label>
            <label>
                <input required="" placeholder="" type="number" class="input" name="dni">
                <span>DNI</span>
            </label>
        </div>
        <label>
            <input required="" placeholder="" type="text" class="input" name="domicilio">
            <span>Direccion</span>
        </label>
        <label>
                <div class="form-check text-center">
                    <input class="input" name="estado" type="checkbox" id="flexCheckIndeterminate" checked>
                    <label class="form-check-label " for="flexCheckIndeterminate">
                        ESTADO
                    </label>
                </div>
            </label>
        <button class="submit">CREAR</button>
    </form>
</div>
<?php
include("../../template/footer.php");
?>