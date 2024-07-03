function registrar() {
    const representante = document.getElementById('Representante').value;
    const distancia = document.getElementById('Distancia').value;
    const combustible = document.getElementById('Combustible').value;
    const iniciales = representante.split(' ').map(nombre => nombre[0]).join('');
    const numerosAzar = Array.from({ length: 5 }, () => Math.floor(Math.random() * 10));
    const claveNave = iniciales + distancia + combustible + numerosAzar.join('');
    document.getElementById('ClaveNave').value = claveNave;
}