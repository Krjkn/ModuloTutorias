<?php 
include "encabezado.php";
$user = $_SESSION["usuario"];
$materia  	=$_POST["materia"];
$grupo   	=$_POST["grupo"];
$periodo  	=$_POST["periodo"];
$horario	=$_POST["hora"];
$dia		=$_POST["dia"];
$aula		=$_POST["aula"];
$yaesta =0;
$verifica="select * from grupos where horario = '$horario' and periodo = '$periodo' and dia = '$dia' and aula = '$aula'";
$res_verifica = ejecuta_consulta($verifica);
while ($fila = $res_verifica ->fetch_assoc()){
	$yaesta = 1;
}
if ($yaesta == 0){
	$msg ='Grupo se dio de Alta con exito ';
	$inserta="insert into grupos(horario,dia,aula,grupo,materia,periodo,alumnos_inscritos) values('$horario','$dia','$aula','$grupo','$materia','$periodo',0)";
	ejecuta_consulta($inserta);
}
else {
	$msg = 'El Aula ya esta ocupada en ese horario';
}
?>
<div id="mainFrame">
<script type="text/javascript">
alert("<?php echo $msg; ?>");
</script>
</div>
<?php

?>

