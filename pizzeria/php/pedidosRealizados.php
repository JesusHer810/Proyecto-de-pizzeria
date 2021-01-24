<?php
include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();
session_start();
$idCliente = $_SESSION['nombreEmpleado'];
//llamamos la funcion ejecutar del archivo conector.php para mostra la informacion de la tabla horario
$resultado=$BD->ejecutar("SELECT pedido.id, producto.nombre_producto, tamano_producto.nombre_tamano, pedido.cantidad, pedido.precio, pedido.monto_total, pedido.direccion ,pedido.fecha_hora ,pedido.id_cliente FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id INNER JOIN cliente ON pedido.id_cliente = cliente.id INNER JOIN tamano_producto ON producto.id_tamano_pizza = tamano_producto.id WHERE pedido.estado = 'finalizada'");
$fila = 0;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>carrito de compras</title>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="http://localhost/pizzeria/css/estilosPedidosRealizados.css">
  </head>
  <body>
    <table class="table">
      <caption>Pedidos Realizados</caption>
      <tr class="subtema">
        <td>Id pedido</td>
        <td>Nombre de producto</td>
        <td>Tamaño</td>
        <td>Cantidad</td>
        <td>Precio</td>
        <td>SubTotal</td>
        <td>Dirección</td>
        <td>Fecha y hora</td>
        <td>Id Cliente</td>
      </tr>
      <?php
      for ($fila=0; $fila < $resultado->num_rows;$fila++) {
        $registro=$BD->obtener_fila($resultado,$fila);
        ?>
      <tr class="subtema2">
        <td><?php echo $registro['id']; ?></td>
        <td><?php echo $registro['nombre_producto']; ?></td>
        <td><?php echo $registro['nombre_tamano']; ?></td>
        <td><?php echo $registro['cantidad']; ?></td>
        <td><?php echo $registro['precio']; ?></td>
        <td><?php echo $registro['monto_total']; ?></td>
        <td class="direccion"><?php echo $registro['direccion']; ?></td>
        <td><?php echo $registro['fecha_hora']; ?></td>
        <td><?php echo $registro['id_cliente']; ?></td>
      </tr>
    <?php } ?>
    </table>
  </body>
</html>
