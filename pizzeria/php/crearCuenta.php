<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Creacion de cuenta</title>
    <link rel="stylesheet" href="http://localhost/pizzeria/css/estilosCrearCuenta.css">

  </head>
  <body>
    <div class="informacionCliente">
      <form class="" action="procesarCrearCuenta.php" method="post">
        <h1>Información cliente</h1>
        <!--nombre,telefono,correo,contraseña-->
        <label for="nombreCliente">Nombre: </label>
        <input type="text" name="nombre" placeholder="Juan Perez Cruz" required><br>
        <label for="correoElectronico">Correo electrónico: </label>
        <input type="email" name="correo" placeholder="correo@email.com" required><br>
        <label for="">Contraseña: </label>
        <input type="password" name="contraseña" placeholder="Contraseña" pattern=".{8,}" title="la constraseña debe ser mayor que 8 " required><br>
        <label for="telefono">Número telefonico: </label>
        <input type="tel" name="telefono" placeholder="ddd-ddd-dddd" pattern="[0-9]{3}[-][0-9]{3}[-][0-9]{4}" title="Un número de teléfono válido consta de 3 dígitos en la primera parte,un guión(-), 3 dígitos del número en la segunda parte ,guión (-) y 4 dígitos más. Ejemplo : (ddd-ddd-dddd)" required><br>
        <input type="submit" name="registrar" value="Registrarte">
      </form>
    </div>
  </body>
</html>
