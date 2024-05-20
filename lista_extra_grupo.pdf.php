<?php 

	require_once("includes/config.inc.php");
	require_once("fpdf/fpdf.php");
	require_once("pdf/funciones.pdf.php");
	
	$periodo = $_GET["periodo"];
	$materia = $_GET["materia"];
	$grupo   = $_GET["grupo"];

	function datos_iniciales_docto($pdf, $periodo, $materia, $grupo, $x_inicial, $y_inicial)
	{
	require_once("includes/config.inc.php");	
	$qry_datos_grupo = "select departamento,CONCAT(apellidos_empleado, ' ', nombre_empleado) as profesor, 
	nombre_completo_materia,m.materia,g.grupo,p.rfc, alumnos_inscritos,dia,horario,aula 	from personal as p,materias as m,grupos as g 
	where g.materia = m.materia and g.rfc = p.rfc and	m.materia = '$materia' and g.grupo = '$grupo' and g.periodo = '$periodo'";
	$res_grupos1 = ejecuta_consultaf($qry_datos_grupo);
	while ($fila = $res_grupos1->fetch_assoc()) {
		$grupo  				 = $fila['grupo'];
		$materia				 = $fila['materia'];
		$nombre_completo_materia = $fila['nombre_completo_materia'];
		$alumnos_inscritos 		 = $fila['alumnos_inscritos'];
		$profesor		 		 = $fila['profesor'];
		$rfc			 		 = $fila['rfc'];
		$horario		 		 = $fila['horario'];
		$aula			 		 = $fila['aula'];
		$dia			 		 = $fila['dia'];
		$departamento	 		 = $fila['departamento'];
	}
	$lunes='';$martes='';$miercoles='';
	$jueves='';$viernes='';$sabado='';
    if (trim($dia) =='LUNES')
		$lunes =' '.$horario.' '.$aula;
	if ($dia =='MARTES')
		$martes =' '.$horario.' '.$aula;
	if ($dia =='MIERCOLES')
		$miercoles =' '.$horario.' '.$aula;
	if ($dia =='JUEVES')
		$jueves =' '.$horario.' '.$aula;
	if (trim($dia) =='VIERNES')
		$viernes =' '.$horario.' '.$aula;
	if ($dia =='SABADO')
		$sabado =' '.$horario.' '.$aula;
	$pdf->AddPage();
	
	$pdf->Image("img/encalista.png", 10, 6, 190, 40);
	$pdf->SetFont('Helvetica','b','16');
	$pdf->SetXY(45, 10);
	$pdf->Cell(133, 10,"", 0, 2, 'C', 0);
	$pdf->SetFont('Helvetica','b','10');
	$pdf->SetXY(45, 50);
	$pdf->Cell(133, 5, "LISTA DE ESTUDIANTES DEL GRUPO DE TUTORADOS", 0, 2, 'C', 0);
	
	$pdf->Cell(133, 5,"", 0, 2, 'C', 0);
	$pdf->SetLineWidth(0.35);
	$pdf->SetXY($x_inicial,$y_inicial);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->Cell(35,5,"PERIODO ESCOLAR",0,2,'C');
	$pdf->SetFont('Helvetica','','8');
	$pdf->Cell(35,6,$periodo,1,0,'C');
	$pdf->SetXY($pdf->GetX()+5,$y_inicial);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->Cell(35,5,"CICLO DE ESTUDIOS",0,2,'C');
	$pdf->SetFont('Helvetica','','8');
	$pdf->Cell(35,6,"LICENCIATURA",1,0,'C');
	$pdf->SetXY($pdf->GetX()+5,$y_inicial);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->Cell(110,5,"DEPARTAMENTO ACADEMICO",0,2,'C');
	$pdf->SetFont('Helvetica','','8');
	$pdf->Cell(110,6,$departamento,1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->Cell(150,5,"MATERIA",0,0,'C');
	$pdf->Cell(22,5,"CLAVE",0,0,'C');
	$pdf->Cell(18,5,"GRUPO",0,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->SetFont('Helvetica','','8');
	$pdf->Cell(150,6,strtoupper($nombre_completo_materia),1,0,'C');
	$pdf->Cell(22,6,$materia,1,0,'C');
	$pdf->Cell(18,6,$grupo,1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->Cell(40,5,"RFC",0,0,'C');
	$pdf->Cell(150,5,"CATEDRATICO",0,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->SetFont('Helvetica','','8');
	$pdf->Cell(40,6,$rfc,1,0,'C');
	$pdf->Cell(150,6,strtoupper(utf8_decode($profesor)),1,2,'C');
	$pdf->SetX($x_inicial);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->Cell(28,5,"LUNES",0,0,"C");
	$pdf->Cell(28,5,"MARTES",0,0,"C");
	$pdf->Cell(28,5,"MIERCOLES",0,0,"C");
	$pdf->Cell(28,5,"JUEVES",0,0,"C");
	$pdf->Cell(28,5,"VIERNES",0,0,"C");
	$pdf->Cell(28,5,"SABADO",0,0,"C");
	$pdf->Cell(22,5,"ALUMNOS",0,2,"C");
	$pdf->SetFont('Helvetica','','8');
	$pdf->Cell(22,6,$alumnos_inscritos,1,0,"C");
	$pdf->SetX($x_inicial);
	$pdf->Cell(28,6,str_replace("<br>", " / ", $lunes),1,0,"C");
	$pdf->Cell(28,6,str_replace("<br>", " / ", $martes),1,0,"C");
	$pdf->Cell(28,6,str_replace("<br>", " / ", $miercoles),1,0,"C");
	$pdf->Cell(28,6,str_replace("<br>", " / ", $jueves),1,0,"C");
	$pdf->Cell(28,6,str_replace("<br>", " / ", $viernes),1,0,"C");
	$pdf->Cell(28,6,str_replace("<br>", " / ", $sabado),1,2,"C");
	$pdf->SetX($x_inicial);
	$pdf->SetFont('Helvetica','B','8');
	$pdf->Cell(5,5,"No",1,0,"C");
	$pdf->Cell(9,5,"Carr",1,0,"C");
	$pdf->Cell(16,5,"Control",1,0,"C");
	$pdf->Cell(76,5,"NOMBRE DEL ALUMNO",1,0,"C");
   
	$pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
	$pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
	$pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
	$pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
	$pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
	$pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
	$pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
	$pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
    $pdf->Cell(4,5," ",1,0,"C");
	$pdf->Cell(4,5," ",1,2,"C");
	$X=$pdf->GetX();$Y=$pdf->GetY();
	$pdf->SetLineWidth(0.09);
	$pdf->SetFont('Helvetica','','10');
	$pdf->Line(125, 278,200,278);
	$pdf->SetXY(130,280);
	$pdf->Cell(70,5,utf8_decode($profesor),0,0,'C');
	$pdf->SetXY($X,$Y);
}
$x_inicial = 10;
$y_inicial = 65;
$pdf=new FPDF();
$pdf->Open();
$pdf->SetAutoPageBreak(0);
datos_iniciales_docto($pdf, $periodo, $materia, $grupo, $x_inicial, $y_inicial);

$qry_alumnos_grupo = "select s.no_de_control,siglas,CONCAT(apellido_paterno,' ',apellido_materno,' ',nombre_alumno) as nombre, oportunidad from alumnos a,seleccion_materias s,grupos g ,carreras c where c.carrera = a.carrera and a.no_de_control = s.no_de_control and s.materia = g.materia and s.grupo = g.grupo and s.periodo = g.periodo and g.grupo = '$grupo' and g.materia = '$materia' and g.periodo='$periodo' order by nombre";
$res_alumnos = ejecuta_consultaf($qry_alumnos_grupo);

$pdf->SetLineWidth(0.09);
$pdf->SetFont('Helvetica','','8');
$i = 0;
while ($fila = $res_alumnos->fetch_assoc())
{
	$i++;
	if ($i == 51) 
	{
		$pdf->SetXY(10,283);
		$pdf->SetFont('Helvetica','','7');
		$pdf->SetLineWidth(0.35);
		$pdf->Cell(90,4,"FECHA: ".fecha_espanol(),1,0,'L');
		datos_iniciales_docto($pdf, $periodo, $materia, $grupo, $x_inicial, $y_inicial);
		$pdf->SetLineWidth(0.09);
		$pdf->SetFont('Helvetica','b','8');
	}	
	$repetidor = "";
	if($fila['oportunidad']=='S')
		$repetidor = "R";
	else
		if($fila['oportunidad']=='E')
			$repetidor = "E";
	$pdf->SetX($x_inicial);
	$pdf->Cell(5,4,$i,1,0,"R");
	$pdf->Cell(9,4,$fila['siglas'],1,0,"C");
	$pdf->Cell(16,4,$fila['no_de_control'],1,0,"C");
	//$pdf->Cell(5,4,$repetidor,"B",0,"C");
	$pdf->Cell(76,4,utf8_decode($fila['nombre']),"B",0,"L");
	$pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,0,"C");
    $pdf->Cell(4,4," ",1,0,"C");	
    $pdf->Cell(4,4," ",1,2,"C");			
	            
}
	

	$pdf->Output();
?>
