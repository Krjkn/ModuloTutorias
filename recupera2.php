<?php
$usuario=$_GET["usuario"];
require_once("includes/config.inc.php");
$qry_contra="select * from acceso where usuario = '$usuario'";
$res_contra = ejecuta_consulta($qry_contra);
$noes = 0;
while($fila = $res_contra->fetch_assoc()) {
	$tipo_usuario = $fila['tipo_usuario'];
	$noes = 1;
}
if ($noes == 1) {
	if ($tipo_usuario=='ALU'){
		$to = $usuario."@iguala.tecnm.mx";
		
		$subject = "Esta es tu contrasea";
		$contrasena =rand(10000,30000);
		$nueva = md5($contrasena);
		$qry_actualiza="update acceso set contrasena = '$nueva' where usuario = '$usuario'";
		ejecuta_consulta($qry_actualiza);
		$message = "PassWord para tutorias es ".$contrasena;
		mail($to, $subject, $message);
				
		?>
			<script type="text/javascript">
				window.alert("EN UNOS SEGUNDOS TU CONTRASEÑA SERA ENVIADA") 
       		</script>
			<?php
		
	}else{
			?>
			<script type="text/javascript">
				window.alert("Este modulo es solo para alumnos") 
       		</script>
			<?php
		}
}else{
	?>
	<script type="text/javascript">
		window.alert("Este usuario no esta dado de alta en el sistema") 
	</script>
	<?php
		
	}

?>