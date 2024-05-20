<?php
  require_once("includes/config.inc.php");
?>
<html>
<head
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SII  Desarrollo Academico</title>

<link rel="stylesheet" type="text/css" href="css/tec_estilo_encabezado.css" />
<script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>

<center>
<table  align="center">  
  	<tr>
      <td><img src="img/sep.jpg"  width="200" height="100" /> </td>
	  	<td>
			<font class="titulo1">SISTEMA INTEGRAL DE INFORMACIÓN</font>
			<br>
			<font class="titulo2">---INSTITUTO TECNOLOGICO DE IGUALA---</font>
			<br>
			<font class="titulo2">---PORTAL DE DESARROLLO ACADEMICO---</font>
      </td>
	  <td><img src="img/tecnm.jpg"  width="200" height="100" /> </td>
  	</tr>
  </table>
</center>
<div id="masthead">
	<script type='text/javascript'>function Go(){return}</script>
	<script type='text/javascript'>
		var NoOffFirstLineMenus=9;				
		var raiz_modulo = "";
		var raiz_modulo_tutor = "";
		var ruta_consultas = "";
		var ruta_imagenes = "img/";
		var BaseHref="";		
	</script>
	<script type='text/javascript' src='js/var_menu.js'></script>
	<script type='text/javascript'>
		var alto_menus = 22;
		var alto_submenus = 20;
		var ancho_orillas = 5;
		var alineacion_submenus = "left";
		Menu1=new Array("","",BaseHref + ruta_imagenes + "glbnav_left.gif",0,alto_menus,ancho_orillas,"","","","","","",-1,1,-1,"","");
		var ancho_menu2 = 95;
		var ancho_menu4 = 105;
		Menu2=new Array("Tutorias","",image,7,alto_menus,ancho_menu4,"","","","","","",-1,1,-1,"","Herramientas Para El Modulo Evaluacion Docente");
			var ancho_sub_menu4 = 190;	
			Menu2_1=new Array("Lista Grupos de Tutorias",raiz_modulo_tutor+"lista_grupos_desarrollo.php","",0,alto_submenus,ancho_sub_menu4,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Permitir Acceso Al Alumno Para Tomar Carga Academica.");	
			Menu2_2=new Array("Crea Grupos de Tutorias",raiz_modulo_tutor+"creagrupo.php","",0,alto_submenus,ancho_sub_menu4,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Permitir Acceso Al Alumno Para Tomar Carga Academica.");	 
			Menu2_3=new Array("Modifica Grupos de Tutorias",raiz_modulo_tutor+"modificagrupo.php","",0,alto_submenus,ancho_sub_menu4,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Permitir Acceso Al Alumno Para Tomar Carga Academica.");	 
			Menu2_4=new Array("Elimina Grupos de Tutorias",raiz_modulo_tutor+"eliminagrupo.php","",0,alto_submenus,ancho_sub_menu4,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Permitir Acceso Al Alumno Para Tomar Carga Academica.");	 
			Menu2_5=new Array("Asigna Profrofesor a Grupo",raiz_modulo_tutor+"extraasigna_docente.php","",0,alto_submenus,ancho_sub_menu4,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Permitir Acceso Al Alumno Para Tomar Carga Academica.");	 
			Menu2_6=new Array("Asigna Alumno a Grupo",raiz_modulo_tutor+"asignaalumnogrupo.php","",0,alto_submenus,ancho_sub_menu4,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Permitir Acceso Al Alumno Para Tomar Carga Academica.");
			Menu2_7=new Array("Borra Alumno de Grupo",raiz_modulo_tutor+"borraalumnogrupo.php","",0,alto_submenus,ancho_sub_menu4,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Permitir Acceso Al Alumno Para Tomar Carga Academica.");
		var ancho_Menu6 = 80;
		Menu3=new Array("|","",image,0,alto_menus,6,"","","#000000","#000000","","",-1,-1,-1,"","");
		var ancho_Menu8 = 90;
		Menu4=new Array("Utiler\u00EDas","",image,1,alto_menus,ancho_Menu8,"","","","","","",-1,1,-1,"","Utilerias Varias del Sistema");
			var ancho_sub_Menu8 = 160
			Menu4_1=new Array("Cambio de Contrase\u00F1a",raiz_modulo_tutor+"cambio_contrasena.php","",0,alto_submenus,ancho_sub_Menu8,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Cambia la contrase\u00F1a actual del Usuario");
		Menu5=new Array("|","",image,0,alto_menus,6,"","","#000000","#000000","","",-1,-1,-1,"","");
		var ancho_Menu10 = 120;
		Menu6=new Array("Cursos","",image,4,alto_menus,ancho_Menu10,"","","","","","",-1,1,-1,"","Administraci\u00F3n de los Cursos Intersemestrales");
			var ancho_sub_menu10 = 150;	
			Menu6_1 = new Array("Instructores",raiz_modulo+"curint/instructores/list_instructores.php","",0,alto_submenus,ancho_sub_menu10,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Registrar un instructor");
			Menu6_2 = new Array("Cursos",raiz_modulo+"curint/cursos/list_cursos.php","",0,alto_submenus,ancho_sub_menu10,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Listar cursos");
			Menu6_3 = new Array("Listas",raiz_modulo+"curint/listas/list_listas.php","",0,alto_submenus,ancho_sub_menu10,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Lista del curso, cedulas de registro");
			Menu6_4 = new Array("Cursos Tomados",raiz_modulo+"curint/profesores/list_profesor.php","",0,alto_submenus,ancho_sub_menu10,sub_LowBgColor,sub_HighBgColor,sub_FontLowColor,sub_FontHighColor,sub_BorderColor,"",-1,1,-1,alineacion_submenus,"Cursos que tomo el maestro");
		Menu7=new Array("|","",image,0,alto_menus,6,"","","#000000","#000000","","",-1,-1,-1,"",""); 
		var ancho_Menu12 = 120;
		Menu8=new Array("Cerrar Sesi\u00F3n",raiz_modulo_tutor+"cerrar_sesion.php",image,0,alto_menus,ancho_Menu12,"","","","","","",-1,1,-1,"","Termina una Sesi\u00F3n de la Cuenta Activa en el Sistema");
		Menu9=new Array("","",BaseHref + ruta_imagenes + "glbnav_right.gif",0,alto_menus,ancho_orillas,"","","","","","",-1,1,-1,"",""); 
	</script>
 	<script type='text/javascript' src='js/menu.js'></script>
	<noscript>Tu Navegador no soporta Java Script</noscript>
</div>
</body>
</html>
	
