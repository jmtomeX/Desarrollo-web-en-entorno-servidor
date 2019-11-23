<?php
$sql = "SELECT * FROM apuestas
INNER JOIN usuarios ON apuestas.bet_user_id = usuarios.user_id
INNER JOIN partidos ON apuestas.bet_game_id = partidos.game_id
ORDER BY game_partido
";

require "../conection.php";
$data = array();
$datos = mysqli_query($conx,$sql);
while($fila= mysqli_fetch_assoc($datos) ) {
    // apuestas
    $bet_user_id = $fila['bet_user_id'];
    $bet_cant_apostada = $fila['bet_cant_apostada'];
    $bet_minuto_apuesta = $fila['bet_minuto_apuesta'];
    $bet_fecha_apuesta = $fila['bet_fecha_apuesta'];
    $bet_premio = $fila['bet_premio'];
    $bet_estado = $fila['bet_estado'];
    if($bet_estado == -1 ){
        $bet_estado = "No jugado";
    } else {
        $bet_estado = "Jugado";
    }
    //usuarios
    $user_nick = $fila['user_nick'];
    $user_mail = $fila['user_mail'];

    // partidos
    $game_partido = $fila['game_partido'];
    $game_fecha = $fila['game_fecha'];
    $bet_minuto_gol = $fila['game_resultado'];

    $data[] = array(
        'bet_cant_apostada' => $bet_cant_apostada,
        'bet_minuto_apuesta' => $bet_minuto_apuesta,
        'bet_fecha_apuesta' => $bet_fecha_apuesta,
        'bet_premio' => $bet_premio,
        'bet_estado' => $bet_estado,
        'bet_minuto_gol' => $bet_minuto_gol,
    
        'user_nick' => $user_nick,
        'user_mail' => $user_mail, 
        
        'game_partido' => $game_partido,
        'game_fecha' => $game_fecha
    );

}
mysqli_close($conx);

header('Content-Type: application/json');
//Guardamos los datos en un array

//Devolvemos el array pasado a JSON como objeto

echo json_encode($data);
