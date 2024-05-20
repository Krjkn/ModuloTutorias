<?php 
include "encabezadoalumno.php";
$user = $usuario;
$no_de_control = $user;
$qry_periodos = "select Max(periodo) as periodo from periodos_escolares ";$res_periodos = ejecuta_consultaf($qry_periodos);while ($fila = $res_periodos->fetch_assoc()) {	$periodo 		  = $fila['periodo'];}

$qry_alumnos1="select rfc from evaluaprof where  no_de_control = '$no_de_control' and periodo = '$periodo'";
$res_alumnos1 = ejecuta_consulta($qry_alumnos1);
while ($fila1 = $res_alumnos1->fetch_assoc()) {
	$rfc   = $fila1['rfc'];
}
if(empty($rfc)){
?>
<body>
<div id="mainFrame">
<form method="get" action="califprof.php">
	<table width="100%" border="1">
    	<tr>
        	<th> Genera un clima de confianza que permite el logro de los propósitos de la tutoría  </th>
			<th> Genera confianza y buena comunicación con todo el grupo. Hace agradable la sesión de Tutoría. Escucha con atención todo lo que se le solicita Se muestra empático con las consultas que se le hacen.
			<br><br>
			<input type="radio" name="confianza" value="5"  checked>Nivel 5
			</th>
			<br>
			<th>Genera confianza y buena comunicación con todo el grupo. Hace agradable la sesión de Tutoría Escucha con atención todo lo que se le solicita 
			<br><br>
			<input type="radio" name="confianza" value="4">Nivel 4
			</th>
			<br>
			<th> Genera confianza y buena comunicación con todo el grupo. Hace agradable la sesión de Tutoría. 
			<br><br>
			<input type="radio" name="confianza" value="3">Nivel 3
			</th>
			<br>
			<th> Genera confianza y buena comunicación con todo el grupo. 
			<br><br>
			<input type="radio" name="confianza" value="2">Nivel 2
			</th>
			<br>
			<th> Se comunica con todo el grupo. 
			<br><br>
			<input type="radio" name="confianza" value="1">Nivel 1
			</th>
			<br>
        </tr>
		<tr>
			<th> Calidad de la información proporcionada al tutorado   </th>
			<th> Da información necesaria sobre el programa de tutoría. Provee información adecuada para realizar trámites escolares. Brinda información suficiente sobre los apoyos que requiere el estudiante. Da información y orientación importante que apoye el área personal del tutorado. 
			<br><br>
			<input type="radio" name="calidad" value="5" checked>Nivel 5
			</th>
			<br>
			<th>Da información necesaria sobre el programa de tutoría. Provee información adecuada para realizar trámites escolares.Brinda información suficiente sobre los apoyos que requiere el estudiante. Da información y orientación importante que apoye el área personal del tutorado. Informa con precisión sobre las asesorías académicas que ofrecen los docentes de su carrera

			<br><br>
			<input type="radio" name="calidad" value="4">Nivel 4
			</th>
			<br>
			<th> Da información necesaria sobre el programa de tutoría. Provee de la información adecuada para realizar trámites  escolares. Brinda información suficiente sobre los apoyos que requiere el estudiante.
			<br><br>
			<input type="radio" name="calidad" value="3">Nivel 3
			</th>
			<br>
			<th> Da información necesaria sobre el programa de tutoría. Provee de la información adecuada para realizar trámites  escolares. 
			<br><br>
			<input type="radio" name="calidad" value="2">Nivel 2
			</th>
			<br>
			<th> Comenta en que consiste el programa de tutoría. 
			<br><br>
			<input type="radio" name="calidad" value="1">Nivel 1
			</th>
			<br>
		</tr>
		
		<tr>
			<th>Disponibilidad y calidad en la atención tutorial   </th>
			<th> Se le puede localizar en cualquier momento. 
Entregó su horario y localización desde el inicio del semestre. 
Atiende con amabilidad cada que se le necesita.
Canaliza a los tutorados siempre que tienen algún problema y que él no pueda resolver. 
Realiza su función tutorial con disponibilidad y calidad. 
Le da seguimiento a los tutorados que ha canalizado. 
 
			<br><br>
			<input type="radio" name="disponibilidad" value="5" checked>Nivel 5
			</th>
			<br>
			<th>Se le puede localizar en cualquier momento. 
Entregó su horario y localización desde el inicio del semestre. 
Atiende con amabilidad cada que se le necesita.
Canaliza a los tutorados siempre que tienen algún problema y que él no pueda resolver
			<br><br>
			<input type="radio" name="disponibilidad" value="4">Nivel 4
			</th>
			<br>
			<th>Entregó su horario y localización desde el inicio del semestre. 
Atiende con amabilidad cada que se le necesita.
Canaliza a los tutorados siempre que tienen algún problema y que él no pueda resolver. 
			<br><br>
			<input type="radio" name="disponibilidad" value="3">Nivel 3
			</th>
			<br>
			<th> Atiende con amabilidad cada que se le necesita.
Canaliza a los tutorados siempre que tienen algún problema y que él no pueda resolver. 
			<br><br>
			<input type="radio" name="disponibilidad" value="2">Nivel 2
			</th>
			<br>
			<th> Atiende con amabilidad cada que se le necesita
			<br><br>
			<input type="radio" name="disponibilidad" value="1">Nivel 1
			</th>
			<br>
		</tr>
		<tr>
			<th>Planeación y preparación en los procesos de la Tutoría  </th>
			<th> Muestra tener las herramientas necesarias para atender el grupo y/o individualmente. 
Realiza la programación de las sesiones considerando los tiempos disponibles de los estudiantes.
Muestra evidencia de que planeó las sesiones individuales y grupales con sus tutorados pues lleva un orden en sus actividades.
Realiza sus actividades como tutor respetando los tiempos disponibles para ello. 
Planea, ejecuta y evalúa su actividad tutorial.
 
 
			<br><br>
			<input type="radio" name="planeacion" value="5" checked>Nivel 5
			</th>
			<br>
			<th>Muestra tener las herramientas necesarias para atender el grupo y/o individualmente. 
Realiza la programación de las sesiones considerando los tiempos disponibles de los estudiantes.
Muestra evidencia de que planeó las sesiones individuales y grupales con sus tutorados pues lleva un orden en sus actividades. 
Realiza sus actividades como tutor respetando los tiempos disponibles para ello. 
			<br><br>
			<input type="radio" name="planeacion" value="4">Nivel 4
			</th>
			<br>
			<th>Muestra tener las herramientas necesarias para atender el grupo y/o individualmente. 
Realiza la programación de las sesiones considerando los tiempos disponibles de los estudiantes.
Muestra evidencia de que planeó las sesiones individuales y grupales con sus tutorados pues lleva un orden en sus actividades.
			<br><br>
			<input type="radio" name="planeacion" value="3">Nivel 3
			</th>
			<br>
			<th> Muestra tener las herramientas necesarias para atender el grupo y/o individualmente. 
Realiza la programación de las sesiones considerando los tiempos disponibles de los estudiantes.
			<br><br>
			<input type="radio" name="planeacion" value="2">Nivel 2
			</th>
			<br>
			<th> Muestra  necesarias para atender el grupo y/o individualmente. 
			<br><br>
			<input type="radio" name="planeacion" value="1">Nivel 1			<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
			</th>
			<br>
		</tr>		<tr>		<th> Te sugerimos hacer un comentario con respecto al tutor recuerda que tu comentario es confidencial  </th>		<th colspan="5">				<br><br>				<input type="text"   size="250" name="comentario" value="">		</th>		</tr>
    </table>
    <br />
    <div align="center">
        <input type="submit" value="Procesar" class="boton" />
       
        <input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasaalu.php?usuario=<?php echo $usuario; ?>'"> 
    </div>
</form>
</div>
</body>
<?php
}
else
{
	echo "<div id='mainFrame'>  <center><h3>Ya evaluaste Gracias</h3></center>	</div> ";
	
}

?>

