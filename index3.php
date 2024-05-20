<?php
session_start();
if (!isset($_SESSION['usuario'])){	
	?><script type="text/javascript">window.top.location = "index.html"</script><?php }
else $user = $_SESSION["usuario"];
?>
<html>
<head>
</head>
 <frameset rows="150,*" framespacing='0' frameborder='0' border='0'>
	<frame frameborder='0' framespacing='0' src="docencabezado.php" noresize scrolling='no' name="topFrame"></frame>
	<frame frameborder='0' framespacing='0' src="bienvenida.php" name="mainFrame"></frame>
</frameset>
</html>