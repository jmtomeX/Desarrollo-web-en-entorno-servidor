<!DOCTYPE html>
<html lang="en">
<?php
require '../includes/globals.php';
require '../models/CAnuncio.php';
$id = $_SESSION['us_id'];
$un_anuncio = new CAnuncio();
$anuncios = $un_anuncio -> listarAnuncios($id) ;

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require '../includes/headers.php';?>
    <title>Document</title>
</head>

<body>
    <div class="ui text container">
        <h1 class="title">FOR <span class="dolar">$</span>ALE</h1>
        <div class="column">
            <div class="ui visible left demo vertical inverted sidebar labeled icon menu primary-color">
                <a href="../public/index.php" class="item">
                    <i class="home icon"></i>
                   Home
                </a>
                <a href="./crear_anuncio.php" class="item">
                    <i class="shopping cart icon"></i>
                    Crear anuncio
                </a>
                <a class="item" href="#">
                    <i class="exchange icon"></i>
                    Tus anuncios
                </a>
                <a class="item" href="../usuarios/controller.php?op=3">
                    <i class="x icon"></i>
                    Unlogin
                </a>
            </div>
        </div>
        <div class="column">
            <h1><?php echo $name ?> aquí tienes tus productos en venta.</h1>
            <br>
        </div>
        <div class="ui link cards">
            <?php
            $an_id = "";
           foreach ($anuncios as $anuncio) {
               //Comprobar si hay foto:
               $foto = "../img/no_img.png";
               if (strlen($anuncio['an_foto'])>0) $foto = "../img/uploads_imgs/".$anuncio['an_foto'];
               $an_id = $anuncio["an_id"];
               ?>  
            <div class="card">
                <div class="image">
                    <img src="<?php echo $foto;?>">
                </div>
                <div class="content">
                    <div class="header"><?php echo $anuncio["an_titulo"];?></div>
                    <div class="description">
                        <?php echo $anuncio["an_descripcion"];?>
                    </div>
                </div>
                <div class="extra content">
                <span class="right floated">
                <a onclick="getId(<?php echo $an_id ?>)" class="botonModAdv" ><i class="circular trash alternate icon"></i></a>
                    </span>
                    <span>
                        <?php echo $anuncio["an_precio"];?>
                        <i class="euro sign icon"></i>
                    </span>
                </div>
            </div>
            <?php }
            unset($anuncio);
            ?>
        </div>
    </div>
         <!-- Modal  eliminar  -->
         <div id="modal_ask_delete" class="ui basic modal">
            <div class="ui icon header">
                <i class="archive icon"></i>
                Advertencia vas a eliminar el anuncio.
                <p>¿Desea eliminarlo realmente?</p>
            </div>

            <div class="actions">
                <div class="ui red basic cancel inverted button">
                    <i class="remove icon"></i>
                    No
                </div>
                <a id="borrar"><div class="ui green ok inverted button">
                    <i class="checkmark icon"></i>
                    Si
                </div></a>
            </div>
        </div>
        <!-- Fin  Modal  eliminar  -->

         <!-- Modal  mostrar msg  -->
         <div id="modal_deleted" class="ui basic modal">
            <div class="ui icon header">
                <i class="archive icon"></i>
                <p><?php echo $_GET['msg']?></p>
            </div>

         </div>

         <?php if (isset($_GET['msg'])) { ?>
            <script>$('#modal_deleted').modal('show');</script>
         <?php  } ?>
        <!-- Fin  Mostrar msg  -->

    <?php include '../includes/footer.php'; ?>

    <script>
    function getId(id){
        console.log("./controller.php?op=2&id="+id);
            $("#borrar").attr("href","./controller.php?op=2&id="+id);
    }
    </script>
</body>

</html>