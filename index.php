<?php
$mysqli = new mysqli("localhost", "root", "", "agencia") or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT*FROM `pacotes` WHERE `disponivel`  = 'S'") or die($mysqli->error);

setlocale(LC_ALL, "ptb");

$pacotes = array();
while ($row = $result->fetch_assoc()) {
  $pacotes[] = $row;
}

$eventosJSON = json_decode(json_encode($pacotes));
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="pt-br">
  <head>
    <title>Viagens e Turismo</title>
    <script src="https://unpkg.com/feather-icons@4.29.0/dist/feather.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                  
    <!-- Stylesheets-->
    
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Carregando...</p>
      </div>
    </div>
    <div class="page">
      
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-corporate" 
          data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" 
          data-md-device-layout="rd-navbar-fixed" 
          data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" 
          data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" 
          data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" 
          data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" 
          data-xxl-stick-up-offset="106px" data-lg-stick-up="true" 
          data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer">
             
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    
                </div>
              </div>
            </div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <div class="rd-navbar-nav-wrap">
                  <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                  </ul>
                  <!-- RD Navbar Nav-->
                  <div align="left">
                  <ul class="rd-navbar-nav" >
                    <li class="rd-nav-item active" ><a class="rd-nav-link"  href="index.php">Home</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Pacotes</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="login.php">Login</a>
                    </li>
                 </ul>
                  </div>
                  <ul class="rd-navbar-nav" >
                    <li class="rd-nav-item active" ><img src="images/logo.png"alt="Image" height="100" width="100"></a>
                    </li>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-direction="vertical">
        <div class="swiper-wrapper text-left">
          <div class="swiper-slide context-dark" data-slide-bg="images/fuji.jpg">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0"><b>CONHEÇA AS BELEZAS DO MONTE FUJI</b></h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span></span><span class="font-weight-bold"> EXPLORE O MUNDO</span></h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft" data-caption-delay="0"><b> Saiba Mais</b></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="images/sidney.jpg">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="100"><b>CONHEÇA NOSSO SERVIÇOS PARA  SIDNEY </b></h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100" ><span>  </span><span class="font-weight-bold"> CONFIE EM NOSSA EXPERIÊNCIA </span></h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft" data-caption-delay="0"><b>Saiba Mais</a></b> </font>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="images/italia.jpg">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0"><b> FERIADO NA ITÁLIA</b></h6>
                    <h2 class="oh font-weight-light" data-caption-animate="slideInUp" data-caption-delay="100"><span></span><span class="font-weight-bold"> CRIE SEU TUOR </span></h2><a class="button button-default-outline button-ujarak" href="#" data-caption-animate="fadeInLeft" data-caption-delay="0"><b>Saiba mais</b></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination"></div>
      </section>
      <!-- Section Box Categories-->
      <section class="section section-lg section-top-1 bg-gray-4">
        <div class="container offset-negative-1">
          <div class="box-categories cta-box-wrap">
            <div class="box-categories-content">
              <div class="row justify-content-center">
                
                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="index.php"><img src="images/baly.jpg" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Pacote 4 noites hotel Akmani Legian  </h5>
                   </li>
                     </ul>
                        </div>
    
    
                    <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="index.php"><img src="images/sdney.jpg" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Pacote 3 noites The Grace Hotel</h5>
                    </li>
                  </ul>
                     </div>
            


                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                  <li><a href="index.php"><img src="images/capadocia.jpg" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Pacote 7 noites hotel Milat Cave</h5>
                    </li>
                  </ul>
                     </div>
                    </u>
                  </u>
                  </div>
                </div>
