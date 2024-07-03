function mostrarMensaje(element) {
    const mensaje = document.createElement("p");
    mensaje.textContent = "Iniciar sesión";
    mensaje.classList.add("mensaje");
    mensaje.style.top = (element.offsetTop + element.offsetHeight / 2 - mensaje.offsetHeight / 2) + "px";
    mensaje.style.left = (element.offsetLeft + element.offsetWidth / 2 - mensaje.offsetWidth / 2) + "px";

    document.body.appendChild(mensaje);
}

function ocultarMensaje() {
    const mensaje = document.querySelector('.mensaje');
    if (mensaje) {
        mensaje.remove();
    }
}