//Función para formulario de usuario
function validarR(form){
    form.submit();
}
function validarU(form) {
    var total = 0;
    //Validar Usuario
    if (!/[^0-9]{6,20}/.test(form.usuario.value)) {
        if (!form.usuario.value)
            form.avisoUsuario.value = "El campo no puede estar vacío.";
        else
            form.avisoUsuario.value = "El nombre de usuarios no puede contener números, cadena de 6-20 caracteres.";
    } else {
        form.avisoUsuario.innerHTML = "";
        total++;
    }

    //Validar Nombre
    if (!/[^0-9]/.test(form.nombre.value)) {
        if (!form.nombre.value)
            form.avisoNombre.value = "El campo no puede estar vacío.";
        else
            form.avisoNombre.value = "El nombre no puede contener números, cadena de máx 30 caracteres.";
    } else {
        form.avisoNombre.innerHTML = "";
        total++;
    }

    //Validar Apellido
    if (!/[^0-9]/.test(form.apellidos.value)) {
        if (!form.apellidos.value)
            form.avisoApellidos.value = "El campo no puede estar vacío.";
        else
            form.avisoApellidos.value = "El/Los apellidos no pueden contener números, cadena de máx 60 caracteres.";
    } else {
        form.avisoApellidos.innerHTML = "";
        total++;
    }

    //Validar Fecha
    if (!form.fecha.value) {
        form.avisoFecha.value = "El campo no puede estar vacío.";
    } else {
        form.avisoFecha.innerHTML = "";
        total++;
    }

    //Validar Teléfono
    if (!/^\d{10}$/.test(form.tele.value)) {
        if (!form.tele.value)
            form.avisoTel.value = "El campo no puede estar vacío.";
        else
            form.avisoTel.value = "El teléfono no es de 10 dígitos.";
    } else {
        form.avisoTel.innerHTML = "";
        total++;
    }

    //Validar Calle
    if (!form.calle.value) {
        form.avisoCalle.value = "El campo no puede estar vacío.";
    } else {
        form.avisoCalle.innerHTML = "";
        total++;
    }

    //Validar Colonia
    if (!form.colonia.value) {
        form.avisoColonia.value = "El campo no puede estar vacío.";
    } else {
        form.avisoColonia.innerHTML = "";
        total++;
    }

    //Validar Gustos
    var band = false;
    for (let i = 1; i < 9; i++) {
        if (document.getElementById("gusto" + i).checked) {
            band = true;
            break;
        }
    }
    if (band === false)
        form.avisoGustos.value = "Debes seleccionar al menos un gusto.";
    else {
        form.avisoGustos.value = "";
        total++;
    }

    //Validar Email
    if (!/^(.+\@.+\..+)$/.test(form.email.value)) {
        if (!form.email.value)
            form.avisoEmail.value = "El campo no puede estar vacío.";
        else
            form.avisoEmail.value = "El email no es válido (Ej. paco12@gmail.com).";
    } else {
        form.avisoEmail.innerHTML = "";
        total++;
    }

    //Validar Contraseña
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/.test(form.contra.value)) {
        if (!form.contra.value)
            form.avisoContra.value = "El campo no puede estar vacío.";
        else
            form.avisoContra.value = "La contraseña no cumple con los requisitos.";
    } else {
        form.avisoContra.innerHTML = "";
        total++;
    }

    if (total === 10) {
        form.submit();
    }



}

