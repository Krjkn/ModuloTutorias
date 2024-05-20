// Funciones para extraescolares
function valida_campos_actualiza_modifica_actividad()
{
	formulario = document.actualizar;
	
	if(formulario.promotor.value == "vac")
	{
	  alert ("Seleccione un promotor");
		formulario.promotor.focus();
		return false;
	}
	
	if(formulario.dias.value == "")
	{
	  alert ("Indique los dias requeridos");
		formulario.dias.focus();
		return false;
	}

	if(formulario.gruposelec.value == "")
	{
	  alert ("Seleccione un grupo");
		formulario.gruposelec.focus();
		return false;
	}

	if(formulario.hora_inicial.value == "")
	{
	  alert ("Indique la hora_inicial");
		formulario.hora_inicial.focus();
		return false;
	}

	if(formulario.hora_final.value == "")
	{
		alert ("Indique la hora_final");
		formulario.hora_final.focus();
		return false;
	}

	if(formulario.capacidad.value == "")
	{
		alert ("Inserte la capacidad del grupo"); 
		formulario.capacidad.focus();
		return false;
	}

	if(formulario.lugar.value == "")
	{
		alert ("Se4leccione un lugar"); 
		formulario.lugar.focus();
		return false;
	}
	if(formulario.turno.value == "")
	{
		alert ("Indique el turno"); 
		formulario.turno.focus();
		return false;
	}
	if(formulario.Lun.checked == true)
	{
	  formulario.Lun.value=1;
	}
	else
	{
	  formulario.Lun.value=0;
	}
	
	if(formulario.Mar.checked == true)
	{
	  formulario.Mar.value=2;
	}
	else
	{
	  formulario.Mar.value=0;
	}

	if(formulario.Mie.checked == true)
	{
	  formulario.Mie.value=3;
	}
	else
	{
	  formulario.Mie.value=0;
	}

	if(formulario.Jue.checked == true)
	{
	  formulario.Jue.value=4;
	}
	else
	{
	  formulario.Jue.value=0;
	}

	if(formulario.Vie.checked == true)
	{
	  formulario.Vie.value=5;
	}
	else
	{
	  formulario.Vie.value=0;
	}

	if(formulario.Sab.checked == true)
	{
	  formulario.Sab.value=6;
	}
	else
	{
	  formulario.Sab.value=0;
	}
	formulario.submit();

window.location.href='modifica_actividad.php?accion=actualizar&materia=<?php echo $_GET["materia"];?>&promotor='+formulario.promotor.value+'&horai='+formulario.hora_inicial.value+'&horaf='+formulario.hora_final.value+'&capacidad='+formulario.capacidad.value+'&lugar='+formulario.lugar.value+'&turno='+formulario.turno.value+'&grupo='+formulario.gruposelec.value+'&dia='+formulario.dias.value+'&diasc='+formulario.Lun.value+formulario.Mar.value+formulario.Mie.value+formulario.Jue.value+formulario.Vie.value+formulario.Sab.value;
}

