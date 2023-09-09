<?php
include("../../template/aside.php");
include("../../template/header.php");
include("../../controller/businnes/factoryB.php");
$fabrica = factoryB::getInicio();
$cliente = $fabrica->getLoanB();
if ($_POST) {
    $cliente->crearPrestamo();
}
?>
<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); width: 450px;">
    <form class="form" method="post" enctype="multipart/form-data">
        <p class="title">Registro de nuevo préstamo </p>
        <table>
            <tr>
                <td colspan="3">
                    <p class="message">el sistema revisa la informacion del cliente </p>
                </td>
            </tr>
            <tr>
                <div class="flex">
                    <td class="p-3">
                        <label>
                            <input required="" placeholder="" type="text" class="input" name="prestamo">
                            <span>Cod.Prestamo</span>
                        </label>
                    </td>
                    <td class="p-3">
                        <label>
                            <input required="" placeholder="" type="number" class="input" name="usuario">
                            <span>Cod.Usuario</span>
                        </label>
                    </td>
                    <td class="p-3">
                        <label>
                            <input required="" placeholder="" type="number" class="input" name="cliente">
                            <span>Cod.Cliente</span>
                        </label>
                    </td>
                </div>
            </tr>
            <tr>
                <div class="flex">
                    <td class="p-3">
                        <label>
                            <input required="" placeholder="" type="number" class="input" name="cantidad">
                            <span>CANTIDAD</span>
                        </label>
                    </td>
                    <td class="p-3" colspan="2">
                        <label style="width: 290px;">
                            <input required="" placeholder="" type="text" class="input" name="garantia">
                            <span>GARANTIA</span>
                        </label>
                    </td>
                </div>
            </tr>
            <tr>
                <div class="flex">
                    <td class="p-2">
                        <div class="mt-3">
                            <select class="form-select form-select-lg" name="interes" id="interes">
                                <option selected>Interese</option>
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                                <option value="20">20%</option>
                                <option value="25">25%</option>
                            </select>
                        </div>
                    </td>
                    <td class="p-2">
                        <div class="mt-3">
                            <select class="form-select form-select-lg" name="" id="">
                                <option selected>Tipo de pago</option>
                                <option value="">Quincenal</option>
                                <option value="">Mensual</option>
                                <option value="">Anual</option>
                            </select>
                        </div>
                    </td>
                    <td class="p-2">
                        <div class="mt-3">
                            <select class="form-select form-select-lg" name="" id="">
                                <option selected>Tiempo</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </td>
                </div>
            </tr>
            <tr>
                <td class="p-3 text-center" colspan="3">
                    <label>
                        <div class="form-check text-center">
                            <input class="input" name="estado" type="checkbox" id="flexCheckIndeterminate" checked>
                            <label class="form-check-label " for="flexCheckIndeterminate">
                                ESTADO
                            </label>
                        </div>
                    </label>
                </td>
            </tr>
        </table>
        <button class="submit">GRABAR</button>
    </form>
</div>
<?php
include("../../template/footer.php");
?>