<?php 
include "docencabezado.php";
$user = $usuario;
$no_de_control = $_GET['materia'];
function fareas( $rfc=NULL)
{
	require_once("includes/config.inc.php");
	$qry_personal = "select * from areas";
	$materia_grupo='';
	$res_personal = ejecuta_consulta($qry_personal);
	$opciones = "";
	while ($fila = $res_personal->fetch_assoc())
		{
			$s = (trim($rfc) == trim($fila['descripcion']))?" selected":"";
			$opciones.= '<option value="'.$fila['descripcion'].'" '.$s.'>'.$fila['descripcion'].'</option>';
		}
	return $opciones;
}
$qry_alumnos="select concat(nombre_alumno,' ',apellido_paterno,' ',apellido_materno) as nombre ,sexo from alumnos where  no_de_control = '$no_de_control'";
$res_alumnos = ejecuta_consulta($qry_alumnos);
while ($fila = $res_alumnos->fetch_assoc()) {
	$nombre   = $fila['nombre'];
	$sexo 	  = $fila['sexo'];
}

$qry_periodos = "select * from periodos_escolares order by periodo desc";
	$res_periodos = ejecuta_consultaf($qry_periodos);
	$fila = $res_periodos->fetch_assoc();
	$diagnostico 		  = $fila['diagnostico'];
	$fech= date("Y-m-d",strtotime($diagnostico."- 1 days"));

$problema = ''; 
$objetivo = '';
$area = '';
$resultados = '';
$fecha = $fech;
$acciones = '';
$seguimiento1 = '';
$seguimiento2 = '';
$regresar = "javascript: document.location = 'index.html'";
?>
<div id="mainFrame">
<form action="nuevocanaliza.php" method="get" name="form1" >
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">DATOS DE LA CANALIZACIÓN DE <?php echo $nombre. ' '.$no_de_control?></font></h3></td></tr>
	</table>
	<table width="100%" align="center">
		<tr><td height="10"></td></tr>
		<tr><th>Necesidad detectada(Problematica identificada):</th>
		<td>
		<input type="text" name="problema" value="<?php echo $problema?>"  size="120" />
		</td></tr>
		<tr><th>Objetivo(¿Que?, ¿Como? y ¿Para Que?):</th>
		<td>
		<input type="text" name="objetivo" value="<?php echo $objetivo?>"  size="120" />
		</td></tr>
		<tr><th>Accion Recomendada(Acciones):</th>
		<td>
		<input type="text" name="acciones" value="<?php echo $acciones?>"  size="120" />
		</td>	</tr>
		<tr><th>Area y Servicio a canalizar:</th>
		<td>
		<select name="area">
        	<?php echo fareas($area); ?>
        </select>
		</td></tr>
		<tr><th>Fecha en la que se detecto la necesidad:</th>
		<td>
		<input name="fecha" type="text" id="fecha" value="<?php echo $fecha; ?>" size="10" maxlength="10" readonly="true">
		<input name="boton" class="calendario" type="button" value="..." size="3" maxlength="3" onclick="popUpCalendar(boton,fecha,'yyyy-mm-dd');">	
		</td></tr>
		<tr><th>Primer Seguimineto de la necesidad:</th>
		<td>
		<input type="text" name="seguimiento1" value="<?php echo $seguimiento1?>"  size="120" />
		</td></tr>
		<tr><th>Primer Seguimineto de la necesidad:</th>
		<td>
		<input type="text" name="seguimiento2" value="<?php echo $seguimiento2?>"  size="120" />
		</td></tr>
		<tr><th>Reporte Final de la necesidad:</th>
		<td>
		<input type="text" name="resultados" value="<?php echo $resultados?>"  size="120" />
		<input type="hidden" name="no_de_control" value="<?php echo $no_de_control?>">		<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
		</td></tr>
		</tr>
	</table>
	<br/>
	<center><input type="submit" value="Alta de Nueva Canalización" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasa.php'" /></center>
</form>
</div>


