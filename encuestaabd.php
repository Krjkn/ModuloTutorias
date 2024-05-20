<?php 
include "encabezadoalumno.php";
$user = $usuario;
$no_de_control = $user;
foreach($_GET as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   eval($asignacion); 
}
$actualiza="update encuesta3 set 
	puntual = '$puntual',
	timido = '$timido',
	alegre = '$alegre',
	agresivo = '$agresivo',
	abierto = '$abierto',
	refrexivo = '$refrexivo',
	constante = '$constante',
	optimista= '$optimista',
	impulsivo = '$impulsivo',
	silencioso = '$silencioso',
	generoso = '$generoso',
	inquieto = '$inquieto',
	humor = '$humor',
	dominante = '$dominante',
	egoista = '$egoista',
	sumiso = '$sumiso',
	confiado = '$confiado',
	iniciativa = '$iniciativa',
	sociable = '$sociable',
	responsable = '$responsable',
	perseverante = '$perseverante',
	motivado = '$motivado',
	activo = '$activo',
	independiente = '$independiente',
	comoserias = '$comoserias',
	recibesayuda = '$recibesayuda',
	queproblemas = '$queproblemas',
	cualrendimiento = '$cualrendimiento',
	asignaturaprefe = '$asignaturaprefe',
	asignaturasobre = '$asignaturasobre',
	asignaturadesag = '$asignaturadesag',
	asignaturabajo = '$asignaturabajo',
	porquevienes = '$porquevienes',
	quetemotiva ='$quetemotiva',
	promedioanterior = '$promedioanterior',
	cualesreprobaste = '$cualesreprobaste',
	planes = '$planes',
	meta = '$meta',
	yosoy = '$yosoy',
	carater = '$carater',
	megusta = '$megusta',
	aspiro = '$aspiro',
	miedo = '$miedo',
	lograr = '$lograr'
where  no_de_control = '$no_de_control'";
$inserta = "insert into encuesta3(no_de_control) values('$no_de_control')";
ejecuta_consulta($inserta);
ejecuta_consulta($actualiza);
$msg = 'Datos actualizados continua con tu entrevista';?>
<div id="mainFrame">
<script type="text/javascript">
	alert("<?php echo $msg; ?>");
</script>
</div>
<?php
?>