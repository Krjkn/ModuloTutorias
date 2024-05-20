<?php
//Librerias y funciones
  require_once("../../../includes/config.inc.php");
  require_once($CFG->funciones_phpDir."/funciones_tablas_grupos.php");
	require_once($CFG->funciones_phpDir."/funciones_combos.php");
	require_once($CFG->funciones_phpDir."/funciones_input.php");
	session_start();
if (!isset($_SESSION['usuario'])){	
	?><script type="text/javascript">window.top.location = "index.html"</script><?php }
else $user = $_SESSION["usuario"];
  
?>

<?php
	/* Rutina que asigna a variables los valores del array $_GET */
	if(!empty($_REQUEST))
	{
		foreach($_GET as $k => $v)
		{
   		$var 	= $k;	// toma el nombre de la variable
			$$var 	= $v;	// le asigna el valor
		}
	}	
 $peri = $periodo;
?>
 
<HTML>
<head>

<link rel="stylesheet" type="text/css" href="<?php echo $CFG->cssDir; ?>/tec_estilo.css" />
<script type="text/javascript" src="<?php echo $CFG->funciones_jsDir; ?>/funciones.js"></script>

<script type="text/javascript">
function valida_datos()
{
	formulario = document.datos_docente;
	if (formulario.materia_grupo.value == "0")
	{
		alert("Por favor seleccione el grupo al que se le asigará el profesor"); 	
		formulario.materia_grupo.focus(); 
    return;
	}
	
	if (formulario.rfc.value == "0")
	{
		alert("Por favor seleccione el profesor que será asignado al grupo seleccionado"); 	
		formulario.rfc.focus(); 
    return;
	}
	
	formulario.submit();
}

function enviar(pagina)
{
	formulario = document.datos_docente;
	formulario.action = pagina;
	formulario.submit();
}
</script>

<title>SIIT :: Asignaci&oacute;n/Actualizaci&oacute;n de docentes</title>

</head>

<body>

<h2 align="center"> ASIGNACI&Oacute;N/ACTUALIZACI&Oacute;N DE DOCENTES A GRUPOS </h2>
<form name="datos_docente" action="procesar_easigna_docente.php"  method="POST">
	<table align="center">
		<tr> <th colspan="2"> Datos para la asignación de docentes </th> </tr>
		<tr> <td>&nbsp;  </td>
		<tr> <td colspan="2" id="gris" align="center"> <b> Introduzca los siguientes datos: </b> </td>	</tr>
		<tr> 
			<th align="left"> Grupo: </th>
			<td>
			<select name ="mat_gru"> 
			   <?php echo grupo_materia($periodo); $periodo = $periodo?>
			</select>
			</td>
		</tr>	 
		<tr>
			<th align="left"> Docente: </th>
			<td>
			<select name="rfc">
               			<?php echo fmaestros_activos($rfc); ?>
			 </select>
			</td>
		</tr>
		<tr>
			<th align="left"> Periodo: </th>
			<td>
				<input type="text" name="periodo" value="<?php echo $periodo ?>">
			</td>
	
		</tr>
		<tr>
			<td colspan="2" align="center"> 
				<br>
				<input type="submit" name="aceptar" value="Registrar Docente" class="boton" onClick=""> 
				&nbsp; &nbsp; &nbsp;
				<input type="button" name="salir" value="Salir" class="boton" onClick="javascript:window.location = 'extraasigna_docente.php'"> 
			</td>
		</tr>
	</table>
</form>

<?php  
	//llamar función para desplegar los grupos existentes
	echo fehorarios_grupos_todos($periodo);
?>
</body>
</html>
