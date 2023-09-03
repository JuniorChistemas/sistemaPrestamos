<?php
include("../../template/aside.php");
include("../../template/header.php");
include("../../controller/businnes/factoryB.php");
$fabrica = factoryB::getInicio();
$cliente = $fabrica->getCliente();
if ($_POST) {
    $cliente->actualizarCliente();
}
if (isset($_GET['codigo'])) {
    $dato = $cliente->datosFila($_GET['codigo']);
}
?>
<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 400px;">
    <form class="form" method="post" enctype="multipart/form-data">
        <p class="title">ACTUALIZAR CLIENTE </p>
        <p class="message">Todos los datos son validados. </p>
        <label>
            <input required="" value="<?php echo $dato['Nombre'] ?>" placeholder="" type="text" class="input" name="nombre">
            <span>Nombre</span>
        </label>
        <label>
            <input required="" value="<?php echo $dato['Apellido'] ?>" placeholder="" type="text" class="input" name="apellido">
            <span>Apellidos</span>
        </label>
        <div class="flex">
            <label>
                <input required="" value="<?php echo $dato['Celular'] ?>" placeholder="" type="number" class="input" name="celular">
                <span>Celular</span>
            </label>
            <label>
                <input required="" value="<?php echo $dato['IdCliente'] ?>" placeholder="" type="number" class="input" name="dni">
                <span>DNI</span>
            </label>
        </div>
        <label>
            <input required="" value="<?php echo $dato['Domicilio'] ?>" placeholder="" type="text" class="input" name="domicilio">
            <span>Direccion</span>
        </label>
        <label>
            <input required="" placeholder="" type="text" class="input" name="motivo">
            <span>Motivo</span>
        </label>
        <label>
            <?php
            if ($dato['Estado'] === 'ACTIVO') {
            ?>
                <div class="form-check text-center">
                    <input class="input" name="estado" type="checkbox" id="flexCheckIndeterminate" checked>
                    <label class="form-check-label " for="flexCheckIndeterminate">
                        ESTADO
                    </label>
                </div>
            <?php
            } else {
            ?>
                <div class="form-check text-center">
                    <input class="input" name="estado" type="checkbox" id="flexCheckIndeterminate">
                    <label class="form-check-label " for="flexCheckIndeterminate">
                        ESTADO
                    </label>
                </div>
            <?php
            }
            ?>
        </label>
        <button class="submit">MODIFICAR</button>
    </form>
</div>
<?php
include("../../template/footer.php");
?>