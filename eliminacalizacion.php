<?php 
include "docencabezado.php";
$user = $usuario;
$no_de_control = $_GET['materia'];
$numero = $_GET['periodo'];
require_once("includes/config.inc.php");
?>
<div id="mainFrame">
<?php
$actualiza="delete from canalizaciones where no_de_control = '$no_de_control' and numero = $numero";
ejecuta_consulta($actualiza);
$msg = 'Se eliminaron los datos de la canalización';?>
<script type="text/javascript">
	alert("<?php echo $msg; ?>");
</script>
<?php
?>
</div>