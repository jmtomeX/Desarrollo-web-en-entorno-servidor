<?php
session_start();
if (!isset($_SESSION['saldo'])) {
  $_SESSION['saldo'] = 0;
}
if (isset($_POST['recarga']) ) {
    $_SESSION['saldo'] +=$_POST['recarga'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    $saldo = $_SESSION['saldo'];
    ?>
</head>

<body>
    <h1>Bienvenido a tragaperras</h1>
    <h2>Tu saldo es <?php echo $saldo ?></h2>

    <!-- Habilitar desabilitar botón -->
    <?php
  if ($_SESSION["saldo"] <= 0) {
      echo "<input type='button' disabled value = 'Jugar'>";
      echo "<p>Debes recargar el saldo</p>";
    }
  else{
      echo "<input type='button' value = 'Jugar' onclick = window.location='jugar.php'><br>";
    } 
    if (isset($_POST['recarga']) ) {
        echo "<p>Recarga de ".$_POST['recarga']." realizada</p>";
    }
    ?>
    <h2>Recargar saldo</h2>
    <form action="index.php" method="post">
        <input type="number" id="recarga" name="recarga" min="10" />
        <input type="submit" id="enviar_recarga" value="Recargar">
    </form>
</body>

</html>