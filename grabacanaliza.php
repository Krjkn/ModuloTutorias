<?php 
include "docencabezado.php";
$user = $usuario;
foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
$actualiza="update canalizaciones set 
	problema		= '$problema',
	objetivo		= '$objetivo',
	acciones		= '$acciones',
	area	        = '$area',
	fecha			= '$fecha',
	seguimiento1	= '$seguimiento1',
	seguimiento2	= '$seguimiento2',
	resultados		= '$resultados'
where  no_de_control = '$no_de_control' and numero = $numero";
ejecuta_consulta($actualiza);
$msg = 'Datos actualizados de la  canalización';?>
<script type="text/javascript">
	alert("<?php echo $msg; ?>");
	window.location.href = 'pasa.php?usuario=<?php echo $usuario; ?>'
</script>
