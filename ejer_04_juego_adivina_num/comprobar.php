<?php
session_start(); 
if(strlen($_POST['numberUser'])<=0) {
    header("Location:index.php");
    exit;
}
if (!isset($_SESSION['numberMachine'])) {
    $_SESSION['numberMachine'] = rand(1,5);
}
if (!isset($_SESSION['cont'])) {
    $_SESSION['cont'] = 0;
}
if (!isset($_SESSION['points'])) {
    $_SESSION['points'] = 0;
}
$number = $_SESSION['numberMachine'];
$count = $_SESSION['cont'];
$count +=  1 ;
$_SESSION['cont'] = $count;
$points = $_SESSION['points'];

//echo $number."-".$count;
$cadena ="intentos";
if($count <= 1) {
 $cadena == "intento";
}
// mensaje -> acierto
$message = 1;
// Comprobamos juego
if($number == $_POST['numberUser']) {
    echo "<h2>Has acertado con $count $cadena</h2>";
    if($count < 5) {
        switch($count) {
            case 1: $points += 10;
            break;
            case 2: $points += 5;
            break;
            case 3: $points += 1;
            break;
        }
        $_SESSION['points'] = $points;
        echo "<a href='index.php'>Jugar otra</a>";
    }
    // está se carga todas las variables de sesión
    //session_unset();
    unset($_POST['numberUser'], $_SESSION['numberMachine'], $_SESSION['cont']);
    
    exit;
}else if($number < $_POST['numberUser']) {
    $message = -1;
    $_SESSION['max'] = $_POST['numberUser'];
    //echo "<h2>El número es menor</h2>";
    //echo "<h2>Vas $count $cadena</h2>";
}else {
    $message = 0;
    $_SESSION['min'] = $_POST['numberUser'];
    //echo "<h2>El número es mayor</h2>";
    //echo "<h2>Vas $count $cadena</h2>";
}
if($count == 4) {
        echo "<h1 style = 'color:red'>Juego terminado</h1>";
        session_unset();
}else {
//echo "<a href='index.php'>Seguir jugando</a>";
header("Location:index.php?msg=$message&count=$count&cadena=$cadena");
}
?>