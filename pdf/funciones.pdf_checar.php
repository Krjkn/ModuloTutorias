<?php
$CFG = $GLOBALS['CFG'];
require_once($CFG->funciones_phpDir."/funciones_procedimientos.php");
require_once($CFG->funciones_phpDir."/funciones_fechas.php");
require_once($CFG->funciones_phpDir."/funciones_nombres.php");
require_once($CFG->funciones_phpDir."/funciones.php");
require_once($CFG->fpdfDir."/fpdf.php");
function encabezado_oficial($pdf)
{
	$CFG = $GLOBALS['CFG'];
	//$pdf->Image($CFG->imgDir."/sep_ses.jpg", 7, 6);
	$pdf->Image($CFG->imgLocalDir."/sep_negro.jpg", 12, 6, 33, 23);
	$it = strtoupper(substr($CFG->instituto, 0, 21));
	$de = strtolower(substr($CFG->instituto, 22));
	$pdf->SetFont('Helvetica','b','14');
	$pdf->SetXY(100, 12);
	$pdf->Cell(100, 5, $it, 0, 2, 'R', 0);
	$pdf->Cell(100, 5, $de, 0, 2, 'R', 0);
	$pdf->SetFont('Helvetica','','10');
	$pdf->SetXY(65, 21.5);
	$pdf->MultiCell(50, 3.5, "Clave de la Escuela\n".$CFG->clv_instituto, 0, 'C', 0);
}
/*
function nvo_encabezado_oficial($pdf)
{
	$CFG = $GLOBALS['CFG'];
	//$pdf->Image($CFG->imgDir."/sep_ses.jpg", 7, 6);
	$pdf->SetFillColor(232);
	$pdf->Rect(12, 10, 150, 30, 'F');
	$x_sep = 162.1;
	$y_sep = 40;
	$pdf->Image($CFG->imgDir."/logo_hoja.jpg", $x_sep, $y_sep, 30, 43);
	$pdf->Image($CFG->imgDir."/logodgest.jpg", $x_sep-48, $y_sep+3, 45);
	$pdf->Image($CFG->imgDir."/escudo.jpg", $x_sep-68, $y_sep+5, 16);
	$pdf->SetFont('Helvetica','B','9');
	$pdf->SetXY(109, 71);
	$pdf->MultiCell(50, 4.5, "SECRETAR�A DE\nEDUCACI�N P�BLICA", 0, 'R', 0);
	$pdf->SetFont('Helvetica','','10');
	$pdf->SetXY(12, 68);
	$pdf->MultiCell(100, 4.9, "SUBSECRETAR�A DE EDUCACI�N SUPERIOR\nDIRECCI�N GENERAL DE EDUCACI�N\nSUPERIOR TECNOL�GICA", 0, 'L', 0);
	$pdf->SetLineWidth(0.5);
	$pdf->SetDrawColor(255, 204, 0);
	$x = 12;
	$y = 86;
	$w = 1.7;
	$add = 0;
	for($i=1; $i <= 43; $i++)
	{
		$pdf->Line($x+$add, $y, $x+$add+$w, $y);
		$add = $add+$w*2.5;
	}
	$pdf->SetLineWidth(0.1);
	$pdf->SetDrawColor(0);
}*/

function nvo_encabezado_oficial($pdf)
{
	$CFG = $GLOBALS['CFG'];
	$x_sep = 12;
	$y_sep = 0;
	$pdf->Image($CFG->imgLocalDir."/membrete.jpg", $x_sep, $y_sep, 74, 52);
	$pdf->Image($CFG->imgLocalDir."/letras.png", 100, 9, 100,25);
	$pdf->Image($CFG->imgLocalDir."/dgest.gif", $x_sep+85, $y_sep+17, 20, 15);
        $pdf->Image($CFG->imgLocalDir."/aguila.jpg",27 ,80 , 150, 150); 
	$pdf->SetFont('Helvetica','B','9');
	$pdf->SetLineWidth(0.5);
	$pdf->SetDrawColor(255, 204, 0);
        $pdf->Cell(30, 40, "", 0, 2, 'C');
	/*$x = 12;
	$y = 52;
	$w = 1.7;
	$add = 0;
	for($i=1; $i <= 25; $i++)
	{
		$pdf->Line($x+$add, $y, $x+$add+$w, $y);
		$add = $add+$w*2.5;
	}  */
	$pdf->SetLineWidth(0.1);
	$pdf->SetDrawColor(0);
}

