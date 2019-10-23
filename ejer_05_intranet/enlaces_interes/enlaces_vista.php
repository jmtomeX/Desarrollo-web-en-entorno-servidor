<?php
require '../global.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include '../includes/enlaces.txt'?>
    <title>Galería de video</title>
</head>
<body>
<?php
    include '../includes/menu.txt';
    ?>
     <fieldset>
        <legend class="title">Enlaces de interes</legend>
        <form action="controler.php?op=1" method="POST" class="pure-form box--flex">
<?php
if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
} ?>
    <p><label for="titulo_enlace">Título del enlace</label><input type= "text" name="titulo_enlace" id="titulo_enlace" class="input--large"></p>
    <p><label for="enlace">Url video</label><input type= "text" name="enlace" id="enlace" class="input--large"></p>
    <p><label for="enlaces">Enlaces video</label><select name="enlaces" id="enlaces" class="input--large">
   <option value="1"><a href="#">Google</a></option> 
   <option value="2">Windows 7</option> 
   <option value="3">Windows XP</option>
   <option value="10">Fedora</option> 
   <option value="11">Debian</option> 
   <option value="12">Suse</option> 
</select>
</p>
    <br><br>
    <input type="submit" value="Registro Enlace" class="pure-button pure-button-primary margin">
    <?php   if (isset($_GET['msg'])) {
        echo "<p>".$_GET['msg']."</p>";
    }
    ?>
    </form>
</fieldset>
    
    
</body>
</html>