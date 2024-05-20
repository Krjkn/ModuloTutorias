<?php 
include "encabezado.php";
$user = $_SESSION["usuario"];
?>
<script type="text/javascript">function abrir_documento(pagina, vtipo, vperiodo, vmateria, vgrupo)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.grupo.value = vgrupo;
	formulario.submit();
}
</script>
<body>
<div id="mainFrame">
<form name="enviar_docto" method="get">
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden"/>
	<input name="materia" type="hidden" />
	<input name="grupo" type="hidden" />
</form>

<?php
{
$materia  		=$_POST["materia"];
$grupo   		=$_POST["grupo"];
$periodo  		=$_POST["periodo"];
$no_de_control	=$_POST["no_de_control"];
$yaesta =0;

$verifica1="select * from alumnos where no_de_control = '$no_de_control' ";
$res_verifica1 = ejecuta_consulta($verifica1);
if ($fila1 = $res_verifica1 ->fetch_assoc()){
$verifica="select * from seleccion_materias where no_de_control = '$no_de_control' and periodo = '$periodo' ";
$res_verifica = ejecuta_consulta($verifica);
while ($fila = $res_verifica ->fetch_assoc())
	$yaesta = 1;
	if ($yaesta == 0){
		$msg ='Alumno dado de Alta';
		$inserta="insert into seleccion_materias(no_de_control,grupo,materia,periodo) values('$no_de_control','$grupo','$materia','$periodo')";
		ejecuta_consulta($inserta);
		$actualiza="update grupos set alumnos_inscritos = alumnos_inscritos + 1 where grupo = '$grupo' and materia = '$materia' and periodo = '$periodo'";
		ejecuta_consulta($actualiza);
	}
	else 
		$msg = 'El Alumno ya esta dado de Alta';
}
else $msg = 'El numero de control NO EXISTE';
$a = 'inscribe_alumno.php';
?>
<script type="text/javascript">
alert("<?php echo $msg; ?>");
abrir_documento("<?php echo $a; ?>",'','<?php echo $periodo; ?>','<?php echo $materia; ?>','<?php echo $grupo; ?>');
</script>
</div>
<?php
}
?>

