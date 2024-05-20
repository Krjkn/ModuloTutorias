<?php 
include "encabezadoalumno.php";
$user = $usuario;
function festado($valor=NULL)
{
$valores = ['Nunca','Frecuente','Muy Frecuente','A veces','Antes'];
$i = 0;
$opciones = "";
	while ($i < 5){
		$s = ($valor == trim($valores[$i]))?" selected":"";
		$opciones.= '<option value="'.$valores[$i].'" '.$s.'>'.$valores[$i].'</option>';
		$i++;
	}
return $opciones;
}

function fligado($valor=NULL)
{
$valores = ['Madre','Padre','Hermano','Otro'];
$i = 0;
$opciones = "";
	while ($i < 4){
		$s = ($valor == trim($valores[$i]))?" selected":"";
		$opciones.= '<option value="'.$valores[$i].'" '.$s.'>'.$valores[$i].'</option>';
		$i++;
	}
return $opciones;
}
function frelacion($valor=NULL)
{
$valores = ['Buena','Mala','Regular'];
$i = 0;
$opciones = "";
	while ($i < 3){
		$s = ($valor == trim($valores[$i]))?" selected":"";
		$opciones.= '<option value="'.$valores[$i].'" '.$s.'>'.$valores[$i].'</option>';
		$i++;
	}
return $opciones;
}
$no_de_control = $user;
foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
$actualiza="update encuesta1 set 
fechanacimiento = '$fechanacimiento',		
estadocivil 	= '$estadocivil',		
trabaja 	= '$trabaja',		
lugarnacimiento = '$lugarnacimiento',		
domicilioactual = '$domicilioactual',
telefono 	= '$telefono',		
celular = '$celular',		
codigopostal = '$codigopostal',	otrocorreo = '$otrocorreo',
tipovivienda = '$tipovivienda',		
casapropia 		= '$casapropia',	
nombrepadre = '$nombrepadre',			
trabajapadre 	= '$trabajapadre',		
profesion 		= '$profesion',	
tipotrabajopadre = '$tipotrabajopadre',		
domiciliopadre 	= '$domiciliopadre',		
telefonopadre 	= '$telefonopadre',		
nombremadre 	= '$nombremadre',		
profesionmadre 	= '$profesionmadre',		
tipotrabajomadre 	= '$tipotrabajomadre',	
domiciliomadre 	= '$domiciliomadre',		
telefonomadre 	= '$telefonomadre',		
nomhermano1 	= '$nomhermano1',		
fechanaci1 	= '$fechanaci1',		
sexo1 			= '$sexo1',	
estudios1 		= '$estudios1',	
nomhermano2 = '$nomhermano2',			
fechanaci2 		= '$fechanaci2',	
sexo2 		= '$sexo2',		
estudios2 		= '$estudios2',	
nomhermano3 	= '$nomhermano3',		
fechanaci3 		= '$fechanaci3',	
sexo3 		= '$sexo3',	
estudios3 		= '$estudios3',	 
nomhermano4 = '$nomhermano4',			
fechanaci4 	= '$fechanaci4',	
sexo4 	= '$sexo4',			
estudios4 	= '$estudios4',		 
nomhermano5	= '$nomhermano5',
fechanaci5 	= '$fechanaci5',	
sexo5 	= '$sexo5',		
estudios5 	= '$estudios5',	
nomhermano6 = '$nomhermano6',		
fechanaci6 	= '$fechanaci6',		
sexo6 	= '$sexo6',	
estudios6 	= '$estudios6',	
nomhermano7 = '$nomhermano7',	
fechanaci7 	= '$fechanaci7',	
sexo7 	= '$sexo7',			
estudios7 = '$estudios7',
nomhermano8 = '$nomhermano8',		
fechanaci8 	= '$fechanaci8',	
sexo8 	= '$sexo8',		
estudios8 	= '$estudios8',	
nomhermano9 	= '$nomhermano9',
fechanaci9 	= '$fechanaci9',	
sexo9 	= '$sexo9',		
estudios9 	= '$estudios9',	
primariaestu 	= '$primariaestu',	
secunadariaestu = '$secunadariaestu',	
prepaestu 	= '$prepaestu',		
deficiencia   = '$deficiencia'
where  no_de_control = '$no_de_control'";
$inserta = "insert into encuesta1(no_de_control) values('$no_de_control')";
ejecuta_consulta($inserta);
ejecuta_consulta($actualiza);

