

<?php 

include "docencabezado.php";

$no_de_control = $_GET['no_de_control'];
$periodo = $_GET['periodo'];
$i = $_GET['i'];
$calif =  $_GET['calif'];

for($j=1;$j<$i;$j++){
	if (($calif[$j]=='0') or ($calif[$j]=='1') or ($calif[$j]=='2') or ($calif[$j]=='3') or ($calif[$j]=='4')){
		$qry_actualiza="update seleccion_materias set calificacion = ".$calif[$j]. " where no_de_control = ".$no_de_control[$j]." and 
		periodo = ".$periodo." ";
		ejecuta_consulta($qry_actualiza);
	}
}


?>