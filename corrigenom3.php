
<?php 
include "encabezado.php";
$no_de_control = $_GET['no_de_control'];
$apellido_paterno = $_GET['apellido_paterno'];
$apellido_materno = $_GET['apellido_materno'];
$nombre_alumno = $_GET['nombre_alumno'];$estudia = $_GET['estudia'];$sexo    = $_GET['sexo'];if ($estudia =='1'){$carrera='7';$reticula='12';}//CPif ($estudia =='2'){$carrera='5';$reticula='10';}//IGEif ($estudia =='3'){$carrera='8';$reticula='28';}//ISCif ($estudia =='4'){$carrera='9';$reticula='9';}//INFOif ($estudia =='5'){$carrera='6';$reticula='25';}//IND
$qry_alu = "update alumnos set sexo='$sexo',carrera='$carrera',reticula='$reticula',apellido_paterno='$apellido_paterno',apellido_materno= '$apellido_materno', nombre_alumno = '$nombre_alumno'  where no_de_control ='$no_de_control'";
ejecuta_consultaf($qry_alu);$nombre_alumno = $nombre_alumno.' '.$apellido_paterno.' '.$apellido_materno;	$qry_alua = "update acceso set nombre_usuario = '$nombre_alumno' where usuario = '$no_de_control'";	ejecuta_consultaf($qry_alua);	
?>