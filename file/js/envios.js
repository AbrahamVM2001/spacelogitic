function buscarEnvio() {
    var matriculaEnvio = document.getElementById('formGroupExampleInput').value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            if (data.length > 0) {
                // Solo actualizar la fila si hay datos
                agregarFilaTabla(data[0]);
            } else {
                alert("No se encontró ningún envío con esa matrícula.");
            }
        }
    };
    xhr.open('GET', 'file/php/envios.php?matricula=' + matriculaEnvio, true);
    xhr.send();
}

function agregarFilaTabla(envio) {
    // Obtener la fila existente
    var filaExistente = document.getElementById('filaEnvio');

    // Asignar valores a las celdas
    filaExistente.cells[0].innerHTML = envio.IdPlaneta;
    filaExistente.cells[1].innerHTML = envio.ClaveNave;
    filaExistente.cells[2].innerHTML = envio.NombreCompleto;
    filaExistente.cells[3].innerHTML = envio.NumeroCelular;
    filaExistente.cells[4].innerHTML = envio.Peso;
    filaExistente.cells[5].innerHTML = envio.PlanetaEnvio;
    filaExistente.cells[6].innerHTML = envio.PlanetaDestino;
    filaExistente.cells[7].innerHTML = envio.Distancia;

    // Actualizar el valor del input
    var estadoInput = filaExistente.cells[8].querySelector('input');
    estadoInput.value = envio.Estado;

    // Asignar el evento de clic al botón existente
    var editarBtn = filaExistente.cells[9].querySelector('button');
    editarBtn.addEventListener('click', function () {
        editarEnvio(this);
    });
}

function editarEnvio(btn) {
    var fila = btn.parentNode.parentNode;
    var estadoInput = fila.cells[8].querySelector('input');
    var matricula = estadoInput.getAttribute('data-matricula');
    var nuevoEstado = estadoInput.value;

    // Realizar la solicitud AJAX para actualizar el estado en el servidor
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'file/php/editar_envio.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Manejar la respuesta del servidor, si es necesario
            console.log(xhr.responseText);
        }
    };
    xhr.send('matricula=' + matricula + '&estado=' + nuevoEstado);
}
