window.addEventListener("load",Inicio);

function Inicio(){
	var submit = document.querySelector("#nuevo_inmueble");
	submit.addEventListener("click",ValidarFormulario);

	var tipo = document.querySelector("#tipo");
	tipo.addEventListener("blur",ValidarTipo);  

	var direccion = document.querySelector("#calle");
	direccion.addEventListener("blur",ValidarCalle);

	var direccion = document.querySelector("#portal");
	direccion.addEventListener("blur",ValidarPortal);

	var cp = document.querySelector("#cp");
	cp.addEventListener("blur",ValidarCp);

	var zona = document.querySelector("#localidad");
	zona.addEventListener("blur",ValidarLocalidad);

	var metros = document.querySelector("#metros");
	metros.addEventListener("blur",ValidarMetros);

	var num_hab = document.querySelector("#num_hab");
	num_hab.addEventListener("blur",ValidarHabitaciones);

	var banos = document.querySelector("#num_banos");
	banos.addEventListener("blur",ValidarBanos);

	var garaje = document.querySelector("#garaje");
	garaje.addEventListener("blur",ValidarGaraje);

	var jardin = document.querySelector("#jardin");
	jardin.addEventListener("blur",ValidarJardin);

	var piscina = document.querySelector("#piscina");
	piscina.addEventListener("blur",ValidarPiscina);

	var estado = document.querySelector("#estado");
	estado.addEventListener("blur",ValidarEstado);

	var titular = document.querySelector("#titular");
	titular.addEventListener("blur",ValidarTitular);

	var descripcion = document.querySelector("#descripcion");
	descripcion.addEventListener("blur",ValidarDescripcion);

	var precio = document.querySelector("#precio");
	precio.addEventListener("blur",ValidarPrecio);

	var fecha_alta = document.querySelector("#fecha_alta");
	fecha_alta.addEventListener("blur",ValidarFecha);
}
//-----Validamos elementos
function ValidarTipo() {
	if(tipo.selectedIndex == null || tipo.selectedIndex == 0 ) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! Debe escoger un tipo";
		this.nextSibling.className = "error";
		return true;
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Tipo válido";
		this.nextSibling.className ="ok";
		return false;
	}
}

function ValidarCalle() {
	if(calle.value == '' || calle.value.length == 0 ) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La calle no puede estar vacía";
		this.nextSibling.className = "error";
		return false;
	} else if(calle.value.length >100) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La calle no puede superar los 100 caracteres";
		this.nextSibling.className = "error";
		return false;
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Calle válida";
		this.nextSibling.className ="ok";
		return true;
	}
}

function ValidarPortal() {
	if(portal.value == '' || portal.value.length == 0 ) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El portal no puede estar vacío";
		this.nextSibling.className = "error";
	} else if(isNaN(portal.value)) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El portal debe de constar de caracteres numéricos";
		this.nextSibling.className = "error";
	} else if(portal.value.length >10) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El portal no puede superarlos 10 caracteres";
		this.nextSibling.className = "error";
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Portal válido";
		this.nextSibling.className ="ok";
	}
}


function ValidarCp() {
	if(cp.value == '' || cp.value.length == 0 ) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El código postal no puede estar vacío";
		this.nextSibling.className = "error";
	} else if(isNaN(cp.value)) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El código postal debe de constar de caracteres numéricos";
		this.nextSibling.className = "error";
	} else if(cp.value.length >5) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El código postal no puede superarlos 5 caracteres";
		this.nextSibling.className = "error";
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Código Postal válido";
		this.nextSibling.className ="ok";
	}
}

function ValidarLocalidad() {
	if(localidad.value == '' || localidad.value.length == 0 ) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La localidad no puede estar vacía";
		this.nextSibling.className = "error";
	} else if(localidad.value.length >30) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La localidad no puede superar los 30 caracteres";
		this.nextSibling.className = "error";
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Localidad válida";
		this.nextSibling.className ="ok";
	}
}

function ValidarMetros() {
	if(metros.value == '' || metros.value.length == 0 ) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! Los metros no pueden estar vacios";
		this.nextSibling.className = "error";
	} else if(isNaN(metros.value)) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención!  Los metros deben de constar de caracteres numéricos";
		this.nextSibling.className = "error";
	} else if(metros.value.length >5) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención!  Los metros no pueden superarlos 5 caracteres";
		this.nextSibling.className = "error";
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Metros válidos";
		this.nextSibling.className ="ok";
	}
}

function ValidarHabitaciones(){
	if(num_hab.value == '' || num_hab.value.length == 0 ){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de habitaciones no pueden estar vacios";
		this.nextSibling.className = "error";
	}else if(isNaN(num_hab.value)){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de habitaciones debe de ser caracteres númerico";
		this.nextSibling.className = "error";
	}else if(num_hab.value.length >5){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de habitaciones no pueden superarlos 5 caracteres";
		this.nextSibling.className = "error";
	}else{
		this.className = "form-control";
		this.nextSibling.innerHTML = "Nº de habitaciones válidos";
		this.nextSibling.className ="ok";
	}
}

