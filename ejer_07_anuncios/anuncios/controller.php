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
        $result = $un_anuncio->registroAnuncio($an_titulo, $an_descripcion, $an_precio, $newFileName, $an_us_id );
        if($result == false) {
            $msg .= "El anuncio no se ha podido insertar";
        }else {
            $msg .= "Anuncio registrado con éxito.";
        }

        header("Location: ./crear_anuncio.php?msg=$msg");
        break;
    case 2: // Modificar anuncio **************************************************************
            
                break;
      case 3: // Borrar Anuncio *********************************************************************
            
                break;
}