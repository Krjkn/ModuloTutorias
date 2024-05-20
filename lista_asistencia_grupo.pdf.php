<?php 
/**** Librerias y funciones ****/
	require_once("../../../includes/config.inc.php");
	require_once($CFG->fpdfDir."/fpdf.php");
	require_once($CFG->funciones_pdfDir."/funciones.pdf.php");
	session_start();
if (!isset($_SESSION['usuario'])){	
	?><script type="text/javascript">window.top.location = "index.html"</script><?php }
else $user = $_SESSION["usuario"];
	
	function datos_iniciales_docto($pdf, $periodo, $materia, $grupo, $x_inicial, $y_inicial)
	{
	/**** Obtener datos del grupo ****/
		$qry_datos_grupo="exec pac_extradatosgrupo '$periodo','$materia','$grupo'";
		$res_datos_grupo = 	ejecutar_sql($qry_datos_grupo);	
	
	/**** Inicio de la hoja	****/
		$pdf->AddPage();
		
	/**** Encabezado ****/
		encabezado_documentos(&$pdf, "LISTA DE ASISTENCIA");
		$pdf->Cell(133, 5, $res_datos_grupo->fields("folio_acta"), 0, 2, 'C', 0);
	
	/**** Datos del grupo	****/
		
		$pdf->SetLineWidth(0.35);
		//Periodo Escolar
		$pdf->SetXY($x_inicial,$y_inicial);
		$pdf->SetFont('Helvetica','B','8');
		$pdf->Cell(35,5,"PERIODO ESCOLAR",0,2,'C');
		$pdf->SetFont('Helvetica','','8');
		$pdf->Cell(35,6,$res_datos_grupo->fields("identificacion_corta"),1,0,'C');
		//Ciclo de Estudios
		$pdf->SetXY($pdf->GetX()+5,$y_inicial);
		$pdf->SetFont('Helvetica','B','8');
		$pdf->Cell(35,5,"CICLO DE ESTUDIOS",0,2,'C');
		$pdf->SetFont('Helvetica','','8');
		$pdf->Cell(35,6,($res_datos_grupo->fields("nivel_escolar")=='P')?"POSGRADO":"LICENCIATURA",1,0,'C');
		//Departamento Academico
		$pdf->SetXY($pdf->GetX()+5,$y_inicial);
		$pdf->SetFont('Helvetica','B','8');
		$pdf->Cell(110,5,"DEPARTAMENTO ACADEMICO",0,2,'C');
		$pdf->SetFont('Helvetica','','8');
		$pdf->Cell(110,6,$res_datos_grupo->fields("nomdepto"),1,2,'C');
		//Materia, Clave Grupo
		$pdf->SetX($x_inicial);
		$pdf->SetFont('Helvetica','B','8');
		$pdf->Cell(150,5,"MATERIA",0,0,'C');
		$pdf->Cell(22,5,"CLAVE",0,0,'C');
		$pdf->Cell(18,5,"GRUPO",0,2,'C');
		$pdf->SetX($x_inicial);
		$pdf->SetFont('Helvetica','','8');
		$pdf->Cell(150,6,strtoupper($res_datos_grupo->fields("nombre_abreviado_materia")),1,0,'C');
		$pdf->Cell(22,6,$res_datos_grupo->fields("materia"),1,0,'C');
		$pdf->Cell(18,6,$res_datos_grupo->fields("grupo"),1,2,'C');
		//RFC, Catedratico
		$pdf->SetX($x_inicial);
		$pdf->SetFont('Helvetica','B','8');
		$pdf->Cell(40,5,"RFC",0,0,'C');
		$pdf->Cell(150,5,"CATEDRATICO",0,2,'C');
		$pdf->SetX($x_inicial);
		$pdf->SetFont('Helvetica','','8');
		$pdf->Cell(40,6,$res_datos_grupo->fields("rfc"),1,0,'C');
		$pdf->Cell(150,6,strtoupper($res_datos_grupo->fields("profesor")),1,2,'C');
		
	/**** Horario del grupo	****/
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
		$pdf->Cell(22,6,$res_datos_grupo->fields("alumnos_inscritos"),1,0,"C");
		
		$qry_horario_grupo = "exec pac_extrahorario_grupo '$periodo', '$materia', '$grupo'";
		$res_horario_grupo = 	ejecutar_sql($qry_horario_grupo);
		$pdf->SetX($x_inicial);
		$pdf->Cell(28,6,str_replace("<br>", " / ", $res_horario_grupo->fields("lunes")),1,0,"C");
		$pdf->Cell(28,6,str_replace("<br>", " / ", $res_horario_grupo->fields("martes")),1,0,"C");
		$pdf->Cell(28,6,str_replace("<br>", " / ", $res_horario_grupo->fields("miercoles")),1,0,"C");
		$pdf->Cell(28,6,str_replace("<br>", " / ", $res_horario_grupo->fields("jueves")),1,0,"C");
		$pdf->Cell(28,6,str_replace("<br>", " / ", $res_horario_grupo->fields("viernes")),1,0,"C");
		$pdf->Cell(28,6,str_replace("<br>", " / ", $res_horario_grupo->fields("sabado")),1,2,"C");
		
	/**** Listado de Alumnos ****/
		//Encabezado
		$pdf->SetX($x_inicial);
		$pdf->SetFont('Helvetica','B','8');
		$pdf->Cell(5,5,"No",1,0,"C");
		$pdf->Cell(5,5,"Op",1,0,"C");
		$pdf->Cell(80,5,"NOMBRE DEL ALUMNO",1,0,"C");
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
                $pdf->Cell(4,5," ",1,0,"C");
                $pdf->Cell(4,5," ",1,0,"C");
		$pdf->Cell(4,5," ",1,0,"C");
                $pdf->Cell(4,5," ",1,0,"C");
		$pdf->Cell(4,5," ",1,2,"C");
	}


