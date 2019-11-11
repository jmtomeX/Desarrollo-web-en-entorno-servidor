<?php
session_start();
$msg = "Operación desconocida";
$operation = $_GET['op'];
switch ($operation) {
    case 1: // Insertar partido
        $date = $_POST['date'];
        $time = $_POST['time'];
        $game_date_time = $date + " - " + $time;

        $team_local = $_POST['team_local'];
        $team_visitor = $_POST['team_visitor'];
        $match = $team_local + " - " + $team_visitor;

        $game_resultado = ['game_resultado'];
        $id = insertMacth($game_date_time, $match, $game_resultado);

        if($id == false){
            $msg = "Fracaso al insertar el partido.";
            header("Location:./registro_partido?msg=$msg");
        } else {
            $msg = $msg = "Partido registrado con éxito.";
            header("Location:../registro_partido?msg=$msg");
        }
        break;
    case 2: // Acutalizar partido

        ;
        break;;
        break;
    case 3: // Mostrar  partido

        ;
        break;
    case 4: // Borrar partido

        ;
        break;
}

// Funciones
function insertMacth($game_date_time, $match, $game_resultado)
{
    $sql_insert = "INSERT INTO partidos (game_fecha, game_partido, game_resultado) VALUES ('$game_date_time', '$match', '$game_resultado')";
    require "../conection.php";
    mysqli_query($conx, $sql_insert);
    $id = mysqli_insert_id($conx);
    return ($id > 0);
    mysqli_close($conx);
}
?>
    /*
    game_fecha 2019-01-30 23:59:59
    game_id
    game_partido
    game_resultado
    $fecha = date('Y-m-d H:i:s');
    */