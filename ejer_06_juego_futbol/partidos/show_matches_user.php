<?php
include '../global_user.php';
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
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" rel="stylesheet">
    <?php
    include '../includes/enlaces_head.php';
    ?>
</head>

<body>
    <main class="section">
        <div class="container">
            <a href="../acceso/acceso_user.php">
                <h1 class="title"><strong class="has-text-success">Goool!!!</strong><span
                        class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1>
            </a>
            <h2 class="title">Hola <span class="has-text-success"> <?php echo $nick?></span></h2>
            <div class="columns is-desktop">
                <section class="column is-one-quarter">
                    <aside class="menu">
                        <ul class="menu-list">
                            <li>
                                <h1 class="title"><a href="#">Panel de Usuario</a></h1>
                            </li>
                            <li><a>Cuenta de usuario</a></li>
                            <li><a href="../acceso/acceso_user.php">Recargar saldo</a></li>
                            <li class="title"><a href="#" class="is-active">Partidos</a></li>
                            <li><a href="../usuarios/controler.php?op=3">Salir</a></li>
                        </ul>

                    </aside>
                </section>
                <section class="column">
                    <div class="table-container">
                        <table class="table is-striped">
                            <thead>
                                <tr>
                                    <th><abbr title="date">Fecha de juego</abbr></th>
                                    <th><abbr title="Hour">Hora de juego</abbr></th>
                                    <th><abbr title="partido">Partido</abbr></th>
                                    <th><abbr title="result">Resultado minuto</abbr></th>
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

                                <tr id='game_<?php echo $game_id; ?>'
                                    data-date="<?php echo date("Y-m-d", strtotime($date)) ?>"
                                    data-time="<?php echo date("H:i:s", strtotime($time)) ?>"
                                    data-partido="<?php echo $game_partido ?>">
                                    <td><?php echo $date ?></td>
                                    <td><?php echo $time ?></td>
                                    <td><?php echo $game_partido ?></td>
                                    <td><?php echo $game_resultado ?></td>
                                    <td><a type="button" class="showModal" data-target="modal_editar" aria-haspopup="true" onclick="apostar(<?php echo $game_id;?>)">Apostar</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php if (isset($_GET['msg'])) { ?>
                        <p class="notification is-danger"><?php echo $_GET['msg_error'] ?></p>
                        <?php
                        }?>
                    </div>

                    <!-- Modal  APUESTA-->
                    <div id="modal_apostar" class="modal">
                        <div class="modal-background"></div>
                        <form action="" method="POST" id="form_reg_resultado">
                            <input type="hidden" id="game_id" name="game_id" />
                            <div class="modal-card">
                                <header class="modal-card-head">
                                    <p class="modal-card-title">Realizar apuesta</p>
                                </header>
                                <section class="modal-card-body">
                                <form action="" method="post"></form>
                                    <!-- Content ... -->
                                    <section class="column">
                                        <div class="field">
                                            <h2 id="partido" class="control"></h2>
                                        </div>
                                        <div class="field">
                                            <label class="label">Minuto apostado</label>
                                            <div class="control">
                                                <input class="input" type="number" id="minuto_apostado" name="minuto_apostado" min="10" max="90">
                                            </div>
                                        </div>
                                    </section>
                                    <section class="column">
                                        <div class="field">
                                          
                                        </div>
                                        <div class="field">
                                            <label class="label">Cantidad</label>
                                            <div class="control">
                                           <!-- Obtener el saldo del jugador -->
                                           <?php
                                           $user_id = $_SESSION['user_id'];
                                           $sql = "SELECT user_saldo FROM usuarios WHERE user_id = '$user_id' ";
                                           echo $sql;exit;
                                           require "../conection.php";
                                            //recogemos la consulta
                                                $datos = mysqli_query($conx, $sql);
                                                //mostramos la consulta
                                                $id = 0;
                                                if ($fila = mysqli_fetch_assoc($datos)) {
                                                    $saldo = $fila["user_saldo"];                                        
                                                }
                                                //cerramos conexión
                                                mysqli_close($conx);
                                            ?>
                                                <input class="input" type="number" id="apostada_apostada" name="apostada_apostada" min="1" max="<?php $saldo ?>">
                                            </div>
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
    // Mostrar modal apuesta
    $(".showModal").click(function() {
        $("#modal_apostar").addClass("is-active");
    });

    $("#modal-close").click(function() {
        $("#modal_apostar").removeClass("is-active");
    });
    // Fin modal


    function apostar(id) {
        var partido = $("#game_" + id).data("partido");
        $("#modal_apostar #partido").text(partido);

    }
    </script>
</body>

</html>