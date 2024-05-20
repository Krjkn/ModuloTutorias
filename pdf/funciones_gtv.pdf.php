<?php
$CFG = $GLOBALS['CFG'];
require_once($CFG->funciones_phpDir."/funciones_procedimientos.php");
require_once($CFG->funciones_phpDir."/funciones_fechas.php");
require_once($CFG->funciones_phpDir."/funciones_nombres.php");
require_once($CFG->funciones_phpDir."/funciones.php");

function encabezado_gtv($pdf){
	// Encabezado
	$CFG = $GLOBALS['CFG'];
	$pdf->SetTextColor(0,0,0);
	$pdf->Image($CFG->imgLocalDir."/sep.jpg", 17, 13, 35);
	$pdf->Image($CFG->imgLocalDir."/logodgest.jpg", 153, 10, 20);
	//$pdf->Image($CFG->imgLocalDir."/logodgest.jpg", 137, 10, 40);
	$pdf->Image($CFG->imgLocalDir."/EscudoTec.jpg", 177, 11, 17);

	$x = 52;
	$y = 12;
	$w = 185;
	$h = 4;

	$x_sep = 15;
	$y_sep = 10;

	$pdf->SetXY($x, $y);
	$pdf->SetFont('Arial','b','9');
	$pdf->Cell($w, $h, "Dirección General de Educación Superior Tecnológica", 0, 2);
	$pdf->Cell($w, $h, $CFG->instituto, 0, 2);

	$x = 14;
	$y = 30;
	$pdf->SetXY($x, $y);
	$pdf->SetFont('Arial','b','5');
	$pdf->Cell($w, $h, "SUBSECRETARIA DE EDUCACION SUPERIOR", 0, 2);

	$pdf->SetFillColor(0,0,128);
	$pdf->Rect(12, 33, 185, 1, 'F');

	// Fin Encabezado
}

function pie_solicitud_servicio_social($pdf){
	$x = 15;
	$pdf->SetFillColor(0,0,128);
	$pdf->Rect(15, 280, 185, 4, 'F');
	$pdf->SetXY($x-1, 282);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','b','8');
	$pdf->Cell(176, $h, "ITM-VI-PO-002-01", 0, 0);
	$pdf->Cell(10, $h, "Rev. 5", 0, 0);
}

function pie_carta_compromiso($pdf){
	$x = 15;
	$pdf->SetFillColor(0,0,128);
	$pdf->Rect(15, 280, 185, 4, 'F');
	$pdf->SetXY($x-1, 282);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','b','8');
	$pdf->Cell(176, $h, "ITM-VI-PO-002-02", 0, 0);
	$pdf->Cell(10, $h, "Rev. 6", 0, 0);
}

function pie_residencias($pdf){
	$x = 15;
	$pdf->SetFillColor(0,0,128);
	$pdf->Rect(15, 280, 185, 4, 'F');
	$pdf->SetXY($x-1, 282);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','b','8');
	$pdf->Cell(176, $h, "ITM-AC-PO-006-01", 0, 0);
	$pdf->Cell(10, $h, "Rev. 5", 0, 0);
}

function pie_carta_presentacion($pdf){
	$x = 15;
	$pdf->SetFillColor(0,0,128);
	$pdf->Rect(15, 280, 185, 4, 'F');
	$pdf->SetXY($x-1, 282);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','b','8');
	$pdf->Cell(176, $h, "ITM-VI-PO-006-03", 0, 0);
	$pdf->Cell(10, $h, "ev. 5", 0, 0);
}

function mes($mes){
	if($mes == "Jan") $mes="01";
	if($mes == "Feb") $mes="02";
	if($mes == "Mar") $mes="03";
	if($mes == "Apr") $mes="04";
	if($mes == "May") $mes="05";
	if($mes == "Jun") $mes="06";
	if($mes == "Jul") $mes="07";
	if($mes == "Aug") $mes="08";
	if($mes == "Sep") $mes="09";
	if($mes == "Oct") $mes="10";
	if($mes == "Nov") $mes="11";
	if($mes == "Dec") $mes="12";
	return $mes;
}

function nombre_mes($mes){
	if($mes == "Jan" || $mes == "01") $mes="Enero";
	if($mes == "Feb" || $mes == "02") $mes="Febrero";
	if($mes == "Mar" || $mes == "03") $mes="Marzo";
	if($mes == "Apr" || $mes == "04") $mes="Abril";
	if($mes == "May" || $mes == "05") $mes="Mayo";
	if($mes == "Jun" || $mes == "06") $mes="Junio";
	if($mes == "Jul" || $mes == "07") $mes="Julio";
	if($mes == "Aug" || $mes == "08") $mes="Agosto";
	if($mes == "Sep" || $mes == "09") $mes="Septiembre";
	if($mes == "Oct" || $mes == "10") $mes="Octubre";
	if($mes == "Nov" || $mes == "11") $mes="Noviembre";
	if($mes == "Dec" || $mes == "12") $mes="Diciembre";
	return $mes;
}

?>
