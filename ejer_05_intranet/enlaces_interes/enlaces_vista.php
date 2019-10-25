<?php
require '../global.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 
require "../conection.php";
if ($id>0) {
    $sql = "SELECT titulo FROM videos WHERE id = '$id'";
    $datos = mysqli_query($conx,$sql);
    if($fila = mysqli_fetch_assoc($datos)) {
        $titulo = $fila["titulo"];
    }
} else {
    $sql = "SELECT id,titulo FROM videos order by titulo Asc";
    $datos = mysqli_query($conx,$sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include '../includes/enlaces.txt'?>
    <title>Galería de video</title>
</head>
<body>
<?php
    include '../includes/menu.txt';
    ?>
   <div class="pure-g">
<article class="pure-u-md-2-5">
<fieldset>
        <legend class="title">Insertar enlaces de interes</legend>
        <form action="./controler.php?op=1" method="POST" class="pure-form box--flex">
        <?php if ($id>0) { ?>
        <input type="hidden" name="video_id" value="<?php echo $id; ?>"/>
        <?php }
        if (isset($_GET['msg'])) echo $_GET['msg'];      
        ?>

    <p><label for="titulo_enlace">Título del enlace</label><input type= "text" name="titulo_enlace" id="titulo_enlace"  value="" class="input--large"></p>
    <p><label for="enlace">Url enlace</label><input type= "text" name="enlace" id="enlace" value="" class="input--large"></p>
    <p><label for="enlaces">Video</label>
    <?php if ($id>0) { ?>
    <input type= "text" class="input--large" value="<?php echo  $titulo;?>" disabled></p>
    <?php } else {  ?>
    <select class="input--large" name="video_id">
        <?php 
        // insertar los titulos 
        while ($fila = mysqli_fetch_assoc($datos)) {
            $vid_id = $fila["id"];
            $vid_titulo = $fila["titulo"];  ?>
            <option value="<?php echo $vid_id; ?>"><?php echo $vid_titulo; ?></option>
        <?php } ?>
    </select>
    <?php }  ?>
</p>
    <br>
    <br>
    <input type="submit" value="Registro Enlace" class="pure-button pure-button-primary margin">
    </form>
</fieldset>
</article>

<article class="pure-u-md-3-5">
<fieldset>
        <legend class="title">Enlaces de interes</legend>
                <?php
                    $sql = "SELECT * FROM enlaces_videos WHERE enl_video_id = '$id'";
                    require "../conection.php";
                    $datos = mysqli_query($conx,$sql);
                    echo "<ul>";
                    while($linea = mysqli_fetch_assoc($datos)){
                        //enl_id	enl_titulo	enl_url	
                       $enl_id = $linea['enl_id'];
                       $enl_titulo = $linea['enl_titulo'];
                       $enl_url = $linea['enl_url'];
                      echo "<li><a href='$enl_url' target='_blank'>$enl_titulo</a></li>
                      <a href='delete_video.php?id=$id'><i class='fas fa-trash-alt'></i></a></a> ";
                     
                     
                    };
                    echo "</ul>";
                ?>
        </fieldset>
</article>
    
    
</body>
</html>