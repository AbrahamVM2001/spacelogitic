function buscarEnvio() {
    var matriculaEnvio = document.getElementById('formGroupExampleInput').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Limpiar la tabla
            document.getElementById('tablaNaves').getElementsByTagName('tbody')[0].innerHTML = '';


            var data = JSON.parse(xhr.responseText);
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    agregarFilaTabla(data[i]);
                }
            } else {
                alert("No se encontró ningún envío con esa matrícula.");
            }
        }
    };
    xhr.open('GET', 'file/php/envios.php?matricula=' + matriculaEnvio, true);
    xhr.send();
}

function agregarFilaTabla(envio) {
    var table = document.getElementById('tablaNaves').getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);

    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);
    var cell6 = newRow.insertCell(5);
    var cell7 = newRow.insertCell(6);
    var cell8 = newRow.insertCell(7);
    var cell9 = newRow.insertCell(8);
    var cell10 = newRow.insertCell(9);

    cell1.innerHTML = envio.IdPlaneta;
    cell2.innerHTML = envio.ClaveNave;
    cell3.innerHTML = envio.NombreCompleto;
    cell4.innerHTML = envio.NumeroCelular;
    cell5.innerHTML = envio.Peso;
    cell6.innerHTML = envio.PlanetaEnvio;
    cell7.innerHTML = envio.PlanetaDestino;
    cell8.innerHTML = envio.Distancia;
    cell9.innerHTML = envio.Estado;
    editarBtn.setAttribute('onclick', 'editarEnvio(' + envio.Matricula + ')');
    cell10.appendChild(editarBtn);
}
