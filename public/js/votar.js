
$(document).ready(function () {
    $(document).on("click", ".boton-votar", enviarVoto);
});

function enviarVoto(event){
    
    event.preventDefault();
    event.stopImmediatePropagation();
    
     // Obtiene el id del producto desde el atributo data-producto
    let productoId = $(this).data("producto");

    // Obtiene el valor seleccionado del select correspondiente
    let puntos = $("#puntos_" + productoId).val();

    // Datos a enviar al servidor
    let data = {
        votar: 1,
        producto: productoId,
        puntos: puntos
    };

    // Petición AJAX a productos.php
    $.ajax({
        url: "productos.php",
        type: "POST",
        data: data,
        dataType: "json",
        success: function (response) {
            //console.log(response);
            
            if (!response) {
                alert("Respuesta no válida del servidor.");
                return;
            }

            if (response.error) {
                alert("Ya has votado por ese producto");
                return;
            }

            // Actualiza dinámicamente la valoración del producto
            // utilizando el HTML generado en el servidor
            $("#votos_" + productoId).html(response.html);
        },

        error: function (xhr, status, error) {
            alert("Error HTTP: " + xhr.status + "- " + error);
        }
    });
}
    
