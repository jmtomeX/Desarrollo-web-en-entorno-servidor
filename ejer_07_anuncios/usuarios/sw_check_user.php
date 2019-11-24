<?php 
$mail_check  =  $_POST['mail_check'];
//comprobar si el mail existe en la base de datos

$sql = "SELECT user_id from usuarios where user_mail = '$mail_check'";
require "../conection.php";
mysqli_query($conx, $sql);
$cont = mysqli_affected_rows($conx);
mysqli_close($conx);
echo $cont;
?>