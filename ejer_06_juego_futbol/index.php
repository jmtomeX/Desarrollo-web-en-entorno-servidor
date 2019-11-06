<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adivina Gol</title>
    <?php include './includes/enlaces_head.php' ?>
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
                    <form action="" method="POST">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" type="email" placeholder="Email o nick" required>
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
                                <input class="input" type="password" placeholder="Password" required>
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
                        </div>
                </section>
                </form>
                <section class="column">

                <form action="./usuarios/create_user.php" method="POST">
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="email" placeholder="Email" required value="correo@gmail.com">
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
                                <button class="button is-success">
                                    Si no eres usuario click aquí
                                </button>
                            </p>
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
</body>

</html>