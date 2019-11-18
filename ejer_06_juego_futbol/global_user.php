<?php session_start();
if (!isset($_SESSION['nick'])) {
    header("Location:../index.php?msg=Debes identificarte.");
    exit;
}
if (!isset($_GET['user_id'])) {
     $_GET['user_id'] = $user_id;
} 

$nick =  $_SESSION['nick'];
?>