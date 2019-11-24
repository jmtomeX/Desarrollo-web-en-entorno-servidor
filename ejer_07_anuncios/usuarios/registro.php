<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require '../includes/headers.php';?>
    <title>Registro</title>
</head>

<body>
    <div class="ui text container">
        <h1 class="title">FOR SALE</h1>

        <div class="ui two column very relaxed stackable grid">
            <div class="column">
                <h1>Registrar cuenta</h1>
                <form action="./controller.php?op=1" method="post" class="ui form">
                    <div class="field">
                        <label for="email">Email <br><input type="text" name="email" id="email" required></label>
                    </div>
                    <div class="field">
                        <label for="nombre">Nombre <br><input type="text" name="nombre" id="nombre" required></label>
                    </div>
                    <div class="field">
                        <label for="password">Password <br><input type="password" name="password" id="password"
                                required></label><br>
                    </div>
                    <div class="field">
                        <label for="password2">Repita el password <br><input type="password" name="password2"
                                id="password2" required></label><br>
                    </div>
                    <div class="field">
                        <button type="submit" class="ui fluid large teal submit button">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if (isset($_GET['msg'])) { ?>
        <div class="ui error message">
            <?php echo $_GET['msg'] ?>
        </div>
        <?php }?>

        <div class="column">

        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    <!-- https://semantic-ui.com/modules/sidebar.html -->

    <script>
    $(function() {
        $('.ui.form')
            .form({
                fields: {
                    email: {
                        identifier: 'email',
                        rules: [{
                            type: 'empty',
                            prompt: 'Por favor ingresa un correo'
                        }]
                    },
                    nombre: {
                        identifier: 'nombre',
                        rules: [{
                            type: 'empty,
                            prompt: 'por favor ingresa tu nombre'
                        }]
                    },
                    gender: {
                        identifier: 'gender',
                        rules: [{
                            type: 'empty',
                            prompt: 'Please select a gender'
                        }]
                    },
                    password: {
                        identifier: 'password',
                        rules: [{
                            type: 'empty',
                            prompt: 'por favor ingresa un password'
                        }, {
                            type: 'minLength[6]',
                            prompt: 'Debe tener minimo de {ruleValue} carácteres'
                        }]
                    },
                    password2: {
                        identifier: 'password2',
                        rules: [{
                            type: 'empty',
                            prompt: 'por favor ingresa un password'
                        }, {
                            type: 'minLength[6]',
                            prompt: 'Debe tener minimo de {ruleValue} carácteres'
                        }]
                    }
                }
            });
    });
    </script>
    </div>
</body>

</html>