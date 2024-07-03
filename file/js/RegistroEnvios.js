function enviarEnvio() {
    var nombreCompleto = $("#NomCom").val();
    var numeroCelular = $("#celular").val();
    var peso = $("#Peso").val();
    var planetaEnvio = $("#inputState").val();
    var planetaDestino = $("#inputStates").val();

    $.ajax({
        url: "file/php/RegistroEnvios.php",
        type: "POST",
        data: {
            nombreCompleto: nombreCompleto,
            numeroCelular: numeroCelular,
            peso: peso,
            planetaEnvio: planetaEnvio,
            planetaDestino: planetaDestino
        },
        success: function(response) {
            alert(response);
        },
        error: function(error) {
            console.log("Error en la solicitud AJAX: " + error);
        }
    });
}
