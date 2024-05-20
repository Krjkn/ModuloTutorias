<?php 
include "encabezadoalumno.php";
$user = $usuario;
$no_de_control = $user;
function fmadurez($valor=NULL)
{
$valores = ['No','Poco','Frecuente','Mucho'];
$i = 0;
$opciones = "";
	while ($i < 4){
		$s = ($valor == trim($valores[$i]))?" selected":"";
		$opciones.= '<option value="'.$valores[$i].'" '.$s.'>'.$valores[$i].'</option>';
		$i++;
	}
return $opciones;
}
foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
$actualiza="update encuesta2 set 
manospieshinchados= '$manospieshinchados',			
dolorvientre= '$dolorvientre',
dolorcabeza= '$dolorcabeza',
perderequilibrio= '$perderequilibrio',
fatiga= '$fatiga',
perdervistaoido= '$perdervistaoido',
dificildormir= '$dificildormir',
pesadillas= '$pesadillas',
incontinencia= '$incontinencia',
tartamudo= '$tartamudo',
Miedointenso= '$Miedointenso',
comorelfamilia= '$comorelfamilia',
dificultadestipo= '$dificultadestipo',			
queactitudfamilia= '$queactitudfamilia',
relacionpadre= '$relacionpadre',
tuactitudpadre= '$tuactitudpadre',
relacionmadre= '$relacionmadre',
tuactitudmadre= '$tuactitudmadre',
relacion1= '$relacion1',
relacion2= '$relacion2',
relacion3= '$relacion3',
relacion4= '$relacion4',
relacion5= '$relacion5',
relacion6= '$relacion6',
relacion7= '$relacion7',
relacion8= '$relacion8',
relacion9= '$relacion9',
actitud1= '$actitud1',
actitud2= '$actitud2',
actitud3= '$actitud3',
actitud4= '$actitud4',
actitud5= '$actitud5',
actitud6= '$actitud6',
actitud7= '$actitud7',
actitud8= '$actitud8',
actitud9= '$actitud9',
ligadoafectivamente= '$ligadoafectivamente',
razonliga= '$razonliga',
influidocarrera= '$influidocarrera',			
considerafamilia= '$considerafamilia',
relacioncompas= '$relacioncompas',
porque= '$porque',
relacionamigos= '$relacionamigos',
tienespareja= '$tienespareja',
comopareja='$comopareja',
comoprofe= '$comoprofe',
comoacademi= '$comoacademi',
tiempolibre= '$tiempolibre',
recreativa= '$recreativa'
where  no_de_control = '$no_de_control'";
$inserta = "insert into encuesta2(no_de_control) values('$no_de_control')";
ejecuta_consulta($inserta);
ejecuta_consulta($actualiza);
$msg = 'Datos actualizados continua con tu entrevista';?>
<script type="text/javascript">
	alert("<?php echo $msg; ?>");
