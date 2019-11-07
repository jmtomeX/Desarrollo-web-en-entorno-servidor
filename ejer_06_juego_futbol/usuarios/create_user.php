<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Adivina Gol</title>
  <?php include '../includes/enlaces_head.php';
  require '../global_user.php';

  if (!isset($_GET['msg'])) {
    $_GET['msg'] = "";
  }
  $msg = $_GET['msg'];


  if (!isset($_GET['msg_error'])) {
    $_GET['msg_error'] = "";
  }
  $msg = $_GET['msg_error'];

  $mail_check = "";
  if (isset($_POST['mail_check'])) {
    $mail_check = $_POST['mail_check'];
  }



  ?>
</head>

<body>
  <main class="section">
    <div class="container">
      <h1 class="title">
        Date de alta en <strong class="has-text-success">Goool!!!</strong><span class="has-text-info is-size-3 is-size-1-desktop">.</span>es
      </h1>
      <div class="columns is-desktop">
        <section class="column">
            <!-- FORMULARIO -->
  
          <form id="form_create_user" action="../usuarios/controler.php?op=1" method="POST">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input class="input" id = "nick" name = "nick" type="text" placeholder="Nick">
                    <span class="icon is-small is-left">
                      <i class="fas fa-user"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                  <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input is-success" id = "email" name = "email" type="email" placeholder="Email" value="<?php echo $mail_check ?>" required>
                    <span class="icon is-small is-left">
                      <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                      <i class="fas fa-check"></i>
                    </span>
                  </p>
                </div>
              </div>
            </div>


            <div class="field is-horizontal">
              <div class="field-label"></div>
              <div class="field-body">
                <div class="field is-expanded">
                  <div class="field has-addons">
                    <p class="control is-expanded">
                      <input class="input" id = "password1" name = "password1" type="text" placeholder="Password">
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="field is-horizontal">
              <div class="field-label"></div>
              <div class="field-body">
                <div class="field is-expanded">
                  <div class="field has-addons">
                    <p class="control is-expanded">
                      <input class="input" id = "password2" name = "password2" type="text" placeholder="Repita Password">
                    </p>
                  </div>
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
                  <button type="button" class="button is-success" onclick="check_password()">
                      Crear cuenta
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>

      </div>
    </div>
  </main>
  <?php include '../includes/footer.php' ?>
  <script>

function check_password() {
    let passw1 = $('#password1').val();
    let passw2 = $('#password2').val();
           $.ajax({
                type: "POST",
                url: "./usuarios/sw_check_password.php",
                data: {
                  passw1 : passw1,
                  passw2 : passw2
                }
                ,
                success: function (data) {
                    console.log(data);
                    if (data > 0) {
                        $("#error_check_user").html("<br><div class='notification is-danger'>El correo ya está en uso.</div>");
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
</script>
</body>

</html>