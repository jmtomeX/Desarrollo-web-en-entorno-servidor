<?php
$cont = 0;
$game_id = $_POST["game_id"];
$game_date_time =  $_POST['date']." ".$_POST['time']; 
$team_local = $_POST['team_local'];
$team_visitor = $_POST['team_visitor'];
$match = $team_local." - ".$team_visitor;

$sql_insert = "UPDATE  partidos SET game_fecha = '$game_date_time',  game_partido = '$match' WHERE enl_id = '$game_id'";
require "../conection.php";
mysqli_query($conx,$sql_insert);
$cont = mysqli_affected_rows($conx);
mysqli_close($conx);
$res = $cont;
if($cont > 0){
 $msg = "Actualizado con exito";
}else{
    $msg = "No actualizado";
}
header('Content-Type: application/json');
//Guardamos los datos en un array
$data = array(
'res' => $res, 
'msg' => $msg
);
//Devolvemos el array pasado a JSON como objeto

echo json_encode($data);
?>

