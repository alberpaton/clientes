<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Eliminar</title> 
    </head>
    <body>
        <?php

        $titulo_eliminar = $_GET['titulo'];

        
        require("clase_consulta.php");
        $modelo = new Consulta();
        $texto = $modelo->eliminarProducto($titulo_eliminar);
        echo "<p>". $texto. "</p>";
        echo "<p><a href='visionar.php'>Ver Libros</a></p>";
        echo "<a href='formularioinsertar.php'>Insertar otro libro.</a> </br>";


        ?>
</body>
</html>