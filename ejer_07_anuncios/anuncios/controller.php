<?php 
require '../includes/globals.php';
require '../models/CAnuncio.php';
$msg = "Operacion desconocida";
$operation = $_GET["op"];

$un_anuncio = new CAnuncio();

switch ($operation) {
    case 1: // Insertar Anuncio **************************************************************
         $an_titulo = $_POST['titulo'];
         $an_descripcion = $_POST['descripcion'];
         $an_precio = $_POST['precio'];
         $an_us_id = $_SESSION['us_id'];
         $newFileName = null;
         $msg="";
         //Comprobar si viene un archivo de imagen:
         if (file_exists($_FILES['foto']['tmp_name']) && is_uploaded_file($_FILES['foto']['tmp_name']))  {
            // La ruta temporal donde se carga el archivo se almacena en esta variable.
            $fileTmpPath = $_FILES['foto']['tmp_name'];
            // El nombre real del archivo se almacena en esta variable.
            $fileName = $_FILES['foto']['name'];
            // Indica el tamaño del archivo cargado en bytes.
            $fileSize = $_FILES['foto']['size'];
            // Contiene el tipo mime del archivo cargado.
            $fileType = $_FILES['foto']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // limpiar el nombre del archivo quitar espcios en blanco
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            // verificar la extensión del archivo cargado con un conjunto de extensiones que queremos permitir la carga.
            $allowedfileExtensions = array('jpg', 'gif', 'png');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                // directorio para guardar las imgs
                $uploadFileDir = '../img/uploads_imgs/';
                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
                //Comprobar que la foto está en su sitio:
                if (!file_exists($dest_path)) {
                    $newFileName = null;
                    $msg = "La foto no se ha podido subir.";
                }
            } else {
                $newFileName = null;
                $msg = "Formato de imagen no válido.";
            }
        }
        $result = $un_anuncio -> registroAnuncio($an_titulo, $an_descripcion, $an_precio, $newFileName, $an_us_id );
        if($result == false) {
            $msg .= "El anuncio no se ha podido insertar";
        }else {
            $msg .= "Anuncio registrado con éxito.";
        }

        header("Location: ./crear_anuncio.php?msg=$msg");
        break;
    case 2: // Eliminar anuncio **************************************************************
        $an_id = $_GET['id'];
        if ($un_anuncio -> cargarAnuncio($an_id)) {
            $result =  $un_anuncio -> EliminarAnuncio($an_id);
            if ($result) {
                //Comprobamos si tenía imagen:
                if ($un_anuncio ->tieneImage()) {
                    //Comprobamos que el archivo existe:
                    $archivo = "../img/uploads_imgs/".$un_anuncio -> getImage();
                    if (file_exists($archivo)) {
                        unlink($archivo);
                    }
                }
            }
        }
        if($result == false) {
            $msg = "El anuncio no se ha podido borrar";
        }else {
            $msg = "Anuncio borrado con éxito.";
        }
        header("Location: ./vista_anuncios_id.php?msg=$msg");
                break;
     case 3: // Servicio recibido de generar una busqueda aleatoria de un anuncio *********************************************************************
           $anuncio_aleatorio =  new CAnuncio();
           $objecto = new stdClass();

           $anuncio_aleatorio -> cargarAnuncioAleatorio();

           $objeto-> id = $anuncio_aleatorio->getId ;
           $objeto-> titulo = $anuncio_aleatorio->getTitulo;
           $objeto-> descripcion = $anuncio_aleatorio->getDescripcion;
           $objeto-> precio = $anuncio_aleatorio->getPrecio;
           $objeto-> foto = $anuncio_aleatorio->getFoto;
           
           $anuncio_servicio =  json_encode($objeto);

           echo $anuncio_servicio;exit;
           break;
}