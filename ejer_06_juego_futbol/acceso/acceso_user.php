<?php
   session_start();
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
            <h1 class="title"><strong class="has-text-success">Goool!!!</strong><span
                    class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1>
            <h2 class="title">Hola <span class="has-text-success"> <?php echo $nick?></span></h2>
            <div class="columns is-desktop">
                <section class="column is-one-quarter">
                    <aside class="menu">
                        <ul class="menu-list">
                            <li>
                                <h1 class="title"><a href="#" class="is-active">Panel de Usuario</a></h1>
                            </li>
                            <li><a>Cuenta de usuario</a></li>
                            <li><a>Recargar saldo</a></li>
                            <li><a>Partidos</a></li>
                            <li><a href="../usuarios/controler.php?op=3">Salir</a></li>
                        </ul>

                    </aside>
                </section>
                <section class="column">
                    <h1 class="title">
                        Saldo <span id="saldo" class="has-text-success">
                      <?php 
                      
                      $sql = "SELECT user_saldo FROM usuarios WHERE user_id = '$user_id'";
                      ?>

                        </span>
                        €
                    </h1>
                    <h1 class="title">
                        Recargar <span id="saldo" class="has-text-success">Saldo</span>
                    </h1>
                    <div class="field">
                        <div class="control">
                            <input class="input is-primary" type="text" placeholder="Primary input">
                        </div>
                    </div>


                    <div class="buttons">
                        <button class="button is-primary">Recargar</button>

                    </div>

                </section>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php' ?>


</body>

</html>