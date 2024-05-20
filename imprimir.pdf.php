<?php 
$usuario = $_GET['usuario'];
$user = $usuario;
$rfc = $user;
require_once("includes/config.inc.php");
require_once("fpdf/fpdf.php");
require_once("pdf/funciones.pdf.php");

$no_de_control = $_GET['materia'];
$numero = $_GET['periodo'];

$qry_datos_grupo = "select CONCAT(apellidos_empleado, ' ', nombre_empleado) as profesor from personal where rfc = '$rfc'";
$res_grupos1 = ejecuta_consultaf($qry_datos_grupo);
while ($fila = $res_grupos1->fetch_assoc()) {
	$profesor		 		 = $fila['profesor'];
}

require_once("includes/config.inc.php");
$qry_alumnos="select concat(nombre_alumno,' ',apellido_paterno,' ',apellido_materno) as nombre ,sexo from alumnos where  no_de_control = '$no_de_control'";
$res_alumnos = ejecuta_consultaf($qry_alumnos);
while ($fila = $res_alumnos->fetch_assoc()) {
	$nombre   = $fila['nombre'];
	$sexo 	  = $fila['sexo'];
}
require_once("includes/config.inc.php");
$qry_encuesta="select * from canalizaciones where  no_de_control = '$no_de_control' and numero = $numero";
$res_encuesta = ejecuta_consultaf($qry_encuesta);
while ($fila = $res_encuesta->fetch_assoc()) {
	$problema = $fila['problema'];  
	$area = $fila['area'];
	$resultados = $fila['resultados'];
	$fecha = $fila['fecha'];
	$acciones = $fila['acciones'];
	$seguimiento1 = $fila['seguimiento1'];
	$seguimiento2 = $fila['seguimiento2'];
}

$x_inicial = 10;
$y_inicial = 50;
$pdf=new FPDF();
$pdf->Open();
$pdf->SetAutoPageBreak(0);
$pdf->SetLineWidth(0.09);
$pdf->SetFont('Helvetica','','8');
$i = 0;
	$pdf->SetXY(10,283);
	$pdf->SetFont('Helvetica','','7');
	$pdf->SetLineWidth(0.35);
	$pdf->AddPage();
	encabezado_documentos($pdf,utf8_decode("ATENCIÓN TUTORIAL INDIVIDUAL"));
	//$pdf->Cell(133, 5,"", 0, 2, 'C', 0);
	$pdf->SetLineWidth(0.35);
	$pdf->SetXY($x_inicial,$y_inicial);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->Cell(100,5,"TUTOR: ".$profesor,0,2,'L');
	$pdf->Cell(100,5,"TUTORADO: ".$nombre,0,2,'L');
	$pdf->Cell(100,5,utf8_decode("FECHA DETECCIÓN DE NECESIDAD: ").$fecha,0,2,'L');
	$pdf->Cell(100,5,"NECESIDAD DETECTADA:",0,2,'L');
	$pdf->MultiCell(180,5,$problema,1);
	$pdf->Cell(100,5,"ACCIONES PROPUESTAS POR EL TUTOR:",0,2,'L');
	$pdf->MultiCell(180,5,$acciones,1);
	$pdf->Cell(180,5,utf8_decode("ÁREA A LA QUE SE CANALIZARA: ").$area,1,2,'L');
	$pdf->Cell(180,5,"",0,2,'L');
	$pdf->Cell(180,10,utf8_decode("RESULTADOS DE LA CANALIZACIÓN (ESPACIO LLENADO POR EL TUTORADO) "),0,2,'L');
	
	$pdf->Cell(180,5,"",0,2,'L');
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->Cell(180,7,"",1,2,"L");
	$pdf->SetXY($x_inicial,$y_inicial+170);
	$pdf->Cell(200,5,"       FIRMA DEL TUTORADO ",0,2,'L');
	$pdf->Cell(200,5,$nombre,0,2,'L');
		$pdf->SetXY($x_inicial,$y_inicial+200);
	$pdf->Cell(170,5,utf8_decode("FIRMA Y SELLO DEL DEPARTAMENTO QUE LO ATENDIÓ "),0,2,'R');
	//$pdf->SetFont('Helvetica','B','8');
	$pdf->Output();
?>