function valida_campos_crear_modifica_actividad()
{
	formulario = document.crear;
	
	if(formulario.nueva.value == "")
	{
	  alert ("nueva");
		formulario.nueva.focus();
		return false;
	}

	if(formulario.promotor.value == "")
	{
	  alert ("promotor");
		formulario.promotor.focus();
		return false;
				
	}
	if(formulario.capacidad.value == "")
	{
		alert ("capacidad"); 
		formulario.capacidad.focus();
		return false;
	}

        if(formulario.grupo_actividad.value == "")
	{
		alert ("grupo"); 
		formulario.grupo_actividad.focus();
		return false;
	}

	if(formulario.lugar.value == "")
	{
		alert ("lugar"); 
		formulario.lugar.focus();
		return false;
	}
	 if(formulario.hora_inicial.value == "")
	{
	  alert ("Selecciona Hora inicial");
		formulario.hora_inicial.focus();
		return false;
	}

        if(formulario.min_inicial.value == "")
	{
	  alert ("Selecciona los minutos de la Hora inicial");
		formulario.min_inicial.focus();
		return false;
	}

        if(formulario.hora_final.value == "")
	{
	  alert ("Selecciona Hora final");
		formulario.hora_final.focus();
		return false;
	}

        if(formulario.min_final.value == "")
	{
	  alert ("Selecciona los minutos de la Hora final");
		formulario.min_final.focus();
		return false;
	}	
	if(formulario.turno.value == "")
	{
		alert ("turno"); 
		formulario.turno.focus();
		return false;
	}

	if(formulario.Lun.checked == true)
	{
	  formulario.Lun.value=1;
	}
	else
	{
	  formulario.Lun.value=0;
	}
	
	if(formulario.Mar.checked == true)
	{
	  formulario.Mar.value=2;
	}
	else
	{
	  formulario.Mar.value=0;
	}

	if(formulario.Mie.checked == true)
	{
	  formulario.Mie.value=3;
	}
	else
	{
	  formulario.Mie.value=0;
	}

	if(formulario.Jue.checked == true)
	{
	  formulario.Jue.value=4;
	}
	else
	{
	  formulario.Jue.value=0;
	}

	if(formulario.Vie.checked == true)
	{
	  formulario.Vie.value=5;
	}
	else
	{
	  formulario.Vie.value=0;
	}
	if(formulario.Sab.checked == true)
	{
	  formulario.Sab.value=6;
	}
	else
	{
	  formulario.Sab.value=0;
	}
	formulario.submit();
window.location.href='modifica_actividad.php?accion=agregar&dep=<?php echo $_GET["dep"];?>&nueva='+formulario.nueva.value+'&promotor='+formulario.promotor.value+'&horai='+formulario.hora_inicial.value+formulario.min_inicial.value+'&horaf='+formulario.hora_final.value+formulario.min_final.value+'&capacidad='+formulario.capacidad.value+'&grupo='+formulario.grupo_actividad.value+'&lugar='+formulario.lugar.value+'&turno='+formulario.turno.value+'&diasc='+formulario.Lun.value+formulario.Mar.value+formulario.Mie.value+formulario.Jue.value+formulario.Vie.value+formulario.Sab.value;
}

function enviar_grupo()
{
formulario = document.actualizar;
document.actualizar.action = 'modifica_actividad.php?materia=<?php echo $_GET["materia"];?>&gruposeleccion='+formulario.gruposelec.value;
document.actualizar.submit();
}

function enviar_cambio_alumno()
{
formulario = document.alumno;
document.alumno.action = 'alumno_cambio.php?actividadselec='+formulario.actividades.value;
document.alumno.submit();
}
// fin pagina modifica actividad

//valida no de control

function valida_datos_control()
{
	formulario = document.no_control;

	if (formulario.no_control1.value == "")
	{
		alert("Introduce el Numero de Control");
		formulario.no_control1.focus();
    		return false;
	}
	

	formulario.submit();
}

// metodos pagina alumno cambio

function valida_datos_alumno_cambio()
{
	formulario = document.alumno;
	
	if(formulario.actividades.value == "")
	{
		alert ("Selecione una Actividad"); 
		formulario.actividades.focus();
		return false;
	}
	
	if(formulario.grupos.value == "")
	{
		alert ("Seleccione un Grupo"); 
		formulario.grupos.focus();
		return false;
	}
	formulario.submit();
window.location.href='alumno_cambio.php?accion=cambio&actividad='+formulario.actividades.value+'&grupo='+formulario.grupos.value;
}

//metodos pagina alumno inscripcion

function valida_campos_inscripcion()
{

	formulario = document.alumno_ins;
	
	if(formulario.actividades.value == "")
	{
	  alert ("Selecciona una Actividad");
		formulario.actividades.focus();
		return false;
				
	}

        if(formulario.grupo.value == "")
	{
	  alert ("Selecciona un Grupo");
		formulario.grupo.focus();
		return false;
	}

	if(formulario.seleccionado.checked == true)
	{
	  formulario.seleccionado.value='s';
	}
	else
	{
	  formulario.seleccionado.value='n';
	}	
//var no="<?PHP echo $_POST["no_control1"];?>";
	var no = "00000000";
formulario.submit();
window.location.href='alumno_inscripcion.php?alu_inscripcion=inscribir&grupo='+formulario.grupo.value+'&actividad='+formulario.actividades.value+'&selecionado='+formulario.seleccionado.value+'&no_control='+no;
}

