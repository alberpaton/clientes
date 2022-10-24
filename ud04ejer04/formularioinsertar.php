<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD 4 Ejercicio 4</title>

</head>
<body>
    <form action="resultadoinsertar.php" method="POST">

		ID: <input type="text" id="ID" name="ID" > 
        </br>

        Título: <input type="text" id="titulo" name="TITULO">
        </br>

        Autor: <input type="text" id="autor" name="AUTOR">  
        </br>

        Páginas: <input type="text" id="paginas" name="PAGINAS">
        </br>
        </br>
        <input type="submit" name="Submit" value="Enviar">
        <p><a href="visionar.php">Ver Libros</a></p>

	</form>
</body>
</html>