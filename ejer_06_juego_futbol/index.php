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

                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="email" placeholder="Email o nick">
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
                            <input class="input" type="password" placeholder="Password">
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
                <section class="column">
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="email" placeholder="Email">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-check"></i>
                            </span>
                        </p>
                    </div>
                    <a href="#" class="principal-color">
                        <div class="button is-success is-light ">
                            Si no eres usuario ingresa tu correo.
                        </div>
                    </a>
                </section>

            </div>
        </div>
    </main>
    <?php include './includes/footer.php' ?>
</body>

</html>