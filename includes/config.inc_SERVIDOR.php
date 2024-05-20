<?php

//Rutas globales para el sistema
$rootDir 			= 	'/xampp/htdocs/sii';
$imgLocalDir		=	$rootDir.'/img';
$imgDir				=	$rootDir.'/img';
$includesDir 		= 	$rootDir.'/includes';

//Nombre del sistema
$nombre_sistema	=	'Sistema Integral de Información';
//Variables para la personalización del sistema
$instituto			=	'Instituto Tecnologico de Iguala';
$clv_instituto		=	'12DIT0004C';
$num_tec			=	'67';

//Define variables de la clase con los datos de las constantes
$mydbase	=	"id8057253_tutorias";
$mydbhost	=	"localhost";
$user		=	"id8057253_tutor";
$passwd		=	"carrillo";

function ejecuta_consulta($consulta=NULL)
{
	$mysqli  = mysqli_connect("localhost", "desarr41","95)yLHpiVj7Y;9", "desarr41_tutorias");
	//$mysqli  = mysqli_connect("localhost", "root","", "tutorias");
	
	$mysqli ->set_charset('utf8');
	$qry_periodos = $consulta;
	$res_qry = $mysqli->query($qry_periodos);
	$mysqli->close();
	return $res_qry;
}
function ejecuta_consultaf($consulta=NULL)
{
	$mysqli  = mysqli_connect("localhost", "desarr41","95)yLHpiVj7Y;9", "desarr41_tutorias");
	//mysqli  = mysqli_connect("localhost", "root","", "tutorias");
	$qry_periodos = $consulta;
	$res_qry = $mysqli->query($qry_periodos);
	$mysqli->close();
	return $res_qry;
}

?>
