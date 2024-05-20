<?php
 include "encabezado.php";
 if (isset($_POST['rnueva'])){
	$rnueva = $_POST['rnueva'];
	$nueva = $_POST['nueva'];
	$usuario = $_POST['usuario'];
	
  }
 $user = $_SESSION["usuario"];
?>
<script type="text/javascript">
function valida_campos()
{
	formulario = document.contrasena;
	if(formulario.usuario.value == "-1")
	{
	  alert ("Por favor seleccione el usuario.");
		formulario.usuario.focus();
		return false;
	}
	
		
	if(formulario.rnueva.value!=formulario.nueva.value)
	{
	  alert ("La contraseña escrita no corresponde. Escriba la nueva contraseña en ambos cuadros de texto");
		formulario.nueva.value = "";
		formulario.rnueva.value = "";
		formulario.nueva.focus();
		return false;
	}	
	
	if(formulario.nueva.value.length < 6)
	{
		alert ("La contraseña debe contener al menos 6 caracteres");
		formulario.nueva.value = "";
		formulario.rnueva.value = "";
		formulario.nueva.focus();
		return false;
	}
	
	formulario.submit();
}
</script>
<body>
<div id="mainFrame">
<h3 align="center">Cambio de Contraseña</h3> 
<?php
if (!isset($_POST['rnueva'])) {
?>
<form name="contrasena" method="post" action="cambio_contrasena2.php">
	<table align="center">
		<tr>
			<th> Usuario: </th>
			<td>
				<input name="usuario" type="text" value="" size="30" maxlength="50" />
			</td>
		</tr>
		<tr>
			<th> Nueva Contraseña: </th>
			<td> 
            <INPUT id="nueva"  onkeyup="runPassword(this.value, 'nueva');" type="password" name="nueva" size="30" maxlength="15"> 
        </tr>
		<tr>
			<th> Repetir Nueva Contraseña: </th>
			<td> 
            <input name="rnueva" type="password" id="rnueva" size="30" maxlength="15">	
            </td>
		</tr>
	</table>
	<br />
	<div align="center">
		<input name="cambiar" type="button" value="Cambiar" class="boton" onclick="valida_campos()">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="salir" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasades.php'"> 
	</div>	
</form>
<?php
} 
else {
	$nueva = md5($nueva);
	$rnueva = md5($rnueva);
	$noes = 0;	
	$qry_contrasena="select * from acceso where usuario = '$usuario'";
	$res_contrasena = ejecuta_consulta($qry_contrasena);
    while ($fila = $res_contrasena->fetch_assoc()){
		$noes = 1;
	}
	
	if ($noes == 1){
	    $qry_cambio_contrasena = "update acceso set contrasena = '$nueva' where usuario = '$usuario' ";
		ejecuta_consulta($qry_cambio_contrasena);
		 $msg = 'contraseña actualizada'; 
	}else $msg = 'El usuario no existe'; 
		
 ?>
     <script type="text/javascript">
 	    window.alert("<?php echo $msg; ?>") 
       	window.location = "bienvenida.php"
   	</script>
<?php 		
}
?>
</div>
</body>
