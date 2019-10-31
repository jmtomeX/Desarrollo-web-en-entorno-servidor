<?php
// Controlador para los enlaces de interes
$msg = "Operacion desconocida";
$operation = $_GET["op"];


switch ($operation) {
    case 1: // Insert link **************************************************************
        $message_fracaso = "Error al insertar los datos, compruebe los campos.";
        $message_exito = "Registro con éxito";
        $enl_titulo = $_POST['titulo_enlace'];
        $enl_video_id = $_POST['video_id'];
        $enl_url = $_POST['enlace'];
        $id = insertLink($enl_titulo, $enl_url, $enl_video_id);
        if ($id == false) {
            $msg = $message_fracaso;
            header("Location:./enlaces_vista.php?msg=$msg");
        } else {
            $msg = $message_exito;
            header("Location:./enlaces_vista.php?msg=$msg&id=$enl_video_id");
        };
        break;
    case 2: // update link **************************************************************

        ;
        break;
    case 3: //Delete link *********************************************************************
        $message_fracaso = "Error al borrar el enlace, compruebe los campos.";
        $message_exito = "Se ha borrado el enlace con éxito";
        $enlace_id = $_GET['id'];
        $enl_video_id = $_GET['enl_video_id'];
        if (deleteLinks($enlace_id)) {
            $msg = $message_exito;
        } else {
            $msg = $message_fracaso;
        };
        break;
    case 4: //Show links *********************************************************************

        ;
        break;
}
header("Location:./enlaces_vista.php?msg=$msg&id=$enl_video_id");
// Funciones ***********************************************************

// Insertar el link
function insertLink($enl_titulo, $enl_url, $enl_video_id)
{
    // Genera consulta 
    $sql_insert = "INSERT INTO enlaces_videos(enl_titulo,enl_url,enl_video_id) VALUES ('$enl_titulo','$enl_url','$enl_video_id')";
    require "../conection.php";
    // ejecutar
    mysqli_query($conx, $sql_insert);
    $id = mysqli_insert_id($conx);
    return ($id > 0);
    // cerramos conexión
    mysqli_close($conx);
}

// Delete links
function deleteLinks($enl_id)
{
    $sql_delete = "DELETE FROM enlaces_videos WHERE enl_id = '$enl_id'";
    require "../conection.php";
    mysqli_query($conx, $sql_delete);
    $cont = mysqli_affected_rows($conx);
    
    mysqli_close($conx);
    return ($cont > 0);
}
// Mostrar videos
function showLinks($enl_id)
{
    $sql = "SELECT * FROM enlaces_videos WHERE enl_video_id = '$enl_id'";
    require "../conection.php";
    $datos = mysqli_query($conx, $sql);
    $arrayLinks = [];
    while ($linea = mysqli_fetch_assoc($datos)) {
        $arrayLinks = [
            $enl_id = $linea['enl_id'],
            $enl_titulo = $linea['enl_titulo'],
            $enl_url = $linea['enl_url']
        ];
    };
    mysqli_close($conx);
    return $arrayLinks;
    
}