function enviar_inscripcion()
{
formulario = document.alumno_ins;
document.alumno_ins.action = 'alumno_inscripcion.php?actividadselec='+formulario.actividades.value+'&gruposelect='+formulario.grupo.value;
document.alumno_ins.submit();
}

// pagina grupo alta

function valida_campos_alta_grupo()
{
	formulario = document.grupo_alta;
	
	if(formulario.actividad.value == "")
	{
	  alert ("Selecciona una Actividad");
		formulario.actividad.focus();
		return false;
				
	}

	if(formulario.promotor.value == "vac")
	{
	  alert ("Selecciona un Promotor");
		formulario.promotor.focus();
		return false;
				
	}
	
	if(formulario.grupo.value == "")
	{
	  alert ("Inserta un Grupo");
		formulario.grupo.focus();
		return false;
				
	}

	if(formulario.periodo.value == "")
	{
	  alert ("Selecciona un Periodo");
		formulario.periodo.focus();
		return false;
				
	}

	if(formulario.lugar.value == "vac")
	{
	  alert ("Selecciona un Lugar");
		formulario.lugar.focus();
		return false;
				
	}

	if(formulario.turno.value == "")
	{
	  alert ("Selecciona un Turno");
		formulario.turno.focus();
		return false;
				
	}

        if(formulario.capacidad.value == "")
	{
	  alert ("Indica la Capacidad");
		formulario.capacidad.focus();
		return false;
	}

        if(formulario.hora_inicial.value == "")
	{
	  alert ("Selecciona Hora inicial");
		formulario.hora_inicial.focus();
		return false;
	}

        if(formulario.min_inicial.value == "")
	{
	  alert ("Selecciona los minutos de la Hora inicial");
		formulario.min_inicial.focus();
		return false;
	}

        if(formulario.hora_final.value == "")
	{
	  alert ("Selecciona Hora final");
		formulario.hora_final.focus();
		return false;
	}

        if(formulario.min_final.value == "")
	{
	  alert ("Selecciona los minutos de la Hora final");
		formulario.min_final.focus();
		return false;
	}

        if(formulario.diasr.value == "")
	{
	  alert ("Indica los dias requerios para esta actividad");
		formulario.diasr.focus();
		return false;
	}

	if(formulario.Lun.checked == true)
	{
	  formulario.Lun.value=1;
	}
	else
	{
	  formulario.Lun.value=0;
	}
	
	if(formulario.Mar.checked == true)
	{
	  formulario.Mar.value=2;
	}
	else
	{
	  formulario.Mar.value=0;
	}

	if(formulario.Mie.checked == true)
	{
	  formulario.Mie.value=3;
	}
	else
	{
	  formulario.Mie.value=0;
	}

	if(formulario.Jue.checked == true)
	{
	  formulario.Jue.value=4;
	}
	else
	{
	  formulario.Jue.value=0;
	}

	if(formulario.Vie.checked == true)
	{
	  formulario.Vie.value=5;
	}
	else
	{
	  formulario.Vie.value=0;
	}
	if(formulario.Sab.checked == true)
	{
	  formulario.Sab.value=6;
	}
	else
	{
	  formulario.Sab.value=0;
	}
formulario.submit();
window.location.href='grupo_alta.php?crear=crear&actividad='+formulario.actividad.value+'&rfc='+formulario.promotor.value+'&grupo='+formulario.grupo.value+'&periodo='+formulario.periodo.value+'&lugar='+formulario.lugar.value+'&turno='+formulario.turno.value+'&capacidad='+formulario.capacidad.value+'&horai='+formulario.hora_inicial.value+formulario.min_inicial.value+'&horaf='+formulario.hora_final.value+formulario.min_final.value+'&diasr='+formulario.diasr.value+'&diasc='+formulario.Lun.value+formulario.Mar.value+formulario.Mie.value+formulario.Jue.value+formulario.Vie.value+formulario.Sab.value;
}

