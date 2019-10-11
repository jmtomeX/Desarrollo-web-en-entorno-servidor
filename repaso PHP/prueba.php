<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>
<?php 
$time = time();
echo date("d-m-Y (H:i:s)", $time);
echo "<br>";
// FEcha y hora
$fecha_actual = date("Y-m-d");
$hora_actual = date("H:i:s");
echo "Fecha $fecha_actual<br>";
echo "Hora $hora_actual <br>";
$hora = date("H");
if($hora < 17){
    echo "Buenas dias";
}else {
    echo "Buenas tardes";
}
echo "<br>";

// Número aleatorio
$num_aleatorio = rand(1, 10);
//var_dump($num_aleatorio);

echo "<br>";
if($num_aleatorio%2==0){
    echo "$num_aleatorio Es par";
}else{
    echo "$num_aleatorio Es impar";
}
echo "<br>";
// switch
$num_aleatorio = rand(1, 4);
switch($num_aleatorio) {
    case 1: echo "Enero";
    break;
    case 2: echo "Febrero";
    break;
    case 3: echo "Marzo";
    break;
    case 4: echo "Abril";
    break;
}
echo "<br>";
// Bucles
for($i = 0; $i < $num_aleatorio; $i++){
    echo "Numero $i<br>";
}
echo "Del revés <br>";
for($i = $num_aleatorio; $i > 0; $i--){
    echo "Numero $i<br>";
}
// While
echo "Bucle while ascendente <br>";
$cont = 1;
while($num_aleatorio >= $cont) {
    echo "Numero $cont<br>";
    $cont++;
}
echo "Bucle while descendente <br>";
$cont = $num_aleatorio;
while($cont > 0) {
    echo "Numero $cont<br>";
    $cont--;
}

?>
</h1>

</body>
</html>