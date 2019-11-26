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
    <div class="ui text container">
        <h1 class="title">FOR <span class="dolar">$</span>ALE</h1>
        <div class="column">
            <div class="ui visible left demo vertical inverted sidebar labeled icon menu primary-color">
                <a href="#" class="item">
                    <i class="shopping cart icon"></i>
                    Crear anuncio
                </a>
                <a class="item" href="./controller.php?op=2">
                    <i class="exchange icon"></i>
                    Listar anuncios
                </a>
                <a class="item" href="../usuarios/controller.php?op=3">
                    <i class="x icon"></i>
                    Unlogin
                </a>
            </div>
        </div>
        <div class="column">

            <h1>Crear anuncio</h1>
            <form action="../anuncios/controller.php?op=1" enctype="multipart/form-data" method="post" class="ui form">
                <label for="titulo">Titulo <br><input type="text" name="titulo" id="titulo"></label><br>
                <label for="descripcion">Descripción <br><input type="text" name="descripcion"
                        id="descripcion"></label><br>
                <label for="precio">Precio <br><input type="number" name="precio" id="precio"></label><br>
                <label for="foto">Foto <br><input type="file" name="foto" id="foto"></label><br><br>
                <button type="submit" class="ui fluid large teal button" name="cargarAnuncio"
                    value="Upload">Subir</button>
                
         
                <?php if (isset($_GET['msg']) && isset($_SESSION['message_img'])) { ?>
                    <div class="ui error message">
                    <?php echo $_GET['msg'];
                     echo $_SESSION['message_img']; ?>
                    </div>
                <?php
                 unset($_SESSION['message_img']);
                 }?>
            </form>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>

</body>

</html>