<?php
include '../global_user.php';
require 'Equipos.php';
$user_id = $_SESSION['user_id'];
//Obtenemos los partidos en los que ha apostado el usuario:
$sql = "SELECT * FROM apuestas WHERE bet_user_id='$user_id'";
require "../conection.php";
$datos = mysqli_query($conx, $sql);
//Vamos a crear un array (dictionary) donde el indice es el ID de partido, y el contenido en esa posición es minuto y apuesta:
$apuestas = array();
while ($fila = mysqli_fetch_assoc($datos)) {

    $game_id_apostado = $fila['bet_game_id'];
    $apuestas[$game_id_apostado]['cantidad'] = $fila['bet_cant_apostada'];
    $apuestas[$game_id_apostado]['minuto'] = $fila['bet_minuto_apuesta'];
}
//Liberar el recordset para reutilizarlo con una nueva consulta:
mysqli_free_result($datos);
mysqli_close($conx);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios Goool.es</title>
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" rel="stylesheet">
    <?php
    include '../includes/enlaces_head.php';
    ?>
</head>

<body>

    <main class="section">
        <div class="container">
            <a href="../acceso/acceso_user.php">
                <h1 class="title"><strong class="has-text-success">Goool!!!</strong>
                    <span class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1>
            </a>
            <h2 class="title">Hola <span class="has-text-success"> <?php echo $nick ?></span></h2>
            <div class="columns is-desktop">
                <section class="column is-one-quarter">
                    <aside class="menu">
                        <ul class="menu-list">
                            <li>
                                <h1 class="title"><a href="#">Panel de Usuario</a></h1>
                            </li>
                            <li><a href="../usuarios/user_account.php">Cuenta de usuario</a></li>
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
                                    <th><abbr title="result">Minuto (Apuesta)</abbr></th>
                                </tr>
                            <tbody>
                                <?php
                                // Petición de partidos
                                $sql_view = "SELECT * FROM partidos order by game_fecha Asc";
                                require "../conection.php";
                                $datos = mysqli_query($conx, $sql_view);
                                while ($fila = mysqli_fetch_assoc($datos)) {
                                    $game_id = $fila['game_id'];
                                    //$game_resultado = $fila['game_resultado'];
                                    $game_partido = $fila['game_partido'];
                                    $game_fecha = $fila['game_fecha'];
                                    $date = date("Y-m-d ", strtotime($game_fecha));
                                    $time = date("H:i:s", strtotime($game_fecha));
                                    //Comprobamos si ha apostado ya en este partido:
                                    $cantidad = 0;
                                    $minuto = 0;
                                    $apostado = false;
                                    if (isset($apuestas[$game_id])) {
                                        $cantidad = $apuestas[$game_id]['cantidad'];
                                        $minuto = $apuestas[$game_id]['minuto'];
                                        $apostado = true;
                                    }
                                    ?>

                                    <tr id='game_<?php echo $game_id; ?>' data-date="<?php echo date("Y-m-d", strtotime($date)) ?>" data-time="<?php echo date("H:i:s", strtotime($time)) ?>" data-partido="<?php echo $game_partido ?>">
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $time ?></td>
                                        <td><?php echo $game_partido ?></td>
                                        <td><?php if ($apostado) echo "$minuto' ($cantidad €)" ?></td>
                                        <?php
                                            if (!$apostado) { ?>
                                            <td><a type="button" class="showModal" data-target="modal_editar" aria-haspopup="true" onclick="apostar(<?php echo $game_id; ?>)">Apostar</a>
                                            </td>
                                        <?php } ?>
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

                    <!-- Modal  APUESTA-->
                    <div id="modal_apostar" class="modal">
                        <div class="modal-background"></div>
                        <form action="./controler.php?op=5" method="POST">
                            <div class="modal-card">
                                <header class="modal-card-head">
                                    <p class="modal-card-title">Realizar apuesta</p>
                                </header>
                                <section class="modal-card-body">
                                    <!-- Content ... -->
                                    <section class="column">
                                        <div class="field">
                                            <h2 id="partido" class="control"></h2>
                                        </div>
                                        <div class="field">
                                            <label class="label">Minuto apostado</label>
                                            <div class="control">
                                                <input class="input" type="number" id="minuto_apostado" name="minuto_apostado" min="10" max="90">
                                                <input id="game_id_apuesta" name="game_id_apuesta" type="hidden"/>
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

                                                $sql = "SELECT user_saldo FROM usuarios WHERE user_id = '$user_id' ";

                                                require "../conection.php";
                                                //recogemos la consulta
                                                $datos = mysqli_query($conx, $sql);
                                                //mostramos la consulta
                                                if ($fila = mysqli_fetch_assoc($datos)) {
                                                    $saldo = $fila["user_saldo"];
                                                }
                                                //cerramos conexión
                                                mysqli_close($conx);
                                                ?>
                                                <input class="input" type="number" id="cantidad_apostada" name="cantidad_apostada" min="1" max="<?php echo $saldo ?>" />
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
            console.log("#game_" + id);
            $("#modal_apostar #partido").text(partido);
            $("#modal_apostar #game_id_apuesta").val(id);
        }
    </script>
</body>

</html>