const registration = document.querySelector('.registro-paquete');
const verification = document.querySelector('.verificacion-paquete');
const ready = document.querySelector('.listo');

setTimeout(() => {
    registration.classList.add('active');
}, 0);

setTimeout(() => {
    verification.classList.add('active');
}, 1000);

setTimeout(() => {
    ready.classList.add('active');
}, 2000);