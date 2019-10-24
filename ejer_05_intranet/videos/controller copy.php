<?php
session_start(); 
require "../conection.php";
$operation = $_GET["op"];
$msg = "Operacion desconocido";
switch ($operation) {
    case 1: // Insert **************************************************************
    $reg_titulo = $_POST['titulo'];
    $reg_url = $_POST['url_vid'];
    $message_fallo_insert ="El video ya existe, selecciona otro diferente a \"$reg_titulo\" <br>O los campos son inválidos";
    $message_exito = "Registro con éxito";
    //generar la consulta: si existe el usuario
    $sql = "SELECT titulo FROM videos WHERE nombre = '$reg_titulo'";
    
    //ejecutar la consulta
    $datos = mysqli_query($conx,$sql);
    
    if($fila = mysqli_fetch_assoc($datos) || $reg_titulo== "" || $reg_url == "") {
        $msg = $message_fallo_insert;
    }else {
        $sql_insert = "INSERT INTO videos (titulo, vid_url) VALUES ('$reg_titulo','$reg_url')";
        mysqli_query($conx,$sql_insert);
        $id = mysqli_insert_id($conx);
        if($id > 0){
            $msg = $message_fallo_insert;
        }
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
    echo $sql;
    //ejecutar la consulta
    mysqli_query($conx,$sql);
    $cont = mysqli_affected_rows($conx);
    
    if ($cont>0)
        $msg = MSG_EXITO;
    else
        $msg = MSG_FALLO;
    ;
    break;
}

mysqli_close($conx);
header("Location:intranet2.php?msg=$msg");
?>