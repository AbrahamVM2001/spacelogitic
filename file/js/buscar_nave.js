function buscarNave() {
    var claveNave = document.getElementById('formGroupExampleInput').value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {

            document.getElementById('tablaNaves').getElementsByTagName('tbody')[0].innerHTML = '';


            var data = JSON.parse(xhr.responseText);
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    agregarFilaTabla(data[i]);
                }
            } else {
                alert("No se encontró ninguna nave con esa clave.");
            }
        }
    };
    xhr.open('GET', 'file/php/buscar_nave.php?clave=' + claveNave, true);
    xhr.send();
}

function agregarFilaTabla(nave) {
    var table = document.getElementById('tablaNaves').getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);

    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);

    cell1.innerHTML = nave.ClaveNave;
    cell2.innerHTML = nave.NombreRepresentante;
    cell3.innerHTML = nave.Distancia;
    cell4.innerHTML = nave.Combustible;


    var img = document.createElement('img');
    img.src = nave.Imagen;
    img.alt = "Imagen de la nave";
    img.style.width = '50px';


    cell5.appendChild(img);
}
