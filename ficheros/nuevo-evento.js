window.onload=()=>{
    
    document.getElementById("button1").addEventListener("click",guardarPersona);
    
}

function guardarPersona() {
    
    nombre = document.getElementById("name").value;
    fecha = document.getElementById("date").value;
    descripcion = document.getElementById("description").value;
    precio = document.getElementById("price").value;
    img = document.getElementById("image").value;

    ajax=new XMLHttpRequest();
    datos=new FormData();
    datos.append("nombre",nombre);
    datos.append("date",fecha);
    datos.append("description",descripcion);
    datos.append("price",precio);
    datos.append("image", document.getElementById("image").files[0]);
            fetch('servicio.php', {
                method: 'POST',
                body: datos
            })
                .then(response => response.json())
                .then(datos => {
                    if (datos.resultado == "Ok")
                        document.getElementById("image").setAttribute("src", document.getElementById("foto").files[0].name);
                })
    ajax.open("POST","servicio.php",true);
    ajax.send(datos);

    console.log(datos);
    alert("El registro ha sido gardado");
    
}


/*
document.getElementById('image').onchange = function(){
        let fileObj = this.files;
        let reader = new FileReader();
                 // pasa a base64
        reader.readAsDataURL(fileObj[0]);
        reader.onload = function(){
                         // Guarde el código convertido en src para una vista previa
            document.getElementById("upload_show").setAttribute("src", this.result);
                         // Use el resultado convertido como el valor de la entrada cuyo tipo está oculto y envíelo al fondo
            document.getElementById("upload_base").value = this.result;
       }
 }*/