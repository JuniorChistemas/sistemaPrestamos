<?php
    $URL_Base ="http://localhost:8080/proyecto-1/view/";
    session_start();
    $nivelUsuario = $_SESSION['nivel'] ?? null;
    $Usuario = $_SESSION['nombre'] ?? null;
    $codigo = $_SESSION['idUsuario'] ?? null;
?>
<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bxl-shopify bx-tada'>
            <img src="../../public/svg/bank.svg" alt="open">
        </i>
        <span class="logo_name">SISTEMA FINANCIERO</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="<?php echo $URL_Base;?>web/principal.php">
                <i>
                    <img src="../../public/svg/home.svg" alt="home" style='margin-top: 7px;'>
                </i>
                <span class="link_name">Principal</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Principal</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="<?php echo $URL_Base;?>loan/view.php">
                    <i class='bx bxs-user-voice'>
                        <img src="../../public/svg/badge_dollar.svg" alt="user"  style='margin-top: 7px;'>
                    </i>
                    <span class="link_name">Prestamo</span>
                </a>
                        <i class='bx bx-log-out arrow'>
                            <>
                        </i>
            </div>
            <ul class="sub-menu">
                <li>
                    <a href="<?php echo $URL_Base;?>loan/new.php">
                        Nuevo
                    </a>
                </li>
                <li>
                    <a href="#">
                        Listar
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt'>
                        <img src="../../public/svg/calendar.svg" alt="calendario" style="margin-top: 7px;">
                    </i>
                    <span class="link_name">calendario</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2'>
                    <img src="../../public/svg/folder_on.svg" alt="no hay" style='margin-top: 7px;'>
                </i>
                <span class="link_name">Reportes</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Reportes</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-user-voice'>
                        <img src="../../public/svg/user.svg" alt="usuario" style='margin-top: 7px;'>
                    </i>
                    <span class="link_name">Personal</span>
                </a>
                <i class='bx bxs-chevron-down arrow'>
                    <>
                </i>
            </div>
            <ul class=" sub-menu">
        <li><a href="<?php echo $URL_Base;?>customer/view.php">Clientes</a></li>
        <li><a href="<?php echo $URL_Base;?>user/view.php">Usuarios</a></li>
    </ul>
    </li>
    <li>
        <a href="#">
            <i class='bx bxs-contact'>
                <img src="../../public/svg/bag_1.svg" alt="" style="margin-top: 7px;">
            </i>
            <span class="link_name">Garantia</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Garantia</a></li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class='bx bxs-edit-location'>
                <img src="../../public/svg/grid_4-1.svg" alt="" style="margin-top: 7px;">
            </i>
            <span class="link_name">Sedes</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Sedes</a></li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class='bx bx-cog'>
                <img src="../../public/svg/settings.svg" alt="conf" style='margin-top: 7px;'>
            </i>
            <span class="link_name">Configuración</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Configuración</a></li>
        </ul>
    </li>
    <li>
        <div class="profile-details">
            <div class="profile-content">
                <img src="../../public/svg/user.svg" alt="profileImg">
            </div>
            <div class="name-job">
                <div class="profile_name"><?php echo($nivelUsuario);?></div>
                <div class="profile_name"><?php echo($Usuario);?></div>
                <div class="job">
                    <a class="link_name" href="../../controller/close.php">
                        CERRAR SECCION
                    </a>
                </div>
            </div>
        </div>
    </li>
    </ul>
</div>
</div>