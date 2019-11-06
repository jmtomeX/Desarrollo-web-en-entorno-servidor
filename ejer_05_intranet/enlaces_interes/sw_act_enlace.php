<?php
$cont=0;
$id_enlace = $_POST['id_enlace'];
$titulo_enlace = $_POST['titulo_enlace'];
$url_enlace = $_POST['url_enlace'];

$sql = "UPDATE enlaces_videos SET enl_url = '$url_enlace', enl_titulo = '$titulo_enlace' WHERE enl_id = '$id_enlace'";
require "../conection.php";
mysqli_query($conx,$sql);
$cont = mysqli_affected_rows($conx);
mysqli_close($conx);
$res = $cont;
if($cont > 0){
 $msg = "Actualizado con exito";
}else{
    $msg = "No actualizado";
}
header('Content-Type: application/json');
//Guardamos los datos en un array
$data = array(
'res' => $res, 
'msg' => $msg
);
//Devolvemos el array pasado a JSON como objeto

echo json_encode($data);
?>