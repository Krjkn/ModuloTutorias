<?php
include "encabezado.php";
$user = $_SESSION["usuario"];
$regresar = "javascript: document.location = pasades.php";
 if(isset($_GET['periodo'])){
	$periodo = $_GET['periodo'];
	$materia = $_GET['materia'];
$user = $materia;
}
?>
<script type="text/javascript">
function abrir_documento(pagina,vperiodo, vno_control)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	formulario.periodo.value = vperiodo;
	formulario.no_control.value = vno_control;
	
	formulario.submit();
}
</script>
<body>
<div id="mainFrame">
<h3 align="center"> Grupo de Tutoria</h3> 
<h4 align="center"> 
	<i>Esta lista puede se seleccionada copiar y pegar en excel sin necesidad de trasnscribir la información</i><br/> 
	<i>Paso uno con el raton seleccionar la tabla con la información de sus alumnos</i><br/> 
	<i>Paso dos seleccionar las Teclas Ctrl y C</i><br/> 
	<i>Abrir una hoja de Excel y pegar la Tabla </i><br/> 
</h4>
<form name="enviar_docto" method="get" >
	<input name="periodo" type="hidden" />
	<input name="no_control" type="hidden" />
</form>
<h2 align="center">Alumnos de Tutorias del Periodo?</h2>
<form method="get" action="lista_extra_detalle.php">
	<table align="center">
    	<tr>
        	<th> Periodo: </th>
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
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Cancelar" class="boton" onclick="<?php echo $regresar; ?>" />
    </div>
</form>
<?php
if(!empty($periodo)){
?>
<table align="center" width="75%">
	<tr>
    <th align="center" width="5%"> No </th>
	<th align="center" width="25%"> Numero de Control </th>
    <th align="center" width="45%"> Nombre Alumno </th>
	</tr>
<?php
$qry_alumnos_grupo = "select a.no_de_control,CONCAT(apellido_paterno,' ',apellido_materno,' ',nombre_alumno) as nombre, oportunidad from alumnos a,seleccion_materias s,grupos g,personal p where a.no_de_control = s.no_de_control and s.materia = g.materia and s.grupo = g.grupo and s.periodo = g.periodo and g.periodo='$periodo' and p.rfc = g.rfc and g.rfc = '$user'";
$res_alumnos = ejecuta_consulta($qry_alumnos_grupo);
$id = "non";
$n = 1;
while($fila = $res_alumnos->fetch_assoc()){
	$no_de_control = $fila['no_de_control'];
	$nombre = $fila['nombre'];
    echo "<tr id='$id'> 
   	<td> $n </td>
   	<td> $no_de_control </td>
	<td> $nombre </td>
   </tr>";
	$n++;
	$id = ($id=="non")?"par":"non";
 }
}

?>
</div>
</body>

