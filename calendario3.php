<?php 
include "docencabezado.php";
$rfc = $usuario;

foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}

$actualiza="update calendario set actividad='$actividad1',evaluacion='$evaluacion1' where  rfc='$rfc'and periodo='$periodo'and id = $id1";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad2',evaluacion='$evaluacion2' where  rfc='$rfc'and periodo='$periodo'and id = $id2";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad3',evaluacion='$evaluacion3' where  rfc='$rfc'and periodo='$periodo'and id = $id3";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad4',evaluacion='$evaluacion4' where  rfc='$rfc'and periodo='$periodo'and id = $id4";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad5',evaluacion='$evaluacion5' where  rfc='$rfc'and periodo='$periodo'and id = $id5";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad6',evaluacion='$evaluacion6' where  rfc='$rfc'and periodo='$periodo'and id = $id6";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad7',evaluacion='$evaluacion7' where  rfc='$rfc'and periodo='$periodo'and id = $id7";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad8',evaluacion='$evaluacion8' where  rfc='$rfc'and periodo='$periodo'and id = $id8";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad9',evaluacion='$evaluacion9' where  rfc='$rfc'and periodo='$periodo'and id = $id9";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad10',evaluacion='$evaluacion10' where  rfc='$rfc'and periodo='$periodo'and id = $id10";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad11',evaluacion='$evaluacion11' where  rfc='$rfc'and periodo='$periodo'and id = $id11";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad12',evaluacion='$evaluacion12' where  rfc='$rfc'and periodo='$periodo'and id = $id12";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad13',evaluacion='$evaluacion13' where  rfc='$rfc'and periodo='$periodo'and id = $id13";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad14',evaluacion='$evaluacion14' where  rfc='$rfc'and periodo='$periodo'and id = $id14";ejecuta_consulta($actualiza);
?>
<div id="mainFrame">
<script type="text/javascript">
	alert("<?php echo 'Datos actualizados Gracias'; ?>");
</script>
</div>

<?php
?>


