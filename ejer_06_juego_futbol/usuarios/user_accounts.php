<?php
include '../global_admin.php';

// Petición de partidos
$sql_view = "SELECT * FROM usuarios order by user_id Asc;";
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
                            <li><a href="#" class="is-active">Cuentas de usuarios</a></li>
                            <li><a href="../partidos/registro_partido.php">Registrar partidos</a></li>
                            <li><a href="../partidos/show_matches.php">Partidos</a></li>
                            <li><a href="./usuarios/controler.php?op=3">Salir</a></li>
                        </ul>
                    </aside>
                </section>
                <section class="column">
                    <div class="table-container">
                        <table class="table is-striped">
                            <thead>
                                <tr>
                                    <th><abbr title="id"> ID</abbr></th>
                                    <th><abbr title="nick">Nick</abbr></th>
                                    <th><abbr title="email">Email</abbr></th>
                                    <th><abbr title="pasword">Password</abbr></th>
                                    <th><abbr title="saldo">Saldo</abbr></th>
                                </tr>
                            <tbody>
                                <?php
                            while($fila = mysqli_fetch_assoc($datos)){
                                $user_id = $fila['user_id'];
                                $user_mail = $fila['user_mail'];
                                $user_password = $fila['user_password'];
                                $user_nick = $fila['user_nick'];
                                $user_saldo = $fila['user_saldo'];
                                ?>
                                <tr>
                                    <th><?php echo $user_id ?></th>
                                    <td><?php echo $user_nick ?></td>
                                    <td><?php echo $user_mail ?></td>
                                    <td><?php echo $user_password ?></td>
                                    <td><?php echo $user_saldo ?></td>

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