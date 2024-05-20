
<?php 
include "encabezado.php";
if(isset($_GET['no_de_control'])){
$no_de_control = $_GET['no_de_control'];}
	else {$no_de_control = '';
}
?>
<script type="text/javascript">
function abrir_documento(pagina,vmateria,vperi)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	formulario.target = '_blank';
	formulario.materia.value = vmateria;
	formulario.peri.value = vperi;
	formulario.submit();
}
</script>
<div id="mainFrame">
<form name="enviar_docto" method="get" target="_blank">
	<input name="materia" type="hidden" />
	<input name="peri" type="hidden" />
</form>
<form method="get" action="imprimealu.php">
<table align="center">
    	<tr>
			<th> No de Control: </th>
			<td>
				<input name="no_de_control" type="text" value="<?php echo $no_de_control ?>" size="20" maxlength="20"/>
			</td>
		</tr>
    </table>
    <div align="center">
        <input type="submit" value="Procesar" class="boton" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasades.php'" />
	</div>
</form>

<?php
if(!empty($no_de_control)){

	$qry_alu = "select 	* from seleccion_materias  where no_de_control ='$no_de_control'";
	$res_alu = ejecuta_consultaf($qry_alu);
	$tabla_grupos_docente  = "<div id='mainFrame'> <table align='center'>";
	$tabla_grupos_docente .= "	<tr align='center'>";
  	$tabla_grupos_docente .= "		<th> No de Control </th>";
	$tabla_grupos_docente .= "		<th> Periodo </th>";
	$tabla_grupos_docente .= "		<th> Imprime constancia </th>";
	$tabla_grupos_docente .= "	</tr>";
	$non = false; $rfc ='cdas';
	while ($fila = $res_alu->fetch_assoc()) 
	{
		$no_de_control      = $fila['no_de_control'];
		$periodo   			= $fila['periodo'];	
	   	$id = ($non)?"par":"non";
		$tabla_grupos_docente .= "<tr id='".$id."'>";
		$tabla_grupos_docente .= "<td>".$no_de_control."  </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$periodo." </td>"; 
		$tabla_grupos_docente .= "<td align='center'>"; 
		$tabla_grupos_docente .= "<img src='img/lista.gif' onclick='abrir_documento(\"constafin.php\",\"".$no_de_control." \",\"".$periodo."\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		$tabla_grupos_docente .= "</td>";
		$tabla_grupos_docente .= "</tr>";
		$non = ($non)?false:true;
	}	
	$tabla_grupos_docente .= "	</table>";
	?>
<br/>
<?php echo $tabla_grupos_docente; 

?>
<br/>
<div align="center">
	<input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
</div>
<?php 


?>
</div>
<?php 
}

?>