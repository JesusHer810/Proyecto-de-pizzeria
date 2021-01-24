<?php
include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();
//llamamos la funcion ejecutar del archivo conector.php para mostra la informacion de la tabla horario
$resultado=$BD->ejecutar("SELECT producto.id, producto.nombre_producto, producto.imagen, producto.precio, tamano_producto.nombre_tamano FROM producto INNER JOIN tamano_producto ON producto.id_tamano_pizza = tamano_producto.id ORDER BY nombre_producto ASC");
$fila = 0;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tabla</title>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <style media="screen">
    caption{
      border: rgb(0, 0, 0) 3px solid;
    }
    .table{
      border-collapse: collapse;
      margin: 15px;
      padding: 15px;
      text-align: center;
      border: 3px solid rgb(0, 0, 0) ;
      background: rgb(190, 231, 28);
    }
    caption{
      background: rgb(233, 192, 44);
    }
    .table button{
      background: rgb(176, 55, 212);
      border-radius: 8px;
      cursor: pointer;
    }
    .table td{
        border: rgb(0, 0, 0) 1px solid;
        width: 90px;
        height: 20px;
    }
    .mostrar{
      height: auto;
      width: auto;
      border: 3px solid rgb(185, 122, 48);
    }
    </style>
  </head>
  <body>

      <table class="table">
      <caption>Productos</caption>
      <tr>
        <td>Nombre de la pizza</td>
        <td>URL imagen</td>
        <td>Precio</td>
        <td>Nombre_tamaño</td>
        <td>Actualizar</td>
        <td>Eliminar</td>
      </tr>
      <?php
      for ($fila=0; $fila < $resultado->num_rows;$fila++) {
        $registro=$BD->obtener_fila($resultado,$fila);
        ?>
      <tr>
        <td><?php echo $registro['nombre_producto']; ?></td>
        <td><?php echo $registro['imagen']; ?></td>
        <td><?php echo $registro['precio']; ?></td>
        <td><?php echo $registro['nombre_tamano']; ?></td>
        <?php echo '<td><a href="http://localhost/pizzeria/php/formularioActualizar.php?id='.$registro['id'].'"><button type="button" class:"actualizar" name="button">Actualizar</button></a></td>' ?>
        <?php echo '<td><a href="http://localhost/pizzeria/php/eliminarProducto.php?id='.$registro['id'].'"><button type="button" class:"eliminar" name="button">Eliminar</button></a></td>' ?>
      </tr>
    <?php } ?>
    </table>
  </body>
</html>
