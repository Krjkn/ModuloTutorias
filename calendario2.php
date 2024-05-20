<?php 
include "docencabezado.php";
$rfc = $usuario;
foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
$actualiza="update calendario set actividad='$actividad1',inicio='$inicio1',termino='$termino1'where  rfc='$rfc'and periodo='$periodo'and id = $id1";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad2',inicio='$inicio2',termino='$termino2'where  rfc='$rfc'and periodo='$periodo'and id = $id2";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad3',inicio='$inicio3',termino='$termino3'where  rfc='$rfc'and periodo='$periodo'and id = $id3";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad4',inicio='$inicio4',termino='$termino4'where  rfc='$rfc'and periodo='$periodo'and id = $id4";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad5',inicio='$inicio5',termino='$termino5'where  rfc='$rfc'and periodo='$periodo'and id = $id5";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad6',inicio='$inicio6',termino='$termino6'where  rfc='$rfc'and periodo='$periodo'and id = $id6";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad7',inicio='$inicio7',termino='$termino7'where  rfc='$rfc'and periodo='$periodo'and id = $id7";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad8',inicio='$inicio8',termino='$termino8'where  rfc='$rfc'and periodo='$periodo'and id = $id8";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad9',inicio='$inicio9',termino='$termino9'where  rfc='$rfc'and periodo='$periodo'and id = $id9";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad10',inicio='$inicio10',termino='$termino10'where  rfc='$rfc'and periodo='$periodo'and id = $id10";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad11',inicio='$inicio11',termino='$termino11'where  rfc='$rfc'and periodo='$periodo'and id = $id11";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad12',inicio='$inicio12',termino='$termino12'where  rfc='$rfc'and periodo='$periodo'and id = $id12";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad13',inicio='$inicio13',termino='$termino13'where  rfc='$rfc'and periodo='$periodo'and id = $id13";ejecuta_consulta($actualiza);
$actualiza="update calendario set actividad='$actividad14',inicio='$inicio14',termino='$termino14'where  rfc='$rfc'and periodo='$periodo'and id = $id14";ejecuta_consulta($actualiza);
?><script type="text/javascript">
	alert("<?php echo 'Datos actualizados continua'; ?>");
