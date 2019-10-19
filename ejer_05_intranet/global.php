<?php
session_start(); 
if (!isset($_SESSION['user'])) {
    header("Location:index.php?msg=Debes identificarte");
    exit;
}
    $user =  $_SESSION['user'];

?>