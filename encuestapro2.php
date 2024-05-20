<?php 
include "docencabezado.php";
$user = $usuario;
foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
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
$regresar = "javascript: document.location = 'index.html'";
?>
<div id="mainFrame">
<form action="encuestapro3.php" method="get" name="form1"   target="mainFrame">
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">DATOS PSICOFISIOLÓGICOS</font></h3></td></tr>
	</table>
	<table width="100%">
		<tr><td height="10"></td></tr>
		<tr colspan="10"><th>Se te inchan manos o pies:</th>
		<td>
		<input type="text" name="manospieshinchados" value="<?php echo $manospieshinchados?>"  size="10" readonly="true"/>
		</td>
		<th>Dolor del Vientre:</th>
		<td>
		<input type="text" name="dolorvientre" value="<?php echo $dolorvientre?>"  size="10" readonly="true"/>
		</td>	
		<th>Dolor de Cabeza:</th>
		<td>
		<input type="text" name="dolorcabeza" value="<?php echo $dolorcabeza?>"  size="10" readonly="true"/>
		</td>
		<th>Pierdes Equilibrio:</th>
		<td>
		<input type="text" name="perderequilibrio" value="<?php echo $perderequilibrio?>"  size="10" readonly="true"/>
		</td></tr>
		<tr><th>Fatigado(a):</th>
		<td>
		<input type="text" name="fatiga" value="<?php echo $fatiga?>"  size="10" readonly="true"/>
		</td>
		<th >Pierdes Vista/Oido:</th>
		<td>
		<input type="text" name="perdervistaoido" value="<?php echo $perdervistaoido?>"  size="10" readonly="true"/>
		</td>
		<th>Duermes con dificultad:</th>
		<td>
		<input type="text" name="dificildormir" value="<?php echo $dificildormir?>"  size="10" readonly="true"/>
		</td>
		<th>Tienes pesadillas:</th>
		<td>
		<input type="text" name="pesadillas" value="<?php echo $pesadillas?>"  size="10" readonly="true"/>
		</td></tr>
		</tr><th>Incontinencia:</th>
		<td>
		<input type="text" name="incontinencia" value="<?php echo $incontinencia?>"  size="10" readonly="true"/>
		</td>
		<th>Tartamudeas:</th>
		<td>
		<input type="text" name="tartamudo" value="<?php echo $tartamudo?>"  size="10" readonly="true"/>
		</td>
		<th>Miedo Intenso:</th>
		<td>
		<input type="text" name="Miedointenso" value="<?php echo $Miedointenso?>"  size="10" readonly="true"/>
		</td></tr>
	</table>
	<table width="100%">
		<tr align="center" ><td  bgcolor="blue"><h3><font  color="white">DATOS RELACION FAMILIAR</font></h3></td></tr>
	</table>
	<table  width="100%">
		<th>Como es relacion familiar:</th>
		<td><input type="text" name="comorelfamilia" value="<?php echo $comorelfamilia?>"  size="60" readonly="true"/></td>
		<th>Tipo de dificultades familiares:</th>
		<td><input type="text" name="dificultadestipo" value="<?php echo $dificultadestipo?>"  size="80" readonly="true"/></td></tr>
		<tr><th>Actitud ante problemas familiares:</th>
		<td><input type="text" name="queactitudfamilia" value="<?php echo $queactitudfamilia?>" size="50"  readonly="true"/></td></tr>
		<tr><th>Como es tu relacion con padre:</th>
		<td><input type="text" name="relacionpadre" value="<?php echo $relacionpadre?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con padre:</th>
		<td><input type="text" name="tuactitudpadre" value="<?php echo $tuactitudpadre?>"  size="50" readonly="true"/></td></tr>
		</tr><th>Como es tu relacion conMadre:</th>
		<td><input type="text" name="relacionmadre" value="<?php echo $relacionmadre?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con Madre:</th>
		<td><input type="text" name="tuactitudmadre" value="<?php echo $tuactitudmadre?>"  size="50" readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)1:</th>
		<td><input type="text" name="relacion1" value="<?php echo $relacion1?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con Hermano(a)1:</th>
		<td><input type="text" name="actitud1" value="<?php echo $actitud1?>"  size="50" readonly="true"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)2:</th>
		<td><input type="text" name="relacion2" value="<?php echo $relacion2?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con Hermano(a)2:</th>
		<td><input type="text" name="actitud2" value="<?php echo $actitud2?>"  size="50" readonly="true"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)3:</th>
		<td><input type="text" name="relacion3" value="<?php echo $relacion3?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con Hermano(a)3:</th>
		<td><input type="text" name="actitud3" value="<?php echo $actitud3?>"  size="50" readonly="true"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)4:</th>
		<td><input type="text" name="relacion4" value="<?php echo $relacion4?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con Hermano(a)4:</th>
		<td><input type="text" name="actitud4" value="<?php echo $actitud4?>"  size="50" readonly="true"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)5:</th>
		<td><input type="text" name="relacion5" value="<?php echo $relacion5?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con Hermano(a)5:</th>
		<td><input type="text" name="actitud5" value="<?php echo $actitud5?>"  size="50" readonly="true"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)6:</th>
		<td><input type="text" name="relacion6" value="<?php echo $relacion6?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con Hermano(a)6:</th>
		<td><input type="text" name="actitud6" value="<?php echo $actitud6?>"  size="50" readonly="true"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)7:</th>
		<td><input type="text" name="relacion7" value="<?php echo $relacion7?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con Hermano(a)7:</th>
		<td><input type="text" name="actitud7" value="<?php echo $actitud7?>"  size="50" readonly="true"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)8:</th>
		<td><input type="text" name="relacion8" value="<?php echo $relacion8?>"  size="50" readonly="true"/></td>
		<th>Cual es tu actitud con Hermano(a)8:</th>
		<td><input type="text" name="actitud8" value="<?php echo $actitud8?>"  size="50" readonly="true"/></td>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con Hermano(a)9:</th>
		<td><input type="text" name="relacion9" value="<?php echo $relacion9?>"  size="50"  readonly="true"/></td>
		<th>Cual es tu actitud con Hermano(a)9:</th>
		<td><input type="text" name="actitud9" value="<?php echo $actitud9?>"  size="50" readonly="true"/></td>
	</table>
	<table width="100%">
		<tr><th>¿Con quién te sientes más ligado afectivamente?:</th>
		<td>
		<input type="text" name="ligadoafectivamente" value="<?php echo $ligadoafectivamente?>"  size="10" readonly="true"/>
		</td>
		<th>Por que razon estan ligado con esa persona:</th>
		<td><input type="text" name="razonliga" value="<?php echo $razonliga ?>"  size="20"/></td>
		<tr>
		<th>Que familia influyo en ti para elegir esta carrera:</th>
		<td>
		<input type="text" name="influidocarrera" value="<?php echo $influidocarrera?>"  size="10" readonly="true"/>
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
		<input type="text" name="relacioncompas" value="<?php echo $relacioncompas?>"  size="10" readonly="true"/>
		</td>
		<th>por que es asi tu relacion con tus compañeros de clase:</th>
		<td><input type="text" name="porque" value="<?php echo $porque?>"  size="14"  readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Como es tu relacion con tus amigos:</th>
		<td><input type="text" name="relacionamigos" value="<?php echo $relacionamigos ?>"  size="30"  readonly="true"/></td>
		<th>Tienes pareja:</th>
		<td><input type="text" name="tienespareja" value="<?php echo $tienespareja?>"  size="10"  readonly="true"/></td>
		<th>Como es tu relacion con tu pareja:</th>
		<td><input type="text" name="comopareja" value="<?php echo $comopareja?>"  size="30"  readonly="true"/></td>
		<th>Como te llevas con tus maestros:</th>
		<td><input type="text" name="comoprofe" value="<?php echo $comoprofe?>"  size="14"  readonly="true"/></td></tr>
	</table>
	<table align="center">
		<tr><th>Como te llevas con el personal de la escuela:</th>
		<td><input type="text" name="comoacademi" value="<?php echo $comoacademi?>"  size="30"  readonly="true"/></td>
		<th>Que haces en tu tiempo libre:</th>
		<td><input type="text" name="tiempolibre" value="<?php echo $tiempolibre?>"  size="30"  readonly="true"/></td>
		<th>Que actividad recreativa practicas:</th>
		<td><input type="text" name="recreativa" value="<?php echo $recreativa?>"  size="30"  readonly="true"/></td>
		<input type="hidden" name="no_de_control" value="<?php echo $no_de_control?>">
		<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
		</tr>
	</table>
	<br />
	<center><input type="submit" value="Continua" name="busca" class="boton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="regresar" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'" /></center>
</form>
</div>


