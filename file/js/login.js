$(function () {
    $("#loginForm").on("submit", function(event) {
        event.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        console.log(email);
        console.log(password);
        $.ajax({
            url: 'file/js/php/login.php',
            type: 'POST',
            dataType: 'json',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                console.log("Server Response:", response);
                if (response.status === 'success') {
                    window.location.href = 'http://localhost/spacelogitic/panel.html';
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de autenticación',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false,
                        position: 'top-end'
                    });
                    setTimeout(function() {
                        // location.reload();
                    }, 2000);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema con la solicitud. Inténtalo de nuevo más tarde.',
                    timer: 2000,
                    showConfirmButton: false,
                    position: 'top-end'
                });
                setTimeout(function() {
                    // location.reload();
                }, 2000);
            }
        });
    });
});