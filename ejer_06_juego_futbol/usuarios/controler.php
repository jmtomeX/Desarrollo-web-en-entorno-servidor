<?php
session_start();
$msg = "Operacion desconocida";
$operation = $_GET["op"];
switch ($operation) {
    case 1: // Insert **************************************************************
    $registro_nick = $_POST['nick'];
    $registro_email = $_SESSION['email'];
    $registro_passw = $_POST['password1'];
    $result = insertUser($registro_nick,$registro_email,$registro_passw);
    if($result == false) {
        $msg = "El registro no se ha podido realizar";
    }else {
        $msg = "Registro con éxito, ya puedes acceder a tu cuenta.";
        session_unset();
        header(Location: ../index.php?msg=$msg);
    }
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

function insertUser($registro_nick,$registro_email,$registro_passw) {
    $sql_insert = "INSERT INTO usuarios (user_nick, user_mail,user_password) VALUES ('$registro_nick','$registro_email','$registro_passw')";
    require "../conection.php";
    mysqli_query($conx, $sql_insert);
    $insert_ok = mysqli_insert_id($conx); 
    return ($id > 0);
   
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

    // si se da la condición de que exista el usuario 
    if ($id > 0) {
        // Guarda en variables de sesión
        $_SESSION['nick'] = $nick;
        $_SESSION['user_id'] = $id;
        $_SESSION['email'] = $email;
    } else {
        // si no limpia la sesión y retorna 0
        session_unset();
        $id = 0;
    }
    return $id;
}
