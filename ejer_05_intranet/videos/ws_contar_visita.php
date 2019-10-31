<?php

$cont_vistas = 1;
$result = 0;

$usu_id = $_GET['user_id'];
$vid_id = $_GET['vid_id'];

 $sql = "SELECT cont_vistas FROM usuarios_videos WHERE id_user= '$usu_id' AND id_video = '$vid_id'";

 require "../conection.php";
 $datos = mysqli_query($conx,$sql);
 // si nos nos devuelve algo continua, si no añade 1
 if($fila = mysqli_fetch_assoc($datos)) {
     $cont_vistas = $fila["cont_vistas"];
     $cont_vistas++;
     //ejecutar la consulta
     $sql_update = "UPDATE usuarios_videos SET cont_vistas = $cont_vistas WHERE id_user= '$usu_id' AND id_video = '$vid_id'";
     mysqli_query($conx,$sql_update);
     $result = mysqli_affected_rows($conx);
 } else {
     $sql_insert = "INSERT INTO usuarios_videos (id_user ,id_video, cont_vistas ) VALUES ('$usu_id','$vid_id',$cont_vistas)";
     mysqli_query($conx,$sql_insert);
     $result = mysqli_affected_rows($conx);
 }
mysqli_close($conx);
if ($result>0)
 echo $cont_vistas;
 else
echo -1;
?>