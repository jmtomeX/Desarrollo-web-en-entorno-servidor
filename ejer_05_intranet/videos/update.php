<?php
session_start(); 
const MSG_EXITO = "Video modeficado";
const MSG_FALLO = "El video no se ha podido modificar";

$reg_titulo = $_POST['this-title'];
$reg_url = $_POST['this-url'];
$video_id = $_SESSION['id'];
require "../conection.php";

//generar la consulta
//$sql = "UPDATE FROM videos WHERE id = '$video_id'";
$sql = "UPDATE videos SET titulo = '$reg_titulo' WHERE id = '$video_id'";

//ejecutar la consulta
mysqli_query($conx,$sql);
$cont = mysqli_affected_rows($conx);

echo $cont;
if ($cont>0){
    $msg = MSG_EXITO;
}else{
    $msg = MSG_FALLO;
}

header("Location:intranet2.php?msg=$msg");

// cerramos conexión
mysqli_close($conx);
?>