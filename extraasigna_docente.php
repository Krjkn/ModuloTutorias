<?php 
include "encabezado.php";
$user = $_SESSION["usuario"];
?>
<body>
<div id="mainFrame">
<h2 align="center"> Asignaci�n  y Actualizaci�n <br> Periodo de Grupos </h2>
	<FORM action="extraasigna_docente1.php" method="get">
	<table width="400" align="center">
		<tr> <th colspan="2"> Periodo a trabajar </th> </tr>
		<tr> <th colspan="2" id='gris'> Datos del grupo(s) al que asignar� docente II</th> </tr>
		<tr>
			<th width="180" align="left"> Periodo: </th>
			<td>
				<select name="periodo"> <?php echo nperiodo($periodo); ?> </select>
			</td>
		</tr>
	</table>
 	<br />
    <div align="center">
		<input type="submit" name="aceptar" value="Aceptar" class="boton" onClick=""> 
		&nbsp; &nbsp; &nbsp;
		<input type="button" name="salir" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
	</div>
	
	</FORM>
</div>
</body>
	
