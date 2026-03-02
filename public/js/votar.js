
// Espera a que el DOM esté completamente cargado antes de ejecutar el script
document.addEventListener("DOMContentLoaded", iniciar);

function iniciar() {
    // Selecciona todos los botones con la clase boton-votar
    const botonesVotar = document.querySelectorAll(".boton-votar");
    botonesVotar.forEach((boton) => boton.addEventListener("click", enviarVoto));

}

function enviarVoto(event) {

    event.preventDefault();
    event.stopImmediatePropagation();

    // Obtiene el id del producto desde el atributo data-producto
    let productoId = this.dataset.producto;

    // Recupera el valor seleccionado en el <select> correspondiente al producto
    let select = document.getElementById("puntos_" + productoId);
    let puntos = select.value;
 
    // Construye la cadena de datos a enviar por POST
    // Se incluye "votar=1" para que el servidor detecte la petición AJAX
    let data =
            "votar=1" +
            "&producto=" + encodeURIComponent(productoId) +
            "&puntos=" + encodeURIComponent(puntos);

    // Creación el objeto XMLHttpRequest para realizar la petición AJAX
    let xhr = new XMLHttpRequest();
    // Se espera una respuesta en formato JSON
    xhr.responseType = 'json';
    // Configura la petición POST hacia productos.php
    xhr.open('POST', 'productos.php');
    // Cabecera necesaria para enviar datos en formato URL codificado
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {

        if (this.status === 200) {

            let response = xhr.response;
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
            document.getElementById("votos_" + productoId).innerHTML = response.html;


        } else {
            alert("Error HTTP " + xhr.status + ": " + xhr.statusText);
        }

    };

    xhr.onerror = () => alert("Error de red. No se pudo contactar con el servidor.");
    
    // Envía la petición al servidor
    xhr.send(data);

}


