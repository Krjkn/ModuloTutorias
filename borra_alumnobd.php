<?php 
include "encabezado.php";
$periodo  = $_GET['periodo'];
$materia  = $_GET['materia'];
$grupo    = $_GET['grupo'];
$maestro  = $_GET['maestro'];
$viernes  = $_GET['viernes'];
$nmateria = $_GET['nmateria'];
$carrera  = $_GET['carrera'];
$no_de_control = $_GET['no_control'];
$user = $_SESSION["usuario"];
?>
<script type="text/javascript">
function abrir_documento(pagina, vtipo, vperiodo, vmateria, vgrupo,vmaestro,vviernes,vnmateria,vcarrera,vno_de_control)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.grupo.value = vgrupo;
	formulario.maestro.value = vmaestro;
	formulario.viernes.value = vviernes;
	formulario.nmateria.value = vnmateria;
	formulario.carrera.value = vcarrera;
	formulario.carrera.value = vno_de_control;
	formulario.submit();
}
</script>
<body>
<div id="mainFrame">
<form name="enviar_docto" method="get">
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="grupo" type="hidden" />
	<input name="maestro" type="hidden" />
	<input name="viernes" type="hidden" />
	<input name="nmateria" type="hidden" />
	<input name="carrera" type="hidden" />
	<input name="no_de_control" type="hidden" />
</form>

<?php
{
	$msg ='Alumno Eliminado del Grupo';
	$borra="delete FROM seleccion_materias  where grupo = '$grupo' and materia = '$materia' and periodo = '$periodo' and no_de_control = '$no_de_control' ";
	ejecuta_consulta($borra);
	$actualiza="update grupos set alumnos_inscritos = alumnos_inscritos - 1 where grupo = '$grupo' and materia = '$materia' and periodo = '$periodo'";
	ejecuta_consulta($actualiza);
	$a = 'borra_alumno.php';
?>
<script type="text/javascript">
alert("<?php echo $msg; ?>");
abrir_documento("<?php echo $a; ?>",0,'<? echo $periodo; ?>','<?php echo $materia; ?>','<?php echo $grupo; ?>','<?php echo $maestro; ?>','<?php echo $viernes; ?>','<?php echo $nmateria; ?>','<?php echo $carrera; ?>','<?php echo $no_de_control; ?>');
</script>
<?php
}
?>
</div>
</body>