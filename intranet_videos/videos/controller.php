<?php
session_start(); 
$operation = $_GET["op"];
$msg = "Operacion desconocido";
switch ($operation) {
    case 1: // Insert **************************************************************
    $reg_titulo = $_POST['titulo'];
    $reg_url = $_POST['url_vid'];
    $message_fallo_insert ="El video ya existe, selecciona otro diferente <br>O los campos son inválidos";
    $message_exito = "Registro con éxito";
    $message_fracaso = "Error al subir el video";
    
    $id = insert($reg_titulo, $reg_url);
    
    if($id == -1){
        $msg = $message_fallo_insert;
    } else if($id == 0) {
        $msg = $message_fracaso;
    } else {
        $msg = $message_exito;

    }
    ;
        break;
    case 2: // Update **************************************************************
    define("MSG_EXITO", "<p style='background-color:powderblue;'>Video modificado</p>");
    //const MSG_FALLO = "<p style='background-color:powderblue;'>El video no se ha podido modificar</p>";
    define("MSG_FALLO","<p style='background-color:powderblue;'>El video no se ha podido modificar</p>");
    
    $reg_titulo = $_POST['this-title'];
    $reg_url = $_POST['this-url'];
    $video_id = $_SESSION['id'];
    
    //generar la consulta
    $sql = "UPDATE videos SET titulo = '$reg_titulo', vid_url = '$reg_url' WHERE id = '$video_id'";
    //ejecutar la consulta
    mysqli_query($conx,$sql);
    $cont = mysqli_affected_rows($conx);
    
    echo $cont;
    if ($cont>0){
        $msg = MSG_EXITO;
    }else{
        $msg = MSG_FALLO;
    }  
    ;
        break;
    case 3: //Delete *********************************************************************
    define("MSG_EXITO", "<p style='background-color:powderblue;'>El video  se ha borrado</p>");
    define("MSG_FALLO","<p style='background-color:powderblue;'>El video no se ha podido borrar</p>");
    $video_id = $_GET['id'];
    
    //generar la consulta
    $sql = "DELETE FROM videos WHERE id = '$video_id'";
    //ejecutar la consulta
    mysqli_query($conx,$sql);
    $cont = mysqli_affected_rows($conx);
    
    if ($cont>0)
        $msg = MSG_EXITO;
    else
        $msg = MSG_FALLO;
    ;
    break;
    case 4; // Contador de videos
    $vid_id = $_GET['vid_id'];
    $vid_url = $_GET['vid_url'];
    $usu_id = $_SESSION['user_id'];
    contadorVistas($vid_id,$usu_id);
    header("Location:intranet2.php");
    exit;
    break;
}

header("Location:intranet2.php?msg=$msg");

// Funciones ***********************************************************

function insert($title, $vid_url) {
    // si todo ha ido bien
    $msg = 1;
    //generar la consulta: 
    $sql = "SELECT titulo FROM videos WHERE titulo = '$title'";
        
    //ejecutar la consulta
    require "../conection.php";
    $datos = mysqli_query($conx,$sql);
    
    if($fila = mysqli_fetch_assoc($datos) || $title == "" || $vid_url == "") {
        // El video ya existe o campos invalidos
        $msg = 0;
    }else {
        $sql_insert = "INSERT INTO videos (titulo, vid_url) VALUES ('$title','$vid_url')";
        mysqli_query($conx,$sql_insert);
        $id = mysqli_insert_id($conx);
        if($id <= 0){
            // No se ha podido insertar el video
            $msg = -1;  
        }
    }
    mysqli_close($conx);
    return $msg;
}
// Contador para guardar las vistas de las peliculas
function contadorVistas($vid_id,$usu_id) {
    $sql = "SELECT cont_vistas FROM usuarios_videos WHERE id_user= '$usu_id' AND id_video = '$vid_id'";
    require "../conection.php";
    $datos = mysqli_query($conx,$sql);
    // si nos nos devuelve algo continua, si no añade 1
    if($fila = mysqli_fetch_assoc($datos)) {
        $cont_vistas = $fila["cont_vistas"];
        $cont_vistas++;
        //ejecutar la consulta
        $sql_update = "UPDATE usuarios_videos SET cont_vistas = '$cont_vistas' WHERE id_user= '$usu_id' AND id_video = '$vid_id'";
        mysqli_query($conx,$sql_update);
        $cont = mysqli_affected_rows($conx);
        return ($cont > 0);
    } else {
        $sql_insert = "INSERT INTO usuarios_videos (id_user ,id_video, cont_vistas ) VALUES ('$usu_id','$vid_id',1)";
        mysqli_query($conx,$sql_insert);
        $id = mysqli_insert_id($conx);
    }
    return ($id > 0);
    mysqli_close($conx);
}
?>