<?php
  include "docencabezado.php";
  if (isset($_GET["rnueva"])){
	$rnueva = $_GET["rnueva"];
	$nueva = $_GET["nueva"];
	$anterior = $_GET["anterior"];	
  }
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
	
	if(formulario.anterior.value == "" || formulario.anterior.value == null)
	{
	  alert ("Por favor ingrese la contraseña anterior.");
		formulario.anterior.focus();
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
<h3 align="center">Cambio de Contrase&ntilde;a</h3> 
<?php
if (!isset($_GET["rnueva"])) {
?>
<form name="contrasena" method="get" action="cambia_contrasenadoc.php">
	<table align="center">
		<tr>
			<th> Usuario: </th>
			<td>
				<input name="usuario" type="text" value="<?php echo $usuario ?>" size="30" maxlength="50" readonly="true"/>
			</td>
		</tr>
		<tr>
			<th> Contrase&ntilde;a Anterior: </th>
			<td>
				<input name="anterior" type="password" id="anterior" size="30" maxlength="100">
			</td>
		</tr>		
		<tr>
			<th> Nueva Contrase&ntilde;a: </th>
			<td> 
            <INPUT id="nueva"  onkeyup="runPassword(this.value, 'nueva');" type="password" name="nueva" size="30" maxlength="15"> 
                         
            </td>
		</tr>
		<tr>
			<th> Repetir Nueva Contrase&ntilde;a: </th>
			<td> 
            <input name="rnueva" type="password" id="rnueva" size="30" maxlength="15">	
            </td>
			<input name="usuario" type="hidden"  value="<?php echo $usuario; ?>"/>
		</tr>
	</table>
	<br />
	<div align="center">
		<input name="cambiar" type="button" value="Cambiar" class="boton" onclick="valida_campos()">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="salir" value="Cancelar" class="boton" onClick="javascript:window.location = 'pasa.php?usuario=<?php echo $usuario; ?>'"> 
	</div>	
</form>
<?php
} 
else {
	$anterior = md5($anterior);
	$nueva = md5($nueva);
	$rnueva = md5($rnueva);
	$noes = 0;	
	$qry_contrasena="select * from acceso where contrasena =  '$anterior' and usuario = '$usuario'";
	$res_contrasena = ejecuta_consulta($qry_contrasena);
    while ($fila = $res_contrasena->fetch_assoc()){
		$noes = 1;
	}
	
	if ($noes == 1){
	    $qry_cambio_contrasena = "update acceso set contrasena = '$nueva' where usuario = '$usuario' ";
		ejecuta_consulta($qry_cambio_contrasena);
		 $msg = 'contraseña actualizada'; 
	}else $msg = 'Es su clave anterior no corresponde a la almacenada'; 
		
 ?>
     <script type="text/javascript">
 	    window.alert("<?php echo $msg; ?>") 
       	window.location = "pasa.php?usuario=<?php echo $usuario; ?>"
   	</script>
<?php 		
}
?>
</div>
</body>
</html>