<?php 
include "docencabezado.php";

$user = $usuario;
$rfc = $user; 
?>
<script type="text/javascript">
function abrir_documento(pagina, vtipo, vperiodo, vmateria, vgrupo)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	formulario.target = '';
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.usuario.value = vgrupo;
	formulario.submit();
}
function openwindow(url)
{
	name = "mainFrame"
	specs = "channelmode=yes, left = 5, top = 5, directories = no, location = no, menubar = no, toolbar = no, resizable = yes, scrollbars = yes"
	window.open(url, name, specs)
}
</script>
<div id="mainFrame">
<h3 align="center"> Grupos de Tutorias</h3> 
<form name="enviar_docto" method="get" target="mainFrame">
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="usuario" type="hidden" />
</form>
<form method="get" action="listaencuesta.php" >
	<table align="center">
    	<tr>
        	<th> Selecciona el Periodo: </th>
            <td>
            	<select name="periodo">
                	<?php echo nperiodo($periodo); ?>
				</select>
				<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
			</td>
        </tr>
    </table>
    <br />
    <div align="center">
	    <input type="submit" value="Procesar" class="boton" />
       
        <input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'"> 
    </div>
</form>

<?php
if(!empty($periodo)){
?>


<h4 align="center"> <i>Periodo:</i> <?php echo $periodo;  ?> </h4>
<?php

    $qry_grupos="select a.no_de_control,CONCAT(apellido_paterno, ' ',apellido_materno,' ', nombre_alumno) as alumno 
from grupos  g,personal p,alumnos a,seleccion_materias s
where  g.rfc='$rfc' and g.periodo = '$periodo' and g.rfc = p.rfc and a.no_de_control = s.no_de_control 
and s.materia = g.materia and s.periodo = g.periodo and s.grupo = g.grupo ";
	$res_grupos = ejecuta_consulta($qry_grupos);
    $tabla_grupos_docente  = "<table align='center'>";
	$tabla_grupos_docente .= "	<tr align='center'>";
  	$tabla_grupos_docente .= "		<th> no_de_control </th>";
	$tabla_grupos_docente .= "		<th> Nombre Alumno </th>";
	$tabla_grupos_docente .= "		<th> Encuesta </th>";
	$tabla_grupos_docente .= "		<th> Necesidades </th>";
	$tabla_grupos_docente .= "	</tr>";
	$non = false;
	while ($fila = $res_grupos->fetch_assoc()) 
	{
		$no_de_control      = $fila['no_de_control'];
		$alumno   			= $fila['alumno'];	
		$id = ($non)?"par":"non";
		$tabla_grupos_docente .= "<tr id='".$id."'>";
		$tabla_grupos_docente .= "<td>".$no_de_control."  </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$alumno." </td>"; 
		$tabla_grupos_docente .= "<td align='center'>"; 
		$tabla_grupos_docente .= "<img src='img/lista.gif' onclick='abrir_documento(\"encuestapro1.php\", \" \", \"".$periodo."\", \"".$no_de_control."\", \"".$user."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "</td>";
		$tabla_grupos_docente .= "<td align='center'>"; 
		$tabla_grupos_docente .= "<img src='img/lista.gif' onclick='abrir_documento(\"canalizaciones.php\", \" \", \"".$periodo."\", \"".$no_de_control."\", \"".$user."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
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
	<input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'"> 
</div>
<?php 
}

?>
</div>