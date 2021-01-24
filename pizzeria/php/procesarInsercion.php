<?php
include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();
$fila = 0;

$nombreProducto = $_POST["nombreProducto"];
$precio = $_POST["precio"];
$url = $_POST["url"];
$tamano = $_POST["tamano"];

$resultado=$BD->ejecutar("SELECT nombre_tamano FROM tamano_producto");


$resultadoTamano;
for ($fila=0; $fila < $resultado->num_rows;$fila++) {
  $registro=$BD->obtener_fila($resultado,$fila);
  if ($tamano == $registro['nombre_tamano']) {
    $resultadoTamano = $fila + 1;
    break;
  }
}


echo $resultadoTamano;

$BD->ejecutar("INSERT INTO producto(nombre_producto, precio, imagen, id_tamano_pizza) VALUES('$nombreProducto', '$precio', '$url','$resultadoTamano')");

?>
