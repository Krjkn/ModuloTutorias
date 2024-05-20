<?php include "docencabezado.php";?>
<body>
<div id="mainFrame">
<h3 align="center"> Grupos de Tutorias</h3> 
<form method="get" action="reporte1.php" target="_blank">
	<table align="center">
    	<tr>
        	<th> Selecciona el Periodo: </th>
            <td>
            	<select name="periodo">
                	<?php echo nperiodo($periodo); ?>
				</select>				<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
			</td>
        </tr>
    </table>
    <br />
    <div align="center">
        <input type="submit" value="Procesar" class="boton" />
       
        <input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'"> 
    </div>
</form>
</div>
</body>