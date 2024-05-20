<?php 

require_once("includes/config.inc.php");

$regresar = "javascript: document.location = 'index.html'";

?>

<html>

<head>

<link rel="stylesheet" type="text/css" href="css/tec_estilo.css" />

<link rel="stylesheet" type="text/css" href="css/tec_estilo_encabezado.css" />

<link rel="stylesheet" type="text/css" href="css/style2.css">

<script type="text/javascript" src="js/funciones.js"></script>

</head>

<body>

<br /><br />

<div class="login-box">

	<img src="img/avatar.png" class="avatar">

    <h1>Envia mi Contrase&ntilde;a a mi correo</h1>
	<h1>de estuduante del TecNM Campus Iguala</h1>
	
	
    <form action="recupera2.php" method="get" name="form1"   target="_self">   

            <p>Usuario: (no de control alumno) </p>

            <input type="text" name="usuario" placeholder="Teclea tu usuario">

            
            <input type="submit" name="submit" value="Enviar clave">

    </form>
	
</div>

</body>

</html>





