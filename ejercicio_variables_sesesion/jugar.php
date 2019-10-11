
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
    <title>Document</title>
</head>

<body>
    <table border="1px">
        <tr width= "220px">
        <?php
        // si no hay saldo vuelve a index
        if ($_SESSION["saldo"] <= 10) {
            header ("Location: index.php");
            exit;
        }

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

        // descontamos 10 por tirada
        $_SESSION['saldo'] -= 10;

       var_dump($contador_num);
       $saldo = $_SESSION['saldo'];
       echo "<br> En esta partida el valor es $premio";
       echo "<br> Tu saldo es  $saldo";
        ?>   
        </tr>
    </table>
    <form action="index.php" method="post">
    <input type="button" value = "Jugar" onclick =" window.location = 'jugar.php'">
    </form>
</body>

</html>