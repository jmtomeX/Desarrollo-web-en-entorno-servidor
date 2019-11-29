<?php 
require '../models/CAnuncio.php';
$operation = $_GET["op"];

switch ($operation) {
     case 1: // Servicio recibido de generar una busqueda aleatoria de un anuncio *********************************************************************
           $anuncio_aleatorio =  new CAnuncio();
           
           $anuncio_aleatorio -> cargarAnuncioAleatorio();
           $objeto = new stdClass();
           $objeto-> id = $anuncio_aleatorio->getId();
           $objeto-> titulo = $anuncio_aleatorio->getTitulo();
           $objeto-> descripcion = $anuncio_aleatorio->getDescripcion();
           $objeto-> precio = $anuncio_aleatorio->getPrecio();
           $objeto-> url = "http://localhost/Desarrollo-web-en-entorno-servidor/ejer_07_anuncios/img/uploads_imgs/";
           $objeto-> foto = $anuncio_aleatorio->getFoto();
           $anuncio_servicio =  json_encode($objeto, JSON_UNESCAPED_UNICODE);
           echo $anuncio_servicio;
          /*
          $anuncios = $anuncio_aleatorio -> cargarAnuncioAleatorio2();
          echo json_encode($anuncios, JSON_UNESCAPED_UNICODE);
          */
           break;
           // http://localhost/Desarrollo-web-en-entorno-servidor/ejer_07_anuncios/img/uploads_imgs/
}
