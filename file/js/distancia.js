function actualizarDistancia() {
    const distanciaInput = document.getElementById('Distancia');
    const planetaEnvio = document.getElementById('inputState').value;
    const planetaDestino = document.getElementById('inputStates').value;
    const fechaEntregaInput = document.getElementById('fecha');

    const distancias = {
        'Marte': 6, // 6 días
        'Mercurio': 3, // 3 días
        'Jupiter': 365, // 1 año
        'Nepturno': 4380, // 12 años (aproximadamente)
        'Venus': 60, // 2 meses
        'Saturno': 730, // 2 años (aproximadamente)
        'Urano': 2190, // 6 años (aproximadamente)
        'Tierra': 0
    };

    const distanciaEntrePlanetas = Math.abs(distancias[planetaDestino] - distancias[planetaEnvio]);

    distanciaInput.value = distanciaEntrePlanetas;

    // Obtener la fecha actual
    const fechaActual = new Date();

    // Calcular la fecha de entrega sumando la distancia en días a la fecha actual
    const fechaEntrega = new Date(fechaActual.getTime() + distanciaEntrePlanetas * 24 * 60 * 60 * 1000);

    // Formatear la fecha de entrega en el formato YYYY-MM-DD
    const year = fechaEntrega.getFullYear();
    const month = (fechaEntrega.getMonth() + 1).toString().padStart(2, '0');
    const day = fechaEntrega.getDate().toString().padStart(2, '0');
    const fechaFormatted = `${year}-${month}-${day}`;

    // Establecer el valor del campo de fecha de entrega
    fechaEntregaInput.value = fechaFormatted;
}

// Llamar a la función para que se ejecute inicialmente
actualizarDistancia();
