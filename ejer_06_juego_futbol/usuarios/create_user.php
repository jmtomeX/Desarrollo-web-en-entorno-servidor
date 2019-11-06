<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Adivina Gol</title>
  <?php include '../includes/enlaces_head.php';
    require '../global.php';

    if (!isset($_GET['msg'])) {
      $_GET['msg'] = "";
  }
  $msg = $_GET['msg'];
  

   if (!isset($_GET['msg_error'])) {
      $_GET['msg_error'] = "";
    }
  $msg = $_GET['msg_error'];
  
  $mail_check="";
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
       <!-- FORMULARIO -->
      <div class="columns is-desktop">
        <section class="column">
          <form action="" method="POST">
            <div class="field is-horizontal">
              <div class="field-label is-normal">
              </div>
              <div class="field-body">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input class="input" type="text" placeholder="Nick">
                    <span class="icon is-small is-left">
                      <i class="fas fa-user"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                  <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input is-success" type="email" placeholder="Email" value= "<?php echo $mail_check ?>" required>
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
                      <input class="input" type="text" placeholder="Password">
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
                      <input class="input" type="text" placeholder="Repita Password">
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
                    <button class="button is-primary">
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
</body>

</html>