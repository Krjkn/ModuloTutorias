<?php
include "encabezado.php";
$user = $_SESSION["usuario"];
$periodo = $_GET["periodo"];
?>
<body>
<div id="mainFrame">
<h2 align="center"> Grupos de Tutorias del Periodo:</i> <?php echo $periodo;  ?> </h2>
<h2 align="center"> ASIGNACI&Oacute;N/ACTUALIZACI&Oacute;N DE DOCENTES A GRUPOS </h2>
<form name="datos_docente" action="procesar_easigna_docente.php"  method="POST">
	<table align="center" WIDTH="50%" >
		<tr> <th colspan="2"> Datos para la asignación de docentes </th> </tr>
		<tr> <td colspan="2" id="gris" align="center"> <b> Introduzca los siguientes datos: </b> </td>	</tr>
		<tr> 
			<th align="left"> GrupoT: </th>
			<td>
			<select style="width:750px" name ="mat_gru"> 
			   <?php echo grupo_materia($periodo);?>
			</select>
			</td>
		</tr>	 
		<tr>
			<th align="left"> Docente: </th>
			<td>
			<select  style="width:750px" name="rfc">
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
		</table>
 	<br />
    <div align="center">
		<input type="submit" name="aceptar" value="Aceptar" class="boton" onClick=""> 
		&nbsp; &nbsp; &nbsp;
		<input type="button" name="salir" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
	</div>
	
	</form>
</div>
</body>

