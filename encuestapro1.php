<?php 
include "docencabezado.php";

$no_de_control = $_GET["materia"];
$qry_alumnos="select concat(nombre_alumno,' ',apellido_paterno,' ',apellido_materno) as nombre ,sexo from alumnos where  no_de_control = '$no_de_control'";
$res_alumnos = ejecuta_consulta($qry_alumnos);
while ($fila = $res_alumnos->fetch_assoc()) {
	$nombre   = $fila['nombre'];
	$sexo 	  = $fila['sexo'];
}
$qry_encuesta="select * from encuesta1 where  no_de_control = '$no_de_control'";
$res_encuesta = ejecuta_consulta($qry_encuesta);
while ($fila = $res_encuesta->fetch_assoc()) {
	$estatura = $fila['estatura'];  
	$peso = $fila['peso'];  $fechanacimiento = $fila['fechanacimiento'];  $estadocivil = $fila['estadocivil'];
	$trabaja = $fila['trabaja'];  $lugarnacimiento = $fila['lugarnacimiento'];  $domicilioactual = $fila['domicilioactual'];
	$telefono = $fila['telefono'];  $celular = $fila['celular'];  $codigopostal = $fila['codigopostal'];
	$otrocorreo = $fila['otrocorreo'];  $otrocorreo = $fila['otrocorreo'];  $otrocorreo = $fila['otrocorreo'];
	$tipovivienda = $fila['tipovivienda'];  $casapropia = $fila['casapropia'];  $numpersonasvives = $fila['numpersonasvives'];
	$nombrepadre = $fila['nombrepadre'];  $edadpadre = $fila['edadpadre'];  $trabajapadre= $fila['trabajapadre'];
	$profesion = $fila['profesion'];  $tipotrabajopadre = $fila['tipotrabajopadre'];  $domiciliopadre = $fila['domiciliopadre'];
	$telefonopadre = $fila['telefonopadre'];  $nombremadre = $fila['nombremadre'];  $profesionmadre = $fila['profesionmadre'];
	$tipotrabajomadre = $fila['tipotrabajomadre'];  $domiciliomadre = $fila['domiciliomadre'];  $telefonomadre = $fila['telefonomadre'];
	$nomhermano1 = $fila['nomhermano1'];  $fechanaci1 = $fila['fechanaci1'];  $sexo1 = $fila['sexo1'];$estudios1 = $fila['estudios1'];
	$nomhermano2 = $fila['nomhermano2'];  $fechanaci2 = $fila['fechanaci2'];  $sexo2 = $fila['sexo2'];$estudios2 = $fila['estudios2'];
	$nomhermano3 = $fila['nomhermano3'];  $fechanaci3 = $fila['fechanaci3'];  $sexo3 = $fila['sexo3'];$estudios3 = $fila['estudios3'];
	$nomhermano4 = $fila['nomhermano4'];  $fechanaci4 = $fila['fechanaci4'];  $sexo4 = $fila['sexo4'];$estudios4 = $fila['estudios4'];
	$nomhermano5 = $fila['nomhermano5'];  $fechanaci5 = $fila['fechanaci5'];  $sexo5 = $fila['sexo5'];$estudios5 = $fila['estudios5'];
	$nomhermano6 = $fila['nomhermano6'];  $fechanaci6 = $fila['fechanaci6'];  $sexo6 = $fila['sexo6'];$estudios6 = $fila['estudios6'];
	$nomhermano7 = $fila['nomhermano7'];  $fechanaci7 = $fila['fechanaci7'];  $sexo7 = $fila['sexo7'];$estudios7 = $fila['estudios7'];
	$nomhermano8 = $fila['nomhermano8'];  $fechanaci8 = $fila['fechanaci8'];  $sexo8 = $fila['sexo8'];$estudios8 = $fila['estudios8'];
	$nomhermano9 = $fila['nomhermano9'];  $fechanaci9 = $fila['fechanaci9'];  $sexo9 = $fila['sexo9'];$estudios9 = $fila['estudios9'];
	$ingresosfamilia = $fila['ingresosfamilia'];  $tusingresos = $fila['tusingresos'];  $primariaestu = $fila['primariaestu'];
	$secunadariaestu = $fila['secunadariaestu'];  $prepaestu = $fila['prepaestu'];  $deficiencia = $fila['deficiencia'];
	}
