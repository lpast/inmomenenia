window.addEventListener("load",Inicio);

function Inicio() {
	// valido al pulsar en añadir usuario
	var bsubmit = document.querySelector("#nuevo_usuario");
	bsubmit.addEventListener("click",ValidarFormulario);

    var id = document.querySelector("#id");
	id.addEventListener("blur",ValidarId);

	// valido en tiempo real cuando entro/salgo de cada campo
	var nombre = document.querySelector("#nombre");
	nombre.addEventListener("blur",ValidarNombre);

	var apellidos = document.querySelector("#apellidos");
	apellidos.addEventListener("blur",ValidarApellidos);

	var telefono = document.querySelector("#telefono");
	telefono.addEventListener("blur",ValidarTelefono);

	var email = document.querySelector("#email");
	email.addEventListener("blur",ValidarEmail);

    var fecha = document.querySelector("#fecha");
	fecha.addEventListener("blur",ValidarFecha);

    var nom_user = document.querySelector("#nom_user");
	nom_user.addEventListener("blur",ValidarNick);

    var pass = document.querySelector("#pass");
	pass.addEventListener("blur",ValidarPass);

    var privacidad = document.querySelector("#privacidad");
	privacidad.addEventListener("blur",ValidarPrivacidad);
}

function ValidarId(id) {
    var numero, letr, letra;
    var regExp = /^[0-9]{8,8}[A-Za-z]$/;

    if (this.value.trim() == "") {
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! El dni no puede quedar vacío";
		this.nextSibling.className="error";
		return false;
	} else if (this.value.trim().length > 10) { 
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! El dni no puede superar los 9 carácteres";
		this.nextSibling.className="error";
		return false;
	} else if(regExp.test (id) == true) {
        numero = dni.substr(0,id.length-1);
        letr = dni.substr(dni.length-1,1);
        numero = numero % 23;
        letra='TRWAGMYFPDXBNJZSQVHLCKET';
        letra=letra.substring(numero,numero+1);
        if (letra!=letr.toUpperCase()) {
            this.className="form-control error-input"; 
		    this.nextSibling.innerHTML="¡Atención! Dni erroneo, la letra del NIF no se corresponde";
		    this.nextSibling.className="error";
			return false;
        } else {
            this.className="form-control";
		    this.nextSibling.innerHTML="El nombre es válido";
		    this.nextSibling.className="Dni correcto";
			return true;
        }
    } else {
        this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! Dni erroneo, formato no válido";
		this.nextSibling.className="error";
		return false;
    }
}

function ValidarNombre() {
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

function ValidarApellidos() {
	if (this.value.trim() == "") {
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! Los apellidos no pueden quedar vacíos";
		this.nextSibling.className="error";
		return false;
	} else if (this.value.trim().length > 30) { 
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! Los apellidos no pueden superar los 30 caracteres";
		this.nextSibling.className="error";
		return false;
	} else {
		this.className="form-control";
		this.nextSibling.innerHTML="Los apellidos son válidos";
		this.nextSibling.className="ok";
		return false;
	}
}

function ValidarTelefono() {
	if (this.value.trim().length != 9) {
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

function ValidarNick() {
    if (this.value.trim() == "") {
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! El nombre de usuario no puede quedar vacío";
		this.nextSibling.className="error";
		return false;
	} else if (this.value.trim().length > 20) { 
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! El nombre de usuario no puede superar los 20 carácteres";
		this.nextSibling.className="error";
		return false;
	} else {
		this.className="form-control";
		this.nextSibling.innerHTML="El nombre de usuario es válido";
		this.nextSibling.className="ok";
		return true;
	}
}

function ValidarPass() {
    if (this.value.trim() == "") {
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención! La contraseña no puede quedar vacío";
		this.nextSibling.className="error";
		return false;
	} else if (this.value.trim().length > 5) { 
		this.className="form-control error-input"; 
		this.nextSibling.innerHTML="¡Atención!  La contraseña no puede superar los 5 carácteres";
		this.nextSibling.className="error";
		return false;
	} else {
		this.className="form-control";
		this.nextSibling.innerHTML=" La contraseña no es válida";
		this.nextSibling.className="ok";
		return true;
	}
}

function ValidarPrivacidad() {
    if(!privacidad.checked){
        this.className="form-control error-input"; 
        this.nextSibling.innerHTML="¡Atención! Debe aceptar los términos de privacidad";
        this.nextSibling.className="error";
        return false;
    } else if(privacidad.checked) {
        return true;
    }

}

function ValidarFormulario(event) {
	if (ValidarId() && ValidarNombre() && ValidarApellidos() && ValidarTelefono() && ValidarEmail() && ValidarFecha() && ValidarNick() && ValidarPass() && ValidarPrivacidad() && confirm ("¿Confirma enviar el formulario?")) {
      return true;
    } else {
		event.preventDefault();
        return false;
    }
}