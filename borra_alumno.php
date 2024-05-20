<?php 
include "encabezado.php";
$periodo  = $_GET['periodo'];
$materia  = $_GET['materia'];
$grupo    = $_GET['grupo'];
$maestro  = $_GET['maestro'];
$viernes  = $_GET['viernes'];
$nmateria = $_GET['nmateria'];
$carrera = $_GET['carrera'];
$user = $_SESSION["usuario"];
$regresar = "javascript: document.location = 'pasades.php'";
?>
<script type="text/javascript">
function abrir_documento(pagina, vtipo, vperiodo, vmateria, vgrupo,vmaestro,vviernes,vnmateria,vcarrera,vno_control)
{
	formulario = document.enviar_docto;
	formulario.action = pagina;
	formulario.tipo.value = vtipo;
	formulario.periodo.value = vperiodo;
	formulario.materia.value = vmateria;
	formulario.grupo.value = vgrupo;
	formulario.maestro.value = vmaestro;
	formulario.viernes.value = vviernes;
	formulario.nmateria.value = vnmateria;
	formulario.carrera.value = vcarrera;
	formulario.no_control.value = vno_control;
	formulario.submit();
}
</script>
<body>
<div id="mainFrame">
<form name="enviar_docto" method="get">
	<input name="tipo" type="hidden" />
	<input name="periodo" type="hidden" />
	<input name="materia" type="hidden" />
	<input name="grupo" type="hidden" />
	<input name="maestro" type="hidden" />
	<input name="viernes" type="hidden" />
	<input name="nmateria" type="hidden" />
	<input name="carrera" type="hidden" />
	<input name="no_control" type="hidden" />
</form>
<h3 align="center"> <?php echo $nmateria; ?> </h3>
<h3 align="center"> <?php echo $maestro; ?> </h3>
<h3 align="center"> <?php echo $grupo.'    '.$periodo.'   '.$carrera.' '.$materia; ?> </h3>
<?php
    $qry_grupo="select C.siglas,A.no_de_control,CONCAT(apellido_paterno,' ',A.apellido_materno,' ',A.nombre_alumno) as nombre".
               " from alumnos A,seleccion_materias SM,carreras C where A.no_de_control = SM.no_de_control".
	       " and trim(SM.materia) = '".trim($materia)."'  and  trim(SM.periodo)= '".trim($periodo)."' ".
	       " and trim(SM.grupo) = '".trim($grupo)."' and C.carrera = A.carrera and C.reticula = A.reticula ".
	       " order by nombre";
		 
  	$res_grupos = ejecuta_consulta($qry_grupo);
    $tabla_grupo  = "<table align='center'>";
    $tabla_grupo .= "	<tr align='center'>";
    $tabla_grupo .= "		<th> Numero de Control </th>";
    $tabla_grupo .= "		<th> Nombre del Alumno </th>";
    $tabla_grupo .= "		<th> Carrera </th>";
    $tabla_grupo .= "		<th> Borrar </th>";
    $tabla_grupo .= "	</tr>";
    $non = false;
   while ($fila = $res_grupos->fetch_assoc())
	{	  	
		$no_de_control = $fila['no_de_control'];
		$nombre  	   = $fila['nombre'];
		$siglas  	   = $fila['siglas'];
		$id = ($non)?"par":"non";
		$tabla_grupo .= "<tr id='".$id."'>";
		$tabla_grupo .= "<td> <b>  </b> <br> ".$no_de_control."  </td>";
		$tabla_grupo .= "<td align='left'> ".$nombre." </td>"; 
		$tabla_grupo .= "<td align='center'> ".$siglas." </td>"; 
		$tabla_grupo .= "<td align='center'>"; 
		$tabla_grupo .= "<a><img src='img/lista.gif' onclick='abrir_documento(\"borra_alumnobd.php\", \" \", \"".$periodo."\", \"".$materia."\", \"".$grupo."\", \"".$maestro."\", \"".$viernes."\", \"".$nmateria."\", \"".$carrera."\", \"".$no_de_control."\")' alt='Lista de Asistencia' style='cursor:pointer'/></a>";
		$tabla_grupo .= "</td>";
		$tabla_grupo .= "</tr>";
		$non = ($non)?false:true;
		
	}
	$tabla_grupo .= "	</table>";
?>
<br />
<?php echo $tabla_grupo; ?>
<br/>
<div align="center">
<input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
</div>
</body>