$actualiza="update encuesta1 set 
estatura = '$estatura'
where  no_de_control = '$no_de_control'";
ejecuta_consulta($actualiza);

$actualiza="update encuesta1 set			
peso 	= '$peso',			sexo 	= '$sexo',	
numpersonasvives = '$numpersonasvives',		
edadpadre 	= '$edadpadre'		
where  no_de_control = '$no_de_control'";
ejecuta_consulta($actualiza);

$actualiza="update encuesta1 set
ingresosfamilia = '$ingresosfamilia',	
tusingresos 	= '$tusingresos'	
where  no_de_control = '$no_de_control'";
ejecuta_consulta($actualiza);
$msg = 'Datos actualizados continua con tu entrevista';
// fin de actualizacion encuestaa
$qry_encuesta="select * from encuesta2 where  no_de_control = '$no_de_control'";
$res_encuesta = ejecuta_consulta($qry_encuesta);

while ($fila = $res_encuesta->fetch_assoc()) {
	$manospieshinchados = $fila['manospieshinchados'];  $dolorvientre = $fila['dolorvientre'];  $dolorcabeza = $fila['dolorcabeza'];
	$perderequilibrio = $fila['perderequilibrio'];  $fatiga = $fila['fatiga'];  $perdervistaoido = $fila['perdervistaoido'];
	$dificildormir = $fila['dificildormir'];  $pesadillas = $fila['pesadillas'];  $incontinencia = $fila['incontinencia'];
	$tartamudo = $fila['tartamudo'];  $Miedointenso = $fila['Miedointenso'];  $comorelfamilia = $fila['comorelfamilia'];
	$dificultadestipo = $fila['dificultadestipo'];  $queactitudfamilia = $fila['queactitudfamilia'];  $relacionpadre = $fila['relacionpadre'];
	$tuactitudpadre = $fila['tuactitudpadre'];  $relacionmadre = $fila['relacionmadre'];  $tuactitudmadre = $fila['tuactitudmadre'];
	$relacion1 = $fila['relacion1'];  $actitud1 = $fila['actitud1'];  $relacion2 = $fila['relacion2']; $actitud2 = $fila['actitud2']; 
	$relacion3 = $fila['relacion3'];  $actitud3 = $fila['actitud3'];  $relacion4 = $fila['relacion4']; $actitud4 = $fila['actitud4'];
	$relacion5 = $fila['relacion5'];  $actitud5 = $fila['actitud5'];  $relacion6 = $fila['relacion6']; $actitud6 = $fila['actitud6'];
	$relacion7 = $fila['relacion7'];  $actitud7 = $fila['actitud7'];  $relacion8 = $fila['relacion8']; $actitud8 = $fila['actitud8'];
	$relacion9 = $fila['relacion9'];  $actitud9 = $fila['actitud9'];  
	$ligadoafectivamente = $fila['ligadoafectivamente'];  $razonliga = $fila['razonliga'];  $influidocarrera = $fila['influidocarrera'];
	$considerafamilia = $fila['considerafamilia'];  $relacioncompas = $fila['relacioncompas'];  $porque = $fila['porque'];
	$relacionamigos = $fila['relacionamigos'];  $tienespareja = $fila['tienespareja'];  $comopareja = $fila['comopareja'];
	$comoprofe = $fila['comoprofe'];  $comoacademi = $fila['comoacademi'];  $tiempolibre = $fila['tiempolibre'];
	$recreativa = $fila['recreativa'];  
}
$res_encuesta->free();

?>

<body>
<div id="mainFrame">
<script type="text/javascript">
	alert("<?php echo $msg; ?>");
