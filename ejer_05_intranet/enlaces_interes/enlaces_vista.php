<?php
require '../global.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 
require "../conection.php";
if ($id>0) {
    $sql = "SELECT titulo FROM videos WHERE id = '$id'";
    $datos = mysqli_query($conx,$sql);
    if($fila = mysqli_fetch_assoc($datos)) {
        $titulo = $fila["titulo"];
    }
} else {
    $sql = "SELECT id,titulo FROM videos order by titulo Asc";
    $datos = mysqli_query($conx,$sql);
}
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php include '../includes/enlaces.txt'?>
        <title>Enlaces de video</title>
    </head>

    <body>
        <?php
    include '../includes/menu.txt';
    ?>
            <div class="pure-g">
                <article class="pure-u-md-2-5">
                    <fieldset>
                        <legend class="title">Insertar enlaces de interes</legend>
                        <form action="./controler.php?op=1" method="POST" class="pure-form box--flex">
                            <?php if ($id>0) { ?>
                            <input type="hidden" name="video_id" value="<?php echo $id; ?>" />
                            <?php }
                            if (isset($_GET['msg'])) echo $_GET['msg'];      
                            ?>

                            <p><label for="titulo_enlace">Título del enlace</label><input type="text" name="titulo_enlace" id="titulo_enlace" value="" class="input--large"></p>
                            <p><label for="enlace">Url enlace</label><input type="text" name="enlace" id="enlace" value="" class="input--large"></p>
                            <p><label for="enlaces">Video</label>
                                <?php if ($id>0) { ?>
                                <input type="text" class="input--large" value="<?php echo  $titulo;?>" disabled></p>
                            <?php } else {  ?>
                            <select class="input--large" name="video_id">
                                    <?php 
                                    // insertar los titulos 
                                    while ($fila = mysqli_fetch_assoc($datos)) {
                                        $vid_id = $fila["id"];
                                        $vid_titulo = $fila["titulo"];  ?>
                                        <option value="<?php echo $vid_id; ?>"><?php echo $vid_titulo; ?></option>
                                    <?php } ?>
                                </select>
                            <?php }  ?>
                            </p>
                            <br>
                            <br>
                            <input type="submit" value="Registro Enlace" class="pure-button pure-button-primary margin">
                        </form>
                    </fieldset>
                </article>

                <article class="pure-u-md-3-5">
                    <fieldset>
                        <legend class="title">Enlaces de interes <span id="titulo"></span></legend>
                        <ul>
                            <?php
                if ($id>0) {
                    // Si entras desde el botón enlace modificar
                    $sql = "SELECT titulo,enl_id,enl_titulo,enl_url FROM videos INNER JOIN enlaces_videos ON videos.id = enlaces_videos.enl_video_id WHERE videos.id = '$id' ";
                }else {
                    // si entras desde el link del menu
                    $sql = "SELECT titulo,enl_id,enl_titulo,enl_url FROM videos INNER JOIN enlaces_videos ON videos.id = enlaces_videos.enl_video_id";
                }

                    require "../conection.php";
                    $datos = mysqli_query($conx,$sql);
                    $sqlTituloDatos = mysqli_query($conx,$sql);
                    while($linea = mysqli_fetch_assoc($datos)){
                       $enl_id = $linea['enl_id'];
                       $enl_titulo = $linea['enl_titulo'];
                       $enl_url = $linea['enl_url'];
                       $tituloVideo = $linea['titulo'];
                    ?>
                                <li>
                                    <a href="<?php echo $enl_url; ?>" target="_blank" id="info_enlace_<?php echo $enl_id;?>">
                                    <?php echo $enl_titulo; ?></a>
                                    <a class="float_rigth" href="./controler.php?op=3&id=<?php echo $enl_id; ?>&enl_video_id=<?php echo $id; ?>" ><i class="fas fa-trash-alt"></i></a>
                                    <a class="float_rigth" href="#modal-one" onclick="editar(<?php echo $enl_id; ?>)"> <i class="far fa-edit"></i></a>

                                </li>
                                <?php } ?>
                        </ul>
                    </fieldset>
                </article>
            </div>
            <!--  Empieza el modal -->
            <div class='modal' id='modal-one' aria-hidden='true'>
                <div class='modal-dialog'>
                    <form class='pure-form pure-form-aligned'>
                        <input type="hidden" id="id_enlace" name="id_enlace" />
                        <div class='modal-header'>
                            <fieldset>
                                <div class='pure-control-group'>
                                    <label for='titulo_enlace'>Título del enlace</label>
                                    <input id='titulo_enlace' type='text'>
                                </div>

                                <div class='pure-control-group'>
                                    <label for='url_enlace'>Url enlace</label>
                                    <input id='url_enlace' type='text'>
                                </div>
                            </fieldset>
                        </div>
                        <div class='modal-footer'>
                            <a href="#" class='pure-button pure-button-primary margin' onclick="changeLink()"  aria-hidden="true">Actualizar</a>
                            <a href='#' class='pure-button pure-button-primary margin' aria-hidden='true'>Cancelar</a>
                        </div>
                    </form>
                </div>
                <span class="respuesta"></span>
            </div>
            <?php 
                    if ($id>0){
                    echo "<script>
                        document.getElementById('titulo').innerHTML = '$tituloVideo';
                        </script>";
                    }
                ?>
            <script>
                function editar(id) {
                    var titulo= $('#info_enlace_'+id).text();
                    var url=$('#info_enlace_'+id).attr('href');
                    $('#modal-one #id_enlace').val(id);
                    $('#modal-one #titulo_enlace').val($.trim(titulo));
                    $('#modal-one #url_enlace').val($.trim(url));
                }

                function changeLink() {
                    let enl_id = $('#modal-one #id_enlace').val();
                    let enl_titulo = $('#modal-one #titulo_enlace').val();
                    let enl_url = $('#modal-one #url_enlace').val();
                   $.ajax({
                        type: "POST",
                        url: "./sw_act_enlace.php",
                        data: {
                           id_enlace : enl_id,
                           titulo_enlace: enl_titulo,
                           url_enlace: enl_url
                        }
                         ,
                        success: function (data) {
                            console.log(data);
                            //var obj = JSON.parse(data);
                            if (data.res >0) {
                                alert(data.msg);
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
           /*********************************** */
          
   /* $.ajax({
            url: "sw_act_enlace.php",
            type: "POST",
            data: data
            }).done(function(data){
                var obj = JSON.parse(data);
                if (obj.res == 1) {
                    alert(obj.description);
                }
	}); */
          
          
          /*  $.ajax({
            type:'POST',
            url:'sw_act_enlace.php',
            dataType: "json",
            data:{res:description},
            success:function(data){
                if(data.res == 1){
                    $('#res').text(data.result.res);
                    $('#description').text(data.result.description);
                    $('.user-content').slideDown();
                }else{
                    $('.user-content').slideUp();
                } 
            }
        });*/



            </script>

    </body>

    </html>