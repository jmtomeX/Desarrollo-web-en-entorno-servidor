<?php
include '../global_admin.php';
require './Equipos.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="./bulma_date_time.js"></script>
    <title>Registrar partido Goool.es</title>

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
                            <li><a>Cuentas de usuarios</a></li>
                            <li><a class="is-active">Registrar partidos</a></li>
                            <li><a href="./show_matches.php">Partidos</a></li>
                            <li><a href="../usuarios/controler.php?op=3">Salir</a></li>
                        </ul>
                    </aside>
                </section>
                <div class="columns is-desktop">
                    <section class="column">
                        <!-- FORMULARIO -->

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
                                                foreach ($equiposFut as &$equipo) {
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

                        <div class="columns is-desktop">
                            <section class="column">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <input type="submit" class="button is-link" value="Registrar partido"></input>
                                    </div>
                                </div>
                                <?php if (isset($_GET['msg'])) { ?>
                                    <p class="notification is-danger"><?php echo $_GET['msg'] ?></p>
                                <?php
                                } ?>
                        </div>
                    </section>
                    </form>
                </div>

    </main>
    <?php include '../includes/footer.php' ?>

</body>

</html>