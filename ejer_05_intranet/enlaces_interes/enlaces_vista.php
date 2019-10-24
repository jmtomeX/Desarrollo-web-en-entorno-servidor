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
    <title>Galería de video</title>
</head>
<body>
<?php
    include '../includes/menu.txt';
    ?>
     <fieldset>
        <legend class="title">Enlaces de interes</legend>
        <form action="controler.php?op=1" method="POST" class="pure-form box--flex">
<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
} 
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
    $sql = "SELECT titulo FROM videos order by titulo Asc";
}

?>
    <p><label for="titulo_enlace">Título del enlace</label><input type= "text" name="titulo_enlace" id="titulo_enlace"  value="" class="input--large"></p>
    <p><label for="enlace">Url enlace</label><input type= "text" name="enlace" id="enlace" value="" class="input--large"></p>
    <p><label for="enlaces">Video</label><input type= "text" name="enlace" id="enlace" class="input--large" value="<?php echo  $titulo;?>" disabled></p>
    
</p>
    <br><br>
    <input type="submit" value="Registro Enlace" class="pure-button pure-button-primary margin">
    </form>
</fieldset>
    
    
</body>
</html>