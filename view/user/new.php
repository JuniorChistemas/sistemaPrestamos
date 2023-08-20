<?php
include("../../template/aside.php");
include("../../template/header.php");
include("../../controller/businnes/factoryB.php");
$fabrica = factoryB::getInicio();
$clienteBo = $fabrica->getUsuario();
if ($_POST) {
    $clienteBo->crear();
}
?>
<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 400px;">
    <form class="form" method="post" enctype="multipart/form-data">
        <p class="title">Registro de usuario </p>
        <p class="message">Todos los datos son validados. </p>
        <div class="flex">
            <label>
                <input required="" placeholder="" type="text" class="input" name="nombre">
                <span>Nombre</span>
            </label>
            <label>
                <input required="" placeholder="" type="text" class="input" name="apellido">
                <span>Apellidos</span>
            </label>
        </div>
        <label>
            <input required="" placeholder="" type="number" class="input" name="dni">
            <span>DNI</span>
        </label>
        <label>
            <input required="" placeholder="" type="password" class="input" name="contrasenia">
            <span>Contraseña</span>
        </label>
        <label>
            <input required="" placeholder="" type="file" class="input" name="foto">
        </label>
        <label>
            <input required="" placeholder="" type="password" class="input" name="contrasenia2">
            <span>Confirmar contraseña</span>
        </label>
        <div class="flex">
            <label>
                <select class="form-select" aria-label="Default select example" name="nivel">
                    <option selected>Nivel de usuario</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Empleado">Empleado</option>
                    <option value="Programador">Programador</option>
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
        <button class="submit">CREAR</button>
    </form>
</div>
<?php
include("../../template/footer.php");
?>