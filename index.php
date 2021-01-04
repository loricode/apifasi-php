<?php

require_once('conexion.php');
require_once('cors.php');
require_once('controller.php');

$methodHTTP = $_SERVER['REQUEST_METHOD'];

switch ($methodHTTP) {

  case 'GET':
      if(empty($_GET)){
        $ctl = new Controller();
        $data = $ctl->getProducts();
        echo json_encode(["products" => $data]);
      }else{
        $data = $_GET;
        $ctl = new Controller();
        $result = $ctl->getProduct($data);
        echo json_encode([ "data" => $result  ]);

      }

      break;

  case 'POST':
      $data = json_decode(file_get_contents('php://input'), true);  
      $ctl = new Controller();
      $result = $ctl->addProduct($data);
      echo json_encode([ "data" => $result ]);
      break;


   case 'DELETE':
       $data = $_GET;
       $ctl = new Controller();
       $result = $ctl->deleteProduct($data);
       echo json_encode([ "data" => $result  ]);
       break;

   case 'PUT';
       $data = json_decode(file_get_contents('php://input'), true); 
       $ctl = new Controller();
       $result = $ctl->updateProduct($data);
       echo json_encode([ "data" => $result  ]);
       break;

  default:
    # code...
    break;
}

?>