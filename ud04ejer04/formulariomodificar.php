<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>

</head>
<body>
    <?php
        $titulo = $_GET['titulo'];
        $id = $_GET['id'];
        $autor = $_GET['autor'];
        $paginas = $_GET['paginas']; 

    ?>
    <form action="resultadomodificar.php" method="POST">

		ID: <input type="text" id="ID" name="ID" value="<?php echo $id;?>" > 
        </br>

        Título: <input type="text" id="titulo" name="TITULO" value="<?php echo $titulo;?>" >

        </br>

        Autor: <input type="text" id="autor" name="AUTOR" value="<?php echo $autor;?>" >  
        </br>

        Páginas: <input type="text" id="paginas" name="PAGINAS" value="<?php echo $paginas;?>" >
        </br>
        </br>
        <input type="submit" name="Submit" value="Modificar">
        <p><a href="visionar.php">Ver Libros</a></p>

	</form>
</body>
</html>