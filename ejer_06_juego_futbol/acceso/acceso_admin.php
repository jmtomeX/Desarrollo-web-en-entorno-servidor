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
                                <h1 class="title"><a href="../acceso/acceso_admin.php" class="is-active">Panel de administrador</a></h1>
                            </li>
                            <li><a>Cuentas de usuarios</a></li>
                            <li><a href="../partidos/registro_partido.php">Registrar partidos</a></li>
                            <li><a href="../partidos/show_matches.php">Partidos</a></li>
                            <li><a href="../usuarios/controler.php?op=3">Salir</a></li>
                        </ul>
                    </aside>
                </section>
                <section class="column">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident consequuntur voluptatem repellat, adipisci soluta ducimus, illo dolorem voluptates similique blanditiis eius eligendi officia reiciendis molestiae, beatae sit. Sapiente, inventore vel.</p>

                </section>
            </div>
        </div>

    </main>
    <?php include '../includes/footer.php' ?>
</body>

</html>