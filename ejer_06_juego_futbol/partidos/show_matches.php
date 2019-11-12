<?php
include '../global_admin.php';
require 'Equipos.php';

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
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" rel="stylesheet">
    <?php
    include '../includes/enlaces_head.php';
    ?>
</head>

<body>
    <main class="section">
        <div class="container">
            <a href="../acceso/acceso_admin.php">
                <h1 class="title"><strong class="has-text-success">Goool!!!</strong><span
                        class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1>
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
                                    // desglosar equipos
                                    $game = explode(" - ", $game_partido);
                                    $team1 = $game[0];
                                    $team2 = $game[1];
                                    ?>

                                <tr  id='game_<?php echo $game_id; ?>' 
                                    data-date="<?php echo date("Y-m-d",strtotime($date)) ?>"
                                    data-time="<?php echo date("H:i:s",strtotime($time)) ?>"
                                    data-team1="<?php echo $team1 ?>"
                                    data-team2="<?php echo $team2 ?>"
                                 
                                    >
                                    <th><?php echo $game_id ?></th>
                                    <td><?php echo $date ?></td>
                                    <td><?php echo $time ?></td>
                                    <td><?php echo $game_partido ?></td>
                                    <td><?php echo  $game_resultado ?></td>
                                    <td><a href="#"><span class="icon has-text-danger">
                                                <i class="fas fa-ban"></i>
                                            </span></a></td>
                                    <td><a type="button" class="showModal" data-target="modal-ter"
                                            aria-haspopup="true"><span class="icon has-text-success"
                                                onclick="editMatch(<?php echo $game_id; ?>)">
                                                <i class="fas fa-check-square"></i>
                                            </span></a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>


                        </table>
                        <?php if (isset($_GET['msg'])) { ?>
                                    <p class="notification is-danger"><?php echo $_GET['msg'] ?></p>
                                <?php
                                } ?>
                    </div>
                    <!-- Modal  -->
                    <div id="modal_editar" class="modal">
                        <div class="modal-background"></div>
                        <form action="./controler.php?op=2" method="POST" id="form_reg_match">
                        <input type="hidden" id="game_id" name="game_id" />
                        <div class="modal-card">
                            <header class="modal-card-head">
                                <p class="modal-card-title">Modificar Partido</p>
                            </header>
                            <section class="modal-card-body">
                                <!-- Content ... -->
                                <section class="column">
                                    
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
                                                $recogerEquipos = new Equipos();
                                                $equiposFut = $recogerEquipos->equipos;
                                                foreach ($equiposFut as &$equipo) {
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
                                                $recogerEquipos = new Equipos();
                                                $equiposFut = $recogerEquipos->equipos;
                                                foreach ($equiposFut as &$equipo) {
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
                                    </div>
                                </section>
                                
                                <!-- Fin Content ... -->
                            </section>
                            <footer class="modal-card-foot">
                                <button class="button is-success" type="submit">Guardar</button>
                                <button class="button" id="modal-close" type="button">Cancelar</button>
                            </footer>
                        </div>
                        </form>
                    </div>
                    <!-- Modal fin -->

                </section>

            </div>
    </main>
    <?php include '../includes/footer.php' ?>
    <script>
    // Mostrar modal
    $(".showModal").click(function() {
        $(".modal").addClass("is-active");
    });

    $("#modal-close").click(function() {
        $(".modal").removeClass("is-active");
    });
    // Fin modal

    function editMatch(id) {
        var fecha = $("#game_"+id).data("date");
        var time = $("#game_"+id).data("time");
        var team1 = $("#game_"+id).data("team1");
        var team2 = $("#game_"+id).data("team2");
        $("#modal_editar #game_id").val(id);
        $("#modal_editar #date").val(fecha);
        $("#modal_editar #time").val(time);
        $("#modal_editar #team_local").val(team1).attr("selected","selected");
        $("#modal_editar #team_visitor").val(team2).attr("selected","selected");
    }

    function updateModal(){

    }
    </script>
</body>

</html>