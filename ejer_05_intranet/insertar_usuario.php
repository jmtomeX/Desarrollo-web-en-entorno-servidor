<?php
$reg_user = $_POST['reg_user'];
$reg_passw = $_POST['reg_passw'];
$message ="El usuario ya existe, selecciona otro diferente a \"$reg_user\" <br>O los campos son inválidos";
$message_exito = "Registro con éxito";
require "conection.php";
//generar la consulta: si existe el usuario
$sql = "SELECT nombre FROM usuarios WHERE nombre = '$reg_user'";

//ejecutar la consulta
$datos = mysqli_query($conx,$sql);

if($fila = mysqli_fetch_assoc($datos) || $reg_user== "" || $reg_passw == "") {
    header("Location:registro.php?msg=$message");
}else {
    $fecha = date('Y-m-d H:i:s');

    $sql_insert = "INSERT INTO usuarios (nombre, password,date_insert) VALUES ('$reg_user','$reg_passw', '$fecha')";
    mysqli_query($conx,$sql_insert);
    $id = mysqli_insert_id($conx);
    if($id > 0){
        header("Location:index.php?msg=$message_exito&fecha=$fecha");
    }
}
// cerramos conexión
mysqli_close($conx);
?>