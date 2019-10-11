<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="post" action="respuesta.php">
        <label for="filas">Insertar filas </label><input type="text" name="filas"><br>
        <label for="filas">Insetar columnas </label><input type="text" name="columnas"><br>

        <input type="submit" value="Enviar" />
    </form>


    <br/> Javascript:
    <br/>
    <form method="get" action="respuesta.php">
        <label for="filas">Insertar filas </label><input type="text" name="filas1"><br>
        <label for="filas">Insetar columnas </label><input type="text" name="columnas1"><br>

        <input type="button" value="Enviar" onclick="this.form.submit()" />
    </form>
    <?php
    $filas1 = $num_aleatorio = rand(1, 10);
    $columnas = $num_aleatorio = rand(1, 10);
    ?>
    <a href="respuesta.php?filas=<?php echo $filas1;?>&columnas=<?php echo $columnas;?>">Crear tabla</a>
    <?php
    echo "<a href='respuesta.php?filas=$filas1&columnas=$columnas'>Crear tabla</a>";
   
   
    ?>

    <table border="1px">
        <tr width= "220px">
        <?php
        for($i = 0; $i <4; $i++) {
             $num = rand(1, 100);
             echo "<td>$num</td>";
        }
        ?>   
        </tr>
    </table>
</body>

</html>