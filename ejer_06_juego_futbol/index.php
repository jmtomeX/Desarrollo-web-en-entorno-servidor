<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adivina Gol</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <?php include './includes/enlaces_head.php';

    if (!isset($_GET['msg'])) {
        $_GET['msg'] = "";
    }
    $msg = $_GET['msg'];

    if (!isset($_GET['msg_error'])) {
        $_GET['msg_error'] = "";
    }
    $msg_error = $_GET['msg_error'];
    
    ?>

</head>

<body>
    <main class="section">
        <div class="container">
            <h1 class="title">
                Acierta cual sera el minuto sin <strong class="has-text-success">Goool!!!</strong><span class="has-text-info is-size-3 is-size-1-desktop">.</span>es
            </h1>
            <p class="subtitle">
                Si tu elección es menor al minuto del gol <strong class="has-text-success">pierdes.</strong><br>
                Si tu elección es igual al minuto del gol <strong class="has-text-success">pierdes.</strong>
            </p>

            <div class="columns is-desktop">
                <section class="column">
                    <form action="./usuarios/controler.php?op=2" method="POST">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" type="email" placeholder="Email" id="email" name="email" value="admin@admin.com" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <span class="icon is-small is-right">
                                    <i class="fas fa-check"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control has-icons-left">
                                <input class="input" type="password" placeholder="Password" id="passw" name="passw" value="admin" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control">
                                <button class="button is-success">
                                    Login
                                </button>
                            </p>
                            <p><?php echo $msg ?></p>
                        </div>
                </section>
                </form>
                <section class="column">

                <form id="form_check_user" method="post" action="./usuarios/create_user.php">
                    <div class="field">
                    <p class="subtitle">Crea tu cuenta, si aun no la tienes. </p>
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="email" id="mail_check" name="mail_check" placeholder="Email" required value="correo@gmail.com">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-check"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                            <p class="control">
                                <!-- Para que no envie el formulario debe de ser de tipo button no submit.
                                Se enviara en el ajax cuando tode vaya bien -->
                                <button type="button" class="button is-success" onclick="check_user()">
                                    Crear cuenta
                                </button>
                            </p>
                            <div id="error_check_user"></div>
                        </div>
</form>
                </section>

            </div>
        </div>
    </main>
    <footer class="footer pie-pagina">
        <div class="content has-text-centered">
            <p>
                <h2><strong class="has-text-success">Goool!!!</strong><span class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h2>
                <strong>Goools</strong> by <a href="#">José Mari Tomé</a>.
            </p>
            <figure>
                <img src="./assets/img/bulma.svg" alt="logo bulma" class="image is-64x64">
            </figure>

            <figure>
                <img src="./assets/img/php.png" class="image is-64x64" alt="logo php">

            </figure>
        </div>
    </footer>

    <script>
        function check_user() {
            let mail = $('#mail_check').val();
                   $.ajax({
                        type: "POST",
                        url: "./usuarios/sw_check_user.php",
                        data: {
                           mail_check : mail
                        }
                        ,
                        success: function (data) {
                            console.log(data);
                            if (data > 0) {
                                $("#error_check_user").html("<br><div class='notification is-danger'>El correo ya está en uso.</div>");
                            } else {
                                //Enviamos el formulario con el mail que quiere registrar:
                                $("#form_check_user").submit();
                            }
                        },
                        error: function (data) {
                            alert(" Error");
                    }
                });
        }
    </script>
</body>

</html>