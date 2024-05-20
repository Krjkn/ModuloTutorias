<?php 
include "encabezado.php";
$periodo  = $_GET['periodo'];
$carrera  = $_GET['carrera'];
$user = $_SESSION["usuario"];
$grupo='';
$qry_grupos="select nombre_carrera from carreras where carrera = '$carrera'";
$res_grupos = ejecuta_consulta($qry_grupos);
while ($fila = $res_grupos->fetch_assoc()) {
	$nombre_carrera = $fila['nombre_carrera'];
}
$qry_periodo="select identificacion_corta from periodos_escolares where periodo = '$periodo'";
$res_periodo = ejecuta_consulta($qry_periodo);
while ($fila = $res_periodo->fetch_assoc()) {
	$identificacion = $fila['identificacion_corta'];
}
?>
<body>
<div id="mainFrame">
<br /><br />
<form action="grupobd.php" method="post" name="form1"   target="mainFrame">
<table align="center" cellpadding="0" cellspacing="0" border="0" width="500" id="resultado">
<tr>
	<th colspan="2" align="center">Crear Grupo de Tutorias</th>
</tr>
<tr><td colspan="2" height="10"></td></tr>
	<tr><th>Carrera:</th>
	<td><input type="text" name="carrera" value="<?php echo $nombre_carrera ?>" size="50" /></td></tr>	
	<tr><th>Periodo:</th>
	<td><input type="text" name="identificacion" value="<?php echo $identificacion ?>" size="50" /></td></tr>
	<tr><th>Periodo:</th>
	<td><input type="text" name="periodo" value="<?php echo $periodo ?>" size="50" /></td></tr>
	<tr><th>Materia:</th>
	<td><select name="materia"><?php echo materias($carrera); ?></select></td></tr>
	<tr><th>Grupo:</th>
	<td><input type="text" name="grupo" value="<?php echo $grupo ?>" size="50" /></td></tr>
	<tr><th>Hora:</th>
	<td><select name="hora">
		<option value='07:00-08:00'>07:00-08:00</option>
		<option value='08:00-09:00'>08:00-09:00</option>
		<option value='09:00-10:00'>09:00-10:00</option>
		<option value='10:00-11:00'>10:00-11:00</option>
		<option value='11:00-12:00'>11:00-12:00</option>
		<option value='12:00-13:00'>12:00-13:00</option>
		<option value='13:00-14:00'>13:00-14:00</option>
		<option value='14:00-15:00'>14:00-15:00</option>
		<option value='15:00-16:00'>15:00-16:00</option>
		<option value='16:00-17:00'>16:00-17:00</option>
	</select></td></tr>
	<tr><th>Dia:</th>
	<td><select name="dia">
		<option value='LUNES'>Lunes</option>
		<option value='MARTES'>Martes</option>
		<option value='MIERCOLES'>Miercoles</option>
		<option value='JUEVES'>Jueves</option>
		<option value='VIERNES'>Viernes</option>
	</select></td></tr>
	<tr><th>Aula:</th>
	<td><select name="aula"><?php echo aulas($carrera); ?></select></td></tr>
	
	</tr>
</table>
<br />
<center><input type="submit" value="Alta de Grupo" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasades.php'" /></center>

</form>
</div>
</body>


