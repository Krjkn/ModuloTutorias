<?php
//Librerias y funciones
require_once("../../../includes/config.inc.php");
require_once($CFG->funciones_phpDir."/funciones_tablas_grupos.php");
require_once($CFG->funciones_phpDir."/funciones_combos.php");
require_once($CFG->funciones_phpDir."/funciones_input.php");
session_start();
if (!isset($_SESSION['usuario'])){	
	?><script type="text/javascript">window.top.location = "index.html"</script><?php }
else $user = $_SESSION["usuario"];
if (!isset($materia_grupo )) $materia_grupo  = '';
if (!isset($materia )) $materia  = '';
if (!isset($exclusivo_carrera  )) $exclusivo_carrera   = '';
if (!isset($capacidad_grupo  )) $capacidad_grupo   = '';
if (!isset($grupo  )) $grupo   = '';
if (!isset($carrera_reticula  )) $carrera_reticula   = '';
function ffmaterias_INPUT($carrera, $reticula, $semestre, $materia, $periodo = NULL)
{
	//$conn = $GLOBALS['conn'];
	
	$qry_materias = "select semestre_reticula,  horas_teoricas + horas_practicas as horas, creditos_materia, ";
	$qry_materias.= "				M.materia, M.nivel_escolar, M.tipo_materia, M.clave_area, ";
	$qry_materias.= "				M.nombre_completo_materia, M.nombre_abreviado_materia ";
	$qry_materias.= "from extra_materias_carreras C, extra_materias M ";
	$qry_materias.= "where C.materia=M.materia and carrera = '$carrera' and reticula = $reticula ";
	$qry_materias.= "				and M.materia = '$materia' ";
	$qry_materias.= ($semestre != '99')?" and semestre_reticula = $semestre":"";
	$res_materias = ejecutar_sql($qry_materias);

	if(!$res_materias->rowcount())
		$input = "Materia Inv�ida";
	else
	{
		$horas = $res_materias->fields('horas');
		
		if(substr($periodo, 0, 4) == '2')
			$horas = $horas*3;
				
		$nombre = $res_materias->fields('nombre_abreviado_materia');
		$input.= $materia."&nbsp;\t".$nombre."&nbsp;===>&nbsp;".$horas."&nbsp;hrs/semana";
		$input.= "<input type='hidden' name='materia' value='".$materia."'>";
	}
	return $input;
}
?>	 
<html>
<head>
<script type="text/javascript">

var dias = new Array("lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo","lunes2", "martes2", "miercoles2", "jueves2", "viernes2", "sabado2", "domingo2")

function validarcapacidad(obj)
{
	capacidad = obj.value
	if(capacidad == 0 || capacidad == 00 || capacidad == null)
	{
		alert("Defina una capacidad valida")
		obj.focus()
		obj.select()
	}
} 

function enable()
{
  for(i=0; i<14; i++)
	{
		dia = dias[i]
		div_id = "div_" + dia
		x = document.getElementById(div_id)
		if(x.style.visibility == "visible")
		{
			eval("document.horas.hi_"+dia+".disabled = false")
			eval("document.horas.mi_"+dia+".disabled = false")
			eval("document.horas.hf_"+dia+".disabled = false")
			eval("document.horas.mf_"+dia+".disabled = false")
			eval("document.horas.aula_"+dia+".disabled = false")
			eval("document.horas.horario_"+dia+".disabled = false")
		}
	}
}

function disable()
{
  for(i=0; i<14; i++)
	{
		dia = dias[i]
		div_id = "div_" + dia
		x = document.getElementById(div_id)
		if(x.style.visibility == "visible")
		{
			eval("document.horas.hi_"+dia+".disabled = false")
			eval("document.horas.mi_"+dia+".disabled = false")
			eval("document.horas.hf_"+dia+".disabled = false")
			eval("document.horas.mf_"+dia+".disabled = false")
			eval("document.horas.aula_"+dia+".disabled = false")
			eval("document.horas.horario_"+dia+".disabled = false")
		}
	}
}

