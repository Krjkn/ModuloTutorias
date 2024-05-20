<?php 
include "encabezado.php";
$user = $_SESSION["usuario"];
$materia  	=$_GET["materia"];
$grupo   	=$_GET["grupo"];
$periodo  	=$_GET["periodo"];
$msg ='Grupo se Elimino con exito ';
$actualiza="delete from  grupos where grupo = '$grupo' and materia = '$materia' and periodo = '$periodo'";
ejecuta_consulta($actualiza);
?>
<div id="mainFrame">
<script type="text/javascript">
alert("<?php echo $msg; ?>");
</script>
</div>