</script><?php
// fin de actualizacion encuestaa
$qry_alumnos="select * from encuesta3 where  no_de_control = '$no_de_control'";
$res_alumnos = ejecuta_consulta($qry_alumnos);
while ($fila = $res_alumnos->fetch_assoc()) {
	$puntual = $fila['puntual'];
	$timido = $fila['timido'];
	$alegre = $fila['alegre'];
	$agresivo = $fila['agresivo'];
	$abierto = $fila['abierto'];
	$refrexivo = $fila['refrexivo'];
	$constante = $fila['constante'];
	$optimista= $fila['optimista'];
	$impulsivo = $fila['impulsivo'];
	$silencioso = $fila['silencioso'];
	$generoso = $fila['generoso'];
	$inquieto = $fila['inquieto'];
	$humor = $fila['humor'];
	$dominante = $fila['dominante'];
	$egoista = $fila['egoista'];
	$sumiso = $fila['sumiso'];
	$confiado = $fila['confiado'];
	$iniciativa = $fila['iniciativa'];
	$sociable = $fila['sociable'];
	$responsable = $fila['responsable'];
	$perseverante = $fila['perseverante'];
	$motivado = $fila['motivado'];
	$activo = $fila['activo'];
	$independiente = $fila['independiente'];
	$comoserias = $fila['comoserias'];
	$recibesayuda = $fila['recibesayuda'];
	$queproblemas = $fila['queproblemas'];
	$cualrendimiento = $fila['cualrendimiento'];
	$asignaturaprefe = $fila['asignaturaprefe'];
	$asignaturasobre = $fila['asignaturasobre'];
	$asignaturadesag = $fila['asignaturadesag'];
	$asignaturabajo = $fila['asignaturabajo'];
	$porquevienes = $fila['porquevienes'];
	$quetemotiva = $fila['quetemotiva'];
	$promedioanterior = $fila['promedioanterior'];
	$cualesreprobaste = $fila['cualesreprobaste'];
	$planes = $fila['planes'];
	$meta = $fila['meta'];
	$yosoy = $fila['yosoy'];
	$carater = $fila['carater'];
	$megusta = $fila['megusta'];
	$aspiro = $fila['aspiro'];
	$miedo = $fila['miedo'];
	$lograr = $fila['lograr'];
	
}
$res_alumnos->free();
?>
<body>
<div id="mainFrame">
<form action="encuestaabd.php" method="get" name="form1">
	<table width="100%">
		
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">DATOS DE HABILIDADES</font></h3></td></tr>
	</table>
	<table width="100%">
		<tr><td height="10"></td></tr>
		<tr colspan="10">
		<th>Eres Puntual:</th>
		<td>
		<select name="puntual">
        	<?php echo fmadurez($puntual); ?>
        </select>
		</td>
		<th>Eres timido:</th>
		<td>
		<select name="timido">
        	<?php echo fmadurez($timido); ?>
        </select>
		</td>	
		<th>Eres Alegre:</th>
		<td>
		<select name="alegre">
        	<?php echo fmadurez($alegre); ?>
        </select>
		</td>
		<th>Eres Agresivo:</th>
		<td>
		<select name="agresivo">
        	<?php echo fmadurez($agresivo); ?>
        </select>
		</td>
		<th>Eres Abierto:</th>
		<td>
		<select name="abierto">
        	<?php echo fmadurez($abierto); ?>
        </select>
		</td>
		<th >Eres Reflexivo:</th>
		<td>
		<select name="refrexivo">
        	<?php echo fmadurez($refrexivo); ?>
        </select>
		</td></tr>
		<tr>
		<th>Eres Constante:</th>
		<td>
		<select name="constante">
        	<?php echo fmadurez($constante); ?>
        </select>
		</td>
		<th>Eres Optimista:</th>
		<td>
		<select name="optimista">
        	<?php echo fmadurez($optimista); ?>
        </select>
		</td>
		<th>Eres Impulsivo:</th>
		<td>
		<select name="impulsivo">
        	<?php echo fmadurez($impulsivo); ?>
        </select>
		</td>
		<th>Eres Silencioso:</th>
		<td>
		<select name="silencioso">
        	<?php echo fmadurez($silencioso); ?>
        </select>
		</td>
		<th>Eres Generoso:</th>
		<td>
		<select name="generoso">
        	<?php echo fmadurez($generoso); ?>
        </select>
		<th>Eres Inquieto:</th>
		<td>
		<select name="inquieto">
        	<?php echo fmadurez($inquieto); ?>
        </select>
		</td>
		</tr>
		<tr><th>Tienes humor:</th>
		<td>
		<select name="humor">
        	<?php echo fmadurez($humor); ?>
        </select>
		</td>
		<th>Eres Dominante:</th>
		<td>
		<select name="dominante">
        	<?php echo fmadurez($dominante); ?>
        </select>
		</td>
		<th>Eres egoista:</th>
		<td>
		<select name="egoista">
        	<?php echo fmadurez($egoista); ?>
        </select>
		</td>
		<th>Eres Sumiso:</th>
		<td>
		<select name="sumiso">
        	<?php echo fmadurez($sumiso); ?>
        </select>
		</td>
		<th>Eres Confiado:</th>
		<td>
		<select name="confiado">
        	<?php echo fmadurez($confiado); ?>
        </select>
		</td>
		<th>Tienes Iniciativa:</th>
		<td>
		<select name="iniciativa">
        	<?php echo fmadurez($iniciativa); ?>
        </select>
		</td></tr>
		<tr><th>Eres Sociable:</th>
		<td>
		<select name="sociable">
        	<?php echo fmadurez($sociable); ?>
        </select>
		</td>
		<th>Tienes responsable:</th>
		<td>
		<select name="responsable">
        	<?php echo fmadurez($responsable); ?>
        </select>
		</td>
		<th>Eres perseverante:</th>
		<td>
		<select name="perseverante">
        	<?php echo fmadurez($perseverante); ?>
        </select>
		</td>
		<th>Eres motivado:</th>
		<td>
		<select name="motivado">
        	<?php echo fmadurez($motivado); ?>
        </select>
		</td>
		<th>Eres activo:</th>
		<td>
		<select name="activo">
        	<?php echo fmadurez($activo); ?>
        </select>
		</td>
		<th>Eres independiente:</th>
		<td>
		<select name="independiente">
        	<?php echo fmadurez($independiente); ?>
        </select>
		</td></tr>
	</table>
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">AREA PSICOPEDAGÓGICA</font></h3></td></tr>
	</table>&nbsp;&nbsp;
	<table  width="100%">
		<tr><th>Como te gustaria ser?</th>
		<td><input type="text" name="comoserias" value="<?php echo $comoserias ?>"  size="50"/></td>
		<th>Recibes ayuda en tu casa para la realizacion de tareas escolares?</th>
		<td><input type="text" name="recibesayuda" value="<?php echo $recibesayuda ?>"  size="50"/></td></tr>
		<tr><th>Que problemas personales intervenen en tus estudios?</th>
		<td><input type="text" name="queproblemas" value="<?php echo $queproblemas ?>"  size="50"/></td>
		<th>Cual es tu rendimiento escolar?</th>
		<td><input type="text" name="cualrendimiento" value="<?php echo $cualrendimiento ?>"  size="50"/></td></tr>
		<tr><th>Cual es tu asignatura preferida? Por que?</th>
		<td><input type="text" name="asignaturaprefe" value="<?php echo $asignaturaprefe ?>"  size="50"/></td>
		<th>Cual es la asignatura en la que sobresales? Por que?</th>
		<td><input type="text" name="asignaturasobre" value="<?php echo $asignaturasobre ?>"  size="50"/></td></tr>
		<tr><th>Que asignatura te desagrada? Por que?</th>
		<td><input type="text" name="asignaturadesag" value="<?php echo $asignaturadesag ?>"  size="50"/></td>
		<th>Cual es la asignatura con mas bajo promedio del semestre anterior? Por que?</th>
		<td><input type="text" name="asignaturabajo" value="<?php echo $asignaturabajo ?>"  size="50"/></td></tr>
		<tr><th>Por que vienes al Tecnologico?</th>
		<td><input type="text" name="porquevienes" value="<?php echo $porquevienes ?>"  size="50"/></td>
		<th>Que te motiva para venir al tecnologico?</th>
		<td><input type="text" name="quetemotiva" value="<?php echo $quetemotiva ?>"  size="50"/></td></tr>
		<tr><th>Cual es tu promedio general del ciclo escolar anterior?</th>
		<td><input type="text" name="promedioanterior" value="<?php echo $promedioanterior ?>"  size="50"/></td>
		<th>Que asignaturas Reprobaste ?</th>
		<td><input type="text" name="cualesreprobaste" value="<?php echo $cualesreprobaste ?>"  size="60"/></td></tr>
	</table>
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">PLAN DE VIDA Y CARRERA</font></h3></td></tr>
	</table>&nbsp;&nbsp;
	<table  width="100%">
		<tr><th>Cual son tus planes inmediatos?</th>
		<td><input type="text" name="planes" value="<?php echo $planes  ?>"  size="50"/></td>
		<th>Cuales son tus metas en la vida?</th>
		<td><input type="text" name="meta" value="<?php echo $meta ?>"  size="50"/></td></tr>
	</table>
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">CARACTERISTICAS PERSONALES</font></h3></td></tr>
	</table>&nbsp;&nbsp;
	<table width="100%">
		<tr><th>Yo soy...</th>
		<td><input type="text" name="yosoy" value="<?php echo $yosoy ?>"  size="50"/></td>
		<th>Micaracter es...</th>
		<td><input type="text" name="carater" value="<?php echo $carater ?>"  size="50"/></td></tr>
		<tr><th>A mi me gusta que...</th>
		<td><input type="text" name="megusta" value="<?php echo $megusta ?>"  size="50"/></td>
		<th>Yo aspiro en la vida...</th>
		<td><input type="text" name="aspiro" value="<?php echo $aspiro ?>"  size="50"/></td></tr>
		<tr><th>Yo tengo miedo que...</th>
		<td><input type="text" name="miedo" value="<?php echo $miedo ?>"  size="50"/></td>
		<th>Pero pienso que podria lograr...</th>
		<td><input type="text" name="lograr" value="<?php echo $lograr ?>"  size="50"/></td></tr>		<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
	</table>&nbsp;&nbsp;
	<br />
	<center><input type="submit" value="Actualiza y Termina" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasaalu.php?usuario=<?php echo $usuario; ?>'" /></center>
</form>
</div>
</body>
</html>

