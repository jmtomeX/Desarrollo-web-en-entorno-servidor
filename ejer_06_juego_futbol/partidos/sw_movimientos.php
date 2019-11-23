<?php
$sql = "SELECT * FROM movs
INNER JOIN usuarios ON movs.mov_user = usuarios.user_id";

require "../conection.php";
$data = array();
$datos = mysqli_query($conx,$sql);
while($fila= mysqli_fetch_assoc($datos) ) {
    // movimientos
    $mov_id = $fila['mov_id'];
    $mov_cantidad = $fila['mov_cantidad'];
    $mov_fecha = $fila['mov_fecha'];
 
    //usuarios
    $user_nick = $fila['user_nick'];

    $data[] = array(
        'mov_id' => $mov_id,
        'mov_cantidad' => $mov_cantidad,
        'mov_fecha' => $mov_fecha,
     
        'user_nick' => $user_nick,
    );
}
mysqli_close($conx);

header('Content-Type: application/json');
//Guardamos los datos en un array

//Devolvemos el array pasado a JSON como objeto

echo json_encode($data);

?>