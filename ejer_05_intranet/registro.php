<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceso Intranet</title>
</head>
<body>
    <h2>Registro de usuarios</h2>
    <form action="insertar_usuario.php" method="POST">
<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
}
echo $_GET['msg']; ?>
    <p><label for="reg_user"><input type="text" name="reg_user" id="reg_user" ></label></p>
    <p><label for="reg_passw"><input type= "password" name="reg_passw" id="reg_passw"></label></p>
    <input type="submit" value="Registro usuario">
    </form>
</body>
</html>