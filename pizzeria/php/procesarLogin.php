<?php

include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();

$correoCliente = "";
$passwordCliente = "";
if(isset($_POST['ingresar'])){
  $correoCliente = $_POST['correo'];
  $passwordCliente = $_POST['password'];
}


session_start();
$_SESSION['correo'] = $correoCliente;


$resultado = $BD->ejecutar("SELECT * FROM cliente WHERE correo_electronico = '$correoCliente' AND pass = '$passwordCliente'");
$fila = $resultado->num_rows;
$registro=$BD->obtener_fila($resultado,$fila);
$id = $registro['id'];
$_SESSION['id'] = $id;
if($fila > 0){
  header("location:http://localhost/pizzeria/php/seleccionarPizza.php");
}else{
  ?>
  <script type="text/javascript">
    alert("datos no existentes");
    window.location.href="http://localhost/pizzeria/loginCliente.php";
  </script>
<?php } ?>
