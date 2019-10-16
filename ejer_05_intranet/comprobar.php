<?php
session_start(); 
// conexion a la base de datos
$conx = mysqli_connect("localhost","root","","bd_intranet");
// comprobamos errores
if(!$conx) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//echo "Éxito: Se realizó una conexión apropiada a MySQL!" . PHP_EOL;
//echo "Información del host: " . mysqli_get_host_info($conx) . PHP_EOL;

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
    header("Location:intranet.php");
}else{
    session_unset();
    header("Location:index.php?msg=$message");
}
?>