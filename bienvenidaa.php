<?php 
session_start();
if (!isset($_SESSION['usuario'])){	
	?><script type="text/javascript">window.top.location = "index.html"</script><?php }
else $user = $_SESSION["usuario"];
$no_de_control = $user;

require_once("includes/config.inc.php");
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
where  no_de_control = '$no_de_control' and periodo = '20191'";
$res_alumnos1 = ejecuta_consulta($qry_alumnos1);
while ($fila1 = $res_alumnos1->fetch_assoc()) {
	$materia   = $fila1['materia'];
	$grupo 	  = $fila1['grupo'];
}

$qry_datos_grupo = "select departamento,CONCAT(apellidos_empleado, ' ', nombre_empleado) as profesor, 
	nombre_completo_materia,m.materia,g.grupo,p.rfc, alumnos_inscritos,dia,horario,aula 	from personal as p,materias as m,grupos as g 
	where g.materia = m.materia and g.rfc = p.rfc and	m.materia = '$materia' and g.grupo = '$grupo' and g.periodo = '20191'";
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
<body>	
	<table width="100%">
		
		<tr align="center" ><td>ENERO-JUNIO 2019</font></h3></td></tr>
		<tr align="center" ><td>ALUMNO<?php echo ':   '.$nombre. ' '.$no_de_control?></font></h3></td></tr>
		<tr align="center" ><td>MATERIA<?php echo ':   '.$nombre_completo_materia?></font></h3></td></tr>
		<tr align="center" ><td><h3><font  color="white">PROFESOR<?php echo ':   '.$profesor?></font></h3></td></tr>
		<tr align="center" ><td><h3><font  color="white">Horario<?php echo ':   '.$horario?></font></h3></td></tr>
		<tr align="center" ><td><h3><font  color="white">Aula<?php echo ':   '.$aula?></font></h3></td></tr>
		<tr align="center" ><td>Dia<?php echo ':   '.$dia?></font></h3></td></tr>
	</table>
<?php
?>