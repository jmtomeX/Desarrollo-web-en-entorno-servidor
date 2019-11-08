<?php
// conexion a la base de datos
//$conx = mysqli_connect("localhost","root","","bd_goool.es");
$conx = mysqli_connect("mysql.bymhost.com","jm_cebanc","apuestas2019","apuestas");

// comprobamos errores
if(!$conx) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>