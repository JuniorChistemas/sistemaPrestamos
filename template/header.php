<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistema</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- para alers animados -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- estilos del proyecto -->
    <link rel="stylesheet" href="../../public/style/header.css">
    <link rel="stylesheet" href="../../public/style/new.css">
</head>

<body>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'>
                <img src="../../public/svg/text_align_justify.svg" alt="">
            </i>
            <span class="text d-inline-block"></span>
        </div>
        <?php
        if (isset($_GET['mensaje'])) {
        ?>
            <script>
                Swal.fire({
                    icon: "success",
                    title: "<?php echo $_GET['mensaje']; ?>"
                });
            </script>
        <?php
        }
        if (isset($_GET['alerta'])) {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'INCONCISTENCIA DE DATOS: <?php echo $_GET['alerta']; ?> ',
                })
            </script>
        <?php
        }
        ?>