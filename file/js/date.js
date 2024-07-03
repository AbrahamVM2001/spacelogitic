var fechaCampo = document.getElementById('fechaE');
var fechaActual = new Date();
var year = fechaActual.getFullYear();
var month = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); 
var day = fechaActual.getDate().toString().padStart(2, '0');
var fechaFormatted = year + '-' + month + '-' + day;
fechaCampo.value = fechaFormatted;