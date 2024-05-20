<form action="insertar_datos.php" method="post" onSubmit="return validate()">
<table width="400" border="1" cellspacing="1">
  <tr>
    <td>NOMBRE DE PARTE</td>
    <td>CANTIDAD</td>
    <td>PROPIEDAD</td>
  </tr>
  <tr>
    <td><input name="nom_part[]" type="text" ></td>
    <td><input name="cantid[]" type="text"></td>
    <td><input name="prop[]" type="text"></td>
  </tr>
  <tr>
    <td><input name="nom_part[]" type="text"></td>
    <td><input name="cantid[]" type="text"></td>
    <td><input name="prop[]" type="text"></td>
  </tr>
  <tr>
    <td><input name="nom_part[]" type="text"></td>
    <td><input name="cantid[]" type="text"></td>
    <td><input name="prop[]" type="text"></td>
  </tr>
  <tr>
    <td><input name="nom_part[]" type="text"></td>
    <td><input name="cantid[]" type="text"></td>
    <td><input name="prop[]" type="text"></td>
  </tr>
  <tr>
    <td><input name="nom_part[]" type="text"></td>
    <td><input name="cantid[]" type="text"></td>
    <td><input name="prop[]" type="text"></td>
  </tr>
</table>
<br>
<br>
<label>
<input type="submit" name="Submit" value="Enviar">
</label>
<input name="Restablecer" type="reset" value="Limpiar">
    
  </p>
</form> 

insertar_datos.php

<?

$nom_part = $_POST['nom_part'];
$cantid = $_POST['cantid'];
$prop = $_POST['prop'];

$total = count($prop);

$query .= "INSERT INTO nombre_tabla (columna1, columna2, columna3) VALUES ";

for($i=0;$i<$total;$i++){

$query .= "('" . $nom_part[$i] . "','" . $cantid[$i] . "','" . $prop[$i] . "')";

$query .= ($i<$total-1) ? "," : "";

}


echo $query;

mysql_query($query) or die(mysql_error());

?>