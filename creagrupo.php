<?php 
include "encabezado.php";
 $user = $_SESSION["usuario"];
?>
<body>
<div id="mainFrame">
<h3 align="center"> Crear Grupos de Tutorias</h3> 
<form method="get" action="creadatosgrupo.php">
	<table align="center">
    	<tr>
        	<th> Selecciona el Periodo: </th>
            <td>
            	<select name="periodo">
                	<?php echo nperiodo($periodo); ?>
				</select>
			</td>
        </tr>
		<tr>
        	<th> Selecciona la carrera: </th>
            <td>
            	<select name="carrera">
                	<?php echo fcarrerasX($periodo); ?>
				</select>
			</td>
        </tr>
    </table>
    <br />
    <div align="center">
        <input type="submit" value="Procesar" class="boton" />
       
        <input type="button" name="salir" value="Regresar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
    </div>
</form>
</div>