<?php
    require("clase_consulta.php");
    $titulo = $_POST['titulo_buscar'];
    if (isset($_POST['enviando']) && empty($titulo)){
        echo "<span style='color:red'> <-- !Debes introducir un titulo para poder buscarlo!</span>";
    }


    if (!empty($titulo)) {
        $modelo = new Consulta();
        $array = $modelo->cargarProductos($titulo);
        echo $array;
        echo "<p><a href='formulariobuscar.php'>Buscar otro libro.</a></p>";
        echo "<p><a href='visionar.php'>Ver Libros</a></p>";
        echo "<a href='formularioinsertar.php'>Insertar otro libro.</a> </br>";
    }else {
        echo "<p><a href='formulariobuscar.php'>Buscar otro libro.</a></p>";
        echo "<p><a href='visionar.php'>Ver Libros</a></p>";
        echo "<a href='formularioinsertar.php'>Insertar otro libro.</a> </br>";
    }


?>