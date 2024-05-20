<?php 
include "docencabezado.php";
$rfc = $usuario;
$qry_encuesta="select * from calendario where  rfc = '$rfc' and periodo = '$periodo' order  by id ";$res_encuestae = ejecuta_consulta($qry_encuesta);if (!$hola = $res_encuestae->fetch_assoc()){	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')"; echo "hola".$inserta; ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);	$inserta="insert into calendario(rfc,periodo) values('$rfc','$periodo')";ejecuta_consulta($inserta);}	$qry_encuesta="select * from calendario where  rfc = '$rfc' and periodo = '$periodo' order  by id ";$res_encuesta = ejecuta_consulta($qry_encuesta);
$i=1;
while ($fila = $res_encuesta->fetch_assoc()) {                        
	if ($i == 1){$actividad1 = $fila['actividad'];  $inicio1 = $fila['inicio'];	$termino1 = $fila['termino']; $id1 = $fila['id'];};
	if ($i == 2){$actividad2 = $fila['actividad'];  $inicio2 = $fila['inicio'];	$termino2 = $fila['termino']; $id2 = $fila['id'];};
	if ($i == 3){$actividad3 = $fila['actividad'];  $inicio3 = $fila['inicio'];	$termino3 = $fila['termino']; $id3 = $fila['id'];};
	if ($i == 4){$actividad4 = $fila['actividad'];  $inicio4 = $fila['inicio'];	$termino4 = $fila['termino']; $id4 = $fila['id'];};
	if ($i == 5){$actividad5 = $fila['actividad'];  $inicio5 = $fila['inicio'];	$termino5 = $fila['termino']; $id5 = $fila['id'];};
	if ($i == 6){$actividad6 = $fila['actividad'];  $inicio6 = $fila['inicio'];	$termino6 = $fila['termino']; $id6 = $fila['id'];};
	if ($i == 7){$actividad7 = $fila['actividad'];  $inicio7 = $fila['inicio'];	$termino7 = $fila['termino']; $id7 = $fila['id'];};
	if ($i == 8){$actividad8 = $fila['actividad'];  $inicio8 = $fila['inicio'];	$termino8 = $fila['termino']; $id8 = $fila['id'];};
	if ($i == 9){$actividad9 = $fila['actividad'];  $inicio9 = $fila['inicio'];	$termino9 = $fila['termino']; $id9 = $fila['id'];};
	if ($i == 10){$actividad10 = $fila['actividad'];  $inicio10 = $fila['inicio'];	$termino10 = $fila['termino']; $id10 = $fila['id'];};
	if ($i == 11){$actividad11 = $fila['actividad'];  $inicio11 = $fila['inicio'];	$termino11 = $fila['termino']; $id11 = $fila['id'];};
	if ($i == 12){$actividad12 = $fila['actividad'];  $inicio12 = $fila['inicio'];	$termino12 = $fila['termino']; $id12 = $fila['id'];};
	if ($i == 13){$actividad13 = $fila['actividad'];  $inicio13 = $fila['inicio'];	$termino13 = $fila['termino']; $id13 = $fila['id'];};
	if ($i == 14){$actividad14 = $fila['actividad'];  $inicio14 = $fila['inicio'];	$termino14 = $fila['termino']; $id14 = $fila['id'];};
	$i++;
}
$regresar = "javascript: document.location = 'index.html'";
?>
<div id="mainFrame">
<form action="calendario2.php" method="get" name="form1"   target="mainFrame">
	<table  width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">ACTIVIDADES</font></h3></td></tr>
	</table>
	<table colspan="5" width="100%">
	<tr><th width="8%">Inicio</th><th width="2%">..</th><th width="8%">Termino</th><th width="2%">..</th><th width="80%">Actividadades</th></tr>
	</table>
	<tr><td>
	<table colspan="5" width="100%" align="center">
		<tr>
		<th width="8%"><input name="inicio1" type="text" id="inicio1" value="<?php echo $inicio1; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton1" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton1,inicio1,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino1" type="text" id="termino1" value="<?php echo $termino1; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton2" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton2,termino1,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad1" value="<?php echo $actividad1?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio2" type="text" id="inicio2" value="<?php echo $inicio2; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton3" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton3,inicio2,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino2" type="text" id="termino2" value="<?php echo $termino2; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton4" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton4,termino2,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad2" value="<?php echo $actividad2?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio3" type="text" id="inicio3" value="<?php echo $inicio3; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton5" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton5,inicio3,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino3" type="text" id="termino3" value="<?php echo $termino3; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton6" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton6,termino3,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad3" value="<?php echo $actividad3?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio4" type="text" id="inicio4" value="<?php echo $inicio4; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton7" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton7,inicio4,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino4" type="text" id="termino4" value="<?php echo $termino4; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton8" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton8,termino4,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad4" value="<?php echo $actividad4?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio5" type="text" id="inicio5" value="<?php echo $inicio5; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton9" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton9,inicio5,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino5" type="text" id="termino5" value="<?php echo $termino5; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton10" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton10,termino5,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad5" value="<?php echo $actividad5?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio6" type="text" id="inicio6" value="<?php echo $inicio6; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton13" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton13,inicio6,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino6" type="text" id="termino6" value="<?php echo $termino6; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton14" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton14,termino6,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad6" value="<?php echo $actividad6?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio7" type="text" id="inicio7" value="<?php echo $inicio7; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton15" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton15,inicio7,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino7" type="text" id="termino7" value="<?php echo $termino7; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton16" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton16,termino7,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad7" value="<?php echo $actividad7?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio8" type="text" id="inicio8" value="<?php echo $inicio8; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton17" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton17,inicio8,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino8" type="text" id="termino8" value="<?php echo $termino8; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton18" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton18,termino8,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad8" value="<?php echo $actividad8?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio9" type="text" id="inicio9" value="<?php echo $inicio9; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton19" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton19,inicio9,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino9" type="text" id="termino9" value="<?php echo $termino9; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton20" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton20,termino9,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad9" value="<?php echo $actividad9?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio10" type="text" id="inicio10" value="<?php echo $inicio10; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton21" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton21,inicio10,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino10" type="text" id="termino10" value="<?php echo $termino10; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton22" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton22,termino10,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad10" value="<?php echo $actividad10?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio11" type="text" id="inicio11" value="<?php echo $inicio11; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton23" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton23,inicio11,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino11" type="text" id="termino11" value="<?php echo $termino11; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton24" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton24,termino11,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad11" value="<?php echo $actividad11?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio12" type="text" id="inicio12" value="<?php echo $inicio12; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton25" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton25,inicio12,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino12" type="text" id="termino12" value="<?php echo $termino12; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton26" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton26,termino12,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad12" value="<?php echo $actividad12?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio13" type="text" id="inicio13" value="<?php echo $inicio13; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton27" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton27,inicio13,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino13" type="text" id="termino13" value="<?php echo $termino13; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton28" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton28,termino13,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad13" value="<?php echo $actividad13?>"  size="150" maxlength="220"/></td>
		</tr>
		<tr>
		<th width="8%"><input name="inicio14" type="text" id="inicio14" value="<?php echo $inicio14; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton29" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton29,inicio14,'yyyy-mm-dd');"></td>
		<th width="8%"><input name="termino14" type="text" id="termino14" value="<?php echo $termino14; ?>" size="10" maxlength="10" readonly="true"></th>
		<td width="2%"><input name="boton30" class="calendario" type="button" value=".." size="2" maxlength="3" onclick="popUpCalendar(boton30,termino14,'yyyy-mm-dd');"></td>
		<th width="80%"><input type="text" name="actividad14" value="<?php echo $actividad14?>"  size="150" maxlength="220"/></td>
		</tr>
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
	<center><input type="submit" value="Alta, Modifica, Continua" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'" /></center>
</form>
</div>


