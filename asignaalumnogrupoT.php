<?php
//Librerias y funciones
  require_once("../../../includes/config.inc.php");
	require_once($CFG->funciones_phpDir."/funciones_combos.php");
  session_start();
	if (!isset($_SESSION['usuario'])){	
		?><script type="text/javascript">window.top.location = "index.html"</script><?php }
	else $user = $_SESSION["usuario"];
?>
<HTML>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->cssDir; ?>/tec_estilo.css" />
<script type="text/javascript" src="<?php echo $CFG->funciones_jsDir; ?>/funciones.js"></script>

<script type="text/javascript">

function enviar(pagina)
{
	document.datos_docente.action= pagina; 
	document.datos_docente.submit();
}

function valida_datos()
{
	formulario = document.datos_docente;
	
	
	
	if(formulario.periodo.value == "0")
	{
		alert("Seleccione un periodo.");
		formulario.periodo.focus();
		return false;
	}
	
	
	enviar('asignaalumnogrupo1.php');
}

</script>

<title>SIIT :: Asignaci&oacute;n de docentes</title>
</head>

<body>


<h2 align="center"> Asignación  y Actualización <br> Periodo de Grupos </h2>

<FORM name="datos_docente" action="asignaalumnogrupo.php" method="post">
	<INPUT TYPE=hidden NAME="ap" VALUE="a">
	<INPUT TYPE=hidden NAME="ds" VALUE="s">
	<table width="400" align="center">
		<tr> <th colspan="2"> Periodo a trabajar </th> </tr>
		
		<tr> <td>&nbsp;  </td> </tr>
		<tr> <th colspan="2" id='gris'> Datos del grupo(s) al que asignará docente </th> </tr>
		<tr>
			<th width="150" align="left"> Periodo: </th>
			<td>
				<select name="periodo"> <?php echo fperiodos_activos($periodo); ?> </select>
			</td>
		</tr>
 		

		<tr>
			<td colspan="2" align="center"> 
				<br>
				<input type="button" name="aceptar" value="Aceptar" class="boton" onClick="valida_datos();"> 
				&nbsp; &nbsp; &nbsp;
				<input type="button" name="salir" value="Cancelar" class="boton" onClick="javascript:window.location = '../bienvenida.php'"> 
			</td>
		</tr>
	</table>
	</FORM>
</body>
</html>	
