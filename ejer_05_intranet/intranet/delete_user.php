<?php
const MSG_EXITO = "Usuario borrado";
const MSG_FALLO = "Usuario no se ha podido borrar";
$user_id = $_GET['id'];

require "../conection.php";

//generar la consulta
$sql = "DELETE FROM usuarios WHERE id = '$user_id'";
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

header("Location:intranet.php?msg=$msg");