/*
function encabezado_oficial_2013($pdf)
{
	$CFG = $GLOBALS['CFG'];
	
	$pdf->Image($CFG->imgLocalDir."/logosep.jpg", 12, 10,65,23);
	$pdf->Image($CFG->imgLocalDir."/logodgest.gif", 105, 20, 23);
	$pdf->Image($CFG->imgLocalDir."/aguila.gif", 50, 90, 100);
	
	$pdf->SetTextColor(125,125,125);
	

	//$pdf->SetFont('ACaslonPro-Regular','',8);
	$pdf->SetFont('ACaslonPro-Bold','',8);
	
	$pdf->SetXY(132, 20);
	$pdf->MultiCell(70, 4.9, "Secretaria de Educaci�n Superior", 0, 'R', 0);
	$pdf->SetXY(132, 25);
	$pdf->MultiCell(70, 4.9, "Direcci�n General de Educaci�n Superior Tecnol�gica", 0, 'R', 0);
	$pdf->SetXY(132, 30);
	$pdf->MultiCell(70, 4.9, $CFG->instituto, 0, 'R', 0);
	
	$pdf->SetFont('ACaslonPro-Bold','',9);
	$pdf->SetTextColor(0,0,0);

}
function encabezado_oficial_horizontal_2013($pdf)
{
	$CFG = $GLOBALS['CFG'];
	
	$pdf->Image($CFG->imgLocalDir."/logosep.jpg", 12, 10,65,23);
	$pdf->Image($CFG->imgLocalDir."/logodgest.gif", 180, 15, 23);
//	$pdf->Image($CFG->imgLocalDir."/aguila.gif", 50, 90, 100);
	
	$pdf->SetTextColor(125,125,125);
	

	//$pdf->SetFont('ACaslonPro-Regular','',8);
	$pdf->SetFont('ACaslonPro-Bold','',8);
	
	$pdf->SetXY(210, 15);
	$pdf->MultiCell(70, 4.9, "Secretaria de Educaci�n Superior", 0, 'R', 0);
	$pdf->SetXY(210, 20);
	$pdf->MultiCell(70, 4.9, "Direcci�n General de Educaci�n Superior Tecnol�gica", 0, 'R', 0);
	$pdf->SetXY(210, 25);
	$pdf->MultiCell(70, 4.9, $CFG->instituto, 0, 'R', 0);
	
	$pdf->SetFont('ACaslonPro-Bold','',9);
	$pdf->SetTextColor(0,0,0);

}
*/

function nvo_encabezado_oficial_rh($pdf)
{
	$CFG = $GLOBALS['CFG'];
	//$pdf->Image($CFG->imgDir."/sep_ses.jpg", 7, 6);
	$pdf->SetFillColor(232);
	$pdf->Rect(12, 10, 150, 30, 'F');
	$x_sep = 162.1;
	$y_sep = 40;
        $pdf->Image($CFG->imgLocalDir."/logo_hoja.jpg", $x_sep, $y_sep, 30, 43);
	
	$pdf->Image($CFG->imgLocalDir."/logodgest.jpg", $x_sep-21.5, $y_sep+5, 18);
	$pdf->Image($CFG->imgLocalDir."/escudo.jpg", $x_sep-43, $y_sep+5, 16);
	$pdf->SetFont('Helvetica','B','9');
	$pdf->SetXY(109, 71);
	$pdf->MultiCell(50, 4.5, "SECRETAR�A DE\nEDUCACI�N P�BLICA", 0, 'R', 0);
	$pdf->SetFont('Helvetica','','10');
	$pdf->SetXY(12, 68);
	$pdf->MultiCell(100, 4.9, "SUBSECRETAR�A DE EDUCACI�N SUPERIOR\nDIRECCI�N GENERAL DE EDUCACI�N\nSUPERIOR TECNOL�GICA", 0, 'L', 0);
	$pdf->SetLineWidth(0.5);
	$pdf->SetDrawColor(255, 204, 0);

	$x = 12;
	$y = 86;
	$w = 1.7;
	$add = 0;
	for($i=1; $i <= 43; $i++)
	{
		$pdf->Line($x+$add, $y, $x+$add+$w, $y);
		$add = $add+$w*2.5;
	}
	$pdf->SetLineWidth(0.1);
	$pdf->SetDrawColor(0);
}

