<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_SESSION['max'])) {
        $_SESSION['max'] = 10;
    }
    if(!isset($_SESSION['min'])) {
        $_SESSION['min'] = 1;
    }
    if (!isset($_SESSION['cont'])) {
        $_SESSION['cont'] = 0;
    }
    if (!isset($_SESSION['points'])) {
        $_SESSION['points'] = 0;
    }
    $count = $_SESSION['cont'];
   
    $minNum = $_SESSION['min'];
    $maxNum = $_SESSION['max'];

    $points =  $_SESSION['points'];

    echo "El número está entre $minNum y $maxNum";
    echo "Puntos: $points";

    if (isset($_GET['cadena'])) {
        $cadena = $_GET['cadena'];
    }
   
   if (isset($_GET['msg'])) {
    if($_GET['msg']== -1) {
        echo "<h2>El número es menor</h2>";
        echo "<h2>Vas $count $cadena</h2>";
    }
    else if($_GET['msg'] == 0) {
        echo "<h2>El número es mayor</h2>";
        echo "<h2>Vas $count $cadena</h2>";
    }
   }
    
    
    ?>
    <form action="comprobar.php" method="post">
        <input type="number" name ="numberUser" id = "numberUser">
        <input type="submit" value="Comprobar">
    </form>

</body>
</html>