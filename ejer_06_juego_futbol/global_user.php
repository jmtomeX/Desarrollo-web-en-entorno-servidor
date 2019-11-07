<?php
session_start(); 
if (!isset($_SESSION['nick'])) {
    header("Location:../index.php?msg=Debes identificarte");
    exit;
}
    $nick =  $_SESSION['nick'];
?>