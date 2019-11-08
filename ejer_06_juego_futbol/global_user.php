<?php session_start();
if (!isset($_SESSION['nick'])) {
    //header("Location:../index.php?msg=Debes identificarte.");
    echo "No eres user";
    exit;
}
$nick =  $_SESSION['nick'];
?>