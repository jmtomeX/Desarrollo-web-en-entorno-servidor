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
                <h1 class="title"><strong class="has-text-success">Goool!!!</strong><span class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1>
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
                            <li><a href=>Apuestas</a></li>
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
                    <h1 class="title">Total en caja <strong class="has-text-success"><?php echo $mov_cantidad_total; ?></strong><span class="has-text-info is-size-3 is-size-1-desktop"> €</span></h1>

                </section>
            </div>
        </div>

    </main>
    <?php include '../includes/footer.php' ?>
    <script>
           function showBets() {
                   
                   $.ajax({
                        type: "POST",
                        url: "../partidos/sw_apuestas.php",
                        success: function (data) {
                            console.log(data);
                            //var obj = JSON.parse(data);
                            if (data.res >0) {
                        
                                /* 
                                data.res
                                    data.bet_cant_apostada
                                    data.bet_minuto_apuesta
                                    data.bet_fecha_apuesta
                                    data.bet_premio
                                    data.bet_estado

                                    data.user_nick
                                    data.user_mail
                                    data.user_saldo
                                    
                                    data.game_partido
                                    data.game_fecha
                                    */
                                //Refresco la fila
                                $('#info_enlace_'+enl_id).text(enl_titulo);
                                $('#info_enlace_'+enl_id).attr("href",enl_url);
                            } else {
                                alert(data.msg);
                            }
                        },
                        error: function (data) {
                            alert(" Error");
                    }
                });
            }
    </script>
</body>

</html>