// pagina aula alta
function valida_campos_aula()
{
	formulario = document.alta;
	if(formulario.nombre_salon.value == "")
	{
	  alert ("Inserta el Nombre");
		formulario.nombre_usuario.focus();
		return false;
	}

	if(formulario.capacidad.value == "")
	{
	  alert ("Indica la Capacidad");
		formulario.usuario.focus();
		return false;
	}

	if(formulario.departamento.value == "Vac")
	{
	  alert ("Selecciona el Departamento");
		formulario.departamento.focus();
		return false;
	}
	
	formulario.submit();
}

//pagina cedula inscripcion

function enviar_cedula_inscripcion()
{
formulario = document.ced_inscripcion;
document.ced_inscripcion.action = 'cedula_inscripcion.php?seleccionact='+formulario.actividad.value+'&selecperiodo='+formulario.periodo.value;
document.ced_inscripcion.submit();
}

function valida_campos_ced_inscripcion()
{
	formulario = document.ced_inscripcion;
	if(formulario.actividad.value == "")
	{
	  alert ("Selecciona una actividad");
		formulario.actividades.focus();
		return false;
	}

	if(formulario.grupo.value == "")
	{
	  alert ("Selecciona un Grupo");
		formulario.grupo.focus();
		return false;
	}

	if(formulario.periodo.value == "")
	{
	  alert ("Seleciona el Departamento");
		formulario.periodo.focus();
		return false;
	}	
	formulario.submit();
window.location.href='cedula_inscripcion.php?crear=crear&ced_inscripcion=inscripcion&actividadselec='+formulario.actividad.value+'&gruposelec='+formulario.grupo.value;
}

//pagina cedula resultados

function enviar_cedula_resultados()
{
formulario = document.ced_resultados;
document.ced_resultados.action = 'cedula_resultados.php?seleccionact='+formulario.actividades.value+'&selecperiodo='+formulario.periodo.value;
document.ced_resultados.submit();
}

function valida_campos_ced_resultados()
{
	formulario = document.ced_resultados;
	if(formulario.actividades.value == "")
	{
	  alert ("Selecciona una actividad");
		formulario.actividades.focus();
		return false;
	}

	if(formulario.grupo.value == "")
	{
	  alert ("Selecciona un Grupo");
		formulario.grupo.focus();
		return false;
	}

	if(formulario.periodo.value == "")
	{
	  alert ("Seleciona el Departamento");
		formulario.periodo.focus();
		return false;
	}	
	formulario.submit();
window.location.href='cedula_resultados.php?crear=crear&ced_resultato=resultado&actividadselec='+formulario.actividades.value+'&gruposelec='+formulario.grupo.value+'&peri='+formulario.periodo.value;
}

//pagina boleta grupo

function enviar_boleta_grupo()
{
formulario = document.ced_resultados;
document.ced_resultados.action = 'boletas_gru.php?seleccionact='+formulario.actividades.value+'&selecperiodo='+formulario.periodo.value;
document.ced_resultados.submit();
}

function valida_campos_boleta_grupo()
{
	formulario = document.ced_resultados;
	if(formulario.actividades.value == "")
	{
	  alert ("Selecciona una actividad");
		formulario.actividades.focus();
		return false;
	}

	if(formulario.grupo.value == "")
	{
	  alert ("Selecciona un Grupo");
		formulario.grupo.focus();
		return false;
	}

	if(formulario.periodo.value == "")
	{
	  alert ("Seleciona el Departamento");
		formulario.periodo.focus();
		return false;
	}	
	formulario.submit();
window.location.href='boletas_gru.php?crear=crear&ced_resultato=resultado&actividadselec='+formulario.actividades.value+'&gruposelec='+formulario.grupo.value+'&peri='+formulario.periodo.value;
}

// pagina boleta actividad

