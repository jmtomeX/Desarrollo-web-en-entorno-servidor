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

        for($i = 0; $i <4; $i++) {
             $lista[$i] = rand(1, 100);
        }
        for($i = 0; $i < count($lista); $i++) {
             echo "<td>$lista[$i]</td>";
        }
        ?>   
        </tr>
    </table>
</body>

</html>