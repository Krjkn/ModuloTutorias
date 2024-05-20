<?php
session_start();
 $rutaM = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['SCRIPT_FILENAME']))."/";
//$ruta = "www.desarrolloitigualamx.com/sdr/";
?>
<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SISTEMA DE RESIDENCIAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" type="image/png" href="vistas/assets/images/icon/favicon.ico"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- sweetalert2 -->
    <script src="assets/js/sweetalert2.all.min.js"></script>
</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="body-bg">


    <?php
    if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {

        echo '<div class="horizontal-main-wrapper">';

        if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == "Administrador") {
            include "../modulos/cabezote.php";
            
        } else {
            include "../modulos/cabezoteUser.php";
        }

        if (isset($_GET["ruta"]) && $_SESSION['perfil'] == "Administrador") {
            if (
                $_GET["ruta"] == "Inicio" ||
                $_GET["ruta"] == "Usuarios" ||
                $_GET["ruta"] == "Residentes" ||
                $_GET["ruta"] == "Docentes" ||
                $_GET["ruta"] == "CerrarSesion"
            ) {

                include "../modulos/" . $_GET["ruta"] . ".php";
            } else {
                include "modulos/404.php";
            }
        }
        if (isset($_GET["ruta"]) && $_SESSION['perfil'] != "Administrador") {
            if (
                $_GET["ruta"] == "Inicio" ||
                $_GET["ruta"] == "Residentes" ||
                $_GET["ruta"] == "CerrarSesion"
            ) {

                include "../modulos/" . $_GET["ruta"] . ".php";
            } else {
                include "../modulos/404.php";
            }
        }
        if (!isset($_GET["ruta"])) {
            include "../modulos/Inicio.php";
        }

        include "modulos/footer.php";

        echo '</div>';
    } else {
        include "../modulos/login.php";
    }

    ?>


    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/dataTables.responsive.min.js"></script>
    <script src="assets/js/responsive.bootstrap.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/docentes.js"></script>
    <script src="assets/js/residentes.js"></script>
    <script src="assets/js/usuarios.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/table.js"></script>
</body>

</html> 