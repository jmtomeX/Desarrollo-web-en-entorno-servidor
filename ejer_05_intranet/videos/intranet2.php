<?php
require '../global.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galería videos</title>
    <style>
        input[type ='text']{
        display: block;    
        } 
        a {
            margin: 10px;
            padding: 3px;
            text-decoration:none;
            color:white;
            background: black;
            display:inline-block;
        }
        a:hover {
            color:black;
            background: white;
        }

    </style>
</head>
<body>
<?php
    include '../menu.php';
    ?>
    <h2>Biblioteca de vídeos</h2>
    <?php 
    if (isset($_GET['msg'])) {
        echo "<p>".$_GET['msg']."</p>";
    }
    require "../conection.php";

    //generar la consulta
    $sql = "SELECT * FROM videos";

    //recogemos la consulta
    $datos = mysqli_query($conx,$sql);

    //mostramos la consulta
    while($fila = mysqli_fetch_assoc($datos)) {
        $id = $fila["id"];
    echo "Video: ".$fila["titulo"]." url: ".$fila["vid_url"]."</>
    <a href='delete_video.php?id=$id'>Borrar video</a> 
    <a href='update_video.php?id=$id'>Acualizar video</a> 
    <br>";
    }
    // cerramos conexión
    mysqli_close($conx);
    ?>   

    <form action="insertar_video.php" method="POST">
<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
} ?>
    <p><label for="reg_passw">Título</label><input type= "text" name="titulo" id="titulo"></p>
    <p><label for="reg_passw">Url video</label><input type= "text" name="url_vid" id="url_vid"></p>
    <input type="submit" value="Registro Video">
    </form>
</body>
</html>
    
</body>
</html>