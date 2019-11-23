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
            <a href="../acceso/acceso_user.php">
                <h1 class="title"><strong class="has-text-success">Goool!!!</strong>
                    <span class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1>
            </a>
            <h2 class="title">Hola <span class="has-text-success"> <?php echo $nick?></span></h2>
            <div class="columns is-desktop">
                <section class="column is-one-quarter">
                    <aside class="menu">
                        <ul class="menu-list">
                            <li>
                                <h1 class="title"><a href="#">Panel de Usuario</a></h1>
                            </li>
                            <li class="title"><a href="#" class="is-active">Cuenta de usuario</a></li>
                            <li><a href="../acceso/acceso_user.php">Recargar saldo</a></li>
                            <li><a href="../partidos/show_matches_user.php">Partidos</a></li>
                            <li><a href="../usuarios/controler.php?op=3">Salir</a></li>
                        </ul>

                    </aside>
                </section>
                <section class="column is-two-quarter">
                    <!-- FORMULARIO Modificar usuario-->
                    <form id="form_modify_user" action="../usuarios/controler.php?op=5" method="POST">
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" id="nick" name="nick" type="text"
                                            value="<?php echo $_SESSION['nick']; ?>">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input is-success" id="email" name="email" type="email"
                                            placeholder="Email" value="<?php echo $_SESSION['email']?>" required>
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <span class="icon is-small is-right">
                                            <i id="icon_confirm" class=""></i>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-warning" id="button_send_user">
                                            Modificar cuenta
                                        </button>
                                        <br><br><br>
                                        <a href="./controler.php?op=6" type="button" class="button is-danger"
                                            id="button_send_user"
                                            onclick="return confirm('¿Desea eliminar la cuenta?')">Eliminar cuenta</a>
                                    </div>
                                </div>
                                <div id="error_check_passw"></div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <div id="error_check_passw"></div>
        </div>
        </div>

        </section>
        </div>
        </div>
    </main>
    <?php include '../includes/footer.php' ?>
</body>

</html>