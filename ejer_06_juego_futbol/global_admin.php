<?php
session_start(); 
if (!isset($_SESSION['nick']) & $_SESSION['email'] != "admin@admin.com") {
    //header("Location:../index.php?msg=Debes identificarte como administrador");
    echo "No eres admin";
    exit;
}
$nick =  $_SESSION['nick'];
?>