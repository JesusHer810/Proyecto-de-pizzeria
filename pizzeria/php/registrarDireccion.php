<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrar Dirección</title>
  </head>
  <link rel="stylesheet" href="http://localhost/pizzeria/css/estilosRegistrarDireccion.css">
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
    <fieldset class="direccioCliente">
      <legend>Direccion</legend>
      <form class="" action="http://localhost/pizzeria/php/notaPedido.php" method="post">
        <label for="direccion">direccion: </label>
        <input type="text" name="direccion" placeholder="Direccion" required>
        <input type="submit" name="agregarDireccion" value="Guardar">
      </form>
    </fieldset>

  </body>
</html>
