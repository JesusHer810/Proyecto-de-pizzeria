<?php
include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();

session_start();
$idCliente = $_SESSION['id'];

$direccion = "";


if(isset($_POST['agregarDireccion'])){
  $direccion = $_POST['direccion'];
}

$BD->ejecutar("UPDATE pedido SET fecha_hora = now(), direccion ='$direccion' WHERE pedido.id_cliente = '$idCliente' AND pedido.estado = 'agregada'");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>nota</title>
    <style media="screen">
      .nota{
        background: rgb(211, 222, 126);
        height: auto;
        width: 500px;
        margin: auto;
        border-radius: 10px;
        border: 3px solid rgb(24, 212, 99);
      }
      .nota label{
        font-family: fantasy;
        padding-left: 20px;
      }
      .table{
        /*border-collapse: collapse;*/
        height: auto;
        width: auto;
        padding: 10px;
        text-align: center;
        }
      .table td{
          border: rgb(0, 0, 0) 1px solid;
          width: 150px;
          height: 20px;
          border-radius: 8px;
          background: rgb(155, 228, 231);
      }
      .montoTotal{
        margin-left: 250px;

      }
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
      }
      .header{
        width: 100%;
        height: 55px;
        background: rgb(45, 97, 199);
        position: fixed;
        border: 0px;
      }
      /*pie de pagina de pagina*/
      .footer{
        width: 100%;
        height: 50px;
        background: rgb(45, 97, 199);
      }
      /*parrafo de pie de pagina*/
      .footer p{
        text-align: center;
        color: rgba(114, 235, 34, 0.93);
        font-size: 40px;
        font-family: serif;
        line-height: 45px;
      }
      /*contenedor de la lista*/
      .container{
        max-width: 1100px;
        margin: auto;

      }
      /*pasar los ul a lado derecho en forma de linea*/
      .menu ul{
        float: right;
        display: flex;
        list-style: none;
        cursor: pointer;
      }
      /*los tipo a estara en forma de linea block*/
      .menu a{
        display: block;
        padding: 20px;
        text-decoration: none;
        color: rgb(196, 209, 226);
        transition: all 500ms ease;
        font-size: 20px;
      }
      /*cambiar de color cuando pase el puntero*/
      .menu a:hover{
        background: rgb(194, 227, 34);
        color: rgb(39, 29, 231);
      }

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
    <div class="nota">
      <?php
      $resultado = $BD->ejecutar("SELECT cliente.nombre_cliente, producto.nombre_producto, pedido.cantidad , tamano_producto.nombre_tamano, pedido.precio, pedido.monto_total, pedido.direccion, pedido.fecha_hora FROM cliente INNER JOIN pedido ON cliente.id = pedido.id_cliente INNER JOIN producto ON producto.id = pedido.id_producto INNER JOIN tamano_producto ON producto.id_tamano_pizza = tamano_producto.id WHERE cliente.id = '$idCliente' AND pedido.estado = 'agregada'");
    ?>
      <table class="table">
         <tr>
           <td>Nombre de la pizza</td>
           <td>Cantidad</td>
           <td>Tamaño</td>
           <td>Precio</td>
           <td>SubTotal</td>

        </tr>
       <?php
          $fila = 0;
          for ($fila=0; $fila < $resultado->num_rows;$fila++) {
            $registro=$BD->obtener_fila($resultado,$fila);
           ?>
            <tr>
               <td><?php echo $registro['nombre_producto']; ?></td>
               <td><?php echo $registro['cantidad']; ?></td>
               <td><?php echo $registro['nombre_tamano']; ?></td>
               <td><?php echo $registro['precio']; ?></td>
               <td><?php echo $registro['monto_total']; ?></td>
             </tr>
           <?php } ?>
            </table>

      <?php
      $montoTotal = $BD->ejecutar("SELECT SUM(monto_total) FROM pedido WHERE id_cliente = '$idCliente' AND estado = 'agregada'");
      $filaSuma = $montoTotal->num_rows;
      $suma = $BD->obtener_fila($montoTotal,$filaSuma);
       ?>
      <label class="montoTotal"> Total a pagar: <?php echo $suma['SUM(monto_total)'];?></label>
      <?php
      $BD->ejecutar("UPDATE pedido SET estado = 'finalizada', fecha_hora = now()  WHERE pedido.id_cliente = '$idCliente' AND pedido.estado = 'agregada'");
       ?>
    </div>
  </body>
</html>
