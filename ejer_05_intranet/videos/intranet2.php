<?php
require '../global.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include '../includes/enlaces.txt'?>
    <title>Galería videos</title>
</head>
<body>
<?php include '../includes/menu.txt'?>
<div class="pure-g">
<article class="pure-u-md-2-5">
<fieldset>
<legend class="title">Insertar video</legend>   
<form action="controller.php?op=1" method="POST" class="pure-form box--flex">
<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
} ?>

    <p><label for="titulo">Título</label><input type= "text" name="titulo" id="titulo" class="input--large"></p>
    <p><label for="url_vid">Url video</label><input type= "text" name="url_vid" id="url_vid" class="input--large"></p>

    <p><label for="reg_passw">Título</label><input type= "text" name="titulo" id="titulo" class="input--large"></p>
    <p><label for="reg_passw">Url video</label><input type= "text" name="url_vid" id="url_vid" class="input--large"></p>
    <br>
    <br><br>
    <input type="submit" value="Registro Video" class="pure-button pure-button-primary margin">
    <?php   if (isset($_GET['msg'])) {
        echo "<p>".$_GET['msg']."</p>";
    }
    ?>
    </form>
</fieldset>
</article>

<article class="pure-u-md-3-5">
<fieldset>
        <legend class="title">Biblioteca de videos</legend>
    <?php 
    require "../conection.php";

    //generar la consulta
    $sql = "SELECT * FROM videos";

    //recogemos la consulta
    $datos = mysqli_query($conx,$sql);
    $vid_url ="";
    $user_id = 1;
    //mostramos la consulta
    while($fila = mysqli_fetch_assoc($datos)) {
        $id = $fila["id"];
    //echo "Video: ".$fila["titulo"]." url: ".$fila["vid_url"]."<br>";
    $vid_url = $fila['vid_url'];
    echo "<h3><i class='fas fa-video'></i> ".$fila['titulo']."</h3>";
    echo "<a onclick='contView($user_id,$id)' id='linkView' class='pure-button pure-button-primary' href='https://www.youtube.com/watch?v=".$vid_url."' target='_blank'>Visitar</a>";
    echo "<a href = './controller.php?op=4&vid_id=$id&vid_url=$vid_url' onclick=\"showVideo('$vid_url')\">".$vid_url."</a><div src='".$vid_url."'>";
    echo "<a href='delete_video.php?id=$id'></a>";

    echo "<img src='https://img.youtube.com/vi/".$vid_url."/0.jpg' width= '200'/>";
    echo "<a href='controller.php?id=$id&op=3' onclick = \"return confirm('¿Desea eliminar?')\"><i class='fas fa-trash-alt'></i></a>";

    echo "<a href='update_video.php?id=$id'><i class='fas fa-edit'></i></a>";
    echo "<a href='../enlaces_interes/enlaces_vista.php?id=$id'><i class='fas fa-info-circle'></i></a></div><br>";
    }
    // cerramos conexión
    mysqli_close($conx);
    ?>   
    </fieldset>
    </article>
<script>
    function showVideo(vid_url) {
        var url = "https://www.youtube.com/watch?v=" + vid_url;
        console.log(url);
        window.open(url,"_blank");
    }

 function contView(user_id,vid_id) {
    $.ajax({

         type: "GET",
         url: "http://localhost/Desarrollo-web-en-entorno-servidor/ejer_05_intranet/videos/ws_contar_visita.php?user_id="+user_id+"&vid_id="+vid_id,
         success: function (data) {
             console.log(data);
         },
         error: function (data) {
             alert(" Error");
         }
     });
}
 </script>
</body>
</html>