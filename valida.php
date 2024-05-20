<?php 

require_once("includes/config.inc.php");
$usuario = $_GET['usuario'];
$contrasena = $_GET['contrasena'];


$contrasena = md5($contrasena);
$noes = 0;
$qry_contra="select nombre_usuario,tipo_usuario,usuario from acceso where contrasena =  '$contrasena' and usuario = '$usuario'";
$res_contra = ejecuta_consulta($qry_contra);
while($fila = $res_contra->fetch_assoc()) {
	$tipo_usuario = $fila['tipo_usuario'];
	$usuario = $fila['usuario'];
	$nombre_usuario = $fila['nombre_usuario'];
	$noes = 1;
}
if ($noes == 1){
	if ($tipo_usuario == 'DDA'){
	?>
		<script type="text/javascript">
			window.location.href = 'pasades.php?usuario=<?php echo $usuario; ?>'
			
		</script><?php 
	}
	if ($tipo_usuario == 'ALU'){
		?>
		<script type="text/javascript">
			window.location.href = 'pasaalu.php?usuario=<?php echo $usuario; ?>'
		</script><?php 
	}
	if ($tipo_usuario == 'DOC'){
		?>
		<script type="text/javascript">
			window.location.href = 'pasa.php?usuario=<?php echo $usuario; ?>'
		</script><?php 
	}
	
}else {
	$msg = 'Usuario no autorizado';
	$pag = 'index.php';
}
?>
<script type="text/javascript">
    window.alert("<?php echo $msg; ?>") 
   	window.location = "<?php echo $pag; ?>"
</script>
