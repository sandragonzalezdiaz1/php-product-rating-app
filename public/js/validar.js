
// Espera a que el DOM esté completamente cargado
$(document).ready(function () {
    $("#form-login").submit(validarUsuario);
});

function validarUsuario(event){
    // Evita que el formulario se envíe y recargue la página
    event.preventDefault();
    event.stopImmediatePropagation();
    
    // Referencia al formulario que ha disparado el evento
    const form = $(this);

    // Oculta el mensaje de error en cada nuevo intento de login
    $("#mensaje").addClass("d-none"); 
    
    // Serializa los datos del formulario
    let formData = form.serialize();

    // Serializa todos los campos del formulario
    formData += '&login=' + encodeURIComponent($('input[name="login"]').val());
    
    // Petición AJAX para validar las credenciales en index.php
     $.ajax({
            url: "index.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                //console.log(response);
                
                // Si el servidor devuelve login=true, significa que las credenciales son correctas
                if (response && response.login) {
                    // Enviamos el formulario de forma normal (redirige a productos.php)
                    event.target.submit();
                } else {
                    // Si las credenciales son incorrectas, mostramos el mensaje de error
                    $("#mensaje").removeClass("d-none");
                }
            },

            error: function (xhr, status, error) {
                // Gestión de errores HTTP o de red
                alert("Error HTTP: " + xhr.status + " - " + error);
            }
        });
}