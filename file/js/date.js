$(function () {
    function actualizarFecha() {
        const fechaElemento = document.getElementById('fecha');
        const ahora = new Date();

        const anio = ahora.getFullYear();

        const fechaFormateada = `${anio}`;
        fechaElemento.textContent = fechaFormateada;
    }

    setInterval(actualizarFecha, 1000);

    document.addEventListener('DOMContentLoaded', actualizarFecha);
});