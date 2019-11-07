<?php
session_start();
$msg = "Operacion desconocida";
$operation = $_GET["op"];
switch ($operation) {
    case 1: // Insert **************************************************************

        ;
        break;
    case 2: // login **************************************************************
        $msg = "El email o contraseña son incorrectos";
        $email = $_POST['email'];
        $passw = $_POST['passw'];
        $id = login($email, $passw);
        if ($id > 0) {
            if ($email != "admin@admin.com") {
                header("Location:../acceso/acceso_user.php");
            } else if ($email == "admin@admin.com") {
                header("Location:../acceso/acceso_admin.php");
            }
        } else {
            session_unset();
            header("Location:../index.php?msg=$msg");
        };
        break;
    case 3: //Unlogin *********************************************************************
        session_start();
        session_unset();
        header("Location:../index.php");;
        break;
}

// Funciones ***********************************************************

function insertUser($reg_user, $reg_passw)
{

    // cerramos conexión
    mysqli_close($conx);
}

// ******************* login
function login($email, $passw)
{
    //generar la consulta
    $sql = "SELECT * FROM usuarios WHERE user_mail = '$email' AND user_password = '$passw' ";
    require "../conection.php";
    //recogemos la consulta
    $datos = mysqli_query($conx, $sql);
    //mostramos la consulta
    $id = 0;
    if ($fila = mysqli_fetch_assoc($datos)) {
        $id = $fila["user_id"];
        $nick = $fila["user_nick"];
    }
    // cerramos conexión
    mysqli_close($conx);

    if ($id > 0) {
        $_SESSION['nick'] = $nick;
        $_SESSION['user_id'] = $id;
    } else {
        session_unset();
        $id = 0;
    }
    return $id;
}
