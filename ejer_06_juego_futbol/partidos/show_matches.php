<?php
include '../global_admin.php';

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
                                    while($fila = mysqli_fetch_assoc($datos)) {
                                 $game_id = $fila['game_id'];
                                 $game_resultado = $fila['game_resultado'];
                  
                                 $game_partido = $fila['game_partido'];
                                 $game_fecha = $fila['game_fecha'];
                                  $date = date("Y-m-d ", strtotime($game_fecha)); 
                                  $time = date("H:i:s", strtotime($game_fecha)); 
                                  
              ?>

                                <tr>
                                    <th><?php echo $game_id ?></th>
                                    <td><?php echo $date?></td>
                                    <td><?php echo $time ?></td>
                                    <td><?php echo $game_partido ?></td>
                                    <td><?php echo  $game_resultado ?></td>
                                    <td><a href="#"><span class="icon has-text-danger">
                                                <i class="fas fa-ban"></i>
                                            </span></a></td>
                                    <td><a href="#"><span class="icon has-text-success">
                                                <i class="fas fa-check-square"></i>
                                            </span></a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
    </main>
    <?php include '../includes/footer.php' ?>
</body>

</html>