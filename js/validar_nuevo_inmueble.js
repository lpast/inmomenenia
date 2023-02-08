window.addEventListener("load",Inicio);

function Inicio(){
	var submit = document.querySelector("#nuevo_inmueble");
	submit.addEventListener("click",ValidarFormulario);

	var tipo = document.querySelector("#tipo");
	tipo.addEventListener("blur",ValidarTipo);  

	var direccion = document.querySelector("#direccion");
	direccion.addEventListener("blur",ValidarDireccion);

	var cp = document.querySelector("#cp");
	cp.addEventListener("blur",ValidarCp);

	var zona = document.querySelector("#zona");
	zona.addEventListener("blur",ValidarZona);

	var metros = document.querySelector("#metros");
	metros.addEventListener("blur",ValidarMetros);

	var num_hab = document.querySelector("#num_hab");
	num_hab.addEventListener("blur",ValidarHabitaciones);

	var banos = document.querySelector("#banos");
	banos.addEventListener("blur",ValidarBanos);

	var garaje = document.querySelector("#garaje");
	garaje.addEventListener("blur",ValidarGaraje);

	var jardin = document.querySelector("#jardin");
	jardin.addEventListener("blur",ValidarJardin);

	var piscina = document.querySelector("#piscina");
	piscina.addEventListener("blur",ValidarPiscina);

	var estado = document.querySelector("#estado");
	estado.addEventListener("blur",ValidarEstado);

	var descripcion = document.querySelector("#descripcion");
	descripcion.addEventListener("blur",ValidarDescripcion);

	var precio = document.querySelector("#precio");
	precio.addEventListener("blur",ValidarPrecio);

	var fecha_alta = document.querySelector("#fecha_alta");
	fecha_alta.addEventListener("blur",ValidarFecha);
}
//-----Validamos elementos
function ValidarTipo(){
	if(tipo.selectedIndex == null || tipo.selectedIndex == 0 ){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! Debe escoger un tipo";
		this.nextSibling.className = "error";
		return true;
	}else{
		this.className = "form-control";
		this.nextSibling.innerHTML = "Tipo válido";
		this.nextSibling.className ="ok";
		return false;
	}
}

function ValidarDireccion(){
	if(direccion.value == '' || direccion.value.length == 0 ){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La dirección no puede estar vacía";
		this.nextSibling.className = "error";
	}else if(direccion.value.length >100){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La dirección no puede superar los 100 caracteres";
		this.nextSibling.className = "error";
	}else{
		this.className = "form-control";
		this.nextSibling.innerHTML = "Dirección válida";
		this.nextSibling.className ="ok";
	}
}

function ValidarCp(){
	if(cp.value == '' || cp.value.length == 0 ){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El código postal no puede estar vacío";
		this.nextSibling.className = "error";
	}else if(isNaN(cp.value)){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El código postal debe de constar de caracteres numéricos";
		this.nextSibling.className = "error";
	}else if(cp.value.length >10){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El código postal no puede superarlos 10 caracteres";
		this.nextSibling.className = "error";
	}else{
		this.className = "form-control";
		this.nextSibling.innerHTML = "Código Postal válido";
		this.nextSibling.className ="ok";
	}
}

function ValidarZona(){
	if(zona.value == '' || zona.value.length == 0 ){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La zona no puede estar vacía";
		this.nextSibling.className = "error";
	}else if(zona.value.length >100){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La zona no puede superar los 100 caracteres";
		this.nextSibling.className = "error";
	}else{
		this.className = "form-control";
		this.nextSibling.innerHTML = "Zona válida";
		this.nextSibling.className ="ok";
	}
}

function ValidarMetros(){
	if(metros.value == '' || metros.value.length == 0 ){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! Los metros no pueden estar vacios";
		this.nextSibling.className = "error";
	}else if(isNaN(metros.value)){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención!  Los metros deben de constar de caracteres numéricos";
		this.nextSibling.className = "error";
	}else if(metros.value.length >10){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención!  Los metros no pueden superarlos 10 caracteres";
		this.nextSibling.className = "error";
	}else{
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
	}else if(num_hab.value.length >10){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de habitaciones no pueden superarlos 10 caracteres";
		this.nextSibling.className = "error";
	}else{
		this.className = "form-control";
		this.nextSibling.innerHTML = "Nº de habitaciones válidos";
		this.nextSibling.className ="ok";
	}
}

