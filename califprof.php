<?php 
include "encabezadoalumno.php";
$user = $usuario;
$confianza = $_GET["confianza"];
$calidad = $_GET["calidad"];
$disponibilidad = $_GET["disponibilidad"];
$planeacion = $_GET["planeacion"];$comentario = $_GET["comentario"];
$no_de_control = $user;
$qry_periodos = "select Max(periodo) as periodo from periodos_escolares ";$res_periodos = ejecuta_consultaf($qry_periodos);while ($fila = $res_periodos->fetch_assoc()) {	$periodo 		  = $fila['periodo'];}
$qry_alumnos1="select materia,grupo 
from seleccion_materias
where  no_de_control = '$no_de_control' and periodo = '$periodo'";
$res_alumnos1 = ejecuta_consulta($qry_alumnos1);
while ($fila1 = $res_alumnos1->fetch_assoc()) {
	$materia   = $fila1['materia'];
	$grupo 	  = $fila1['grupo'];
}

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
	$qry_inserta = " insert into evaluaprof values('$no_de_control','$rfc','$periodo',$confianza,$calidad,$disponibilidad,$planeacion,'$comentario')";
	ejecuta_consulta($qry_inserta);
	
?>