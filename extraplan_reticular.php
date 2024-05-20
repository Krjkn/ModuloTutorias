<?php
session_start();
if (!isset($_SESSION['usuario'])){	
	?><script type="text/javascript">window.top.location = "index.html"</script><?php }
else $user = $_SESSION["usuario"];
if(isset($_GET['no_de_control']))
{
	$no_de_control = trim($_GET['no_de_control']);
	$periodo = $_GET['periodo'];
	$dad454d1as5d45ad = $_GET['dad454d1as5d45ad'];
	$tipo_sele = $_GET['tipo_sele'];
}
	$no_de_control = trim($_REQUEST['no_de_control']);
	$periodo = $_REQUEST['periodo'];
	$dad454d1as5d45ad = $REQUEST['dad454d1as5d45ad'];
	$tipo_sele = $_REQUEST['tipo_sele'];

require_once("../../../../includes/config.inc.php");
require_once($CFG->funciones_phpDir."/funciones_tablas_alumnos.php");
seguridad('');

if($_SESSION['stipo'] == "DEP"){ 
	seguridad('DEP');
}
if($_SESSION['stipo'] == "ESC"){
	seguridad('ESC');
}
if($_SESSION['stipo'] == "ALU"){
	seguridad('ALU');
}

 $web->SeguridadAlumno($_SESSION['susr'],$_SESSION['stipo'],9);
//$web->SeguridadAlumno('quiroz','DEP',9);

$usuario = $_SESSION["susr"];
//$usuario = 'quiroz';
if($dad454d1as5d45ad!='hfkhmvxzfsa58674213dsafertfsadfas')
	echo "<script type='text/javascript'> document.location = '".$CFG->rootDirServ."/".$_SESSION["pagina_inicio"]."bienvenida.php'< /script>";
	
$qry_creditos = "exec pac_cargas_carrera '$no_de_control', '$periodo'";
$res_creditos = ejecutar_sql($qry_creditos);
$carga_minima = $res_creditos->fields('carga_minima');
$carga_maxima = $res_creditos->fields('carga_maxima');
$autorizacion_min = ($res_creditos->fields('autorizacion_min')==1)?1:0;
$autorizacion_max = ($res_creditos->fields('autorizacion_max')==1)?1:0;

$qry_creditos = "exec pac_creditos_seleccion '$no_de_control', '$periodo'";
$res_creditos = ejecutar_sql($qry_creditos);
$creditos = $res_creditos->fields('creditos');
$carga_autorizada = $creditos; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<?php

$qry_carrera_reticula="select carrera,reticula from alumnos where no_de_control='$no_de_control'";
$res_carrera_reticula=ejecutar_sql($qry_carrera_reticula);
$carrera=$res_carrera_reticula->fields('carrera');
$reticula=$res_carrera_reticula->fields('reticula');
	
$qry_materias = "exec pac_materiascarrera '$carrera','$reticula'";
$res_materias = ejecutar_sql($qry_materias);
while (!$res_materias->EOF)
{
	$campo_materias .= "<option value='".$res_materias->fields("materia")."'> ".$res_materias->fields("materia")." / ".$res_materias->fields("nombre_abreviado_materia")."</option>";
	$res_materias->movenext();
		
} 

$pasa=false;

if(isset($materia) && $materia!='0'){
	$pasa=true;
}

if(!isset($materia)){
	$materia = "0";	
	$pasa=true;
}

echo "<script>";
echo "// $materia $motivo $tipo_autorizacion";
echo "</script>";


		
if(!empty($motivo) && !empty($tipo_autorizacion) && $pasa == true){

$qry_registrar_autorizacion = "exec pap_registra_autorizacion '$periodo','$no_de_control','$materia', '$motivo', '$tipo_autorizacion', '$usuario'"; 
$res_registrar_autorizacion = ejecutar_sql($qry_registrar_autorizacion);
$msgx = $res_registrar_autorizacion->fields("msg");

if(!empty($msgx)){ 
$c1x='\'';   
$m2x=$c1x.$msgx.$c1x;	
}else{
	$m2x="'Caso Autorizado'";
}
 
  
?>
<script language="javascript" type="text/javascript">
	var mens= <?php  echo $m2x; ?>;
  window.alert(mens) ;
  //javascript:history.back();
</script>
  <?php
}

