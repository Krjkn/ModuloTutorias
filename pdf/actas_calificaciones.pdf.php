<?php
function acta_calificaciones($pdf, $perido, $materia, $tipo)
{
	/************************ Consultas para los datos del documento ************************/
//Datos Generales
	$qry_datos_grupo = "exec pac_datosgrupo '$periodo','$materia','$grupo'";
	$res_datos_grupo = ejecutar_sql($qry_datos_grupo);

//Horario del grupo
	$qry_horario_grupo = "exec pac_horariogrupo '$periodo', '$materia', '$grupo'";
	$res_horario_grupo = 	ejecutar_sql($qry_horario_grupo);

//Lista de Alumnos
	$qry_alumnos_grupo = "exec pac_alumnosgrupo '$periodo','$materia','$grupo'";
	$res_alumnos_grupo = 	ejecutar_sql($qry_alumnos_grupo);

/************************ Inicio del documento ************************/	
	$j = 1;
		
	do
	{
	
		$pdf->AddPage();
	
	/************************ Encabezado ************************/
		if($tipo=='oficial')
		{
			$y = 52;
			$num_alumnos = 45;
		}
		else
		{
			$y = 32;
			$num_alumnos = 50;
			encabezado_documentos($pdf, "");
		}
		
	/************************ Datos generales ************************/
		$pdf->SetFont('Helvetica','b','12');
		$pdf->SetXY(10,$y);
		$pdf->Cell(140,4,"ACTA DE CALIFICACIONES",0,2,'L');
		$pdf->SetFont('Helvetica','','8');
		$pdf->Cell(30,4,"DEPARTAMENTO:",0,2,'L');
		$pdf->Cell(30,4,"MATERIA:",0,2,'L');
		$pdf->Cell(30,4,"PROFESOR:",0,2,'L');
		$pdf->Cell(30,4,"PERIODO:",0,2,'L');
		
		$pdf->SetXY(40,$y+4);
		$pdf->SetFont('Helvetica','b','8');
		$pdf->Cell(110,4,$res_datos_grupo->fields("nomdepto"),0,2,'L');
		$pdf->Cell(110,4,strtoupper($res_datos_grupo->fields("nombre_abreviado_materia")),0,2,'L');
		$pdf->Cell(110,4,strtoupper($res_datos_grupo->fields("profesor")),0,2,'L');
		$pdf->Cell(110,4,$res_datos_grupo->fields("identificacion_corta"),0,2,'L');
		
		$pdf->SetXY(150,$y+4);
		$pdf->SetFont('Helvetica','','8');
		$pdf->Cell(20,4,"FOLIO:",0,2,'R');
		//$pdf->Cell(20,4,"",0,2,'R');
		$pdf->Cell(20,4,"CLAVE:",0,2,'R');
		$pdf->Cell(20,4,"GRUPO:",0,2,'R');
		$pdf->Cell(20,4,"ALUMNOS:",0,2,'R');
		
		$pdf->SetXY(170,$y+4);
		$pdf->SetFont('Helvetica','b','8');
		$pdf->Cell(30,4,$res_datos_grupo->fields("folio_acta"),0,2,'L');
		//$pdf->Cell(30,4,"",0,2,'L');
		$pdf->Cell(30,4,$res_datos_grupo->fields("materia"),0,2,'L');
		$pdf->Cell(30,4,$res_datos_grupo->fields("grupo"),0,2,'L');
		$pdf->Cell(30,4,$res_datos_grupo->fields("alumnos_inscritos"),0,2,'L');
		
	/************************ Horario ************************/
		$linea = $y+21;
		$pdf->SetFont('Helvetica','','8');
		$pdf->SetLineWidth(0.35);
		$pdf->Rect(10,$linea,27,7);
		$pdf->Rect(37,$linea,27,7);
		$pdf->Rect(64,$linea,27,7);
		$pdf->Rect(91,$linea,27,7);
		$pdf->Rect(118,$linea,27,7);
		$pdf->Rect(145,$linea,27,7);
		$pdf->Rect(172,$linea,28,7);
		
		$pdf->SetXY(10,$linea);	
		$pdf->Cell(27,3.5,"LUNES",0,0,'C');
		$pdf->Cell(27,3.5,"MARTES",0,0,'C');
		$pdf->Cell(27,3.5,"MIERCOLES",0,0,'C');
		$pdf->Cell(27,3.5,"JUEVES",0,0,'C');
		$pdf->Cell(27,3.5,"VIERNES",0,0,'C');
		$pdf->Cell(27,3.5,"SABADO",0,0,'C');
		$pdf->Cell(28,3.5,"DOMINGO",0,1,'C');
		
		$pdf->SetX(10);	
		for($i=1;$i<=6;$i++)
		{
			$pdf->Cell(14,3.5,"HORA",0,0,'C');
			$pdf->Cell(13,3.5,"AULA",0,0,'C');
		}
		$pdf->Cell(14,3.5,"HORA",0,0,'C');
		$pdf->Cell(14,3.5,"AULA",0,1,'C');
		
		$linea = $y+28;
		$pdf->Rect(10,$linea,14,9);
		$pdf->Rect(24,$linea,13,9);
		$pdf->Rect(37,$linea,14,9);
		$pdf->Rect(51,$linea,13,9);
		$pdf->Rect(64,$linea,14,9);
		$pdf->Rect(78,$linea,13,9);
		$pdf->Rect(91,$linea,14,9);
		$pdf->Rect(105,$linea,13,9);
		$pdf->Rect(118,$linea,14,9);
		$pdf->Rect(132,$linea,13,9);
		$pdf->Rect(145,$linea,14,9);
		$pdf->Rect(159,$linea,13,9);
		$pdf->Rect(172,$linea,14,9);
		$pdf->Rect(186,$linea,14,9);
		
		$pdf->SetFont('Helvetica','b','8');
		while (!$res_horario_grupo->EOF)
		{ 
			switch ($res_horario_grupo->fields("dia_semana")) 
			{
				case 2: $x1 = 12;
								$x2 = 24;
								break;
				case 3: $x1 = 39;
								$x2 = 51;
								break;
				case 4: $x1 = 66;
								$x2 = 78;
								break;
				case 5: $x1 = 93;
								$x2 = 105;
								break;
				case 6: $x1 = 120;
								$x2 = 132;
								break;
				case 7: $x1 = 147;
								$x2 = 159;
								break;
			}
			$mini = (($res_horario_grupo->fields("mini")=='0')?"00":$res_horario_grupo->fields("mini"));
			$minf = (($res_horario_grupo->fields("minf")=='0')?"00":$res_horario_grupo->fields("minf"));
			$linea = $y+30;
			$pdf->Text($x1,$linea+2,$res_horario_grupo->fields("horai").":".$mini." -");
			$pdf->Text($x1,$linea+5,$res_horario_grupo->fields("horaf").":".$minf);
			$pdf->SetXY($x2,$linea);
			$pdf->Cell(13,4,$res_horario_grupo->fields("aula"),0,0,'C');   
			
			$res_horario_grupo->MoveNext();
		}
	
	/************************ Lista de Alumnos ************************/	
	//Encabezado lista alumnos
		$pdf->SetFont('Helvetica','','8');
		$pdf->SetXY(10,$y+37);
		$pdf->Cell(5,4,"No",1,0,'C');
		$pdf->Cell(22,4,"No. CONTROL",1,0,'C');
		$pdf->Cell(90,4,"NOMBRE DEL ALUMNO",1,0,'C');
		$pdf->Cell(24,4,(($res_alumnos_grupo->fields("nivel_escolar")=='L')?"CARRERA":"PROGRAMA"),1,0,'C');
		$pdf->Cell(15,4,"REP.",1,0,'C');
		$pdf->Cell(10,4,"ORD.",1,0,'C');
		$pdf->Cell(10,4,"REG.",1,0,'C');
		$pdf->Cell(14,4,"EXT.",1,1,'C');
		
	//Lista Alumnos		
		$pdf->SetLineWidth(0.09);	
		$i = 1;
		while (!$res_alumnos_grupo->EOF)
		{
			$pdf->SetX(10);		
			if ($i > $num_alumnos) 
				break;
		//Número de lista	
			$pdf->Cell(5,4,$j,0,0,'C');
		//Número de control	
			$pdf->Cell(22,4,$res_alumnos_grupo->fields('no_de_control'),0,0,'C');
		//Nombre del alumno	
			$pdf->Cell(90,4,$res_alumnos_grupo->fields('apellido_paterno')." ".$res_alumnos_grupo->fields('apellido_materno')." ".$res_alumnos_grupo->fields('nombre_alumno'),0,0,'L');
		//Carrera o Programa
			$pdf->Cell(24,4,$res_alumnos_grupo->fields('siglas'),0,0,'C');
		//Repetidor
			$pdf->Cell(15,4,($res_alumnos_grupo->fields('repeticion')=='S')?"Si":"",0,0,'C');
		//Calificacion	
			$calificacion = (($res_alumnos_grupo->fields('calificacion')==0)?"NA":$res_alumnos_grupo->fields('calificacion'));
			if($res_alumnos_grupo->fields('tipo_evaluacion') == 'O1' or $res_alumnos_grupo->fields('tipo_evaluacion') == 'O2')
				$pdf->Cell(10,4,$calificacion,0,1,'C');
			else
			{
				$pdf->Cell(10,4,"NA",0,0,'C');
				if($res_alumnos_grupo->fields('tipo_evaluacion') == 'R1' or $res_alumnos_grupo->fields('tipo_evaluacion') == 'R2')
					$pdf->Cell(10,4,$calificacion,0,1,'C');
				else
				{
					$pdf->Cell(10,4,"NA",0,0,'C');
					if ($res_alumnos_grupo->fields('repeticion') == 'S' and $calificacion == 'NA')
						$pdf->Cell(14,4,"***",0,1,'C');
					else
						$pdf->Cell(14,4,$calificacion,0,1,'C');	
				}
			}	
			
			$pdf->Line(10,$pdf->GetY(),200,$pdf->GetY());
			$j++;
			$i++;
			$res_alumnos_grupo->MoveNext();		
		}
		
	/************************ Leyenda final y Firma del Profesor ************************/	
/*		$dia  = date ("d");
		$mes  = date ("m");
		$anio = date ("Y");*/
		$pdf->SetAutoPageBreak(0);
		$pdf->SetFont('Helvetica','','10');
		$pdf->SetXY(10,275);
		$pdf->Cell(150,4,"Este documento no es válido si tiene tachaduras o enmendaduras",0,2,'L');	
		$pdf->Cell(150,4, fecha_completa(),0,2,'L');	
		$pdf->Cell(190,4,"Firma del Profesor:_____________________________",0,2,'R');	
				
	}while($i>$num_alumnos);	
}
?>