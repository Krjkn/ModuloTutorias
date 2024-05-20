<?php
include "encabezado.php";
$user = $_SESSION["usuario"];
$periodo = $_GET["periodo"];

$qry_periodos = "select * from periodos_escolares where periodo = '$periodo'";
$res_periodos = ejecuta_consultaf($qry_periodos);
while ($fila = $res_periodos->fetch_assoc()) {
	$identificacion_corta = $fila['identificacion_corta'];
	$diagnostico 		  = $fila['diagnostico'];
	$primero		 	  = $fila['primero'];
	$segundo		 	  = $fila['segundo'];
	$final		 		  = $fila['final'];
}
?>
<body>
<div id="mainFrame">
<h2 align="center"> Datos del Periodo :</i> <?php echo $identificacion_corta;  ?> </h2>
<h2 align="center"> Fechas de Reportes del periodo </h2>
<form name="datos_docente" action="periodo3.php"  method="POST">
	<table align="center" WIDTH="50%" >
		<tr> <th align="left"> Periodo: </th><td><input type="text" name="periodo" value="<?php echo $periodo ?>" readonly></td></tr>
		<tr> <th align="left"> Fecha Diagnostico</th><td><input type="text" name="diagnostico" value="<?php echo $diagnostico ?>"></td></tr>
		<tr> <th align="left"> Fecha primer reporte </th><td><input type="text" name="primero" value="<?php echo $primero ?>"></td></tr>
		<tr> <th align="left"> Fecha segundo reporte </th><td><input type="text" name="segundo" value="<?php echo $segundo ?>"></td></tr>
		<tr> <th align="left"> Fecha reporte final </th><td><input type="text" name="final" value="<?php echo $final ?>"></td></tr>	 
	
		
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

