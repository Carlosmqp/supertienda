<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Super Tienda</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilo.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top head">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="logo">
            <img class="logo1" src="assets/imagenes/logo.png" alt="">
            <a class="navbar-brand t1" href="index.php">Super Tienda</a>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="carrito.php" class="btn">CARRITO <span class="badge"><?php print cantidadPeliculas(); ?></span></a>
            </li>
              <li> 
                <a href="panel/index.php"> INGRESAR </a>
              </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

        <!--Slider-->

    <div class="container-slider">

      <div class="slider_1" id="slider">

        <div class="slider_section">
          <img src="assets/imagenes/img_slide1.jpg" alt="" class="slider_img">
        </div>
        <div class="slider_section">
          <img src="assets/imagenes/img_slide2.jpg" alt="" class="slider_img">
        </div>
        <div class="slider_section">
          <img src="assets/imagenes/img_slide3.jpg" alt="" class="slider_img">
        </div>
        <div class="slider_section">
          <img src="assets/imagenes/slide4.jpg" alt="" class="slider_img">
        </div>

      </div>

      <div class="slider_btn slider_btn-right" id="slider_btn-right"> &#62; </div>
      <div class="slider_btn slider_btn-left" id="slider_btn-left">
        &#60; </div>

    </div>

    <div class="container" id="main">
        <div class="row">
            <?php
              require 'vendor/autoload.php';
              $pelicula = new Supertienda\Pelicula;
              $info_peliculas = $pelicula->mostrar();
              $cantidad = count($info_peliculas);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_peliculas[$x];
            ?>
              <div class="col-md-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="text-center titulo-pelicula"><?php print $item['titulo'] ?></h1>  
                    </div>
                    <div class="panel-body">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" class="img-responsive">
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                      <?php }?>
                    </div>
                    <div class="panel-footer">
                        <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                          <span class="glyphicon glyphicon-shopping-cart"></span> Añadir al carrito
                        </a>
                    </div>
                  </div>
              
              
              </div>
          <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>




        </div>

         <!-- Contacto -->
    <div class="contact section-padding" data-scroll-index='4' id="contacto">
      <div class="container">
        <div class="row">
          <div class="col-md-12 section-title text-center">
            <h3>¡Contactanos!</h3>
            <p>¡Y envianos tu opinion!</p>
            <span class="section-title-line"></span>
          </div>
          <div class="col-lg-5 col-md-4">
            <div class="part-info">
              <div class="info-box">
                <div class="icon"> <i class="fas fa-phone"></i> </div>
                <div class="content">
                  <h4>Telefono :</h4>
                  <p>+57 313 718 4704</p>
                </div>
              </div>
              <div class="info-box">
                <div class="icon"> <i class="fas fa-map-marker-alt"></i> </div>
                <div class="content">
                  <h4>Dirección :</h4>
                  <p>Calle 70 3B Norte - 68</p>
                </div>
              </div>
              <div class="info-box">
                <div class="icon"> <i class="fas fa-envelope"></i> </div>
                <div class="content">
                  <h4>Mail :</h4>
                  <p><a href="#">carlosm.q.p1@gmail.com</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-8">
            <div class="contact-form">
              <form class='form' id='contact-form' method='post' data-toggle='validator'>
                <input type='hidden' name='form-name' value='contact-form' />
                <div class="messages"></div>
                <div class="controls">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input id="form_name" type="text" name="name" placeholder="Nombre *" required
                          data-error="name is required.">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input id="form_email" type="email" name="email" placeholder="Correo *" required
                          data-error="Valid email is required.">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input id="form_subject" type="text" name="subject" placeholder="Tema">
                      </div>
                    </div>
                    <div class="col-lg-12 form-group">
                      <textarea id="form_message" name="message" class="form-control" placeholder=" Mensaje " rows="4"
                        required data-error="Please,leave us a message."></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-12 text-center">
                      <button class="bttn">Enviar Mensaje</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      

    </div> <!-- /container -->

     <footer class="footer">

      <div class="redes">
        <i>
          <a href="#"><img class="icon1" src="assets/imagenes/icon1.png" alt=""></a>

        </i>
        <i>
          <a href="#"><img class="icon" src="assets/imagenes/icon2.png" alt=""></a>
        </i>
        <i>
          <a href="#"><img class="icon" src="assets/imagenes/icon3.png" alt=""></a>
        </i>
      </div>
      <div class="creditos">
        <p> <strong> Design by </strong> Carlos Obando</p>
      </div>
      <div class="marca">
        <p>© 2023 Super Tienda Inc. All rights reserved</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/slider.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
