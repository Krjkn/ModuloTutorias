<?php 
//Librerias y funciones
require_once("../../../includes/config.inc.php");
session_start();
if (!isset($_SESSION['usuario'])){	
	?><script type="text/javascript">window.top.location = "index.html"</script><?php }
else $user = $_SESSION["usuario"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->cssDir; ?>/tec_estilo.css" />
<title>SII :: Carreras</title>
</head>
<body>
<form name="grupos" action="extramanto_grupos.php" method="post">
	<input type="hidden" name="carrera_reticula" value="<?php echo $carrera_reticula; ?>">
	<input type="hidden" name="materia_grupo" value="<?php echo $materia_grupo; ?>">
	<input type="hidden" name="accion" value="<?php echo $accion; ?>">
	<input type="hidden" name="periodo" value="<?php echo $periodo; ?>">
	<input type="hidden" name="semestre" value="<?php echo $semestre; ?>">
	<input type="hidden" name="capacidad" value="<?php echo $capacidad; ?>" />
	<input type="hidden" name="rfc" value="<?php echo $rfc; ?>" />
	<input type="hidden" name="horario_lunes" value="<?php echo $horario_lunes; ?>" />
	<input type="hidden" name="horario_martes" value="<?php echo $horario_martes; ?>" />
	<input type="hidden" name="horario_miercoles" value="<?php echo $horario_miercoles; ?>" />
	<input type="hidden" name="horario_jueves" value="<?php echo $horario_jueves; ?>" />
	<input type="hidden" name="horario_viernes" value="<?php echo $horario_viernes; ?>" />
	<input type="hidden" name="horario_sabado" value="<?php echo $horario_sabado; ?>" />
	<input type="hidden" name="horario_domingo" value="<?php echo $horario_domingo; ?>" />
        <input type="hidden" name="horario_lunes2" value="<?php echo $horario_lunes2; ?>" />
	<input type="hidden" name="horario_martes2" value="<?php echo $horario_martes2; ?>" />
	<input type="hidden" name="horario_miercoles2" value="<?php echo $horario_miercoles2; ?>" />
	<input type="hidden" name="horario_jueves2" value="<?php echo $horario_jueves2; ?>" />
	<input type="hidden" name="horario_viernes2" value="<?php echo $horario_viernes2; ?>" />
	<input type="hidden" name="horario_sabado2" value="<?php echo $horario_sabado2; ?>" />
	<input type="hidden" name="horario_domingo2" value="<?php echo $horario_domingo2; ?>" />

</form>
<form name="cancell" action="extramanto_grupos.php" method="post">
	<input type="hidden" name="carrera_reticula" value="<?php echo $carrera_reticula; ?>">
	<input type="hidden" name="accion" value="<?php echo $accion; ?>">
	<input type="hidden" name="periodo" value="<?php echo $periodo; ?>">
	<input type="hidden" name="semestre" value="<?php echo $semestre; ?>">
</form>
<?php
	$regresar = "document.grupos.submit()";//"window.location = 'manto_grupos.php?accion=$accion'";
	
	$guion 		= strrpos($carrera_reticula,"_");
	$carrera 	= substr($carrera_reticula,0,$guion);
	$reticula = substr($carrera_reticula,$guion+1);
	$grupo = strtoupper($grupo);
	if($materia_grupo)
	{
		$guion 		= strrpos($materia_grupo,"_");
		$materia = substr($materia_grupo, 0, $guion);
		$grupo = trim(substr($materia_grupo, $guion+1));
	}
	$materia = trim($materia);
	$qry_alta_horario = "exec pap_extrahorarios ";
	if ($accion == 'elimina') {
		$accion = 'eliminar';
		$capacidad_grupo=  50;
		$rfc ='CAQA681204U72';
		$carrera ='9';
		$reticula=9;
	}
	$qry_alta_horario.= " '$accion', ";
	$qry_alta_horario.= " '$periodo', '$materia', '$grupo', ";
	$qry_alta_horario.= "  $capacidad_grupo, ";
	$qry_alta_horario.= " '$horario_lunes', ";
	$qry_alta_horario.= " '$horario_martes', ";
	$qry_alta_horario.= " '$horario_miercoles', ";
	$qry_alta_horario.= " '$horario_jueves', ";
	$qry_alta_horario.= " '$horario_viernes', ";
	$qry_alta_horario.= " '$horario_sabado', ";
	$qry_alta_horario.= " '$horario_domingo', ";
        $qry_alta_horario.= " '$horario_lunes2', ";
	$qry_alta_horario.= " '$horario_martes2', ";
	$qry_alta_horario.= " '$horario_miercoles2', ";
	$qry_alta_horario.= " '$horario_jueves2', ";
	$qry_alta_horario.= " '$horario_viernes2', ";
	$qry_alta_horario.= " '$horario_sabado2', ";
	$qry_alta_horario.= " '$horario_domingo2', ";
	$qry_alta_horario.= " '$rfc', '$carrera', $reticula, NULL";
	
	$res_alta_horario = ejecutar_sql($qry_alta_horario);
	$msj = $res_alta_horario->fields('error');
	if($msj){
		if(substr($msj,0,5) != 'Error' && $accion == 'actualizar')
			$regresar = "document.cancell.submit()";
		?>
		<script type="text/javascript">
			alert("<?php echo $msj; ?>")
			<?php echo $regresar; ?>
		</script><?php
	}
	else
	{
		//$msj = $conn->errormsg();
		?>
		<script type="text/javascript">
			alert("<?php echo $msj; ?>")
			<?php echo $regresar; ?>
		</script><?php
	}	
	//echo $qry_alta_horario;
?>
</body>
</html>
