

<?php 
include "encabezado.php";
?>
<div id="mainFrame">
<br/>
<form method="get" action="alumnonuevo2.php">
<table align="center">
			<tr>
				<th> No de Control </th>
				<td>
				<input name="no_de_control" type="text" value="" size="20" maxlength="20"/>
				</td>	
			</tr>	
			<tr>
				<th> Apellido Paterno </th>
				<td>
				<input name="apellido_paterno" type="text" value="" size="20" maxlength="40"/>
				</td>	
			</tr>	
			<tr>
				<th> Apellido Materno</th>	
				<td>
				<input name="apellido_materno" type="text" value="" size="20" maxlength="40"/>
			    </td>
			</tr>	
			<tr>
				<th> Nombre Alumno </th>	
				<td><input name="nombre_alumno" type="text" value="" size="20" maxlength="40"/>
			    </td>
			</tr>
			<tr>
				<th> Sexo </th>	
				<td><select name="sexo" size="2">
						<option selected value="M">Masculino
						<option value="F">Femenino
						
					</select>
			    </td>
			</tr>
			
			<tr>
				<th> Carrera </th>	
				<td><select name="estudia" size="5">
						<option selected value="1">Contador Publico
						<option value="2">Ingenieria en Gestion Empresarial
						<option value="3">Ingenieria en Sistemas Comptacionales
						<option value="4">Ingenieria Informatica
						<option value="5">Ingenieria Industrial
					</select>
			    </td>
			</tr>
			
    </table>
    <div align="center">
        <input type="submit" value="Procesar" class="boton" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasades.php'" />
	</div>
</form>


</div>
