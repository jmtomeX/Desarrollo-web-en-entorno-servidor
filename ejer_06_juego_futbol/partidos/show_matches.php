<?php
include '../global_admin.php';

$equipos = array("Barcelona", "Atlético de Madrid", "Valencia", "Athletic Club", "Sevilla", "Espanyol", "Real Sociedad", "Zaragoza", "Betis", "Celta de Vigo", "Deportivo de La Coruña", "Valladolid", "Racin de Santander", "Sportig de Gijón", "Osasuna", "Oviedo", "Mallorca", "Villarreal", "Las Plmas", "Málaga", "Rayo Vallecano", "Granada", "Getafe", "Alavés", "Levant", "Tenerife", "Murcia", "Salamanca", "Cádiz", "Logroñés", "Albacete", "Eibar", "Almería", "Córdoba", "Compostela", "Recreativo de Huelva", "Lleida", "Huesca");

// Petición de partidos
$sql_view = "SELECT * FROM partidos order by game_fecha Asc;";
require "../conection.php";
$datos = mysqli_query($conx, $sql_view);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios Goool.es</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" rel="stylesheet">
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
                            <li>
                                <h1 class="title"><a href="../acceso/acceso_admin.php">Panel de administrador</a></h1>
                            </li>
                            <li><a href="#">Cuentas de usuarios</a></li>
                            <li><a href="./registro_partido.php">Registrar partidos</a></li>
                            <li><a class="is-active" href="#">Partidos</a></li>
                            <li><a href="../usuarios/controler.php?op=3">Salir</a></li>
                        </ul>
                    </aside>
                </section>
                <section class="column">
                    <div class="table-container">
                        <table class="table is-striped">
                            <thead>
                                <tr>
                                    <th><abbr title="id">id</abbr></th>
                                    <th><abbr title="date">Fecha de juego</abbr></th>
                                    <th><abbr title="Hour">Hora de juego</abbr></th>
                                    <th><abbr title="partido">Partido</abbr></th>
                                    <th><abbr title="result">Resultado minuto</abbr></th>
                                    <th><abbr title="Delete">Eliminar Partido</abbr></th>
                                    <th><abbr title="Delete">Editar Partido</abbr></th>
                                </tr>
                            <tbody>
                                <?php
                                while ($fila = mysqli_fetch_assoc($datos)) {
                                    $game_id = $fila['game_id'];
                                    $game_resultado = $fila['game_resultado'];

                                    $game_partido = $fila['game_partido'];
                                    $game_fecha = $fila['game_fecha'];
                                    $date = date("Y-m-d ", strtotime($game_fecha));
                                    $time = date("H:i:s", strtotime($game_fecha));

                                    ?>

                                    <tr>
                                        <th><?php echo $game_id ?></th>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $time ?></td>
                                        <td><?php echo $game_partido ?></td>
                                        <td><?php echo  $game_resultado ?></td>
                                        <td><a href="#"><span class="icon has-text-danger">
                                                    <i class="fas fa-ban"></i>
                                                </span></a></td>
                                        <td><a type="button" class="showModal" data-target="modal-ter" aria-haspopup="true"><span class="icon has-text-success">
                                                    <i class="fas fa-check-square"></i>
                                                </span></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>



                        </table>
                    </div>
                    <!-- Modal  -->
                    <div class="modal">
                        <div class="modal-background"></div>
                        <div class="modal-card">
                            <header class="modal-card-head">
                                <p class="modal-card-title">Modificar Partido</p>
                            </header>
                            <section class="modal-card-body">
                                <!-- Content ... -->
                                <section class="column">
                                    <form action="./controler.php?op=1" method="POST" id="form_reg_match">
                                        <div class="field">
                                            <label class="label">Día de juego</label>
                                            <div class="control">
                                                <input class="input" type="date" id="date" name="date" required>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label">Hora de juego</label>
                                            <div class="control">
                                                <input class="input" type="time" id="time" name="time" required>
                                            </div>
                                        </div>
                                </section>
                                <section class="column">
                                    <div class="columns is-desktop">
                                        <section class="column">
                                            <div class="field">
                                                <label class="label">Equipo local</label>
                                                <div class="control">
                                                    <div class="select">
                                                        <select id="team_local" name="team_local" required>
                                                            <option>Equipo local</option>
                                                            <?php
                                                            /*$recogerEquipos = new Equipos;
                                                $equiposFut = $recogerEquipos->equipos;*/
                                                            foreach ($equipos as &$equipo) {
                                                                ?>
                                                                <option><?php echo $equipo ?></option>
                                                            <?php
                                                            }
                                                            ?>

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
                                                        <select id="team_visitor" name="team_visitor">
                                                            <option>Equipo visitante</option>
                                                            <?php
                                                            foreach ($equipos as &$equipo) {
                                                                ?>
                                                                <option><?php echo $equipo ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                                </form>
                                <!-- Fin Content ... -->
                            </section>
                            <footer class="modal-card-foot">
                                <button class="button is-success">Guardar</button>
                                <button class="button" id="modal-close">Cancelar</button>
                            </footer>
                        </div>
                    </div>
                    <!-- Modal fin -->

                </section>

            </div>
    </main>
    <?php include '../includes/footer.php' ?>
    <script>
        $(".showModal").click(function() {
            $(".modal").addClass("is-active");
        });

        $("#modal-close").click(function() {
            $(".modal").removeClass("is-active");
        });
    </script>
</body>

</html>