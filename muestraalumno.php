<?php 
include "encabezado.php";
$user = $_SESSION["usuario"];
if(isset($_GET['no_de_control'])){
	$no_de_control = $_GET['no_de_control'];
}else $no_de_control = null;$qry_periodos = "select Max(periodo) as periodo from periodos_escolares ";$res_periodos = ejecuta_consultaf($qry_periodos);while ($fila = $res_periodos->fetch_assoc()) {	$periodo 		  = $fila['periodo'];}$qry_periodo = "select identificacion_corta from periodos_escolares where periodo = '$periodo'";$res_periodo = ejecuta_consultaf($qry_periodo);while ($filo = $res_periodo->fetch_assoc()) {	$identificacion_corta 		  = $filo['identificacion_corta'];}
?>

<div id="mainFrame">
<br>
<form method="get" action="muestraalumno.php">
	<table align="center">
    	<tr>
        	<th> Numero de Control: </th>
            <td>
				<input name="no_de_control" type="text" value="<?php echo $no_de_control; ?>" />
            </td>
        </tr>
    </table>
    <br />
    <div align="center">
        <input type="submit" value="Busca" class="boton" />
       
        <input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
    </div>
</form>

<?php
if($no_de_control <> null ){

$qry_alumnos="select concat(nombre_alumno,' ',apellido_paterno,' ',apellido_materno) as nombre ,sexo 
from alumnos 
where  no_de_control = '$no_de_control'";
$res_alumnos = ejecuta_consulta($qry_alumnos);
while ($fila = $res_alumnos->fetch_assoc()) {
	$nombre   = $fila['nombre'];
	$sexo 	  = $fila['sexo'];
}

$qry_alumnos1="select materia,grupo from seleccion_materias where  no_de_control = '$no_de_control' and periodo = '$periodo'";
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

?>
	<table width="100%">
		<tr align="center" ><h3> <?php echo $identificacion_corta ?></h3></tr> 
		<tr align="center" ><h3>ALUMNO<?php echo ':   '.$nombre. ' '.$no_de_control?></h3></tr>
		<tr align="center" ><h3>MATERIA<?php echo ':   '.$nombre_completo_materia?></h3></tr>
		<tr align="center" ><h3>PROFESOR<?php echo ':   '.$profesor?></h3></tr>
		<tr align="center" ><h3>Horario<?php echo ':   '.$horario?></h3></tr>
		<tr align="center" ><h3>Aula<?php echo ':   '.$aula?></h3></tr>
		<tr align="center" ><h3>Dia<?php echo ':   '.$dia?></h3></tr>
	</table>
	</div>
<?php
}
?>