<?php require '../includes/globals.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require '../includes/headers.php';?>
    <title>Document</title>
</head>
<body>
<h1>ESTÁS DENTRO <?php echo $name ?></h1>
    <a href="#">Crear anuncio</a>
    <a href="./anuncios/controller.php?op=2">Listar anuncios</a>
    <a href="../usuarios/controller.php?op=3">Unlogin</a>
    <?php if (isset($_GET['msg'])) { ?>
    <p><?php echo $_GET['msg'] ?></p>
    <?php
     }?>

<h1>Crear anuncio</h1>
    <form action="../usuarios/controller.php?op=1" method="post">
        <label for="titulo">Titulo <br><input type="text" name="titulo" id="titulo"></label><br>
        <label for="descripcion">Descripción <br><input type="text" name="descripcion" id="descripcion"></label><br>
        <label for="precio">precio <br><input type="number" name="precio" id="precio"></label><br>
        <label for="foto">Foto <br><input type="file" name="foto" id="foto"></label><br>
        <button type="submit">Subir</button>
    </form>
</body>
</html>