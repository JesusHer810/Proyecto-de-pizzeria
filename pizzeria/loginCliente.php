<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Cliente</title>
  <link rel="stylesheet" href="http://localhost/pizzeria/css/estilosLogin.css">
  </head>
  <body>
      <div class="login">
        <h1>Iniciar sesión</h1>
        <form class="" action="http://localhost/pizzeria/php/procesarLogin.php" method="post">
          <!--Usuario-->
          <label for="usuario">Correo electrónico</label>
          <input type="email" name="correo" placeholder="correo@email.com" required><br>
          <!--Usuario-->
          <label for="contraseña">Contraseña</label>
          <input type="password" name="password" placeholder="Ingresar contraseña" required><br>
          <!--ingresar-->
          <input type="submit" name="ingresar" value="Ingresar"><br>
          <!--Crear cuenta-->
          <a href="http://localhost/pizzeria/php/crearCuenta.php">Crear una cuenta</a>
        </form>
      </div>
  </body>
</html>
