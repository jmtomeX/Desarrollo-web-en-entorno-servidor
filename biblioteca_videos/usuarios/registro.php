<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-old-ie-min.css">
<![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
    <!--<![endif]-->
    <title>Registro de usuarios</title>
</head>

<body>
    <div class="pure-g">
        <article class="pure-u-3-5">
            <fieldset>
                <legend class="title">Registro de usuarios <img src="../img/youtube.svg" width="100px" height="100">
                </legend>
                <form action="./controller.php?op=1" method="POST" class="pure-form pure-form-aligned" name="formNewUSer">
                    <?php
                    if (!isset($_GET['msg'])) {
                        $_GET['msg'] = "";
                    }
                    echo $_GET['msg']; ?>
                    <div class="pure-g">
                        <div class="pure-u-xl-10-24  pure-u-md-1-1">
                            <label for="reg_user">Usuario</label>
                        </div>
                        <div class="pure-u-xl-14-24  pure-u-md-1-1">
                            <input type="text" name="reg_user" id="reg_user" class="input--large" required placeholder="Nombre usuario">
                        </div>
                        <div class="pure-u-xl-10-24  pure-u-md-1-1">
                            <label for="reg_passw">Contraseña</label>
                        </div>
                        <div class="pure-u-xl-14-24  pure-u-md-1-1">
                            <input type="password" name="reg_passw" id="reg_passw" class="input--large" required placeholder="********">
                        </div>
                        <div class="pure-u-xl-10-24  pure-u-md-1-1">
                            <label for="passw_repeat">Repita Contraseña</label>
                        </div>
                        <div class="pure-u-xl-14-24  pure-u-md-1-1">
                            <input type="password" name="passw_repeat" id="passw_repeat" class="input--large" required placeholder="********">
                        </div>
                    </div>
                    <button type='submit' class=' pure-button margin ' value='Registro usuario'>Enviar</button>
                    <a type="button" href="../index.php" class=" pure-button margin ">Cancelar</a>
                </form>
        </article>
        </fieldset>
        </article>
    </div>
</body>

</html>