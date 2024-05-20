<?php
	include("includes/config.inc.php");
	session_start();
	session_unset(); 
	session_destroy(); 
  
?>
<html>
<head>
<title>SII :: Cerrar Sesi&oacute;n</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/tec_estilo.css" />
<script type="text/javascript" src="js/funciones.js"></script>
</head>

<body>
  <p align="center" class="bold" id="rojo">Cerrando Sesión...espere un momento </p>
  <script>
    javascript: window.top.location = "index.html";
  </script>
</body>
</html>