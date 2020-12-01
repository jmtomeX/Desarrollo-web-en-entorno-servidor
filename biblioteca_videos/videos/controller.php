<?php
session_start();
$operation = $_GET["op"];
$msg = "Operacion desconocida";
// estilos confirmación mensaje
$msgConfirmError = "button-error";
$msgConfirmOk = "button-secondary";
switch ($operation) {
    case 1: // Insert **************************************************************
        $reg_titulo = $_POST['titulo'];
        $reg_url = $_POST['url_vid'];
        $message_fallo_insert = "El video ya existe, selecciona otro diferente <br>O los campos son inválidos";
        $message_exito = "Registro con éxito";
        $message_fracaso = "Error al subir el video";

        $id = insert($reg_titulo, $reg_url);

        if ($id == -1) {
            $msg = $message_fallo_insert;
            $msgConfirm = $msgConfirmError;
        } else if ($id == 0) {
            $msg = $message_fracaso;
            $msgConfirm = $msgConfirmError;
        } else {
            $msg = $message_exito;
            $msgConfirm = $msgConfirmOk;
        };
        break;
        // Update **************************************************************
    case 2:
        define("MSG_EXITO", "Video modificado");
        define("MSG_FALLO", "El video no se ha modificado</p>");
        //TODO añadir función que compruebe si el usuario es el dueño del video para delete update
        $reg_titulo = $_POST['this-title'];
        $reg_url = $_POST['this-url'];
        // $id = $_SESSION['id'];
        $video_id = $_GET['id'];

        //generar la consulta
        $sql = "UPDATE videos SET titulo = '$reg_titulo', vid_url = '$reg_url' WHERE id = '$video_id'";
        require "../conection.php";
        mysqli_query($conx, $sql);
        $cont = mysqli_affected_rows($conx);

        echo $cont;
        if ($cont > 0) {
            $msg = MSG_EXITO;
            $msgConfirm = $msgConfirmOk;
        } else {
            $msg = MSG_FALLO;
            $msgConfirm = $msgConfirmError;
        };
        break;
    case 3: //Delete *********************************************************************
        define("MSG_EXITO", "El video  se ha borrado");
        define("MSG_FALLO", "El video no se ha podido borrar");

        $video_id = $_GET['id'];

        //generar la consulta
        $sql = "DELETE FROM videos WHERE id = '$video_id'";
        // echo $sql;
        // exit;
        require "../conection.php";
        //ejecutar la consulta
        mysqli_query($conx, $sql);
        $cont = mysqli_affected_rows($conx);

        if ($cont > 0) {
            $msg = MSG_EXITO;
            $msgConfirm = $msgConfirmOk;
        } else {
            $msg = MSG_FALLO;
            $msgConfirm = $msgConfirmError;
        }
        break;
    case 4; // Contador de videos
        $vid_id = $_GET['vid_id'];
        $vid_url = $_GET['vid_url'];
        $usu_id = $_SESSION['user_id'];
        contadorVistas($vid_id, $usu_id);
        header("Location:intranet2.php");
        exit;
        break;
}


header("Location:intranet2.php?msg=$msg&msgConfirm=$msgConfirm");

// Funciones ***********************************************************

function insert($title, $vid_url)
{
    // si todo ha ido bien
    $msg = 1;
    //generar la consulta: 
    $sql = "SELECT titulo FROM videos WHERE titulo = '$title'";

    //ejecutar la consulta
    require "../conection.php";
    $datos = mysqli_query($conx, $sql);

    if ($fila = mysqli_fetch_assoc($datos) || $title == "" || $vid_url == "") {
        // El video ya existe o campos invalidos
        $msg = 0;
    } else {
        $sql_insert = "INSERT INTO videos (titulo, vid_url) VALUES ('$title','$vid_url')";
        mysqli_query($conx, $sql_insert);
        $id = mysqli_insert_id($conx);
        if ($id <= 0) {
            // No se ha podido insertar el video
            $msg = -1;
        }
    }
    mysqli_close($conx);
    return $msg;
}
// Contador para guardar las vistas de las peliculas
function contadorVistas($vid_id, $usu_id)
{
    $sql = "SELECT cont_vistas FROM usuarios_videos WHERE id_user= '$usu_id' AND id_video = '$vid_id'";
    // TODO comprobar sentencias a bbdd
    require "../conection.php";
    $datos = mysqli_query($conx, $sql);
    // si nos nos devuelve algo continua, si no añade 1
    if ($fila = mysqli_fetch_assoc($datos)) {
        $cont_vistas = $fila["cont_vistas"];
        $cont_vistas++;
        //ejecutar la consulta
        $sql_update = "UPDATE usuarios_videos SET cont_vistas = '$cont_vistas' WHERE id_user= '$usu_id' AND id_video = '$vid_id'";
        mysqli_query($conx, $sql_update);
        $cont = mysqli_affected_rows($conx);
        return ($cont > 0);
    } else {
        $sql_insert = "INSERT INTO usuarios_videos (id_user ,id_video, cont_vistas ) VALUES ('$usu_id','$vid_id',1)";
        mysqli_query($conx, $sql_insert);
        $id = mysqli_insert_id($conx);
    }
    return ($id > 0);
    mysqli_close($conx);
}
