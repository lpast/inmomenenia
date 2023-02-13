window.addEventListener("load",Inicio);

function Inicio() {
	// valido al pulsar en añadir cliente
	var bsubmit = document.querySelector("#contacto");
	bsubmit.addEventListener("click",ValidarFormulario);

	// valido en tiempo real cuando entro/salgo de cada campo
	var nombre = document.querySelector("#nombre");
	nombre.addEventListener("blur",ValidarNombre);

	var telefono = document.querySelector("#telefono");
	telefono.addEventListener("blur",ValidarTelefono);

	var email = document.querySelector("#email");
	email.addEventListener("blur",ValidarEmail);

	var asunto = document.querySelector("input[name='asunto']");
	asunto.addEventListener("blur",ValidarAsunto);

    var mensaje = document.querySelector("#mensaje");
	mensaje.addEventListener("blur",ValidarMensaje);


}

function ValidarNombre () {
	if (this.value.trim() == "") {
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! El nombre no puede quedar vacío";
		this.nextSibling.className="error";
        return false;
	} else if (this.value.trim().length > 20) { 
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! El nombre no puede superar los 20 carácteres";
		this.nextSibling.className="error";
        return false;
	} else {
		this.className="form-control";
		this.nextSibling.innerHTML="El nombre es válido";
		this.nextSibling.className="ok";
        return true;
	}
}

function ValidarTelefono() {
    if (this.value.trim() == "") {
        return true;
    } else if (this.value.trim().length != 9) {
		this.className="form-control error-input";
		this.nextSibling.innerHTML="¡Atención! El teléfono debe tener 9 dígitos";
		this.nextSibling.className="error";
        return false;
	} else if (isNaN(this.value)) {
		this.className="form-control error-input";
		this.nextSibling.innerHTML="¡Atención! El teléfono debe ser numérico";
		this.nextSibling.className="error";
        return false;
	} else {
		this.className="form-control";
		this.nextSibling.innerHTML="El teléfono es válido";
		this.nextSibling.className="ok";
        return true;
	}
}

function ValidarEmail() {
	if (this.value.trim() == "") {
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! El nombre no puede quedar vacío";
		this.nextSibling.className="error";
        return false;
	} else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
		this.className="form-control";
		this.nextSibling.innerHTML="El email es válido";
		this.nextSibling.className="ok";
        return true;
	}
}

function ValidarAsunto() {
    var seleccionado = false;
    for(var i=0; i<asunto.length; i++){
        if(asunto[i].checked) {
            this.className="form-control";
		    this.nextSibling.innerHTML="El asunto es válido";
		    this.nextSibling.className="ok";
            seleccionado = true;
            return true;
            break;
        }
    } 
    if (!seleccionado) {
		this.className="form-control error-input";
		this.nextSibling.innerHTML="¡Atención! El asunto no puede quedar vacío";
		this.nextSibling.className="error";
        return false;
    }
}

function ValidarMensaje() {
	if (this.value.trim() == "") {
		this.className="form-control error-input";
		this.nextSibling.innerHTML="¡Atención! El mensaje no puede quedar vacío";
		this.nextSibling.className="error";
        return false;
	} else if (this.value.trim().length > 50) { 
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! El mensaje no puede superar los 250 caracteres";
		this.nextSibling.className="error";
        return false;
	} else {
		this.className="form-control";
		this.nextSibling.innerHTML="El mensaje es válido";
		this.nextSibling.className="ok";
        return true;
	}
}


function ValidarFormulario(event) {
    if (ValidarNombre() && ValidarTelefono() && ValidarEmail() && ValidarAsunto() && ValidarMensaje() && confirm ("¿Confirma enviar el formulario?")) {
        return true;
    }    
    
	var nombre = document.querySelector("#nombre");
	var telefono = document.querySelector("#telefono");
	var email = document.querySelector("#email");
	var asunto = document.querySelector("#asunto");
    var mensaje = document.querySelector("#mensaje");

    if (nombre.value.trim() == 0) {
		alert("El nombre no puede quedar vacío");
		event.preventDefault();
	} else if (nombre.value.trim().length > 20) {
		alert("El nombre no puede superar los 20 caracteres");
		event.preventDefault();
	}

    if (telefono.value.trim() == 0) {
		alert("Los telefono no pueden quedar vacío");
		event.preventDefault();
	} else if (isNaN(telefono.value))  {
		alert("El telefono debe ser numérico");
		event.preventDefault();
	}

    if (email.value.trim() == "") {
		alert("El La email no puede quedar vacío");
		event.preventDefault();
	} else if (email.value.trim().length > 30 ) {
        alert("El email es superior a los 30 caracteres");
        event.preventDefault();
    }
        
    if (asunto[i].checked) {
        alert("Debe elegir un asunto");
        event.preventDefault();
    }

    if (mensaje.value.trim() == 0) {
        alert("El mensaje no puede quedar vacío");
        event.preventDefault();
        } else if (mensaje.value.trim().length > 250) {
            alert("El mensaje no puede superar los 250 caracteres");
            event.preventDefault();
        }
    return false;
}
