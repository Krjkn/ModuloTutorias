<?php 
include "encabezado.php";
$user = $_SESSION["usuario"];
$materia  	=$_POST["materia"];
$grupo   	=$_POST["grupo"];
$periodo  	=$_POST["periodo"];
$horario	=$_POST["hora"];
$dia		=$_POST["dia"];
$aula		=$_POST["aula"];
	$msg ='Grupo se Modifico con exito ';
	$actualiza="update grupos set horario = '$horario', dia = '$dia' , aula = '$aula' where grupo = '$grupo' and materia = '$materia' and periodo = '$periodo'";
	ejecuta_consulta($actualiza);

?>
<div id="mainFrame">
<script type="text/javascript">
alert("<?php echo $msg; ?>");
</script>
</div>

