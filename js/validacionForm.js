

// Validacion de campos de formulario NO VACIOS y enviod de notificacion 

function mensajeChange() {

    // Campos de input de la seccion Mensaje del formulario que compartes 
    const email = document.getElementById("txtEmail");
    const nombre = document.getElementById("txtCliente");
    const telefono = document.getElementById("txtTelefono");
    const mensaje = document.getElementById("txtMensaje");

    //Boton
    const boton = document.getElementById("enviar");
    console.log(boton)
    
    if (email.value.trim() !== "" && nombre.value.trim() !== "" && telefono.value.trim() !== "" && mensaje.value.trim() !== "") {
        console.log("Se muestra")
        boton.removeAttribute('disabled')
    } else {
        boton.setAttribute('disabled', "true");
    }



    // Campos de input de la seccion Solicitar visita del formulario
    const emailVisita = document.getElementById("txtEmailVisita");
    const nombreVisita = document.getElementById("txtClienteVisita");
    const telefonoVisita = document.getElementById("txtTelVisita");

    //Boton
    const botonVisita = document.getElementById("enviarVisita");
    console.log(botonVisita);
    
    if (emailVisita.value.trim() !== "" && nombreVisita.value.trim() !== "" && telefonoVisita.value.trim() !== "") {
        console.log("Se muestra")
        botonVisita.removeAttribute('disabled')
    } else {
        botonVisita.setAttribute('disabled', "true");
    }
}

function mensajeChangeMobile() {
    // Campos de input
    const email = document.getElementById("txtEmailMobile");
    const nombre = document.getElementById("txtClienteMobile");
    const telefono = document.getElementById("txtTelefonoMobile");
    const mensaje = document.getElementById("txtMensajeMobile");

    //Boton
    const boton = document.getElementById("enviarMobile");
    console.log(boton)
    
    if (email.value.trim() !== "" && nombre.value.trim() !== "" && telefono.value.trim() !== "" && mensaje.value.trim() !== "") {
        console.log("Se muestra")
        boton.removeAttribute('disabled')
    } else {
        boton.setAttribute('disabled', "true");
    }
}