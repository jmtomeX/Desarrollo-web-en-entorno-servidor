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
    <h2 class="title2">Has accedido a la biblioteca de videos</h2>
    <fieldset>
        <legend class="title">Lista de usuarios que han visualizado videos</legend>
        <?php
        if (isset($_GET['msg'])) {
            echo "
        <div class='ribbon l-box-lrg pure-g'>
        <div class='pure-u-1 pure-u-md-1-2 pure-u-lg-3-5'>
            <h2 class='content-head content-head-ribbon button-error'>" . $_GET['msg'] . "</h2>
        </div>
    </div>
";
        }
        require "../conection.php";

        //generar la consulta
        /*
$sql="SELECT usuarios.id,nombre, videos.titulo, usuarios_videos.cont_vistas FROM usuarios 
INNER JOIN usuarios_videos ON usuarios.id = usuarios_videos.id_user
INNER JOIN videos ON videos.id = usuarios_videos.id_video
where usuarios.id=1";
*/
        $sql = "SELECT id,nombre, date_insert,SUM(usuarios_videos.cont_vistas) AS contador FROM usuarios INNER JOIN usuarios_videos ON usuarios.id = usuarios_videos.id_user GROUP BY usuarios.id ";

        //recogemos la consulta
        $datos = mysqli_query($conx, $sql);
        echo "<div class='l-content'> 
        <div class='pricing-tables pure-g'>";
        //mostramos la consulta
        while ($fila = mysqli_fetch_assoc($datos)) {
            $id = $fila["id"];            // añdido 
            echo "


<div class='pure-u-1 pure-u-md-1-3'>
    <div class='pricing-table pricing-table-biz pricing-table-selected'>
            <div class='pricing-table-header'>
                <h2>Detalle Usuario</h2>
                <span class='pricing-table-price'>
                <a href='detalle.php?id=$id'><i class='far fa-eye'></i></a>
                " . $fila["contador"] . "
                    <span>" . $fila["nombre"] . "</span>
                </span>
            </div>

            <ul class='pricing-table-list'>
            <li> Identificador 
            " . $fila["id"] . "</li>
                <li>  <i class='fas fa-calendar-alt'></i> " . $fila["date_insert"] . "</li>
                <li> <a href='delete_user.php?id=$id' onclick = \"return confirm('¿Desea eliminar al usuario?')\"><i class='fas fa-trash-alt'></i>Borrar usuario</a></li>
            </ul>

            <a href='detalle.php?id=$id' class='button-choose pure-button'>Visitas de videos</a>
        </div>
    </div>
";
        }
        echo "</div>
        </div>
        ";
        // añdido 
        // cerramos conexión
        mysqli_close($conx);
        ?>
    </fieldset>

</body>

</html>