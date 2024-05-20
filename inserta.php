<?php
	$noctrl = $_POST["noctrl"];
	$clave  = $_POST["clave"];
	$mysqli = mysqli_connect("localhost", "root","", "labs");
	$consulta = "insert into ingresos(clavelab,noctrlalumno,horafecha) values('$clave','$noctrl',(NOW() - INTERVAL 1 HOUR))";
	$mysqli->query($consulta);
	$mysqli->close();
?>