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
<<<<<<< HEAD

=======
>>>>>>> 0369c76bae74cdacc42954c1ea576b682ba84b73
</head>
<body>
<?php include '../includes/menu.txt'?>
<div class="pure-g">
<article class="pure-u-md-2-5">
<fieldset>
<legend class="title">Insertar video</legend>   
<<<<<<< HEAD
<form action="insertar_video.php" method="POST" class="pure-form box--flex">
=======
<form action="controller.php?op=1" method="POST" class="pure-form box--flex">
>>>>>>> 0369c76bae74cdacc42954c1ea576b682ba84b73
<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
} ?>
    <p><label for="reg_passw">Título</label><input type= "text" name="titulo" id="titulo" class="input--large"></p>
    <p><label for="reg_passw">Url video</label><input type= "text" name="url_vid" id="url_vid" class="input--large"></p>
<<<<<<< HEAD
    <br>
=======
    <br><br>
>>>>>>> 0369c76bae74cdacc42954c1ea576b682ba84b73
    <input type="submit" value="Registro Video" class="pure-button pure-button-primary margin">
    <?php   if (isset($_GET['msg'])) {
        echo "<p>".$_GET['msg']."</p>";
    }
    ?>
    </form>
</fieldset>
</article>
<<<<<<< HEAD


=======
>>>>>>> 0369c76bae74cdacc42954c1ea576b682ba84b73
<article class="pure-u-md-3-5">
<fieldset>
        <legend class="title">Biblioteca de videos</legend>
    <?php 
    require "../conection.php";

    //generar la consulta
    $sql = "SELECT * FROM videos";

    //recogemos la consulta
    $datos = mysqli_query($conx,$sql);

    //mostramos la consulta
    while($fila = mysqli_fetch_assoc($datos)) {
        $id = $fila["id"];
    //echo "Video: ".$fila["titulo"]." url: ".$fila["vid_url"]."<br>";
    echo "<h3><i class='fas fa-video'></i> ".$fila["titulo"]."</h3>".$fila["vid_url"]."<div src='".$fila['vid_url']."'>
<<<<<<< HEAD
    <a href='delete_video.php?id=$id'><i class='fas fa-trash-alt'></i></a></a> 
=======
    <img src='https://img.youtube.com/vi/". $fila['vid_url'] ."/0.jpg' width= '200'/>
    <a href='controller.php?id=$id&op=3' onclick = \"return confirm('¿Desea eliminar?')\"><i class='fas fa-trash-alt'></i></a> 
>>>>>>> 0369c76bae74cdacc42954c1ea576b682ba84b73
    <a href='update_video.php?id=$id'><i class='fas fa-edit'></i></a> </div>
    <br>";
    }
    // cerramos conexión
    mysqli_close($conx);
    ?>   
    </fieldset>
    </article>
<<<<<<< HEAD
</body>
</html>
    
=======
>>>>>>> 0369c76bae74cdacc42954c1ea576b682ba84b73
</body>
</html>