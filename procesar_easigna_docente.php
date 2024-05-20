<?php
 include "encabezado.php";
 $user = $_SESSION["usuario"];
 $periodo = $_POST['periodo'];
 $mat_gru = $_POST['mat_gru']; 
 $rfc = $_POST['rfc'];
 $segundo = $mat_gru;
 $gion= strpos($segundo,"_");
 $materia=substr($segundo,0,$gion);
 $grupo=substr($segundo,$gion+1,20);
$qry_rfc = "update grupos set rfc = '$rfc' where periodo = '$periodo' and materia ='$materia' and grupo ='$grupo'";
ejecuta_consulta($qry_rfc);
$pagina = "extraasigna_docente.php?periodo=$periodo";
$men='Maestro Asignado';
?>
<body>
<div id="mainFrame">
<script type="text/javascript">
	alert('<?php echo $men; ?>');
	window.location = "<?php echo $pagina; ?>";
</script>
</div>
</body>