function nvo_pie_oficial($pdf)
{
	$CFG = $GLOBALS['CFG'];
	$y = 266;
	$x = 7;
//	$pdf->Image($CFG->imgDir."/logodgest.jpg", $x, $y, 40);
	$w = 120;
	$h = 6;
	$x+=40+5;
	$pdf->SetXY($x-15, $y+4);
	//$pdf->SetFont('ACaslonPro-Bold','',8);
	$pdf->SetFont('Helvetica','','7');
	$pdf->Cell($w, $h/3, "", 0, 2, 'C');
	$pdf->Cell($w-15, $h/2, $CFG->direccion." ".$CFG->cd_edo, 0, 2, 'C');
	
	$pdf->Cell($w-15, $h/2, "Tel(s). ".$CFG->tels." Fax ".$CFG->fax." Correo ".$CFG->correo, 0, 2, 'C');
	$pdf->Cell($w-15, $h/2, "Web ".$CFG->web, 0, 2, 'C');
//	$pdf->Image($CFG->imgDir."/escudo.jpg", 180, $y, 17);
	$pdf->Image($CFG->imgLocalDir."/escudo_tec.jpg", 10, 270, 16);
	$pdf->Image($CFG->imgLocalDir."/equidad.gif", 142, 270, 16);
	$pdf->Image($CFG->imgLocalDir."/IQNet.gif", 157, 270, 16);
	$pdf->Image($CFG->imgLocalDir."/ambiente.gif", 173, 270, 15);
	$pdf->Image($CFG->imgLocalDir."/calidad.gif", 189, 270, 15);
	/*$pdf->Image($CFG->imgDir."/logo4.jpg", 145, 272, 13);
	$pdf->Image($CFG->imgDir."/logo5.jpg", 160, 270, 16);
	$pdf->Image($CFG->imgDir."/logo6.jpg", 176, 270, 16);*/

	$pdf->SetLineWidth(0.1);
	$pdf->SetDrawColor(0);
}


function nvoe_pie_oficial($pdf)
{
$CFG = $GLOBALS['CFG'];
	$y = 260;
	$x = 7;
        $pdf->Image($CFG->imgLocalDir."/escudo.jpg", 18, 265, 13);
	$w = 120;
	$h = 6;
	$x+=40+5;
	$pdf->SetXY($x-15, $y+4);
	$pdf->SetFont('Helvetica','','6.5');
	$pdf->Cell($w, $h/3, "", 0, 2, 'C');
	$pdf->Cell($w-15, $h/2, "Carretera Nacional Iguala Taxco esquina Periferico Norte, Col. Adolfo Lopez Mateos Infonavit, C.P. 40030", 0, 2, 'C');
	$pdf->Cell($w-15, $h/2, "Iguala, Gro. Tel/Fax ".$CFG->tels." Fax ".$CFG->fax." Ext. 258, e-mail: escolares@itiguala.edu.mx", 0, 2, 'C');
	$pdf->Cell($w-15, $h/2, "Web ".$CFG->web, 0, 2, 'R');
	$pdf->Image($CFG->imgLocalDir."/unopie.jpg", 150, 265, 13);
	$pdf->Image($CFG->imgLocalDir."/dospie.jpg", 165, 265, 10,10);
	$pdf->Image($CFG->imgLocalDir."/trespie.jpg", 176, 265, 16);
	$pdf->SetLineWidth(0.1);
	$pdf->SetDrawColor(0);
	
}


function nvo_pie_oficial_rh($pdf)
{
	$CFG = $GLOBALS['CFG'];
	$y = 266;
	$x = 7;
//	$pdf->Image($CFG->imgDir."/logodgest.jpg", $x, $y, 40);
	$w = 120;
	$h = 6;
	$x+=40+5;
	$pdf->SetXY($x, $y);
	$pdf->SetFont('Helvetica','','9');
	$pdf->SetLineWidth(0.35);
	//$pdf->SetDrawColor(255, 128, 0);
	$pdf->SetDrawColor(255, 204, 0);
	$pdf->Cell($w, $h, "\"".$CFG->lema."\"", 'B', 2, 'C');
	$pdf->SetFont('Helvetica','','7');
	$pdf->Cell($w, $h/3, "", 0, 2, 'C');
	$pdf->Cell($w, $h/2, $CFG->direccion." ".$CFG->cd_edo, 0, 2, 'C');
	$pdf->Cell($w, $h/2, "Tel(s). ".$CFG->tels." Fax ".$CFG->fax." Web ".$CFG->web, 0, 2, 'C');
//	$pdf->Image($CFG->imgDir."/escudo.jpg", 180, $y, 17);
	$pdf->SetLineWidth(0.1);
	$pdf->SetDrawColor(0);
}

