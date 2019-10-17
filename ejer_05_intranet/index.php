<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accesp Intranet</title>
</head>
<body>
    <h2>Acceso a Intranet</h2>
    <form action="comprobar.php" method="POST">
<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
}
echo $_GET['msg']; ?>
    <p><label for="user"><input type="text" name="user" id="user" value="josemari"></label></p>
    <p><label for="passw"><input type= "password" name="passw" id="passw" value="1234" ></label></p>
    <input type="submit" value="Acceder">
    <p><a href="registro.php">Registro</a></p>

    </form>
</body>
</html>