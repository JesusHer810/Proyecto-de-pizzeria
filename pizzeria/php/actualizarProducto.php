<?php

include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();
$id = $_POST['id'];
$nombreProducto = $_POST['nombreProducto'];
$precioProducto = $_POST['precio'];
$urlProducto = $_POST['url'];
//llamamos la funcion ejecutar del archivo conector.php para mostra la informacion de la tabla horario
$BD->ejecutar("UPDATE producto SET nombre_producto = '$nombreProducto' , precio = '$precioProducto', imagen = '$urlProducto' WHERE id= '$id'");

?>
