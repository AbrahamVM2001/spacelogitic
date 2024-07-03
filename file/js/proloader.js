document.addEventListener('DOMContentLoaded', function () {
    const preloaderContainer = document.getElementById('preloader-container');
    const contentContainer = document.getElementById('content-container');

    // Simula un retraso en la carga para fines demostrativos
    setTimeout(function () {
        preloaderContainer.style.opacity = '0';
        setTimeout(function () {
            preloaderContainer.style.display = 'none'; // Oculta el preloader después de la transición de opacidad
            contentContainer.style.opacity = '1';
            contentContainer.style.pointerEvents = 'auto'; // Permite la interacción después de cargar
        }, 500); // Ajusta según la duración de tu transición de opacidad
    }, 2000);
});
