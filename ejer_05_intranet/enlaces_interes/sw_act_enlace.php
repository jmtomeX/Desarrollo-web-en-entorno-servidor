<?php
$cont=0;
$id_enlace = $_POST['id_enlace'];
$titulo_enlace = $_POST['titulo_enlace'];
$url_enlace = $_POST['url_enlace'];

$sql = "UPDATE enlaces_videos SET enl_url = '$url_enlace', enl_titulo = '$titulo_enlace' WHERE enl_id = '$id_enlace'";
//echo $sql;exit;
require "../conection.php";
mysqli_query($conx,$sql);
$cont = mysqli_affected_rows($conx);
mysqli_close($conx);
echo $cont;
?>