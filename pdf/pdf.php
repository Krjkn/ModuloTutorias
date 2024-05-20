<?php
require_once("funciones_pdf.php");

// boletas
if($_GET["PDF"]=="bol_alu")
{
  boletas_alumno($_GET["per"],$_GET["no"],$_GET["peresco"]);
}

if($_GET["PDF"]=="bol_act")
{
  boletas_actividad($_GET["per"],$_GET["act"],$_GET["peresco"]);
}

if($_GET["PDF"]=="bol_esp")
{
  boletas_especialidad($_GET["per"],$_GET["esp"],$_GET["peresco"]);
}

if($_GET["PDF"]=="bol_gpr")
{
  boletas_grupo($_GET["per"],$_GET["act"],$_GET["gpr"],$_GET["peresco"],$_GET["hora"]);
}

// cedulas
if($_GET["PDF"]=="ced_ins")
{
  cedula_inscripcion($_GET["per"],$_GET["act"],$_GET["gpr"],$_GET["peresco"],$_GET["hora"]);
}

if($_GET["PDF"]=="ced_res")
{
  cedula_resultado($_GET["per"],$_GET["act"],$_GET["gpr"],$_GET["peresco"],$_GET["hora"]);
}

if($_GET["PDF"]=="ced_res2")
{

  cedula_resultado2($_GET["per"],$_GET["act"],$_GET["gpr"],$_GET["peresco"],$_GET["hora"]);
}

// seleccionados
if($_GET["PDF"]=="selecc")
{
  seleccionados($_GET["per"],$_GET["act"],$_GET["peresco"]);
}

//Estadisticas 
if($_GET["PDF"]=="esta_acta")
{
  est_acta($_GET["per"],$_GET["act"],$_GET["peresco"],$_GET["alu"]);
}

if($_GET["PDF"]=="esta_actr")
{
  est_actr($_GET["per"],$_GET["act"],$_GET["peresco"],$_GET["alu"]);
}

if($_GET["PDF"]=="esta_culta")
{
  est_culta($_GET["per"],$_GET["tot"],$_GET["peresco"]);
}

if($_GET["PDF"]=="esta_cultr")
{
  est_cultr($_GET["per"],$_GET["tot"],$_GET["peresco"]);
}

if($_GET["PDF"]=="esta_depa")
{
  est_depa($_GET["per"],$_GET["tot"],$_GET["peresco"]);
}

if($_GET["PDF"]=="esta_depr")
{
  est_depr($_GET["per"],$_GET["tot"],$_GET["peresco"]);
}

if($_GET["PDF"]=="esta_espa")
{
  est_espa($_GET["per"],$_GET["esp"],$_GET["peresco"],$_GET["tot"]);
}

if($_GET["PDF"]=="esta_espr")
{
  est_espr($_GET["per"],$_GET["esp"],$_GET["peresco"],$_GET["tot"]);
}

if($_GET["PDF"]=="esta_depcul")
{
  est_dep_cul($_GET["per"],$_GET["peresco"],$_GET["tot"]);
}

if($_GET["PDF"]=="esta_depculr")
{
  est_dep_culr($_GET["per"],$_GET["peresco"],$_GET["tot"]);
}

// historia aalumno
if($_GET["PDF"]=="historial")
{
  historia_alumno($_GET["no"]);
}

// horarios
if($_GET["PDF"]=="ho_cul")
{
  hor_cul($_GET["periodo"]);
}

if($_GET["PDF"]=="ho_dep")
{
  hor_dep($_GET["periodo"]);
}

//listas

if($_GET["PDF"]=="lis")
{
  listas($_GET["per"],$_GET["act"],$_GET["gpr"],$_GET["peresco"],$_GET["hora"]);
}
?>