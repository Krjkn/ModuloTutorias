<?php
include "docencabezado.php";

$regresar = "javascript: document.location = pasa.php";

?>
<div id="mainFrame">
<h3 align="center"> Grupo de Tutoria</h3> 
<h4 align="center"> 
	<i>Esta lista puede se seleccionada copiar y pegar en excel sin necesidad de trasnscribir la información</i><br/> 
	<i>Paso uno con el raton seleccionar la tabla con la información de sus alumnos</i><br/> 
	<i>Paso dos seleccionar las Teclas Ctrl y C</i><br/> 
	<i>Abrir una hoja de Excel y pegar la Tabla </i><br/> 
</h4>
<h2 align="center">Alumnos de tutorias</h2>
<table align="center" width="75%">
	<tr>
    <th align="center" width="5%"> No </th>
	<th align="center" width="25%"> Numero de Control </th>
    <th align="center" width="45%"> Nombre Alumno </th>
	</tr>

<?php

$qry_alumnos_grupo = "select a.no_de_control,CONCAT(apellido_paterno,' ',apellido_materno,' ',nombre_alumno) as nombre, oportunidad from alumnos a,seleccion_materias s,grupos g,personal p where a.no_de_control = s.no_de_control and s.materia = g.materia and s.grupo = g.grupo and s.periodo = g.periodo and g.periodo='$periodo' and p.rfc = g.rfc and g.rfc = '$usuario'";
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

?>
</div>