function verifica(accion)
{
	
	if(document.horas.materia.value == '0')
	{
		alert("Por favor seleccione materia."); 	
		document.horas.materia.focus(); 
 	  return;
	}

	if(document.horas.grupo.value == "")
	{
		alert("Por favor ingrese el nombre del grupo.");
		document.horas.grupo.focus(); 
    return;
	}
	
	if(document.horas.capacidad_grupo.value == "" )
	{
		alert("Por favor ingrese la capacidad del grupo.");
		document.horas.capacidad_grupo.focus(); 
		return;
	}

	/* Validaci� en la captura de horarios */
	var i
	var error_h = 0
	var dias_error = ""
	var error_a = 0
	var aulas_error = ""
	var visibles = 0
	var horas_x_semana_registradas = 0
	for(i=0; i<14; i++)
	{
		dia = dias[i]
		div_id = "div_" + dia
		visibilidad = document.getElementById(div_id).style.visibility
		if(visibilidad == 'visible')
		{
			visibles++
			campo = "horario_" + dia
			
			horasI = eval("document.horas.hi_" + dia + ".value")
			minutosI = eval("document.horas.mi_" + dia + ".value")
			hi = horasI + minutosI
			minutosTotI = (horasI*60) + (minutosI.substr(1,2)*1)
			
			horasF = eval("document.horas.hf_" + dia + ".value")
			minutosF = eval("document.horas.mf_" + dia + ".value")
			hf = horasF + minutosF
			minutosTotF = (horasF*60) + (minutosF.substr(1,2)*1)
			
			au = eval("document.horas.aula_" + dia + ".value")
			
			if(au == '0')
			{
				if(aulas_error.length == 0)
					aulas_error = aulas_error.concat('\n', " - ", dia, '\n')
				else
					aulas_error = aulas_error.concat(" - ", dia, '\n')
				error_a++
			}

			if(minutosTotI >= minutosTotF)
			{
				if(dias_error.length == 0)
					dias_error = dias_error.concat('\n', " - ", dia, '\n')
				else
					dias_error = dias_error.concat(" - ", dia, '\n')
				error_h++
			}
			else
			{
				difmin = minutosTotF - minutosTotI
				horas_x_semana_registradas = horas_x_semana_registradas + difmin
				horario = hi+"-"+hf+"/"+au
				eval("document.horas."+campo+".value='"+horario+"'")
				eval("document.horas.hi_"+dia+".disabled = true")
				eval("document.horas.mi_"+dia+".disabled = true")
				eval("document.horas.hf_"+dia+".disabled = true")
				eval("document.horas.mf_"+dia+".disabled = true")
				eval("document.horas.aula_"+dia+".disabled = true")
			}
		}
	}
	if(!visibles)
	{
		alert("Se tiene que definir al menos el horario de un d�.")
		return false;
	}
	if(error_h)
	{
		if(error_h == 1)
			cadena = "Verifique las horas del d�: "
		else
			cadena = "Verifique las horas de los dias: "
		alert(cadena + dias_error + "La hora Final debe ser mayor que la hora Inicial.")
		return false
	}
	else
	{
		dif_horas = Math.floor(horas_x_semana_registradas/60)
		dif_min = horas_x_semana_registradas%60
		
		horas_permitidas = document.horas.horas_x_semana.value
		horas_permitidasMINUTOS = horas_permitidas*60
		//horas_permitidasMINUTOS = horas_permitidas.substr(0, 2)*60 + horas_permitidas.substr(3, 2)*1
		
		if(horas_x_semana_registradas < horas_permitidasMINUTOS)
		{
			alert("Error:\nSe han capturado menos horas de las permitidas por semana por materia.")
			enable()
			return false
		}
		else if(horas_x_semana_registradas > horas_permitidasMINUTOS)
		{
			alert("Error:\nSe han capturado m� horas de las permitidas por semana por materia.")
			enable()
			return false
		}
	}
	if(error_a)
	{
		if(error_a == 1)
			cadena = "Seleccione el aula del d�: "
		else
			cadena = "Seleccione el aula de los dias: "
		alert(cadena + aulas_error)
		enable()
		return false
	}
	enviar("extra_manto_grupos_bd.php", "horas")
}

