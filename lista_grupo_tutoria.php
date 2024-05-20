<?php 


include "docencabezado.php";



?>
<script type="text/javascript">
function valida_datos()
{
	formulario = document.consulta_gpo_carrera;
	if(formulario.carrera_reticula.value == "0")
	{
		alert("Seleccione una Carrera");
		formulario.carrera_reticula.focus();
		return false;
	}
	
	if(formulario.periodo.value == "0")
	{
		alert("Seleccione un periodo.");
		formulario.periodo.focus();
		return false;
	}
		
	formulario.submit();
}
function abrir_documentopdf(pagina, vtipo, vperiodo, vmateria, vgrupo)
{
	formulario = document.enviar_doctopdf;
	formulario.action = pagina;
	
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.grupo.value = vgrupo;
	formulario.submit();
}
function abrir_documento(pagina, vtipo, vperiodo, vmateria, vgrupo)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.usuario.value = vmateria;
	formulario.grupo.value = vgrupo;
	formulario.submit();
}
</script>
<div id="mainFrame">
<h3 align="center"> Grupos de Tutoria</h3> 
<h4 align="center"> 
	<i>Seleccione el periodo de tutorias a listar</i>	<br/> 
	<i></i>	<br/>
	<i>.</i>	<br/>
</h4>
<form name="enviar_docto" method="get" >
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden"/>
	<input name="usuario" type="hidden" />
	<input name="grupo" type="hidden" />
</form>

<form name="enviar_doctopdf" method="get" target="_blank" >
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="grupo" type="hidden" />
</form>
<form method="get" action="lista_grupo_tutoria.php">
	<table align="center">
    	<tr>
        	<th> Periodo: </th>
            <td id="non"> <select name="periodo"> <?php echo nperiodo($periodo); ?> </select> </td>
			<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
			
        </tr>
    </table>
    <div align="center">
        <input type="submit" value="Procesar" class="boton" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'" />
	</div>
</form>
<?php
if(!empty($periodo)){
?>
<h3 align="center"> Grupos de Tutoria</h3> 
<h4 align="center"> 
	<i>Periodo:</i> <?php echo $periodo; ?> 
	<br /> 
	<i>Docente:</i> <?php echo $usuario; ?>
</h4>
<?php
    $qry_grupos="select nombre_completo_materia,periodo,g.materia as materia,g.grupo as grupo ,alumnos_inscritos,g.rfc ";
	$qry_grupos.="from grupos  g,materias m where rfc='$usuario' and g.materia=m.materia and g.periodo= '$periodo' ";
	$res_grupos = ejecuta_consulta($qry_grupos);
	$grupo=null;
	while ($fila = $res_grupos->fetch_assoc()) {
		$grupo   = $fila['grupo'];
		$materia = $fila['materia'];
		$nombre_completo_materia = $fila['nombre_completo_materia'];
		$alumnos_inscritos 		 = $fila['alumnos_inscritos'];
    }
	if($grupo== null)
		$tabla_grupos_docente = "<h5 align='center'> No tiene grupos de tutoria registrados en este periodo. </h5>";
	else
	{
		$tabla_grupos_docente = "	<table align='center'>";
		$tabla_grupos_docente .= "		<tr align='center'>";
    	$ancho = "width='300'";	
		$tabla_grupos_docente .= "			<th ".$ancho."> Materia </th>";
		$tabla_grupos_docente .= "			<th> Grupo </th>";
		$tabla_grupos_docente .= "			<th> Alumnos <br> Inscritos </th>";
		$tabla_grupos_docente .= "			<th> Opciones </th>";
		$tabla_grupos_docente .= "		</tr>";
		$non = false;
		$id = ($non)?"par":"non";
		$tabla_grupos_docente .= "	<tr id='".$id."'>";
		$tabla_grupos_docente .= "<td> <b>  </b> <br> ".$nombre_completo_materia."  </td>";
		$tabla_grupos_docente .= "		<td align='center'> ".$grupo." </td>"; 
		$tabla_grupos_docente .= "		<td align='center'> ".$alumnos_inscritos." </td>";
		$tabla_grupos_docente .= "		<td align='center'>"; 
		$tabla_grupos_docente .= "		<img src='img/lista.gif' onclick='abrir_documentopdf(\"lista_extra_grupo.pdf.php\", \" \", \"".$periodo."\", \"".$materia."\", \"".$grupo."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "		<img src='img/listado.png' widht=32 height=32  onclick='abrir_documento(\"lista_extra_detalle.php\", \" \", \"".$periodo."\", \"".$usuario."\", \"".$grupo."\", \"enviar_lista\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "		</td>";
		$tabla_grupos_docente .= "	</tr>";
		$non = ($non)?false:true;
		$tabla_grupos_docente .= "	</table>";
		echo $tabla_grupos_docente;
	}	 ?>

<form name="enviar_lista" method="post" action="<? echo $_SERVER['PHP_SELF'];?>?listado=yes">
	<input name="materia1" type="hidden" value="<? echo $res_grupos->fields("materia"); ?>" />
	<input name="grupo1" type="hidden" value="<? echo $res_grupos->fields("grupo");?>" />
</form>

<?php echo $tabla_grupos_docente;?>
<div align="center">
	<br>
	<input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'"> 
</div>
<?php
}
?>
</div>

