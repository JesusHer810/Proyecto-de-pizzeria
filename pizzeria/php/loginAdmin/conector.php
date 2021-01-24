<?php
Class Db{
private $servidor='localhost';
private $usuario='root';
private $password='';
private $base_datos='proyecto';
private $link;
private $stmt;

/*Constructor de la clase*/
   public function __construct(){
      $this->conectar();
   }
   /*Realiza la conexión a la base de datos.*/
   public function conectar(){
         $this->link=new mysqli($this->servidor, $this->usuario, $this->password,$this->base_datos);
         // Check connection
         if ($this->link->connect_error) {
           die("Conexión falló: " . $this->link->connect_error);
         }

      }

   /*Método para ejecutar una sentencia sql*/
   public function ejecutar($sql){
         $this->stmt=$this->link->query($sql);
         return $this->stmt;
     }

   /*Método para obtener una fila de resultados de la sentencia sql*/
   public function obtener_fila($stmt,$fila){
           if ($fila==0){
              $this->array=mysqli_fetch_array($stmt,MYSQLI_ASSOC);
           }else{
              mysqli_data_seek($stmt,$fila);
              $this->array=mysqli_fetch_array($stmt,MYSQLI_ASSOC);
           }
           return $this->array;
        }


   /*Destructor de la clase */
   function __destruct() {
           $this->link->close();
         }
   }
?>
