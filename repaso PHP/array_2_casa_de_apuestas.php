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
        $lista = array();
        $min = 1;
        $max = 5;
        $saldo = 0;
        for($i = 0; $i <4; $i++) {
             $lista[$i] = rand($min, $max);
        }
        for($i = 0; $i < count($lista); $i++) {
             echo "<td>$lista[$i]</td>";
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
            case 2: $saldo+=3;
            break;
            case 3: $saldo+=10;
            break;
            case 4: $saldo+=100;
            break;
        }
       }
       if ($saldo<=0) $saldo= -10;

       var_dump($contador_num);
       echo "<br> Tu saldo es $saldo"
        ?>   
        </tr>
    </table>
</body>

</html>