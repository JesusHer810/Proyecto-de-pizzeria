<?php
session_start();
$nombreEmpleado = $_SESSION['nombreEmpleado'];
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registro producto</title>
<link rel="stylesheet" href="http://localhost/pizzeria/css/estilosRegistroProducto.css">
  </head>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
      <script>
        <!--llamar un archivo llamado formularioInsercion php mediante esta funcion-->
        $(document).ready(function(){
			  $("#insert").on("click", function(e){
		  	e.preventDefault();
			  $("#informacionProducto").load("php/formularioInsercion.php");
			  });
		    });
        <!--llamar un archivo llamado formularioInsercion php mediante esta funcion-->
        $(document).ready(function(){
			  $("#metodos").on("click", function(e){
		  	e.preventDefault();
			  $("#informacionProducto").load("php/actualizarEliminar.php");
			  });
		    });
        <!--llamar un archivo llamado formularioInsercion php mediante esta funcion-->
        $(document).ready(function(){
        $("#pedidos").on("click", function(e){
        e.preventDefault();
        $("#informacionProducto").load("php/pedidosRealizados.php");
        });
        });
      </script>
  <body>
    <header class="header">
      <div class="container">
        <nav class="menu">
          <ul>
            <li><a href="#" id="pedidos">Pedidos</a></li>
            <li><a href="#">Opciones producto</a>
                <ul class="subMenuUsuario">
                  <li><a href="#" id="insert" name="insercion" >Insercion</a></li>
                  <li><a href="#" id="metodos" name="metodos" >Eliminar Actualizar Consultar</a></li>
                </ul>
            </li>
            <li><a href="#"><?php echo $nombreEmpleado; ?></a>
              <ul class="subMenuUsuario">
                <li><a href="http://localhost/pizzeria/php/loginAdmin/loginAdmin.php" >Cerra Sesion</a></li>
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
    <fieldset class="informacionProducto" id="informacionProducto">
      <h1>Area</h1>
    </fieldset>
  </body>
</html>
