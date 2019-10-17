<?php
require 'global.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intranet</title>
</head>
<body>
<?php
    include 'menu.php';
    ?>
    <h2>Has accedido a Intranet</h2>
    <?php 
require "conection.php";

//generar la consulta
$sql = "SELECT * FROM usuarios";

//recogemos la consulta
$datos = mysqli_query($conx,$sql);

//mostramos la consulta
while($fila = mysqli_fetch_assoc($datos)) {
    $id = $fila["id"];
   echo "Usuario: ".$fila["nombre"]." id: ".$fila["id"]."</>
   <a href='delete_user.php?id= $id '>Borrar</a>
   <br>";
}
// cerramos conexión
mysqli_close($conx);
    ?>
</body>
</html>