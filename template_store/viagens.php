<?php
$mysqli = new mysqli("localhost", "root", "", "agencia") or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT*FROM `pacotes` WHERE `disponivel`  = 'S'") or die($mysqli->error);

setlocale(LC_ALL, "ptb");

$viagens = array();
while ($row = $result->fetch_assoc()) {
    $viagens[] = $row;
}

$eventosJSON = json_decode(json_encode($viagens));


?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="pt-br">

<head>
    <title>Nossos Pacotes</title>
    <script src="https://unpkg.com/feather-icons@4.29.0/dist/feather.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Stylesheets-->

    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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

                            <!-- RD Navbar Panel-->
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
                            <div class="rd-navbar-main-outer">
                                <div class="rd-navbar-main">
                                    <div class="rd-navbar-nav-wrap">
                                        <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                                        </ul>
                                        <!-- RD Navbar Nav-->
                                        <div align="left">
                                            <ul class="rd-navbar-nav">

                                                <li class="rd-nav-item active"><a class="rd-nav-link"
                                                        href="index.php"><i class="icon fa fa-home"></i> Home</a>
                                                </li>

                                                <li class="rd-nav-item"><a class="rd-nav-link" href="viagens.php"><i
                                                            class="icon fa fa-suitcase "></i> Pacotes</a>

                                                    <?php
                                            if ($result == true) {
                                                echo '
                                                <li class="rd-nav-item"><a class="rd-nav-link" href="cart.php"><i
                                                class="icon fa fa-shopping-cart "></i> Carrinho</a>

                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="logout.php"><i
                                                class="icon fa fa-shopping-cart "></i> Sair </a>

                                    </li>
											';
                                            } else {
                                                echo '<li class="rd-nav-item "><a class="rd-nav-link" href="login.php"> <i class="icon fa fa-user-circle"></i> login </a>
                                            </li>';
                                            }
                                            ?>
                                            </ul>
                                        </div>
                                        <ul align="right" class="rd-navbar-nav">
                                            <li class="rd-nav-item active"><img src="images/LOG0.png" width="94">
                                            </li>
                                    </div>
                                </div>
                            </div>
                    </nav>
                </div>
            </header>
            <!-- Hot tours-->
            <section class="section section-sm bg-default">
                <div class="container">
                    <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown color:#162E44"><img
                                src="images/lg.png" width="94">Pacotes imperdiveis<img src="images/lg.png"
                                width="94"></span></h3>
                    <div class="row row-sm row-40 row-md-50">
                        <div class="col-sm-6 col-md-12 wow fadeInRight">
                            <!-- Product Big-->
                            <article class="product-big">
                                <?php
                                $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '1' and disponivel = 'S'") or die($mysqli->error);

                                $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '1'");
                                while ($ln = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="unit flex-column flex-md-row align-items-md-stretch">
                                    <div class="unit-left"><a class="product-big-figure" href="pacote1.php"><img
                                                src="images/Jericoacoara.jpg" alt="" width="600" height="366" /></a>
                                    </div>
                                    <div class="unit-body">
                                        <div class="product-big-body">
                                            <h5 class="product-big-title"><a
                                                    href="pacote1.php"><?php echo $ln['nome'] ?></a></h5>
                                            <p class="product-big-text"> <?php echo $ln['descricao']; ?></p>
                                            <p class="product-big-text">💳 Em 6 parcelas de
                                                <?php
                                                    $numero = $ln['valor'] / 6;
                                                    echo number_format($numero, 2, ",", "."); ?>
                                                reais</p>
                                            <a class="button button-black-outline button-ujarak"
                                                href="pacote1.php">Comprar</a>
                                            <div class="product-big-price-wrap"><span
                                                    class="product-big-price"><?php echo $ln['valor']; ?></span></div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </article>


                            <div class="row row-sm row-40 row-md-50">
                                <div class="col-sm-6 col-md-12 wow fadeInRight">
                                    <div class="col-sm-6 col-md-12 wow fadeInLeft">
                                        <!-- Product Big-->
                                        <article class="product-big">
                                            <?php
                                            $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '2' and disponivel = 'S'") or die($mysqli->error);

                                            $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '2'");
                                            while ($ln = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <div class="unit flex-column flex-md-row align-items-md-stretch">
                                                <div class="unit-left"><a class="product-big-figure"
                                                        href="Pacote2.php"><img src="images/palmas.jpg" alt=""
                                                            width="600" height="366" /></a></div>
                                                <div class="unit-body">
                                                    <div class="product-big-body">
                                                        <h5 class="product-big-title"><a
                                                                href="pacote1.php"><?php echo $ln['nome'] ?></a></h5>
                                                        <p class="product-big-text"> <?php echo $ln['descricao']; ?></p>
                                                        <p class="product-big-text">💳 Em 6 parcelas de
                                                            <?php $numero = $ln['valor'] / 6;
                                                                echo number_format($numero, 2, ",", "."); ?>
                                                            reais</p>
                                                        <a class="button button-black-outline button-ujarak"
                                                            href="pacote1.php">Comprar</a>
                                                        <div class="product-big-price-wrap"><span
                                                                class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </article>
                                    </div>



                                    <div class="row row-sm row-40 row-md-50">
                                        <div class="col-sm-6 col-md-12 wow fadeInRight">
                                            <div class="col-sm-6 col-md-12 wow fadeInLeft">
                                                <!-- Product Big-->
                                                <article class="product-big">
                                                    <?php
                                                    $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '3' and disponivel = 'S'") or die($mysqli->error);

                                                    $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '3'");
                                                    while ($ln = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <div class="unit flex-column flex-md-row align-items-md-stretch">
                                                        <div class="unit-left"><a class="product-big-figure"
                                                                href="Pacote2.php"><img src="images/amazonia.jpg" alt=""
                                                                    width="600" height="366" /></a></div>
                                                        <div class="unit-body">
                                                            <div class="product-big-body">
                                                                <h5 class="product-big-title"><a
                                                                        href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                </h5>
                                                                <p class="product-big-text">
                                                                    <?php echo $ln['descricao']; ?></p>
                                                                <p class="product-big-text">💳 Em 6 parcelas de
                                                                    <?php $numero = $ln['valor'] / 6;
                                                                        echo number_format($numero, 2, ",", "."); ?>
                                                                    reais</p>
                                                                <a class="button button-black-outline button-ujarak"
                                                                    href="pacote1.php">Comprar</a>
                                                                <div class="product-big-price-wrap"><span
                                                                        class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="row row-sm row-40 row-md-50">
                                                <div class="col-sm-6 col-md-12 wow fadeInRight">
                                                    <div class="col-sm-6 col-md-12 wow fadeInLeft">
                                                        <!-- Product Big-->
                                                        <article class="product-big">
                                                            <?php
                                                            $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '4' and disponivel = 'S'") or die($mysqli->error);

                                                            $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '4'");
                                                            while ($ln = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <div
                                                                class="unit flex-column flex-md-row align-items-md-stretch">
                                                                <div class="unit-left"><a class="product-big-figure"
                                                                        href="Pacote2.php"><img
                                                                            src="images/jericoacoara.jpg" alt=""
                                                                            width="600" height="366" /></a></div>
                                                                <div class="unit-body">
                                                                    <div class="product-big-body">
                                                                        <h5 class="product-big-title"><a
                                                                                href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                        </h5>
                                                                        <p class="product-big-text">
                                                                            <?php echo $ln['descricao']; ?></p>
                                                                        <p class="product-big-text">💳 Em 6 parcelas de
                                                                            <?php $numero = $ln['valor'] / 6;
                                                                                echo number_format($numero, 2, ",", "."); ?>
                                                                            reais</p>
                                                                        <a class="button button-black-outline button-ujarak"
                                                                            href="pacote1.php">Comprar</a>
                                                                        <div class="product-big-price-wrap"><span
                                                                                class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>

                                                    <div class="row row-sm row-40 row-md-50">
                                                        <div class="col-sm-6 col-md-12 wow fadeInRight">
                                                            <div class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                <!-- Product Big-->
                                                                <article class="product-big">
                                                                    <?php
                                                                    $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '5' and disponivel = 'S'") or die($mysqli->error);

                                                                    $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '5'");
                                                                    while ($ln = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <div
                                                                        class="unit flex-column flex-md-row align-items-md-stretch">
                                                                        <div class="unit-left"><a
                                                                                class="product-big-figure"
                                                                                href="Pacote2.php"><img
                                                                                    src="images/gramado.jpg" alt=""
                                                                                    width="600" height="366" /></a>
                                                                        </div>
                                                                        <div class="unit-body">
                                                                            <div class="product-big-body">
                                                                                <h5 class="product-big-title"><a
                                                                                        href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                </h5>
                                                                                <p class="product-big-text">
                                                                                    <?php echo $ln['descricao']; ?></p>
                                                                                <p class="product-big-text">💳 Em 6
                                                                                    parcelas de
                                                                                    <?php $numero = $ln['valor'] / 6;
                                                                                        echo number_format($numero, 2, ",", "."); ?>
                                                                                    reais</p>
                                                                                <a class="button button-black-outline button-ujarak"
                                                                                    href="pacote1.php">Comprar</a>
                                                                                <div class="product-big-price-wrap">
                                                                                    <span
                                                                                        class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                </div>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            </div>
                                                            <div class="row row-sm row-40 row-md-50">
                                                                <div class="col-sm-6 col-md-12 wow fadeInRight">
                                                                    <div class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                        <!-- Product Big-->
                                                                        <article class="product-big">
                                                                            <?php
                                                                            $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '6' and disponivel = 'S'") or die($mysqli->error);

                                                                            $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '6'");
                                                                            while ($ln = mysqli_fetch_assoc($result)) {
                                                                            ?>
                                                                            <div
                                                                                class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                <div class="unit-left"><a
                                                                                        class="product-big-figure"
                                                                                        href="Pacote2.php"><img
                                                                                            src="images/porto seguro.jpg"
                                                                                            alt="" width="600"
                                                                                            height="366" /></a></div>
                                                                                <div class="unit-body">
                                                                                    <div class="product-big-body">
                                                                                        <h5 class="product-big-title"><a
                                                                                                href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                        </h5>
                                                                                        <p class="product-big-text">
                                                                                            <?php echo $ln['descricao']; ?>
                                                                                        </p>
                                                                                        <p class="product-big-text">💳
                                                                                            Em 6 parcelas de
                                                                                            <?php $numero = $ln['valor'] / 6;
                                                                                                echo number_format($numero, 2, ",", "."); ?>
                                                                                            reais</p>
                                                                                        <a class="button button-black-outline button-ujarak"
                                                                                            href="pacote1.php">Comprar</a>
                                                                                        <div
                                                                                            class="product-big-price-wrap">
                                                                                            <span
                                                                                                class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </article>
                                                                    </div>


                                                                    <div class="row row-sm row-40 row-md-50">
                                                                        <div class="col-sm-6 col-md-12 wow fadeInRight">
                                                                            <div
                                                                                class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                                <!-- Product Big-->
                                                                                <article class="product-big">
                                                                                    <?php
                                                                                    $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '7' and disponivel = 'S'") or die($mysqli->error);

                                                                                    $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '7'");
                                                                                    while ($ln = mysqli_fetch_assoc($result)) {
                                                                                    ?>
                                                                                    <div
                                                                                        class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                        <div class="unit-left"><a
                                                                                                class="product-big-figure"
                                                                                                href="Pacote2.php"><img
                                                                                                    src="images/maranhao.jpg"
                                                                                                    alt="" width="600"
                                                                                                    height="366" /></a>
                                                                                        </div>
                                                                                        <div class="unit-body">
                                                                                            <div
                                                                                                class="product-big-body">
                                                                                                <h5
                                                                                                    class="product-big-title">
                                                                                                    <a
                                                                                                        href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                                </h5>
                                                                                                <p
                                                                                                    class="product-big-text">
                                                                                                    <?php echo $ln['descricao']; ?>
                                                                                                </p>
                                                                                                <p
                                                                                                    class="product-big-text">
                                                                                                    💳 Em 6 parcelas de
                                                                                                    <?php $numero = $ln['valor'] / 6;
                                                                                                        echo number_format($numero, 2, ",", "."); ?>
                                                                                                    reais</p>
                                                                                                <a class="button button-black-outline button-ujarak"
                                                                                                    href="pacote1.php">Comprar</a>
                                                                                                <div
                                                                                                    class="product-big-price-wrap">
                                                                                                    <span
                                                                                                        class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </article>
                                                                            </div>



                                                                            <div class="row row-sm row-40 row-md-50">
                                                                                <div
                                                                                    class="col-sm-6 col-md-12 wow fadeInRight">
                                                                                    <div
                                                                                        class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                                        <!-- Product Big-->
                                                                                        <article class="product-big">
                                                                                            <?php
                                                                                            $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '8' and disponivel = 'S'") or die($mysqli->error);

                                                                                            $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '8'");
                                                                                            while ($ln = mysqli_fetch_assoc($result)) {
                                                                                            ?>
                                                                                            <div
                                                                                                class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                                <div class="unit-left">
                                                                                                    <a class="product-big-figure"
                                                                                                        href="Pacote2.php"><img
                                                                                                            src="images/capadocia.jpg"
                                                                                                            alt=""
                                                                                                            width="600"
                                                                                                            height="366" /></a>
                                                                                                </div>
                                                                                                <div class="unit-body">
                                                                                                    <div
                                                                                                        class="product-big-body">
                                                                                                        <h5
                                                                                                            class="product-big-title">
                                                                                                            <a
                                                                                                                href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                                        </h5>
                                                                                                        <p
                                                                                                            class="product-big-text">
                                                                                                            <?php echo $ln['descricao']; ?>
                                                                                                        </p>
                                                                                                        <p
                                                                                                            class="product-big-text">
                                                                                                            💳 Em 6
                                                                                                            parcelas de
                                                                                                            <?php $numero = $ln['valor'] / 6;
                                                                                                                echo number_format($numero, 2, ",", "."); ?>
                                                                                                            reais</p>
                                                                                                        <a class="button button-black-outline button-ujarak"
                                                                                                            href="pacote1.php">Comprar</a>
                                                                                                        <div
                                                                                                            class="product-big-price-wrap">
                                                                                                            <span
                                                                                                                class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <?php } ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </article>
                                                                                    </div>


                                                                                    <div
                                                                                        class="row row-sm row-40 row-md-50">
                                                                                        <div
                                                                                            class="col-sm-6 col-md-12 wow fadeInRight">
                                                                                            <div
                                                                                                class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                                                <!-- Product Big-->
                                                                                                <article
                                                                                                    class="product-big">
                                                                                                    <?php
                                                                                                    $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '9' and disponivel = 'S'") or die($mysqli->error);

                                                                                                    $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '9'");
                                                                                                    while ($ln = mysqli_fetch_assoc($result)) {
                                                                                                    ?>
                                                                                                    <div
                                                                                                        class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                                        <div
                                                                                                            class="unit-left">
                                                                                                            <a class="product-big-figure"
                                                                                                                href="Pacote2.php"><img
                                                                                                                    src="images/Queenstown.jpg"
                                                                                                                    alt=""
                                                                                                                    width="600"
                                                                                                                    height="366" /></a>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="unit-body">
                                                                                                            <div
                                                                                                                class="product-big-body">
                                                                                                                <h5
                                                                                                                    class="product-big-title">
                                                                                                                    <a
                                                                                                                        href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                                                </h5>
                                                                                                                <p
                                                                                                                    class="product-big-text">
                                                                                                                    <?php echo $ln['descricao']; ?>
                                                                                                                </p>
                                                                                                                <p
                                                                                                                    class="product-big-text">
                                                                                                                    💳
                                                                                                                    Em 6
                                                                                                                    parcelas
                                                                                                                    de
                                                                                                                    <?php $numero = $ln['valor'] / 6;
                                                                                                                        echo number_format($numero, 2, ",", "."); ?>
                                                                                                                    reais
                                                                                                                </p>
                                                                                                                <a class="button button-black-outline button-ujarak"
                                                                                                                    href="pacote1.php">Comprar</a>
                                                                                                                <div
                                                                                                                    class="product-big-price-wrap">
                                                                                                                    <span
                                                                                                                        class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <?php } ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </article>
                                                                                            </div>


                                                                                            <div
                                                                                                class="row row-sm row-40 row-md-50">
                                                                                                <div
                                                                                                    class="col-sm-6 col-md-12 wow fadeInRight">
                                                                                                    <div
                                                                                                        class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                                                        <!-- Product Big-->
                                                                                                        <article
                                                                                                            class="product-big">
                                                                                                            <?php
                                                                                                            $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '10' and disponivel = 'S'") or die($mysqli->error);

                                                                                                            $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '10'");
                                                                                                            while ($ln = mysqli_fetch_assoc($result)) {
                                                                                                            ?>
                                                                                                            <div
                                                                                                                class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                                                <div
                                                                                                                    class="unit-left">
                                                                                                                    <a class="product-big-figure"
                                                                                                                        href="Pacote2.php"><img
                                                                                                                            src="images/sydney.jpg"
                                                                                                                            alt=""
                                                                                                                            width="600"
                                                                                                                            height="366" /></a>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="unit-body">
                                                                                                                    <div
                                                                                                                        class="product-big-body">
                                                                                                                        <h5
                                                                                                                            class="product-big-title">
                                                                                                                            <a
                                                                                                                                href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                                                        </h5>
                                                                                                                        <p
                                                                                                                            class="product-big-text">
                                                                                                                            <?php echo $ln['descricao']; ?>
                                                                                                                        </p>
                                                                                                                        <p
                                                                                                                            class="product-big-text">
                                                                                                                            💳
                                                                                                                            Em
                                                                                                                            6
                                                                                                                            parcelas
                                                                                                                            de
                                                                                                                            <?php $numero = $ln['valor'] / 6;
                                                                                                                                echo number_format($numero, 2, ",", "."); ?>
                                                                                                                            reais
                                                                                                                        </p>
                                                                                                                        <a class="button button-black-outline button-ujarak"
                                                                                                                            href="pacote1.php">Comprar</a>
                                                                                                                        <div
                                                                                                                            class="product-big-price-wrap">
                                                                                                                            <span
                                                                                                                                class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <?php } ?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </article>
                                                                                                    </div>


                                                                                                    <div
                                                                                                        class="row row-sm row-40 row-md-50">
                                                                                                        <div
                                                                                                            class="col-sm-6 col-md-12 wow fadeInRight">
                                                                                                            <div
                                                                                                                class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                                                                <!-- Product Big-->
                                                                                                                <article
                                                                                                                    class="product-big">
                                                                                                                    <?php
                                                                                                                    $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '11' and disponivel = 'S'") or die($mysqli->error);

                                                                                                                    $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '11'");
                                                                                                                    while ($ln = mysqli_fetch_assoc($result)) {
                                                                                                                    ?>
                                                                                                                    <div
                                                                                                                        class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                                                        <div
                                                                                                                            class="unit-left">
                                                                                                                            <a class="product-big-figure"
                                                                                                                                href="Pacote2.php"><img
                                                                                                                                    src="images/singapura.jpg"
                                                                                                                                    alt=""
                                                                                                                                    width="600"
                                                                                                                                    height="366" /></a>
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="unit-body">
                                                                                                                            <div
                                                                                                                                class="product-big-body">
                                                                                                                                <h5
                                                                                                                                    class="product-big-title">
                                                                                                                                    <a
                                                                                                                                        href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                                                                </h5>
                                                                                                                                <p
                                                                                                                                    class="product-big-text">
                                                                                                                                    <?php echo $ln['descricao']; ?>
                                                                                                                                </p>
                                                                                                                                <p
                                                                                                                                    class="product-big-text">
                                                                                                                                    💳
                                                                                                                                    Em
                                                                                                                                    6
                                                                                                                                    parcelas
                                                                                                                                    de
                                                                                                                                    <?php $numero = $ln['valor'] / 6;
                                                                                                                                        echo number_format($numero, 2, ",", "."); ?>
                                                                                                                                    reais
                                                                                                                                </p>
                                                                                                                                <a class="button button-black-outline button-ujarak"
                                                                                                                                    href="pacote1.php">Comprar</a>
                                                                                                                                <div
                                                                                                                                    class="product-big-price-wrap">
                                                                                                                                    <span
                                                                                                                                        class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <?php } ?>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </article>
                                                                                                            </div>


                                                                                                            <div
                                                                                                                class="row row-sm row-40 row-md-50">
                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-12 wow fadeInRight">
                                                                                                                    <div
                                                                                                                        class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                                                                        <!-- Product Big-->
                                                                                                                        <article
                                                                                                                            class="product-big">
                                                                                                                            <?php
                                                                                                                            $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '12' and disponivel = 'S'") or die($mysqli->error);

                                                                                                                            $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '12'");
                                                                                                                            while ($ln = mysqli_fetch_assoc($result)) {
                                                                                                                            ?>
                                                                                                                            <div
                                                                                                                                class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                                                                <div
                                                                                                                                    class="unit-left">
                                                                                                                                    <a class="product-big-figure"
                                                                                                                                        href="Pacote2.php"><img
                                                                                                                                            src="images/fiji.jpg"
                                                                                                                                            alt=""
                                                                                                                                            width="600"
                                                                                                                                            height="366" /></a>
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="unit-body">
                                                                                                                                    <div
                                                                                                                                        class="product-big-body">
                                                                                                                                        <h5
                                                                                                                                            class="product-big-title">
                                                                                                                                            <a
                                                                                                                                                href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                                                                        </h5>
                                                                                                                                        <p
                                                                                                                                            class="product-big-text">
                                                                                                                                            <?php echo $ln['descricao']; ?>
                                                                                                                                        </p>
                                                                                                                                        <p
                                                                                                                                            class="product-big-text">
                                                                                                                                            💳
                                                                                                                                            Em
                                                                                                                                            6
                                                                                                                                            parcelas
                                                                                                                                            de
                                                                                                                                            <?php $numero = $ln['valor'] / 6;
                                                                                                                                                echo number_format($numero, 2, ",", "."); ?>
                                                                                                                                            reais
                                                                                                                                        </p>
                                                                                                                                        <a class="button button-black-outline button-ujarak"
                                                                                                                                            href="pacote1.php">Comprar</a>
                                                                                                                                        <div
                                                                                                                                            class="product-big-price-wrap">
                                                                                                                                            <span
                                                                                                                                                class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <?php } ?>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </article>
                                                                                                                    </div>


                                                                                                                    <div
                                                                                                                        class="row row-sm row-40 row-md-50">
                                                                                                                        <div
                                                                                                                            class="col-sm-6 col-md-12 wow fadeInRight">
                                                                                                                            <div
                                                                                                                                class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                                                                                <!-- Product Big-->
                                                                                                                                <article
                                                                                                                                    class="product-big">
                                                                                                                                    <?php
                                                                                                                                    $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '13' and disponivel = 'S'") or die($mysqli->error);

                                                                                                                                    $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '13'");
                                                                                                                                    while ($ln = mysqli_fetch_assoc($result)) {
                                                                                                                                    ?>
                                                                                                                                    <div
                                                                                                                                        class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                                                                        <div
                                                                                                                                            class="unit-left">
                                                                                                                                            <a class="product-big-figure"
                                                                                                                                                href="Pacote2.php"><img
                                                                                                                                                    src="images/grecia.png"
                                                                                                                                                    alt=""
                                                                                                                                                    width="600"
                                                                                                                                                    height="366" /></a>
                                                                                                                                        </div>
                                                                                                                                        <div
                                                                                                                                            class="unit-body">
                                                                                                                                            <div
                                                                                                                                                class="product-big-body">
                                                                                                                                                <h5
                                                                                                                                                    class="product-big-title">
                                                                                                                                                    <a
                                                                                                                                                        href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                                                                                </h5>
                                                                                                                                                <p
                                                                                                                                                    class="product-big-text">
                                                                                                                                                    <?php echo $ln['descricao']; ?>
                                                                                                                                                </p>
                                                                                                                                                <p
                                                                                                                                                    class="product-big-text">
                                                                                                                                                    💳
                                                                                                                                                    Em
                                                                                                                                                    6
                                                                                                                                                    parcelas
                                                                                                                                                    de
                                                                                                                                                    <?php $numero = $ln['valor'] / 6;
                                                                                                                                                        echo number_format($numero, 2, ",", "."); ?>
                                                                                                                                                    reais
                                                                                                                                                </p>
                                                                                                                                                <a class="button button-black-outline button-ujarak"
                                                                                                                                                    href="pacote1.php">Comprar</a>
                                                                                                                                                <div
                                                                                                                                                    class="product-big-price-wrap">
                                                                                                                                                    <span
                                                                                                                                                        class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <?php } ?>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </article>
                                                                                                                            </div>



                                                                                                                            <div
                                                                                                                                class="row row-sm row-40 row-md-50">
                                                                                                                                <div
                                                                                                                                    class="col-sm-6 col-md-12 wow fadeInRight">
                                                                                                                                    <div
                                                                                                                                        class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                                                                                        <!-- Product Big-->
                                                                                                                                        <article
                                                                                                                                            class="product-big">
                                                                                                                                            <?php
                                                                                                                                            $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '14' and disponivel = 'S'") or die($mysqli->error);

                                                                                                                                            $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '14'");
                                                                                                                                            while ($ln = mysqli_fetch_assoc($result)) {
                                                                                                                                            ?>
                                                                                                                                            <div
                                                                                                                                                class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                                                                                <div
                                                                                                                                                    class="unit-left">
                                                                                                                                                    <a class="product-big-figure"
                                                                                                                                                        href="Pacote2.php"><img
                                                                                                                                                            src="images/finlandia.jpg"
                                                                                                                                                            alt=""
                                                                                                                                                            width="600"
                                                                                                                                                            height="366" /></a>
                                                                                                                                                </div>
                                                                                                                                                <div
                                                                                                                                                    class="unit-body">
                                                                                                                                                    <div
                                                                                                                                                        class="product-big-body">
                                                                                                                                                        <h5
                                                                                                                                                            class="product-big-title">
                                                                                                                                                            <a
                                                                                                                                                                href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                                                                                        </h5>
                                                                                                                                                        <p
                                                                                                                                                            class="product-big-text">
                                                                                                                                                            <?php echo $ln['descricao']; ?>
                                                                                                                                                        </p>
                                                                                                                                                        <p
                                                                                                                                                            class="product-big-text">
                                                                                                                                                            💳
                                                                                                                                                            Em
                                                                                                                                                            6
                                                                                                                                                            parcelas
                                                                                                                                                            de
                                                                                                                                                            <?php $numero = $ln['valor'] / 6;
                                                                                                                                                                echo number_format($numero, 2, ",", "."); ?>
                                                                                                                                                            reais
                                                                                                                                                        </p>
                                                                                                                                                        <a class="button button-black-outline button-ujarak"
                                                                                                                                                            href="pacote1.php">Comprar</a>
                                                                                                                                                        <div
                                                                                                                                                            class="product-big-price-wrap">
                                                                                                                                                            <span
                                                                                                                                                                class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <?php } ?>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </article>
                                                                                                                                    </div>




                                                                                                                                    <div
                                                                                                                                        class="row row-sm row-40 row-md-50">
                                                                                                                                        <div
                                                                                                                                            class="col-sm-6 col-md-12 wow fadeInRight">
                                                                                                                                            <div
                                                                                                                                                class="col-sm-6 col-md-12 wow fadeInLeft">
                                                                                                                                                <!-- Product Big-->
                                                                                                                                                <article
                                                                                                                                                    class="product-big">
                                                                                                                                                    <?php
                                                                                                                                                    $result = $mysqli->query(" SELECT * FROM `pacotes` where `codigo` = '15' and disponivel = 'S'") or die($mysqli->error);

                                                                                                                                                    $mysqli_result = (" SELECT * FROM `pacotes` where `codigo` = '15'");
                                                                                                                                                    while ($ln = mysqli_fetch_assoc($result)) {
                                                                                                                                                    ?>
                                                                                                                                                    <div
                                                                                                                                                        class="unit flex-column flex-md-row align-items-md-stretch">
                                                                                                                                                        <div
                                                                                                                                                            class="unit-left">
                                                                                                                                                            <a class="product-big-figure"
                                                                                                                                                                href="Pacote2.php"><img
                                                                                                                                                                    src="images/bali.jpg"
                                                                                                                                                                    alt=""
                                                                                                                                                                    width="600"
                                                                                                                                                                    height="366" /></a>
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="unit-body">
                                                                                                                                                            <div
                                                                                                                                                                class="product-big-body">
                                                                                                                                                                <h5
                                                                                                                                                                    class="product-big-title">
                                                                                                                                                                    <a
                                                                                                                                                                        href="pacote1.php"><?php echo $ln['nome'] ?></a>
                                                                                                                                                                </h5>
                                                                                                                                                                <p
                                                                                                                                                                    class="product-big-text">
                                                                                                                                                                    <?php echo $ln['descricao']; ?>
                                                                                                                                                                </p>
                                                                                                                                                                <p
                                                                                                                                                                    class="product-big-text">
                                                                                                                                                                    💳
                                                                                                                                                                    Em
                                                                                                                                                                    6
                                                                                                                                                                    parcelas
                                                                                                                                                                    de
                                                                                                                                                                    <?php $numero = $ln['valor'] / 6;
                                                                                                                                                                        echo number_format($numero, 2, ",", "."); ?>
                                                                                                                                                                    reais
                                                                                                                                                                </p>
                                                                                                                                                                <a class="button button-black-outline button-ujarak"
                                                                                                                                                                    href="pacote1.php">Comprar</a>
                                                                                                                                                                <div
                                                                                                                                                                    class="product-big-price-wrap">
                                                                                                                                                                    <span
                                                                                                                                                                        class="product-big-price"><?php echo $ln['valor']; ?></span>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                            <?php } ?>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </article>
                                                                                                                                            </div>


                                                                                                                                            <section
                                                                                                                                                class="section section-sm">
                                                                                                                                                <div
                                                                                                                                                    class="container">
                                                                                                                                                    <h3
                                                                                                                                                        class="title-block find-car oh">
                                                                                                                                                        <span
                                                                                                                                                            class="d-inline-block wow slideInUp">Different
                                                                                                                                                            People
                                                                                                                                                            —
                                                                                                                                                            One
                                                                                                                                                            Mission</span>
                                                                                                                                                    </h3>
                                                                                                                                                    <div
                                                                                                                                                        class="row row-30 justify-content-center box-ordered">
                                                                                                                                                        <div
                                                                                                                                                            class="col-sm-6 col-md-5 col-lg-3">
                                                                                                                                                            <!-- Team Modern-->
                                                                                                                                                            <article
                                                                                                                                                                class="team-modern">
                                                                                                                                                                <div
                                                                                                                                                                    class="team-modern-header">
                                                                                                                                                                    <a class="team-modern-figure"
                                                                                                                                                                        href="#"><img
                                                                                                                                                                            class="img-circles"
                                                                                                                                                                            src="images/user-1-118x118.jpg"
                                                                                                                                                                            alt=""
                                                                                                                                                                            width="118"
                                                                                                                                                                            height="118" /></a>
                                                                                                                                                                    <svg x="0px"
                                                                                                                                                                        y="0px"
                                                                                                                                                                        width="270px"
                                                                                                                                                                        height="70px"
                                                                                                                                                                        viewbox="0 0 270 70"
                                                                                                                                                                        enable-background="new 0 0 270 70"
                                                                                                                                                                        xml:space="preserve">
                                                                                                                                                                        <g>
                                                                                                                                                                            <path
                                                                                                                                                                                fill="#161616"
                                                                                                                                                                                d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z">
                                                                                                                                                                            </path>
                                                                                                                                                                        </g>
                                                                                                                                                                    </svg>
                                                                                                                                                                </div>
                                                                                                                                                                <div
                                                                                                                                                                    class="team-modern-caption">
                                                                                                                                                                    <h6
                                                                                                                                                                        class="team-modern-name">
                                                                                                                                                                        <a
                                                                                                                                                                            href="#">Diana
                                                                                                                                                                            Robinson</a>
                                                                                                                                                                    </h6>
                                                                                                                                                                    <p
                                                                                                                                                                        class="team-modern-status">
                                                                                                                                                                        Founder,
                                                                                                                                                                        Owner
                                                                                                                                                                    </p>
                                                                                                                                                                    <h6
                                                                                                                                                                        class="team-modern-phone">
                                                                                                                                                                        <a
                                                                                                                                                                            href="tel:#">+1
                                                                                                                                                                            323-913-4688</a>
                                                                                                                                                                    </h6>
                                                                                                                                                                </div>
                                                                                                                                                            </article>
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="col-sm-6 col-md-5 col-lg-3">
                                                                                                                                                            <!-- Team Modern-->
                                                                                                                                                            <article
                                                                                                                                                                class="team-modern">
                                                                                                                                                                <div
                                                                                                                                                                    class="team-modern-header">
                                                                                                                                                                    <a class="team-modern-figure"
                                                                                                                                                                        href="#"><img
                                                                                                                                                                            class="img-circles"
                                                                                                                                                                            src="images/user-2-118x118.jpg"
                                                                                                                                                                            alt=""
                                                                                                                                                                            width="118"
                                                                                                                                                                            height="118" /></a>
                                                                                                                                                                    <svg x="0px"
                                                                                                                                                                        y="0px"
                                                                                                                                                                        width="270px"
                                                                                                                                                                        height="70px"
                                                                                                                                                                        viewbox="0 0 270 70"
                                                                                                                                                                        enable-background="new 0 0 270 70"
                                                                                                                                                                        xml:space="preserve">
                                                                                                                                                                        <g>
                                                                                                                                                                            <path
                                                                                                                                                                                fill="#161616"
                                                                                                                                                                                d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z">
                                                                                                                                                                            </path>
                                                                                                                                                                        </g>
                                                                                                                                                                    </svg>
                                                                                                                                                                </div>
                                                                                                                                                                <div
                                                                                                                                                                    class="team-modern-caption">
                                                                                                                                                                    <h6
                                                                                                                                                                        class="team-modern-name">
                                                                                                                                                                        <a
                                                                                                                                                                            href="#">Peter
                                                                                                                                                                            McMillan</a>
                                                                                                                                                                    </h6>
                                                                                                                                                                    <p
                                                                                                                                                                        class="team-modern-status">
                                                                                                                                                                        Travel
                                                                                                                                                                        Agent
                                                                                                                                                                    </p>
                                                                                                                                                                    <h6
                                                                                                                                                                        class="team-modern-phone">
                                                                                                                                                                        <a
                                                                                                                                                                            href="tel:#">+1
                                                                                                                                                                            323-913-4688</a>
                                                                                                                                                                    </h6>
                                                                                                                                                                </div>
                                                                                                                                                            </article>
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="col-sm-6 col-md-5 col-lg-3">
                                                                                                                                                            <!-- Team Modern-->
                                                                                                                                                            <article
                                                                                                                                                                class="team-modern">
                                                                                                                                                                <div
                                                                                                                                                                    class="team-modern-header">
                                                                                                                                                                    <a class="team-modern-figure"
                                                                                                                                                                        href="#"><img
                                                                                                                                                                            class="img-circles"
                                                                                                                                                                            src="images/user-3-118x118.jpg"
                                                                                                                                                                            alt=""
                                                                                                                                                                            width="118"
                                                                                                                                                                            height="118" /></a>
                                                                                                                                                                    <svg x="0px"
                                                                                                                                                                        y="0px"
                                                                                                                                                                        width="270px"
                                                                                                                                                                        height="70px"
                                                                                                                                                                        viewbox="0 0 270 70"
                                                                                                                                                                        enable-background="new 0 0 270 70"
                                                                                                                                                                        xml:space="preserve">
                                                                                                                                                                        <g>
                                                                                                                                                                            <path
                                                                                                                                                                                fill="#161616"
                                                                                                                                                                                d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z">
                                                                                                                                                                            </path>
                                                                                                                                                                        </g>
                                                                                                                                                                    </svg>
                                                                                                                                                                </div>
                                                                                                                                                                <div
                                                                                                                                                                    class="team-modern-caption">
                                                                                                                                                                    <h6
                                                                                                                                                                        class="team-modern-name">
                                                                                                                                                                        <a
                                                                                                                                                                            href="#">Jill
                                                                                                                                                                            Peterson</a>
                                                                                                                                                                    </h6>
                                                                                                                                                                    <p
                                                                                                                                                                        class="team-modern-status">
                                                                                                                                                                        Tour
                                                                                                                                                                        Consultant
                                                                                                                                                                    </p>
                                                                                                                                                                    <h6
                                                                                                                                                                        class="team-modern-phone">
                                                                                                                                                                        <a
                                                                                                                                                                            href="tel:#">+1
                                                                                                                                                                            323-913-4688</a>
                                                                                                                                                                    </h6>
                                                                                                                                                                </div>
                                                                                                                                                            </article>
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="col-sm-6 col-md-5 col-lg-3">
                                                                                                                                                            <!-- Team Modern-->
                                                                                                                                                            <article
                                                                                                                                                                class="team-modern">
                                                                                                                                                                <div
                                                                                                                                                                    class="team-modern-header">
                                                                                                                                                                    <a class="team-modern-figure"
                                                                                                                                                                        href="#"><img
                                                                                                                                                                            class="img-circles"
                                                                                                                                                                            src="images/user-4-118x118.jpg"
                                                                                                                                                                            alt=""
                                                                                                                                                                            width="118"
                                                                                                                                                                            height="118" /></a>
                                                                                                                                                                    <svg x="0px"
                                                                                                                                                                        y="0px"
                                                                                                                                                                        width="270px"
                                                                                                                                                                        height="70px"
                                                                                                                                                                        viewbox="0 0 270 70"
                                                                                                                                                                        enable-background="new 0 0 270 70"
                                                                                                                                                                        xml:space="preserve">
                                                                                                                                                                        <g>
                                                                                                                                                                            <path
                                                                                                                                                                                fill="#161616"
                                                                                                                                                                                d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z">
                                                                                                                                                                            </path>
                                                                                                                                                                        </g>
                                                                                                                                                                    </svg>
                                                                                                                                                                </div>
                                                                                                                                                                <div
                                                                                                                                                                    class="team-modern-caption">
                                                                                                                                                                    <h6
                                                                                                                                                                        class="team-modern-name">
                                                                                                                                                                        <a
                                                                                                                                                                            href="#">James
                                                                                                                                                                            Smith</a>
                                                                                                                                                                    </h6>
                                                                                                                                                                    <p
                                                                                                                                                                        class="team-modern-status">
                                                                                                                                                                        PR
                                                                                                                                                                        Manager
                                                                                                                                                                    </p>
                                                                                                                                                                    <h6
                                                                                                                                                                        class="team-modern-phone">
                                                                                                                                                                        <a
                                                                                                                                                                            href="tel:#">+1
                                                                                                                                                                            323-913-4688</a>
                                                                                                                                                                    </h6>
                                                                                                                                                                </div>
                                                                                                                                                            </article>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </section>
                                                                                                                                            <!-- Section Subscribe-->
                                                                                                                                            <section
                                                                                                                                                class="section bg-default text-center offset-top-50">
                                                                                                                                                <div class="parallax-container"
                                                                                                                                                    data-parallax-img="images/parallax-1-1920x850.jpg">
                                                                                                                                                    <div
                                                                                                                                                        class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-2-21">
                                                                                                                                                        <div
                                                                                                                                                            class="container">
                                                                                                                                                            <h2
                                                                                                                                                                class="heading-2 oh font-weight-normal wow slideInDown">
                                                                                                                                                                <span
                                                                                                                                                                    class="d-block font-weight-semi-bold">First-class
                                                                                                                                                                    Impressions</span><span
                                                                                                                                                                    class="d-block font-weight-light">are
                                                                                                                                                                    Waiting
                                                                                                                                                                    for
                                                                                                                                                                    You!</span>
                                                                                                                                                            </h2>
                                                                                                                                                            <p class="text-width-medium text-spacing-75 wow fadeInLeft"
                                                                                                                                                                data-wow-delay=".1s">
                                                                                                                                                                Our
                                                                                                                                                                agency
                                                                                                                                                                offers
                                                                                                                                                                travelers
                                                                                                                                                                various
                                                                                                                                                                tours
                                                                                                                                                                and
                                                                                                                                                                excursions
                                                                                                                                                                with
                                                                                                                                                                destinations
                                                                                                                                                                all
                                                                                                                                                                over
                                                                                                                                                                the
                                                                                                                                                                world.
                                                                                                                                                                Browse
                                                                                                                                                                our
                                                                                                                                                                website
                                                                                                                                                                to
                                                                                                                                                                find
                                                                                                                                                                your
                                                                                                                                                                dream
                                                                                                                                                                tour!
                                                                                                                                                            </p>
                                                                                                                                                            <a class="button button-secondary button-pipaluk"
                                                                                                                                                                href="#">Book
                                                                                                                                                                a
                                                                                                                                                                Tour
                                                                                                                                                                Now</a>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </section>
                                                                                                                                            <!--	Instagrram wondertour-->
                                                                                                                                            <section
                                                                                                                                                class="section section-sm section-top-0 section-fluid section-relative bg-gray-4">
                                                                                                                                                <div
                                                                                                                                                    class="container-fluid">
                                                                                                                                                    <h6
                                                                                                                                                        class="gallery-title">
                                                                                                                                                        Gallery
                                                                                                                                                    </h6>
                                                                                                                                                    <!-- Owl Carousel-->
                                                                                                                                                    <div class="owl-carousel owl-classic owl-dots-secondary"
                                                                                                                                                        data-items="1"
                                                                                                                                                        data-sm-items="2"
                                                                                                                                                        data-md-items="3"
                                                                                                                                                        data-lg-items="4"
                                                                                                                                                        data-xl-items="5"
                                                                                                                                                        data-xxl-items="6"
                                                                                                                                                        data-stage-padding="15"
                                                                                                                                                        data-xxl-stage-padding="0"
                                                                                                                                                        data-margin="30"
                                                                                                                                                        data-autoplay="true"
                                                                                                                                                        data-nav="true"
                                                                                                                                                        data-dots="true">
                                                                                                                                                        <!-- Thumbnail Classic-->
                                                                                                                                                        <article
                                                                                                                                                            class="thumbnail thumbnail-mary">
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-figure">
                                                                                                                                                                <img src="images/gallery-image-1-270x195.jpg"
                                                                                                                                                                    alt=""
                                                                                                                                                                    width="270"
                                                                                                                                                                    height="195" />
                                                                                                                                                            </div>
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-caption">
                                                                                                                                                                <a class="icon fl-bigmug-line-zoom60"
                                                                                                                                                                    href="images/gallery-image-1-1200x800-original.jpg"
                                                                                                                                                                    data-lightgallery="item"><img
                                                                                                                                                                        src="images/gallery-image-1-270x195.jpg"
                                                                                                                                                                        alt=""
                                                                                                                                                                        width="270"
                                                                                                                                                                        height="195" /></a>
                                                                                                                                                            </div>
                                                                                                                                                        </article>
                                                                                                                                                        <!-- Thumbnail Classic-->
                                                                                                                                                        <article
                                                                                                                                                            class="thumbnail thumbnail-mary">
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-figure">
                                                                                                                                                                <img src="images/gallery-image-2-270x195.jpg"
                                                                                                                                                                    alt=""
                                                                                                                                                                    width="270"
                                                                                                                                                                    height="195" />
                                                                                                                                                            </div>
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-caption">
                                                                                                                                                                <a class="icon fl-bigmug-line-zoom60"
                                                                                                                                                                    href="images/gallery-image-2-1200x800-original.jpg"
                                                                                                                                                                    data-lightgallery="item"><img
                                                                                                                                                                        src="images/gallery-image-2-270x195.jpg"
                                                                                                                                                                        alt=""
                                                                                                                                                                        width="270"
                                                                                                                                                                        height="195" /></a>
                                                                                                                                                            </div>
                                                                                                                                                        </article>
                                                                                                                                                        <!-- Thumbnail Classic-->
                                                                                                                                                        <article
                                                                                                                                                            class="thumbnail thumbnail-mary">
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-figure">
                                                                                                                                                                <img src="images/gallery-image-3-270x195.jpg"
                                                                                                                                                                    alt=""
                                                                                                                                                                    width="270"
                                                                                                                                                                    height="195" />
                                                                                                                                                            </div>
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-caption">
                                                                                                                                                                <a class="icon fl-bigmug-line-zoom60"
                                                                                                                                                                    href="images/gallery-image-3-1200x800-original.jpg"
                                                                                                                                                                    data-lightgallery="item"><img
                                                                                                                                                                        src="images/gallery-image-3-270x195.jpg"
                                                                                                                                                                        alt=""
                                                                                                                                                                        width="270"
                                                                                                                                                                        height="195" /></a>
                                                                                                                                                            </div>
                                                                                                                                                        </article>
                                                                                                                                                        <!-- Thumbnail Classic-->
                                                                                                                                                        <article
                                                                                                                                                            class="thumbnail thumbnail-mary">
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-figure">
                                                                                                                                                                <img src="images/gallery-image-4-270x195.jpg"
                                                                                                                                                                    alt=""
                                                                                                                                                                    width="270"
                                                                                                                                                                    height="195" />
                                                                                                                                                            </div>
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-caption">
                                                                                                                                                                <a class="icon fl-bigmug-line-zoom60"
                                                                                                                                                                    href="images/gallery-image-4-1200x800-original.jpg"
                                                                                                                                                                    data-lightgallery="item"><img
                                                                                                                                                                        src="images/gallery-image-4-270x195.jpg"
                                                                                                                                                                        alt=""
                                                                                                                                                                        width="270"
                                                                                                                                                                        height="195" /></a>
                                                                                                                                                            </div>
                                                                                                                                                        </article>
                                                                                                                                                        <!-- Thumbnail Classic-->
                                                                                                                                                        <article
                                                                                                                                                            class="thumbnail thumbnail-mary">
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-figure">
                                                                                                                                                                <img src="images/gallery-image-5-270x195.jpg"
                                                                                                                                                                    alt=""
                                                                                                                                                                    width="270"
                                                                                                                                                                    height="195" />
                                                                                                                                                            </div>
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-caption">
                                                                                                                                                                <a class="icon fl-bigmug-line-zoom60"
                                                                                                                                                                    href="images/gallery-image-5-1200x800-original.jpg"
                                                                                                                                                                    data-lightgallery="item"><img
                                                                                                                                                                        src="images/gallery-image-5-270x195.jpg"
                                                                                                                                                                        alt=""
                                                                                                                                                                        width="270"
                                                                                                                                                                        height="195" /></a>
                                                                                                                                                            </div>
                                                                                                                                                        </article>
                                                                                                                                                        <!-- Thumbnail Classic-->
                                                                                                                                                        <article
                                                                                                                                                            class="thumbnail thumbnail-mary">
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-figure">
                                                                                                                                                                <img src="images/gallery-image-6-270x195.jpg"
                                                                                                                                                                    alt=""
                                                                                                                                                                    width="270"
                                                                                                                                                                    height="195" />
                                                                                                                                                            </div>
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-caption">
                                                                                                                                                                <a class="icon fl-bigmug-line-zoom60"
                                                                                                                                                                    href="images/gallery-image-6-1200x800-original.jpg"
                                                                                                                                                                    data-lightgallery="item"><img
                                                                                                                                                                        src="images/gallery-image-6-270x195.jpg"
                                                                                                                                                                        alt=""
                                                                                                                                                                        width="270"
                                                                                                                                                                        height="195" /></a>
                                                                                                                                                            </div>
                                                                                                                                                        </article>
                                                                                                                                                        <!-- Thumbnail Classic-->
                                                                                                                                                        <article
                                                                                                                                                            class="thumbnail thumbnail-mary">
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-figure">
                                                                                                                                                                <img src="images/gallery-image-7-270x195.jpg"
                                                                                                                                                                    alt=""
                                                                                                                                                                    width="270"
                                                                                                                                                                    height="195" />
                                                                                                                                                            </div>
                                                                                                                                                            <div
                                                                                                                                                                class="thumbnail-mary-caption">
                                                                                                                                                                <a class="icon fl-bigmug-line-zoom60"
                                                                                                                                                                    href="images/gallery-image-7-1200x800-original.jpg"
                                                                                                                                                                    data-lightgallery="item"><img
                                                                                                                                                                        src="images/gallery-image-7-270x195.jpg"
                                                                                                                                                                        alt=""
                                                                                                                                                                        width="270"
                                                                                                                                                                        height="195" /></a>
                                                                                                                                                            </div>
                                                                                                                                                        </article>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </section>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>

            </section>
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="index.html"><img src="images/logo.png" alt="" class="img-fluid logo-footer"></a>


                        </div>
                        <div class="col-md-3">
                            <div class="useful-link">
                                <h2>Links Rápidos</h2>
                                <br>
                                <div class="use-links">
                                    <li><a href="index.html"><i class="icon fa fa-home"></i>Home </a></li>
                                    <li><a href="about.html"><i class="icon fa fa-info-circle"></i>Sobre nós </a></li>
                                    <li><a href="pacotes.html"><i class="icon fa fa-suitcase "></i>Pacotes</a></li>
                                    <li><a href="login.html"><i class="icon fa fa-shopping-cart "></i>Carrinho</a>
                                    </li>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="social-links">
                                <h2>Redes sociais</h2>
                                <img src="./assets/images/about/home_line.png" alt="">
                                <div class="social-icons">
                                    <li><a href=""><i class="icon fa fa-facebook-f"></i> Facebook</a></li>
                                    <li><a href=""><i class="icon fa fa-instagram"></i> Instagram</a></li>
                                    <li><a href=""><i class="icon fa fa-linkedin"></i> Linkedin</a></li>
                                </div>
                            </div>

                            <br>
                        </div>
                        <div class="col-md-3">
                            <div class="address">
                                <h2>Contato</h2>
                                <br>
                                <div class="address-links">
                                    <li class="address1"><a href="https://encurtador.com.br/prR18"><i
                                                class="icon fa fa-location-arrow">
                                            </i>Avenida Cásper Líbero, 204 - Centro - SP</a></li>
                                    <li><a href="tel:#"><i class="icon fa fa-phone"></i> +55 (11) 9 84465-9843</a></li>
                                    <li><a href="mailto:#"><i class="icon fa fa-envelope"></i>contato@agviagens.com</a>
                                    </li>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
            <!-- Global Mailform Output-->
            <div class="snackbars" id="form-output-global"></div>
            <!-- Javascript-->
            <script src="js/core.min.js"></script>

            <script src="js/script.js"></script>
</body>

</html>