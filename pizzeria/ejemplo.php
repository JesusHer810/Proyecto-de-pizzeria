<?php
include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();

$correoCliente = $_POST['correo'];
$passwordCliente = $_POST['password'];

//llamamos la funcion ejecutar del archivo conector.php para mostra la informacion de la tabla horario



$resulatado = $BD->ejecutar("SELECT correo_electronico FROM cliente WHERE correo_electronico = $correoCliente AND password = $passwordCliente");
$fila = 0;
?>
<table>
<caption>HORARIO</caption>
<tr>
  <td>Lunes</td>
  <td>Martes</td>
</tr>
<?php

for ($fila=0; $fila < $resultado->num_rows;$fila++) {
  $registro=$BD->obtener_fila($resultado,$fila);
  ?>
<tr>
  <td><?php echo $registro['correo_electronco']; ?></td>


</tr>
<?php } ?>
</table>
