<?php
const MSG_EXITO = "<p style='background-color:powderblue;'>El video  se ha borrado</p>";
const MSG_FALLO = "<p style='background-color:powderblue;'>El video no se ha podido borrar</p>";
$video_id = $_GET['id'];
require "../conection.php";

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
// cerramos conexión
mysqli_close($conx);

header("Location:intranet2.php?msg=$msg");