</script>
<form action="encuesta3.php" method="get" name="form1">
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">DATOS PSICOFISIOLÓGICOS</font></h3></td></tr>
	</table>
	<table width="100%">
		<tr><td height="10"></td></tr>
		<tr colspan="10"><th>Se te inchan manos o pies:</th>
		<td>
		<select name="manospieshinchados">
        	<?php echo festado($manospieshinchados); ?>
        </select>
		</td>
		<th>Dolor del Vientre:</th>
		<td>
		<select name="dolorvientre">
        	<?php echo festado($dolorvientre); ?>
        </select>
		</td>	
		<th>Dolor de Cabeza:</th>
		<td>
		<select name="dolorcabeza">
        	<?php echo festado($dolorcabeza); ?>
        </select>
		</td>
		<th>Pierdes Equilibrio:</th>
		<td>
		<select name="perderequilibrio">
        	<?php echo festado($perderequilibrio); ?>
        </select>
		</td></tr>
		<tr><th>Fatigado(a):</th>
		<td>
		<select name="fatiga">
        	<?php echo festado($fatiga); ?>
        </select>
		</td>
		<th >Pierdes Vista/Oido:</th>
		<td>
		<select name="perdervistaoido">
        	<?php echo festado($perdervistaoido); ?>
        </select>
		</td>
		<th>Duermes con dificultad:</th>
		<td>
		<select name="dificildormir">
        	<?php echo festado($dificildormir); ?>
        </select>
		</td>
		<th>Tienes pesadillas:</th>
		<td>
		<select name="pesadillas">
        	<?php echo festado($pesadillas); ?>
        </select>
		</td></tr>
		</tr><th>Incontinencia:</th>
		<td>
		<select name="incontinencia">
        	<?php echo festado($incontinencia); ?>
        </select>
		</td>
		<th>Tartamudeas:</th>
		<td>
		<select name="tartamudo">
        	<?php echo festado($tartamudo); ?>
        </select>
		</td>
		<th>Miedo Intenso:</th>
		<td>
		<select name="Miedointenso">
        	<?php echo festado($Miedointenso); ?>
        </select>
		</td></tr>
	</table>
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">DATOS RELACION FAMILIAR</font></h3></td></tr>
	</table>
	<table  width="100%">
		<th>Como es relacion familiar:</th>
		<td><input type="text" name="comorelfamilia" value="<?php echo $comorelfamilia?>"  size="60"/></td>
		<th>Tipo de dificultades familiares:</th>
		<td><input type="text" name="dificultadestipo" value="<?php echo $dificultadestipo?>"  size="80"/></td></tr>
		<tr><th>Actitud ante problemas familiares:</th>
		<td><input type="text" name="queactitudfamilia" value="<?php echo $queactitudfamilia?>" size="50" /></td></tr>
		<tr><th>Como es tu relacion con padre:</th>
		<td><input type="text" name="relacionpadre" value="<?php echo $relacionpadre?>"  size="50"/></td>
		<th>Cual es tu actitud con padre:</th>
		<td><input type="text" name="tuactitudpadre" value="<?php echo $tuactitudpadre?>"  size="50"/></td></tr>
		</tr><th>Como es tu relacion conMadre:</th>
		<td><input type="text" name="relacionmadre" value="<?php echo $relacionmadre?>"  size="50"/></td>
		<th>Cual es tu actitud con Madre:</th>
		<td><input type="text" name="tuactitudmadre" value="<?php echo $tuactitudmadre?>"  size="50"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)1:</th>
		<td><input type="text" name="relacion1" value="<?php echo $relacion1?>"  size="50"/></td>
		<th>Cual es tu actitud con Hermano(a)1:</th>
		<td><input type="text" name="actitud1" value="<?php echo $actitud1?>"  size="50"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)2:</th>
		<td><input type="text" name="relacion2" value="<?php echo $relacion2?>"  size="50"/></td>
		<th>Cual es tu actitud con Hermano(a)2:</th>
		<td><input type="text" name="actitud2" value="<?php echo $actitud2?>"  size="50"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)3:</th>
		<td><input type="text" name="relacion3" value="<?php echo $relacion3?>"  size="50"/></td>
		<th>Cual es tu actitud con Hermano(a)3:</th>
		<td><input type="text" name="actitud3" value="<?php echo $actitud3?>"  size="50"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)4:</th>
		<td><input type="text" name="relacion4" value="<?php echo $relacion4?>"  size="50"/></td>
		<th>Cual es tu actitud con Hermano(a)4:</th>
		<td><input type="text" name="actitud4" value="<?php echo $actitud4?>"  size="50"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)5:</th>
		<td><input type="text" name="relacion5" value="<?php echo $relacion5?>"  size="50"/></td>
		<th>Cual es tu actitud con Hermano(a)5:</th>
		<td><input type="text" name="actitud5" value="<?php echo $actitud5?>"  size="50"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)6:</th>
		<td><input type="text" name="relacion6" value="<?php echo $relacion6?>"  size="50"/></td>
		<th>Cual es tu actitud con Hermano(a)6:</th>
		<td><input type="text" name="actitud6" value="<?php echo $actitud6?>"  size="50"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)7:</th>
		<td><input type="text" name="relacion7" value="<?php echo $relacion7?>"  size="50"/></td>
		<th>Cual es tu actitud con Hermano(a)7:</th>
		<td><input type="text" name="actitud7" value="<?php echo $actitud7?>"  size="50"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)8:</th>
		<td><input type="text" name="relacion8" value="<?php echo $relacion8?>"  size="50"/></td>
		<th>Cual es tu actitud con Hermano(a)8:</th>
		<td><input type="text" name="actitud8" value="<?php echo $actitud8?>"  size="50"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)9:</th>
		<td><input type="text" name="relacion9" value="<?php echo $relacion9?>"  size="50"/></td>
		<th>Cual es tu actitud con Hermano(a)9:</th>
		<td><input type="text" name="actitud9" value="<?php echo $actitud9?>"  size="50"/></td>
	</table>
	<table width="100%">
		<tr><th>¿Con quién te sientes más ligado afectivamente?:</th>
		<td>
		<select name="ligadoafectivamente">
        	<?php echo fligado($ligadoafectivamente); ?>
        </select>
		
		</td>
		<th>Por que razon estan ligado con esa persona:</th>
		<td><input type="text" name="razonliga" value="<?php echo $razonliga ?>"  size="20"/></td>
		<tr>
		<th>Que familia influyo en ti para elegir esta carrera:</th>
		<td>
		<select name="influidocarrera">
        	<?php echo fligado($influidocarrera); ?>
        </select>
		</td>
		<th>consideras a la familia:</th>
		<td><input type="text" name="considerafamilia" value="<?php echo $considerafamilia ?>"  size="30"/></td></tr>
	</table>
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">AREA SOCIAL</font></h3></td></tr>
	</table>
	<table  width="100%">
		<tr><th>Como es tu relacion con tus compañeros de clase:</th>
		<td>
		<select name="relacioncompas">
        	<?php echo frelacion($relacioncompas); ?>
        </select>
		</td>
		<th>por que es asi tu relacion con tus compañeros de clase:</th>
		<td><input type="text" name="porque" value="<?php echo $porque?>"  size="14"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con tus amigos:</th>
		<td><input type="text" name="relacionamigos" value="<?php echo $relacionamigos ?>"  size="30"/></td>
		<th>Tienes pareja:</th>
		<td><input type="text" name="tienespareja" value="<?php echo $tienespareja?>"  size="10"/></td>
		<th>Como es tu relacion con tu pareja:</th>
		<td><input type="text" name="comopareja" value="<?php echo $comopareja?>"  size="30"/></td>
		<th>Como te llevas con tus maestros:</th>
		<td><input type="text" name="comoprofe" value="<?php echo $comoprofe?>"  size="14"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Como te llevas con el personal de la escuela:</th>
		<td><input type="text" name="comoacademi" value="<?php echo $comoacademi?>"  size="30"/></td>
		<th>Que haces en tu tiempo libre:</th>
		<td><input type="text" name="tiempolibre" value="<?php echo $tiempolibre?>"  size="30"/></td>
		<th>Que actividad recreativa practicas:</th>
		<td><input type="text" name="recreativa" value="<?php echo $recreativa?>"  size="30"/></td>		<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
		</tr>
	</table>
	<br />
	<center><input type="submit" value="Actualiza y Continua" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasaalu.php?usuario=<?php echo $usuario; ?>'" /></center>
</form>
</div>
</body>
</html>

