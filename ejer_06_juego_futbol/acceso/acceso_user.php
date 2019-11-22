<?php
   include '../global_user.php';
  ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios Goool.es</title>
    <?php
   include '../includes/enlaces_head.php';
  ?>
</head>

<body>
    <main class="section">
        <div class="container">
        <a href="#">
            <h1 class="title"><strong class="has-text-success">Goool!!!</strong>
            <span class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1></a>
            <h2 class="title">Hola <span class="has-text-success"> <?php echo $nick?></span></h2>
            <div class="columns is-desktop">
                <section class="column is-one-quarter">
                    <aside class="menu">
                        <ul class="menu-list">
                            <li>
                                <h1 class="title"><a href="#">Panel de Usuario</a></h1>
                            </li>
                            <li><a href="../usuarios/controler.php?op=5">Cuenta de usuario</a></li>
                            <li class="title"><a href="#" class="is-active">Recargar saldo</a></li>
                            <li><a href="../partidos/show_matches_user.php">Partidos</a></li>
                            <li><a href="../usuarios/controler.php?op=3">Salir</a></li>
                        </ul>

                    </aside>
                </section>
                <section class="column is-one-quarter">
                <form action="../usuarios/controler.php?op=4" method="post">
                    <h1 class="title">
                        Saldo <span id="saldo" class="has-text-success">
                      <?php 
                      $user_id =$_SESSION['user_id'] ;
                      $sql = "SELECT user_saldo FROM usuarios WHERE user_id = '$user_id'";
                      require "../conection.php";
                      //recogemos la consulta
                      $datos = mysqli_query($conx, $sql);
                      //mostramos la consulta
                      if ($fila = mysqli_fetch_assoc($datos)) {
                          $saldo = $fila["user_saldo"];
                      }
                      echo $saldo;
                      ?>
                        </span>
                        €
                    </h1>
                    <h1 class="title">
                        Recargar <span id="saldo" class="has-text-success">Saldo</span>
                    </h1>
                    <div class="field">
                        <div class="control">
                            <input class="input is-primary" type="number" placeholder="€" id="recarga_saldo" name="recarga_saldo">
                        </div>
                    </div>


                    <div class="buttons">
                        <button class="button is-primary" type="submit">Recargar</button>
                    </div>
                    </form>
                    <br>
                    <?php if (isset($_GET['msg_error'])) { ?>
                                    <p class="notification is-danger"><?php echo $_GET['msg_error'] ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['msg'])) { ?>
                                    <p class="notification is-success"><?php echo $_GET['msg'] ?></p>
                    <?php } ?>
                </section>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php' ?>
</body>

</html>