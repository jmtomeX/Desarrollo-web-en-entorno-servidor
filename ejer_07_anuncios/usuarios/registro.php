<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require '../includes/headers.php';?>
    <title>Registro</title>
</head>

<body>
    <h1>Login</h1>
    <form action="./controller.php?op=1" method="post">
        <label for="email">Email <br><input type="text" name="email" id="email"></label><br>
        <label for="name">Nombre <br><input type="text" name="name" id="name"></label><br>
        <label for="email">Password <br><input type="password" name="password" id="password"></label><br>
        <button type="submit">Registrar</button>
    </form>
</body>

</html>