function pie_oficial($pdf)
{
	$CFG = $GLOBALS['CFG'];
	$y = 260;
	$x = 7;
	$pdf->Image($CFG->imgLocalDir."/logodgest.jpg", $x, $y, 40);
	$w = 120;
	$h = 6;
	$x+=40+5;
	$pdf->SetXY($x, $y);
	$pdf->SetFont('Helvetica','','9');
	$pdf->SetLineWidth(0.35);
	$pdf->SetDrawColor(255, 128, 0);
	$pdf->Cell($w, $h, "\"".$CFG->lema."\"", 'B', 2, 'C');
	$pdf->SetFont('Helvetica','','7');
	$pdf->Cell($w, $h/3, "", 0, 2, 'C');
	$pdf->Cell($w, $h/2, $CFG->direccion." ".$CFG->cd_edo, 0, 2, 'C');
	$pdf->Cell($w, $h/2, "Tel(s). ".$CFG->tels." Fax ".$CFG->fax." Web ".$CFG->web, 0, 2, 'C');
	$pdf->Image($CFG->imgLocalDir."/escudo.jpg", 180, $y, 17);
}


function datos_oficio($pdf, $depto, $folio, $ano, $expediente, $tipo)
{
	switch($depto)
	{
		case 'SE':
		{
			$ndepto = "SERVICIOS ESCOLARES";
			if($tipo == 'P' || $tipo == '' || $tipo == '')
				$asunto = "CONSTANCIA DE ESTUDIOS";
			else if($tipo == 'G' || $tipo == 'O' || $tipo == 'S')
				$asunto = "CONSTANCIA DE EGRESO";
			else if($tipo == 'T')
				$asunto = "CONSTANCIA DE T�TULO\nEN TR�MITE";
			else if($tipo == 'I')
				$asunto = "CONSTANCIA DE ACREDITACI�N\nDE LENGUA EXTRANJERA";
			else if($tipo == 'A')
				$asunto = "CONSTANCIA DE AVANCE";
			else if($tipo == 'I')
				$asunto = "CONSTANCIA DE TR�NSITO\nESTUDIANTIL";
			else
				$asunto = "CONSTANCIA";
			break;
		}
		default:		break;
	}
	
	$l = strlen(trim($folio));
	$oficio = trim($depto)."-".substr("00000".trim($folio), $l, 5)."/".trim($ano);
	
	$h 	= 4;
	$wt = 28;
	$wd = 60;
	$y 	= 58;
	$xt = 115;
	$xd = $xt + $wt;
	$pdf->SetXY($xt, $y);
	$pdf->SetFont('Helvetica','b','10');
	//$pdf->SetFont('ACaslonPro-Bold','',8);
	$pdf->Cell($wt, $h, "DEPENDENCIA:", 0, 2, 'L');
	$pdf->Cell($wt, $h, "OFICIO:", 0, 2, 'L');
	$pdf->Cell($wt, $h, "EXPEDIENTE:", 0, 2, 'L');
	$pdf->Cell($wt, $h, "", 0, 2, 'L');
	$pdf->Cell($wt, $h, "ASUNTO:", 0, 2, 'L');
	$pdf->SetXY($xd, $y);
	//$pdf->SetFont('Helvetica','','10');
	$pdf->Cell($wd, $h, $ndepto, 0, 2, 'L');
	$pdf->Cell($wd, $h, $oficio, 0, 2, 'L');
	$pdf->Cell($wd, $h, $expediente, 0, 2, 'L');
	$pdf->Cell($wd, $h, "", 0, 2, 'L');
	$pdf->MultiCell($wd, $h, $asunto, 0, 'L');
}

/************************************************************
	    					FUNCIONES PARA BOLETAS
************************************************************/
function encabezado_documentos($pdf, $titulo)
{
	$CFG = $GLOBALS['CFG'];
	//$pdf->Image($CFG->imgDir."/sep_negro.jpg", 10, 6, 33, 23);
	//$pdf->Image($CFG->imgDir."/escudo.jpg", 180, 6, 17, 20);
	$pdf->Image($CFG->imgLocalDir."/sep_negro.jpg", 10, 6, 43, 23);
	$pdf->Image($CFG->imgLocalDir."/escudo.jpg", 180, 6, 20, 20);
	$pdf->SetFont('Helvetica','b','16');
	$pdf->SetXY(45, 10);
	$pdf->Cell(133, 10,$CFG->instituto, 0, 2, 'C', 0);
	$pdf->SetFont('Helvetica','b','10');
	$pdf->Cell(133, 5, $titulo, 0, 2, 'C', 0);
}

