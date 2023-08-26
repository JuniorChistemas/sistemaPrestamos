<?php
include("../../template/aside.php");
include("../../template/header.php");
include("../../controller/businnes/factoryB.php");
$fabrica = factoryB::getInicio();
$clienteBo = $fabrica->getUsuario();
if ($_POST) {
    $clienteBo->actualizar();
}
if (isset($_GET['codigo'])) {
    $dato = $clienteBo->datosFila($_GET['codigo']);
    // echo($dato['nivel']);
}
?>
<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 400px;">
    <form class="form" method="post" enctype="multipart/form-data">
        <p class="title">Actualizar usuario </p>
        <p class="message">Todos los datos son validados. </p>
        <label>
                <input required="" placeholder="" type="number" class="input" name="dni" value= <?php echo $_GET['codigo']?>>
                <span>DNI</span>
        </label>
        <label>
                <input required="" value= "<?php echo($dato['nombre']);?>" placeholder="" type="text" class="input" name="nombre">
                <span>Nombre</span>
            </label>
        <label>
            <input required="" value="<?php echo $dato['apellido']?>" placeholder="" type="text" class="input" name="apellido">
            <span>Apellidos</span>
        </label>
        <label>
                <input required="" placeholder="" type="text" class="input" name="motivo">
                <span>motivo</span>
        </label>
        <label>
            <input required="" placeholder="" type="password" class="input" name="contrasenia">
            <span>Nueva Contraseña</span>
        </label>
        <label>
            <input required="" placeholder="" type="file" class="input" name="foto">
        </label>
        <div class="flex">
            <label>
                <select class="form-select" aria-label="Default select example" name="nivel">
                    <option  value="<?php echo($dato['nivel']);?>">Modificar nivel</option>
                    <option value="administrador">Administrador</option>
                    <option value="empleado">Empleado</option>
                    <option value="programador">Programador</option>
                </select>
            </label>
            <label>
                <div class="form-check text-center">
                    <input class="input" name="estado" type="checkbox" id="flexCheckIndeterminate" checked>
                    <label class="form-check-label " for="flexCheckIndeterminate">
                        ESTADO
                    </label>
                </div>
            </label>
        </div>
        <button class="submit">Modificar</button>
    </form>
</div>
<?php
include("../../template/footer.php");
?>