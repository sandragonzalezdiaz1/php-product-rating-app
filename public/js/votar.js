
document.addEventListener("DOMContentLoaded", iniciar);

function iniciar() {
    // Selecciona todos los botones de votar
    const botonesVotar = document.querySelectorAll(".boton-votar");
    botonesVotar.forEach((boton) => boton.addEventListener("click", enviarVoto));

}

function enviarVoto(event) {

    event.preventDefault();
    event.stopImmediatePropagation();

    let productoId = this.dataset.producto;

    let select = document.getElementById("puntos_" + productoId);
    let puntos = select.value;
 
    let data =
            "votar=1" +
            "&producto=" + encodeURIComponent(productoId) +
            "&puntos=" + encodeURIComponent(puntos);

    // Creación el objeto XMLHttpRequest para realizar la petición AJAX
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'json';
    xhr.open('POST', 'productos.php');
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

            document.getElementById("votos_" + productoId).innerHTML = response.html;


        } else {
            alert("Error HTTP " + xhr.status + ": " + xhr.statusText);
        }

    };

    xhr.onerror = () => alert("Error de red. No se pudo contactar con el servidor.");
    
    xhr.send(data);

}


