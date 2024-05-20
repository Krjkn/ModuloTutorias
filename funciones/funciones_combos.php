<?php

function fmaestros_activos( $rfc=NULL)
{require_once("includes/config.inc.php");
	$qry_personal = "select rfc,concat(nombre_empleado,' ',apellidos_empleado) as profesor from personal where tiempo = 'A'  order by profesor";
	$materia_grupo='';
	$res_personal = ejecuta_consulta($qry_personal);
	$opciones = "";
	while ($fila = $res_personal->fetch_assoc())
		{
			$s = ($rfc == trim($fila['rfc']))?" selected":"";
			$opciones.= '<option value="'.trim($fila['rfc']).'" '.$s.'>'.trim($fila['rfc']).' '.trim($fila['profesor']).'</option>';
		}
	return $opciones;
}
function grupos( $rfc=NULL)
{require_once("includes/config.inc.php");
	
	$qry_personal = "select rfc,concat(nombre_empleado,' ',apellidos_empleado) as profesor from personal where tiempo = 'A'  order by profesor";
	$materia_grupo='';
	$res_personal = ejecuta_consulta($qry_personal);
	$opciones = "";
	while ($fila = mysql_fetch_assoc($res_personal)) 
		{
			$s = ($rfc == trim($fila['rfc']))?" selected":"";
			$opciones.= '<option value="'.trim($fila['rfc']).'" '.$s.'>'.trim($fila['rfc']).' '.trim($fila['profesor']).'</option>';
		}
	return $opciones;
}

function grupo_materia($periodo)
{
require_once("includes/config.inc.php");
$qry_grupos_existentes = "SELECT concat(apellidos_empleado,' ', nombre_empleado) as profesor,nombre_carrera,G.periodo, G.materia, G.grupo, M.nombre_completo_materia   
FROM materias_carreras MC, materias M, grupos G ,carreras C ,personal P          
WHERE G.periodo = '$periodo' and MC.materia = M.materia AND G.materia = M.materia and  C.carrera = MC.carrera and P.rfc = G.rfc
group by G.periodo, G.materia, G.grupo, M.nombre_completo_materia
order by materia";
		$materia_grupo='';
		$res_grupos_existentes = ejecuta_consulta($qry_grupos_existentes);
		$opciones = "";
		while ($fila = $res_grupos_existentes->fetch_assoc()) 
		{
			$m_g = trim($fila['materia'])."_".trim($fila['grupo']);
			$nc  = trim($fila['nombre_carrera']);
			echo $nc."K ".$qry_carrera;
			$s = ($materia_grupo == $m_g)?"selected":"";
			$opciones.="<option value='".$m_g."' ".$s.">".$fila['materia']." ".$fila['nombre_completo_materia']." ".$fila['grupo']." ".$nc." -->".$fila['profesor']."</option>";
		}
		return $opciones;
}

function fcarrerasX($carrera)
{require_once("includes/config.inc.php");
	$qry_carreras = "select carrera,nombre_carrera from carreras ";
	$res_carreras = ejecuta_consulta($qry_carreras);
	$opciones ='';
	while($fila = $res_carreras->fetch_assoc())
		{
			$s = ($carrera == $fila[carrera])?" selected":"";
			$nombre = $fila['nombre_carrera'];
			$opciones.= "<option value='".$fila[carrera]."'".$s.">".$nombre." </option>";
		
		}
	return $opciones;
}


function nperiodo($periodo=NULL)
{require_once("includes/config.inc.php");
	$qry_periodos = "select periodo, identificacion_corta from periodos_escolares order by periodo DESC";
	$res_periodos = ejecuta_consulta($qry_periodos);
	$opciones = "";
	while ($fila = $res_periodos->fetch_assoc()) 
	{
		$s = ($periodo == $fila['periodo'])?" selected":"";
		$opciones.= "<option value='".trim($fila['periodo'])."'".$s.">".$fila['identificacion_corta']."</option>";
	}
	return $opciones;
}
function materias($carrera=NULL)
{require_once("includes/config.inc.php");
	$qry_periodos = "select m.materia,m.nombre_completo_materia from materias m,materias_carreras mc where mc.carrera = '$carrera' and m.materia = mc.materia";
	$res_periodos = ejecuta_consulta($qry_periodos);
	$opciones = "";
	while ($fila = $res_periodos->fetch_assoc()) 
	{
		$s = ($periodo == $fila['materia'])?" selected":"";
		$opciones.= "<option value='".trim($fila['materia'])."'".$s.">".$fila['nombre_completo_materia']."</option>";
	}
	return $opciones;
}

function aulas($carrera=NULL)
{require_once("includes/config.inc.php");
	$qry_periodos = "select aula from aulas where estatus = 'A'";
	$res_periodos =  ejecuta_consulta($qry_periodos);
	$opciones = "";
	while ($fila = $res_periodos->fetch_assoc()) 
	{
		$s = ($periodo == $fila['aula'])?" selected":"";
		$opciones.= "<option value='".trim($fila['aula'])."'".$s.">".$fila['aula']."</option>";
	}
	return $opciones;
}
?>
