<?php

session_start();
$varSession = $_SESSION['correo'];

include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();
//llamamos la funcion ejecutar del archivo conector.php para mostra la informacion de la tabla horario
$resultado=$BD->ejecutar("SELECT  producto.nombre_producto, producto.id, tamano_producto.nombre_tamano, producto.imagen,  producto.precio FROM producto INNER JOIN tamano_producto ON producto.id_tamano_pizza = tamano_producto.id");
$fila = 0;
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Seleccionar pizza</title>
    <link rel="stylesheet" href="http://localhost/pizzeria/css/estilosSeleccionarPizza.css">
  </head>
  <body>
    <header class="header">
      <div class="container">
        <nav class="menu">
          <ul>
            <li><a href="http://localhost/pizzeria/php/seleccionarPizza.php">Inicio</a></li>
            <li><a href="http://localhost/pizzeria/php/carritoCompras.php">Carrito</a></li>
            <li><a href="#"><?php echo $varSession; ?></a>
                <ul class="subMenuUsuario">
                  <li><a href="http://localhost/pizzeria/php/cerrarSesionCliente.php">Cerrar sesión</a></li>
                </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <fieldset class="pizzas">
      <legend>PIZZAS PARA ORDENAR</legend>
      <?php
      /*En esta parte utilizamos un ciclo for pra recorrer los valores a la tabla
        ademas con la ayuda de la funcion obtener_fila para obtener la fila de la tabla de la BD
      */
      for ($fila=0; $fila < $resultado->num_rows;$fila++) {
        $registro=$BD->obtener_fila($resultado,$fila);
        ?>
        <fieldset>
          <legend><?php echo $registro['nombre_producto']; ?></legend>
            <form class="" action="http://localhost/pizzeria/php/agregarCarro.php" method="post">
              <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
              <center><label ><?php echo $registro['nombre_tamano']; ?></label></center>
              <img src="<?php echo $registro['imagen']; ?>" height="200px" width="200px" alt="pizza barbacoa">
              <center><label > $ <?php echo $registro['precio']; ?></label></center>
              <label for="number">Cantidad:</label>
              <input type="number" name="cantidad" value="" min="0" required>
              <center><input type="submit" onclick="boton();" name="agregaCarro" value="Agregar a carro"></center>
            </form>
            <script type="text/javascript">
              function boton(){
                alert("Agregada al carro");
              }
            </script>
        </fieldset>
      <?php } ?>

    </fieldset>
    <br>
    <footer class="footer">
      <p>Disfruta tu pedido</p>
    </footer>
  </body>
</html>