function encabezado_datos_alumno_PDF($pdf, $no_de_control, $periodo, $accion=NULL)
{
	$qry_alumno = "exec pac_datosalumno '$no_de_control'";
	$res_alumno = ejecutar_sql($qry_alumno);
	foreach($res_alumno->fields as $k => $v)
	{
		$var 	= $k;	// toma el nombre de la variable
		$$var = $v;	// le asigna el valor
	}
	
	$semestre = calcula_semestre($periodo_ingreso_it, $periodos_revalidacion, $periodo);
	$nombre_alumno = trim($apellido_paterno).' '.trim($apellido_materno).' '.trim($nombre_alumno);
	$ciclo = 'Licenciatura';
	$ide_periodo = nperiodo($periodo);
	$especialidad = nespecialidad($especialidad);
	
	switch($accion)
	{
		case 'boleta':
			{
				$titulo = "BOLETA DE CALIFICACIONES";
				$w1 = 28; // Numero de control
				$w2 = 85; // Nombre del alumno
				$w3 = 20; // Semestre
				$w4 = 30; // Periodo Escolar
				$w5 = 30;  // Ciclo de estudios (Promedio Acumulado)
				$w6 = 79; // Carrera
				$w7 = 54.5; // Especialidad
				break;
			}
		default:
			{
				$titulo = "";
				$w1 = 16; // Numero de control
				$w2 = 70; // Nombre del alumno
				$w3 = 15; // Semestre
				$w4 = 22; // Periodo Escolar
				$w5 = 11; // Promedio Acumulado (Ciclo de estudios)
				$w6 = 102; // Carrera
				$w7 = 33.5; // Especialidad
				break;
			}
	}
	
	encabezado_documentos(&$pdf, $titulo);
	
	/* Configuraci�n de los t�tulos */
	($accion=='boleta')?$pdf->SetFont('Helvetica','','10'):$pdf->SetFont('Helvetica','b','7');
	$pdf->SetTextColor(255, 255, 255);
	$pdf->SetFillColor(1, 78, 130);

	// margenes de los titulos
	$margen_izq = ($accion=='boleta')?25:40;
	$x = $margen_izq;
	$margen_top = 35;
	$y = $margen_top;
	$alto = ($accion=='boleta')?8:6;
	
	$pdf->setXY($x, $y);
	$pdf->MultiCell($w1, $alto/2, "No. Control\nS.E.P.", 0, 'C', 1	);
	
	$var = $w1+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w2, $alto, "Nombre del Alumno", 0, 'C', 1	);
	
	$var+= $w2+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w3, $alto, "Semestre", 0, 'C', 1	);
	
	$var+= $w3+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w4, $alto, "Periodo Escolar", 0, 'C', 1	);
	
	if($accion!='boleta')
	{
		$var+= $w4+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($w5, $alto/2, "Prom.\nAcum.", 0, 'C', 1	);
		$var = -$w5-0.5;
	}
	else
	{
		$var = 0;
		$pdf->setXY($x+$var, $y+13.5);
		$pdf->MultiCell($w5, $alto, "Ciclo de Estudios", 0, 'C', 1);
	}
	
	$var+= $w5+0.5;
	$pdf->setXY($x+$var, $y+13.5);
	$pdf->MultiCell($w6, $alto, "Carrera", 0, 'C', 1	);
	
	$var+= $w6+0.5;
	$pdf->setXY($x+$var, $y+13.5);
	$pdf->MultiCell($w7, $alto, "Especialidad", 0, 'C', 1	);
			
	/* Configuraci�n de los datos del alumno */
	($accion=='boleta')?$pdf->SetFont('Helvetica','','10'):$pdf->SetFont('Helvetica','b','7');
	$pdf->SetTextColor(37, 73, 107);
	$pdf->SetFillColor(221, 221, 221);
	
	$y+=($accion=='boleta')?8.5:6.5;
	$alto = ($accion=='boleta')?4.5:3.5;
	$pdf->setXY($x, $y);
	$pdf->MultiCell($w1, $alto, $no_de_control, 0, 'C', 1);
	
	$var = $w1+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w2, $alto, $nombre_alumno, 0, 'C', 1);
	
	$var+= $w2+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w3, $alto, $semestre, 0, 'C', 1	);
	
	$var+= $w3+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w4, $alto, $ide_periodo, 0, 'C', 1	);
	
	if($accion!='boleta')
	{
		$var+= $w4+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($w5, $alto, $prom_acum, 0, 'C', 1	);
		$var = -$w5-0.5;
	}
	else
	{
		$var = 0;
		$pdf->setXY($x+$var, $y+13.5);
		$pdf->MultiCell($w5, $alto, $ciclo, 0, 'C', 1);
	}
	
	$var+=$w5+0.5;
	$pdf->setXY($x+$var, $y+13.5);
	$pdf->MultiCell($w6, $alto, $nombre_carrera, 0, 'C', 1	);
		
	$var+= $w6+0.5;
	$pdf->setXY($x+$var, $y+13.5);
	$pdf->MultiCell($w7, $alto, $especialidad, 0, 'C', 1	);
}

