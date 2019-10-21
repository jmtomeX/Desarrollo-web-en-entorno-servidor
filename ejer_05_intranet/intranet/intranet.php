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
    <title>Intranet</title>
</head>
<body>
<div class="pure-g main">
<article class="pure-u-md-1">
<?php include '../includes/menu.txt'?>
</article>
</div>
    <h2 class="title2">Has accedido a Intranet</h2>
    <fieldset>
        <legend class="title">Lista de usuarios</legend>
        <?php 
    if (isset($_GET['msg'])) {
        echo "<p>".$_GET['msg']."</p>";
    }
require "../conection.php";

//generar la consulta
$sql = "SELECT * FROM usuarios";

//recogemos la consulta
$datos = mysqli_query($conx,$sql);

//mostramos la consulta
while($fila = mysqli_fetch_assoc($datos)) {
    $id = $fila["id"];
   echo "
   <div class='pure-u-1'>
   <div class='pure-u-md-5-24'><i class='fas fa-user'></i>
   ".$fila["nombre"]."
   </div>
   <div class='pure-u-md-5-24'>id: 
   ".$fila["id"]."
   <a href='delete_user.php?id=$id'><i class='fas fa-trash-alt'></i></a>
   </div>
   <div class='pure-u-md-5-24'><i class='fas fa-calendar-alt'></i>
   ".$fila["date_insert"]."
   </div>
   </div>";
}
// cerramos conexión
mysqli_close($conx);
    ?>
</fieldset>
   
</body>
</html>