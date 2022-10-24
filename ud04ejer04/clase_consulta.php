<?php
class Consulta
{
    public function insertarProducto($miID,$miTitulo,$miAutor,$miPaginas){
        require("clase_conexion.php");

        $conexion= new Conexion();
        $pdoObject = $conexion->getConexion();
        $sql = "INSERT INTO libros (id,titulo,autor,paginas) VALUES (?, ?, ?,?)";
        
        $sentencia = $pdoObject->prepare($sql);
        $sentencia->bindParam(1, $miID);
        $sentencia->bindParam(2, $miTitulo);
        $sentencia->bindParam(3, $miAutor);
        $sentencia->bindParam(4, $miPaginas);
        
        if (@$sentencia->execute()) {
            $mensaje = "Registro creado correctamente.";
        } else {
            $mensaje = "Fallo al crear el registro.";
        }
        return $mensaje;
    }

    public function cargarProductos($titulo){
        require("clase_conexion.php");

        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        $sql = "SELECT * FROM libros WHERE titulo LIKE  %".$titulo."%;";
        $resultado = $conexion->prepare($sql);

        $resultado->execute();

        $resultados = '<table border="1">
        <tr>
        <th>ID</th>
        <th>NOMBRE DEL LIBRO</th>
        <th>NOMBRE DEL AUTOR</th>
        <th>Nº DE PÁGINAS</th>
        <th>ELIMINAR</th>
        <th>MODIFICAR</th>
        </tr>';
        while ($fila = $resultado->fetch()){
            $resultados = $resultados.'<tr><td>'. $fila['id'].'</td><td>'. $fila['titulo'].'</td><td>'. $fila['autor'].'</td><td>'. $fila['paginas'].'</td><td><a href="resultadoeliminar.php?titulo='.$fila["titulo"].'">Eliminar</a></td><td><a href="formulariomodificar.php?titulo='.$fila["titulo"].' && id='. $fila["id"].' && autor='.  $fila["autor"].' && paginas='. $fila['paginas'].'">Modificar</a></td></tr>';
        }            
        $resultados = $resultados.'</table>';
        return $resultados;

    }

    public function eliminarProducto($titulo){
        require("clase_conexion.php");

        $conexion= new Conexion();
        $pdoObject = $conexion->getConexion();
        $sql = "DELETE FROM libros WHERE titulo = ?;";

        $sentencia = $pdoObject->prepare($sql);
        $sentencia->bindParam(1, $titulo);

        if ($rows = @$sentencia->execute()) {
            $mensaje = "Eliminado correctamente. $rows filas han sido afectadas";
        } else {
            $mensaje = "Fallo al eliminar el registro.";
        }
        return $mensaje;
    }

    public function modificarProducto($miID,$miTitulo,$miAutor,$miPaginas){
        require("clase_conexion.php");

        $conexion= new Conexion();
        $pdoObject = $conexion->getConexion();
        $sql = "UPDATE libros SET id=?,titulo=?,autor=?,paginas=? WHERE id = ?;";

        $sentencia = $pdoObject->prepare($sql);
        $sentencia->bindParam(1, $miID);
        $sentencia->bindParam(2, $miTitulo);
        $sentencia->bindParam(3, $miAutor);
        $sentencia->bindParam(4, $miPaginas);
        $sentencia->bindParam(5, $miID);

        if ($rows = @$sentencia->execute()) {
            $mensaje = "Modificado correctamente. $rows filas han sido afectadas";
        } else {
            $mensaje = "Fallo al modificar el registro.";
        }
        return $mensaje;
    }
}
?>