<?php
// conexion a la base de datos
$conx = mysqli_connect("127.0.0.1:3325","root","","bd_intranet");
//biblioteca_videos
// comprobamos errores
if(!$conx) {
    echo "<h1>Error: No se pudo conectar a MySQL.</h1>" . PHP_EOL . "\n";
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>