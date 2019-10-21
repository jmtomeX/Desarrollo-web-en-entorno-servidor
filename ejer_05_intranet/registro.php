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
    <title>Registro de usuarios</title>
</head>
<body>
<div class="pure-g">
    <article class="pure-u-2-5" >
        <fieldset>
            <legend class="title">Registro de usuarios</legend>
    <form action="insertar_usuario.php" method="POST" class="pure-form form-acces">

<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
}
echo $_GET['msg']; ?>
    <p><label for="reg_user"><input type="text" name="reg_user" id="reg_user" ></label></p>
    <p><label for="reg_passw"><input type= "password" name="reg_passw" id="reg_passw"></label></p>
    <button type="submit" class=" pure-button margin " value="Registro usuario"><i class="fas fa-user"></i></button>
    <a type= "button" href="index.php"  class=" pure-button margin "><i class="fas fa-window-close"></i></a>
 </article>
</fieldset>
    </form>
</article>
</div>
</body>
</html>