<?php
require '../global.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include '../includes/enlaces.txt';
    ?>
    <title>Modificar video</title>
</head>
<body>
<div class="pure-g">
<article class="pure-u-1">
<?php include '../includes/menu.txt'?>
</article>
</div>
    <fieldset>
        <legend class="title">Actualizar video</legend>
<?php
    require "../conection.php";
    if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = $_GET['id'];
    }
    //$id = $_GET['id'];
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM videos WHERE id = '$id'";

    //ejecutar la consulta
    $datos = mysqli_query($conx,$sql);
    $fila = mysqli_fetch_assoc($datos);   
?>

<form action="update.php?id=$id" method="POST" class="pure-form">
<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
} ?>
    <p><label for="titulo">Título</label><input type= "text" name="this-title" id="this-title" value="<?php echo $fila['titulo'] ?>" class="input--large"></p>
    <p><label for="url_vid">Url video</label><input type= "text" name="this-url" id="this-url" class="input--large" value="<?php echo $fila['vid_url'] ?>"></p>
    <input type="submit" value="Actualizar Video" class="pure-button pure-button-primary margin">
    </form>
    <?php mysqli_close($conx); ?>
    <?php echo "<p>Id del video ha modificar ". $id."</p>";?>
</body>
</html>