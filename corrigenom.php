<?php 
include "encabezado.php";
?>
<div id="mainFrame">
<br/>
<form method="get" action="corrigenom2.php">
<table align="center">

    	<tr>
			<th> No de Control: </th>
			<td>
				<input name="no_de_control" type="text" value="" size="20" maxlength="20"/>
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
