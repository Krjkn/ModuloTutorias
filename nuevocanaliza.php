<?php 
include "docencabezado.php";
$user = $usuario;
require_once("includes/config.inc.php");
foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
?>
<div id="mainFrame">
<?php 
require_once("includes/config.inc.php");
// actualizacion de encuestaa
$actualiza="insert into canalizaciones(problema,objetivo,acciones,area,fecha,seguimiento1,seguimiento2,resultados,no_de_control)values
	('$problema','$objetivo','$acciones','$area','$fecha','$seguimiento1','$seguimiento2','$resultados','$no_de_control')";
ejecuta_consulta($actualiza);
$msg = 'Fueron dados de Alta los datos de la canalización';?>
<script type="text/javascript">
	alert("<?php echo $msg; ?>");
</script>
<?php
?>
</div>