<?php
$CFG = $GLOBALS['CFG'];
require_once($CFG->funciones_phpDir."/funciones_procedimientos.php");
require_once($CFG->funciones_phpDir."/funciones_fechas.php");
require_once($CFG->funciones_phpDir."/funciones_nombres.php");
require_once($CFG->funciones_phpDir."/funciones.php");

function encabezado_horario($pdf){
	// Encabezado
	$CFG = $GLOBALS['CFG'];
	$pdf->SetTextColor(0,0,0);
	$pdf->Image($CFG->imgLocalDir."/sep.jpg", 8, 13, 40);
	//$pdf->Image($CFG->imgLocalDir."/logodgest.jpg", 153, 10, 20);
	//$pdf->Image($CFG->imgLocalDir."/logodgest2012.gif", 225, 10, 25);
	$pdf->Image($CFG->imgLocalDir."/escudo_tec.jpg", 260, 11, 15);

	$x = 87;
	$y = 12;
	$w = 175;
	$h = 4;

	$x_sep = 15;
	$y_sep = 10;

	$pdf->SetXY($x, $y);
	$pdf->SetFont('Arial','b','11');
//	$pdf->Cell($w, $h, "Dirección General de Educación Superior Tecnológica", 0, 2);
	$pdf->Cell($w, $h, "TECNOLÓGICO NACIONAL DE MÉXICO", 0, 2);
	$pdf->SetFont('Arial','b','9');
	$pdf->Cell($w, $h, $CFG->instituto, 0, 2);

	$x = 5;
	$y = 30;
	$pdf->SetXY($x, $y);
	$pdf->SetFont('Arial','b','5');
	$pdf->Cell($w, $h, "SUBSECRETARIA DE EDUCACION SUPERIOR", 0, 2);

	$pdf->SetFillColor(0,0,128);
	$pdf->Rect(5, 35, 283, 1, 'F');

	// Fin Encabezado
}