?>

<script type="text/javascript">

function registra_materia(materia, tipocur)
{
	if(tipocur == 'CR')
		repeticion = 'S'
	else
		if(tipocur == 'AE')
			repeticion = "E"
		else
			repeticion = 'N'
	
	document.materias.materia.value = materia
	document.materias.repeticion.value = repeticion
	document.materias.submit()
}

function valida_cargas()
{
	var tipo_seleccion = document.fcreditos.tipo_sele.value
	var creditos_seleccionados = document.fcreditos.creditos.value*1
	var carga_min = document.fcreditos.carga_minima.value*1
	var carga_max = document.fcreditos.carga_maxima.value*1
	var auto_min  = document.fcreditos.autorizacion_min.value*1
	var auto_max  = document.fcreditos.autorizacion_max.value*1
	var creditos_faltantes = document.fcreditos.creditos_faltantes.value*1
	var creditos_autorizados = document.fcreditos.carga_autorizada.value*1
	var semestre = document.fcreditos.semestre_alu.value*1
	var ok = 1
	
	if(tipo_seleccion != 'V')
	{	
		if(semestre <= 9 || (semestre >= 9 && (creditos_faltantes > carga_min)))
		{
			if(creditos_seleccionados > carga_max && !auto_max)
			{
				ok = 0
				alert("Los creditos maximos de seleccion son "+carga_max+".\nEn caso de necesitar autorizacion, contactar a su coordinador.")
			}else
			if(creditos_seleccionados > creditos_autorizados)
			{
				ok = 0
				alert("Los creditos autorizados de seleccion son "+creditos_autorizados+".\n.")
			}
		}
	}
	
	if(ok)
		document.horario.submit()
}

<?php
// $_SESSION['stipo'] == "DEP"
if($_SESSION['stipo'] == "DEP"){ 
?>
function agregar_quitar_fila()
{
	formulario = document.autoriza;
	
	if(formulario.tipo_autorizacion.value == "CX" || formulario.tipo_autorizacion.value == "MP" )
	{
		if(formulario.tipo_anterior.value == 'CM' || formulario.tipo_anterior.value == 'SC' || formulario.tipo_anterior.value == 'SS')
		{
			var x=document.getElementById('datos').insertRow(1)
			var y=x.insertCell(0)
			y.colSpan='2'
			y.innerHTML="<table width=100%'> <th align='left' width='168'> Materia: </th><td id='non'><select name='materia'> <option value='0' selected='selected'> -- Seleccione la materia -- </option> <?php echo $campo_materias; ?></select></td> </table>"
		}	
	}	
	else
	{
		if(formulario.tipo_anterior.value == 'CX' || formulario.tipo_anterior.value == 'MP')
			var x = document.getElementById('datos').deleteRow(1)	
	}	
	formulario.tipo_anterior.value = formulario.tipo_autorizacion.value;
}

function mostrar_campos()
{
	formulario = document.autoriza;
	var mostrar_materia = document.getElementById("materias");
	var fila = document.getElementById("mat");
	if(formulario.tipo_autorizacion.value == "CX" || formulario.tipo_autorizacion.value == "MP")
	{
		mostrar_materia.style.visibility = "visible";
	}	
	else
	{
		mostrar_materia.style.visibility = "hidden";
	}	
}
<?php
}
?>




</script>
<script type="text/javascript" src="<?php echo $CFG->funciones_jsDir; ?>/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->cssDir; ?>/tec_estilo.css" />
<title>SII :: Seleci&oacute;n de Materias</title>
</head>

