var fun=function(){return}; //funcion vacia
//si args[0] es numerico es para cargar scripts
//args[1] = script
//si args[0] no es numerico es para cargar pagina y este es su nombre
//args[1] = div
//args[2] = texto (opcional)
function ajax() {var args = ajax.arguments;
	var x = (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP"): new XMLHttpRequest();
	if(isNaN(new Number(args[0]))){	var doc = document.getElementById(args[1]);	doc.innerHTML = (args[2]!= undefined )?args[2]:'<h3>Cargando página...</h3>';    
	    x.onreadystatechange = function(){if (x.readyState == 4 && x.status == 200){doc.innerHTML =x.responseText; fun();}}
	x.open("GET", args[0], true);x.send(null);   
	}
	else
	{
		x.onreadystatechange = function(){if (x.readyState == 4 && x.status == 200){var getheadTag = document.getElementsByTagName('head')[0];	setjs = document.createElement('script');
				setjs.setAttribute('type', 'text/javascript');getheadTag.appendChild(setjs);setjs.text = x.responseText;  fun();}}	
		x.open("GET", args[1], true);x.send(null);		
	}
}    

function ajax2() {var args = ajax.arguments;
	var x = (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP"): new XMLHttpRequest();
	if(isNaN(new Number(args[0]))){	
	var doc = document.getElementById(args[1]);	
	alert(doc);
	doc.innerHTML = (args[2]!= undefined )?args[2]:'<h3>Cargando página...</h3>';    
	    x.onreadystatechange = function(){if (x.readyState == 4 && x.status == 200){ alert(doc);doc.innerHTML = x.responseText; fun();}}
	x.open("GET", args[0], true);x.send(null);   
	}
	else
	{
		x.onreadystatechange = function(){if (x.readyState == 4 && x.status == 200){var getheadTag = document.getElementsByTagName('head')[0];	setjs = document.createElement('script');
				setjs.setAttribute('type', 'text/javascript');getheadTag.appendChild(setjs);setjs.text = x.responseText;  fun();}}	
		x.open("GET", args[1], true);x.send(null);		
	}
} 
//funcion que envia parametros de formulario mediante ajax
//los parametros que recibe son:
//args[0] = metodo
//args[1] = div
//args[2] = pagina
//args[3] = parametros
//args[4] = texto (opcional)
function ajaxform()
{
	var args = ajaxform.arguments;
	var x = (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP"): new XMLHttpRequest();
	m=(args[0]=='')?'GET':args[0];
		var doc = document.getElementById(args[1]);		
	    doc.innerHTML = (args[4]!= undefined )?args[4]:'<h3>Cargando página...</h3>';    		
	    x.onreadystatechange = function() 
		{
		if (x.readyState == 4 && x.status == 200) { results = x.responseText; doc.innerHTML = results; fun();} 
		}
	        x.open(m, args[2], true);
			x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	        x.send(args[3]);  	
}