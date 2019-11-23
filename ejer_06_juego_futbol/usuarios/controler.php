<?php 
session_start();
$msg = "Operacion desconocida";
$operation = $_GET["op"];
switch ($operation) {
    case 1: // Insert **************************************************************
    $registro_nick = $_POST['nick'];
    $registro_email = $_POST['email'];
    $registro_passw = $_POST['password1'];
    $result = insertUser($registro_nick,$registro_email,$registro_passw);
    if($result == false) {
        $msg = "El registro no se ha podido realizar";
    }else {
        $msg = "Registro con éxito, ya puedes acceder a tu cuenta.";
        header("Location: ../index.php?msg_user_create=$msg");
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
            header("Location:../index.php?msg=$msg");
        };
        break;
    case 3: //Unlogin *********************************************************************
        session_unset();
        header("Location:../index.php");
        break;
    case 4: // Recargar saldo *********************************************************************
       $recarga_saldo = $_POST["recarga_saldo"];
       $user_id = $_SESSION['user_id'];
       $result =rechargeMoney($recarga_saldo, $user_id);
       if($result == false) {
        $msg = "La recarga no se ha podido realizar";
        header("Location: ./acceso_user.php?msg=$msg_error");
    }else {
        $msg = "Recarga con éxito.";
        header("Location: ../acceso/acceso_user.php?msg=$msg");
    }
        ;
        break;
        case 5: //  modificar usuario.
            $user_id = $_SESSION['user_id'];
            $user_nick = $_POST['nick'];
            $user_email = $_POST['email'];
            $data_user = UpdateUser($user_id, $user_nick, $user_email);
            if($result == false) {
                header("Location: ./user_account.php?msg='Error al cambiar datos'");
            }else {
                header("Location: ../index.php?msg='Ya puede acceder con tus nuevos datos'");
            }
            ;
        break;

        case 6:
            $user_id = $_SESSION['user_id'];
            if (deleteUser($user_id)) {
                $msg = "Se ha borrado el usuario con éxito";
            } else {
                $msg = "Error al borrar el usuario.";
            }
            header("Location: ../index.php?msg=$msg");

            ;
        break;
}

// Funciones ***********************************************************
function insertUser($registro_nick,$registro_email,$registro_passw) {
    $sql_insert = "INSERT INTO usuarios (user_nick, user_mail,user_password) VALUES ('$registro_nick','$registro_email','$registro_passw')";
    require "../conection.php";
    mysqli_query($conx, $sql_insert);
    $result  = mysqli_insert_id($conx); 
    return ($result > 0);
    mysqli_close($conx);
}

// ******************* login
function login($email, $passw){
    //generar la consulta
    $passHash = password_hash($passw, PASSWORD_BCRYPT);
    password_verify($passw, $passHash);
    $sql = "SELECT * FROM usuarios WHERE user_mail = '$email' AND user_password = '$passw' ";
    require "../conection.php";
    //recogemos la consulta
    $datos = mysqli_query($conx, $sql);
    //mostramos la consulta
    $id = 0;
    if ($fila = mysqli_fetch_assoc($datos)) {
        $id = $fila["user_id"];
        //OK, guardo en session:
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $id;
        $_SESSION['nick'] =$fila["user_nick"];
    }
    // cerramos conexión
    mysqli_close($conx);
    return $id;
}
    // Recargar saldo
    function rechargeMoney($recarga_saldo, $user_id) {
        $sql = "UPDATE usuarios SET user_saldo = (user_saldo + $recarga_saldo)  where user_id = '$user_id'";
        require "../conection.php";
        mysqli_query($conx,$sql);
        $cont = mysqli_affected_rows($conx);
        mysqli_close($conx);
        return ($cont > 0);
    }

    // Modificar email y nick de un usuario en su panel 
     function UpdateUser($user_id, $user_nick, $user_email) {
         $sql = "UPDATE  usuarios SET user_nick='$user_nick' , user_mail = '$user_email' WHERE user_id = '$user_id'";
         echo $sql;exit;
         require "../conection.php";
         mysqli_query($conx,$sql);
         $cont = mysqli_affected_rows($conx); 	
         mysqli_close($conx);
         return ($cont > 0);
     }

     // Eliminar usuario
     function deleteUser($user_id) {
        $sql = "DELETE FROM usuarios WHERE user_id = '$user_id'";
        require "../conection.php";
        mysqli_query($conx, $sql);
        $cont = mysqli_affected_rows($conx);
    
        mysqli_close($conx);
        return ($cont > 0);
    }

