
// Espera a que el DOM esté completamente cargado antes de ejecutar el script
document.addEventListener("DOMContentLoaded", iniciar);

function iniciar() {
    document.getElementById("form-login").addEventListener("submit", validarForm);
}

function validarForm(event) {
    // Evita que el formulario se envíe y recargue la página
    event.preventDefault();
    event.stopImmediatePropagation();

    // Referencia al formulario que ha lanzado el evento
    const form = event.target;
   
    // Oculta el mensaje de error en cada intento
    document.getElementById("mensaje").classList.add("d-none");
    
    // Recoge todos los datos del formulario
    const formData = new FormData(form);

    // Obtiene el valor del campo login y lo añade/actualiza a los datos enviados
    // Se utiliza set() para evitar duplicar el parametro si ya existe en el FormData
    //let inputValue = form.querySelector('input[name="login"]').value;
    //formData.set("login", inputValue); 
    //
    // Bandera para que index.php detecte que es una validación AJAX
     formData.set("login", "1");
     
     
    // Convierte los datos a formato application/x-www-form-urlencoded
    let params = new URLSearchParams(formData).toString();


    // Creación el objeto XMLHttpRequest para realizar la petición AJAX
    let xhr = new XMLHttpRequest();
    
    // Indica que la respuesta del servidor se espera en formato JSON
    xhr.responseType = 'json';
    
    // Configura la petición POST hacia index.php (validación de usuario en el servidor)
    xhr.open("POST", "index.php", true);
    
    // Cabecera necesaria para enviar los datos en formato URL codificado
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.status === 200) {
            let response = this.response;
            //console.log(response);

            if (response && response.login) {
                // Si las credenciales son correctas, se envia el formulario
                form.submit();

            } else {
                // Si las credenciales son incorrectas, se muestra el mensaje de error
                document.getElementById("mensaje").classList.remove("d-none");
                
            }
        } else {
            alert("Error HTTP " + this.status + ": " + this.statusText);
           
        }
    };

    xhr.onerror = () => alert("Error de red. No se pudo contactar con el servidor.");
     
    // Envia la petición AJAX con los datos del formulario
    xhr.send(params);

}





