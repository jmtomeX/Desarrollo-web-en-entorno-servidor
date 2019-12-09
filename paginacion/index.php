<?php 
require('config.php');
// Recogemos el número de anuncios totales
$sql = 'SELECT COUNT(*) as total_anuncios FROM anuncios';
$result = $connexion->query($sql);
$row = $result->fetch_assoc();
$num_total_rows = $row['total_anuncios'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Paginación de resultados con PHP Demo</title>
<meta name="description" content="Paginación de resultados con PHP."/>
<meta name="author" content="Jose Aguilar">
<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="https://www.jose-aguilar.com/">
        <img src="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/images/jose-aguilar.png" width="30" height="30" alt="Jose Aguilar">
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="https://www.jose-aguilar.com/scripts/php/paginacion/">Demo <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="https://www.jose-aguilar.com/scripts/php/paginacion/paginacion.zip">Descargar</a>
            <a class="nav-item nav-link" href="https://www.jose-aguilar.com/blog/paginacion-resultados-con-php/">Tutorial</a>
            <a class="nav-item nav-link" href="https://www.jose-aguilar.com/">&copy; Jose Aguilar</a>
        </div>
    </div>
</nav>
<div class="container">
    <h1>Paginación de resultados con PHP</h1>
    <h2 class="lead"><?php echo $num_total_rows; ?> elementos listados de 6 en 6</h2>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="https://www.jose-aguilar.com/blog/">Blog</a></li>
          <li class="breadcrumb-item"><a href="https://www.jose-aguilar.com/blog/paginacion-resultados-con-php/">Paginación de resultados con PHP</a></li>
          <li class="breadcrumb-item active" aria-current="page">Demo</li>
        </ol>
    </nav>
    
    <div class="row">
        <div id="content" class="col-lg-12">
<?php
if ($num_total_rows > 0) {
    $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    // si no hay una variable $page
    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        // si la tenemos calculamos el inicio del anuncio que será el primero a mostrar, que ira en la sentecia $sql
        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
    }
    //calculo el total de paginas
    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

    //pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
    echo '<h3>Numero de articulos: '.$num_total_rows.'</h3>';
    echo '<h3>En cada pagina se muestra '.NUM_ITEMS_BY_PAGE.' articulos ordenados por fecha en formato descendente.</h3>';
    echo '<h3>Mostrando la pagina '.$page.' de ' .$total_pages.' paginas.</h3>';
    $sql ="select * from anuncios limit $start,".NUM_ITEMS_BY_PAGE;
    $result = $connexion->query($sql);

    /* 'SELECT * FROM product p 
        LEFT JOIN product_lang pl ON (pl.id_product = p.id_product AND pl.id_lang = 1) 
        LEFT JOIN `image` i ON (i.id_product = p.id_product AND cover = 1) 
        WHERE active = 1 
        ORDER BY date_upd DESC LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE
    ;*/
    if ($result->num_rows > 0) {
        echo '<ul class="row items">';
        while ($row = $result->fetch_assoc()) {
            echo '<li class="col-lg-4">';
            echo '<div class="item">';
           // echo '<img class="img-fluid mx-auto d-block" src="htdocs\Desarrollo-web-en-entorno-servidor\ejer_07_anuncios\img\uploads_imgs\'.$row['an_foto'].'-home_default/'.$row['link_rewrite'].'.jpg" width="100" height="100" />';
            echo '<img class="img-fluid mx-auto d-block" src="htdocs/Desarrollo-web-en-entorno-servidor/ejer_07_anuncios/img/uploads_imgs/'.$row['an_foto'].' width="100" height="100" />';
            echo '<h3>'.utf8_encode($row['an_titulo']).'</h3>';
            echo '<p class="description_short">'.strip_tags(utf8_encode($row['an_descripcion'])).'</p>';
            echo '<p class="price">'.round($row['an_precio'], 2).' EUR</p>';
            //echo '<p><a class="btn btn-primary link_rewrite mx-auto d-block" href="https://www.jose-aguilar.com/modulos-prestashop/es/'.$row['id_product'].'-'.$row['link_rewrite'].'.html" target="_blank"><i class="fa fa-eye"></i> Ver</a></p>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
    }

    echo '<nav>';
    echo '<ul class="pagination">';

    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
            }
        }

        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }
    echo '</ul>';
    echo '</nav>';
}
?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Bloque de anuncios adaptable -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6676636635558550"
                 data-ad-slot="8523024962"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    
    <div class="card">
        <h5 class="card-header">Comparte en las redes sociales</h5>
        <div class="card-body">
            <h5 class="card-title">¿Te ha servido este ejemplo? Comparte con tus amigos</h5>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4ecc1a47193e29e4" async="async"></script>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>
        </div>
    </div>

    <div class="footer-content row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a href="https://www.jose-aguilar.com/blog/paginacion-resultados-con-php/" class="btn btn-secondary">
                    <i class="fa fa-reply"></i> volver al tutorial
                </a>
                <a href="https://www.jose-aguilar.com/scripts/php/paginacion/paginacion.zip" class="btn btn-primary">
                    <i class="fa fa-download"></i> Descargar
                </a>
            </div>
        </div>
    </div>
    
</div>
<footer class="footer bg-dark">
    <div class="container">
        <span class="text-muted"><a href="https://www.jose-aguilar.com/">&copy; Jose Aguilar</a></span>
    </div>
</footer>
</body>
</html>
