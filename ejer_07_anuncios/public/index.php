<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require '../includes/headers.php';?>
</head>

<body>
    <div class="ui container">
        <h1 class="title">FOR SALE</h1>
        <div class="ui placeholder segment">
            <div class="ui two column very relaxed stackable grid">
                <div class="column">
                    <form class="ui large form" action="../usuarios/controller.php?op=2" method="post">
                        <div class="ui form">
                            <div class="field">
                                <label>Email</label>
                                <div class="ui left icon input">
                                    <input type="email" name="email" id="email" placeholder="Email" value="jm@jm.com">
                                    <i class="user icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <label>Password</label>
                                <div class="ui left icon input">
                                    <input type="password" name="password" id="password" placeholder="Password"
                                        value="1234">
                                    <i class="lock icon"></i>
                                </div>
                            </div>
                            <button type="submit" class="ui fluid large teal submit button">Entrar</button>
                    </form>
                    <!-- mensaje error -->
                    <?php if (isset($_GET['msg'])) { ?>
                    <div class="ui message">
                        <i class="close icon"></i>
                        <div class="header">
                        </div>
                        <p><?php echo $_GET['msg']?></p>
                    </div> <?php } ?>

                    <!-- Fin mensaje error -->
                </div>
            </div>
            <div class="middle aligned column">
                <a href="../usuarios/registro.php" class="ui big button">
                    <i class="signup icon"></i>
                    Crea tu cuenta
                </a>
            </div>
        </div>
        <div class="ui vertical divider">
            O
        </div>
    </div>
    
    <script>
    $(document)
        .ready(function() {
            $('.ui.form')
                .form({
                    fields: {
                        email: {
                            identifier: 'email',
                            rules: [{
                                    type: 'empty',
                                    prompt: 'Ingresa tu correo'
                                },
                                {
                                    type: 'email',
                                    prompt: 'Ingresa un email valido'
                                }
                            ]
                        },
                        password: {
                            identifier: 'password',
                            rules: [{
                                    type: 'empty',
                                    prompt: 'Ingresa tu password'
                                },
                                {
                                    type: 'length[4]',
                                    prompt: 'Su contraseña debe tener al menos 4 caracteres.'
                                }
                            ]
                        }
                    }
                });
            // cerrar mensaje
            $('.message .close')
                .on('click', function() {
                    $(this)
                        .closest('.message')
                        .transition('fade');
                });
        });
    </script>
</body>

</html>