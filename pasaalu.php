<?php 
include "encabezadoalumno.php"; ?>
<div id="mainFrame"  >
<?php 
$no_de_control = $usuario;
require_once("includes/config.inc.php");$qry_periodos = "select Max(periodo) as periodo from periodos_escolares ";$res_periodos = ejecuta_consultaf($qry_periodos);while ($fila = $res_periodos->fetch_assoc()) {	$periodo 		  = $fila['periodo'];}
$qry_alumnos="select concat(nombre_alumno,' ',apellido_paterno,' ',apellido_materno) as nombre ,sexo 
from alumnos 
where  no_de_control = '$no_de_control'";
$res_alumnos = ejecuta_consulta($qry_alumnos);
while ($fila = $res_alumnos->fetch_assoc()) {
	$nombre   = $fila['nombre'];
	$sexo 	  = $fila['sexo'];
}

$qry_alumnos1="select materia,grupo 
from seleccion_materias
where  no_de_control = '$no_de_control' and periodo = '$periodo'";
$res_alumnos1 = ejecuta_consulta($qry_alumnos1);
while ($fila1 = $res_alumnos1->fetch_assoc()) {
	$materia   = $fila1['materia'];
	$grupo 	  = $fila1['grupo'];
}
if(!empty($materia)){
$qry_datos_grupo = "select departamento,CONCAT(apellidos_empleado, ' ', nombre_empleado) as profesor, 
	nombre_completo_materia,m.materia,g.grupo,p.rfc, alumnos_inscritos,dia,horario,aula 	from personal as p,materias as m,grupos as g 
	where g.materia = m.materia and g.rfc = p.rfc and	m.materia = '$materia' and g.grupo = '$grupo' and g.periodo = '$periodo'";
	$res_grupos1 = ejecuta_consulta($qry_datos_grupo);
	while ($fila2 = $res_grupos1->fetch_assoc()) {
		$nombre_completo_materia = $fila2['nombre_completo_materia'];
		$alumnos_inscritos 		 = $fila2['alumnos_inscritos'];
		$profesor		 		 = $fila2['profesor'];
		$rfc			 		 = $fila2['rfc'];
		$horario		 		 = $fila2['horario'];
		$aula			 		 = $fila2['aula'];
		$dia			 		 = $fila2['dia'];
		$departamento	 		 = $fila2['departamento'];
	}


?>
		<h3>Alumno<?php echo '    :   '.$nombre. ' '.$no_de_control?></h3>
		<h3>Materia<?php echo '   :   '.$nombre_completo_materia?></h3>
		<h3>Tutor<?php echo '      :   '.$profesor?></h3>
		<h3>Horario<?php echo ' :   '.$horario.'  Aula :'.$aula.' Dia :'.$dia; ?></h3>
<?php
}
else
{
	echo "<div id='mainFrame'>  <center><h3>Este semestre no estas Inscrito</h3></center>	</div> ";
	
}

?>
</div>
