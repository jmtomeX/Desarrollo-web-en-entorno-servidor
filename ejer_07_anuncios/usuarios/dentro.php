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
    <h1 class="title">FOR SALE</h1>
            <div class="column">
                <div class="ui visible left demo vertical inverted sidebar labeled icon menu">
                    <a href="./anuncios/controller.php?op=1" class="item">
                        <i class="shopping cart icon"></i>
                        Crear anuncio
                    </a>
                    <a class="item" href="./anuncios/controller.php?op=2">
                        <i class="exchange icon"></i>
                        Listar anuncios
                    </a>
                    <a class="item" href="./controller.php?op=3">
                        <i class="x icon"></i>
                        Unlogin
                    </a>
                </div>
            </div>
            <div class="column">
            <h1>Bienvenido <?php echo $name ?></h1>

            </div>
    </div>
    <!-- https://semantic-ui.com/modules/sidebar.html -->
    <?php if (isset($_GET['msg'])) { ?>
    <p><?php echo $_GET['msg'] ?></p>
    <?php
     }?>
    </div>
</body>

</html>