<?php 
include "encabezado.php";
$periodo  = $_GET['periodo'];
$materia  = $_GET['materia'];
$grupo    = $_GET['grupo'];
$user = $_SESSION["usuario"];
$qry_grupos="select nombre_carrera as carrera,nombre_completo_materia as nmateria,CONCAT(nombre_empleado,' ',apellidos_empleado) as maestro,alumnos_inscritos,concat(dia,' ',horario,' ',aula) as viernes from carreras c, grupos g,materias m,personal p,materias_carreras mc where m.materia = mc.materia and mc.carrera = c.carrera and  g.materia = '$materia' and g.grupo = '$grupo' and g.materia=m.materia and g.periodo= '$periodo' and g.rfc = p.rfc";
	$res_grupos = ejecuta_consulta($qry_grupos);
	while ($fila = $res_grupos->fetch_assoc()) {
		$grupo   = $grupo;
		$materia = $materia;
		$nmateria = $fila['nmateria'];
		$ai  = $fila['alumnos_inscritos'];
		$maestro  =  $fila['maestro'];
		$viernes   = $fila['viernes'];
		$carrera   = $fila['carrera'];
	}
$regresar = "javascript: document.location = 'pasades.html'";
?>
<body>
<div id="mainFrame">
<form action="inscribe_alumnobd.php" method="post" name="form1">
<table align="center" cellpadding="0" cellspacing="0" border="0" width="500" id="resultado">
<tr>
	<th colspan="2" align="center">Inscripcion de Alumnos a Tutorias</th>
</tr>
<tr><td colspan="2" height="10"></td></tr>
	<tr><th>Carrera:</th>
	<td><input type="text" name="carrera" value="<?php echo $carrera ?>" size="50" /></td></tr>	
	<tr><th>Materia:</th>
	<td><input type="text" name="nomat" value="<?php echo $nmateria ?>" size="50" /></td></tr>	
	<tr><th>Clave:</th>
	<td><input type="text" name="materia" value="<?php echo $materia ?>" size="50" /></td></tr>
	<tr><th>Grupo:</th>
	<td><input type="text" name="grupo" value="<?php echo $grupo ?>" size="50" /></td></tr>
	<tr><th>Hora:</th>
	<td><input type="text" name="hora" value="<?php echo $viernes ?>" size="50" /></td></tr>
	<tr><th>Maestro:</th>
	<td><input type="text" name="nombre" value="<?php echo $maestro ?>" size="50" /></td></tr>
	<tr><th>Periodo:</th>
	<td><input type="text" name="periodo" value="<?php echo $periodo ?>" size="50" /></td></tr>
	<tr><th>Alumnos Inscritos:</th>
	<td><input type="text" name="ai" value="<?php echo $ai ?>" size="50" /></td></tr>
	<tr><th>Numero de Control:</th>
	<td><input type="text" name="no_de_control" value="22670"  /></td></tr>
	</tr>
</table>
<br />
<center><input type="submit" value="Alta de Alumno" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasades.php'" /></center>
</form>
</div>
</body>


