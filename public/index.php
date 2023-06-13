<?php
$mysqli = new mysqli("localhost", "root", "", "agencia") or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT*FROM `pacotes` WHERE `disponivel`  = 'S'") or die($mysqli->error);

setlocale(LC_ALL, "ptb");

$pacotes = array();
while ($row = $result->fetch_assoc()) {
    $pacotes[] = $row;
}

$eventosJSON = json_decode(json_encode($pacotes));

session_start();

include_once '../App/Controller/ClienteController.php';

$user = new ClienteController();

$result = $user->isLoggedIn();

?>

<!DOCTYPE HTML>
<html class="wide wow-animation" lang="pt-br">
<html>

<head>
    <title>Viagens e Turismo</title>
    <script src="https://unpkg.com/feather-icons@4.29.0/dist/feather.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="../public/images/icon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Stylesheets-->

    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/fonts.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <style>
    .ie-panel {
        display: none;
        background: #212121;
        padding: 10px 0;
        box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
        clear: both;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
        display: block;
    }
    </style>
</head>

<body>
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
                <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed"
                    data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed"
                    data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
                    data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
                    data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
                    data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px"
                    data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true"
                    data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1"
                        data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                    <div class="rd-navbar-aside-outer">
                        <div class="colorlib-loader"></div>
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle"
                                data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
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


                                <?php
                                if ($result == true) {

                                    echo ' <div align="right">
                                                <ul class="rd-navbar-nav">
                                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php"><i
                                                                class="icon fa fa-home"></i> Home</a>
                                                    </li>
            
                                                    <li class="rd-nav-item"><a class="rd-nav-link" href="viagens.php"><i
                                                                class="icon fa fa-suitcase "></i> Pacotes</a>

                                     <li class="rd-nav-item "><a class="rd-nav-link" href="../public/cart.php"><i
                                    class="icon fa fa-shopping-cart "></i> Carrinho </a>
                                    
                                    <li class="rd-nav-item "><a class="rd-nav-link" href="../App/Controller/logout.php"><i
                                    class="fa fa-sign-out"></i> Sair </a>';
                                } else {
                                    echo ' <div align="right">
                                                <ul class="rd-navbar-nav">
                                                    <li class="rd-nav-item "><a class="rd-nav-link" href="index.php"><i
                                                                class="icon fa fa-home"></i> Home</a>
                                                    </li>
            
                                                    <li class="rd-nav-item"><a class="rd-nav-link" href="viagens.php"><i
                                                                class="icon fa fa-suitcase "></i> Pacotes</a>
                                                              
                                                <li class="rd-nav-item "><a class="rd-nav-link" href="../public/login.php"><i
                                                class="fa-user
                                                "></i> Login/Cadastre-se </a>';
                                }
                                ?>
                                </ul>
                            </div>
                            <ul align="left" class="rd-navbar-nav">
                                <li class="rd-nav-item active"><img src="../public/images/icon.ico" width="94">
                                </li>
                        </div>
                    </div>
            </div>
            </nav>
    </div>

    <section class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2"
        data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-direction="vertical">
        <div class="swiper-wrapper text-left">
            <div class="swiper-slide context-dark" data-slide-bg="images/topo.jpg">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="text-uppercase" data-caption-animate="fadeInRight" data-caption-delay="0">
                                    <b>CONHEÇA AS BELEZAS DO MONTE FUJI</b>
                                </h6>
                                <h2 class="oh font-weight-light" data-caption-animate="slideInUp"
                                    data-caption-delay="100"><span></span><span class="font-weight-bold"> EXPLORE O
                                        MUNDO</span></h2><a class="button button-default-outline button-ujarak" href="#"
                                    data-caption-animate="fadeInLeft" data-caption-delay="0"><b> Saiba
                                        Mais</b></a>
                                <!-- Javascript-->
                                <script src="../public/js/core.min.js"></script>
                                <script src="../public/js/script.js"></script>


                            </div>

</body>

</html>