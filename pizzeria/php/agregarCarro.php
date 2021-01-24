<?php
session_start();
$idCliente = $_SESSION['id'];
echo "id".$idCliente;
echo "<br>";
include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();

$idProducto = "";
$cantidad ="";

if(isset($_POST['agregaCarro'])){
  $idProducto = $_POST['id'];
  $cantidad =$_POST['cantidad'];
}
echo "product".$idProducto;
echo "<br>";
echo "cantida".$cantidad;
echo "<br>";

//llamamos la funcion ejecutar del archivo conector.php para mostra la informacion de la tabla horario
$resultado=$BD->ejecutar("SELECT producto.nombre_producto,producto.precio, tamano_producto.nombre_tamano FROM producto INNER JOIN tamano_producto ON producto.id_tamano_pizza = tamano_producto.id WHERE producto.id = '$idProducto'");
$fila = $resultado->num_rows;
$registro=$BD->obtener_fila($resultado,$fila);
$precioProducto = $registro['precio'];
echo "nomreP".$nombreProducto;
echo "<br>";
echo "precioP".$precioProducto;
$subTotal = ($cantidad * $precioProducto);


$BD->ejecutar("INSERT INTO pedido(cantidad, precio , monto_total , estado, fecha_hora, direccion, id_producto, id_cliente) VALUES ('$cantidad','$precioProducto','$subTotal','agregada',now(),'ninguna','$idProducto','$idCliente')");
header("location:http://localhost/pizzeria/php/seleccionarPizza.php");
?>
