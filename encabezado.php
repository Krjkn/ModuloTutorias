<?php$user = $_GET["usuario"];$nombre_usuario = $_GET["nombre_usuario"];
$IndiceEspacio = strpos($nombre_usuario," ");	$CadenaRecortada = substr($nombre_usuario,0,$IndiceEspacio);

require_once("includes/config.inc.php");
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
<body>

<center>
<table  align="center">  
  	<tr>
      <td><img src="img/tecnm.jpg""  width="110" height="60" /> </td>
	  	<td>
<div class="example">
    <ul id="nav">
        <li><a href="">Grupos</a>
            <ul>
                <li><a href="creagrupo.php">Creea Grupo</a></li>
                <li><a href="modificagrupo.php">Modifica Grupo</a>
				<li><a href="imprimealu.php">Imprimir Contancias</a>
                <li><a href="corrigenom.php">Corregir Alumno</a>  
				<li><a href="periodos.php">Periodos Escolares</a> 
            </ul>
        </li>
        <li><a href="">Lista Grupos</a>
			 <ul>
                <li><a href="lista_grupos_desarrollo.php">listar Grupos</a></li>
                <li><a href="eliminagrupo.php">Elimina Grupo</a>
			
                   
            </ul>
          
        </li>
		<li><a href="">Asigna Grupos</a>
			 <ul>
                <li><a href="extraasigna_docente.php">Asigna Profesor</a></li>
                <li><a href="asignaalumnogrupo.php">Asigna Alumno</a>
				
                   
            </ul>
          
        </li>
        <li><a href="">Otros</a>
			<ul>
				<li><a href="borraalumnogrupo.php">Borra Alumno</a>
				<li><a href="entrega.php">Entrega de Reportes</a></li>
				<li><a href="alumnonuevo.php">Alta de Alumno Nuevo</a></li>
			</ul>	
		</li>
		<li><a href="cambio_contrasena2.php">Contraseñas</a>
			<ul>
				<li><a href="muestraalumno.php">Busca Alumno</a></li>
			</ul>
		</li>
		
		<li><a href="cerrar_sesion.php">Salir</a>
    </ul>
</div>
</td>
	<td><img src="img/usuario.jpg"  width="40" height="40" /> </td>
	<td><h3><?php echo " ADMINISTRADOR "?></h3></td>
  	</tr>
  </table>
</center>
</body>
</html>