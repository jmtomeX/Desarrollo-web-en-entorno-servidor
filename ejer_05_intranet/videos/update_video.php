<?php
require '../global.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    include '../menu.php';
    require "../conection.php";
//generar la consulta: si existe el usuario
$id = $_GET['id'];
$sql = "SELECT * FROM videos WHERE id = '$id'";

//ejecutar la consulta
$datos = mysqli_query($conx,$sql);
$fila = mysqli_fetch_assoc($datos);   
    ?>
    <h2>Modificar video</h2>

<form action="update.php" method="POST">
<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
} ?>
    <p><label for="reg_passw">Título</label><input type= "text" name="titulo" id="titulo" value="<?php echo $fila['titulo'] ?>"></p>
    <p><label for="reg_passw">Url video</label><input type= "text" name="url_vid" id="url_vid" value="<?php echo $fila['vid_url'] ?>"></p>
    <input type="submit" value="Actualizar Video">
    </form>
    <?php mysqli_close($conx); ?>
</body>
</html>