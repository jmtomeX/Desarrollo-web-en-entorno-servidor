<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['us_name'])) {
    $name =  $_SESSION['us_name'];
}
$id_anuncio = $_GET['id'];
require '../models/CAnuncio.php';
$un_anuncio = new CAnuncio();
$anuncio = $un_anuncio -> cargarAnuncio($id_anuncio);

$titulo =  $un_anuncio -> getTitulo();
$descripcion =  $un_anuncio -> getDescripcion();
$precio =  $un_anuncio -> getPrecio();
$img =  $un_anuncio -> getImage();

//var_dump($img);exit;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require '../includes/headers.php';?>
    <title>FORSALE</title>
</head>

<body>
    <div class="ui text container">
        <h1 class="title">FOR <span class="dolar">$</span>ALE</h1>
        <div class="column">
            <div class="ui visible left demo vertical inverted sidebar labeled icon menu primary-color">
               
                <?php
                if (!isset($_SESSION['us_name'])) { ?>
                <a href="../public/login.php" class="item">
                    <i class="user icon"></i>
                    Login
                </a>
                <a class="item" href="../public/index.php">
                    <i class="exchange icon"></i>
                    Anuncios
                </a>

                <?php } else {?>
                    <a href="../public/index.php" class="item">
                    <i class="home icon"></i>
                   Home
                </a>
                <a href="../anuncios/crear_anuncio.php" class="item">
                    <i class="shopping cart icon"></i>
                    Crear anuncio
                </a>
                <a class="item" href="../anuncios/vista_anuncios_id.php">
                    <i class="exchange icon"></i>
                    Tus anuncios
                </a>
                <a class="item" href="../usuarios/controller.php?op=3">
                    <i class="x icon"></i>
                    Unlogin
                </a>
                <?php }?>


            </div>
        </div>
        <div class="column">
        <?php
                if (isset($_SESSION['us_name'])) { ?>
        <h1><i class="user icon"></i> <?php echo $name ?></h1><br>
                <?php } ?>

        </div>
        <div class="ui link cards">
            <?php
            $an_id = "";
     
               //Comprobar si hay foto:
               $foto = "../img/no_img.png";
               if (strlen($img)>0) $foto = "../img/uploads_imgs/".$img ;
               $an_id = $anuncio["an_id"];
               ?>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $foto;?>">
                </div>
                <div class="content">
                    <div class="header"><?php echo $titulo;?></div>
                    <div class="description">
                        <?php echo $descripcion;?>
                    </div>
                </div>
                <div class="extra content">
                    <span class="right floated">
                        <?php echo $anuncio["us_name"];?>
                    </span>
                    <span>
                        <?php echo $precio;?>
                        <i class="euro sign icon"></i>
                    </span>
                </div>
            </div>
           <?php
            unset($anuncio);
            ?>
        </div>
    </div>

    <!-- Modal  mostrar msg  -->
    <div id="modal_deleted" class="ui basic modal">
        <div class="ui icon header">
            <i class="archive icon"></i>
            <p><?php echo $_GET['msg']?></p>
        </div>

    </div>

    <?php if (isset($_GET['msg'])) { ?>
    <script>
    $('#modal_deleted').modal('show');
    </script>
    <?php  } ?>
    <!-- Fin  Mostrar msg  -->

    <?php include '../includes/footer.php'; ?>

    <script>
    function getId(id) {
        console.log("./controller.php?op=2&id=" + id);
        $("#borrar").attr("href", "./controller.php?op=2&id=" + id);
    }
    </script>
</body>

</html>