$res_encuesta->free();
$regresar = "javascript: document.location = 'index.html'";
?>
<div id="mainFrame">
<form action="encuestapro2.php" method="get" name="form1"   target="mainFrame">
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">DATOS GENERALES</font></h3></td></tr>
	</table>
	<table width="100%">
		<tr><th>Nombre Alumno:</th>
		<td><input type="text" name="nombre" value="<?php echo $nombre ?>" size="60" readonly="true"/></td>
		<th>Feha de Nacimiento:</th><td>
			<input name="fechanacimiento" type="text" id="fechanacimiento" value="<?php echo $fechanacimiento; ?>" size="10" maxlength="10" readonly="true">
			</td>
		<th>Estatura:</th>
		<td><input type="text" name="estatura" value="<?php echo $estatura ?>" size="10" readonly="true"/></td>	
		<th>Peso:</th>
		<td><input type="text" name="peso" value="<?php echo $peso ?>" size="10" readonly="true"/></td>
			
		<td>
		<th>Sexo:</th><td>
		<input type="text" name="sexo" value="<?php echo $sexo ?>" size="10" readonly="true"/>
		</td></tr>
	</table>
	<table width="100%">	
		<tr><th >Estado Civil:</th><td>
		<input type="text" name="estadocivil" value="<?php echo $estadocivil ?>" size="10" readonly="true"/>
		</td>
		<th>Trabajas:</th>
		<td>
		<input type="text" name="trabaja" value="<?php echo $trabaja ?>" size="10" readonly="true"/>
		</td>
		<th>Lugar de Nacimiento:</th>
		<td><input type="text" name="lugarnacimiento" value="<?php echo $lugarnacimiento ?>" size="60" readonly="true"/></td>
		<th>Domicilio Actual:</th>
		<td><input type="text" name="domicilioactual" value="<?php echo $domicilioactual ?>"  size="60" readonly="true"/></td>
		</tr>
	</table>
	<table  width="100%">	
		<tr><th>Telefono de Casa:</th>
		<td><input type="text" name="telefono" value="<?php echo $telefono  ?>" size="15" readonly="true"/></td>
		<th>Telefono Celular:</th>
		<td><input type="text" name="celular" value="<?php echo $celular ?>" size="20" readonly="true"/></td>
		<th>Codigo Postal:</th>
		<td><input type="text" name="codigopostal" value="<?php echo $codigopostal  ?>"  size="20" readonly="true"/></td>
		<th>Correo que no sea el intitucional:</th>
		<td><input type="text" name="otrocorreo" value="<?php echo $otrocorreo ?>"  size="50" readonly="true"/></td></tr>
	</table>
	<table width="100%">	
		<tr><th>Tipo de vivienda:</th>
		<td>
		<input type="text" name="tipovivienda" value="<?php echo $tipovivienda ?>" size="10" readonly="true"/>
		</td>
		<th>La casa es propia:</th>
		<td>
		<input type="text" name="casapropia" value="<?php echo $casapropia ?>" size="10" readonly="true"/>
		</td>
		<th>Numero de personas con las que vives:</th>
		<td><input type="text" name="numpersonasvives" value="<?php echo $numpersonasvives  ?>"  size="10" readonly="true"/></td>
		<th>Nombre de tu Padre:</th>
		<td><input type="text" name="nombrepadre" value="<?php echo $nombrepadre  ?>"  size="50" readonly="true"/></td></tr>
	</table>
	<table>
		<tr><th>Edad de tu padre:</th>
		<td><input type="text" name="edadpadre" value="<?php echo $edadpadre  ?>"  size="15" readonly="true"/></td>
		<th>Trabaja tu padre:</th>
		<td>
		<input type="text" name="trabajapadre" value="<?php echo $trabajapadre ?>" size="10" readonly="true"/>
		</td>
		<th>Profesion de tu padre:</th>
		<td><input type="text" name="profesion" value="<?php echo $profesion  ?>"  size="20" readonly="true"/></td>
		<th>Tipo de trabajo de tu padre:</th>
		<td><input type="text" name="tipotrabajopadre" value="<?php echo $tipotrabajopadre    ?>"  size="20" readonly="true"/></td>
		<th>Domicilio de tu padre:</th>
		<td><input type="text" name="domiciliopadre" value="<?php echo $domiciliopadre   ?>"  size="50" readonly="true"/></td></tr>
	</table>
	<table>
		<tr><th>Telefono del padre:</th>
		<td><input type="text" name="telefonopadre" value="<?php echo $telefonopadre   ?>"  size="15" readonly="true"/></td>
		<th>Nombre de tu Madre:</th>
		<td><input type="text" name="nombremadre" value="<?php echo $nombremadre   ?>"  size="20" readonly="true"/></td>
		<th>Profesion de tu Madre:</th>
		<td><input type="text" name="profesionmadre" value="<?php echo $profesionmadre     ?>"  size="20" readonly="true"/></td>
		<th>Tipo de trabajo de tu Madre:</th>
		<td><input type="text" name="tipotrabajomadre" value="<?php echo $tipotrabajomadre    ?>"  size="50" readonly="true"/></td></tr>
	</table>
	<table>
		<tr><th>Domicilio Madre:</th>
		<td><input type="text" name="domiciliomadre" value="<?php echo $domiciliomadre    ?>"  size="15" readonly="true"/></td>
		<th>Telefono de la Madre:</th>
		<td><input type="text" name="telefonomadre" value="<?php echo $telefonomadre    ?>"  size="20" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre Hermano(a)1:</th>
		<td><input type="text" name="nomhermano1" value="<?php echo $nomhermano1      ?>"  size="60" readonly="true"/></td>
		<th>Fecha Nacimiento:</th>
		<td>
		<input name="fechanaci1" type="text" id="fechanaci1" value="<?php echo $fechanaci1; ?>" size="10" maxlength="10" readonly="true">
		</td>
		<th>Sexo:</th>
		<td>
		<input type="text" name="sexo1" value="<?php echo $sexo1 ?>" size="10" readonly="true"/>
		</td>
		<th>Estudios:</th>
		<td><input type="text" name="estudios1" value="<?php echo $estudios1      ?>"  size="40" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre Hermano(a)2:</th>
		<td><input type="text" name="nomhermano2" value="<?php echo $nomhermano2      ?>"  size="60" readonly="true"/></td>
		<th>Fecha Nacimiento:</th>
		<td>
		<input name="fechanaci2" type="text" id="fechanaci2" value="<?php echo $fechanaci2; ?>" size="10" maxlength="10" readonly="true">
		</td>
		<th>Sexo:</th>
		<td>
		<input type="text" name="sexo2" value="<?php echo $sexo2 ?>" size="10" readonly="true"/>
		</td>
		<th>Estudios:</th>
		<td><input type="text" name="estudios2" value="<?php echo $estudios2      ?>"  size="40" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre Hermano(a)3:</th>
		<td><input type="text" name="nomhermano3" value="<?php echo $nomhermano3      ?>"  size="60" readonly="true"/></td>
		<th>Fecha Nacimiento:</th>
		<td>
		<input name="fechanaci3" type="text" id="fechanaci3" value="<?php echo $fechanaci3; ?>" size="10" maxlength="10" readonly="true">
		</td>
		<th>Sexo:</th>
		<td>
		<input type="text" name="sexo3" value="<?php echo $sexo3 ?>" size="10" readonly="true"/>
		</td>
		<th>Estudios:</th>
		<td><input type="text" name="estudios3" value="<?php echo $estudios3      ?>"  size="40" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre Hermano(a)4:</th>
		<td><input type="text" name="nomhermano4" value="<?php echo $nomhermano4      ?>"  size="60" readonly="true"/></td>
		<th>Fecha Nacimiento:</th>
		<td>
		<input name="fechanaci4" type="text" id="fechanaci4" value="<?php echo $fechanaci4; ?>" size="10" maxlength="10" readonly="true">
		</td>
		<th>Sexo:</th>
		<td>
		<input type="text" name="sexo4" value="<?php echo $sexo4 ?>" size="10" readonly="true"/>
		</td>
		<th>Estudios:</th>
		<td><input type="text" name="estudios4" value="<?php echo $estudios4      ?>"  size="40" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre Hermano(a)5:</th>
		<td><input type="text" name="nomhermano5" value="<?php echo $nomhermano5      ?>"  size="60" readonly="true"/></td>
		<th>Fecha Nacimiento:</th>
		<td>
		<input name="fechanaci5" type="text" id="fechanaci5" value="<?php echo $fechanaci5; ?>" size="10" maxlength="10" readonly="true">
		</td>
		<th>Sexo:</th>
		<td>
		<input type="text" name="sexo5" value="<?php echo $sexo5 ?>" size="10" readonly="true"/>
		</td>
		<th>Estudios:</th>
		<td><input type="text" name="estudios5" value="<?php echo $estudios5      ?>"  size="40" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre Hermano(a)6:</th>
		<td><input type="text" name="nomhermano6" value="<?php echo $nomhermano6      ?>"  size="60" readonly="true"/></td>
		<th>Fecha Nacimiento:</th>
		<td>
		<input name="fechanaci6" type="text" id="fechanaci6" value="<?php echo $fechanaci6; ?>" size="10" maxlength="10" readonly="true">
		</td>
		<th>Sexo:</th>
		<td>
		<input type="text" name="sexo6" value="<?php echo $sexo6 ?>" size="10" readonly="true"/>
		</td>
		<th>Estudios:</th>
		<td><input type="text" name="estudios6" value="<?php echo $estudios6      ?>"  size="40" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre Hermano(a)7:</th>
		<td><input type="text" name="nomhermano7" value="<?php echo $nomhermano7      ?>"  size="60" readonly="true"/></td>
		<th>Fecha Nacimiento:</th>
		<td>
		<input name="fechanaci7" type="text" id="fechanaci7" value="<?php echo $fechanaci7; ?>" size="10" maxlength="10" readonly="true">
		</td>
		<th>Sexo:</th>
		<td>
		<input type="text" name="sexo7" value="<?php echo $sexo7 ?>" size="10" readonly="true"/>
		</td>
		<th>Estudios:</th>
		<td><input type="text" name="estudios7" value="<?php echo $estudios7      ?>"  size="40" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre Hermano(a)8:</th>
		<td><input type="text" name="nomhermano8" value="<?php echo $nomhermano8      ?>"  size="60" readonly="true"/></td>
		<th>Fecha Nacimiento:</th>
		<td>
		<input name="fechanaci8" type="text" id="fechanaci8" value="<?php echo $fechanaci8; ?>" size="10" maxlength="10" readonly="true">
		</td>
		<th>Sexo:</th>
		<td>
		<input type="text" name="sexo8" value="<?php echo $sexo8 ?>" size="10" readonly="true"/>
		</td>
		<th>Estudios:</th>
		<td><input type="text" name="estudios8" value="<?php echo $estudios8      ?>"  size="40" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre Hermano(a)9:</th>
		<td><input type="text" name="nomhermano9" value="<?php echo $nomhermano9      ?>"  size="60" readonly="true"/></td>
		<th>Fecha Nacimiento:</th>
		<td>
		<input name="fechanaci9" type="text" id="fechanaci9" value="<?php echo $fechanaci9; ?>" size="10" maxlength="10" readonly="true">
		</td>
		<th>Sexo:</th>
		<td>
		<input type="text" name="sexo9" value="<?php echo $sexo9 ?>" size="10" readonly="true"/>
		</td>
		<th>Estudios:</th>
		<td><input type="text" name="estudios9" value="<?php echo $estudios9      ?>"  size="40" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Ingresos de toda la familia:</th>
		<td><input type="text" name="ingresosfamilia" value="<?php echo $ingresosfamilia       ?>"  size="60" readonly="true"/></td>
		<th>Tus Ingresos:</th>
		<td><input type="text" name="tusingresos" value="<?php echo $tusingresos      ?>"  size="20" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Nombre de Primaria:</th>
		<td><input type="text" name="primariaestu" value="<?php echo $primariaestu       ?>"  size="30" readonly="true"/></td>
		<th>Nombre Secundaria:</th>
		<td><input type="text" name="secunadariaestu" value="<?php echo $secunadariaestu      ?>"  size="30" readonly="true"/></td>
		<th>Nombre Preparatoria:</th>
		<td><input type="text" name="prepaestu" value="<?php echo $prepaestu        ?>"  size="30" readonly="true"/></td></tr>
	  <table width="100%">	
		<tr><th>¿Cuenta con prescripción médica de alguna deficiencia sensorial que te obligue a llevar aparatos?:</th>
		<td>
		<input type="text" name="deficiencia" value="<?php echo $deficiencia ?>" size="10" readonly="true"/>
		<input type="hidden" name="no_de_control" value="<?php echo $no_de_control?>">
		<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
		</tr>
		</table>
	</table>
	<br />
	<center><input type="submit" value="Continua" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'" /></center>
</form>
</div>
