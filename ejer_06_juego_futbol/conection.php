<?php
// conexion a la base de datos
//$conx = mysqli_connect("localhost","root","","bd_goool.es");
$conx = mysqli_connect("servidor5.wesped.com","muchorui_jm_projects","Gz$9Ornqbe3v%yEx","muchorui_goool.es");
//$conx = mysqli_connect("mysql.bymhost.com","jm_cebanc","apuestas2019","apuestas");

// comprobamos errores
if(!$conx) {
    echo "<h1>Error: No se pudo conectar a MySQL.</h1>" . PHP_EOL . "\n";
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>