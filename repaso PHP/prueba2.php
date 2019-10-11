<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border= "1">
    <?php 
    $cont = 0;
    $filas = rand(1, 10);
    $columnas = rand(1, 10);
    for($i = 0; $i < $filas; $i++){
        echo "<tr>";
        for($j = 0; $j < $columnas; $j++){
            $cont++;
        echo "<td>  $cont </td>";
        }
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>