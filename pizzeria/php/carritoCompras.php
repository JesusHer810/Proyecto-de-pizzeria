<?php
include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();
session_start();
$idCliente = $_SESSION['id'];
//llamamos la funcion ejecutar del archivo conector.php para mostra la informacion de la tabla horario
$resultado=$BD->ejecutar("SELECT cliente.nombre_cliente,producto.nombre_producto, tamano_producto.nombre_tamano, pedido.cantidad, pedido.precio, pedido.monto_total FROM pedido INNER JOIN producto ON pedido.id_producto = producto.id INNER JOIN cliente ON pedido.id_cliente = cliente.id INNER JOIN tamano_producto ON producto.id_tamano_pizza = tamano_producto.id WHERE cliente.id = '$idCliente' AND pedido.estado = 'agregada'");
$fila = 0;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>carrito de compras</title>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="http://localhost/pizzeria/css/estilosCarritoCompras.css">
    <style media="screen">


    </style>
  </head>
  <body>
    <header class="header">
      <div class="container">
        <nav class="menu">
          <ul>
            <li><a href="http://localhost/pizzeria/php/seleccionarPizza.php">Inicio</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <table class="table">
      <caption>Pizzas agregadas</caption>
      <tr class="subtema">
        <td>Nombre Cliente</td>
        <td>Nombre de la pizza</td>
        <td>Tamaño</td>
        <td>Cantidad</td>
        <td>Precio</td>
        <td>Sub total</td>
      </tr>
      <?php
      for ($fila=0; $fila < $resultado->num_rows;$fila++) {
        $registro=$BD->obtener_fila($resultado,$fila);
        ?>
      <tr>
        <td><?php echo $registro['nombre_cliente']; ?></td>
        <td><?php echo $registro['nombre_producto']; ?></td>
        <td><?php echo $registro['nombre_tamano']; ?></td>
        <td><?php echo $registro['cantidad']; ?></td>
        <td><?php echo $registro['precio']; ?></td>
        <td><?php echo $registro['monto_total']; ?></td>
      </tr>
    <?php } ?>
    </table>
    <a class="btn" href="http://localhost/pizzeria/php/registrarDireccion.php"> <button type="button" name="button">Direccion y compra</button></a>

  </body>
</html>
