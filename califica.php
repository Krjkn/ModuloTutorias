<?php 
include "docencabezado.php";
$rfc = $usuario;$qry_periodo="SELECT max(periodo) as periodo FROM periodos_escolares";$res_periodo = ejecuta_consulta($qry_periodo);while ($fila = $res_periodo->fetch_assoc()) 	$periodo      = $fila['periodo'];
	$qry_grupos="select calificacion,a.no_de_control,CONCAT(apellido_paterno, ' ',apellido_materno,' ', nombre_alumno) as alumno 
from grupos  g,personal p,alumnos a,seleccion_materias s
where  g.rfc='$rfc' and g.periodo = '$periodo' and g.rfc = p.rfc and a.no_de_control = s.no_de_control 
and s.materia = g.materia and s.periodo = g.periodo and s.grupo = g.grupo ";
	$res_grupos = ejecuta_consulta($qry_grupos);
    $tabla_grupos_docente  = "<div id='mainFrame'> <table align='center'>";
	$tabla_grupos_docente .= "	<tr align='center'>";
  	$tabla_grupos_docente .= "		<th> no_de_control </th>";
	$tabla_grupos_docente .= "		<th> Nombre Alumno </th>";
	$tabla_grupos_docente .= "		<th> Calificacion </th>";
	$tabla_grupos_docente .= "	</tr>";
	$non = false;    $i=1;	
	while ($fila = $res_grupos->fetch_assoc()) 
	{
		$no_de_control[$i]  = $fila['no_de_control'];		$alumno   			= $fila['alumno'];			$calif[$i]   		= $fila['calificacion'];			$id 				= ($non)?"par":"non";
		$tabla_grupos_docente .= "<tr id='".$id."'>";
		$tabla_grupos_docente .= "<td align='center'> ".$no_de_control[$i]." <input name=' no_de_control[".$i."] '  type='hidden' value = ".$no_de_control[$i]." type='text'> </td>";
		$tabla_grupos_docente .= "<td align='left'> ".$alumno." </td>"; 
		$tabla_grupos_docente .= "<td align='center'> <input name=' calif[".$i."] ' value = ".$calif[$i]." type='text'> </td>";  
		$tabla_grupos_docente .= "</tr>";
		$non = ($non)?false:true;		$i=$i+1;
	}			
	$tabla_grupos_docente .= "	</table>";
	?>	<form action="calificabd.php" method="get" name="form1">	<?php 	echo $tabla_grupos_docente; 	?>	<input name="periodo" type="hidden"  value="<?php echo $periodo; ?>"/>	<input name="i" type="hidden"  value="<?php echo $i; ?>"/>	<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>	<br />	<center><H2>EXCELENTE = 4 / NOTABLE = 3 / BUENO = 2 / SUFICIENTE = 1 / NO APROBADO = 0</H2>	<center><input type="submit" value="Actualiza y Continua" name="busca" class="boton" />	&nbsp;&nbsp;&nbsp;&nbsp;	<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'"/>	&nbsp;&nbsp;&nbsp;&nbsp;	<input type="button" name="Imprimir" value="imprimir" class="boton" onClick="javascript:window.location = 'acta.php?usuario=<?php echo $usuario; ?>&periodo=<?php echo $periodo; ?>'" /></center>	</form>
	
