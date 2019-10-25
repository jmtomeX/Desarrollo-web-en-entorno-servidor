<?php 
// Controlador para los enlaces de interes
$msg = "Operacion desconocida";
$operation = $_GET["op"];


switch ($operation) {
    case 1: // Insert link **************************************************************
    $message_fracaso ="Error al insertar los datos, compruebe los campos.";
    $message_exito = "Registro con éxito";
    $enl_titulo = $_POST['titulo_enlace'];
    $enl_video_id = $_POST['video_id'];
    $enl_url = $_POST['enlace'];
    $id = insertLink($enl_titulo,$enl_url,$enl_video_id);
    if($id == false){
        $msg = $message_fracaso;
        header("Location:./enlaces_vista.php?msg=$msg");
    } else {
        $msg = $message_exito;
        header("Location:./enlaces_vista.php?msg=$msg&id=$enl_video_id");
    }
    ;
    break;
    case 2: // update link **************************************************************
    
    ;
        break;
    case 3: //Delete link *********************************************************************
        
    ;
    break;
    case 4: //Show links *********************************************************************
  
    ;
    break;
}

// Funciones ***********************************************************

// Insertar el link
function insertLink($enl_titulo,$enl_url,$enl_video_id) {
// Genera consulta 
$sql_insert = "INSERT INTO enlaces_videos(enl_titulo,enl_url,enl_video_id) VALUES ('$enl_titulo','$enl_url','$enl_video_id')"; 
require "../conection.php";
// ejecutar
mysqli_query($conx,$sql_insert);
$id = mysqli_insert_id($conx);
return ($id > 0);
// cerramos conexión
mysqli_close($conx);
}

// Modificar el link
function login() {

//

// cerramos conexión
mysqli_close($conx);

}
?>
