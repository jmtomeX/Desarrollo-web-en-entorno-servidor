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
        <section class="column is-one-quarter">
          <aside class="menu">
            <ul class="menu-list">
              <li> <h1 class="title"><a href="../acceso/acceso_admin.php">Panel de administrador</a></h1>
              </li>
              <li><a>Cuentas de usuarios</a></li>
              <li><a class="is-active">Registrar partidos</a></li>
              <li><a href = "./show_matches.php">Partidos</a></li>
              <li><a href="../usuarios/controler.php?op=3">Salir</a></li>
            </ul>
          </aside>
        </section>
        <div class="columns is-desktop">
          <section class="column">
            <!-- FORMULARIO -->
            <div class="field">
              <label class="label">Día de juego</label>
              <div class="control">
                <input class="input" type="date">
              </div>
            </div>
          </section>
          <section class="column">
            <div class="field">
              <label class="label">Hora de juego</label>
              <div class="control">
                <input class="input" type="time">
              </div>
            </div>

            <div class="field">
              <label class="label">Resultado</label>
              <div class="control">
                <input class="input" type="number" min ="1" max="90">
              </div>
            </div>



            <div class="columns is-desktop">
              <section class="column">
                <div class="field">
                  <label class="label">Equipo local</label>
                  <div class="control">
                    <div class="select">
                      <select>
                        <option>Barcelona</option>
                        <option>Atlético de Madrid</option>
                        <option>Valencia</option>
                        <option>Athletic Club</option>
                        <option>Sevilla</option>
                        <option>Espanyol</option>
                        <option>Real Sociedad</option>
                        <option>Zaragoza</option>
                        <option>Betis</option>
                        <option>Celta de Vigo</option>
                        <option>Deportivo de La Coruña</option>
                        <option>Valladolid</option>
                        <option>Racin de Santander</option>
                        <option>Sportig de Gijón</option>
                        <option>Osasuna</option>
                        <option>Oviedo</option>
                        <option>Mallorca</option>
                        <option>Villarreal</option>
                        <option>Las Plmas</option>
                        <option>Málaga</option>
                        <option>Rayo Vallecano</option>
                        <option>Granada</option>
                        <option>Getafe</option>
                        <option>Elche</option>
                        <option>CD Málaga</option>
                        <option>Hércules</option>
                        <option>Alavés</option>
                        <option>Levant</option>
                        <option>Tenerife</option>
                        <option>Murci</option>
                        <option>Salamanca</option>
                        <option>Sabadell</option>
                        <option>Cádiz</option>
                        <option>Logroñés</option>
                        <option>Castellón</option>
                        <option>Albacete</option>
                        <option>Eibar</option>
                        <option>Almerí</option>
                        <option>Córdoba</option>
                        <option>Compostela</option>
                        <option>Recreativo de Huelva</option>
                        <option>Real Unión</option>
                        <option>AD Almería</option>
                        <option>Europa</option>
                        <option>Lleida</option>
                        <option>Xerez</option>
                        <option>Huesca</option>
                        <option>Condal</option>
                      </select>
                    </div>
                  </div>
                </div>
              </section>
              <section class="column">
                <div class="field">
                  <label class="label">Equipo visitante</label>
                  <div class="control">
                    <div class="select">
                      <select>
                        <option>Atlético de Madrid</option>
                        <option>Barcelona</option>
                        <option>Valencia</option>
                        <option>Athletic Club</option>
                        <option>Sevilla</option>
                        <option>Espanyol</option>
                        <option>Real Sociedad</option>
                        <option>Zaragoza</option>
                        <option>Betis</option>
                        <option>Celta de Vigo</option>
                        <option>Deportivo de La Coruña</option>
                        <option>Valladolid</option>
                        <option>Racin de Santander</option>
                        <option>Sportig de Gijón</option>
                        <option>Osasuna</option>
                        <option>Oviedo</option>
                        <option>Mallorca</option>
                        <option>Villarreal</option>
                        <option>Las Plmas</option>
                        <option>Málaga</option>
                        <option>Rayo Vallecano</option>
                        <option>Granada</option>
                        <option>Getafe</option>
                        <option>Elche</option>
                        <option>CD Málaga</option>
                        <option>Hércules</option>
                        <option>Alavés</option>
                        <option>Levant</option>
                        <option>Tenerife</option>
                        <option>Murci</option>
                        <option>Salamanca</option>
                        <option>Sabadell</option>
                        <option>Cádiz</option>
                        <option>Logroñés</option>
                        <option>Castellón</option>
                        <option>Albacete</option>
                        <option>Eibar</option>
                        <option>Almería</option>
                        <option>Córdoba</option>
                        <option>Compostela</option>
                        <option>Recreativo de Huelva</option>
                        <option>Real Unión</option>
                        <option>AD Almería</option>
                        <option>Europa</option>
                        <option>Lleida</option>
                        <option>Xerez</option>
                        <option>Huesca</option>
                        <option>Condal</option>
                      </select>
                      </select>
                    </div>
                  </div>
                </div>
              </section>
            </div>


            <div class="columns is-desktop">
              <section class="column">
                <div class="field">
                  <label class="label">Partido jugado</label>
                  <div class="control">
                    <label class="radio">
                      <input type="radio" name="question">
                      Si
                    </label>
                    <label class="radio">
                      <input type="radio" name="question" checked>
                      No
                    </label>
                  </div>
                </div>

                <div class="field is-grouped">
                  <div class="control">
                    <button type="submit" class="button is-link">Submit</button>
                  </div>
                  <div class="control">
                    <button class="button is-link is-light">Cancel</button>
                  </div>
                </div>


              </section>

            </div>

  </main>
  <?php include '../includes/footer.php' ?>
</body>

</html>