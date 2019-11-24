<?php session_start();
require '../models/CUsuario.php';
$msg = "Operacion desconocida";
$operation = $_GET["op"];

$un_usuario = new CUsuario();

switch ($operation) {
    case 1: // Insert **************************************************************
    $us_email = $_POST['email'];
    $us_password = $_POST['password'];
    $us_name = $_POST['name'];

    $result =  $un_usuario->toRegister ($us_email, $us_password, $us_name);
    if($result == false) {
        $msg = "El registro no se ha podido realizar";
    }else {
        $msg = "Registro con éxito, ya puedes acceder a tu cuenta.";
        header("Location: ../public/index.php?msg=$msg");
    }
        ;
        break;
    case 2: // login **************************************************************
        $msg = "El email o contraseña son incorrectos";
        $us_email = $_POST['email'];
        $us_password = $_POST['password'];
        
        $id =  $un_usuario->checkUser ($us_email, $us_password);
        if ($id > 0) {
            //Guardo en session los datos de usuario (id, name)
            $_SESSION['us_id'] = $un_usuario->getID();
            $_SESSION['us_name'] = $un_usuario->getName();
            header("Location:./userSite.php");
        } else {
            header("Location:./login.php?msg=$msg");
        };
        break;
    case 3: //Unlogin *********************************************************************
        session_unset();
        header("Location:../public/index.php");
        break;
}