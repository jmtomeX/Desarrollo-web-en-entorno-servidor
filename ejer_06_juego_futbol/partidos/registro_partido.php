<?php
    include '../global_admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="./bulma_date_time.js"></script>
    <title>Usuarios Goool.es</title>
    <?php
    include '../includes/enlaces_head.php';
    ?>
</head>

<body>
    <main class="section">
        <div class="container">
        <a href="../acceso/acceso_admin.php">
            <h1 class="title"><strong class="has-text-success">Goool!!!</strong><span class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1>
            </a>
            <div class="columns is-desktop">
                <section class="column">
                    <aside class="menu">
                        <ul class="menu-list">
                            <li>Panel de administrador</li>
                            <li><a>Cuentas de usuarios</a></li>
                            <li><a class="is-active">Registrar partidos</a></li>
                            <li><a>Partidos</a></li>
                            <li><a href = "../usuarios/controler.php?op=3">Salir</a></li>
                        </ul>
                    </aside>
                </section>
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
                    <input class="input is-success" id = "input_fecha" name = "fecha_partido" type="datetime" placeholder="Fecha" value="" required>
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
                      <input class="input" id = "" name = "" type="text" placeholder="Repita Password">
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
                  <button type="button" class="button is-success">
                      Registrar partido
                    </button>
                  </div>
                </div>
                <div id="error_check_passw"></div>
              </div>
            </div>
          </form>


                </section>
            </div>
        </div>

    </main>
    <?php include '../includes/footer.php' ?>
</body>

</html>