<?php 
	require_once("includes/config.inc.php");
	require_once("fpdf/fpdf.php");
	require_once("pdf/funciones.pdf.php");	$usuario = $_GET["usuario"];
	$rfc = $usuario;
	$periodo = $_GET["periodo"];
	$qry_periodos = "select * from periodos_escolares where periodo = '$periodo'";
	$res_periodos = ejecuta_consultaf($qry_periodos);
	while ($fila = $res_periodos->fetch_assoc()) {
		$primero 	  = $fila['primero'];
		$final 		  = $fila['final'];
	}
    $fechai= date("Y-m-d",strtotime($primero."- 50 days"));
	$fechaf = date("Y-m-d",strtotime($final."+ 20 days"));
	
	
	$x_inicial = 20;
	$y_inicial = 65;
	$pdf=new FPDF();
	$pdf->Open();
	$pdf->SetAutoPageBreak(0);
	$qry_datos_grupo = "select departamento,CONCAT(nombre_empleado,' ',apellidos_empleado) as profesor,m.materia,g.grupo, 
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
	$semestre1 ='';$semestre1 ='';
	if  (substr($periodo,4,1) == '1'){
		$semestre2 ='Segundo';
	}else {
		$semestre2 ='Primero';
	}
	$qry_carr = "select s.grupo,s.no_de_control,c.nombre_carrera,c.planestudios from seleccion_materias s,alumnos a,carreras c
	where s.materia = '$materia' and s.grupo = '$grupo' and	s.periodo ='$periodo' and s.no_de_control = a.no_de_control and a.carrera = c.carrera group by  c.nombre_carrera,c.planestudios";
	$res_carr = ejecuta_consultaf($qry_carr);
	$planestudios ='';$nombre_carrera = '';
	while ($fila = $res_carr->fetch_assoc()) {
		$nombre_carrera = $nombre_carrera.'   '.$fila['nombre_carrera'].',';
		$planestudios = $planestudios.'   '.$fila['planestudios'].',';
		$grupo1 = $fila['grupo'].',';
	}
	$pdf->AddPage();
	$pdf->Image("img/reporte1.png", 20, 6, 200, 40);	$pdf->Image("img/firmatacho.jpg", 50,140, 50, 50);	$pdf->Image("img/firmaelisa.jpg", 200, 150, 50, 40);	$pdf->Image("img/SELLO.png", 250, 140, 35, 40);
	$pdf->SetFont('Helvetica','b','16');
	$pdf->SetXY(45, 10);
	$pdf->Cell(133, 10,"", 0, 2, 'C', 0);
	$pdf->SetFont('Helvetica','b','10');
	$pdf->SetXY($x_inicial,$y_inicial-15);
	$pdf->Cell(270, 5, utf8_decode("INFORME PARCIAL DEL PLAN DE ACCIÓN TUTORIAL"), 0, 2, 'C');
	$pdf->SetLineWidth(0.35);
	$pdf->SetXY($x_inicial,$y_inicial-10);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->Cell(190,5,'Nombre del Tutor:  '.utf8_decode($profesor),1,0,'L');
	$pdf->Cell(30,5,'Fecha: '.$primero,1,0,'L');
	$pdf->Cell(30,5,'No. de Reporte:  1 ',1,2,'L');
	$todayh=getdate();
	 $di = $todayh['mday'];
     $m = $todayh['mon'];
     $ye = $todayh['year'];
	$pdf->SetX($x_inicial);
	$pdf->Cell(250,5,'',1,2,'L');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,"Programa Educativo:   ".$planestudios,1,0,'C');
	$pdf->Cell(70,5,'Grupo: '.$grupo,1,0,'C');
	$pdf->Cell(60,5,'Semestre: '.$semestre2,1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');
	$pdf->Cell(70,5,'Estudiantes atendidos en el semestre:',1,0,'C');
	$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,15,'Lista de estudiantes:',1,0,'C');
	$pdf->Cell(30,15,utf8_decode('Tutoría grupal'),1,0,'C');
	$X2=$pdf->GetX();
	$Y2=$pdf->GetY();
	$pdf->Cell(20,15,utf8_decode('Tutoría'),1,0,'C');
	$X3=$pdf->GetX();
	$Y3=$pdf->GetY();
	$pdf->SetXY($X2,$Y2+10);
	$pdf->Cell(20,5,utf8_decode('Individual'),0,0,'C');
	$pdf->SetXY($X3,$Y3);
	$X1=$pdf->GetX();
	$Y1=$pdf->GetY();
	$pdf->Cell(20,15,'',1,0,'C');
	$pdf->Cell(60,15,utf8_decode('Área'),1,2,'C');
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	$pdf->SetXY($X1,$Y1);
	$pdf->Cell(20,5,'Estudiantes',0,2,'C');
	$pdf->Cell(20,5,'Canalizados',0,2,'C');
	$pdf->Cell(20,5,'En el semestre',0,2,'C');
	$pdf->SetXY($X,$Y);
	$pdf->SetX($x_inicial);
	$X1=$pdf->GetX();
	$Y1=$pdf->GetY();
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');
	$pdf->SetX($x_inicial);	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');	$pdf->SetX($x_inicial);	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');	$pdf->SetX($x_inicial);	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');	$pdf->SetX($x_inicial);	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');	$pdf->SetX($x_inicial);	$pdf->Cell(120,5,'',1,0,'C');$pdf->Cell(30,5,'',1,0,'C'); $pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(20,5,'',1,0,'C');$pdf->Cell(60,5,'',1,2,'C');	$pdf->SetX($x_inicial);	
	$qry_lista = "select s.no_de_control,concat(apellido_paterno,' ',apellido_materno,' ',nombre_alumno) alumno from seleccion_materias s,alumnos a
	where s.materia = '$materia' and s.grupo = '$grupo' and	s.periodo ='$periodo' and s.no_de_control = a.no_de_control order by a.no_de_control";
	$res_lista = ejecuta_consultaf($qry_lista);
	$i= 1;
	$pdf->SetXY($X1,$Y1);
	$yy = 0;
	while ($fila5 = $res_lista->fetch_assoc()) {
		$pdf->SetXY($X1,$Y1+$yy);
		$alumno = $fila5['alumno'];
		$no_de_control = $fila5['no_de_control'];
		$alumno = ' '.$i.' '.$no_de_control.' '.$alumno;
		$pdf->Cell(120,5,utf8_decode($alumno),0,0,'L');
		$pdf->Cell(30,5,'X',0,0,'C');
		$i++;
		$qry_canaliza2 = "select area,problema from canalizaciones where  fecha > '$fechai' and fecha < '$fechaf' and '$no_de_control' = no_de_control ";
		$res_canaliza2 = ejecuta_consultaf($qry_canaliza2);
		$area='';$problema='';
		while ($fila2 = $res_canaliza2->fetch_assoc()) {
			$problem = $fila2['problema'];
			$problema = 'X';
			$area = $area.substr($fila2['area'],3,14).' ,';
		}
		$pdf->Cell(20,5,' '.utf8_decode($problema).' ',0,0,'C');
		$pdf->Cell(20,5,' '.utf8_decode($problema).' ',0,0,'C');
		$pdf->Cell(60,5,' '.utf8_decode($area).' ',0,2,'L');
		$yy= $yy +5;
	}
	
	
	$pdf->AddPage();
	
	$pdf->Image("img/reporte11.png", 20, 20, 200, 37);	$pdf->Image("img/firmatacho.jpg", 50,140, 50, 50);	$pdf->Image("img/firmaelisa.jpg", 200, 150, 50, 40);	$pdf->Image("img/SELLO.png", 250, 140, 35, 40);
	$pdf->SetFont('Helvetica','b','10');
	$pdf->SetXY($x_inicial,$y_inicial);
	
	
	$X=$pdf->GetX();$Y=$pdf->GetY();
	$pdf->SetFont('Helvetica','B','10');
	$pdf->Cell(250,100,"",1,2,'L'); $X1=$pdf->GetX();$Y1=$pdf->GetY();
	$pdf->SetXY($X,$Y);
	$pdf->Cell(250,5,"Observaciones:",0,2,'L');
	$pdf->SetFont('Helvetica','B','8');
		
	$qry_calendario = "select inicio,actividad from calendario
	where rfc = '$rfc' and periodo ='$periodo' and inicio <= '$primero' order by inicio";
	$res_calendario = ejecuta_consultaf($qry_calendario);
	$pdf->SetXY($x_inicial,$y_inicial+10);
	while ($fila = $res_calendario->fetch_assoc()) {
		$actividad = $fila['actividad'];
		$inicio = $fila['inicio'];
		$pdf->Cell(220,5,utf8_decode($actividad).'      '.$inicio,0,2,'L');
		$pdf->SetX($x_inicial);
	}
	
	$pdf->SetLineWidth(0.09);
	$pdf->SetFont('Helvetica','','10');
	$pdf->Line(20, 180,90,180);
	$pdf->SetXY(20,180);
	$pdf->Cell(70,5,'M.C. ANASTACIO CARRILLO QUIROZ',0,2,'C');
	$pdf->Cell(70,5,'COORDINADOR INSTITUCIONAL',0,2,'C');
	$pdf->Cell(70,5,'DEL PROGRAMA DE TUTORIAS',0,2,'C');
	
	$pdf->Line(120, 180,190,180);
	$pdf->SetXY(120,180);
	$pdf->Cell(70,5,utf8_decode($profesor),0,2,'C');
	$pdf->Cell(70,5,'TUTOR(A)',0,2,'C');

	
	$pdf->Line(200, 180,270,180);
	$pdf->SetXY(200,180);
	$pdf->Cell(70,5,'M.A. ELISA TRUJILLO BELTRAN',0,2,'C');
	$pdf->Cell(70,5,'JEFE DEL DEPARTAMENTO DE',0,2,'C');
	$pdf->Cell(70,5,utf8_decode('DESARROLLO ACADÉMICO'),0,2,'C');
	$pdf->Output();
?>
