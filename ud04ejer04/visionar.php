<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>

</head>
<body>
    <?php

        $conexion = @new mysqli('localhost','root','','bdlibros');
        $sentencia_sql = "SELECT * FROM libros";
        $resultado = $conexion->query($sentencia_sql);
        $resultados = '<table border="1">
        <tr>
        <th>ID</th>
        <th>NOMBRE DEL LIBRO</th>
        <th>NOMBRE DEL AUTOR</th>
        <th>Nº DE PÁGINAS</th>
        <th>ELIMINAR</th>
        <th>MODIFICAR</th>
        </tr>';
        while ($fila = $resultado->fetch_assoc()){
            $resultados = $resultados.'<tr><td>'. $fila['id'].'</td><td>'. $fila['titulo'].'</td><td>'. $fila['autor'].'</td><td>'. $fila['paginas'].'</td><td><a href="resultadoeliminar.php?titulo='.$fila["titulo"].'">Eliminar</a></td><td><a href="formulariomodificar.php?titulo='.$fila["titulo"].' && id='. $fila["id"].' && autor='.  $fila["autor"].' && paginas='. $fila['paginas'].'">Modificar</a></td></tr>';
        }            
        $resultados = $resultados.'</table>';
        echo $resultados;

        echo "<p><a href='formulariobuscar.php'>Buscar Libros</a></p>";
        echo "<p><a href='formularioinsertar.php'>Insertar Libros</a></p>";
    ?>
</body>
</html>







