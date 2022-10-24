
<?php 
    $id = $_POST['ID'];
    $titulo = $_POST['TITULO']; 
    $autor = $_POST['AUTOR'];
    $paginas = $_POST['PAGINAS']; 

    if (isset($_POST['Submit']) && empty($id)){
        echo "<p style='color:red'> <-- !Debes introducir un id!</p>";
    }
    if(isset($_POST['Submit']) && !is_numeric($id)){
        echo "<p style='color:red'> <-- !Debes introducir un número!</p>";
    }
    
    if (isset($_POST['Submit']) && empty($titulo)){
        echo "<p style='color:red'> <-- !Debes introducir un titulo!</p>";
    }

    if (isset($_POST['Submit']) && empty($autor)){
        echo "<span style='color:red'> <-- !Debes introducir un autor!</span>";
    }

    if (isset($_POST['Submit']) && empty($paginas)){
        echo "<p style='color:red'> <-- !Debes introducir las paginas!</p>";
    }
    if(isset($_POST['Submit']) && !is_numeric($paginas)){
        echo "<p style='color:red'> <-- !Debes introducir un número!</p>";
    }

    if (!empty($autor) && !empty($id) && is_numeric($id) && !empty($titulo) && !empty($paginas) && is_numeric($paginas)) {
        require("clase_consulta.php");
        $modelo = new Consulta();
        $texto_insert = $modelo->modificarProducto($id,$titulo,$autor,$paginas);
        echo "<p>". $texto_insert. "</p>";
        echo "<p><a href='visionar.php'>Ver Libros</a></p>";
        echo "<a href='formularioinsertar.php'>Insertar otro libro.</a> </br>";
    } else {
        echo "<p><a href='visionar.php'>Ver Libros</a></p>";
        echo "<a href='formularioinsertar.php'>Insertar otro libro.</a> </br>";    
    }
    

?>