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
        $game_date_time =  $_POST['date']." ".$_POST['time']; 
        $team_local = $_POST['team_local'];
        $team_visitor = $_POST['team_visitor'];
        $match = $team_local." - ".$team_visitor;
        $id = UpdateMatch($game_date_time, $match, $game_id);
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

        ;
        break;
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

function UpdateMatch($game_date_time, $match, $game_id) {
$sql_insert = "UPDATE  partidos SET game_fecha = '$game_date_time',  game_partido = '$match' WHERE game_id = '$game_id'";
require "../conection.php";
mysqli_query($conx,$sql_insert);
$cont = mysqli_affected_rows($conx);
mysqli_close($conx);
return $cont;
}
?>