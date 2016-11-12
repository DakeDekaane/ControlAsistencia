// Función para recoger los datos de PHP según el navegador.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
 
//Función para recoger los datos del formulario y enviarlos por post  
function registrarBecario(){
 
	//div donde se mostrará lo resultados
	divResultado = document.getElementById('estado_registro');
	
	//Se obtienen los datos del formulario
	nickname=document.nuevo_becario.nickname.value;
	name=document.nuevo_becario.name.value;
	password=document.nuevo_becario.password.value;
 
	//Instanciamos el objetoAjax
	ajax=objetoAjax();
 
	//Uso del metodo POST
	ajax.open("POST","registro.php",true);
	
	//Cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
	ajax.onreadystatechange=function() {
		//La función responseText tiene todos los datos pedidos al servidor
		if (ajax.readyState==4) {
			//Mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText
			//Llamar a funcion para limpiar el formulario
			LimpiarCamposRegistro();
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//Enviando los valores para su procesamiento
	ajax.send("nickname="+nickname+"&name="+name+"&password="+password)
}

function registrarEntrada(){
 
	//div donde se mostrará lo resultados
	divResultado = document.getElementById('estado_checkin');
	
	//Se obtienen los datos del formulario
	nickname=document.checkin.nickname.value;
	password=document.checkin.password.value;
 
	//Instanciamos el objetoAjax
	ajax=objetoAjax();
 
	//Uso del metodo POST
	ajax.open("POST","checkin.php",true);
	//Cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
	ajax.onreadystatechange=function() {
		//La función responseText tiene todos los datos pedidos al servidor
		if (ajax.readyState==4) {
			//Mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText
			//Llamar a funcion para limpiar el formulario
			LimpiarCamposCheckIn();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//Enviando los valores para su procesamiento
	ajax.send("nickname="+nickname+"&password="+password)
}

function registrarSalida(){
 
	//div donde se mostrará lo resultados
	divResultado = document.getElementById('estado_checkout');
	//Se obtienen los datos del formulario
	nickname=document.checkout.nickname.value;
	password=document.checkout.password.value;
 
	//Instanciamos el objetoAjax
	ajax=objetoAjax();
 
	//Uso del metodo POST
	ajax.open("POST","checkout.php",true);
	//Cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
	ajax.onreadystatechange=function() {
		//La función responseText tiene todos los datos pedidos al servidor
		if (ajax.readyState==4) {
			//Mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText
			//Llamar a funcion para limpiar el formulario
			LimpiarCamposCheckOut();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//Enviando los valores para su procesamiento
	ajax.send("nickname="+nickname+"&password="+password)
}

function mostrarHorario(){
 
	//div donde se mostrará lo resultados
	divResultado = document.getElementById('info');
	//Se obtienen los datos del formulario
	nickname=document.horario.nickname.value;
 
	//Instanciamos el objetoAjax
	ajax=objetoAjax();
 
	//Uso del metodo POST
	ajax.open("POST","info.php",true);
	//Cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
	ajax.onreadystatechange=function() {
		//La función responseText tiene todos los datos pedidos al servidor
		if (ajax.readyState==4) {
			//Mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//Enviando los valores para su procesamiento
	ajax.send("nickname="+nickname)
}

//función para limpiar los campos
function LimpiarCamposRegistro(){
	document.nuevo_becario.nickname.value="";
	document.nuevo_becario.name.value="";
	document.nuevo_becario.password.value="";
	document.nuevo_becario.nickname.focus();
}

function LimpiarCamposCheckIn(){
	document.checkin.nickname.value="";
	document.checkin.password.value="";
	document.checkin.nickname.focus();
}

function LimpiarCamposCheckOut(){
	document.checkout.nickname.value="";
	document.checkout.password.value="";
	document.checkout.nickname.focus();
}

