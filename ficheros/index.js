window.onload=()=>{
    
    document.getElementById("actualizar").addEventListener("click", recuperarPersonas);
    
}

function recuperarPersonas() {
        var ajax=new XMLHttpRequest();   
        ajax.onreadystatechange = function() {
            if (this.readyState==4 && this.status == 200) {
                document.getElementById("contenedor").innerHTML = this.responseText;
            }
        }
        ajax.open("GET","servicio.php",true);
        ajax.send();
    }