/**** Definicion de variables ****/
	$periodo = $_GET['periodo'];
	$materia = $_GET['materia'];
	$grupo = $_GET['grupo'];
	$x_inicial = 10;
	$y_inicial = 33;

/**** Inicio del documento ****/
	$pdf=new FPDF();
	$pdf->Open();
	$pdf->SetAutoPageBreak(0);
	
/**** Datos iniciales del documento ****/
	datos_iniciales_docto(&$pdf, $periodo, $materia, $grupo, $x_inicial, $y_inicial);
	
/**** Listado de Alumnos ****/
	$qry_alumnos_grupo = "exec pac_extraalumnosgrupo '$periodo','$materia','$grupo'";
	$res_alumnos_grupo = 	ejecutar_sql($qry_alumnos_grupo);

	$pdf->SetLineWidth(0.09);
	$pdf->SetFont('Helvetica','','8');
	$i = 0;
	
	while (!$res_alumnos_grupo->EOF)
	{
		$i++;
		if ($i == 51) 
		{
		/**** Fecha ****/	
			$pdf->SetXY(10,283);
			$pdf->SetFont('Helvetica','','7');
			$pdf->SetLineWidth(0.35);
			$pdf->Cell(90,4,"FECHA: ".fecha_espanol(),1,0,'L');
		
		/**** Datos iniciales del documento ****/	
			datos_iniciales_docto(&$pdf, $periodo, $materia, $grupo, $x_inicial, $y_inicial);
		
			$pdf->SetLineWidth(0.09);
			$pdf->SetFont('Helvetica','b','8');
		}	
		
			
		$repetidor = "";
		if($res_alumnos_grupo->fields("repeticion")=='S')
			$repetidor = "R";
		   else
			if($res_alumnos_grupo->fields("repeticion")=='E')
				$repetidor = "E";
		   else  if($res_alumnos_grupo->fields('curso_global') == 'S')
			$repetidor = "G";
		$pdf->SetX($x_inicial);
		$pdf->Cell(5,4,$i,"B",0,"R");
		$pdf->Cell(5,4,$repetidor,"B",0,"C");
		$nom=utf8_decode($res_alumnos_grupo->fields("apellido_paterno")." ".$res_alumnos_grupo->fields("apellido_materno")." ".$res_alumnos_grupo->fields("nombre_alumno"));
		$pdf->Cell(80,4,$nom,"B",0,"L");
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
                $pdf->Cell(4,4," ",1,0,"C");
                $pdf->Cell(4,4," ",1,0,"C");	
                $pdf->Cell(4,4," ",1,0,"C");
                $pdf->Cell(4,4," ",1,0,"C");	
                $pdf->Cell(4,4," ",1,2,"C");			
		$res_alumnos_grupo->MoveNext();            
	}
	
/**** Fecha ****/	
	$pdf->SetXY(10, 262);
	$pdf->SetFont('Helvetica','','7');
	$pdf->SetXY(10,283);
	$pdf->SetFont('Helvetica','','9');
	$pdf->SetLineWidth(0.35);
        $pdf->Cell(90,4,"Op es la oportunidad que cursa     (R) Alumno Repetidor   (E) Alumno en Curso Especial (G) Alumno en Curso Global",0,2,'L');
	$pdf->Cell(90,4,"FECHA: ".fecha_espanol(),0,2,'L');
		
/**** Fin del documento ****/
 	//$conn->Close();
	$pdf->Output();
?>
