<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Empleado</title>
  <link rel="stylesheet" href="http://localhost/pizzeria/css/estilosLogin.css">
  </head>
  <body>
      <div class="login">
        <h1>Iniciar sesión</h1>
        <form class="" action="http://localhost/pizzeria/php/loginAdmin/procesarLoginAdmin.php" method="post">
          <!--Usuario-->
          <label for="usuario">Correo electrónico</label>
          <input type="email" name="correoAdmin" placeholder="correo@email.com" required><br>
          <!--Usuario-->
          <label for="contraseña">Contraseña</label>
          <input type="password" name="passwordAdmin" placeholder="Ingresar contraseña" required><br>
          <!--ingresar-->
          <input type="submit" name="ingresar" value="ingresar"><br>
          <!--Crear cuenta-->
        </form>
      </div>
  </body>
</html>