function boleta($pdf, $no_de_control, $periodo, $accion=NULL)
{

	$CFG = $GLOBALS['CFG'];
	/*  COMIENZA DOCUMENTO  */
	$pdf->AddPage();
	
	encabezado_datos_alumno_PDF(&$pdf, $no_de_control, $periodo, 'boleta');
	
	/* Configuraci�n de los t�tulos */
	$pdf->SetFont('Helvetica','b','10');
	$pdf->SetTextColor(255, 255, 255);
	$pdf->SetFillColor(1, 78, 130);

	// margenes de los titulos
	$margen_izq = 25;
	$x = $margen_izq;
	$margen_top = 65;
	$y = $margen_top;
	$alto = 8;
	
	$wMt = 55;
	$wCr = 10;
	$wCa = 23;
	$wTE = 30;
	$wOb = 45;
	
	$pdf->setXY($x, $y);
	$pdf->MultiCell($wMt, $alto, "Materias", 0, 'C', 1);
	
	$var = $wMt+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($wCr, $alto, "Cr", 0, 'C', 1);
	
	$var+= $wCr+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($wCa, $alto, "Calificaci�n", 0, 'C', 1);
	
	$var+= $wCa+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($wTE, $alto/2, "Tipo\nEvaluaci�n", 0, 'C', 1);
	
	$var+= $wTE+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($wOb, $alto, "Observaciones", 0, 'C', 1);
	
	$non = true;
	
	$qry_materias = "exec pac_historia_alumno '$no_de_control', '$periodo'";
	$res_materias_alumno = ejecutar_sql($qry_materias);
	
	$calificaciones=0;
	$cantidad_materias=0;
	
	while(!$res_materias_alumno->EOF)
	{		
		$materia = trim($res_materias_alumno->fields('materia'));
		$nombre_materia = $res_materias_alumno->fields('nombre_abreviado_materia');
		$grupo = trim($res_materias_alumno->fields('grupo'));
		$creditos = $res_materias_alumno->fields('creditos_materia');
		$rfc = $res_materias_alumno->fields('grupo');
		$calificacion = (($res_materias_alumno->fields('calificacion') < 70))?"NA":$res_materias_alumno->fields('calificacion');
		$tipo_evaluacion = $res_materias_alumno->fields('tipo_evaluacion');
		$descripcion_corta_evaluacion = $res_materias_alumno->fields('descripcion_corta_evaluacion');
		
		$calificaciones+=$res_materias_alumno->fields('calificacion');
		$cantidad_materias++;
		
		$observaciones = ($calificacion == "NA"  && (($tipo_evaluacion == 'O2') || ($tipo_evaluacion == 'R2')))?"A Examen Especial":"";
		
		$pdf->SetFont('Helvetica','b','10');
		$pdf->SetTextColor(37, 73, 107);
		($non)?$pdf->SetFillColor(238):$pdf->SetFillColor(221);
				
		$y+=8.5;
		$alto = 8;
		$pdf->setXY($x, $y);
		$pdf->MultiCell($wMt, $alto/2, $materia, 0, 'L', 1);
		
		$pdf->SetFont('Helvetica','','10');
		$pdf->setXY($x, $y+$alto/2);
		$pdf->MultiCell($wMt, $alto/2, " ".$nombre_materia, 0, 'L', 1);
		
		$var = $wMt+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($wCr, $alto, $creditos, 0, 'C', 1);
		$var+= $wCr+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($wCa, $alto, $calificacion, 0, 'C', 1);
		
		$var+= $wCa+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($wTE, $alto, $descripcion_corta_evaluacion, 0, 'C', 1);
		
		$var+= $wTE+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($wOb, $alto, $observaciones, 0, 'C', 1);
		
		($non)?$non=false:$non=true;
		$res_materias_alumno->movenext();
	}
	
	if($accion != "pronabes"){
	
	/**  MATERIAS EXTRAESCOLARES  **/
	$qry_extraescolares = "exec pac_histoextraescolar '$no_de_control', '$periodo'";
	$res_extraescolares = ejecutar_sql($qry_extraescolares);
	if ($res_extraescolares->numrows())
	{
		while (!$res_extraescolares->EOF)
		{ 
			$observaciones = 'APROBADA';
			
			$pdf->SetFont('Helvetica','b','10');
			$pdf->SetTextColor(37, 73, 107);
			($non)?$pdf->SetFillColor(238):$pdf->SetFillColor(221);
			
			$y+=8.5;
			$alto = 8;
			$pdf->setXY($x, $y);
			$pdf->MultiCell($wMt, $alto/2, $res_extraescolares->fields('materia'), 0, 'L', 1);
			
			$pdf->SetFont('Helvetica','','10');
			$pdf->setXY($x, $y+$alto/2);
			$pdf->MultiCell($wMt, $alto/2, " ".$res_extraescolares->fields('nombre_abreviado_materia'), 0, 'L', 1);
			
			$var = $wMt+0.5;
			$pdf->setXY($x+$var, $y);
			$pdf->MultiCell($wCr, $alto, "", 0, 'C', 1);
			$var+= $wCr+0.5;
			$pdf->setXY($x+$var, $y);
			$pdf->MultiCell($wCa, $alto, "", 0, 'C', 1);
			
			$var+= $wCa+0.5;
			$pdf->setXY($x+$var, $y);
			$pdf->MultiCell($wTE, $alto, "", 0, 'C', 1);
			
			$var+= $wTE+0.5;
			$pdf->setXY($x+$var, $y);
			$pdf->MultiCell($wOb, $alto, $observaciones, 0, 'C', 1);
			
			($non)?$non=false:$non=true;
			$res_extraescolares->movenext();
		}
	}
	
	/**  ACUMULADO POR PROMEDIO **/
	$pdf->SetFont('Helvetica','b','8');
	$pdf->SetTextColor(255);
	$pdf->SetFillColor(1, 78, 130);
	
	$w = 27;
	
	$y = $pdf->GetY()+5;
	$pdf->setXY($x, $y);
	$pdf->MultiCell($w+1, $alto/2, "Periodo\nEscolar", 0, 'C', 1);
	
	$var = $w+1.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w, $alto/2, "Cr�ditos\nCursados", 0, 'C', 1);
	
	$var+= $w+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w, $alto/2, "Cr�ditos\nAprobados", 0, 'C', 1);
	
	$var+= $w+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w, $alto/2, "Cr�ditos\nAcumulados", 0, 'C', 1);
	
	$var+= $w+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w, $alto/3, "Promedio Aritm�tico del Periodo", 0, 'C', 1);
	
	$var+= $w+0.5;
	$pdf->setXY($x+$var, $y);
	$pdf->MultiCell($w, $alto/3, "Promedio Aritm�tico Acumulado", 0, 'C', 1);
	
	$non = true;
	$credacumapro = 0;	
	$qry_acumulado = "exec pac_datosacumuladohistorico '$no_de_control', '$periodo'";
	$res_acumulado = ejecutar_sql($qry_acumulado);
	
	$pdf->SetFont('Helvetica','','8');
	$alto_acum = $alto/2;
	$y = $pdf->GetY();
	while (!$res_acumulado->EOF)
	{ 
		$credacumapro += $res_acumulado->fields('creditos_aprobados');
		
		$pdf->SetTextColor(37, 73, 107);
		($non)?$pdf->SetFillColor(238):$pdf->SetFillColor(221);
		
		$pdf->setXY($x, $y);
		$pdf->MultiCell($w+1, $alto_acum, $res_acumulado->fields('identificacion_corta'), 0, 'C', 1);
		
		$var = $w+1.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($w, $alto_acum, $res_acumulado->fields('creditos_cursados'), 0, 'C', 1);
		
		$var+= $w+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($w, $alto_acum, $res_acumulado->fields('creditos_aprobados'), 0, 'C', 1);
		
		$var+= $w+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($w, $alto_acum, $credacumapro, 0, 'C', 1);
		
		$var+= $w+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($w, $alto_acum, round($res_acumulado->fields('promedio_aritmetico'),2), 0, 'C', 1);
		
		$var+= $w+0.5;
		$pdf->setXY($x+$var, $y);
		$pdf->MultiCell($w, $alto_acum, round($res_acumulado->fields('promedio_aritmetico_acumulado'),2), 0, 'C', 1);
		
		$y+= $alto_acum+0.5;
		$non = ($non)?false:true;
		$res_acumulado->movenext();
	}
	}
	
	if($accion == "pronabes"){
		$pdf->setX($x,$pdf->getY()+10);
		$pdf->Cell($w, $alto, "Promedio del periodo: ".round(($calificaciones/$cantidad_materias),2),0, 2);
	}
	
	
	/**  PIE DE DOCUMENTO  **/
	$pdf->SetFont('Helvetica','b','10');
	$pdf->SetAutoPageBreak(0);
	$pdf->SetTextColor(0);
	$ancho_firmas = 75;
	$alto_firmas = 10;
	$pdf->setXY($x, 220);
	$pdf->MultiCell(166, $alto, fecha_completa(), 0, 'R', 0);
	
	
	$pdf->SetLineWidth(0.3);
	
	if($accion != "pronabes"){
	$pdf->setXY($x+2.5, $pdf->getY()+20);
	//$pdf->Ln();
	$y1 = $pdf->getY()+2;
	$pdf->setXY($x, $y1);
	//$pdf->cell($ancho_firmas, 1, "", 'T', 2);
	//$pdf->Image($CFG->imgLocalDir."/FIRMAS/director.jpg", 50, 233, 30);
	//   $pdf->multicell($ancho_firmas, $alto/2, njefe('direccion','jefe')."\nDirector", 0, 'C');
	$pdf->setXY($x+$ancho_firmas+15, $y1);
	$pdf->cell($ancho_firmas, 1, "", 'T', 2);
	//$pdf->Image($CFG->imgLocalDir."/FIRMAS/escolares.JPG", 135, 233, 30);
	$pdf->multicell($ancho_firmas, $alto/2, njefe('servicios escolares', 'jefe')."\nDepto. Servicios Escolares", 0, 'C');
	}else{
		$pdf->setXY($x, 180);
		$pdf->Line(50,180,175,180);
		$pdf->multicell($w, 4, njefe('servicios escolares', 'jefe')."\nJEFE DEL DEPARTAMENTO DE SERVICIOS ESCOLARES", 0, 'C');
	}
	$pdf->Ln();
	$pdf->SetFont('Helvetica','b','7');
	$pdf->setXY($x, $pdf->gety()+7);
	$pdf->MultiCell(166, 2.5,"ESTE DOCUMENTO NO PODR� SER UTILIZADO COMO BOLETA OFICIAL DE CALIFICACIONES SI NO CUENTA CON LAS FIRMAS Y SELLO CORRESPONDIENTE", 0, 'C');
}
function encabezado_pronabe($pdf){
	$CFG = $GLOBALS['CFG'];
	$pdf->SetTextColor(0,0,0);
	$pdf->Image($CFG->imgLocalDir."/sep.jpg", 17, 12, 34);
	$pdf->Image($CFG->imgLocalDir."/logodgest.jpg", 147, 12, 30);
	$pdf->Image($CFG->imgLocalDir."/escudo_tec.jpg", 177, 11, 20);

	$x = 52;
	$y = 12;
	$w = 185;
	$h = 4;

	$x_sep = 15;
	$y_sep = 10;

	$pdf->SetXY($x, $y);
	$pdf->SetFont('Arial','b','9');
	$pdf->Cell($w, $h, "Direcci�n General de Educaci�n Superior Tecnol�gica", 0, 2);
	$pdf->Cell($w, $h, $CFG->instituto, 0, 2);

	$x = 14;
	$y = 30;
	$pdf->SetXY($x, $y);
	$pdf->SetFont('Arial','b','5');
	$pdf->Cell($w, $h, "SUBSECRETARIA DE EDUCACION SUPERIOR", 0, 2);

	$pdf->SetFillColor(0,0,128);
	$pdf->Rect(12, 35, 185, 1, 'F');	
}





function encabezado_oficial_recibo($pdf)
{
	$CFG = $GLOBALS['CFG'];
	$pdf->Image($CFG->imgLocalDir."/recibo.jpg", 12, 10, 180,100);
}
function pie_recibo($pdf)
{
	$CFG = $GLOBALS['CFG'];
	$pdf->Image($CFG->imgLocalDir."/cancelado.gif", 30, 50, 100,60);
}

?>
