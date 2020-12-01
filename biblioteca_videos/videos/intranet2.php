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
    <title>Galería videos</title>
</head>

<body>
    <?php include '../includes/menu.txt' ?>
    <div class="pure-g form-insert">
        <article class="pure-u-lg-10-24 pure-u-sm-1-1 no-move">
            <fieldset class="no-move">
                <legend class="title">Insertar video
                    <img src="../img/youtube.svg" width="100px" height="100">
                </legend>
                <form action=<?php echo "'controller.php?op=1'" ?> method="POST" class="pure-form pure-form-aligned">
                    <div class="pure-g">
                        <div class="pure-u-xl-6-24  pure-u-md-1-1">
                            <label for="titulo">Título</label>
                        </div>
                        <div class="pure-u-xl-18-24  pure-u-md-1-1">
                            <input type="text" name="titulo" id="titulo" class="input--large" required placeholder="video titulo">
                        </div>
                        <div class="pure-u-xl-6-24  pure-u-md-1-1">
                            <label for="url_vid">Url video</label>
                        </div>
                        <div class="pure-u-xl-18-24  pure-u-md-1-1">
                            <input type="text" name="url_vid" id="url_vid" class="input--large" required placeholder="o-h_183YQpc">
                        </div>
                    </div>
                    <button type="submit" class="main-color-button">Insertar</button>

                    <?php if (isset($_GET['msg'])) {
                        echo "
                        <div class='" . $_GET['msgConfirm'] . "l-box-lrg pure-g'>
                            <div class='pure-u-1 '>
                                <span class='content-head content-head-ribbon'>" . $_GET['msg'] . "</span>
                            </div>
                        </div>";
                    }
                    ?>

                </form>
            </fieldset>
        </article>

        <article class="pure-u-lg-14-24 pure-u-sm-1-1">
            <fieldset>
                <legend class="title">Biblioteca de videos
                    <img src="../img/youtube.svg" width="100px" height="100">
                </legend>
                <?php
                require "../conection.php";

                //generar la consulta
                $sql = "SELECT * FROM videos";

                //recogemos la consulta
                $datos = mysqli_query($conx, $sql);
                $vid_url = "";
                $user_id = $user;
                //mostramos la consulta
                while ($fila = mysqli_fetch_assoc($datos)) {
                    $id = $fila["id"];
                    $vid_url = $fila['vid_url'];
                    echo " <div class='pure-g'>
                    <div class='pure-u-24-24'>
                    <span class='title-video'> " . $fila['titulo'] . "</span>
                    </div>
                    <div class='pure-u-12-24'><img class='pure-img' src='https://img.youtube.com/vi/" . $vid_url . "/0.jpg' width= '200'/></div>
                    </div>
                    ";

                    echo " <div class='pure-g'>";
                    echo " <div class='pure-u-6-24'>
                    <a onclick='contView($user_id,$id)' id='linkView' class='main-color-button' href='https://www.youtube.com/watch?v=" . $vid_url . "' target='_blank'>Visitar</a></div>";
                    //TODO Comprobar la función de js showvideo la ruta 
                    echo "
                    <a href = './controller.php?op=4&vid_id=$id&vid_url=$vid_url' onclick=\"showVideo('$vid_url')\">
                                <div class='pure-u-6-24'>"
                        . $vid_url .
                        "</div>
                            </a>";
                    echo " <div class='pure-u-2-24 icons'>
                                <a href='../enlaces_interes/enlaces_vista.php?id=$id'><i class='fas fa-info-circle'></i></a></div>";
                    echo " <div class='pure-u-2-24 icons'>
                                <a href='update_video.php?id=$id'><i class='fas fa-edit'></i></a></div>";
                    echo " <div class='pure-u-2-24 icons'>
                                <a href='controller.php?id=$id&op=3' onclick = \"return confirm('¿Desea eliminar el video?')\"><i class='fas fa-trash-alt'></i></a></div>";
                    echo " </div>";
                }
                // cerramos conexión
                mysqli_close($conx);
                ?>
            </fieldset>
        </article>
    </div>
    <script>
        function showVideo(vid_url) {
            var url = "https://www.youtube.com/watch?v=" + vid_url;
            console.log(url);
            window.open(url, "_blank");
        }

        function contView(user_id, vid_id) {
            alert("user " + user_id + "video id " + vid_id);
            $.ajax({

                type: "GET",
                url: "http://localhost/Desarrollo-web-en-entorno-servidor/ejer_05_intranet/videos/ws_contar_visita.php?user_id=" + user_id + "&vid_id=" + vid_id,
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    alert(" Error");
                }
            });
        }
    </script>
</body>

</html>