function muestra(name)
{
	div_id = "div_"+name
	x = document.getElementById(div_id)
	if(x.style.visibility == "hidden")
	{
		x.style.visibility = "visible"
		eval("document.horas.hi_"+name+".disabled = false")
		eval("document.horas.mi_"+name+".disabled = false")
		eval("document.horas.hf_"+name+".disabled = false")
		eval("document.horas.mf_"+name+".disabled = false")
		eval("document.horas.aula_"+name+".disabled = false")
		eval("document.horas.horario_"+name+".disabled = false")
	}
	else
	{
		x.style.visibility = "hidden"
		eval("document.horas.hi_"+name+".disabled = true")
		eval("document.horas.mi_"+name+".disabled = true")
		eval("document.horas.hf_"+name+".disabled = true")
		eval("document.horas.mf_"+name+".disabled = true")
		eval("document.horas.aula_"+name+".disabled = true")
		eval("document.horas.horario_"+name+".disabled = true")
	}
}

function aactualizar(materiagrupo)
{	materia = materiagrupo.substring(0, 4)
	grupo = materiagrupo.substring(8)
	if(confirm("Deseas modificar la materia "+materia+" grupo "+grupo+"?"))
	{
	document.horas.materia_grupo.value = materiagrupo
	enviar('extramanto_grupos.php', 'horas')
	}
}

function eeliminar(materiagrupo)
{
	materia = materiagrupo.substring(0, 4)
	grupo = materiagrupo.substring(8)
	if(confirm("Deseas eliminar la materia "+materia+" grupo "+grupo+"?"))
	{
		document.horas.materia_grupo.value = materiagrupo
		enviar('extra_manto_grupos_bd.php', 'horas')
	}
}
</script>
<script type="text/javascript" src="<?php echo $CFG->funciones_jsDir; ?>/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->cssDir; ?>/tec_estilo.css" />
<title>SII :: Horarios materia/grupo</title>
</head>
<body>
<?php
	$encabezado = '';
	$regresar   = "document.location = \"extragrupos.php?accion=$accion\"";
	$cancelar   = "javascript: document.cancell.submit()";
	$guion 		= strrpos($carrera_reticula, "_");
	$carrera 	= substr($carrera_reticula,0, $guion);
	$reticula   = substr($carrera_reticula, $guion+1);
	//echo "-".$materia_grupo;
	if($materia_grupo)
	{
		$guion   = strpos($materia_grupo, "_");
		$materia = substr($materia_grupo, 0, $guion);
		$grupo   = substr($materia_grupo, $guion+1);
	}
	//echo "--".$materia."/".$grupo;
	if($accion == 'nuevo')
	{
		$encabezado = "Asignacion de Horarios - Grupos";
		$aceptar_b = "Registrar Horario";
	}
	else if($accion == 'actualizar')
	{
		$encabezado = "Actualizacion de Horario - Grupo";
		$aceptar_b = "Actualizar Horario";
	}
	else if($accion == 'eliminar')
		$encabezado = "Eliminacion de Horario - Grupo";
?>
<h2 align="center"> <?php echo $encabezado; ?> </h2>
<form name="cancell" action="extramanto_grupos.php" method="post">
	
	<input type="hidden" name="accion" value="<?php echo $accion; ?>">
	<input type="hidden" name="periodo" value="<?php echo $periodo; ?>">
	<input type="hidden" name="semestre" value="<?php echo $semestre; ?>">
