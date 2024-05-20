<?php
$tipo_sele = $_GET['tipo_sele'];
//Librerias y funciones
require_once("../../../includes/config.inc.php");
seguridad('DEP');
$web->Seguridad($_SESSION['susr'],3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->cssDir; ?>/tec_estilo.css" />
<script type="text/javascript" src="<?php echo $CFG->funciones_jsDir; ?>/funciones.js"> </script>
<script type="text/javascript">
function valida()
{
	if(document.inscripcion.no_de_control.value == '' || document.inscripcion.no_de_control.value == null)
	{
		alert("Ingrese Nmero de control")
		document.inscripcion.no_de_control.focus()
		return false
	}
	return true
}
</script>
<title>SII :: Inscripciones</title>
</head>

<body onload="document.inscripcion.no_de_control.focus()">
<?php
	if($tipo_sele == 'O')
		$encabezado = "Selecci&oacute;n Materias<br>periodo ordinario";
	else
		$encabezado = "Selecci&oacute;n Materias<br>verano";

	$action = $CFG->modulesDirServ."/alu/inscripciones/seleccion_materias/seleccion_materias.php?tipo_sele=".$tipo_sele;
	$regresar = "javascript: document.location = '".$CFG->rootDirServ."/".$_SESSION["pagina_inicio"]."bienvenida.php'";
?>
<form name="inscripcion" action="<?php echo $action; ?>" method="post" onsubmit="return valida()">
<div align="center">
	<h2> <?php echo $encabezado; ?> </h2>
	<table>
		<tr>
			<th align="left"> No. de Control </th>
			<td align="left"> <input type='text' name='no_de_control' value='<?php echo $no_de_control; ?>' maxlength="10" /> </td>
		</tr>
	</table>
	<br />
	<input type="submit" class="boton" value="Aceptar" />
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" value="Cancelar" class="boton" onclick="<?php echo $regresar; ?>" />
</div>
</form>
</body>
</html>