</script><?php
$qry_encuesta="select * from calendario where  rfc = '$rfc' and periodo = '$periodo' order  by id ";
$res_encuesta = ejecuta_consulta($qry_encuesta);
$i=1;
while ($fila = $res_encuesta->fetch_assoc()) {                        
	if ($i == 1){$actividad1 = $fila['actividad'];  $evaluacion1 = $fila['evaluacion']; $id1 = $fila['id'];}	
	if ($i == 2){$actividad2 = $fila['actividad'];  $evaluacion2 = $fila['evaluacion']; $id2 = $fila['id'];	}
	if ($i == 3){$actividad3 = $fila['actividad'];  $evaluacion3 = $fila['evaluacion'];	$id3 = $fila['id'];}
	if ($i == 4){$actividad4 = $fila['actividad'];  $evaluacion4 = $fila['evaluacion'];	$id4 = $fila['id'];}
	if ($i == 5){$actividad5 = $fila['actividad'];  $evaluacion5 = $fila['evaluacion']; $id5 = $fila['id'];}	
	if ($i == 6){$actividad6 = $fila['actividad'];  $evaluacion6 = $fila['evaluacion'];	$id6 = $fila['id'];}
	if ($i == 7){$actividad7 = $fila['actividad'];  $evaluacion7 = $fila['evaluacion'];	$id7 = $fila['id'];}
	if ($i == 8){$actividad8 = $fila['actividad'];  $evaluacion8 = $fila['evaluacion']; $id8 = $fila['id'];}	
	if ($i == 9){$actividad9 = $fila['actividad'];  $evaluacion9 = $fila['evaluacion'];	$id9 = $fila['id'];}
	if ($i == 10){$actividad10 = $fila['actividad'];  $evaluacion10 = $fila['evaluacion'];$id10 = $fila['id'];}	
	if ($i == 11){$actividad11 = $fila['actividad'];  $evaluacion11 = $fila['evaluacion'];$id11 = $fila['id'];}	
	if ($i == 12){$actividad12 = $fila['actividad'];  $evaluacion12 = $fila['evaluacion'];$id12 = $fila['id'];}	
	if ($i == 13){$actividad13 = $fila['actividad'];  $evaluacion13 = $fila['evaluacion'];$id13 = $fila['id'];}	
	if ($i == 14){$actividad14 = $fila['actividad'];  $evaluacion14 = $fila['evaluacion'];$id14 = $fila['id'];}	
	$i++;
}
$regresar = "javascript: document.location = 'index.html'";
?>
<div id="mainFrame">
<form action="calendario3.php" method="get" name="form1"   target="mainFrame">
	<table  width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">COMO VOY A EVALUAR LAS ACTIVIDADES </font></h3></td></tr>
	</table>
	<table colspan="2" width="100%" align="center">
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad1" value="<?php echo  $actividad1?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion1" value="<?php echo $evaluacion1?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad2" value="<?php echo  $actividad2?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion2" value="<?php echo $evaluacion2?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad3" value="<?php echo  $actividad3?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion3" value="<?php echo $evaluacion3?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad4" value="<?php echo  $actividad4?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion4" value="<?php echo $evaluacion4?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad5" value="<?php echo  $actividad5?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion5" value="<?php echo $evaluacion5?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad6" value="<?php echo  $actividad6?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion6" value="<?php echo $evaluacion6?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad7" value="<?php echo  $actividad7?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion7" value="<?php echo $evaluacion7?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad8" value="<?php echo  $actividad8?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion8" value="<?php echo $evaluacion8?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad9" value="<?php echo  $actividad9?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion9" value="<?php echo $evaluacion9?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad10" value="<?php echo  $actividad10?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion10" value="<?php echo $evaluacion10?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad11" value="<?php echo  $actividad11?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion11" value="<?php echo $evaluacion11?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad12" value="<?php echo  $actividad12?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion12" value="<?php echo $evaluacion12?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad13" value="<?php echo  $actividad13?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion13" value="<?php echo $evaluacion13?>"  size="190" maxlength="220"/></td></tr>
		<tr><th width="8%">Actividad...</th><th width="92%"><input type="text"  name="actividad14" value="<?php echo  $actividad14?>"  size="190" maxlength="220" readonly="true"/></td></tr>
		<tr><th width="8%">Evaluación..</th><th width="92%"><input type="text" name="evaluacion14" value="<?php echo $evaluacion14?>"  size="190" maxlength="220"/></td></tr>
		<td><input type="hidden" name="id1" value="<?php echo $id1?>"/></td><td><input type="hidden" name="id8" value="<?php echo $id8?>"/></td>
		<td><input type="hidden" name="id2" value="<?php echo $id2?>"/></td><td><input type="hidden" name="id9" value="<?php echo $id9?>"/></td>
		<td><input type="hidden" name="id3" value="<?php echo $id3?>"/></td><td><input type="hidden" name="id10" value="<?php echo $id10?>"/></td>
		<td><input type="hidden" name="id4" value="<?php echo $id4?>"/></td><td><input type="hidden" name="id11" value="<?php echo $id11?>"/></td>
		<td><input type="hidden" name="id5" value="<?php echo $id5?>"/></td><td><input type="hidden" name="id12" value="<?php echo $id12?>"/></td>
		<td><input type="hidden" name="id6" value="<?php echo $id6?>"/></td><td><input type="hidden" name="id13" value="<?php echo $id13?>"/></td>
		<td><input type="hidden" name="id7" value="<?php echo $id7?>"/></td><td><input type="hidden" name="id14" value="<?php echo $id14?>"/></td>
		<td><input type="hidden" name="periodo" value="<?php echo $periodo?>"/></td>		<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
	</table>
	<br/>
	<center><input type="submit" value="Alta, Modifica, Termina" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'" /></center>
</form>
</div>