function ValidarBanos() {
	if(num_banos.value == '' || num_banos.value.length == 0 ) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de baños no pueden estar vacios";
		this.nextSibling.className = "error";
	} else if(isNaN(num_banos.value)) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de baños debe de ser caracteres númerico";
		this.nextSibling.className = "error";
	} else if(num_banos.value.length >5) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de baños no pueden superarlos 5 caracteres";
		this.nextSibling.className = "error";
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Nº de baños válidos";
		this.nextSibling.className ="ok";
	}
}

function ValidarGaraje(){
	garaje = document.querySelectorAll("input[name='${garaje}']");
	if(garaje.value === value){
		garaje.checked = true;
		this.className = "form-control";
		this.nextSibling.innerHTML = "Garaje valido";
		this.nextSibling.className ="ok";
	}else{
		//alert("¡Atención! Debe seleccionar una opción en garaje");
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La opcion garaje no puede estar vacía";
		this.nextSibling.className = "error";
	}
	console.log (garaje.value);
}

function ValidarJardin() {
	jardin = document.querySelectorAll("input[name='${jardin}']");
	if(jardin.value === value){
		jardin.checked = true;
		this.className = "form-control";
		this.nextSibling.innerHTML = "Jardín valido";
		this.nextSibling.className ="ok";
	} else {
		//alert("¡Atención! Debe seleccionar una opción en garaje");
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La opcion jardin no puede estar vacía";
		this.nextSibling.className = "error";
	}
	console.log (jardin.value);
}

function ValidarPiscina() {
	piscina = document.querySelectorAll("input[name='${piscina}']");
	if(piscina.value === value) {
		piscina.checked = true;
		this.className = "form-control";
		this.nextSibling.innerHTML = "piscina valido";
		this.nextSibling.className ="ok";
	} else {
		//alert("¡Atención! Debe seleccionar una opción en garaje");
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La opcion piscina no puede estar vacía";
		this.nextSibling.className = "error";
	}
	console.log (piscina.value);
}

function ValidarEstado(){
	estado= document.querySelectorAll("select[id='${estado}']").selectedIndex;
	if(estado == null || estado == 0) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La opcion estado no puede estar vacía";
		this.nextSibling.className = "error";
		return false;
	}
}

function ValidarTitular(){
	if(titular.value == '' || titular.value.length == 0) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El titular no puede estar vacía";
		this.nextSibling.className = "error";
		return false;
	} else if(descripcion.value.length >150) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención!El titular no puede superar los 150 caracteres";
		this.nextSibling.className = "error";
		return false;
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Titular válido";
		this.nextSibling.className ="ok";
		return true;
	}
}


function ValidarDescripcion() {
	if(descripcion.value == '' || descripcion.value.length == 0) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La descripcion no puede estar vacía";
		this.nextSibling.className = "error";
		return false;
	} else if(descripcion.value.length >1500) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La descripcion no puede superar los 1500 caracteres";
		this.nextSibling.className = "error";
		return false;
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Descripcion válida";
		this.nextSibling.className ="ok";
		return true;
	}
}

function ValidarPrecio() {
	if(precio.value == '' || precio.value.length == 0 ) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El precio no puede estar vacio";
		this.nextSibling.className = "error";
		return false;
	} else if(isNaN(precio.value)) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El precio debe de constar de caracteres numéricos";
		this.nextSibling.className = "error";
		return false;
	} else if(metros.value.length >5) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El precio no puede superarlos 5 caracteres";
		this.nextSibling.className = "error";
		return false;
	} else {
		this.className = "form-control";
		this.nextSibling.innerHTML = "Precio válido";
		this.nextSibling.className ="ok";
		return true;
	}
}

function ValidarFecha() {
	fecha = new Date();
	var dia = fecha.getDate();
	if (dia < 10) { dia = '0' + dia;} 
	var mes = fecha.getMonth() + 1;
	if (mes < 10) { mes = '0' + mes;} 
	var anio = fecha.getFullYear();
	var fecha = dia+'-'+mes+'-'+anio;


	if (this.value == "") {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! Debe indicar una fecha de publicación";
		this.nextSibling.className = "error";
		return false;
	} else if (this.value < fecha ) {
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! No puedes indicar una fecha de publicación anterior al día de hoy";
		this.nextSibling.className = "error";
		return false;
	} else {
		this.className="form-control";
		this.nextSibling.innerHTML = "La fecha es válida";
		this.nextSibling.className = "ok";
		return true;
	}
}

function ValidarFormulario(event) {
	if (ValidarTipo()  && ValidarCalle() && ValidarPortal &&  ValidarCp() && ValidarLocalidad() && ValidarMetros() && ValidarHabitaciones() && ValidarBanos() && ValidarGaraje()
		&& ValidarJardin() && ValidarPiscina() && ValidarEstado() && ValidarTitular && ValidarDescripcion() && ValidarPrecio() && ValidarFecha() ("¿Confirma enviar el formulario?")) {
		return true;
	} else {
		event.preventDefault();
		return false;
	}
}
