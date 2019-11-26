<?php session_start();
if (!isset($_SESSION['us_name'])) {
    header("Location:../public/index.php?msg=Debes identificarte como usuario.");
    exit;
}
$name =  $_SESSION['us_name'];
$id =  $_SESSION['us_id'];

?>




