<?php
   include '../global_user.php';
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
      <h1 class="title"><strong class="has-text-success">Goool!!!</strong><span class="has-text-info is-size-3 is-size-1-desktop">.</span>es</h1>
      <h2 class="title">Hola <span class="has-text-success"> <?php echo $nick?></span></h2>
      <div class="columns is-desktop">
        <section class="column">
          <aside class="menu">
            <ul class="menu-list">
              <a class="is-active">Panel de usuario</a>
              <li><a>Cuenta de usuario</a></li>
              <li><a>Recargar saldo</a></li>
              <li><a>Partidos</a></li>
              <li><a href = "../usuarios/controler.php?op=3">Salir</a></li>
            </ul>

          </aside>
          </section>
            <section class="column"> 
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident consequuntur voluptatem repellat, adipisci soluta ducimus, illo dolorem voluptates similique blanditiis eius eligendi officia reiciendis molestiae, beatae sit. Sapiente, inventore vel.</p>
              <h1 class="title">
                Saldo <span id="saldo" class="has-text-success">0</span>
               €
              </h1>

            </section>
      </div>
    </div>
  </main>
  <?php include '../includes/footer.php' ?>

  
</body>

</html>