<?php
$CFG = $GLOBALS['CFG'];
require_once($CFG->funciones_phpDir."/funciones_procedimientos.php");
require_once($CFG->funciones_phpDir."/funciones_fechas.php");
require_once($CFG->funciones_phpDir."/funciones_nombres.php");
require_once($CFG->funciones_phpDir."/funciones.php");

function encabezado($pdf){
	// Encabezado
	$CFG = $GLOBALS['CFG'];
	$pdf->SetTextColor(0,0,0);
	$pdf->Image($CFG->imgLocalDir."/sep.jpg", 17, 12, 34);
	$pdf->Image($CFG->imgLocalDir."/logodgest.jpg", 147, 12, 18);
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
	$pdf->Rect(12, 33, 170, 1, 'F');

	// Fin Encabezado
}

function pie($pdf){
	$x = 15;
	$pdf->SetFillColor(0,0,128);
	$pdf->Rect(12, 110, 170, 2, 'F');
	$pdf->SetXY($x-1, 111);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','b','5');
	$pdf->Cell(160, $h, "CC-SE-01", 0, 0);
	$pdf->Cell(10, $h, "Rev. 1", 0, 0);
}
?>