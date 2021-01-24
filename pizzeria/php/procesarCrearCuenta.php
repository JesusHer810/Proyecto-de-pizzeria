<?php
include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();

$nombreCliente = "";
$correoCliente = "";
$passwordCliente = "";
$telefonoCliente = "";

if(isset($_POST['registrar'])){
  $nombreCliente = $_POST['nombre'];
  $correoCliente = $_POST['correo'];
  $passwordCliente = $_POST['contraseña'];
  $telefonoCliente = $_POST['telefono'];
}


$BD->ejecutar("INSERT INTO cliente(nombre_cliente, telefono, correo_electronico, pass) VALUES ('$nombreCliente','$telefonoCliente','$correoCliente','$passwordCliente')");
?>

<script type="text/javascript">
  alert("informacion Guardada");
  window.location.href="http://localhost/pizzeria/loginCliente.php";
</script>
