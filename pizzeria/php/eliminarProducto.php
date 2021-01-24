<?php

include_once "conector.php";
/*creamos un objeto para poder llamar todas la funciones que se encuntran en la clase Db*/
$BD = new Db();
$id = $_GET['id'];


$BD->ejecutar("DELETE FROM producto WHERE id = '$id'");

?>
<script type="text/javascript">
  window.location.href="http://localhost/pizzeria/registroProducto.php";
</script>
