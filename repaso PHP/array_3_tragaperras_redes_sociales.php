
<?php
session_start();
if (!isset($_SESSION['saldo'])) {
  $_SESSION['saldo'] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tragaperras</title>
</head>

<body>
    <table border="1px">
        <tr width= "220px">
        <?php
        $lista = array();
        $min = 1;
        $max = 5;
        $premio = 0;
        for($i = 0; $i <4; $i++) {
             $lista[$i] = rand($min, $max);
        }
        for($i = 0; $i < count($lista); $i++) {
             echo "<td><img src= './/img//$lista[$i].jpg'></td>";
        }
        // comprobamos si hay iguales
        $contador_num = array();
            // inicializamos el array contador a 0
            for($i = $min; $i <= $max; $i++) {
                $contador_num[$i] = 0;
            }

            for($i = 0; $i < count($lista); $i++) {
            $contador_num[$lista[$i]]++;     
       }
       // comprobamos premios
       for($i = $min; $i <= $max; $i++){
        switch($contador_num[$i]){
            case 2:  $premio+=3;
            break;
            case 3:  $premio+=10;
            break;
            case 4:  $premio+=100;
            break;
        }
       }
       if ( $premio<=0) $premio = -10;
       $_SESSION['saldo'] += $premio;
       var_dump($contador_num);
       $saldo = $_SESSION['saldo'];
       echo "<br> En esta partida el valor es $premio";
       echo "<br> Tu saldo es  $saldo";
        ?>   
        </tr>
    </table>
</body>

</html>