
<?php 
include "encabezado.php";
$no_de_control = $_GET['no_de_control'];
$hay = false;
$qry_alu = "select 	* from alumnos  where no_de_control ='$no_de_control'";
$res_alu = ejecuta_consultaf($qry_alu);
while ($fila = $res_alu->fetch_assoc()) {$hay = true;}
if ($hay == false){	
	$apellido_paterno = $_GET['apellido_paterno'];
	$apellido_materno = $_GET['apellido_materno'];
	$nombre_alumno = $_GET['nombre_alumno'];
	$sexo = $_GET['sexo'];
	$estudia = $_GET['estudia'];
	if ($estudia =='1'){$carrera='7';$reticula='12';}//CP
	if ($estudia =='2'){$carrera='5';$reticula='10';}//IGE
	if ($estudia =='3'){$carrera='8';$reticula='28';}//ISC
	if ($estudia =='4'){$carrera='9';$reticula='9';}//INFO
	if ($estudia =='5'){$carrera='6';$reticula='25';}//IND
	$qry_alu = "insert into alumnos(no_de_control,apellido_paterno,apellido_materno,nombre_alumno,reticula,carrera,sexo)
	values('$no_de_control','$apellido_paterno','$apellido_materno','$nombre_alumno','$reticula','$carrera','$sexo')";
	ejecuta_consultaf($qry_alu);	
	$nombre_alumno = $nombre_alumno.' '.$apellido_paterno.' '.$apellido_materno;
	$qry_alua = "insert into acceso(usuario,nombre_usuario,contrasena,tipo_usuario,status)
	values('$no_de_control','$nombre_alumno','e10adc3949ba59abbe56e057f20f883e','ALU','I')";
	ejecuta_consultaf($qry_alua);	
	
}
?>