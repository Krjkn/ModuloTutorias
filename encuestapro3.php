<?php 
include "docencabezado.php";
$user = $usuario;
foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
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
$regresar = "javascript: document.location = 'index.html'";
?>
<div id="mainFrame">
<form action="pasa.php" method="get" name="form1"   target="mainFrame">
	<table width="100%">
		
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">DATOS DE HABILIDADES</font></h3></td></tr>
	</table>
	<table width="100%">
		<tr><td height="10"></td></tr>
		<tr colspan="10">
		<th>Eres Puntual:</th>
		<td>
		<input type="text" name="puntual" value="<?php echo $puntual ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres timido:</th>
		<td>
		<input type="text" name="timido" value="<?php echo $timido ?>"  size="10" readonly="true"/>
		</td>	
		<th>Eres Alegre:</th>
		<td>
		<input type="text" name="alegre" value="<?php echo $alegre ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres Agresivo:</th>
		<td>
		<input type="text" name="agresivo" value="<?php echo $agresivo ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres Abierto:</th>
		<td>
		<input type="text" name="abierto" value="<?php echo $abierto ?>"  size="10" readonly="true"/>
		</td>
		<th >Eres Reflexivo:</th>
		<td>
		<input type="text" name="refrexivo" value="<?php echo $refrexivo ?>"  size="10" readonly="true"/>
		</td></tr>
		<tr>
		<th>Eres Constante:</th>
		<td>
		<input type="text" name="constante" value="<?php echo $constante ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres Optimista:</th>
		<td>
		<input type="text" name="optimista" value="<?php echo $optimista ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres Impulsivo:</th>
		<td>
		<input type="text" name="impulsivo" value="<?php echo $impulsivo ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres Silencioso:</th>
		<td>
		<input type="text" name="silencioso" value="<?php echo $silencioso ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres Generoso:</th>
		<td>
		<input type="text" name="generoso" value="<?php echo $generoso ?>"  size="10" readonly="true"/>
		<th>Eres Inquieto:</th>
		<td>
		<input type="text" name="inquieto" value="<?php echo $inquieto ?>"  size="10" readonly="true"/>
		</td>
		</tr>
		<tr><th>Tienes humor:</th>
		<td>
		<input type="text" name="humor" value="<?php echo $humor ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres Dominante:</th>
		<td>
		<input type="text" name="dominante" value="<?php echo $dominante ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres egoista:</th>
		<td>
		<input type="text" name="egoista" value="<?php echo $egoista ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres Sumiso:</th>
		<td>
		<input type="text" name="sumiso" value="<?php echo $sumiso ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres Confiado:</th>
		<td>
		<input type="text" name="confiado" value="<?php echo $confiado ?>"  size="10" readonly="true"/>
		</td>
		<th>Tienes Iniciativa:</th>
		<td>
		<input type="text" name="iniciativa" value="<?php echo $iniciativa ?>"  size="10" readonly="true"/>
		</td></tr>
		<tr><th>Eres Sociable:</th>
		<td>
		<input type="text" name="sociable" value="<?php echo $sociable ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres responsable:</th>
		<td>
		<input type="text" name="responsable" value="<?php echo $responsable ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres perseverante:</th>
		<td>
		<input type="text" name="perseverante" value="<?php echo $perseverante ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres motivado:</th>
		<td>
		<input type="text" name="motivado" value="<?php echo $motivado ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres activo:</th>
		<td>
		<input type="text" name="activo" value="<?php echo $activo ?>"  size="10" readonly="true"/>
		</td>
		<th>Eres independiente:</th>
		<td>
		<input type="text" name="independiente" value="<?php echo $independiente ?>"  size="10" readonly="true"/>
		</td></tr>
	</table>
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">AREA PSICOPEDAGÓGICA</font></h3></td></tr>
	</table>&nbsp;&nbsp;
	<table  width="100%">
		<tr><th>Como te gustaria ser?</th>
		<td><input type="text" name="comoserias" value="<?php echo $comoserias ?>"  size="50" readonly="true"/></td>
		<th>Recibes ayuda en tu casa para la realizacion de tareas escolares?</th>
		<td><input type="text" name="recibesayuda" value="<?php echo $recibesayuda ?>"  size="50" readonly="true"/></td></tr>
		<tr><th>Que problemas personales intervienen en tus estudios?</th>
		<td><input type="text" name="queproblemas" value="<?php echo $queproblemas ?>"  size="50" readonly="true"/></td>
		<th>Cual es tu rendimiento escolar?</th>
		<td><input type="text" name="cualrendimiento" value="<?php echo $cualrendimiento ?>"  size="50" readonly="true"/></td></tr>
		<tr><th>Cual es tu asignatura preferida? Por que?</th>
		<td><input type="text" name="asignaturaprefe" value="<?php echo $asignaturaprefe ?>"  size="50" readonly="true"/></td>
		<th>Cual es la asignatura en la que sobresales? Por que?</th>
		<td><input type="text" name="asignaturasobre" value="<?php echo $asignaturasobre ?>"  size="50" readonly="true"/></td></tr>
		<tr><th>Que asignatura te desagrada? Por que?</th>
		<td><input type="text" name="asignaturadesag" value="<?php echo $asignaturadesag ?>"  size="50" readonly="true"/></td>
		<th>Cual es la asignatura con mas bajo promedio del semestre anterior? Por que?</th>
		<td><input type="text" name="asignaturabajo" value="<?php echo $asignaturabajo ?>"  size="50" readonly="true"/></td></tr>
		<tr><th>Por que vienes al Tecnologico?</th>
		<td><input type="text" name="porquevienes" value="<?php echo $porquevienes ?>"  size="50" readonly="true"/></td>
		<th>Que te motiva para venir al tecnologico?</th>
		<td><input type="text" name="quetemotiva" value="<?php echo $quetemotiva ?>"  size="50" readonly="true"/></td></tr>
		<tr><th>Cual es tu promedio general del ciclo escolar anterior?</th>
		<td><input type="text" name="promedioanterior" value="<?php echo $promedioanterior ?>"  size="50" readonly="true"/></td>
		<th>Que asignaturas Reprobaste ?</th>
		<td><input type="text" name="cualesreprobaste" value="<?php echo $cualesreprobaste ?>"  size="60" readonly="true"/></td></tr>
	</table>
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">PLAN DE VIDA Y CARRERA</font></h3></td></tr>
	</table>&nbsp;&nbsp;
	<table  width="100%">
		<tr><th>Cual son tus planes inmediatos?</th>
		<td><input type="text" name="planes" value="<?php echo $planes  ?>"  size="50" readonly="true"/></td>
		<th>Cuales son tus metas en la vida?</th>
		<td><input type="text" name="meta" value="<?php echo $meta ?>"  size="50" readonly="true"/></td></tr>
	</table>
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">CARACTERISTICAS PERSONALES</font></h3></td></tr>
	</table>&nbsp;&nbsp;
	<table width="100%">
		<tr><th>Yo soy...</th>
		<td><input type="text" name="yosoy" value="<?php echo $yosoy ?>"  size="50" readonly="true"/></td>
		<th>Mi caracter es...</th>
		<td><input type="text" name="carater" value="<?php echo $carater ?>"  size="50" readonly="true"/></td></tr>
		<tr><th>A mi me gusta que...</th>
		<td><input type="text" name="megusta" value="<?php echo $megusta ?>"  size="50" readonly="true"/></td>
		<th>Yo aspiro en la vida...</th>
		<td><input type="text" name="aspiro" value="<?php echo $aspiro ?>"  size="50" readonly="true"/></td></tr>
		<tr><th>Yo tengo miedo que...</th>
		<td><input type="text" name="miedo" value="<?php echo $miedo ?>"  size="50" readonly="true"/></td>
		<th>Pero pienso que podria lograr...</th>
		<td><input type="text" name="lograr" value="<?php echo $lograr ?>"  size="50" readonly="true"/></td></tr>
		
	</table>&nbsp;&nbsp;
	<br />
	<center><input type="button" name="Termina" value="Termina" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'" /></center>
</form>
</div>