</form>
<form name="horas"  action="" method="post">
<input type="hidden" name="carrera_reticula" value="<?php echo $carrera_reticula; ?>">
	<input type="hidden" name="accion" value="<?php echo $accion; ?>">
	<input type="hidden" name="materia_grupo" value="<?php echo $materia_grupo; ?>">
	<table align="center">
		<tr align="left">
			<th width="30%"> Carrera/Ret&iacute;cula: </th>
			<td id="non">
				<?php echo fcarreras_reticulas_INPUT($carrera, $reticula,"carrera_reticula"); ?>
			</td>	
		</tr>
		<tr align="left">
			<th> Periodo: </th>
			<td id="par"> <?php echo fperiodos_INPUT($periodo); ?> </td>
		</tr>
		<tr align="left">
			<th> Semestre: </th> <td id="non"> <?php echo ($semestre==99)?"Todos":$semestre; ?> <input type="hidden" name="semestre" value="<?php echo $semestre; ?>" readonly> </td>
		</tr>
	</table>
	<br>
	<div align='center'>
		<input type='button' class='boton' value='Regresar' onClick='<?php echo $regresar; ?>'>
	</div>
	<br>
<?php
//echo "*".$accion;

if($accion == 'nuevo' || (($accion == 'actualizar' || $accion == 'actualiza') && $materia_grupo))
{
	if($materia_grupo)
	{
		echo $materia;
		$qry_horario = "select * from  pac_extrahorario('$materia', '$grupo', '$periodo')";
		$res_horario = ejecutar_sql($qry_horario);
		
		foreach($res_horario->fields as $k => $v)
		{
   		$var 	= $k;	// toma el nombre de la variable
			$$var = $v;	// le asigna el valor
		}
	}?>
	<fieldset>
		<legend align="center"> Captura De Horarios </legend>
			<table align="center" width="90%">
				<tr>
					<th> Materia </th>
					<?php
					if($accion != 'actualizar')
					{?>
						<td colspan="4"> <select name="materia" onChange="enviar('extramanto_grupos.php', 'horas')"> <?php echo fextramaterias($carrera, $reticula, $semestre, $materia, NULL, NULL, $periodo); ?> </select> </td>
					<?php
					}
					else
					{
						echo "<td colspan='4' id='par'>".ffmaterias_INPUT($carrera, $reticula, $semestre, $materia)."</td>";
					}
					$qry_horas_x_semana = "select horas_teoricas + horas_practicas as horas, creditos_materia ";
					$qry_horas_x_semana.= "from extra_materias_carreras C ";
					$qry_horas_x_semana.= "where materia = '".$materia."' ";
					$qry_horas_x_semana.= "and carrera = '$carrera' and reticula = $reticula";
					$res_horas_x_semana = ejecutar_sql($qry_horas_x_semana);
					$horas_x_semana = $res_horas_x_semana->fields('horas');
					
					if((substr($periodo, -1) == '2'))
						$horas_x_semana = $horas_x_semana*3;
					?>
					<input type="hidden" name="horas_x_semana" value="<?php echo $horas_x_semana; ?>">
					<input type="hidden" name="rfc" value="<?php echo $rfc; ?>">
				</tr>
				<tr>
					<th> Grupo </th>
					<?php
					if($accion == 'actualizar')
					{
						echo "<td width='300' id='non'>".$grupo." <input type='hidden' name='grupo' value='".$grupo."'></td>";
					}
					else
					{?>
						<td width="300"> <input type="text" name="grupo" size= "5" maxlength="3" onBlur="this.value=this.value.toUpperCase()" value="<?php echo $grupo; ?>"> </td>
					<?php
					}
					$checked = ($exclusivo_carrera != '' && $exclusivo_carrera!=NULL)?"checked":"";
					?>
					<th> Capacidad </th> <td> <input type="text" name="capacidad_grupo" size= "5" maxlength="2" onKeyPress="valida_entero(this)" onBlur="validarcapacidad(this)" value="<?php echo $capacidad_grupo; ?>">
					<input name="exclusivo_carrera" type="checkbox" checked <?php echo $checked; ?>> 
					Exclusivo carrera </td>
				</tr>
			</table>
			<br>
			<?php
			if($accion == 'actualizar')
			{
				$qry_es_paralelo = "select paralelo_de from extra_grupos where periodo = '$periodo' and materia = '$materia' and grupo = '$grupo'";
				$res_es_paralelo = ejecutar_sql($qry_es_paralelo);
				$es_paralelo = $res_es_paralelo->fields('paralelo_de');
			}
			if($materia != NULL && $materia != '0')
			{
			?>
			<table align="center" width="90%">
				<tr id="gris" class="small_negrita_center" style="font-variant:small-caps"> <td>
					Haga click sobre el d&iacute;a para capturar o eliminar el horario.
					<br>
					S&oacute;lo los horarios visibles son los que se registrar&aacute;n.
				</td> </tr>
			</table>
			<br>
			<?php
			$horario_lunes ='';
			$horario_martes ='';
			$horario_miercoles ='';
			$horario_jueves ='';
			$horario_viernes ='';
			$horario_sabado ='';
			$horario_domingo ='';
			$horario_lunes2 ='';
			$horario_martes2 ='';
			$horario_miercoles2 ='';
			$horario_jueves2 ='';
			$horario_viernes2 ='';
			$horario_sabado2 ='';
			$horario_domingo2 ='';
			//verificar dias de la semana
			$dias_semana = array(1=>"lunes", 2=>"martes", 3=>"miercoles", 4=>"jueves", 5=>"viernes", 6=>"sabado", 
7=>"domingo",8=>"lunes2", 9=>"martes2", 10=>"miercoles2", 11=>"jueves2", 12=>"viernes2", 13=>"sabado2", 14=>"domingo2");
			?>
			<table align="center" width="90%">
				<tr align="center">
					<th> Hora </th>
					<?php
						$mostrar="";
						for($i=1; $i<=7; $i++)
						{
							$dia = $dias_semana[$i];
							echo "<th> <input type='button' class='boton' value='".ucwords(substr($dia, 0, 3))."' name='".$dia."' onClick='muestra(this.name)'> </th>";
							$nombre = "horario_".$dia;
							$valor = $$nombre;
							if($valor!="" || $valor!=NULL)
							{
								$mostrar.= "muestra('".$dia."');";
								$hi	 = "hi_".$dia;
								$$hi = substr($valor, 0, 2);
								$mi  = "mi_".$dia;
								$$mi = substr($valor, 2, 3);
								$hf  = "hf_".$dia;
								$$hf = substr($valor, 6, 2);
								$mf  = "mf_".$dia;
								$$mf = substr($valor, 8, 3);
								$aula  = "aula_".$dia;
								$$aula = trim(substr($valor, 12));
							}
						}
					?>
				</tr>
				<tr align="center" id="non">
					<td> Inicial </td>
					<td rowspan="3"> <!-- LUNES -->
					<div style="visibility:hidden" id="div_lunes">
						<select name="hi_lunes" disabled="true"> <?php fhoras($hi_lunes); ?> </select> :
						<select name="mi_lunes" disabled="true"> <?php fmins($mi_lunes);  ?> </select>
						<br>
						<select name="hf_lunes" disabled="true"> <?php fhoras($hf_lunes); ?> </select> :
						<select name="mf_lunes" disabled="true"> <?php fmins($mf_lunes);  ?> </select>
						<br>
						<select name="aula_lunes" disabled="true"> <?php echo faulas($aula_lunes); ?> </select>
						<input type="hidden" name="horario_lunes" value="<?php echo $horario_lunes;  ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- MARTES -->
					<div style="visibility:hidden" id="div_martes">
						<select name="hi_martes" disabled="true"> <?php fhoras($hi_martes); ?> </select> :
						<select name="mi_martes" disabled="true"> <?php fmins($mi_martes);  ?> </select>
						<br>
						<select name="hf_martes" disabled="true"> <?php fhoras($hf_martes); ?> </select> :
						<select name="mf_martes" disabled="true"> <?php fmins($mf_martes);  ?> </select>
						<br>
						<select name="aula_martes" disabled="true">	<?php echo faulas($aula_martes); ?> </select>
						<input type="hidden" name="horario_martes" value="<?php echo $horario_martes;  ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- MIERCOLES -->
					<div style="visibility:hidden" id="div_miercoles">
						<select name="hi_miercoles" disabled="true"> <?php fhoras($hi_miercoles); ?> </select> :
						<select name="mi_miercoles" disabled="true"> <?php fmins($hf_miercoles);  ?> </select>
						<br>
						<select name="hf_miercoles" disabled="true"> <?php fhoras($hf_miercoles); ?> </select> :
						<select name="mf_miercoles" disabled="true"> <?php fmins($mf_miercoles);  ?> </select>
						<br>
						<select name="aula_miercoles" disabled="true">	<?php echo faulas($aula_miercoles); ?> </select>
						<input type="hidden" name="horario_miercoles" value="<?php echo $horario_miercoles;   ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- JUEVES -->
					<div style="visibility:hidden" id="div_jueves">
						<select name="hi_jueves" disabled="true">	<?php fhoras($hi_jueves); ?> </select> :
						<select name="mi_jueves" disabled="true">	<?php fmins($mi_jueves);  ?> </select>
						<br>
						<select name="hf_jueves" disabled="true">	<?php fhoras($hf_jueves); ?> </select> :
						<select name="mf_jueves" disabled="true">	<?php fmins($mf_jueves);  ?> </select>
						<br>
						<select name="aula_jueves" disabled="true">	<?php echo faulas($aula_jueves);  ?> </select>
						<input type="hidden" name="horario_jueves" value="<?php echo $horario_jueves; ?>" >
					</div>
					</td>
					<td rowspan="3"> <!-- VIERNES -->
					<div style="visibility:hidden" id="div_viernes">
						<select name="hi_viernes" disabled="true"> <?php fhoras($hi_viernes); ?> </select> :
						<select name="mi_viernes" disabled="true"> <?php fmins($mi_viernes);  ?> </select>
						<br>
						<select name="hf_viernes" disabled="true"> <?php fhoras($hf_viernes); ?> </select> :
						<select name="mf_viernes" disabled="true"> <?php fmins($mf_viernes);  ?> </select>
						<br>
						<select name="aula_viernes" disabled="true"> <?php echo faulas($aula_viernes); ?> </select>
						<input type="hidden" name="horario_viernes" value="<?php echo $horario_viernes;  ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- SABADO -->
					<div style="visibility:hidden" id="div_sabado">
						<select name="hi_sabado" disabled="true"> <?php fhoras($hi_sabado); ?> </select> :
						<select name="mi_sabado" disabled="true"> <?php fmins($mi_sabado);  ?> </select>
						<br>
						<select name="hf_sabado" disabled="true">	<?php fhoras($hf_sabado); ?> </select> :
						<select name="mf_sabado" disabled="true"> <?php fmins($mf_sabado);  ?> </select>
						<br>
						<select name="aula_sabado" disabled="true">	<?php echo faulas($aula_sabado); ?> </select>
						<input type="hidden" name="horario_sabado" value="<?php echo $horario_sabado;  ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- DOMINGO -->
					<div style="visibility:hidden" id="div_domingo">
						<select name="hi_domingo" disabled="true"> <?php fhoras($hi_domingo); ?> </select> :
						<select name="mi_domingo" disabled="true"> <?php fmins($mi_domingo);  ?> </select>
						<br>
						<select name="hf_domingo" disabled="true"> <?php fhoras($hf_domingo); ?> </select> :
						<select name="mf_domingo" disabled="true"> <?php fmins($mf_domingo);  ?> </select>
						<br>
						<select name="aula_domingo" disabled="true"> <?php echo faulas($aula_domingo); ?> </select>
						<input type="hidden" name="horario_domingo" value="<?php echo $horario_domingo;  ?>">
					</div>
					</td>
				</tr>
				<?php
				echo "<script type='text/javascript'>".$mostrar."</script>";
				if($accion == 'actualizar' && isset($es_paralelo))
					echo "<script type='text/javascript'>disable()</script>";
				?>
				<tr align="center">
					<td> Final </td>
				</tr>
				<tr align="center">
					<td id="non"> Aula </td>
				</tr>
                          <!-- HORARIOS DOBLES -->
				<tr align="center">
					<th> Hora </th>
					<?php
						$mostrar="";
						for($i=8; $i<=14; $i++)
						{
							$dia = $dias_semana[$i];
							echo "<th> <input type='button' class='boton' value='".ucwords(substr($dia, 0, 3))."' name='".$dia."' onClick='muestra(this.name)'> </th>";
							$nombre = "horario_".$dia;
							$valor = $$nombre;
							if($valor!="" || $valor!=NULL)
							{
								$mostrar.= "muestra('".$dia."');";
								$hi	 = "hi_".$dia;
								$$hi = substr($valor, 0, 2);
								$mi  = "mi_".$dia;
								$$mi = substr($valor, 2, 3);
								$hf  = "hf_".$dia;
								$$hf = substr($valor, 6, 2);
								$mf  = "mf_".$dia;
								$$mf = substr($valor, 8, 3);
								$aula  = "aula_".$dia;
								$$aula = trim(substr($valor, 12));
							}
						}
					?>
				</tr>
				<tr align="center" id="non">
					<td> Inicial </td>
					<td rowspan="3"> <!-- LUNES2 -->
					<div style="visibility:hidden" id="div_lunes2">
						<select name="hi_lunes2" disabled="true"> <?php fhoras($hi_lunes2); ?> </select> :
						<select name="mi_lunes2" disabled="true"> <?php fmins($mi_lunes2);  ?> </select>
						<br>
						<select name="hf_lunes2" disabled="true"> <?php fhoras($hf_lunes2); ?> </select> :
						<select name="mf_lunes2" disabled="true"> <?php fmins($mf_lunes2);  ?> </select>
						<br>
						<select name="aula_lunes2" disabled="true"> <?php echo faulas($aula_lunes2); ?> </select>
						<input type="hidden" name="horario_lunes2" value="<?php echo $horario_lunes2;  ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- MARTES2 -->
					<div style="visibility:hidden" id="div_martes2">
						<select name="hi_martes2" disabled="true"> <?php fhoras($hi_martes2); ?> </select> :
						<select name="mi_martes2" disabled="true"> <?php fmins($mi_martes2);  ?> </select>
						<br>
						<select name="hf_martes2" disabled="true"> <?php fhoras($hf_martes2); ?> </select> :
						<select name="mf_martes2" disabled="true"> <?php fmins($mf_martes2);  ?> </select>
						<br>
						<select name="aula_martes2" disabled="true">	<?php echo faulas($aula_martes2); ?> </select>
						<input type="hidden" name="horario_martes2" value="<?php echo $horario_martes2;  ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- MIERCOLES2 -->
					<div style="visibility:hidden" id="div_miercoles2">
						<select name="hi_miercoles2" disabled="true"> <?php fhoras($hi_miercoles2); ?> </select> :
						<select name="mi_miercoles2" disabled="true"> <?php fmins($hf_miercoles2);  ?> </select>
						<br>
						<select name="hf_miercoles2" disabled="true"> <?php fhoras($hf_miercoles2); ?> </select> :
						<select name="mf_miercoles2" disabled="true"> <?php fmins($mf_miercoles2);  ?> </select>
						<br>
						<select name="aula_miercoles2" disabled="true">	<?php echo faulas($aula_miercoles2); ?> </select>
						<input type="hidden" name="horario_miercoles2" value="<?php echo $horario_miercoles2;   ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- JUEVES2 -->
					<div style="visibility:hidden" id="div_jueves2">
						<select name="hi_jueves2" disabled="true">	<?php fhoras($hi_jueves2); ?> </select> :
						<select name="mi_jueves2" disabled="true">	<?php fmins($mi_jueves2);  ?> </select>
						<br>
						<select name="hf_jueves2" disabled="true">	<?php fhoras($hf_jueves2); ?> </select> :
						<select name="mf_jueves2" disabled="true">	<?php fmins($mf_jueves2);  ?> </select>
						<br>
						<select name="aula_jueves2" disabled="true">	<?php echo faulas($aula_jueves2);  ?> </select>
						<input type="hidden" name="horario_jueves2" value="<?php echo $horario_jueves2; ?>" >
					</div>
					</td>
					<td rowspan="3"> <!-- VIERNES2 -->
					<div style="visibility:hidden" id="div_viernes2">
						<select name="hi_viernes2" disabled="true"> <?php fhoras($hi_viernes2); ?> </select> :
						<select name="mi_viernes2" disabled="true"> <?php fmins($mi_viernes2);  ?> </select>
						<br>
						<select name="hf_viernes2" disabled="true"> <?php fhoras($hf_viernes2); ?> </select> :
						<select name="mf_viernes2" disabled="true"> <?php fmins($mf_viernes2);  ?> </select>
						<br>
						<select name="aula_viernes2" disabled="true"> <?php echo faulas($aula_viernes2); ?> </select>
						<input type="hidden" name="horario_viernes2" value="<?php echo $horario_viernes2;  ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- SABADO2 -->
					<div style="visibility:hidden" id="div_sabado2">
						<select name="hi_sabado2" disabled="true"> <?php fhoras($hi_sabado2); ?> </select> :
						<select name="mi_sabado2" disabled="true"> <?php fmins($mi_sabado2);  ?> </select>
						<br>
						<select name="hf_sabado2" disabled="true">	<?php fhoras($hf_sabado2); ?> </select> :
						<select name="mf_sabado2" disabled="true"> <?php fmins($mf_sabado2);  ?> </select>
						<br>
						<select name="aula_sabado2" disabled="true">	<?php echo faulas($aula_sabado2); ?> </select>
						<input type="hidden" name="horario_sabado2" value="<?php echo $horario_sabado2;  ?>">
					</div>
					</td>
					<td rowspan="3"> <!-- DOMINGO2 -->
					<div style="visibility:hidden" id="div_domingo2">
						<select name="hi_domingo2" disabled="true"> <?php fhoras($hi_domingo2); ?> </select> :
						<select name="mi_domingo2" disabled="true"> <?php fmins($mi_domingo2);  ?> </select>
						<br>
						<select name="hf_domingo2" disabled="true"> <?php fhoras($hf_domingo2); ?> </select> :
						<select name="mf_domingo2" disabled="true"> <?php fmins($mf_domingo2);  ?> </select>
						<br>
						<select name="aula_domingo2" disabled="true"> <?php echo faulas($aula_domingo2); ?> </select>
						<input type="hidden" name="horario_domingo2" value="<?php echo $horario_domingo2;  ?>">
					</div>
					</td>
				</tr>
				<?php
				echo "<script type='text/javascript'>".$mostrar."</script>";
				if($accion == 'actualizar' && isset($es_paralelo))
					echo "<script type='text/javascript'>disable()</script>";
				?>
				<tr align="center">
					<td> Final </td>
				</tr>
				<tr align="center">
					<td id="non"> Aula </td>
				</tr>
			</table>
			<br>
			<div align="center">
				<tr>
					<input class="boton" type="button" value="<?php echo $aceptar_b; ?>" onClick="verifica('<?php echo $accion; ?>')">
					<?php $relleno = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; echo $relleno; ?>
					<input class="boton" type="button" value="<?php echo $relleno." Cancelar ".$relleno; ?>" onClick='<?php echo $cancelar; ?>'>
			</div>
		<?php }?>
	</fieldset>
<?php
	}
	/* MUESTRA LOS GRUPOS DADOS DE ALTA */
	echo fehorarios_grupos_carrera($periodo, $carrera, $reticula, $semestre, $accion, 'horas', 'extramanto_grupos.php');
?>
</form>
</body>
</html>
