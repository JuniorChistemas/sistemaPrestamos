<?php
include("../../template/aside.php");
include("../../template/header.php");
?>
<!-- <div class="alert alert-primary col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5" role="alert" style=" text-align: center;font-size: medium;">
    <strong>CALENDARIO DE LA SEMANA</strong>
</div> -->
<div style="position: absolute; top: 40%; left: 50%; transform: translate(-50%,-50%); width: 80%;" class="text-center">
    <div class="alert alert-primary col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5" role="alert" style=" text-align: center;font-size: medium;">
        <strong>CALENDARIO DE LA SEMANA</strong>
    </div>
    <div id="calendario">
        <div id="diasSemana" class="containerFecha">
            <!-- Los días de la semana se generarán dinámicamente aquí -->
        </div>
        <div id="actividades">
            <!-- Las actividades se cargarán dinámicamente aquí -->
        </div>
        <div>
            <?php
                try {
                    date_default_timezone_set('America/Lima');
                    $fechaObjeto = new DateTime();
                // Crear un formateador de fecha en español
                    $localizador = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE, null, null, 'dd \'de\' MMMM \'de\' y, h:mm a');
                    // Formatear la fecha y hora
                    $fechaFormateada = $localizador->format($fechaObjeto);                
                echo "<p class= 'fs-1 text-white'>$fechaFormateada</p>";
                } catch (\Throwable $th) {
                    echo($th);
                }
            ?>
        </div>
    </div>
</div>
<script src="../../public/javascript/calendar.js"></script>
<?php
include("../../template/footer.php");
?>