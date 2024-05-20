<?php 
include "docencabezado.php";
$user = $usuario;
$no_de_control = $_GET['materia'];
$numero = $_GET['periodo'];
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
$qry_encuesta="select * from canalizaciones where  no_de_control = '$no_de_control' and numero = $numero";
$res_encuesta = ejecuta_consulta($qry_encuesta);
while ($fila = $res_encuesta->fetch_assoc()) {
	$problema = $fila['problema'];  
	$objetivo = $fila['objetivo'];
	$area = $fila['area'];
	$resultados = $fila['resultados'];
	$fecha = $fila['fecha'];
	$acciones = $fila['acciones'];
	$seguimiento1 = $fila['seguimiento1'];
	$seguimiento2 = $fila['seguimiento2'];
}
$regresar = "javascript: document.location = 'index.html'";
?>
<div id="mainFrame">
<form action="grabacanaliza.php" method="get"  >
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">DATOS DE LA CANALIZACIÓN DE <?php echo $nombre. ' '.$no_de_control?></font></h3></td></tr>
	</table>
	<table width="100%" align="center">
		<tr><td height="10"></td></tr>
		<tr><th>Necesidad detectada (Problematica identificada):</th>
		<td>
		<input type="text" name="problema" value="<?php echo $problema?>"  size="120" />
		</td></tr>
		<tr><th>Objetivo(¿Que?, ¿Como? y ¿Para Que?):</th>
		<td>
		<input type="text" name="objetivo" value="<?php echo $objetivo?>"  size="120" />
		</td></tr>
		<tr><th>Accion Recomendada (Acciones):</th>
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
		<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
		<input type="text" name="resultados" value="<?php echo $resultados?>"  size="120" />
		<input type="hidden" name="no_de_control" value="<?php echo $no_de_control?>">
		<input type="hidden" name="numero" value="<?php echo $numero?>">
		</td></tr>
		</tr>
	</table>
	<br/>
	<center><input type="submit" value="Modifica" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'" /></center>
</form>
</div>


