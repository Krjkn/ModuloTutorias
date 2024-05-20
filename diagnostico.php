<?php 
	require_once("includes/config.inc.php");
	require_once("fpdf/fpdf.php");
	require_once("pdf/funciones.pdf.php");
	$rfc = $_GET["usuario"];
	$periodo = $_GET["periodo"];

	$qry_periodos = "select * from periodos_escolares where periodo = '$periodo'";
	$res_periodos = ejecuta_consultaf($qry_periodos);
	while ($fila = $res_periodos->fetch_assoc()) {
		$diagnostico 		  = $fila['diagnostico'];
		$primero 	  = $fila['primero'];
		$final 		  = $fila['final'];
	}
    $fechai= date("Y-m-d",strtotime($primero."- 50 days"));
	$fechaf = date("Y-m-d",strtotime($final."+ 20 days"));
	
	$x_inicial = 10;
	$y_inicial = 65;
	$pdf=new FPDF();
	$pdf->Open();
	$pdf->SetAutoPageBreak(0);
	$qry_datos_grupo = "select departamento,CONCAT(apellidos_empleado, ' ', nombre_empleado) as profesor,m.materia,g.grupo, 
	nombre_completo_materia,alumnos_inscritos	from personal as p,materias as m,grupos as g 
	where g.materia = m.materia and g.rfc = p.rfc and	p.rfc ='$rfc' and g.periodo = '$periodo'";
	$res_grupos1 = ejecuta_consultaf($qry_datos_grupo);
	while ($fila = $res_grupos1->fetch_assoc()) {
		$nombre_completo_materia = $fila['nombre_completo_materia'];
		$alumnos_inscritos 		 = $fila['alumnos_inscritos'];
		$profesor		 		 = $fila['profesor'];
		$materia		 		 = $fila['materia'];
		$grupo		 		 	 = $fila['grupo'];
	}
	$semestre1 ='';$semestre1 ='';$semestre2='';
	if  ($nombre_completo_materia == 'TUTORIAS II')
		$semestre2 ='X';
	else 
		$semestre1 ='X';
	$qry_carr = "select s.no_de_control,c.nombre_carrera,c.planestudios from seleccion_materias s,alumnos a,carreras c
	where s.materia = '$materia' and s.grupo = '$grupo' and	s.periodo ='$periodo' and s.no_de_control = a.no_de_control and a.carrera = c.carrera group by  c.nombre_carrera,c.planestudios";
	$res_carr = ejecuta_consultaf($qry_carr);
	$planestudios ='';$nombre_carrera = '';
	while ($fila = $res_carr->fetch_assoc()) {
		$nombre_carrera = $nombre_carrera.'   '.$fila['nombre_carrera'].',';
		$planestudios = $planestudios.'   '.$fila['planestudios'].',';
	}
	$pdf->AddPage();
	$pdf->Image("img/diagnostico.png", 10, 6, 190, 40);	$pdf->Image("img/firmatacho.jpg", 50,250, 50, 40);	$pdf->Image("img/firmaelisa.jpg", 90, 250, 50, 40);	$pdf->Image("img/SELLO.png", 140, 200, 35, 40);
	$pdf->SetFont('Helvetica','b','16');
	$pdf->SetXY(45, 10);
	$pdf->Cell(133, 10,"", 0, 2, 'C', 0);
	$pdf->SetFont('Helvetica','b','10');
	$pdf->SetXY($x_inicial,$y_inicial-15);
	$pdf->Cell(190, 5, "DIAGNOSTICO INICIAL", 0, 2, 'C');
	$pdf->SetLineWidth(0.35);
	$pdf->SetXY($x_inicial,$y_inicial-10);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->SetFillColor(211, 211, 211);
	$pdf->Cell(190,5,"DATOS GENERALES",1,2,'C',True);
	$pdf->Cell(40,5,'Nombre del Tutor:',1,0,'C');
	$pdf->Cell(90,5,utf8_decode($profesor),1,0,'C');
	$pdf->Cell(20,5,'Fecha:',1,0,'C');
	$todayh=getdate();
	 $di = $todayh['mday'];
     $m = $todayh['mon'];
     $ye = $todayh['year'];
	//$pdf->Cell(40,5,$di.'-'.$m.'-'.$ye,1,2,'C');
	$pdf->Cell(40,5,$diagnostico,1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(190,5,"Carreras:  ".utf8_decode($nombre_carrera),1,2,'L');
	$pdf->SetX($x_inicial);
	$pdf->Cell(47,20,"Plan de Estudios",1,0,'C');
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	$pdf->Cell(48,20,'',0,0,'C');
	$X1=$pdf->GetX();
	$Y1=$pdf->GetY();
	$pdf->SetXY($X,$Y);
	$pdf->MultiCell(48,5,$planestudios,0,'L',0);
	$pdf->SetXY($X1,$Y1);
	$pdf->Cell(95,5,utf8_decode('Semestre: (marque con una X según sea el caso)'),1,2,'C');
	$pdf->Cell(48,15,'Nuevo Ingreso  ( '.$semestre1.' )',1,0,'C');
	$pdf->Cell(47,15,'2do Semestre en Adelante( '.$semestre2.') ',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(190,5,utf8_decode("TIPO DE TUTORÍA"),1,2,'C',True);
	$pdf->SetX($x_inicial);
	$pdf->Cell(95,5,"Grupal",1,0,'C');
	$pdf->Cell(95,5,"Individual",1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(47,20,"Cantidad Tutorados:",1,0,'C');
	$pdf->Cell(48,20,$alumnos_inscritos.' Alumnos, Se Anexa Lista',1,0,'C');
	$pdf->Cell(47,10,'Nombre del Tutorado',1,0,'C');
	$pdf->Cell(48,10,'',1,2,'C');
	$pdf->SetX($x_inicial+95);
	$pdf->Cell(47,10,'Numero de Control',1,0,'C');
	$pdf->Cell(48,10,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(18,5,"",0,2,'C');
	$pdf->SetX($x_inicial);
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	$pdf->Cell(190,50,'',1,2,'C');
	$X1=$pdf->GetX();
	$Y1=$pdf->GetY();
	$pdf->SetXY($X,$Y);	$qry_canaliza = "select s.no_de_control,problema,objetivo,acciones from seleccion_materias s,canalizaciones c	where c.fecha > '$fechai' and c.fecha < '$fechaf' and s.materia = '$materia' and s.grupo = '$grupo' and	s.periodo ='$periodo' and s.no_de_control = c.no_de_control order by problema";    $pdf->Cell(190,5,utf8_decode('Problematíca Identificada:').$fechai.$fechaf,0,2,'L');
	
	$res_canaliza = ejecuta_consultaf($qry_canaliza);
	while ($fila = $res_canaliza->fetch_assoc()) {
		$problema = $fila['problema'];
		$no_de_contro = $fila['no_de_control'];
		$pdf->Cell(190,3,utf8_decode($problema).' '.$no_de_contro,0,2,'L');
	}
	$pdf->SetXY($X1,$Y1);
	$pdf->SetX($x_inicial);
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	$pdf->Cell(190,50,'',1,2,'C');
	$X1=$pdf->GetX();
	$Y1=$pdf->GetY();
	$pdf->SetXY($X,$Y);
	$pdf->Cell(190,5,utf8_decode('Objetivos:  (La redacción debe de estar de tal forma, que permita contestar a las siguentes cuestiones ¿Que? ¿Como? ¿Paraque?)'),0,2,'L');
	$res_canaliza1 = ejecuta_consultaf($qry_canaliza);
	while ($fila1 = $res_canaliza1->fetch_assoc()) {
		$objetivo = $fila1['objetivo'];
		$no_de_contro1 = $fila1['no_de_control'];
		$pdf->Cell(190,3,utf8_decode($objetivo).' '.$no_de_contro1,0,2,'L');
	}
	$pdf->SetXY($X1,$Y1);
	$pdf->SetX($x_inicial);
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	$pdf->Cell(190,35,'',1,2,'C');
	$X1=$pdf->GetX();
	$Y1=$pdf->GetY();
	$pdf->SetXY($X,$Y);
	$pdf->Cell(190,5,'Accciones:',0,2,'L');
	$res_canaliza2 = ejecuta_consultaf($qry_canaliza);
	while ($fila2 = $res_canaliza2->fetch_assoc()) {
		$acciones = $fila2['acciones'];
		$no_de_contro2 = $fila2['no_de_control'];
		$pdf->Cell(190,3,utf8_decode($acciones).' '.$no_de_contro2,0,2,'L');
	}		
	$pdf->SetXY($X1,$Y1);
	$pdf->SetX($x_inicial);
	$pdf->AddPage();
	$pdf->Image("img/diagnostico1.png", 10, 6, 190, 40);	$pdf->Image("img/firmatacho.jpg", 50,250, 50, 40);	$pdf->Image("img/firmaelisa.jpg", 90, 250, 50, 40);	$pdf->Image("img/SELLO.png", 140, 200, 35, 40);
	$pdf->SetFont('Helvetica','b','10');
	$pdf->SetXY($x_inicial,$y_inicial-25);
	$pdf->Cell(95,10,"Actividad",1,0,'C',True);
	$pdf->Cell(95,5,utf8_decode('Calendarización'),1,2,'C',True);
	$pdf->Cell(48,5,'Inicio',1,0,'C',True);
	$pdf->Cell(47,5,'Termino',1,2,'C',True);
	$qry_calendario = "select actividad,inicio,termino,evaluacion from calendario
	where rfc = '$rfc' and periodo ='$periodo' order by inicio";
	$res_calendario = ejecuta_consultaf($qry_calendario);
	while ($fila = $res_calendario->fetch_assoc()) {
		$actividad = $fila['actividad'];
		$inicio = $fila['inicio'];
		$termino = $fila['termino'];
		$pdf->SetX($x_inicial);	
	$X=$pdf->GetX();$Y=$pdf->GetY();
	$pdf->SetFont('Helvetica','B','10');
	$pdf->Cell(95,8,"",1,0,'C'); $X1=$pdf->GetX();$Y1=$pdf->GetY();
	$pdf->SetXY($X,$Y);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->MultiCell(95,2.7,utf8_decode($actividad),0,'L',0);
	$pdf->SetXY($X1,$Y1);
	$X=$pdf->GetX();$Y=$pdf->GetY();
	$pdf->SetFont('Helvetica','B','10');
	$pdf->Cell(48,8,"",1,0,'C'); $X1=$pdf->GetX();$Y1=$pdf->GetY();
	$pdf->SetXY($X,$Y);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->MultiCell(48,5,$inicio,0,'C',0);
	$pdf->SetXY($X1,$Y1);
	$X=$pdf->GetX();$Y=$pdf->GetY();
	$pdf->SetFont('Helvetica','B','10');
	$pdf->Cell(47,8,"",1,2,'C'); $X1=$pdf->GetX();$Y1=$pdf->GetY();
	$pdf->SetXY($X,$Y);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->MultiCell(47,4,$termino,0,'C',0);
	$pdf->SetXY($X1,$Y1);
	}
	$pdf->SetXY($X1,$Y1);
	$pdf->SetFont('Helvetica','B','10');
	$pdf->SetX($x_inicial);$pdf->Cell(190,10,'',0,2,'C');
	$pdf->SetX($x_inicial);$pdf->Cell(190,5,utf8_decode('Evaluación'),1,2,'C',True);
	$res_calendario = ejecuta_consultaf($qry_calendario);
	$pdf->SetFont('Helvetica','B','8');
	while ($fila = $res_calendario->fetch_assoc()) {
		$evaluacion = $fila['evaluacion'];
		$pdf->SetX($x_inicial);$pdf->Cell(190,5,utf8_decode($evaluacion),1,2,'L');
	}	
	$pdf->SetLineWidth(0.09);
	$pdf->SetFont('Helvetica','','10');
	$pdf->Line(125, 254,200,254);
	$pdf->SetXY(130,255);
	$pdf->Cell(70,5,utf8_decode($profesor),0,0,'C');
	$pdf->Output();
?>
