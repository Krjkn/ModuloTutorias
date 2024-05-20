// fAddEvent(2003,12,2," Haga click aqui para activar su cliente de Correo Electronico. ","popup('mailto:sistemas@mexicohotels.com.mx?subject=Agenda subject')","#87ceeb","dodgerblue",null,true);
//fAddEvent(2007,5,26, "Mi Cumple", null, "#87ceeb", "black");

//AGENDA MEXICO 2007
fAddEvent(2007,4,5,"Jueves Santo Festividad Cristiana", '', "#87ceeb", "red");
fAddEvent(2007,4,6,"Viernes Santo Festividad Cristiana", '', "#87ceeb", "red");
fAddEvent(2007,4,7,"Sabado Santo Festividad Cristiana", '', "#87ceeb", "red");
fAddEvent(2007,4,8,"Domingo de Pascua - Festividad Cristiana", '', "#87ceeb", "red");
fAddEvent(2007,12,25,"Navidad (25 Diciembre)", '', "#87ceeb", "red");

function fHoliday(y,m,d) {
	var rE=fGetEvent(y,m,d), r=null;


	if (m==1&&d==1)
		r=[" Jan 1, "+y+" \n Feliz Año Nuevo! ",gsAction,"skyblue","red"];
	else if (m==12&&d==25)
		r=[" Dec 25, "+y+" \n Feliz Navidad! ",gsAction,"skyblue","red"];

	return rE?rE:r;	
}


