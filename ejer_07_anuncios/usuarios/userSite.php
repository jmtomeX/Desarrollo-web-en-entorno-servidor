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
                <a href="../anuncios/crear_anuncio.php" class="item">
                    <i class="shopping cart icon"></i>
                    Crear anuncio
                </a>
                <a class="item" href="../anuncios/vista_anuncios_id.php">
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
            <h1>Bienvenido <?php echo $name ?> aquí tienes tus productos en venta.</h1>

            <button id="botonModAdv" class="ui google plus button"><i class="trash alternate icon"></i>Eliminar cuenta
            </button>
            <br>
            <br>

        </div>
        <!-- https://semantic-ui.com/modules/sidebar.html -->
        <?php if (isset($_GET['msg'])) { ?>
        <p><?php echo $_GET['msg'] ?></p>
        <?php }?>


        <!-- Modal prueba eliminar user -->
        <div class="ui basic modal">
            <div class="ui icon header">
                <i class="archive icon"></i>
                Advertencia vas a eliminar el usuario.
                <p>¿Desea eliminarlo realmente?</p>
            </div>

            <div class="actions">
                <div class="ui red basic cancel inverted button">
                    <i class="remove icon"></i>
                    No
                </div>
                <div class="ui green ok inverted button">
                    <i class="checkmark icon"></i>
                    Si
                </div>
            </div>
        </div>
        <!-- Fin  Modal prueba eliminar user -->

            <!-- <div class="card">
                <div class="image">
                    <img src="../img/habit.jpg">
                </div>
                <div class="content">
                    <div class="header">Cannondale HABIT CARBON 2 </div>
                    <div class="meta">
                        <span class="date">Mountainbike</span>
                    </div>
                    <div class="description">
                        130mm travel, BallisTec Carbon front triangle, SmartForm C1 Alloy swingarm, Proportional
                        Response Tuned, Ai offset drivetrain, ISCG05, PF30, Post mount brake, tapered headtube
                    </div>
                </div>
                <div class="extra content">
                    <span class="right floated">
                        2019
                    </span>
                    <span>
                        <i class="user icon"></i>
                        3999 €
                    </span>
                </div>
            </div> -->



     
    </div>
    <?php include '../includes/footer.php'; ?>
</body>

</html>