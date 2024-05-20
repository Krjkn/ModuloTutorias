<?php 
include "encabezado.php";
$periodo  = $_GET['periodo'];
$materia  = $_GET['materia'];
$grupo  = $_GET['grupo'];
$user = $_SESSION["usuario"];

$qry_datos_grupo = "select g.periodo,departamento,CONCAT(apellidos_empleado, ' ', nombre_empleado) as profesor, nombre_completo_materia,m.materia,g.grupo,p.rfc, alumnos_inscritos,dia,horario,aula 	from personal as p,materias as m,grupos as g where g.materia = m.materia and g.rfc = p.rfc and	m.materia = '$materia' and g.grupo = '$grupo' and g.periodo = '$periodo'";
$res_grupos1 = ejecuta_consulta($qry_datos_grupo);
while ($fila = $res_grupos1->fetch_assoc()) {
	$grupo  				 = $fila['grupo'];
	$materia				 = $fila['materia'];
	$nombre_completo_materia = $fila['nombre_completo_materia'];
	$alumnos_inscritos 		 = $fila['alumnos_inscritos'];
	$profesor		 		 = $fila['profesor'];
	$horario		 		 = $fila['horario'];
	$aula			 		 = $fila['aula'];
	$dia			 		 = $fila['dia'];
	$periodo			 	 = $fila['periodo'];
}

$qry_grupos="select c.carrera,nombre_carrera from carreras c,materias_carreras mc where mc.materia = '$materia' and mc.carrera = c.carrera ";
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
<form action="grupodatosbd.php" method="post" name="form1">
<table align="center" cellpadding="0" cellspacing="0" border="0" width="500" id="resultado">
<tr>
	<th colspan="2" align="center">Crear Grupo de Tutorias</th>
</tr>
<tr><td colspan="2" height="10"></td></tr>
	<tr><th>Carrera:</th>
	<td><input type="text" name="carrera" value="<?php echo $nombre_carrera ?>" size="50" readonly /></td></tr>	
	<tr><th>Periodo:</th>
	<td><input type="text" name="identificacion" value="<?php echo $identificacion ?>" size="50"  readonly /></td></tr>
	<tr><th>Periodo:</th>
	<td><input type="text" name="periodo" value="<?php echo $periodo ?>" size="50" readonly /></td></tr>
	<tr><th>Materia:</th>
	<td><input type="text" name="materias" value="<?php echo $nombre_completo_materia ?>" size="50" readonly /></td></tr>
	<tr><th>Materia:</th>
	<td><input type="text" name="materia" value="<?php echo $materia ?>" size="10" readonly /></td></tr>
	<tr><th>Grupo:</th>
	<td><input type="text" name="grupo" value="<?php echo $grupo ?>" size="10" readonly /></td></tr>
	<tr><th>Hora:</th>
	<?php 
	  $h1 = ('07:00-08:00' == $horario)? 'selected' : '';
	  $h2 = ('08:00-09:00' == $horario)? 'selected' : '';
	  $h3 = ('09:00-10:00' == $horario)? 'selected' : '';
	  $h4 = ('10:00-11:00' == $horario)? 'selected' : '';
	  $h5 = ('11:00-12:00' == $horario)? 'selected' : '';
	  $h6 = ('12:00-13:00' == $horario)? 'selected' : '';
	  $h7 = ('13:00-14:00' == $horario)? 'selected' : '';
	  $h8 = ('14:00-15:00' == $horario)? 'selected' : '';
	  $h9 = ('15:00-16:00' == $horario)? 'selected' : '';
	  $h10 = ('16:00-17:00' == $horario)? 'selected' : '';
	  $d1 = ('LUNES' == $dia)? 'selected' : '';
	  $d2 = ('MARTES' == $dia)? 'selected' : '';
	  $d3 = ('MIERCOLES' == $dia)? 'selected' : '';
	  $d4 = ('JUEVES' == $dia)? 'selected' : '';
	  $d5 = ('VIERNES' == $dia)? 'selected' : '';
	 
	?>
	<td><select name="hora">
		<option value='07:00-08:00' <?php echo $h1 ?> >07:00-08:00</option>
		<option value='08:00-09:00' <?php echo $h2 ?> >08:00-09:00</option>
		<option value='09:00-10:00' <?php echo $h3 ?> >09:00-10:00</option>
		<option value='10:00-11:00' <?php echo $h4 ?> >10:00-11:00</option>
		<option value='11:00-12:00' <?php echo $h5 ?> >11:00-12:00</option>
		<option value='12:00-13:00' <?php echo $h6 ?> >12:00-13:00</option>
		<option value='13:00-14:00' <?php echo $h7 ?> >13:00-14:00</option>
		<option value='14:00-15:00' <?php echo $h8 ?> >14:00-15:00</option>
		<option value='15:00-16:00' <?php echo $h9 ?> >15:00-16:00</option>
		<option value='16:00-17:00' <?php echo $h10 ?> >16:00-17:00</option>
	</select></td></tr>
	<tr><th>Dia:</th>
	<td><select name="dia">
		<option value='LUNES' <?php echo $d1 ?> >Lunes</option>
		<option value='MARTES' <?php echo $d2 ?> >Martes</option>
		<option value='MIERCOLES' <?php echo $d3 ?> >Miercoles</option>
		<option value='JUEVES' <?php echo $d4 ?> >Jueves</option>
		<option value='VIERNES' <?php echo $d5 ?>>Viernes</option>
	</select></td></tr>
	<tr><th>Aula:</th>
		<td><input type="text" name="aula" value="<?php echo $aula ?>" size="10" /></td></tr>
	
	</tr>
</table>
<br />
<center><input type="submit" value="Modifica Grupo" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasades.php'" /></center>
</form>
</div>
</body>

