<?php

class Conexion {

    public function getConexion(){
     try {
           $host = "localhost";   //127.0.0.1  localhost
           $db = "dbfasi";        //base de datos de mysql
           $user = "root";        //usuario de mysql
           $password = "";        //contraseña de mysql
           $db = new PDO("mysql:host=$host;dbname=$db;",$user, $password);
           return $db;

         }catch(PDOException $e){
           
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            die(); 
         }
       
  }

}
?>