function ValidarBanos(){
	if(banos.value == '' || banos.value.length == 0 ){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de baños no pueden estar vacios";
		this.nextSibling.className = "error";
	}else if(isNaN(banos.value)){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de baños debe de ser caracteres númerico";
		this.nextSibling.className = "error";
	}else if(banos.value.length >10){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El nº de baños no pueden superarlos 10 caracteres";
		this.nextSibling.className = "error";
	}else{
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
		this.nextSibling.innerHTML = "Nº de baños válidos";
		this.nextSibling.className ="ok";
	}else{
		//alert("¡Atención! Debe seleccionar una opción en garaje");
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La opcion garaje no puede estar vacía";
		this.nextSibling.className = "error";
	}
	console.log (garaje.value);
}

function ValidarJardin(name,value){
	vJardin = document.querySelectorAll("input[name='${jardin}']").forEach(element => {
        if(!element.value === value){
			alert('"¡Atención! Debe seleccionar una opción en jardin"');
        }else{
			element.checked = true;
		}
    });
	console.log (vJardin);
}

function ValidarPiscina(){
	piscina = document.querySelectorAll("input[name='${piscina}']").forEach(element => {
        if(element.value === value){
				element.checked = true;
        }else{
			//alert("¡Atención! Debe seleccionar una opción en garaje");
			this.className = "form-control error-input";
			this.nextSibling.innerHTML = "¡Atención! La opcion piscina no puede estar vacía";
			this.nextSibling.className = "error";
		}
    });
	alert (piscina.value);
}

function ValidarEstado(name,value){
	vEstado= document.querySelectorAll("input[name='${estado}']").forEach(element => {
        if(!element.value === value){
			alert('"¡Atención! Debe seleccionar una opción en estado"');
        }else{
			element.checked = true;
		}
    });
	console.log (vEstado);
}


function ValidarDescripcion(){
	if(descripcion.value == '' || descripcion.value.length == 0){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La descripcion no puede estar vacía";
		this.nextSibling.className = "error";
	}else if(descripcion.value.length >250){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La descripcion no puede superar los 250 caracteres";
		this.nextSibling.className = "error";
	}else{
		this.className = "form-control";
		this.nextSibling.innerHTML = "Descripcion válida";
		this.nextSibling.className ="ok";
	}
}

function ValidarPrecio(){
	if(precio.value == '' || precio.value.length == 0 ){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El precio no puede estar vacio";
		this.nextSibling.className = "error";
	}else if(isNaN(precio.value)){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El precio debe de constar de caracteres numéricos";
		this.nextSibling.className = "error";
	}else if(metros.value.length >100){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! El precio no puede superarlos 100 caracteres";
		this.nextSibling.className = "error";
	}else{
		this.className = "form-control";
		this.nextSibling.innerHTML = "Precio válido";
		this.nextSibling.className ="ok";
	}
}

function ValidarFecha(){
	fecha = new Date();
	var dia = fecha.getDate();
	if (dia < 10){ dia = '0' + dia;} 
	var mes = fecha.getMonth() + 1;
	if (mes < 10){ mes = '0' + mes;} 
	var anio = fecha.getFullYear();
	var fecha_formateada = anio+'-'+mes+'-'+dia;

	if(this.value == ""){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! La fecha no puede estar vacía";
		this.nextSibling.className = "error";
	}else if(this.value < fecha_formateada){
		this.className = "form-control error-input";
		this.nextSibling.innerHTML = "¡Atención! No puedes indicar una fecha anterior al día de hoy";
		this.nextSibling.className = "error";
	}else{
		this.className="form-control";
		this.nextSibling.innerHTML = "La fecha es válida";
		this.nextSibling.className = "ok";
	}
}

function ValidarFormulario(event){
	if (ValidarTipo()  && ValidarDireccion() && ValidarCp() && ValidarZona() && ValidarMetros() && ValidarHabitaciones() && ValidarBanos() && ValidarGaraje()
		&& ValidarJardin() && validarPiscina() && ValidarEstado() && ValidarDescripcion() && ValidarPrecio() && ValidarFecha() ("¿Confirma enviar el formulario?")){
		return true;
	} else{
		event.preventDefault();
		return false;
	}
}