</section>


            <section class="section section-lg section-top-1 bg-gray-4">
        <div class="container offset-negative-1">
          <div class="box-categories cta-box-wrap">
            <div class="box-categories-content">
              <div class="row justify-content-center">
                
                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="index.php"><img src="images/baly.jpg" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Pacote 4 noites hotel Akmani Legian  </h5>
                   </li>
                     </ul>
                        </div>
    
    
                    <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                    <li><a href="index.php"><img src="images/sdney.jpg" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Pacote 3 noites The Grace Hotel</h5>
                    </li>
                  </ul>
                     </div>
           


                <div class="col-md-4 wow fadeInDown col-9" data-wow-delay=".2s">
                  <ul class="list-marked-2 box-categories-list">
                  <li><a href="index.php"><img src="images/capadocia.jpg" alt="" width="368" height="420"/></a>
                      <h5 class="box-categories-title">Pacote 7 noites hotel Milat Cave</h5>
                    </li>
                  </ul>
                     </div>
                    </u>
                  </u>
                  </div>
                </div>
            </div>
            


          </div><a class="link-classic wow fadeInUp" href="#"> Outros pacotes <span></span></a>
          <!-- Owl Carousel-->
        </div>
      </section>
      <!-- Discover New Horizons-->
      <section class="section section-sm section-first bg-default text-md-left">
        <div class="container">
          <div class="row row-50 align-items-center justify-content-center justify-content-xl-between">
            <div class="col-lg-6 text-center wow fadeInUp"><img src="images/agencia.gif" alt="" width="556" height="382"/>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay=".1s">
              <div class="box-width-lg-470">
                <h3>Quem somos nós?</h3>
                <!-- Bootstrap tabs-->
                <div class="tabs-custom tabs-horizontal tabs-line tabs-line-big tabs-line-style-2 text-center text-md-left" id="tabs-">
                  <!-- Nav tabs-->
                  <ul class="nav nav-tabs">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-7-1" data-toggle="tab">Um pouco sobre nós</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-7-2" data-toggle="tab">Nossa missão</a></li>
                  </ul>
                  <!-- Tab panes-->
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-7-1">
                      <p> escreva aqui </p>
                      </div>
                    <div class="tab-pane fade" id="tabs-7-2">
                      <p> escreva aqui </p>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--	Our Services-->
      <footer class="section footer-corporate context-dark">
      
        <div class="footer-corporate-inset">
          <div class="container">
            <div class="row row-40 justify-content-lg-between">
              <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Contato</h6>
                    <ul class="footer-contacts d-inline-block d-sm-block">
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body"><a class="link-phone" href="tel:#">(11) 98465-9843</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                          <div class="unit-body"><a class="link-aemail" href="mailto:#">contato@agviagens.com</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit">
                          <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                          <div class="unit-body"><a class="link-location" href="https://www.google.com.br/maps/place/Av.+C%C3%A1sper+L%C3%ADbero,+204+-+Centro+Hist%C3%B3rico+de+S%C3%A3o+Paulo,+S%C3%A3o+Paulo+-+SP,+01033-001/@-23.5398317,-46.6384486,17z/data=!3m1!4b1!4m5!3m4!1s0x94ce5857504451f7:0x878d6522436762eb!8m2!3d-23.5398366!4d-46.6362599">Avenida Cásper Líbero, 204 - Centro - SP</a></div>
                        </div>
                      </li>
                    </ul>
                  </div>   
                </div>
              </div>
              <div class="col-sm-11 col-md-7 col-lg-5 col-xl-4">
                <div class="oh-desktop">
                  <div class="wow slideInLeft" data-wow-delay="0s">
                    <h6 class="text-spacing-100 text-uppercase">Quick links</h6>
                    <ul class="row-6 list-0 list-marked list-marked-md list-marked-secondary list-custom-2">
                      <li><a href="about.html">About us</a></li>
                      <li><a href="#">Our Tours</a></li>
                      <li><a href="#">Our Team</a></li>
                      <li><a href="#">Gallery</a></li>
                      <li><a href="#">Blog</a></li>
                    </ul>
                  
                </div>
              </div>
            </div>
              <div class="col-sm-6 col-md-5 col-lg-3 col-xl-4">
              <div class="oh-desktop">
              <div class="wow slideInLeft" data-wow-delay="0s">
                <form action="" method="post">
                  <label for= "busca"> Buscar Pacotes</label>
                <div class="buscar">  
               <input type="search" id="busca" name="q">
             <button type="submit">OK</button>
              </div>

</form>
              </div>
                  </div>
                </div>
              </div>
              
          </div>
        </div>
      
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
