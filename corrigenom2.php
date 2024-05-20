
<?php 
include "encabezado.php";
if(isset($_GET['no_de_control'])){
$no_de_control = $_GET['no_de_control'];}
	else {$no_de_control = '';
}
$qry_alu = "select 	* from alumnos  where no_de_control ='$no_de_control'";
$res_alu = ejecuta_consultaf($qry_alu);
if ($fila = $res_alu->fetch_assoc()) {
		$no_de_control      = $fila['no_de_control'];
		$apellido_paterno   = $fila['apellido_paterno'];	
		$apellido_materno   = $fila['apellido_materno'];				$nombre_alumno      = $fila['nombre_alumno'];
		$carrera            = $fila['carrera'];		$reticula           = $fila['reticula'];		$sexo               = $fila['sexo'];	$cp = '';	$ige = '';	$isc = '';	$info = '';	$ind = '';	$sexm ='';	$sexf ='';	if ($sexo == 'M'){$sexm='selected';}	if ($sexo == 'F'){$sexf='selected';}	if ($carrera=='7' and $reticula=='12') {$cp='selected';}//CP		if ($carrera=='5' and $reticula=='10') {$ige='selected';}//IGE		if ($carrera=='8' and $reticula=='28') {$isc='selected';}//ISC		if ($carrera=='9' and $reticula=='9') {$info='selected';}//INFO		if ($carrera=='6' and $reticula=='25') {$ind='selected';}//IND	
?>
<div id="mainFrame">
<br/>
<form method="get" action="corrigenom3.php">
<table align="center">
			<tr>
				<th> No de Control </th>
				<td>
				<input name="no_de_control" type="text" value="<?php echo $no_de_control ?>"  readonly="readonly" size="20" maxlength="20"/>
				</td>	
			</tr>	
			<tr>
				<th> Apellido Paterno </th>
				<td>
				<input name="apellido_paterno" type="text" value="<?php echo $apellido_paterno ?>" size="20" maxlength="40"/>
				</td>	
			</tr>	
			<tr>
				<th> Apellido Materno</th>	
				<td>
				<input name="apellido_materno" type="text" value="<?php echo $apellido_materno ?>" size="20" maxlength="40"/>
			    </td>
			</tr>	
			<tr>
				<th> Nombre Alumno </th>	
				<td><input name="nombre_alumno" type="text" value="<?php echo $nombre_alumno ?>" size="20" maxlength="40"/>
			    </td>
		</tr>		<tr>				<th> Sexo </th>					<td><select name="sexo" size="2">						<option <?php echo $sexm ; ?>  value="M">Masculino						<option <?php echo $sexf ; ?>  value="F">Femenino					</select>			    </td>			</tr>						<tr>				<th> Carrera </th>					<td><select name="estudia" size="5">						<option <?php echo $cp ; ?> value="1">Contador Publico						<option <?php echo $ige ; ?> value="2">Ingenieria en Gestion Empresarial						<option <?php echo $isc ; ?> value="3">Ingenieria en Sistemas Comptacionales						<option <?php echo $info ; ?> value="4">Ingenieria Informatica						<option <?php echo $ind ; ?> value="5">Ingenieria Industrial					</select>			    </td>			</tr>						
    </table>
    <div align="center">
        <input type="submit" value="Procesar" class="boton" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasades.php'" />
	</div>
</form>


</div><?php }?>
