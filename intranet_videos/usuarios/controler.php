<?php
session_start(); 
$msg = "Operacion desconocida";
$operation = $_GET["op"];
switch ($operation) {
    case 1: // Insert **************************************************************
    $message_fracaso ="El usuario ya existe, selecciona otro diferente a \"$reg_user\" <br>O los campos son inválidos";
    $message_exito = "Registro con éxito";
    
    $reg_user = $_POST['reg_user'];
    $reg_passw = $_POST['reg_passw'];
    $id = insertUser($reg_user, $reg_passw);
    if($id == false){
        $msg = $message_fracaso;
        header("Location:./registro.php?msg=$msg");
    } else {
        $msg = $message_exito;
        header("Location:../index.php?msg=$msg");
    }
    ;
    break;
    case 2: // login **************************************************************
    $msg = "El usuario o contraseña son incorrectos";
    $usuario = $_POST['user'];
    $passw = $_POST['passw'];
    $id = login($usuario,$passw);
    if($id>0) {
    header("Location:../intranet/intranet.php");
    }else{
    session_unset();
    header("Location:../index.php?msg=$message");
} 
    ;
        break;
    case 3: //Unlogin *********************************************************************
    session_start();
    session_unset();
    header("Location:../index.php");
    ;
    break;
}

// Funciones ***********************************************************
function insertUser($reg_user, $reg_passw) {
//generar la consulta: existe el usuario?
$sql = "SELECT nombre FROM usuarios WHERE nombre = '$reg_user'";
require "../conection.php";
//ejecutar la consulta
$datos = mysqli_query($conx,$sql);

if($fila = mysqli_fetch_assoc($datos) || $reg_user== "" || $reg_passw == "") {
  return false;
}else {
    $fecha = date('Y-m-d H:i:s');
    $sql_insert = "INSERT INTO usuarios (nombre, password,date_insert) VALUES ('$reg_user','$reg_passw', '$fecha')";
    mysqli_query($conx,$sql_insert);
    $id = mysqli_insert_id($conx);
   return ($id > 0);
}
// cerramos conexión
mysqli_close($conx);
}

// login
function login($usuario,$passw) {
//generar la consulta
$sql = "SELECT id FROM usuarios WHERE nombre = '$usuario' AND password = '$passw' ";
require "../conection.php";
//recogemos la consulta
$datos = mysqli_query($conx,$sql);
//mostramos la consulta
$id = 0;
if($fila = mysqli_fetch_assoc($datos)) {
    $id = $fila["id"];
}
// cerramos conexión
mysqli_close($conx);

if($id>0) {
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['user_id'] = $id;

}else{
    session_unset();
    $id = 0;
}
return $id;
}
?>