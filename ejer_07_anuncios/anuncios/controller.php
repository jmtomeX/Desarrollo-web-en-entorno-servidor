<?php session_start();
require './globals.php';
require '../models/CAnuncio.php';
$msg = "Operacion desconocida";
$operation = $_GET["op"];

$un_anuncio = new CAnuncio();

switch ($operation) {
    case 1: // Insertar Anuncio **************************************************************
         $an_titulo = $_POST['titulo'];
         $an_descripcion = $_POST['descripcion'];
         $an_precio = $_POST['precio'];
         $an_foto = $_POST['foto'];
         $an_us_id = $_SESSION['us_id'];

         $result = $un_anuncio->registroAnuncio($an_titulo, $an_descripcion, $an_precio, $an_foto, $an_us_id );
         if($result == false) {
            $msg = "El anuncio no se ha podido insertar";
        }else {
            $msg = "Anuncio registrado con éxito.";
            header("Location: ../public/index.php?msg=$msg");
        }
            ;
        break;
    case 2: // Modificar anuncio **************************************************************
      
        break;
    case 3: // Borrar Anuncio *********************************************************************
       
        break;
}