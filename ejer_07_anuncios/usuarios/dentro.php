<!DOCTYPE html>
<html lang="en">
<?php
require '../includes/globals.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require '../includes/headers.php';?>
    <title>Document</title>
</head>

<body>
    <h1>ESTÁS DENTRO <?php echo $name ?></h1>
    <a href="./anuncios/controller.php?op=1">Crear anuncio</a>
    <a href="./anuncios/controller.php?op=2">Listar anuncios</a>
    <a href="./controller.php?op=3">Unlogin</a>
    <?php if (isset($_GET['msg'])) { ?>
    <p><?php echo $_GET['msg'] ?></p>
    <?php
     }?>

</body>

</html>