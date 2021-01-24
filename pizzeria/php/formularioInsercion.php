<?php
include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();
//llamamos la funcion ejecutar del archivo conector.php para mostra la informacion de la tabla horario
$resultado=$BD->ejecutar("SELECT nombre_tamano FROM tamano_producto");
$fila = 0;
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insercion</title>
    <style media="screen">
      .insercion{
        border: 5px solid rgb(155, 65, 199);
        padding: 20px;
        margin: 30px;
        padding: 10px;
        width: 400px;
        height: auto;
        border-radius: 10%;
        border: 5px solid  rgb(94, 86, 236);
        background: rgb(224, 238, 222);
        margin: auto;
        background-image: url("http://localhost/pizzeria/imagenes/imagenFondo3.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: scroll;
      }
      .insercion input[type="text"],
        input[type="number"],
        input[type="url"]{
        border: 3px solid rgb(94, 86, 236);
        background: transparent;
        outline: none;
        height: 40px;
        color: rgb(0, 0, 0);
        font-size: 16px;
        width: 98%;
        margin-top: 10px;
        margin-bottom: 8px;
        border-radius: 10px;
        background: white;
      }
      .insercion input[type="radio"]{
        height: 30px;
        color: rgb(0, 0, 0);
        font-size: 20px;
        width:10%;
      }
      .insercion input[type="submit"]{
        outline: none;
        height: 40px;
        background: rgb(94, 86, 236);
        color: white;
        border: 1px solid  rgb(94, 86, 236);
        margin-bottom: 25px;
        border-radius: 5px;
        text-align: center;
        width: 100px;
        margin-left: 50%;
        transform: translateX(-50%);
      }
      .insercion label{
        background: rgb(94, 86, 236);
        outline: none;
        height: 40px;
        color: rgb(0, 0, 0);
        font-size: 25px;
        font-family: monospace;
        width: 100%;
        margin-bottom: 25px;
        margin-top: 25px;
        border-radius: 10px;
      }
      .insercion .radio{
        padding: 10px;
        margin: 5px;
        width: auto;

      }

    </style>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  </head>
  <body>
    <form id="insercion" class="insercion"  method="post">
      <label for="NombreProducto">Nombre del Producto: </label>
      <input type="text" name="nombreProducto" placeholder="Nombre del producto" required><br>
      <label for="precio">Precio de la pizza</label>
      <input type="number" name="precio" placeholder="Precio" min="0" step="any" required><br>
      <label for="NombreProducto">URL de la pizza: </label>
      <input type="url" name="url" placeholder="URL imagen" required><br>
      <?php
      /*En esta parte utilizamos un ciclo for pra recorrer los valores a la tabla
        para pasarlo a buttons radio buttons
      */
      for ($fila=0; $fila < $resultado->num_rows;$fila++) {
        $registro=$BD->obtener_fila($resultado,$fila);
        ?>
        <div class="radio">
          <input type="radio" name="tamano" value="<?php echo $registro['nombre_tamano'];?>" required>
          <label for="chica"><?php echo $registro['nombre_tamano'];?></label>
        </div>
      <?php } ?>
      <input type="submit" name="guardar" value="Guardar">

    </form>
    <script type="text/javascript">
          $(document).ready(function() {
                  $('#insercion').submit(function(e) {
                 e.preventDefault();
                  $.ajax({
                      type: "POST",
                      url: 'http://localhost/pizzeria/php/procesarInsercion.php',
                      data: $(this).serialize(),
                      success: function(response)
                      {
                        alert("Procucto guardado");
                        window.location.href="http://localhost/pizzeria/registroProducto.php";

                     }
                 });

               });
            });
    </script>
  </body>
</html>
