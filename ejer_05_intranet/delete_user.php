<?php
$user_id = $_GET['id'];
$message_exito = "Usuario borrado";

require "conection.php";

//generar la consulta
$sql = "DELETE FROM usuarios WHERE id = '$user_id'";
echo $sql;
//ejecutar la consulta
mysqli_query($conx,$sql);

header("Location:intranet.php?msg=$message_exito");

// cerramos conexión
mysqli_close($conx);