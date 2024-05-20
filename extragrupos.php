<?php
$accion = $_GET['accion'];
//Librerias y funciones
require_once("../../../includes/config.inc.php");
require_once($CFG->funciones_phpDir."/funciones_combos.php");
session_start();
if (!isset($_SESSION['usuario'])){	
	?><script type="text/javascript">window.top.location = "index.html"</script><?php }
else $user = $_SESSION["usuario"];
$qry_periodo = 'select * from  pac_periodo_actual()';
$res_periodo = ejecutar_sql($qry_periodo);
$periodo = (isset($periodo))?$periodo:$res_periodo->Fields('periodo');

if (!isset($carrera_reticula )) $carrera_reticula  = '';
?>
<html>
<head>
<script language="javascript" type="text/javascript">
function valida(accion)
{
	x = document.datos_carrera
	if(x.carrera_reticula.value == '0')
	{
		alert("Seleccione Carrera / Reticula")
		x.carrera_reticula.focus()
		return false
	}
	if(x.periodo.value == '0')
	{
		alert("Seleccione un periodo")
		x.periodo.focus()
		return false
	}
	enviar('extramanto_grupos.php', 'datos_carrera')
}
</script>
<script type="text/javascript" src="<?php echo $CFG->funciones_jsDir; ?>/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->cssDir; ?>/tec_estilo.css" />
<title>SII :: Horarios materia/grupo</title>
</head>
<body>
<?php
	if($carrera_reticula)
	{
		$guion 		= strrpos($carrera_reticula, "_");
		$carrera 	= substr($carrera_reticula, 0, $guion);
		$reticula = substr($carrera_reticula, $guion+1);
	}
	if($accion == 'nuevo')
	{
		$encabezado = "Nuevo Horario y Grupo";
	}
	else if($accion == 'actualizar')
	{
		$encabezado = "Actualizar Horario y Grupo";
	}
	else if($accion == 'eliminar')
	{
		$encabezado = "Eliminar Horario y Grupo";
	}
	$regresar = "javascript: document.location = '".$CFG->rootDirServ."/modulos/dda/bienvenida.php'";
?>
<h2 align="center"> <?php echo ucwords($accion)." Horario y Grupo"; ?> </h2>
<form name="datos_carrera" action="extragrupos.php" method="post" onSubmit="return valida('<?php echo $accion; ?>')">
<input type="hidden" name="accion" value="<?php echo $accion; ?>">
	<table width="400" align="center">
		<tr>
			<th width="120" align="left"> Carrera: </th>
			<td id="non">
				<select name="carrera_reticula">
					<?php echo fcarreras_reticulas_permisos($carrera, $reticula, 'quiroz'); ?>
				</select>
			</td>
		</tr>
		<tr>
			<th width="120" align="left"> Periodo: </th>
			<td id="non">
				<select name="periodo"> <?php echo fperiodos_activos($periodo); ?> </select>
			</td>
		</tr>
		<tr>
			<th width="120" align="left"> Semestre: </th>
			<td id="non"> <select name="semestre" > <?php echo semestre($semestre)?> </select> </td>
		</tr>
	</table>
	<br />
	<div align="center">
		<input type="submit" value="Aceptar" class="boton" />
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="Cancelar" class="boton" onClick="<?php echo $regresar; ?>" />
	</div>
</form>
</body>
</html>	
