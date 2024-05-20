<?php 
include "docencabezado.php";
$rfc = $usuario;
?>
<script type="text/javascript">
function abrir_documento(pagina, vperiodo, vmateria,vperi)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	formulario.target = '_blank';
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.peri.value = vperi;
	formulario.submit();
}
</script>

<form name="enviar_docto" method="get" target="_blank">
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="peri" type="hidden" />
</form>
<form method="get" action="constacias.php">
<table align="center">
    	<tr>
        	<th> Periodo: </th>
            <td id="non"> <select name="periodo"> <?php echo nperiodo($periodo); ?> </select> </td>			<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
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

$qry_reporte = "select 	* from reportes as r where rfc ='$rfc' and periodo = '$periodo'";
$res_reporte = ejecuta_consultaf($qry_reporte);
$no = 0;
while ($fila = $res_reporte->fetch_assoc()) {
	$diagnostico = $fila['diagnostico'];
	$reporte1 	 = $fila['reporte1'];
	$reporte2	 = $fila['reporte2'];
	$no = 1;
}
$resultado = "Hola  ";
if ($periodo <> '230191'){
	$no = 1;$diagnostico =1;$reporte1=1;$reporte2=1;
}
if ($no == 0)	{
	$resultado  = "No a entregado ningun reporte";
}else{
	if ($diagnostico == 0){
		$resultado = $resultado.", No a entregado diagnostico inicial";
	}
	if ($reporte1 == 0){
		$resultado = $resultado.", No a entregado primer reporte";
	}
	if ($reporte2 == 0){
		$resultado = $resultado.", No a entregado segundo reporte";
	}
}
if ($resultado == "Hola  "){
	$qry_grupos="select a.no_de_control,CONCAT(apellido_paterno, ' ',apellido_materno,' ', nombre_alumno) as alumno 
from grupos  g,personal p,alumnos a,seleccion_materias s
where  g.rfc='$rfc' and g.periodo = '$periodo' and g.rfc = p.rfc and a.no_de_control = s.no_de_control 
and s.materia = g.materia and s.periodo = g.periodo and s.grupo = g.grupo ";
	$res_grupos = ejecuta_consulta($qry_grupos);
    $tabla_grupos_docente  = "<div id='mainFrame'> <table align='center'>";
	$tabla_grupos_docente .= "	<tr align='center'>";
  	$tabla_grupos_docente .= "		<th> no_de_control </th>";
	$tabla_grupos_docente .= "		<th> Nombre Alumno </th>";
	$tabla_grupos_docente .= "		<th> Imprime constancia </th>";
	$tabla_grupos_docente .= "	</tr>";
	$non = false;
	while ($fila = $res_grupos->fetch_assoc()) 
	{
		$no_de_control      = $fila['no_de_control'];
		$alumno   			= $fila['alumno'];	
		$no = 0;
		if ($periodo == '20191'){
		$qry_alumnosi = "select * from evaluaprof as r where rfc ='$rfc' and periodo = '$periodo' and no_de_control = '$no_de_control'";
		$res_si = ejecuta_consultaf($qry_alumnosi);
		
		while ($fila = $res_si->fetch_assoc()) {
			$diag = $fila['no_de_control'];
			$no = 1;
		}
		}else{ $no=1;}
		$id = ($non)?"par":"non";
		$tabla_grupos_docente .= "<tr id='".$id."'>";
		$tabla_grupos_docente .= "<td>".$no_de_control."  </td>";
		$tabla_grupos_docente .= "<td align='center'> ".$alumno." </td>"; 
		$tabla_grupos_docente .= "<td align='center'>"; 
		if ($no == 1)
			$tabla_grupos_docente .= "<img src='img/lista.gif' onclick='abrir_documento(\"consta.php\", \"".$rfc." \",\"".$no_de_control." \",\"".$periodo."\")' alt='Lista de Asistencia' style='cursor:pointer'/>";
		else
			$tabla_grupos_docente .="No a Evaluado";
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
	<input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'"> 
</div>

<?php 
}else{
	echo "<div id='mainFrame'>  <center><h3>".$resultado."</h3></center>	</div> ";
}
}
?>