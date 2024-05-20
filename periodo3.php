<?php
include "encabezado.php";
$user = $_SESSION["usuario"];
$periodo = $_POST["periodo"];
$diagnostico = $_POST["diagnostico"];
$primero = $_POST["primero"];
$segundo = $_POST["segundo"];
$final = $_POST["final"];

$qry_periodos = "update periodos_escolares set diagnostico='$diagnostico', primero='$primero', segundo='$segundo', final='$final'   where periodo ='$periodo'";
ejecuta_consultaf($qry_periodos);

?>
<body>
<div id="mainFrame">

</div>
</body>

