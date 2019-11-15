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
                                <h1 class="title"><a href="../acceso/acceso_admin.php" class="is-active">Panel de
                                        administrador</a></h1>
                            </li>
                            <li><a href="../usuarios/user_accounts.php">Cuentas de usuarios</a></li>
                            <li><a href="../partidos/registro_partido.php">Registrar partidos</a></li>
                            <li><a onclick="showBets()">Apuestas</a></li>
                            <li><a href="../partidos/show_matches.php">Partidos</a></li>
                            <li><a href="../partidos/sw_pagos.php">Pagos</a></li>
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

                    <table id="tabla" class="table is-striped">
                        <thead>
                            <tr>
                                <th><abbr>Cantidad Apuesta</abbr></th>
                                <th><abbr>Minuto Apuesta</abbr></th>
                                <th><abbr>Partido</abbr></th>
                                <th><abbr>Fecha de juego</abbr></th>
                                <th><abbr>Fecha Apuesta</abbr></th>
                                <th><abbr>Premio</abbr></th>
                                <th><abbr>Estado</abbr></th>
                                <th><abbr>Nick</abbr></th>
                                <th><abbr>Mail</abbr></th>
                                <th><abbr>Saldo</abbr></th>
                            </tr>
                        <tbody id="table_bets"></tbody>
                    </table>
                </section>
            </div>
        </div>

    </main>
    <?php include '../includes/footer.php' ?>
    <script>
    $(function() {
        $("#tabla").css("display", "none"); 
    });

    function showBets() {
        $("#tabla").fadeIn(1000).css("display", "block"); 
        $.ajax({
            type: "GET",
            url: "../partidos/sw_apuestas.php",
            success: function(data) {
                console.log(data);
                //var obj = JSON.parse(data);
                if (data.length > 0) {
                    $("#table_bets").empty();
                    for (var i = 0; i < data.length; i++) {
                        $("#table_bets").append("<tr>");

                        $("#table_bets").append("<td>" + data[i].bet_cant_apostada + "€</td>");
                        $('#table_bets').append("<td>" + data[i].bet_minuto_apuesta + "</td>");
                        $('#table_bets').append("<td>" + data[i].game_partido + "</td>");
                        $('#table_bets').append("<td>" + data[i].game_fecha + "</td>");
                        $('#table_bets').append("<td>" + data[i].bet_fecha_apuesta + "</td>");
                        $('#table_bets').append("<td>" + data[i].bet_premio + "</td>");
                        $('#table_bets').append("<td>" + data[i].bet_estado + "</td>");

                        $('#table_bets').append("<td>" + data[i].user_nick + "</td>");
                        $('#table_bets').append("<td>" + data[i].user_mail + "</td>");
                        $('#table_bets').append("<td>" + data[i].user_saldo + "</td>");

                        
                        $("#table_bets").append("</tr>");

                    }
                } else {
                    alert(data.msg);
                }
            },
            error: function(data) {
                alert("Error");
            }
        });
    }
    </script>
</body>

</html>