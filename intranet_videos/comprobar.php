<?php
session_start(); 
// conexion a la base de datos
require './conection.php';


$usuario = $_POST['user'];
$passw = $_POST['passw'];
//generar la consulta
$sql = "SELECT id FROM usuarios WHERE nombre = '$usuario' AND password = '$passw' ";

//recogemos la consulta
$datos = mysqli_query($conx,$sql);

//mostramos la consulta
$id = 0;
if($fila = mysqli_fetch_assoc($datos)) {
    $id = $fila["id"];
}
// cerramos conexión
mysqli_close($conx);

$message = "El usuario o contraseña son incorrectos";
if($id>0) {
    $_SESSION['user'] = $_POST['user'];
    header("Location:intranet/intranet.php");
}else{
    session_unset();
    header("Location:index.php?msg=$message");
}
?>