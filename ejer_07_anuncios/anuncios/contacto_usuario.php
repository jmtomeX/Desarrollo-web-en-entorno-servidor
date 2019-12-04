<!DOCTYPE html>
<html lang="en">
<?php
require '../includes/globals.php';
require '../models/CAnuncio.php';
$id = $_SESSION['us_id'];
$un_anuncio = new CAnuncio();
$anuncios = $un_anuncio -> listarAnuncios($id) ;

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
                <a href="../public/index.php" class="item">
                    <i class="home icon"></i>
                    Home
                </a>
                <a href="./crear_anuncio.php" class="item">
                    <i class="shopping cart icon"></i>
                    Crear anuncio
                </a>
                <a class="item" href="#">
                    <i class="exchange icon"></i>
                    Tus anuncios
                </a>
                <a class="item" href="../usuarios/controller.php?op=3">
                    <i class="x icon"></i>
                    Unlogin
                </a>
            </div>
        </div>
        <div class="column">
        <form class="ui form" action="../correo/contacto_mail.php" method="post">
                <div class="field">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div class="field">
                    <label>Teléfono</label>
                    <input type="number" name="telefono" id = "telefono" >
                </div>
                <div class="field">
                <textarea placeholder="Deja tu mensaje" rows="3"></textarea>
                </div>
                <button class="ui button" type="submit">Enviar mensaje</button>
            </form>
        </div>


    </div>

    <?php include '../includes/footer.php'; ?>

    <script>
    function getId(id) {
        console.log("./controller.php?op=2&id=" + id);
        $("#borrar").attr("href", "./controller.php?op=2&id=" + id);
    }
    </script>
</body>

</html>