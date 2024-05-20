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
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.grupo.value = vgrupo;
	formulario.submit();
}
</script>
<body>
<div id="mainFrame">
<h3 align="center"> Cumplimiento de entrega de reportes</h3> 
<form name="enviar_docto" method="get">
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="grupo" type="hidden" />
</form>
<form name="enviar_doctof" method="get" target="_blank">
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="grupo" type="hidden" />
</form>
<form method="get" action="entrega.php">
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
       
        <input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
    </div>
</form>

<?php
if(!empty($periodo)){
    $qry_grupos="select p.rfc,aula,CONCAT(apellidos_empleado, ' ', nombre_empleado) as profesor,dia,g.grupo,horario,nombre_carrera,nombre_completo_materia,periodo,g.materia as materia,g.grupo as grupo ,alumnos_inscritos 
from grupos  g,materias m,carreras c,materias_carreras mc,personal p
where  g.materia=m.materia and mc.carrera = c.carrera and mc.reticula = c.reticula and mc.materia = m.materia and
p.rfc = g.rfc and g.periodo= '$periodo' ";
	$res_grupos = ejecuta_consulta($qry_grupos);
    $tabla_grupos_docente  = "<table align='center'>";
	$tabla_grupos_docente .= "	<tr align='center'>";
    $tabla_grupos_docente .= "		<th width=65> Materia </th>";
	$tabla_grupos_docente .= "		<th> Grupo </th>";
	//$tabla_grupos_docente .= "		<th> Clave </th>";
	$tabla_grupos_docente .= "		<th> Carrera </th>";
	$tabla_grupos_docente .= "		<th> Maestro </th>";
	$tabla_grupos_docente .= "		<th> Diagnostico </th>";
	$tabla_grupos_docente .= "		<th> Reporte1 </th>";
	$tabla_grupos_docente .= "		<th> Reporte2 </th>";
	$tabla_grupos_docente .= "		<th> Reporte Final </th>";
	$tabla_grupos_docente .= "	</tr>";
	$non = false;
	while ($fila = $res_grupos->fetch_assoc()) 
	{
		$rfc  		 	= $fila['rfc'];
		$grupo  		 	= $fila['grupo'];
		$materia   			= $fila['materia'];	
		$profesor   		= $fila['profesor'];
		$nombre_carrera   	= $fila['nombre_carrera'];
		$nombre_completo_materia   = $fila['nombre_completo_materia'];
		$id = ($non)?"par":"non";
		$tabla_grupos_docente .= "<tr id='".$id."'>";
		$tabla_grupos_docente .= "<td> ".$nombre_completo_materia."  </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$grupo." </td>"; 
		$nombreC = $nombre_carrera;
		$tabla_grupos_docente .= "<td align='center'> ".$nombreC." </td>"; 
		$tabla_grupos_docente .= "<td align='center'> ".$profesor." </td>";
		$tabla_grupos_docente .= "<td align='center'>"; 
		$qry_reporte = "select 	* from reportes as r where rfc ='$rfc' and periodo = '$periodo'";
		$res_reporte = ejecuta_consultaf($qry_reporte);
		$no = 0;
		while ($fila = $res_reporte->fetch_assoc()) {
			$diagnostico = $fila['diagnostico'];
			$reporte1 	 = $fila['reporte1'];
			$reporte2	 = $fila['reporte2'];
			$final		 = $fila['final'];
			$no = 1;
		}
		if ($no == 0) {
			$diagnostico = "0";
			$reporte1 	 = "0";
			$reporte2	 = "0";
			$final		 = "0";
			$qry_inserta = "insert into reportes(rfc,periodo,diagnostico,reporte1,reporte2,final) values('$rfc','$periodo','0','0','0','0')";
			ejecuta_consultaf($qry_inserta);	
		}
		if ($diagnostico=="1")$imag1 = "bien.png"; else	$imag1 = "mal.png";
		if ($reporte1=="1")$imag2 = "bien.png"; else	$imag2 = "mal.png";
		if ($reporte2=="1")$imag3 = "bien.png"; else	$imag3 = "mal.png";
		if ($final=="1")$imag4 = "bien.png"; else	$imag4 = "mal.png";
		
		$tabla_grupos_docente .= "<img src='img/".$imag1."'  width=32 height=32  onclick='abrir_documento(\"entre.php\", \" \", \"".$periodo."\", \"".trim($rfc)."\", \""."1"."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "</td>";
		$tabla_grupos_docente .= "<td align='center'>"; 
		$tabla_grupos_docente .= "<img src='img/".$imag2."'  width=32 height=32  onclick='abrir_documento(\"entre.php\", \" \", \"".$periodo."\", \"".trim($rfc)."\", \""."2"."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "</td>";
		$tabla_grupos_docente .= "<td align='center'>"; 
		$tabla_grupos_docente .= "<img src='img/".$imag3."'  width=32 height=32  onclick='abrir_documento(\"entre.php\", \" \", \"".$periodo."\", \"".trim($rfc)."\", \""."3"."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "</td>";
		$tabla_grupos_docente .= "<td align='center'>"; 
		$tabla_grupos_docente .= "<img src='img/".$imag4."'  width=32 height=32  onclick='abrir_documento(\"entre.php\", \" \", \"".$periodo."\", \"".trim($rfc)."\", \""."4"."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
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
	<input  type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
</div>
<?php 
}

?>
</div>
</body>