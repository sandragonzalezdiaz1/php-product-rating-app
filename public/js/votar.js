
document.addEventListener("DOMContentLoaded", iniciar);

function iniciar() {
    // Selecciona todos los botones de votar
    const botonesVotar = document.querySelectorAll(".boton-votar");
    botonesVotar.forEach((boton) => boton.addEventListener("click", enviarVoto));
    
  
}

function enviarVoto(event){
    
    event.preventDefault();
    event.stopImmediatePropagation();
    
    const productoId = this.dataset.producto;
    
    const select = document.getElementById("puntos_" + productoId);
    const puntos = select.value;
    
    let data = `producto=${productoId}&puntos=${puntos}`;
    
    // Creación el objeto XMLHttpRequest para realizar la petición AJAX
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'json';
    xhr.open('POST', 'productos.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onload = function(){
        
        if(this.status === 200){
            
            let response = xhr.response;
            
            if(response.error){
                alert("Ya has votado por ese producto");
                
                
                
            } else {
                
            }
            
        }
        
        
        
 
    };
    
    
    
    
    
    
  
    xhr.send(data);
    
    

}


