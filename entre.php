<?php 
	require_once("includes/config.inc.php");
	require_once("fpdf/fpdf.php");
	require_once("pdf/funciones.pdf.php");
	session_start();
	if (!isset($_SESSION['usuario'])){	
		?><script type="text/javascript">window.top.location = "index.html"</script><?php }
	$periodo = $_GET['periodo'];	
	$rfc     = $_GET['materia'];
	$cual    = $_GET['grupo'];
	$qry_reporte = "select 	* from reportes as r where rfc ='$rfc' and periodo = '$periodo'";
	$res_reporte = ejecuta_consultaf($qry_reporte);
	while ($fila = $res_reporte->fetch_assoc()) {
		$diagnostico = $fila['diagnostico'];
		$reporte1 	 = $fila['reporte1'];
		$reporte2	 = $fila['reporte2'];
		$final		 = $fila['final'];
	}
		
	if ($cual == 1){	
	    if ($diagnostico == "1") $dato = 0;	else $dato = 1;
		$qry_actualiza = "update reportes set diagnostico = '$dato' where rfc ='$rfc' and periodo = '$periodo'";
		ejecuta_consultaf($qry_actualiza);	
	}
	if ($cual == 2){	
	    if ($reporte1 == "1") $dato = 0;	else $dato = 1;
		$qry_actualiza = "update reportes set reporte1= '$dato' where rfc ='$rfc' and periodo = '$periodo'";
		ejecuta_consultaf($qry_actualiza);	
	}
	if ($cual == 3){	
	    if ($reporte2 == "1") $dato = 0;	else $dato = 1;
		$qry_actualiza = "update reportes set reporte2= '$dato' where rfc ='$rfc' and periodo = '$periodo'";
		ejecuta_consultaf($qry_actualiza);	
	}
	if ($cual == 4){	
	    if ($final == "1") $dato = 0;	else $dato = 1;
		$qry_actualiza = "update reportes set final= '$dato' where rfc ='$rfc' and periodo = '$periodo'";
		ejecuta_consultaf($qry_actualiza);	
	}
?>	
	<script type="text/javascript">
	var periodo  = '<?php echo $periodo; ?>';
	window.top.location = "entrega.php?periodo="+periodo;</script>

