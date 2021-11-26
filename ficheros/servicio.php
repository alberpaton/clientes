<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $datos = new stdClass;
    $datos->nombre = $_POST["name"];
    $datos->fecha = $_POST["date"];
    $datos->descripcion = $_POST["description"];
    $datos->precio = $_POST["price"];
    $datos->imagen = $_POST["image"];

    if (isset($_POST['image'])) {
   //Recogemos el archivo enviado por el formulario
   $archivo = $_FILES['image']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['image']['type'];
      $tamano = $_FILES['image']['size'];
      $temp = $_FILES['image']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, 'images/'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('images/'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            echo '<p><img src="images/'.$archivo.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   }
}
    $lista = json_decode(file_get_contents("data.json"));

    if ($lista == null) {
        $lista = [];
    }

    array_push($lista, $datos);

    file_put_contents("data.json", json_encode($lista));

} 

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $lista = json_decode(file_get_contents("data.json"));
    echo json_encode($lista);

}


if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    file_put_contents("data.json", json_encode([]));
 

}






?>