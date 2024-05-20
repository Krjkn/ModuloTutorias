
<?php

	$mysqli  = mysqli_connect("localhost", "root","", "empresa");
	$nombre =  $_POST['nombre'];
	$estatura =  $_POST['estatura'];
	$alta="insert into trabajador(nombre,estatura)values('$nombre',$estatura)";
	echo $alta;
	$mysqli->query($alta);
	$mysqli->close();
?>
<script type="text/javascript">
	alert("<?php echo "Se realizo el Alta de los datos"; ?>");
</script>
