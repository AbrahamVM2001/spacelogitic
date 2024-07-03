function editarEnvio(matricula) {
    var fila = document.getElementById('tablaNaves').querySelector("tr[data-matricula='" + matricula + "']");


    var celdaEstado = fila.querySelector("td[data-column='Estado']");

    var estadoActual = celdaEstado.innerHTML;


    var inputEstado = document.createElement('input');
    inputEstado.type = 'text';
    inputEstado.value = estadoActual;


    celdaEstado.innerHTML = '';
    celdaEstado.appendChild(inputEstado);


    inputEstado.focus();


    var btnGuardar = document.createElement('button');
    btnGuardar.innerHTML = 'Guardar';
    btnGuardar.onclick = function () {
  
        var nuevoEstado = inputEstado.value;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                celdaEstado.innerHTML = nuevoEstado;
            }
        };


        xhr.open('POST', 'file/php/actualizar_envio.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('matricula=' + matricula + '&nuevoEstado=' + nuevoEstado);
    };

    celdaEstado.appendChild(btnGuardar);
}
