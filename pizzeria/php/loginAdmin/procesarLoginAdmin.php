<?php

include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();

$correoAdmin = "";
$passwordAdmin = "";

if(isset($_POST['ingresar'])){
  $correoAdmin = $_POST['correoAdmin'];
  $passwordAdmin = $_POST['passwordAdmin'];
}

session_start();
$_SESSION['correoAdmin'] = $correoAdmin;

/*$fila = 0;*/
$resultado = $BD->ejecutar("SELECT * FROM empleado WHERE correo_electronico = '$correoAdmin' AND pass = '$passwordAdmin'");
$fila = $resultado->num_rows;
$registro=$BD->obtener_fila($resultado,$fila);
$nombreEmpleado = $registro['nombre_empleado'];
$_SESSION['nombreEmpleado'] = $nombreEmpleado;

if($fila > 0){
    header("location:http://localhost/pizzeria/registroProducto.php");
}else{
  ?>
  <script type="text/javascript">
    alert("datos no existentes");
    window.location.href="http://localhost/pizzeria/php/loginAdmin/loginAdmin.php";
  </script>
<?php } ?>