function valida()
{
	formulario = document.actividad;

	if (formulario.actividades.value == "")
	{
		alert("Selecciona una actividad");
		formulario.actividades.focus(); 
    		return false;
	}
	formulario.submit();
window.location.href='boletas_act.php?aceptar=aceptar&actividades='+formulario.actividades.value+'&peri='+formulario.periodo.value;
}


// pagina boleta especialidad

function valida_esp()
{
	formulario = document.actividad;

	if (formulario.especialidad.value == "")
	{
		alert("Selecciona una Especialidad");
		formulario.especialidad.focus(); 
    		return false;
	}
	formulario.submit();
window.location.href='boletas_esp.php?aceptar=aceptar&especialidad='+formulario.especialidad.value+'&peri='+formulario.periodo.value;
}

//pagina calificacion agregar

function enviar_califi_agregar()
{
formulario = document.califi_agregar;
document.califi_agregar.action = 'calificacion_agregar.php?seleccionact='+formulario.actividades.value;
document.califi_agregar.submit();
}

function valida_campos_califi_agregar()
{
	formulario = document.califi_agregar;
	if(formulario.actividades.value == "")
	{
	  alert ("Selecciona una actividad");
		formulario.actividades.focus();
		return false;
	}

	if(formulario.grupo.value == "")
	{
	  alert ("Selecciona un Grupo");
		formulario.grupo.focus();
		return false;
	}

	if(formulario.periodo.value == "")
	{
	  alert ("Seleciona el Departamento");
		formulario.periodo.focus();
		return false;
	}	
	formulario.submit();
window.location.href='calificacion_agregar.php?crear=crear&ced_resultato=resultado&actividadselec='+formulario.actividades.value+'&gruposelec='+formulario.grupo.value;
}


//pagina calificacion modificar

function enviar_califi_modificar()
{
formulario = document.califi_agregar;
document.califi_agregar.action = 'calificacion_modificar.php?seleccionact='+formulario.actividades.value;
document.califi_agregar.submit();
}

function valida_campos_califi_modificar()
{
	formulario = document.califi_agregar;
	if(formulario.actividades.value == "")
	{
	  alert ("Selecciona una actividad");
		formulario.actividades.focus();
		return false;
	}

	if(formulario.grupo.value == "")
	{
	  alert ("Selecciona un Grupo");
		formulario.grupo.focus();
		return false;
	}

	if(formulario.periodo.value == "")
	{
	  alert ("Seleciona el Departamento");
		formulario.periodo.focus();
		return false;
	}	
	formulario.submit();
window.location.href='calificacion_modificar.php?crear=crear&ced_resultato=resultado&actividadselec='+formulario.actividades.value+'&gruposelec='+formulario.grupo.value;
}


// pagina selecionados actividad

function valida_selecionados()
{
	formulario = document.selecionados;

	if (formulario.actividades.value == "")
	{
		alert("Selecciona una actividad");
		formulario.actividades.focus(); 
    		return false;
	}
	formulario.submit();
window.location.href='seleccionados.php?aceptar=aceptar&actividades='+formulario.actividades.value;
}

// pagina estadisticas actividad

function valida_est_act()
{
	formulario = document.actividad;

	if (formulario.actividades.value == "")
	{
		alert("Selecciona una actividad");
		formulario.actividades.focus(); 
    		return false;
	}
	formulario.submit();
window.location.href='est_act_apr.php?aceptar=aceptar&actividades='+formulario.actividades.value+'&per='+formulario.periodo.value;
}

// pagina estadisticas actividad

function valida_est_rep()
{
	formulario = document.actividad;
	if (formulario.actividades.value == "")
	{
		alert("Selecciona una actividad");
		formulario.actividades.focus(); 
    		return false;
	}
	formulario.submit();
window.location.href='est_act_rep.php?aceptar=aceptar&actividades='+formulario.actividades.value+'&per='+formulario.periodo.value;
}

// pagina estadisticas especialidad
function valida_est_espa()
{
	formulario = document.actividad;

	if (formulario.especialidad.value == "")
	{
		alert("Selecciona una Especialidad");
		formulario.especialidad.focus(); 
    		return false;
	}
	formulario.submit();
window.location.href='est_esp_apr.php?aceptar=aceptar&espe='+formulario.especialidad.value+'&per='+formulario.periodo.value;
}

