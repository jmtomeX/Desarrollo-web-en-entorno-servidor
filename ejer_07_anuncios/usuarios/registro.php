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
        <h1 class="title">FOR <span class="dolar">$</span>ALE</h1>

        <div class="ui two column very relaxed stackable grid">
            <div class="column">
                <h1>Registrar cuenta</h1>
                <form class="ui form" id = "form_create_user" method="POST" action ="controller.php?op=1">
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
                        <button id ="boton-registrar" type="button" class="ui fluid large teal button" >Registrar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="ui error message" id = "mensaje-error"></div>
        <?php if (isset($_GET['msg'])) { ?>
        <div class="ui error message">
            <?php echo $_GET['msg'] ?>
        </div>
        <?php }?>

    </div>
    <?php include '../includes/footer.php'; ?>

    <script>
    $(function() {
        var mensaje_error = $("#mensaje-error");
        mensaje_error.css({'visibility':'hidden'});
        $("#boton-registrar").click(function() {
            //console.log("boton-registrar.click");
            if( $("#password").val() == $("#password2").val()) {
               check_user();
            }else {
                mensaje_error.css({'visibility':'visible'});
                mensaje_error.text("Las contraseñas deben de ser iguales.");
                return;
            }
        });      
        function check_user() {
            let email = $('#email').val();
                   $.ajax({
                        type: "POST",
                        url: "./controller.php?op=4",
                        data: {
                           mail_check : email
                        } ,
                        success: function (data) {
                            console.log(data);
                            if (data > 0) {
                                mensaje_error.css({'visibility':'visible'});
                                mensaje_error.text("El correo ya está en uso.");
                            } else {
                                //Enviamos el formulario con el mail que quiere registrar:
                                $("#form_create_user").submit();
                            }
                        },
                        error: function (data) {
                            alert(" Error");
                    }
                });
        }

        // comprobar campos
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
                            type: 'empty',
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
</body>

</html>