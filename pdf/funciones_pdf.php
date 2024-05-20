<?php
require_once("../../../includes/config.inc.php");
require_once($CFG->funciones_phpDir."/funciones_combos.php");
require_once("../../../libs/fpdf/fpdf.php");
require_once("funciones.php");


/*class PDF extends FPDF
{*/
		// boletas
		function boletas_alumno($periodo,$control,$ciclo)
		{
		
		$consulta="exec extra_se_bol '$periodo','$control'";
		$consu=ejecutar_sql($consulta);
				$pdf=new FPDF();
				
				$pdf->AddPage();
				
				$x=153;
				$y=103;
				$k=10;
				$j=16;
				$inicial=8;
				$variable=0;
				$yrectangulos=16;
				for($i=1;$i<3;$i++)
				{
					$pdf->Rect(10,$yrectangulos,38,21);
					$pdf->SetFont('Arial','B',15);
					$pdf->Ln($inicial);
					$pdf->Image('../../../img/dgest.jpg',$k,$j,35,20);
					$pdf->Cell(80);
					$pdf->Rect(48,$yrectangulos,116,21);
					$pdf->Cell(20,5,'         INSTITUTO TECNOLÓGICO DE IGUALA      ',0,1,'C');
					$pdf->Cell(80); 
					$pdf->SetFont('Arial','B',11);   
					$pdf->Cell(20,5,'  BOLETA DE ACREDITACIÓN DE ACTIVIDADES ',0,1,'C');
					$pdf->Cell(80);
					$pdf->Rect(164,$yrectangulos,37,21);
					$pdf->Image('../../../img/escudo.jpg',165,$j,35,20);
					$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
					$pdf->Cell(30,7,'   DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES      ',0,1,'C');
$pdf->Cell(1,1,'',0,3);


					$pdf->Cell(1);
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(190,8,'BOLETA DE ACREDITACIÓN DE ACTIVIDADES EXTRAESCOLARES',1,1,'C');
					$pdf->Cell(1);    
					$pdf->Cell(47,10,'NO. DE CONTROL:',1,0,'L');
					$pdf->Cell(47,10,$control,1,0,'C');
					$pdf->Cell(48,10,'PERIODO ESCOLAR:',1,0,'L');
					$pdf->Cell(48,10,$ciclo,1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'NOMBRE:',1,0,'L');
					$pdf->Cell(143,10,$consu->fields('nombre_completo'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'ESPECIALIDAD:',1,0,'L');
					$pdf->Cell(47,10,catalogo_carreras($consu->fields('carrera')),1,0,'C');
					$pdf->Cell(48,10,'SEMESTRE ',1,0,'L');
					$pdf->Cell(48,10,$consu->fields('semestre_ext'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'ACTIVIDAD:',1,0,'L');
					$pdf->Cell(143,10,$consu->fields('actividad'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'RESULTADO:',1,0,'L');
					$pdf->Cell(143,10,res($consu->fields('resultado')),1,1,'C');
					$pdf->Cell(1);
$cero = substr(date('m'),0,1);
	if($cero==0)
	{
	 $cero = substr(date('m'),1,2);
	}
	else
	{
	$cero = date('m');
	}
					$pdf->Cell(47,30,fecha(date('d'),$cero,date('Y')),1,0,'C');
					$pdf->MultiCell(95,5,'
					
					
								L.I. Gerardo Adan Rebollar
								JEFE DEL DEPARTAMENTO
								DE ACTIVIDADES EXTRAESCOLARES',1,'C');
					
					$pdf->SetXY($x,$y);
					$pdf->MultiCell(48,5,'
					
					
					
			              
					',1,'C');
				if($variable==0)
				{	
					$pdf->Cell(47,10,'NOTA. * CONSERVE ESTA BOLETA SE LE SOLICITARÁ EN LA REALIZACIÓN DE OTROS TRÁMITES',0,0,'L');
					$variable=1;
				}
				else
				{
					$pdf->Cell(47,6,'C.c.p. Expediente del Alumno',0,1,'L');
					$pdf->SetFillColor(150,150,150);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(190,3,'SNEST-VI-PO-004-04                                                                                                                                                                                    Revisión 4',1,1,'L',1);
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFillColor(255,255,255);
					$pagina=$pdf->PageNo();
					$pdf->Cell(47,3,'                                                                                                                                                                                                                     Página '.$pagina.' de 1',0,0,'L');
				}
				$y=234;
				$j=144;
				$inicial=16;
				$yrectangulos=144;
				}
			$pdf->Output();
		}
		
		function boletas_actividad($periodo,$actividad,$ciclo)
		{
					$consulta="exec extra_bol_act '$actividad','$periodo'";
					$consu=ejecutar_sql($consulta);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			/*$pdf->SetFont('Arial','B',13); 
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE IGUALA",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD: ".$actividad."   PERIODO: ".$ciclo,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(10,7,"No",1,0,'C'); 
			$pdf->Cell(20,7,"Grupo",1,0,'C'); 
			$pdf->Cell(70,7,"Nombre",1,0,'C'); 
			$pdf->Cell(25,7,"Control",1,0,'C');
			$pdf->Cell(20,7,"Esp",1,0,'C');
			$pdf->Cell(20,7,"Sem Ext",1,0,'C'); 
			$pdf->Cell(25,7,"Resultado",1,1,'C');*/
		
			$pdf->SetFont('Arial','B',10);
			$cont=1;
				$total=$consu->rowcount();
			while(!$consu->EOF )
			{
				/*$pdf->Cell(1);		
				$pdf->Cell(10,4,$cont,1,0,'C'); 
				$pdf->Cell(20,4,$consu->fields('grupo'),1,0,'C');
				$pdf->Cell(70,4,$consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(25,4,$consu->fields('no_de_control'),1,0,'C'); 
				$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('semestre_ext'),1,0,'C'); 
				$pdf->Cell(25,4,res($consu->fields('resultado')),1,1,'C');
			$cont++;*/
			
				$control = $consu->fields('no_de_control');  // numero de control

				$consulta="exec extra_se_bol '$periodo','".$consu->fields('no_de_control')."'";
				$consu2=ejecutar_sql($consulta);
				
				$actividad = 	$consu2->fields('actividad');  // actividad
				
				
				$x=153;
				$y=103;
				$k=10;
				$j=16;
				$inicial=8;
				$variable=0;
				$yrectangulos=16;
				for($i=1;$i<3;$i++)
				{
					$pdf->Rect(10,$yrectangulos,38,21);
					$pdf->SetFont('Arial','B',15);
					$pdf->Ln($inicial);
					$pdf->Image('../../../img/dgest.jpg',$k,$j,35,20);
					$pdf->Cell(80);
					$pdf->Rect(48,$yrectangulos,116,21);
					$pdf->Cell(20,5,'         INSTITUTO TECNOLÓGICO DE IGUALA      ',0,1,'C');
					$pdf->Cell(80); 
					$pdf->SetFont('Arial','B',11);   
					$pdf->Cell(20,5,'  BOLETA DE ACREDITACIÓN DE ACTIVIDADES ',0,1,'C');
					$pdf->Cell(80);
					$pdf->Rect(164,$yrectangulos,37,21);
					$pdf->Image('../../../img/escudo.jpg',165,$j,35,20);
					$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
					$pdf->Cell(30,7,'   DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES      ',0,1,'C');
$pdf->Cell(1,1,'',0,3);


					$pdf->Cell(1);
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(190,8,'BOLETA DE ACREDITACIÓN DE ACTIVIDADES EXTRAESCOLARES',1,1,'C');
					$pdf->Cell(1);    
					$pdf->Cell(47,10,'NO. DE CONTROL:',1,0,'L');
					$pdf->Cell(47,10,$control,1,0,'C');
					$pdf->Cell(48,10,'PERIODO ESCOLAR:',1,0,'L');
					$pdf->Cell(48,10,$ciclo,1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'NOMBRE:',1,0,'L');
					$pdf->Cell(143,10,$consu->fields('nombre_completo'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'ESPECIALIDAD:',1,0,'L');
					$pdf->Cell(47,10,catalogo_carreras($consu->fields('carrera')),1,0,'C');
					$pdf->Cell(48,10,'SEMESTRE ',1,0,'L');
					$pdf->Cell(48,10,$consu->fields('semestre_ext'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'ACTIVIDAD:',1,0,'L');
					$pdf->Cell(143,10,$consu2->fields('actividad'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'RESULTADO:',1,0,'L');
					$pdf->Cell(143,10,res($consu2->fields('resultado')),1,1,'C');
					$pdf->Cell(1);
$cero = substr(date('m'),0,1);
	if($cero==0)
	{
	 $cero = substr(date('m'),1,2);
	}
	else
	{
	$cero = date('m');
	}
					$pdf->Cell(47,30,fecha(date('d'),$cero,date('Y')),1,0,'C');
					$pdf->MultiCell(95,5,'
					
					
								L.I. Gerardo Adan Rebollar
								JEFE DEL DEPARTAMENTO
								DE ACTIVIDADES EXTRAESCOLARES',1,'C');
					
					$pdf->SetXY($x,$y);
					$pdf->MultiCell(48,5,'
					
					
					
			              
					',1,'C');
				if($variable==0)
				{	
					$pdf->Cell(47,10,'NOTA. * CONSERVE ESTA BOLETA SE LE SOLICITARÁ EN LA REALIZACIÓN DE OTROS TRÁMITES',0,0,'L');
					$variable=1;
				}
				else
				{
					$pdf->Cell(47,6,'C.c.p. Expediente del Alumno',0,1,'L');
					$pdf->SetFillColor(150,150,150);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(190,3,'SNEST-VI-PO-004-04                                                                                                                                                                                    Revisión 4',1,1,'L',1);
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFillColor(255,255,255);
					$pagina=$pdf->PageNo();
					$pdf->Cell(47,3,'                                                                                                                                                                                                                     Página '.$pagina.' de '.$total,0,0,'L');

				}
				$y=234;
				$j=144;
				$inicial=16;
				$yrectangulos=144;
				}
				
			$consu->MoveNext();
			$pdf->AddPage();
			}
		
		$pdf->Output();
		}
		
		
		function boletas_especialidad($periodo,$especialidad,$ciclo)
		{
					$consulta="exec extra_bol_esp '$periodo','$especialidad'";
					$consu=ejecutar_sql($consulta);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			/*$pdf->SetFont('Arial','B',13); 
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE IGUALA",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ESPECIALIDAD: ".catalogo_carreras($especialidad)."   PERIODO: ".$ciclo,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',11); 
			$pdf->Cell(10,7,"No",1,0,'C'); 
			$pdf->Cell(12,7,"Grupo",1,0,'C'); 
			$pdf->Cell(70,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(43,7,"Actividad",1,0,'C');
			$pdf->Cell(15,7,"S.Ext",1,0,'C'); 
			$pdf->Cell(25,7,"Resultado",1,1,'C');*/
		$total=$consu->rowcount();
			$pdf->SetFont('Arial','B',10);
			$cont=1;
			while(!$consu->EOF )
			{
				/*$pdf->Cell(1);		
				$pdf->Cell(10,4,$cont,1,0,'C'); 
				$pdf->Cell(12,4,$consu->fields('grupo'),1,0,'C');
				$pdf->Cell(70,4,$consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C'); 
		$pdf->SetFont('Arial','B',9);
				$pdf->Cell(43,4,$consu->fields('actividad'),1,0,'C');
		$pdf->SetFont('Arial','B',10);
				$pdf->Cell(15,4,$consu->fields('semestre_ext'),1,0,'C'); 
				$pdf->Cell(25,4,res($consu->fields('resultado')),1,1,'C');
			$cont++;*/
				
				$control = $consu->fields('no_de_control');  // numero de control
				
				$consulta="exec extra_se_bol '$periodo','".$consu->fields('no_de_control')."'";
				$consu2=ejecutar_sql($consulta);
				
				
				$x=153;
				$y=103;
				$k=10;
				$j=16;
				$inicial=8;
				$variable=0;
				$yrectangulos=16;
				for($i=1;$i<3;$i++)
				{
					$pdf->Rect(10,$yrectangulos,38,21);
					$pdf->SetFont('Arial','B',15);
					$pdf->Ln($inicial);
					$pdf->Image('../../../img/dgest.jpg',$k,$j,35,20);
					$pdf->Cell(80);
					$pdf->Rect(48,$yrectangulos,116,21);
					$pdf->Cell(20,5,'         INSTITUTO TECNOLÓGICO DE IGUALA     ',0,1,'C');
					$pdf->Cell(80); 
					$pdf->SetFont('Arial','B',11);   
					$pdf->Cell(20,5,'  BOLETA DE ACREDITACIÓN DE ACTIVIDADES ',0,1,'C');
					$pdf->Cell(80);
					$pdf->Rect(164,$yrectangulos,37,21);
					$pdf->Image('../../../img/escudo.jpg',165,$j,35,20);
					$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
					$pdf->Cell(30,7,'   DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES      ',0,1,'C');
$pdf->Cell(1,1,'',0,3);


					$pdf->Cell(1);
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(190,8,'BOLETA DE ACREDITACIÓN DE ACTIVIDADES EXTRAESCOLARES',1,1,'C');
					$pdf->Cell(1);    
					$pdf->Cell(47,10,'NO. DE CONTROL:',1,0,'L');
					$pdf->Cell(47,10,$control,1,0,'C');
					$pdf->Cell(48,10,'PERIODO ESCOLAR:',1,0,'L');
					$pdf->Cell(48,10,$ciclo,1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'NOMBRE:',1,0,'L');
					$pdf->Cell(143,10,$consu->fields('nombre_completo'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'ESPECIALIDAD:',1,0,'L');
					$pdf->Cell(47,10,catalogo_carreras($consu->fields('carrera')),1,0,'C');
					$pdf->Cell(48,10,'SEMESTRE ',1,0,'L');
					$pdf->Cell(48,10,$consu->fields('semestre_ext'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'ACTIVIDAD:',1,0,'L');
					$pdf->Cell(143,10,$consu->fields('actividad'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'RESULTADO:',1,0,'L');
					$pdf->Cell(143,10,res($consu->fields('resultado')),1,1,'C');
					$pdf->Cell(1);
$cero = substr(date('m'),0,1);
	if($cero==0)
	{
	 $cero = substr(date('m'),1,2);
	}
	else
	{
	$cero = date('m');
	}
					$pdf->Cell(47,30,fecha(date('d'),$cero,date('Y')),1,0,'C');
					$pdf->MultiCell(95,5,'
					
					
								L.I. Gerardo Adan Rebollar
								JEFE DEL DEPARTAMENTO
								DE ACTIVIDADES EXTRAESCOLARES',1,'C');
					
					$pdf->SetXY($x,$y);
					$pdf->MultiCell(48,5,'
					
					
					
			              
					',1,'C');
				if($variable==0)
				{	
					$pdf->Cell(47,10,'NOTA. * CONSERVE ESTA BOLETA SE LE SOLICITARÁ EN LA REALIZACIÓN DE OTROS TRÁMITES',0,0,'L');
					$variable=1;
				}
				else
				{
					$pdf->Cell(47,6,'C.c.p. Expediente del Alumno',0,1,'L');
					$pdf->SetFillColor(150,150,150);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(190,3,'SNEST-VI-PO-004-04                                                                                                                                                                                    Revisión 4',1,1,'L',1);
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFillColor(255,255,255);
					$pagina=$pdf->PageNo();
					$pdf->Cell(47,3,'                                                                                                                                                                                                                     Página '.$pagina.' de '.$total,0,0,'L');
				}
				$y=234;
				$j=144;
				$inicial=16;
				$yrectangulos=144;
				}

			$consu->MoveNext();
			$pdf->AddPage();
			}
		$pdf->Output();
		}
		
		
		function boletas_grupo($periodo,$actividad,$grupo,$ciclo,$hora)
		{
					$consulta="exec extra_se_resultado '$actividad','$periodo','$grupo'";
					$consu=ejecutar_sql($consulta);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			/*$pdf->SetFont('Arial','B',13); 
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE IGUALA",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD: ".$actividad."   GRUPO: ".$grupo,0,1,'C');
			$pdf->Cell(190,8,"PERIODO: ".$ciclo."   HORARIO: ".$hora,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(10,7,"No",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(25,7,"Carrera",1,0,'C');
			$pdf->Cell(15,7,"S.Ext",1,0,'C'); 
			$pdf->Cell(25,7,"Resultado",1,1,'C');*/
		$total=$consu->rowcount();
			$pdf->SetFont('Arial','B',10);
			$cont=1;
			while(!$consu->EOF )
			{
				/*$pdf->Cell(1);		
				$pdf->Cell(10,4,$cont,1,0,'C'); 
				$pdf->Cell(90,4,$consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
				$pdf->Cell(25,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
				$pdf->Cell(15,4,$consu->fields('semestre_ext'),1,0,'C'); 
				$pdf->Cell(25,4,res($consu->fields('resultado')),1,1,'C');
			$cont++;*/
			
				$control = $consu->fields('no_de_control');  // numero de control
				
				$consulta="exec extra_se_bol '$periodo','".$consu->fields('no_de_control')."'";
				$consu2=ejecutar_sql($consulta);
				
				
				$x=153;
				$y=103;
				$k=10;
				$j=16;
				$inicial=8;
				$variable=0;
				$yrectangulos=16;
				for($i=1;$i<3;$i++)
				{
					$pdf->Rect(10,$yrectangulos,38,21);
					$pdf->SetFont('Arial','B',15);
					$pdf->Ln($inicial);
					$pdf->Image('../../../img/dgest.jpg',$k,$j,35,20);
					$pdf->Cell(80);
					$pdf->Rect(48,$yrectangulos,116,21);
					$pdf->Cell(20,5,'         INSTITUTO TECNOLÓGICO DE IGUALA      ',0,1,'C');
					$pdf->Cell(80); 
					$pdf->SetFont('Arial','B',11);   
					$pdf->Cell(20,5,'  BOLETA DE ACREDITACIÓN DE ACTIVIDADES ',0,1,'C');
					$pdf->Cell(80);
					$pdf->Rect(164,$yrectangulos,37,21);
					$pdf->Image('../../../img/escudo.jpg',165,$j,35,20);
					$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
$pdf->Cell(1,1,'',0,3);
					$pdf->Cell(30,7,'   DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES      ',0,1,'C');
$pdf->Cell(1,1,'',0,3);


					$pdf->Cell(1);
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(190,8,'BOLETA DE ACREDITACIÓN DE ACTIVIDADES EXTRAESCOLARES',1,1,'C');
					$pdf->Cell(1);    
					$pdf->Cell(47,10,'NO. DE CONTROL:',1,0,'L');
					$pdf->Cell(47,10,$control,1,0,'C');
					$pdf->Cell(48,10,'PERIODO ESCOLAR:',1,0,'L');
					$pdf->Cell(48,10,$ciclo,1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'NOMBRE:',1,0,'L');
					$pdf->Cell(143,10,$consu->fields('nombre_completo'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'ESPECIALIDAD:',1,0,'L');
					$pdf->Cell(47,10,catalogo_carreras($consu->fields('carrera')),1,0,'C');
					$pdf->Cell(48,10,'SEMESTRE ',1,0,'L');
					$pdf->Cell(48,10,$consu->fields('semestre_ext'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'ACTIVIDAD:',1,0,'L');
					$pdf->Cell(143,10,$consu2->fields('actividad'),1,1,'C');
					$pdf->Cell(1);
					$pdf->Cell(47,10,'RESULTADO:',1,0,'L');
					$pdf->Cell(143,10,res($consu->fields('resultado')),1,1,'C');
					$pdf->Cell(1);
$cero = substr(date('m'),0,1);
	if($cero==0)
	{
	 $cero = substr(date('m'),1,2);
	}
	else
	{
	$cero = date('m');
	}
					$pdf->Cell(47,30,fecha(date('d'),$cero,date('Y')),1,0,'C');
					$pdf->MultiCell(95,5,'
					
					
								L.I. Susana Cristina Rosales Aguilera
								JEFE DEL DEPARTAMENTO
								DE ACTIVIDADES EXTRAESCOLARES',1,'C');
					
					$pdf->SetXY($x,$y);
					$pdf->MultiCell(48,5,'
					
					
					
			              
					',1,'C');
				if($variable==0)
				{	
					$pdf->Cell(47,10,'NOTA. * CONSERVE ESTA BOLETA SE LE SOLICITARÁ EN LA REALIZACIÓN DE OTROS TRÁMITES',0,0,'L');
					$variable=1;
				}
				else
				{
					$pdf->Cell(47,6,'C.c.p. Expediente del Alumno',0,1,'L');
					$pdf->SetFillColor(150,150,150);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(190,3,'SNEST-VI-PO-004-04                                                                                                                                                                                    Revisión 4',1,1,'L',1);
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFillColor(255,255,255);
					$pagina=$pdf->PageNo();
					$pdf->Cell(47,3,'                                                                                                                                                                                                                     Página '.$pagina.' de '.$total,0,0,'L');
				}
				$y=234;
				$j=144;
				$inicial=16;
				$yrectangulos=144;
				}
			
			$consu->MoveNext();
			$pdf->AddPage();
			}
		
		$pdf->Output();
		
		}
		
		// cedulas
		function cedula_inscripcion($periodo,$actividad,$grupo,$ciclo,$hora)
		{
					$consulta="exec extra_consulta_inscripcion '$actividad','$periodo','$grupo'";
					$consu=ejecutar_sql($consulta);
		$pdf=new FPDF();
		$pdf->SetAutoPageBreak(true,2);
		$cont=1;
		$co=23;
		$total=$consu->rowcount();
		$total=((integer)($total/22))+1;
			while(!$consu->EOF)
			{
			$pdf->AddPage('L');
			encabezado1(&$pdf,&$actividad);
				
				$pdf->SetFont('Arial','B',13);				
				$pdf->Ln(10); 
				$pdf->cell(1);
				$pdf->Cell(260,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');
				$pdf->Cell(260,3,"OFICINA DE PROMOCION ".$dep,0,1,'C');
				$pdf->Ln(2); 
				$pdf->Cell(260,8,"INSCRIPCION-PERIODO: ".$ciclo,0,1,'C');
				$pdf->Cell(260,8,"      ACTIVIDAD: ".$actividad."                                 GRUPO: ".$grupo."                                     HORA: ".$hora,0,1,'C');
				
				$pdf->Ln(4);
				$pdf->Cell(1);
				$pdf->SetFont('Arial','B',12); 
				$pdf->Cell(12,7,"No",1,0,'C'); 
				$pdf->Cell(100,7,"Nombre",1,0,'C'); 
				$pdf->Cell(20,7,"Control",1,0,'C');
				$pdf->Cell(20,7,"Carrera",1,0,'C');
				$pdf->Cell(12,7,"Sem",1,0,'C');
				$pdf->Cell(14,7,"Edad",1,0,'C');  
				$pdf->Cell(14,7,"Sexo",1,0,'C'); 
				$pdf->Cell(77,7,"Observaciones",1,1,'C');
			
				$pdf->SetFont('Arial','B',10);
				
				while(!$consu->EOF && $cont<$co)
				{
					$pdf->Cell(1);		
					$pdf->Cell(12,4,$cont,1,0,'C'); 
					$pdf->Cell(100,4,$consu->fields('nombre_completo'),1,0,'L'); 
					$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
					$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
					$pdf->Cell(12,4,$consu->fields('semestre'),1,0,'C'); 
					$pdf->Cell(14,4,' ',1,0,'C');
					$pdf->Cell(14,4,$consu->fields('sexo'),1,0,'C');
					$pdf->Cell(77,4,"",1,1,'C');
				$cont++;
				$consu->MoveNext();
				}
			$co+=22;
			Footer1(&$pdf,&$total,&$actividad);
			}
		$pdf->Output();
		
		}

		function encabezado1($pdf,$actividad)
		{
			$consulta="select tipo_actividad from extra_actividades where actividad='".$actividad."'";
			$consu=ejecutar_sql($consulta);
				if($consu->fields('tipo_actividad')=="CUL")
				{
					$dep="Culturales";
				}
				else
				{
					$dep="Deportivas";
				}
			$yrectangulos=14;
			/*$pdf->Ln(8);
			$yrectangulos=14;
			$pdf->SetFont('Arial','I',8);
			$pdf->Image('../../../img/escudo.jpg',8,5,40,20);
			$pdf->SetXY(50,8);
			
			$pdf->MultiCell(110,5,"Nombre del documento:  Formato para C?dula de 
	Inscripci?n a Actividades ".$dep,1,'L');
	
			$pdf->SetXY(160,8);
			$pdf->MultiCell(37,5,"C?digo:
	SNEST-VI-PO-003-03 ",1,'L');
	
			$pdf->SetXY(50,18);
			$pdf->Cell(110,10,"Referencia a la Norma ISO 9001:2000: 7.2.1",1,1,'L');
	
			$pdf->SetXY(160,18);
			$pdf->Cell(37,5,"Revision: 3",1,1,'L');
			$pdf->SetXY(160,23);
			$pdf->Cell(37,5,"Pagina".$pdf->PageNo(),1,1,'L');*/

					$pdf->Rect(10,$yrectangulos,50,25);
					$pdf->SetFont('Arial','B',15);
					$pdf->Ln(10);
					$pdf->Image('../../../img/dgest.jpg',13,16,40,20);
					$pdf->Cell(80);
					$pdf->Rect(60,$yrectangulos,170,25);
					$pdf->SetFont('Arial','B',20);
					$pdf->Cell(110,5,'         INSTITUTO TECNOLOGICO DE IGUALA      ',0,1,'C');
					$pdf->Ln(3);
					$pdf->Cell(80); 
					$pdf->SetFont('Arial','B',15);
					$pdf->Cell(115,5,'  Cédula de Inscripción a Actividades '.$dep,0,1,'C');
					$pdf->Cell(80);
					$pdf->Rect(230,$yrectangulos,50,25);
					$pdf->Image('../../../img/escudo.jpg',236,16,35,20);
					$pdf->Cell(1,1,'',0,3);

		}

		function Footer1($pdf,$total,$actividad)
		{
			$consulta="select tipo_actividad from extra_actividades where actividad='".$actividad."'";
			$consu=ejecutar_sql($consulta);
				if($consu->fields('tipo_actividad')=="CUL")
				{
					$jefe_Dep="Lic. Garcia Garcia Jezirah Nishdaly";
					$dep="Cultural";
				}
				else
				{
					$jefe_Dep="Lic. Herrera Campa Roberto";
					$dep="Deportivo";
				}
			
			$pdf->SetXY(12,175);			
			/*$pdf->SetFont('Arial','I',12);
			$pdf->Cell(0,1,'Jefe de la Oficina de Promoci?n '.$dep.'                  '.$jefe_Dep,0,1,'L');
			$pdf->Cell(2,15,'SNEST-VI-PO-003-03                                                                                                                                                                                                 Rev. 3',0,1,'L');*/
			$pdf->Cell(47,6,'Jefe de la Oficina de Promoción '.$dep.':          '.$jefe_Dep,0,1,'L');
			$pdf->SetXY(12,190);
					$pdf->SetFillColor(150,150,150);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(270,3,'SNEST-VI-PO-004-04                                                                                                                                                                                                                                                                                          Revisión 4',1,1,'L',1);
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFillColor(255,255,255);
					$pagina=$pdf->PageNo();
					$pdf->Cell(47,3,'                                                                                                                                                                                                                                                                                                                               Página '.$pagina.' de '.$total,0,0,'L');
		}
		
		function cedula_resultado($periodo,$actividad,$grupo,$ciclo,$hora)
		{
					$consulta="exec extra_se_resultado '$actividad','$periodo','$grupo'";
					$consu=ejecutar_sql($consulta);
		$total=$consu->rowcount();
		$total=((integer)($total/42))+1;
			$c="select tipo_actividad from extra_actividades where actividad='".$actividad."'";
			$cn=ejecutar_sql($c);
				if($cn->fields('tipo_actividad')=="CUL")
				{
					$d="CULTURALES";
				}
				else
				{
					$d="DEPORTIVA";
				}

		$pdf=new FPDF();
		$pdf->SetAutoPageBreak(true,2);
		$cont=1;
$co=42;
			while(!$consu->EOF )
			{
				$pdf->AddPage();
			        encabezado(&$pdf,&$actividad);
						
					//$pdf->Image('img/resid2.jpg',8,5,190,40);
				
				$pdf->SetFont('Arial','B',13);
				$pdf->Ln(6); 
				$pdf->cell(1);
				$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');
				$pdf->cell(1);
				$pdf->Cell(190,4,"OFICINA DE PROMOCION ".$d,0,1,'C');
				$pdf->cell(1);
				$pdf->Cell(190,6,"ACTIVIDAD: ".$actividad,0,1,'C');
				
			
				$pdf->Ln(8);
				$pdf->Cell(1);
				$pdf->SetFont('Arial','B',12); 
				$pdf->Cell(15,7,"No",1,0,'C'); 
				$pdf->Cell(80,7,"Nombre",1,0,'C'); 
				$pdf->Cell(20,7,"Control",1,0,'C');
				$pdf->Cell(20,7,"Carrera",1,0,'C');
				$pdf->Cell(20,7,"Sem",1,0,'C'); 
				$pdf->Cell(33,7,"Resultado",1,1,'C');
			
		
				$pdf->SetFont('Arial','B',10);
				
				while(!$consu->EOF && $cont<$co)
				{ 
					
					$pdf->Cell(1);		
					$pdf->Cell(15,4,$cont,1,0,'C'); 
					$pdf->Cell(80,4,$consu->fields('nombre_completo'),1,0,'L'); 
					$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
					$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
					$pdf->Cell(20,4,$consu->fields('semestre_cur'),1,0,'C');
					$pdf->Cell(33,4,res($consu->fields('resultado')),1,1,'C');
				
				$cont++;
			
				$consu->MoveNext();
				}
					Footer(&$pdf,&$periodo,&$actividad,&$grupo,&$total);
			$co+=42;
	
			}	
		$pdf->Output();
	
		}
		
		
		function encabezado($pdf,$actividad)
		{
			$consulta="select tipo_actividad from extra_actividades where actividad='".$actividad."'";
			$consu=ejecutar_sql($consulta);
				if($consu->fields('tipo_actividad')=="CUL")
				{
					$dep="Culturales";
				}
				else
				{
					$dep="Deportivas";
				}

			
			/*$pdf->SetFont('Arial','I',8);
			$pdf->Image('../../../img/escudo.jpg',8,5,40,20);
			$pdf->SetXY(50,8);
			
			$pdf->MultiCell(110,5,"Nombre del documento:  Formato para C?dula de 
	Resultados de Actividades ".$dep,1,'L');
	
			$pdf->SetXY(160,8);
			$pdf->MultiCell(37,5,"C?digo:
	SNEST-VI-PO-003-03 ",1,'L');
	
			$pdf->SetXY(50,18);
			$pdf->Cell(110,10,"Referencia a la Norma ISO 9001:2000: 7.2.1",1,1,'L');
	
			$pdf->SetXY(160,18);
			$pdf->Cell(37,5,"Revision: 3",1,1,'L');
			$pdf->SetXY(160,23);
			$pdf->Cell(37,5,"Pagina".$pdf->PageNo(),1,1,'L');*/
			$pdf->Ln(8);
			$yrectangulos=14;
					$pdf->Rect(10,$yrectangulos,38,21);
					$pdf->SetFont('Arial','B',15);
					$pdf->Ln($inicial);
					$pdf->Image('../../../img/dgest.jpg',12,15,35,19);
					$pdf->Cell(80);
					$pdf->Rect(48,$yrectangulos,116,21);
					$pdf->SetFont('Arial','B',15);
					$pdf->Cell(30,5,'         INSTITUTO TECNOLOGICO DE DURANGO      ',0,1,'C');
					$pdf->Ln(4);
					$pdf->Cell(80); 
					$pdf->SetFont('Arial','B',12);   
					$pdf->Cell(27,5,'  Cédula de Resultados de Actividades '.$dep,0,1,'C');
					$pdf->Cell(80);
					$pdf->Rect(164,$yrectangulos,37,21);
					$pdf->Image('../../../img/escudo.jpg',165,15,35,19);
					$pdf->Cell(1,1,'',0,3);
		}
		function Footer($pdf,$periodo,$actividad,$grupo,$total)
		{
			$consulta="select g.rfc,a.tipo_actividad from extra_actividades a,extra_grupo_actividades g where g.actividad=a.actividad and g.actividad='".$actividad."' and g.grupo='".$grupo."' and g.periodo='".$periodo."'";
			$consu=ejecutar_sql($consulta);
				if($consu->fields('tipo_actividad')=="CUL")
				{
					$jefe_Dep="Lic. Garcia Garcia Jezirah Nishdaly";
					$dep="Cultural";
				}
				else
				{
					$jefe_Dep="Lic. Herrera Campa Roberto";
					$dep="Deportivo";
				}

			$pdf->SetXY(10,240);
$cero = substr(date('m'),0,1);
	if($cero==0)
	{
	 $cero = substr(date('m'),1,2);
	}
	else
	{
	$cero = date('m');
	}
			$pdf->SetFont('Arial','I',12);
			$pdf->Cell(10,10,"Lugar y Fecha  Durango, Dgo. a ".fecha(date('d'),$cero,date('Y')),0,1,'L');
			$pdf->SetXY(10,260);
			$pdf->SetFont('Arial','I',7);
			$pdf->Cell(0,10,'PROF. '.promotor($consu->fields('rfc')),0,1,'L');                     
			$pdf->SetXY(90,260);
			$pdf->Cell(0,10,$jefe_Dep.'                                              L. I. Susana C. Rosales Aguilera',0,1,'L');
			$pdf->SetFont('Arial','I',9);
			$pdf->Cell(0,1,'             Promotor '.$dep.'                                   Jefe de oficina de Promoción '.$dep.'                     Jefe del Departamento',0,1,'L');
			/*$pdf->SetFont('Arial','I',8);
			$pdf->Cell(2,15,'SNEST-VI-PO-003-03                                                                                                                                                                                                 Rev. 3',0,1,'L');*/

			$pdf->SetXY(10,280);
					$pdf->SetFillColor(150,150,150);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(190,3,'SNEST-VI-PO-004-04                                                                                                                                                                                        Revisión 4',1,1,'L',1);
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFillColor(255,255,255);
					$pagina=$pdf->PageNo();
					$pdf->Cell(47,3,'                                                                                                                                                                                                                        Página '.$pagina.' de '.$total,0,0,'L');
		}
		

		function cedula_resultado2($periodo,$actividad,$grupo,$ciclo,$hora)
		{
					/*$consulta="exec extra_se_resultado '$actividad','$periodo','$grupo'";
					$consu=ejecutar_sql($consulta);*/

		$consulta="exec extra_consulta_inscripcion '".$actividad."','".$periodo."','".$grupo."'";
	        $consu=ejecutar_sql($consulta);

		$total=$consu->rowcount();
		$total=((integer)($total/42))+1;

			$c="select tipo_actividad from extra_actividades where actividad='".$actividad."'";
			$cn=ejecutar_sql($c);
				if($cn->fields('tipo_actividad')=="CUL")
				{
					$d="CULTURALES";
				}
				else
				{
					$d="DEPORTIVA";
				}

		$pdf=new FPDF();
		$pdf->SetAutoPageBreak(true,2);
		$cont=1;
$co=42;
			while(!$consu->EOF )
			{
				$pdf->AddPage();
			        encabezado_ced2(&$pdf,&$actividad);
						
					//$pdf->Image('img/resid2.jpg',8,5,190,40);
				
				$pdf->SetFont('Arial','B',13);
				$pdf->Ln(6); 
				$pdf->cell(1);
				$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');
				$pdf->cell(1);
				$pdf->Cell(190,4,"OFICINA DE PROMOCION ".$d,0,1,'C');
				$pdf->cell(1);
				$pdf->Cell(190,6,"ACTIVIDAD: ".$actividad,0,1,'C');
				
			
				$pdf->Ln(8);
				$pdf->Cell(1);
				$pdf->SetFont('Arial','B',12); 
				$pdf->Cell(15,7,"No",1,0,'C'); 
				$pdf->Cell(80,7,"Nombre",1,0,'C'); 
				$pdf->Cell(20,7,"Control",1,0,'C');
				$pdf->Cell(20,7,"Carrera",1,0,'C');
				$pdf->Cell(20,7,"Sem",1,0,'C'); 
				$pdf->Cell(33,7,"Resultado",1,1,'C');
			
		
				$pdf->SetFont('Arial','B',10);
				
				while(!$consu->EOF && $cont<$co)
				{ 
					
					$pdf->Cell(1);		
					$pdf->Cell(15,4,$cont,1,0,'C'); 
					$pdf->Cell(80,4,$consu->fields('nombre_completo'),1,0,'L'); 
					$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
					$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
					$pdf->Cell(20,4,$consu->fields('semestre_cur'),1,0,'C');
					$pdf->Cell(33,4,'',1,1,'C');
				
				$cont++;
			
				$consu->MoveNext();
				}
					Footer_ced2(&$pdf,&$periodo,&$actividad,&$grupo,&$total);
			$co+=42;
	
			}	
		$pdf->Output();
	
		}
		
		
		function encabezado_ced2($pdf,$actividad)
		{
			$consulta="select tipo_actividad from extra_actividades where actividad='".$actividad."'";
			$consu=ejecutar_sql($consulta);
				if($consu->fields('tipo_actividad')=="CUL")
				{
					$dep="Culturales";
				}
				else
				{
					$dep="Deportivas";
				}

			
			/*$pdf->SetFont('Arial','I',8);
			$pdf->Image('../../../img/escudo.jpg',8,5,40,20);
			$pdf->SetXY(50,8);
			
			$pdf->MultiCell(110,5,"Nombre del documento:  Formato para C?dula de 
	Resultados de Actividades ".$dep,1,'L');
	
			$pdf->SetXY(160,8);
			$pdf->MultiCell(37,5,"C?digo:
	SNEST-VI-PO-003-03 ",1,'L');
	
			$pdf->SetXY(50,18);
			$pdf->Cell(110,10,"Referencia a la Norma ISO 9001:2000: 7.2.1",1,1,'L');
	
			$pdf->SetXY(160,18);
			$pdf->Cell(37,5,"Revision: 3",1,1,'L');
			$pdf->SetXY(160,23);
			$pdf->Cell(37,5,"Pagina".$pdf->PageNo(),1,1,'L');*/
			$pdf->Ln(8);
			$yrectangulos=14;
					$pdf->Rect(10,$yrectangulos,38,21);
					$pdf->SetFont('Arial','B',15);
					$pdf->Ln($inicial);
					$pdf->Image('../../../img/dgest.jpg',12,15,35,19);
					$pdf->Cell(80);
					$pdf->Rect(48,$yrectangulos,116,21);
					$pdf->SetFont('Arial','B',15);
					$pdf->Cell(30,5,'         INSTITUTO TECNOLOGICO DE DURANGO      ',0,1,'C');
					$pdf->Ln(4);
					$pdf->Cell(80); 
					$pdf->SetFont('Arial','B',12);   
					$pdf->Cell(27,5,'  Cédula de Resultados de Actividades '.$dep,0,1,'C');
					$pdf->Cell(80);
					$pdf->Rect(164,$yrectangulos,37,21);
					$pdf->Image('../../../img/escudo.jpg',165,15,35,19);
					$pdf->Cell(1,1,'',0,3);
		}
		function Footer_ced2($pdf,$periodo,$actividad,$grupo,$total)
		{
			$consulta="select g.rfc,a.tipo_actividad from extra_actividades a,extra_grupo_actividades g where g.actividad=a.actividad and g.actividad='".$actividad."' and g.grupo='".$grupo."' and g.periodo='".$periodo."'";
			$consu=ejecutar_sql($consulta);
				if($consu->fields('tipo_actividad')=="CUL")
				{
					$jefe_Dep="Lic. Garcia Garcia Jezirah Nishdaly";
					$dep="Cultural";
				}
				else
				{
					$jefe_Dep="Lic. Herrera Campa Roberto";
					$dep="Deportivo";
				}

			$pdf->SetXY(10,240);
$cero = substr(date('m'),0,1);
	if($cero==0)
	{
	 $cero = substr(date('m'),1,2);
	}
	else
	{
	$cero = date('m');
	}
			$pdf->SetFont('Arial','I',12);
			$pdf->Cell(10,10,"Lugar y Fecha  Durango, Dgo. a ".fecha(date('d'),$cero,date('Y')),0,1,'L');
			$pdf->SetXY(10,260);
			$pdf->SetFont('Arial','I',7);
			$pdf->Cell(0,10,'PROF. '.promotor($consu->fields('rfc')),0,1,'L');                     
			$pdf->SetXY(90,260);
			$pdf->Cell(0,10,$jefe_Dep.'                                              L. I. Susana C. Rosales Aguilera',0,1,'L');
			$pdf->SetFont('Arial','I',9);
			$pdf->Cell(0,1,'             Promotor '.$dep.'                                   Jefe de oficina de Promoción '.$dep.'                     Jefe del Departamento',0,1,'L');
			/*$pdf->SetFont('Arial','I',8);
			$pdf->Cell(2,15,'SNEST-VI-PO-003-03                                                                                                                                                                                                 Rev. 3',0,1,'L');*/

			$pdf->SetXY(10,280);
					$pdf->SetFillColor(150,150,150);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(190,3,'SNEST-VI-PO-004-04                                                                                                                                                                                        Revisión 4',1,1,'L',1);
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFillColor(255,255,255);
					$pagina=$pdf->PageNo();
					$pdf->Cell(47,3,'                                                                                                                                                                                                                        Página '.$pagina.' de '.$total,0,0,'L');
		}
		


		// seleccionados
		
		function seleccionados($periodo,$actividad,$ciclo)
		{
		
					$consulta="exec extra_se_selec '$periodo','$actividad'";
					$consu=ejecutar_sql($consulta);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD: ".$actividad,0,1,'C');
			$pdf->Cell(190,8,"PERIODO: ".$ciclo,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(15,7,"No",1,0,'C');
			$pdf->Cell(20,7,"Grupo",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(20,7,"Carrera",1,0,'C');
			$pdf->Cell(20,7,"Sem",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
			$cont=1;
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(15,4,$cont,1,0,'C'); 
				$pdf->Cell(20,4,$grupo = $consu->fields('grupo'),1,0,'C');
				$pdf->Cell(90,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
				$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('semestre'),1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		
		$pdf->Output();
		
		}
		
		// estadisticas
		function est_acta($periodo,$actividad,$ciclo,$alumno)
		{
		
					$consulta="exec extra_est_acta '$actividad','$periodo'";
					$consu=ejecutar_sql($consulta);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD: ".$actividad."   PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO:  APROBADO    TOTAL ALUMNO: ".$alumno,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(15,7,"No",1,0,'C');
			$pdf->Cell(20,7,"Grupo",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(20,7,"Carrera",1,0,'C');
			$pdf->Cell(20,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
			$cont=1;
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(15,4,$cont,1,0,'C'); 
				$pdf->Cell(20,4,$grupo = $consu->fields('grupo'),1,0,'C');
				$pdf->Cell(90,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
				$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('semestre_ext'),1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		
		$pdf->Output();
		
		}
		
		function est_actr($periodo,$actividad,$ciclo,$alumno)
		{
		
					$consulta="exec extra_est_actr '$actividad','$periodo'";
					$consu=ejecutar_sql($consulta);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD: ".$actividad."   PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO:  NO APROBADO    TOTAL ALUMNO: ".$alumno,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(15,7,"No",1,0,'C');
			$pdf->Cell(20,7,"Grupo",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(20,7,"Carrera",1,0,'C');
			$pdf->Cell(20,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
			$cont=1;
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(15,4,$cont,1,0,'C'); 
				$pdf->Cell(20,4,$grupo = $consu->fields('grupo'),1,0,'C');
				$pdf->Cell(90,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
				$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('semestre_ext'),1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		
		$pdf->Output();
		}
		
		function est_culta($periodo,$total,$ciclo)
		{
		
					$consu3="exec extra_actividades_cul";
					$consu4=ejecutar_sql($consu3);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD CULTURALES     PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO:  APROBADO    TOTAL ALUMNO: ".$total,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(15,7,"No",1,0,'C');
			$pdf->Cell(20,7,"Grupo",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(20,7,"Carrera",1,0,'C');
			$pdf->Cell(20,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
		$cont=1;
		while(!$consu4->EOF)
		{
		
			$consulta="exec extra_est_acta '".$consu4->Fields('actividad')."','$periodo'";
			$consu=ejecutar_sql($consulta);
			
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(15,4,$cont,1,0,'C'); 
				$pdf->Cell(20,4,$grupo = $consu->fields('grupo'),1,0,'C');
				$pdf->Cell(90,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
				$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('semestre_ext'),1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		$consu4->MoveNext();
		}
		$pdf->Output();
		}
		
		function est_cultr($periodo,$total,$ciclo)
		{
		
					$consu3="exec extra_actividades_cul";
					$consu4=ejecutar_sql($consu3);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD CULTURALES     PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO:  NO APROBADO    TOTAL ALUMNO: ".$total,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(15,7,"No",1,0,'C');
			$pdf->Cell(20,7,"Grupo",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(20,7,"Carrera",1,0,'C');
			$pdf->Cell(20,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
		$cont=1;
		while(!$consu4->EOF)
		{
		
			$consulta="exec extra_est_actr '".$consu4->Fields('actividad')."','$periodo'";
			$consu=ejecutar_sql($consulta);
			
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(15,4,$cont,1,0,'C'); 
				$pdf->Cell(20,4,$grupo = $consu->fields('grupo'),1,0,'C');
				$pdf->Cell(90,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
				$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('semestre_ext'),1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		$consu4->MoveNext();
		}
		$pdf->Output();
		}
		
		function est_depa($periodo,$total,$ciclo)
		{
		
				$consu3="exec extra_actividades_dep";
				$consu4=ejecutar_sql($consu3);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD DEPORTIVAS     PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO:  APROBADO    TOTAL ALUMNO: ".$total,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(15,7,"No",1,0,'C');
			$pdf->Cell(20,7,"Grupo",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(20,7,"Carrera",1,0,'C');
			$pdf->Cell(20,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
		$cont=1;
		while(!$consu4->EOF)
		{
		
			$consulta="exec extra_est_acta '".$consu4->Fields('actividad')."','$periodo'";
			$consu=ejecutar_sql($consulta);
			
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(15,4,$cont,1,0,'C'); 
				$pdf->Cell(20,4,$grupo = $consu->fields('grupo'),1,0,'C');
				$pdf->Cell(90,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
				$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('semestre_ext'),1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		$consu4->MoveNext();
		}
		$pdf->Output();
		}
		function est_depr($periodo,$total,$ciclo)
		{
		
				$consu3="exec extra_actividades_dep";
				$consu4=ejecutar_sql($consu3);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD DEPORTIVAS     PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO:  APROBADO    TOTAL ALUMNO: ".$total,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(15,7,"No",1,0,'C');
			$pdf->Cell(20,7,"Grupo",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(20,7,"Carrera",1,0,'C');
			$pdf->Cell(20,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
		$cont=1;
		while(!$consu4->EOF)
		{
		
			$consulta="exec extra_est_actr '".$consu4->Fields('actividad')."','$periodo'";
			$consu=ejecutar_sql($consulta);
			
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(15,4,$cont,1,0,'C'); 
				$pdf->Cell(20,4,$grupo = $consu->fields('grupo'),1,0,'C');
				$pdf->Cell(90,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
				$pdf->Cell(20,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('semestre_ext'),1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		$consu4->MoveNext();
		}
		$pdf->Output();
		}
		
		
		function est_espa($periodo,$especialidad,$ciclo,$total)
		{
		
			$consulta="exec extra_est_espa '$especialidad','$periodo'";
			$consu=ejecutar_sql($consulta);
		
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ESPECIALIDAD:  ".catalogo_carreras($especialidad)."     PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO:  APROBADO    TOTAL ALUMNO: ".$total,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(8,7,"No",1,0,'C');
			$pdf->Cell(14,7,"Grupo",1,0,'C'); 
			$pdf->Cell(80,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(43,7,"Carrera",1,0,'C');
			$pdf->Cell(15,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
		$cont=1;
		
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(8,4,$cont,1,0,'C'); 
				$pdf->Cell(14,4,$grupo = $consu->fields('grupo'),1,0,'C');
				$pdf->Cell(80,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
		$pdf->SetFont('Arial','B',9);
				$pdf->Cell(43,4,$consu->fields('actividad'),1,0,'C');
		$pdf->SetFont('Arial','B',10);
				$pdf->Cell(15,4,$consu->fields('semestre_ext'),1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		
		$pdf->Output();
		}
		
		function est_espr($periodo,$especialidad,$ciclo,$total)
		{
		
			$consulta="exec extra_est_espr '$especialidad','$periodo'";
			$consu=ejecutar_sql($consulta);
		
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ESPECIALIDAD:  ".catalogo_carreras($especialidad)."     PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO:  NO APROBADO    TOTAL ALUMNO: ".$total,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(8,7,"No",1,0,'C');
			$pdf->Cell(14,7,"Grupo",1,0,'C'); 
			$pdf->Cell(80,7,"Nombre",1,0,'C'); 
			$pdf->Cell(20,7,"Control",1,0,'C');
			$pdf->Cell(43,7,"Carrera",1,0,'C');
			$pdf->Cell(15,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
		$cont=1;
		
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(8,4,$cont,1,0,'C'); 
				$pdf->Cell(14,4,$grupo = $consu->fields('grupo'),1,0,'C');
				$pdf->Cell(80,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
				$pdf->Cell(20,4,$consu->fields('no_de_control'),1,0,'C');
		$pdf->SetFont('Arial','B',9);
				$pdf->Cell(43,4,$consu->fields('actividad'),1,0,'C');
		$pdf->SetFont('Arial','B',10);
				$pdf->Cell(15,4,$consu->fields('semestre_ext'),1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		
		$pdf->Output();
		}
		
		function est_dep_cul($periodo,$ciclo,$total)
		{
		
			$consulta="exec extra_est_espr '$especialidad','$periodo'";
			$consu=ejecutar_sql($consulta);
		
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDADES CULTURALES-DEPORTIVAS  PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO:  APROBADO    TOTAL ALUMNO: ".$total,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(10,7,"No",1,0,'C');
			$pdf->Cell(15,7,"Grupo",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(25,7,"Control",1,0,'C');
			$pdf->Cell(25,7,"Carrera",1,0,'C');
			$pdf->Cell(20,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
				
		$consu3="exec extra_se_actividades";
		$consu4=ejecutar_sql($consu3);
			$cont=1;
			while(!$consu4->EOF )
			{
			$consulta="exec extra_est_acta '".$consu4->fields('actividad')."','$periodo'";
			$consu=ejecutar_sql($consulta);
		
				while(!$consu->EOF )
				{
					$pdf->Cell(1);		
					$pdf->Cell(10,4,$cont,1,0,'C'); 
					$pdf->Cell(15,4,$grupo = $consu->fields('grupo'),1,0,'C');
					$pdf->Cell(90,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
					$pdf->Cell(25,4,$consu->fields('no_de_control'),1,0,'C');
					$pdf->Cell(25,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
					$pdf->Cell(20,4,$consu->fields('semestre_ext'),1,1,'C');
				$cont++;
				$consu->MoveNext();
				}
			$consu4->MoveNext();
			}
		
		$pdf->Output();
		}
		
		function est_dep_culr($periodo,$ciclo,$total)
		{
		
			/*$consulta="exec extra_est_espr '$especialidad','$periodo'";
			$consu=ejecutar_sql($consulta);*/
		
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDADES CULTURALES-DEPORTIVAS  PERIODO: ".$ciclo,0,1,'C');
			$pdf->Cell(190,8,"RESULTADO: NO APROBADO    TOTAL ALUMNO: ".$total,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(10,7,"No",1,0,'C');
			$pdf->Cell(15,7,"Grupo",1,0,'C'); 
			$pdf->Cell(90,7,"Nombre",1,0,'C'); 
			$pdf->Cell(25,7,"Control",1,0,'C');
			$pdf->Cell(25,7,"Carrera",1,0,'C');
			$pdf->Cell(20,7,"S.Ext",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',10);
				
		$consu3="exec extra_se_actividades";
		$consu4=ejecutar_sql($consu3);
			$cont=1;
			while(!$consu4->EOF )
			{
			$consulta="exec extra_est_actr '".$consu4->fields('actividad')."','$periodo'";
			$consu=ejecutar_sql($consulta);
		
				while(!$consu->EOF )
				{
					$pdf->Cell(1);		
					$pdf->Cell(10,4,$cont,1,0,'C'); 
					$pdf->Cell(15,4,$grupo = $consu->fields('grupo'),1,0,'C');
					$pdf->Cell(90,4,$grupo = $consu->fields('nombre_completo'),1,0,'L'); 
					$pdf->Cell(25,4,$consu->fields('no_de_control'),1,0,'C');
					$pdf->Cell(25,4,catalogo_carreras($consu->fields('carrera')),1,0,'C');
					$pdf->Cell(20,4,$consu->fields('semestre_ext'),1,1,'C');
				$cont++;
				$consu->MoveNext();
				}
			$consu4->MoveNext();
			}
		
		$pdf->Output();
		}
		
		//Historial alumno
		function historia_alumno($control)
		{
			$consulta="exec extra_historial '$control'";
			$consu=ejecutar_sql($consulta);
		
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13); 
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"HISTORIAL ALUMNO",0,1,'C');
			
			$pdf->SetFont('Arial','B',12);
			$pdf->Ln(13);
			$pdf->Cell(1); 
			$pdf->Cell(40,7,"No Control",1,0,'C'); 
			$pdf->Cell(110,7,"Nombre",1,0,'C');
			$pdf->Cell(40,7,"Sem",1,1,'C');
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(1); 
			$pdf->Cell(40,7,$control,1,0,'C'); 
			$pdf->Cell(110,7,$consu->fields('nombre_completo'),1,0,'C');
			$pdf->Cell(40,7,$consu->fields('semestre'),1,1,'C');
		
			$pdf->Ln(13);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(30,7,"Periodo",1,0,'C'); 
			$pdf->Cell(70,7,"Actividad",1,0,'C'); 
			$pdf->Cell(20,7,"Grupo",1,0,'C'); 
			$pdf->Cell(25,7,"Resultado",1,0,'C'); 
			$pdf->Cell(25,7,"Sem Ext",1,0,'C'); 
			$pdf->Cell(20,7,"Sem",1,1,'C');
		
			$pdf->SetFont('Arial','B',10);
			while(!$consu->EOF )
			{
			
			$consu1 = "select identificacion_corta from periodos_escolares  where periodo='".$consu->fields('periodo')."'";
			$consulta1 = ejecutar_sql($consu1);
		
				$pdf->Cell(1);		
				$pdf->Cell(30,4,$consulta1->fields('identificacion_corta'),1,0,'C');
				$pdf->Cell(70,4,$consu->fields('actividad'),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('grupo'),1,0,'C');
				$pdf->Cell(25,4,res($consu->fields('resultado')),1,0,'C');
				$pdf->Cell(25,4,$consu->fields('semestre_ext'),1,0,'C');
				$pdf->Cell(20,4,$consu->fields('semestre_cur'),1,1,'C');
			$consu->MoveNext();
			}
		
		$pdf->Output();
		}
		
		// horarios
		function hor_cul($periodo)
		{
		
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"HORARIOS ACTIVIDADES CULTURALES",0,1,'C');
		
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(43,7,"Actividad",1,0,'C');
			$pdf->Cell(15,7,"Grupo",1,0,'C'); 
			$pdf->Cell(70,7,"Promotor",1,0,'C'); 
			$pdf->Cell(35,7,"Lugar",1,0,'C');
			$pdf->Cell(15,7,"H.Ini",1,0,'C');
			$pdf->Cell(15,7,"H.Fin",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',9);
				
		$consu3="exec extra_actividades_cul";
			$consu4=ejecutar_sql($consu3);
		
				while(!$consu4->EOF)
				{
				$consulta = "exec extra_se_grupos_h '".$consu4->Fields('actividad')."','".$periodo."'";
				$consulta2 = ejecutar_sql($consulta);
					
					while(!$consulta2->EOF )
					{
					$pdf->Cell(1);				
						$horai = $consulta2->fields('hora_inicial');
						$horaf = $consulta2->fields('hora_final');
						$horai = substr($horai,12,7);
						$horaf = substr($horaf,12,7);
					$pdf->Cell(43,4,$consulta2->fields('actividad'),1,0,'C'); 
					$pdf->Cell(15,4,$consulta2->fields('grupo'),1,0,'C');
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(70,4,promotor($consulta2->fields('rfc')),1,0,'L'); 
					$pdf->SetFont('Arial','B',9);
					$pdf->Cell(35,4,$consulta2->fields('lugar'),1,0,'C');
					$pdf->Cell(15,4,$horai,1,0,'C');
					$pdf->Cell(15,4,$horaf,1,1,'C');
				
				$consulta2->MoveNext();
				}
			$consu4->MoveNext();
			}
		
		$pdf->Output();
		}
		
		function hor_dep($periodo)
		{
		
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"HORARIOS ACTIVIDADES DEPORTIVAS",0,1,'C');
		
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(43,7,"Actividad",1,0,'C');
			$pdf->Cell(15,7,"Grupo",1,0,'C'); 
			$pdf->Cell(70,7,"Promotor",1,0,'C'); 
			$pdf->Cell(35,7,"Lugar",1,0,'C');
			$pdf->Cell(15,7,"H.Ini",1,0,'C');
			$pdf->Cell(15,7,"H.Fin",1,1,'C'); 
		
			$pdf->SetFont('Arial','B',9);
				
		$consu3="exec extra_actividades_dep";
			$consu4=ejecutar_sql($consu3);
		
				while(!$consu4->EOF)
				{
				$consulta = "exec extra_se_grupos_h '".$consu4->Fields('actividad')."','".$periodo."'";
				$consulta2 = ejecutar_sql($consulta);
					
					while(!$consulta2->EOF )
					{
					$pdf->Cell(1);				
						$horai = $consulta2->fields('hora_inicial');
						$horaf = $consulta2->fields('hora_final');
						$horai = substr($horai,12,7);
						$horaf = substr($horaf,12,7);
					$pdf->Cell(43,4,$consulta2->fields('actividad'),1,0,'C'); 
					$pdf->Cell(15,4,$consulta2->fields('grupo'),1,0,'C');
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(70,4,promotor($consulta2->fields('rfc')),1,0,'L'); 
					$pdf->SetFont('Arial','B',9);
					$pdf->Cell(35,4,$consulta2->fields('lugar'),1,0,'C');
					$pdf->Cell(15,4,$horai,1,0,'C');
					$pdf->Cell(15,4,$horaf,1,1,'C');
				
				$consulta2->MoveNext();
				}
			$consu4->MoveNext();
			}
		
		$pdf->Output();
		}
		
		// listas
		
		
		function listas($periodo,$actividad,$grupo,$ciclo,$hora)
		{
					$consulta="exec extra_consulta_inscripcion '$actividad','$periodo','$grupo'";
					$consu=ejecutar_sql($consulta);
		$pdf=new FPDF();
		$pdf->AddPage();
		
			$pdf->SetFont('Arial','B',13);
				
			$pdf->Ln(8); 
			$pdf->cell(1);
			$pdf->Cell(190,8,"INSTITUTO TECNOLOGICO DE DURANGO",0,1,'C');
			$pdf->Cell(190,8,"DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES",0,1,'C');	 
			$pdf->Cell(190,8,"ACTIVIDAD: ".$actividad."   GRUPO: ".$grupo,0,1,'C');
			$pdf->Cell(190,8,"PERIODO: ".$ciclo."   HORARIO: ".$hora,0,1,'C');
		
			$pdf->Ln(8);
			$pdf->Cell(1);
			$pdf->SetFont('Arial','B',12); 
			$pdf->Cell(10,7,"No",1,0,'C'); 
			$pdf->Cell(75,7,"Nombre",1,0,'C'); 
			$pdf->Cell(80,7,"Asistencia",1,0,'C');
			$pdf->Cell(25,7,"Resultado",1,1,'C');
		
			$pdf->SetFont('Arial','B',10);
			$cont=1;
			while(!$consu->EOF )
			{
				$pdf->Cell(1);		
				$pdf->Cell(10,4,$cont,1,0,'C'); 
				$pdf->Cell(75,4,$consu->fields('nombre_completo'),1,0,'L'); 
			for($i=0;$i<40;$i++)
			{	
				$pdf->Cell(2,4,"",1,0,'C');
			}
				$pdf->Cell(25,4,"",1,1,'C');
			$cont++;
			$consu->MoveNext();
			}
		
		$pdf->Output();
		
		}


//}
?>
