<?php 
require_once("includes/config.inc.php");
require_once("fpdf/fpdf.php");
require_once("pdf/funciones.pdf.php");
$periodo = $_GET['periodo'];$usuario = $_GET['usuario'];

	$pdf=new FPDF('P','mm','A4');
	$pdf->Open();
	$pdf->SetAutoPageBreak(0);	$qry_grupos="select calificacion,a.no_de_control,CONCAT(apellido_paterno, ' ',apellido_materno,' ', nombre_alumno) as alumno from grupos  g,personal p,alumnos a,seleccion_materias swhere  g.rfc='$usuario' and g.periodo = '$periodo' and g.rfc = p.rfc and a.no_de_control = s.no_de_control and s.materia = g.materia and s.periodo = g.periodo and s.grupo = g.grupo ";	$x_inicial = 40;	$y_inicial = 83;	$res_grupos = ejecuta_consulta($qry_grupos);	$pdf->AddPage();$i=0;	$pdf->Image("img/sep2.jpg", 15, 6, 180, 28);	$pdf->Image("img/ala.jpg", 5, 47, 180, 220);	$pdf->Image("img/firmaelisa.jpg", 120, 215, 50, 40);	$pdf->Image("img/SELLO.png", 155, 190, 50, 40);	$pdf->SetFont('Helvetica','b','16');	$pdf->SetXY(45, 10);	$pdf->Cell(133, 10,"", 0, 2, 'C', 0);	$pdf->SetFont('Helvetica','b','10');	$pdf->SetXY(10,45);	$pdf->Cell(200, 5, utf8_decode("Acta de Tutorias"), 0, 2, 'C');		$pdf->SetLineWidth(0.35);	$pdf->SetXY($x_inicial,50);	$pdf->SetX($x_inicial);	$pdf->SetFont('Helvetica','B','8');	$pdf->Cell(5,5,"No",1,0,"C");	$pdf->Cell(20,5,"No de Control",1,0,"C");	$pdf->Cell(80,5,"NOMBRE DEL ALUMNO",1,0,"C");	$pdf->Cell(20,5,"Calificacion",1,2,"C");		$pdf->SetFont('Helvetica','','7');	while ($fila = $res_grupos->fetch_assoc()) 	{	$i++;		$no_de_control      = $fila['no_de_control'];		$alumno   			= $fila['alumno'];			$calificacion  		= $fila['calificacion'];			if ($calificacion == 4)			$desem = 'EXCELENTE';		if ($calificacion == 3)			$desem = 'NOTABLE';		if ($calificacion == 2)			$desem = 'BUENO';		if ($calificacion == 1)			$desem = 'SUFICIENTE';		if ($calificacion == 0)			$desem = 'NO APROBADO';		                		$pdf->SetX($x_inicial);		$pdf->Cell(5,4,$i,1,0,"R");		$pdf->Cell(20,4,$no_de_control,1,0,"C");		$pdf->Cell(80,4,utf8_decode($alumno),1,0,"L");		$pdf->Cell(20,4,$desem,1,2,"C");               	
	}
		
	

	$pdf->SetLineWidth(0.09);
	$pdf->SetFont('Helvetica','','9');
	
	
	
	$pdf->SetXY(75,180);
	$pdf->Cell(70,5,'A T E N T A M E N T E',0,2,'C');
	$pdf->Cell(70,5, utf8_decode('Excelencia en Educación Tecnológica'),0,2,'C');
	$pdf->Cell(70,5,'"Tecnologia como Sinonimo de Independencia"',0,2,'C');
	
	$pdf->Line(10, 240,100,240);
	$pdf->SetXY(10,240);
	$pdf->Cell(70,5,utf8_decode($profesor),0,2,'C');
	$pdf->Cell(70,5,'TUTOR(A)',0,2,'C');

	$pdf->SetXY(145,230);
	$pdf->Cell(20,5,'Vo. Bo.',0,2,'L');

	
	$pdf->Line(120, 240,190,240);
	$pdf->SetXY(120,240);
	$pdf->Cell(70,5,'M.A. ELISA TRUJILLO BELTRAN',0,2,'C');
	$pdf->Cell(70,5,utf8_decode('JEFA DEL DEPARTAMENTO DE DESARROLLO ACADÉMICO'),0,2,'C');

	
    $pdf->Image("img/base.jpg", 25, 250, 165, 29);
	$pdf->Output();
?>
