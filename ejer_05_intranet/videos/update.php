<?php
const MSG_EXITO = "Video modeficado";
const MSG_FALLO = "El video no se ha podido modeficar";

$reg_titulo = $_POST['titulo'];
$reg_url = $_POST['url_vid'];
$video_id = $_GET['id'];

require "../conection.php";

//generar la consulta
$sql = "UPDATE FROM videos WHERE id = '$video_id'";
$sql = "UPDATE videos SET titulo = '$reg_titulo', vid_url= $reg_url  WHERE id = '$video_id'";
"
echo $sql;
//ejecutar la consulta
mysqli_query($conx,$sql);
$cont = mysqli_affected_rows($conx);

if ($cont>0)
    $msg = MSG_EXITO;
else
    $msg = MSG_FALLO;
// cerramos conexión
mysqli_close($conx);

header("Location:update_video.php?msg=$msg");

?>