<body>
<?php
	//$regresar = "javascript: document.location = '".$CFG->rootDirServ."/".$_SESSION["pagina_inicio"]."bienvenida.php'";
	switch($_SESSION['stipo'])
	{
		case 'ALU': $regresar = "javascript: document.location = '".$CFG->rootDirServ."/".$_SESSION["pagina_inicio"]."bienvenida.php'"; break;
		case 'DEP': $regresar = "javascript: document.location = '".$CFG->rootDirServ."/".$_SESSION["pagina_inicio"]."inscripciones/inscripciones.php'"; break;
		case 'ESC': $regresar = "javascript: document.location = '".$CFG->rootDirServ."/".$_SESSION["pagina_inicio"]."alumnos/inscripciones.php'"; break;
	}
	
	$no_de_control = trim($no_de_control);
	encabezado_datos_alumno($no_de_control, $periodo);
	
	$qry_sel_especialidad = "select semestre, carrera, reticula, especialidad from alumnos where no_de_control = '$no_de_control'";
	$res_sel_especialidad = ejecutar_sql($qry_sel_especialidad);
	
	$semestre = $res_sel_especialidad->fields('semestre');
	$especialidad = $res_sel_especialidad->fields('especialidad');
	$semestre_alu = $res_sel_especialidad->fields('semestre');
	
	$qry_totales = "exec pac_calcula_totales_alumno '$no_de_control'";
	$res_totales = ejecutar_sql($qry_totales);
	$creditos_totales_carrera = $res_totales->fields('creditos_totales');
	$creditos_aprobados = $res_totales->fields('creditos_aprobados');
	$creditos_residencia = 20;
	$creditos_faltantes = $creditos_totales_carrera*1 - $creditos_aprobados*1 - $creditos_residencia;
	
	if(($semestre >= 6) && (empty($especialidad) || $especialidad == '') && $tipo_sele != 'V')
	{?>
		<form name="especialidad" method="post" target="_blank">
			<input type="hidden" name="no_de_control" value="<?php echo $no_de_control; ?>" />
			<input type="hidden" name="carrera" value="<?php echo $res_sel_especialidad->fields('carrera'); ?>" />
			<input type="hidden" name="reticula" value="<?php echo $res_sel_especialidad->fields('reticula'); ?>" />
			<input type="hidden" name="periodo" value="<?php echo $periodo; ?>" />
			<input type="hidden" name="dad454d1as5d45ad" value="<?php echo $dad454d1as5d45ad; ?>" />
			<input type="hidden" name="tipo_sele" value="<?php echo $tipo_sele; ?>" />
		</form>
		<script type="text/javascript"> enviar("seleccion_especialidad.php", "especialidad") </script> <?php
	}
	
	if($_SESSION['stipo'] != 'ALU')
	{
		$qry_hay_movimientos = "select count(*) as movimientos from seleccion_materias_log where no_de_control = '$no_de_control' and periodo = '$periodo' and usuario != '$no_de_control'";
		$res_hay_movimientos = ejecutar_sql($qry_hay_movimientos);
		$movimientos = $res_hay_movimientos->fields('movimientos');
		if($movimientos)
		{?>
			<script type="text/javascript">
				function muestra_movimientos()
				{
					consulta = "<?php
												$tama = 100;
												$qry_movimientos = "exec pac_modificaciones_materias '$no_de_control', '$periodo'";
												$res_movimientos = ejecutar_sql($qry_movimientos);
												
												if($res_movimientos->recordcount())
												{
													echo "<br><h2 align='center' style='font: bold small-caps 14px verdana; color:#FF6600'> Movimientos Realizados En El Horario Del Alumno </h2>";
													
													echo "<table align='center' width='80%' border='1' bordercolor='darkblue'>";
													echo "	<tr align='center' style='font: bold small-caps 12px verdana; color:#003366'> <th> Materia </th> <th> Grupo </th> <th> Usuario </th> <th> Fecha de modificaciï¿½ </th> <th> Operaciï¿½ </th> </tr>";
													while($mov = $res_movimientos->fetchrow())
													{
														echo "<tr style='font: small-caps 12px verdana; color:#003366'> <td> <b>".$mov['materia']."</b> ".$mov['nombre_materia']." </td> <td align='center'> ".$mov['grupo']." </td> <td> ".$mov['usuario']." </td> <td align='center'> ".$mov['fecha']." ".$mov['hora']." </td> <td> ".$mov['tipo_operacion']." </td> </tr>";
														$tama+=10;
													}
													echo "</table>";
												}
											?>"
					var p=window.createPopup()
					var pbody=p.document.body
					
					pbody.style.backgroundColor="#EEEEEE"
					pbody.style.border="solid darkblue 2px"
				
					pbody.innerHTML = consulta;
				
					p.show(200, 150, 800, <?php echo $tama; ?>, document.body)
				}
			</script>
			<h5 align="center"> Se han hecho movimientos al horario del alumno </h5>
			<div align="center"> <input type="button" class="boton" value="Mostrar Movimientos" onclick="javascript: muestra_movimientos()" /> </div>
			<?php
		}
	}
	?>
	<br />
    <!--<table align="center">
    <tr><td width="425"><marquee bgcolor="#FF6600" behavior="slide"><font color="#000000" style="font-weight:bold">CARGA MAXIMA PARA EL ALUMNO : 44 Creditos</font></marquee></td></tr>
    </table>-->
    <br />
	<table align="center" width="50%">
    <tr><th width="31%">Creditos Permitidos</th>
    <td width="69%" align="center" id="par"><? echo $carga_autorizada;?></td>
    </tr>
    </table>
	<?php reticula_alumno($no_de_control, $periodo, 'seleccion'); ?>    
    
	<form name="materias" action="grupos_x_periodo.php" method="post" target="_self">
		<input type="hidden" name="no_de_control" value="<?php echo $no_de_control; ?>" />
		<input type="hidden" name="periodo" value="<?php echo $periodo; ?>" />
		<input type="hidden" name="materia" value="" />
		<input type="hidden" name="repeticion" value="" />
		<input type="hidden" name="dad454d1as5d45ad" value="<?php echo $dad454d1as5d45ad; ?>" />
		<input type="hidden" name="tipo_sele" value="<?php echo $tipo_sele; ?>" />
	</form>
	<?php
	if($_SESSION['stipo'] == "ALU" && $tipo_sele != 'V')
	{ ?>
	<br />
	<table width="650" align="center" cellspacing="15">
    <tr>
      <td width="400">
				<div align="justify">
					Para ponerte en contacto con tu coordinador por cualquier
					problema relacionado con la selección de materias, presiona
					el botón de la derecha. El sistema te asignaría una 
					cita para revisar tu caso.
				</div>
			</td>
      <td align="center">
				<br />
				<form name="problemas" action="seleccion_problema.php" method="post" target="_self">
        	<input type="hidden" name="no_de_control" value="<?php echo $no_de_control; ?>" />
					<input type="hidden" name="periodo" value="<?php echo $periodo; ?>" />
					<input type="hidden" name="dad454d1as5d45ad" value="<?php echo $dad454d1as5d45ad; ?>" />
					<input type="hidden" name="tipo_sele" value="<?php echo $tipo_sele; ?>" />
					<input type="button" class="boton" value="<?php echo "&iquest; Problemas con\nla Selecci&oacute;n ?"; ?>" onclick="document.problemas.submit()">
				</form>
      </td>
    </tr>
  </table>
  
  
  <?php
	}
  	////////////////////////////////////
	
	if($_SESSION['stipo'] == "DEP"){ 
	
	$qry_datos_alumno = "exec pac_datosalumno '$no_de_control'";	
	$res_datos_alumno = ejecutar_sql($qry_datos_alumno);
	
	?>
	
	<h2 align="center"> Autorizaciones Acad&eacute;micas </h2>
<form name="autoriza" method="post" action="plan_reticular.php">
	<input name="no_de_control" type="hidden" value="<?php echo $no_de_control; ?>">
	<table align="center" width="40%">
		<tr> 
			<th align="left" width="170"> Se autoriza a: </th>
			<td id="non"> &nbsp;<?php echo $res_datos_alumno->fields("apellido_paterno")." ".$res_datos_alumno->fields("apellido_materno")." ".$res_datos_alumno->fields("nombre_alumno"); ?>  </td>				<br>
		</tr>
		<tr>	
			<th align="left"> En el Periodo: </th>
			<td id="non"> &nbsp;<?php echo fperiodos_INPUT($periodo); ?> </td>
		</tr>	
	</table>
	<br>
	<input name="tipo_anterior" type="hidden" value="CM">
	<table align="center" width="40%" id="datos">
		<tr>
			<th align="left" width="170"> Tipo de Autorizaciï¿½ </th>
			<td id="non">
				<select name="tipo_autorizacion" onChange="agregar_quitar_fila();"> 
		          <option value="CM"> Carga M&iacute;nima </option>
        		  <option value="CX"> Cruce de Materias </option>
		          <option value="MP"> Cursar Materia Requisitada </option>
					<option value="SC"> Sobrecarga </option>
					<option value="SS"> M&aacute;s de 12 semestres </option>
        </select>  
			</td>
		</tr>
		<tr>
			<th align="left"> Motivo de autorizaci&oacute;n: </th>
			<td id="non"> <input name="motivo" type="text" size="55" maxlength="100"> </td>
		</tr>
	</table>
    <input type="hidden" name="dad454d1as5d45ad" value="<?php echo $dad454d1as5d45ad; ?>" />
	<br>
	<div align="center">
		<input type="submit" name="autorizar" value="Autorizar" class="boton"> 
		&nbsp; &nbsp;
		<input type="button" name="regresar" value="Regresar" class="boton" onClick="<?php echo $regresar; ?>">
	</div>
</form>
<br>

<?php
	$qry_autoriza_previas = "exec pac_autorizacionesalumno '$periodo','$no_de_control'";
	$res_autoriza_previas = ejecutar_sql($qry_autoriza_previas);
	if(!$res_autoriza_previas->rowcount())
	{
		echo "<h4 align='center'> No tiene autorizaciones previas </h4>";
	}
	else
	{?>
	<h4 align="center">Autorizaciones Previas para este Alumno</h4>
	<table width="85%" align="center">
		<tr> 
			<th width="15%">Fecha</th>
			<th width="20%">Autorizaci&oacute;n</th>
			<th width="25%">Materia</th>
			<th width="25%">Persona que autorizï¿½/th>
		</tr>	
	<?php
		$non = true;
		while(!$res_autoriza_previas->EOF)
		{
			$id = ($non)?"non":"par";
			$non = ($non)?false:true;
			$tipo_autorizacion = $res_autoriza_previas->fields("tipo_autorizacion");
			switch ($tipo_autorizacion) 
		  {
		    case 'CM': $txt = 'Carga Mï¿½ima'; break;
		    case 'CX': $txt = 'Cruce de Materias'; break;
		    case 'MP': $txt = 'Cursar Materia Requisitada'; break;
				case 'SC': $txt = 'Sobrecarga'; break;
				case 'SS': $txt = 'Mas de 12 semestres'; break;
		  }
	    echo "<tr id='$id'>
							<td align='left'>".$res_autoriza_previas->fields("fecha_hora_autoriza")."</td>
							<td align='center'>".$txt."</td>";
			if($res_autoriza_previas->fields("nombre_materia")=='0')
				echo "<td align='center'> &nbsp; </td>";
			else
	    	echo "<td align='center'>".$res_autoriza_previas->fields("nombre_materia")."</td>";
			echo "	<td align='center'>".$res_autoriza_previas->fields("nombre_usuario")."</td>
						</tr>";
			$res_autoriza_previas->movenext();
		}//fin while
	}// fin else
	?>
	</table>
<?php
	} //if($_SESSION['stipo'] == "DEP"){ 
	
	///////////////////////////////////
  

	$qry_cargas_carrera = "exec pac_cargas_carrera '$no_de_control', '$periodo'";
	$res_cargas_carrera = ejecutar_sql($qry_cargas_carrera);
	$carga_minima = $res_cargas_carrera->fields('carga_minima');
	$carga_maxima = $res_cargas_carrera->fields('carga_maxima');
	$autorizacion_min = ($res_cargas_carrera->fields('autorizacion_min')==1)?1:0;
	$autorizacion_max = ($res_cargas_carrera->fields('autorizacion_max')==1)?1:0;
	
	$qry_creditos = "exec pac_creditos_seleccion '$no_de_control', '$periodo'";
	$res_creditos = ejecutar_sql($qry_creditos);
	$creditos = $res_creditos->fields('creditos');
	
	?>
	<form name="fcreditos">
		<input type="hidden" name="creditos" value="<?php echo $creditos; ?>" />
        <input type="hidden" name="carga_autorizada" value="<?php echo $creditos; ?>" />
		<input type="hidden" name="carga_minima" value="<?php echo $carga_minima ?>" />
		<input type="hidden" name="carga_maxima" value="<?php echo $carga_maxima ?>" />
		<input type="hidden" name="autorizacion_min" value="<?php echo $autorizacion_min ?>" />
		<input type="hidden" name="autorizacion_max" value="<?php echo $autorizacion_max ?>" />
		<input type="hidden" name="creditos_faltantes" value="<?php echo $creditos_faltantes; ?>" />
		<input type="hidden" name="semestre_alu" value="<?php echo $semestre_alu; ?>" />
		<input type="hidden" name="dad454d1as5d45ad" value="<?php echo $dad454d1as5d45ad; ?>" />
		<input type="hidden" name="tipo_sele" value="<?php echo $tipo_sele; ?>" />
	</form>
	<br />
	<?php horario_alumno($no_de_control, $periodo, "seleccion"); ?>
	<br />
	<form name="horario" action="registra_horario_alumno.php" method="post" target="_self">
		<input type="hidden" name="no_de_control" value="<?php echo $no_de_control; ?>" />
		<input type="hidden" name="periodo" value="<?php echo $periodo; ?>" />
		<input type="hidden" name="dad454d1as5d45ad" value="<?php echo $dad454d1as5d45ad; ?>" />
		<input type="hidden" name="tipo_sele" value="<?php echo $tipo_sele; ?>" />
		<div align="center">
        <?php
		
		
		$qry_plan_alumno = "select plan_de_estudios from alumnos where no_de_control = '$no_de_control'";
		$res_plan_alumno = ejecutar_sql($qry_plan_alumno);
		$plan_alumno = $res_plan_alumno->fields('plan_de_estudios');

		$disabled = "";
		if($plan_alumno > 2){
		
			$qry_adeudo_especiales = "exec pac_verifica_especial '$no_de_control','$periodo'";
			$res_adeudo_especiales = ejecutar_sql($qry_adeudo_especiales);
			//$seleccionadas_especiales = $res_adeudo_especiales->fields('seleccionadas');
			$pendientes_especiales = $res_adeudo_especiales->fields('pendientes');
			$ofertados_especiales = $res_adeudo_especiales->fields('ofertados');
			$disabled = "";
			
			if($pendientes_especiales > 0){
				if($ofertados_especiales == 0)
					$disabled = "";
				else{
					$disabled = " disabled";
					?>
                    
                    <table width="75%" align="center">
                    	<tr>
                        	<th> Error en Curso Especial </th>
                        </tr>
                        <tr>
                        	<td id="non" align="center"> No has elegido las materias de mayor prioridad (Cursos Especiales). </td>
                        </tr>
                    </table>
                    <br />
                    <?php
				}
			}
			
			if(empty($disabled)){
				$qry_consulta_globales = "exec pac_consulta_globales '$no_de_control','$periodo'";
				$res_consulta_globales = ejecutar_sql($qry_consulta_globales);
				$cantidad_globales = $res_consulta_globales->fields('cantidad');
				
				$disabled = "";
				if($cantidad_globales>2){
					$disabled = " disabled";
					?>
                    
                    <table width="75%" align="center">
                    	<tr>
                        	<th> Error en Globales </th>
                        </tr>
                        <tr>
                        	<td id="non" align="center"> Excedes de la cantidad m&aacute;xima de Cursos Globales </td>
                        </tr>
                    </table>
                    <br />
                    <?php
				}
				
			}
			
		}
		?>  <?php if($_SESSION['stipo'] != "ALU"){ ?>
			<input type="button" class="boton" value="Registrar Horario y Terminar" onClick="valida_cargas()" <?php echo $disabled; ?>>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }?>
			<input type="button" class="boton" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cerrar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="<?php echo $regresar; ?>">
		</div>
	</form>
</body>
</html>
