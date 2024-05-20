<?phprequire_once("includes/config.inc.php");
$usuario = $_GET["usuario"];$qry_contra="select nombre_usuario from acceso where usuario = '$usuario'";$res_contra = ejecuta_consulta($qry_contra);while($fila = $res_contra->fetch_assoc()) {	$nombre_usuario = $fila['nombre_usuario'];}
$IndiceEspacio = strpos($nombre_usuario," ");	
$CadenaRecortada = $nombre_usuario;
require_once("funciones/funciones_combos.php");
?>
<link rel="stylesheet" href="css/style.css"       type="text/css" media="screen">
<link rel="stylesheet" href="css/tec_estilo.css"  type="text/css"/>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/funciones.js"></script>
<script language='javascript' src="js/popcalendar.js"></script>
<Head>
</Head>
<html>
<body>

<center>
<table  align="center">  
  	<tr>
      <td><img src="img/tecnm.jpg""  width="110" height="60" /> </td>
	  	<td>
<div class="example">
    <ul id="nav">
        <li><a href="encuestaa.php?usuario=<?php echo $usuario; ?>" >ENCUESTA</a></li>
		<li><a href="evaluaprofe.php?usuario=<?php echo $usuario; ?>" >Evalua a tu Tutor</a></li>
        <li><a> Contraseña </a>
			<ul>
				<li><a href="cambio_contrasena.php?usuario=<?php echo $usuario; ?>" >Cambiar contraseña</a></li>
			</ul>	
		</li>
		<li><a href="cerrar_sesion.php">Salir</a>
    </ul>
</div>
</td>
	 <td><img src="img/usuario.jpg"  width="40" height="40" /> </td>
	<td><h3><?php echo "  ".$CadenaRecortada ?></h3></td>
  	</tr>
  </table>
</center>
</body>
</html>