<?php 
include "docencabezado.php";
$user = $usuario;
$no_de_control = $_GET['materia'];
$qry_alumnos="select concat(nombre_alumno,' ',apellido_paterno,' ',apellido_materno) as nombre ,sexo from alumnos where  no_de_control = '$no_de_control'";
$res_alumnos = ejecuta_consulta($qry_alumnos);
while ($fila = $res_alumnos->fetch_assoc()) {
	$nombre   = $fila['nombre'];
	$sexo 	  = $fila['sexo'];
}
?>
<script type="text/javascript">
function abrir_documento(pagina, vtipo, vperiodo, vmateria, vgrupo)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.usuario.value = vgrupo;
	formulario.submit();
}
function abrir_documentopdf(pagina, vtipo, vperiodo, vmateria, vgrupo)
{
	formulario = document.enviar_doctopdf;
	formulario.action = pagina;
	
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.usuario.value = vgrupo;
	formulario.submit();
}
function openwindow(url)
{
	
	specs = "channelmode=yes, left = 5, top = 5, directories = no, location = no, menubar = no, toolbar = no, resizable = yes, scrollbars = yes"
	window.open(url, name, specs)
}
</script>
<div id="mainFrame">
<h3 align="center"> Grupos de Tutorias</h3> 
<form name="enviar_docto" method="get" >
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="usuario" type="hidden" />
</form>
<form name="enviar_doctopdf" method="get" target="_blank" >
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="usuario" type="hidden" />
</form>
<h4 align="center"> <i>Nombre Alumno:</i> <?php echo $nombre;  ?> </h4>
<?php

    $qry_grupos="select * from canalizaciones where no_de_control = '$no_de_control'";
	$res_grupos = ejecuta_consulta($qry_grupos);
    $tabla_grupos_docente  = "<table align='center'>";
	$tabla_grupos_docente .= "	<tr align='center'>";
	$tabla_grupos_docente .= "		<th> Num </th>";
  	$tabla_grupos_docente .= "		<th> Detecccion de Necesidad </th>";
	$tabla_grupos_docente .= "	<th> Area a Canalizar </th>";
	$tabla_grupos_docente .= "		<th> Fecha </th>";
	$tabla_grupos_docente .= "		<th> EDITAR </th>";
	$tabla_grupos_docente .= "		<th> IMPRIMIR EVIDENCIA </th>";
	$tabla_grupos_docente .= "		<th> ELIMINAR CANALIZACION </th>";
	$tabla_grupos_docente .= "	</tr>";
	$non = false;
	while ($fila = $res_grupos->fetch_assoc()) 
	{
		$problema      = $fila['problema'];
		$fecha   			= $fila['fecha'];	
		$area   			= $fila['area'];
		$numero   			= $fila['numero'];
		$id = ($non)?"par":"non";
		$tabla_grupos_docente .= "<tr id='".$id."'>";
		$tabla_grupos_docente .= "<td>".$numero."  </td>";
		$tabla_grupos_docente .= "<td>".$problema."  </td>";
		$tabla_grupos_docente .= "<td>".$area."  </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$fecha." </td>"; 
		$tabla_grupos_docente .= "<td align='center'>"; 
		$tabla_grupos_docente .= "<img src='img/lista.gif' onclick='abrir_documento(\"editacalizacion.php\", \" \", \"".$numero."\", \"".$no_de_control."\", \"".$user."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "</td>";
		$tabla_grupos_docente .= "<td align='center'>";
		$tabla_grupos_docente .= "<img src='img/imprime.gif' onclick='abrir_documentopdf(\"imprimir.pdf.php\", \" \", \"".$numero."\", \"".$no_de_control."\", \"".$user."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "</td>";
		$tabla_grupos_docente .= "<td align='center'>";
		$tabla_grupos_docente .= "<img src='img/elimina.gif' onclick='abrir_documento(\"eliminacalizacion.php\", \" \", \"".$numero."\", \"".$no_de_control."\", \"".$user."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
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
	<input type="button" value="Agrega otra Canalización a esta alumna" name="busca" class="boton"  onclick=abrir_documento("altacalizacion.php","","$user","<?php echo $no_de_control?>","<?php echo $usuario?>","enviar_lista") />
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'"> 
</div>
<?php 

?>
</div>