// pagina estadisticas especialidad rep
function valida_est_espr()
{
	formulario = document.actividad;

	if (formulario.especialidad.value == "")
	{
		alert("Selecciona una Especialidad");
		formulario.especialidad.focus(); 
    		return false;
	}
	formulario.submit();
window.location.href='est_esp_rep.php?aceptar=aceptar&espe='+formulario.especialidad.value+'&per='+formulario.periodo.value;
}

function insertar(grupo)
{
		formulario = document.alumno;
	if(confirm("Seguro que deseas inscribirte a este GRUPO"))
	{
		///formulario.grupo.href;
		window.location.href='inscripcion_alumnos.php?insc=inscribir&grupo1='+grupo+'&act=<?php echo $_GET["materia"];?>';
	}
	else
	{
		window.location.href='actividades.php';
	}
    		return false;
	
window.location.href='est_esp_rep.php?aceptar=aceptar&espe='+formulario.especialidad.value+'&per='+formulario.periodo.value;
}

// listas
function enviar_listas()
{
formulario = document.ced_inscripcion;
document.ced_inscripcion.action = 'listas.php?seleccionact='+formulario.actividad.value;
document.ced_inscripcion.submit();
}

function valida_campos_listas()
{
	formulario = document.ced_inscripcion;
	if(formulario.actividad.value == "")
	{
	  alert ("Selecciona una actividad");
		formulario.actividades.focus();
		return false;
	}

	if(formulario.grupo.value == "")
	{
	  alert ("Selecciona un Grupo");
		formulario.grupo.focus();
		return false;
	}

	if(formulario.periodo.value == "")
	{
	  alert ("Seleciona el Departamento");
		formulario.periodo.focus();
		return false;
	}	
	formulario.submit();
window.location.href='listas.php?crear=crear&ced_inscripcion=inscripcion&actividadselec='+formulario.actividad.value+'&gruposelec='+formulario.grupo.value;
}

//cerrar periodo

function aviso()
{
	if(confirm("Esta seguro de que quiere CERRAR PERIODO recuerde que esto solo se hace al FINAL DEL PERIODO"))
	{
		window.location.href='cerrar_periodo.php?cerrar=carrar_periodo';
	}
	else
	{
		window.location.href='../bienvenida.php';
	}
    		
}

// pagina crea tipo usuario
function valida_campos_usuario()
{
	formulario = document.alta;
	if(formulario.usuario.value == "")
	{
	  alert ("inserta el usuario");
		formulario.usuario.focus();
		return false;
	}

	if(formulario.contrasena.value == "")
	{
	  alert ("introduce la contrase&#241;a");
		formulario.contrasena.focus();
		return false;
	}

	if(formulario.promotor.value == "vac")
	{
	  alert ("seleccione al promotor designado");
		formulario.promotor.focus();
		return false;
	}

	if(formulario.departamento.value == "Vac")
	{
	  alert ("Selecciona el Departamento");
		formulario.departamento.focus();
		return false;
	}
	
	formulario.submit();
}

function valida_numeros(evt,obj) 
{
	keycode = (evt.keyCode==0) ? evt.which : evt.keyCode;
	valor=parseInt(String.fromCharCode(keycode));

	if (valor>=0 && valor<=9 )
	{
	}
	else
	{
		alert("Solo se permiten NUMEROS ");	
		window.event.keyCode=0;
	}
}

// monitor 
function valida_monitor()
{
	formulario = document.alta;
	if(formulario.nombre.value == "")
	{
	  alert ("inserta el NOMBRE");
		formulario.nombre.focus();
		return false;
	}

	if(formulario.apellidos.value == "")
	{
	  alert ("inserta los APELLIDOS");
		formulario.apellidos.focus();
		return false;
	}

	if(formulario.rfc.value == "")
	{
	  alert ("inserta el RFC");
		formulario.rfc.focus();
		return false;
	}	
	formulario.submit();
}
