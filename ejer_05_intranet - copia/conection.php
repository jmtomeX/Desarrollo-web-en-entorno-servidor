<?php
// conexion a la base de datos
//$conx = mysqli_connect("localhost","root","26Ab3sT0","bd_intranet");
$conx = mysqli_connect("localhost","root","","bd_intranet");
// comprobamos errores
if(!$conx) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>