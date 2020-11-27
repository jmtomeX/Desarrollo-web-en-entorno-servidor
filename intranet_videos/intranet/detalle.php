<?php
require '../global.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include '../includes/enlaces.txt' ?>
    <title>Intranet</title>
</head>

<body>
    <div class="pure-g main">
        <article class="pure-u-md-1">
            <?php include '../includes/menu.txt' ?>
        </article>
    </div>
    <fieldset>
        <legend class="title">Detalle películas vistas</legend>
        <?php
        if (isset($_GET['msg'])) {
            echo "<p>" . $_GET['msg'] . "</p>";
        }
        require "../conection.php";
        $id = $_GET['id'];
        //generar la consulta
        $sql = "SELECT  id_video,nombre , usuarios_videos.cont_vistas AS vistas FROM usuarios INNER JOIN usuarios_videos ON usuarios.id = usuarios_videos.id_user WHERE usuarios_videos.id_user= '$id' ";
        //echo $sql;exit;
        //recogemos la consulta
        $datos = mysqli_query($conx, $sql);

        //mostramos la consulta
        while ($fila = mysqli_fetch_assoc($datos)) {
            $id_video = $fila['id_video'];

            $sqlVideos = "SELECT titulo FROM videos WHERE id = '$id_video'";
            //recogemos la consulta
            $datos2 = mysqli_query($conx, $sqlVideos);

            if ($fila_video = mysqli_fetch_assoc($datos2)) {
                $titulo = $fila_video['titulo'];
            }

            echo "
                <div class='pure-u-1'>
                <div class='pure-u-md-5-24'><i class='fas fa-user'></i>
                " . $fila["nombre"] . "
                </div>
                <div class='pure-u-md-5-24'>
                " . $titulo . "
                <i class='fab fa-youtube'></i>
                </div>
                <div class='pure-u-md-5-24'><i class='far fa-eye'></i>
                " . $fila["vistas"] . " 
                    vistas
                </div>
                </div>";
        }
        // cerramos conexión
        mysqli_close($conx);
        ?>
    </fieldset>

</body>

</html>