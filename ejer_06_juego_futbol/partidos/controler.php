<?php
session_start();
$msg = "Operación desconocida";
$operation = $_GET['op'];
switch ($operation) {
    case 1: // Insertar partido
        $game_date_time =  $_POST['date']." ".$_POST['time'];
        //echo date("Y-m-d H:i:s", strtotime($fecha)); 
        $team_local = $_POST['team_local'];
        $team_visitor = $_POST['team_visitor'];
        $match = $team_local." - ".$team_visitor;
        $id = insertMacth($game_date_time, $match);

        if($id == false){
            $msg = "Fracaso al insertar el partido.";
            header("Location:./registro_partido?msg=$msg");
        } else {
            $msg = $msg = "Partido registrado con éxito.";
            header("Location:./registro_partido.php?msg=$msg");
        }
        break;
  
    case 2: // Actualizar partido
        $game_id = $_POST["game_id"];
        $game_resultado = $_POST["resultado"];
        $game_date_time =  $_POST['date']." ".$_POST['time']; 
        $team_local = $_POST['team_local'];
        $team_visitor = $_POST['team_visitor'];
        $match = $team_local." - ".$team_visitor;
        $id = UpdateMatch($game_date_time, $match, $game_id, $game_resultado);
        if($id == false ){
            $msg = "Fracaso al actualizar el partido.";
            header("Location:./show_matches.php?msg=$msg");
        } else {
            $msg = $msg = "Partido actualizado con éxito.";
            header("Location:./show_matches.php?msg=$msg");
        }
        break;
        ;
    case 3: // Borrar partido
     
        $game_id = $_GET['game_id'];
        if (deleteMatch($game_id)) {
            $msg = "Se ha borrado el partido con éxito";
        } else {
            $msg = "Error al borrar el partido.";
        }
        header("Location:./show_matches.php?msg=$msg");
        break;
        ;   
}

// Funciones
function insertMacth($game_date_time, $match)
{
    $sql_insert = "INSERT INTO partidos (game_fecha, game_partido) VALUES ('$game_date_time', '$match')";
    require "../conection.php";
    mysqli_query($conx, $sql_insert);
    $id = mysqli_insert_id($conx);
    return ($id > 0);
    mysqli_close($conx);
}

function UpdateMatch($game_date_time, $match, $game_id, $game_resultado) {
//Si $game_resultado>0, primero comprobamos si ya había un resultado, en ese caso es un cambio en el resultado

$sql_insert = "UPDATE  partidos SET game_fecha = '$game_date_time',  game_partido = '$match', game_resultado = '$game_resultado' WHERE game_id = '$game_id'";
require "../conection.php";
mysqli_query($conx,$sql_insert);
$cont = mysqli_affected_rows($conx);

// comprobamos si se ha jugado el partido, si el resultado es > -1
if($game_resultado > -1) {
    $sql = "SELECT * FROM apuestas WHERE bet_game_id = '$game_id'";
    $datos = mysqli_query($conx, $sql);
    while($fila= mysqli_fetch_assoc($datos) ) {
        //por cada apuesta devuelta por la consulta, obtenemos:
        $bet_user_id = $fila['bet_user_id'];
        $bet_cant_apostada = $fila['bet_cant_apostada'];
        $bet_minuto_apuesta = $fila['bet_minuto_apuesta'];
        // Si hay premio
        if($bet_minuto_apuesta < $game_resultado){
            $premio = 0.1 * ($bet_cant_apostada * $bet_minuto_apuesta);
            //Actualizamos la fila de la apuesta
            $sql ="UPDATE apuestas SET bet_premio = $premio, bet_estado = 1 WHERE bet_user_id = $bet_user_id AND bet_game_id = $game_id";
            mysqli_query($conx,$sql);
            //Actualizamos el saldo del jugador
            $sql = "UPDATE usuarios SET user_saldo = user_saldo + $premio ";
            mysqli_query($conx,$sql);
            //Registramos el movimiento en negativo (pierde la banca)
            $cantidad = (-1) * $premio;
            $sql = "INSERT INTO movs (mov_user, mov_game, mov_cantidad) VALUES ('$bet_user_id','$game_id','$cantidad')";
            mysqli_query($conx,$sql);
        } else {
           $sql = " UPDATE apuestas SET bet_estado = 1 WHERE bet_user_id = '$bet_user_id' AND bet_game_id = '$game_id' ";
           mysqli_query($conx,$sql);
           mysqli_affected_rows($conx);
        }
    }
}

mysqli_close($conx);
return $cont;
}
function rectificarPartido($bet_game_id) {
    // comprobamos el estado del partido
    $sql = "SELECT bet_estado FROM apuestas WHERE bet_game_id = '$bet_game_id'";
    require "../conection.php";
    $datos = mysqli_query($conx, $sql);
    if($fila = mysqli_fetch_assoc($datos) ) {
        return true;
    } else {
        return false;
    }
    //¿ COrta cuando antes hay un return*********************************?
    mysqli_close($conx);
}

function deleteMatch($game_id) {
    
    $sql_delete = "DELETE FROM partidos WHERE game_id = '$game_id'";
    require "../conection.php";
    mysqli_query($conx, $sql_delete);
    $cont = mysqli_affected_rows($conx);

    mysqli_close($conx);
    return ($cont > 0);
}

?>