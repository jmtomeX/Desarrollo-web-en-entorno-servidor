<?php
include '../global_admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios Goool.es</title>
    <?php
    include '../includes/enlaces_head.php';
    ?>
</head>

<body>
    <main class="section">
        <div class="container">
            <a href="./acceso_admin.php">
                <h1 class="title"><strong class="has-text-success">Goool!!!</strong><span
                        class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1>
            </a>
            <div class="columns is-desktop">
                <section class="column is-one-quarter">
                    <aside class="menu">
                        <ul class="menu-list">
                            <li>
                                <h1 class="title"><a href="../acceso/acceso_admin.php" class="is-active"
                                        id="panel">Panel de
                                        administrador</a></h1>
                            </li>
                            <li><a href="../usuarios/user_accounts.php">Cuentas de usuarios</a></li>
                            <li><a href="../partidos/registro_partido.php">Registrar partidos</a></li>
                            <li id="li-movimientos"><a onclick="showMov()" id="movimientos">Movimientos caja</a></li>
                            <li id="li-apuestas"><a onclick="showBets()" id="apuestas">Apuestas</a></li>
                            <li><a href="../partidos/show_matches.php">Partidos</a></li>
                            <li><a href="../usuarios/controler.php?op=3">Salir</a></li>
                        </ul>
                    </aside>
                </section>
                <section class="column">
                    <?php
                    $sql = "SELECT sum(mov_cantidad) AS total FROM movs";
                    require "../conection.php";
                    $datos = mysqli_query($conx, $sql);
                    if ($fila = mysqli_fetch_assoc($datos)) {
                        $mov_cantidad_total = $fila['total'];
                    }
                    mysqli_close($conx);
                    ?>
                    <h1 class="title">Total en caja <strong class="has-text-success">
                            <?php echo $mov_cantidad_total; ?></strong><span
                            class="has-text-info is-size-3 is-size-1-desktop"> €</span></h1>
                    <!-- Tabla apuestas -->
                    <table id="tabla-apuestas" class="table is-striped">
                        <thead>
                            <tr>
                                <th><abbr>Cantidad Apuesta</abbr></th>
                                <th><abbr>Minuto Apuesta</abbr></th>
                                <th><abbr>Minuto gol</abbr></th>
                                <th><abbr>Partido</abbr></th>
                                <th><abbr>Fecha de juego</abbr></th>
                                <th><abbr>Fecha Apuesta</abbr></th>
                                <th><abbr>Premio</abbr></th>
                                <th><abbr>Estado</abbr></th>
                                <th><abbr>Nick</abbr></th>
                                <th><abbr>Mail</abbr></th>
                            </tr>
                        <tbody id="table_bets"></tbody>
                    </table>
                    <!-- Tabla movimientos -->
                    <table id="tabla-movimientos" class="table is-striped">
                        <thead>
                            <tr>
                                <th><abbr>Movimientos número</abbr></th>
                                <th><abbr>Usuario</abbr></th>
                                <th><abbr>Cantidad</abbr></th>
                                <th><abbr>Fecha</abbr></th>
                            </tr>
                        <tbody id="table_mov"></tbody>
                    </table>
                </section>
            </div>
        </div>

    </main>
    <?php include '../includes/footer.php' ?>
    <script src="../assets/js/main.js"></script>
</body>
</html>