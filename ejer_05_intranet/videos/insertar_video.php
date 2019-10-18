<?php
$reg_titulo = $_POST['titulo'];
$reg_url = $_POST['url_vid'];
$message ="El video ya existe, selecciona otro diferente a \"$reg_titulo\" <br>O los campos son inválidos";
$message_exito = "Registro con éxito";
require "../conection.php";
//generar la consulta: si existe el usuario
$sql = "SELECT titulo FROM videos WHERE nombre = '$reg_titulo'";

//ejecutar la consulta
$datos = mysqli_query($conx,$sql);

if($fila = mysqli_fetch_assoc($datos) || $reg_titulo== "" || $reg_url == "") {
    header("Location:intranet2.php?msg=$message");
}else {
    $sql_insert = "INSERT INTO videos (titulo, vid_url) VALUES ('$reg_titulo','$reg_url')";
    mysqli_query($conx,$sql_insert);
    $id = mysqli_insert_id($conx);
    if($id > 0){
        header("Location:intranet2.php?msg=$message_exito");
    }
}
// cerramos conexión
mysqli_close($conx);
?>