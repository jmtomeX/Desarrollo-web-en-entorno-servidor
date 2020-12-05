<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/styles.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-old-ie-min.css">
<![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
    <!--<![endif]-->
    <title>Biblioteca videos</title>
</head>

<body>
    <div class="pure-g">

        <article class="pure-u-md-2-5" id="article_left">
            <form action="./usuarios/controller.php?op=2" method="POST" class="pure-form pure-form-aligned">
                <fieldset>
                    <legend class="title">Acceso a la biblioteca</legend>
                    <img src="img/youtube.svg" width="150px" height="120">
                    <?php
                    if (!isset($_GET['msg'])) {
                        $_GET['msg'] = "";
                    }
                    if (!isset($_GET['fecha'])) {
                        $_GET['fecha'] = "";
                    }
                    echo $_GET['msg'];
                    $fecha = $_GET['fecha'];

                    // echo "<br>fecha entrada $fecha";
                    ?>
                    <div class="pure-control-group">
                        <p><label for="user">Usuario</label>
                            <input type="text" name="user" id="user" value="josemari"></p>
                    </div>
                    <div class="pure-control-group">
                        <p><label for="passw">Contraseña</label>
                            <input type="password" name="passw" id="passw" value="1234"></p>
                    </div>
                    <div class="pure-control-group">
                        <button type="submit" value="Acceder" class="button-error">Entrar</i></button>
                        <span class="pure-form-message">¿No estás registrado?</span> <a href="./usuarios/registro.php" class="button-success">Registro <i class="fas fa-user"></i></a>
                    </div>
        </article>
        </fieldset>
        </form>

        <article class="pure-u-md-3-5" id="logos">
            <aside class="content-rigth">
                <img src="./img/html-css-php-mysql-logo.png" alt="logos html css php mysql" width="300px">
                <img src="./img/pure-css.png" alt="logo pure css" width="300px">
            </aside>
            <h2 class="title content-rigth">
                CRUD en PHP<br>
                <div class="capitalize">
                    create<br> read<br> update<br> delete</div>
            </h2>
        </article>
    </div>
</body>

</html>