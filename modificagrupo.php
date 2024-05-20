<?php 
include "encabezado.php";
if(isset($_GET['periodo'])){
	$periodo = $_GET['periodo'];
}
$user = $_SESSION["usuario"];
?>
<script type="text/javascript">
function abrir_documento(pagina, vtipo, vperiodo, vmateria, vgrupo)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	formulario.target = 'mainFrame';
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.grupo.value = vgrupo;
	formulario.submit();
}
function openwindow(url)
{
	name = "_blank"
	specs = "channelmode=yes, left = 5, top = 5, directories = no, location = no, menubar = no, toolbar = no, resizable = yes, scrollbars = yes"
	window.open(url, name, specs)
}

</script>

</head>

<body>
<div id="mainFrame">
<h3 align="center"> Grupos de Tutorias</h3> 
<form name="enviar_docto" method="get">
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="grupo" type="hidden" />
</form>

<form method="get" action="modificagrupo.php">
	<table align="center">
    	<tr>
        	<th> Selecciona el Periodo: </th>
            <td>
            	<select name="periodo">
                	<?php echo nperiodo($periodo); ?>
				</select>
			</td>
        </tr>
    </table>
    <br />
    <div align="center">
        <input type="submit" value="Procesar" class="boton" />
       
        <input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'bienvenida.php'"> 
    </div>
</form>

<?php
if(!empty($periodo)){
?>


<h4 align="center"> <i>Periodo:</i> <?php echo $periodo;  ?> </h4>
<?php

    $qry_grupos="select aula,CONCAT(apellidos_empleado, ' ', nombre_empleado) as profesor,dia,g.grupo,horario,nombre_carrera,nombre_completo_materia,periodo,g.materia as materia,g.grupo as grupo ,alumnos_inscritos 
from grupos  g,materias m,carreras c,materias_carreras mc,personal p
where  g.materia=m.materia and mc.carrera = c.carrera and mc.reticula = c.reticula and mc.materia = m.materia and
p.rfc = g.rfc and g.periodo= '$periodo' ";
	$res_grupos = ejecuta_consulta($qry_grupos);
    $tabla_grupos_docente  = "<table align='center'>";
	$tabla_grupos_docente .= "	<tr align='center'>";
    $tabla_grupos_docente .= "		<th width=65> Materia </th>";
	$tabla_grupos_docente .= "		<th> Grupo </th>";
	$tabla_grupos_docente .= "		<th> Clave </th>";
	$tabla_grupos_docente .= "		<th> Carrera </th>";
	$tabla_grupos_docente .= "		<th> Maestro </th>";
	$tabla_grupos_docente .= "		<th>Lunes</th>";
	$tabla_grupos_docente .= "		<th>Martes</th>";
	$tabla_grupos_docente .= "		<th>Miercoles</th>";
	$tabla_grupos_docente .= "		<th>Jueves</th>";
	$tabla_grupos_docente .= "		<th> Viernes </th>";
	$tabla_grupos_docente .= "		<th> Cant </th>";
	$tabla_grupos_docente .= "		<th> Listas </th>";
	$tabla_grupos_docente .= "	</tr>";
	$non = false;
	while ($fila = $res_grupos->fetch_assoc()) 
	{
		$grupo  		 	= $fila['grupo'];
		$materia   			= $fila['materia'];	
		$profesor   		= $fila['profesor'];
		$dia  				= $fila['dia'];
		$horario   			= $fila['horario'];
		$aula   			= $fila['aula'];
		$nombre_carrera   	= $fila['nombre_carrera'];
		$nombre_completo_materia   = $fila['nombre_completo_materia'];
		$alumnos_inscritos  = $fila['alumnos_inscritos'];
		$lunes='';$martes='';$miercoles='';
		$jueves='';$viernes='';
		if (trim($dia) =='LUNES')
			$lunes =' '.$horario.'<br/>'.$aula;
		if ($dia =='MARTES')
			$martes =' '.$horario.'<br/>'.$aula;
		if ($dia =='MIERCOLES')
			$miercoles =' '.$horario.'<br/>'.$aula;
		if ($dia =='JUEVES')
			$jueves =' '.$horario.'<br/>'.$aula;
		if (trim($dia) =='VIERNES')
			$viernes =' '.$horario.'<br/>'.$aula;
		$id = ($non)?"par":"non";
		$tabla_grupos_docente .= "<tr id='".$id."'>";
		$tabla_grupos_docente .= "<td> <b>  </b> <br> ".$nombre_completo_materia."  </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$grupo." </td>"; 
		$tabla_grupos_docente .= "<td align='center'> ".$materia." </td>"; 
		$nombreC = $nombre_carrera;
		$tabla_grupos_docente .= "<td align='center'> ".$nombreC." </td>"; 
		$tabla_grupos_docente .= "<td align='center'> ".$profesor." </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$lunes." </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$martes." </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$miercoles." </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$jueves." </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$viernes." </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$alumnos_inscritos." </td>";
		$tabla_grupos_docente .= "<td align='center'>"; 
		$tabla_grupos_docente .= "<img src='img/modifica.gif' onclick='abrir_documento(\"modificadatosgrupo.php\", \" \", \"".$periodo."\", \"".trim($materia)."\", \"".trim($grupo)."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "</td>";
		$tabla_grupos_docente .= "</tr>";
		$non = ($non)?false:true;
	}	
	$tabla_grupos_docente .= "	</table>";
	?>
<br/>
<form name="enviar_lista" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?listado=yes">
	<input name="materia1" type="hidden" value="<?php echo $materia; ?>" />
	<input name="grupo1" type="hidden" value="<?php echo $grupo;?>" />
</form>
<?php echo $tabla_grupos_docente; 

?>
<br/>
<div align="center">
	<input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
</div>
<?php 
}

?>
</div>
</body>
