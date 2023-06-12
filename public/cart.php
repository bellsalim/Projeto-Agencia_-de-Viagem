<?php
session_start();

include_once '../DataBase/conexao.php';
include_once '../App/Controller/ClienteController.php';

$conn = new Conexao();
$conn = $conn->conexao();

$user = new ClienteController();
$result = $user->isLoggedIn();

$stmt4 = $conn->prepare('
		SELECT * FROM carrinho_has_pacote;');
$stmt4->execute();
$count = 0;
$count = $stmt4->rowCount();

if ($result == false) {
	header('Location: login.php');
}

$cpf = $_SESSION["user_cpf"];
$stmt = $conn->prepare('
		SELECT pacotes.nome, pacotes.valor, pacotes.data_ida,pacotes.data_volta, pacotes.descricao, pacotes.codigo FROM pacotes 

		INNER JOIN
			(SELECT carrinho_has_pacote.pacotes_codigo FROM carrinho_has_pacote
				INNER JOIN pacotes ON carrinho_has_pacote.pacotes_codigo = pacotes.codigo
				INNER JOIN carrinho ON carrinho_has_pacote.carrinho_idcarrinho = carrinho.idcarrinho 
		        WHERE carrinho.cliente_cpf = "' . $cpf . '"
			GROUP BY carrinho_has_pacote.pacotes_codigo) as gerou 

		ON pacotes.codigo = gerou.pacotes_codigo
    	GROUP BY pacotes.nome;');

$total = 0;
$stmt->execute();

$resultado_carrinho = $stmt->fetchAll();
?>

<!DOCTYPE HTML>
<html>
<html class="wide wow-animation" lang="pt-br">

<head>
	<title>Nossos Pacotes</title>
	<script src="https://unpkg.com/feather-icons@4.29.0/dist/feather.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<link rel="icon" href="images/icon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Stylesheets-->

	<script src="https://unpkg.com/feather-icons"></script>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
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
					<nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
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
							<div class="rd-navbar-main-outer">
								<div class="rd-navbar-main">
									<div class="rd-navbar-nav-wrap">
										<ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
										</ul>
										<!-- RD Navbar Nav-->
										<div align="left">
											<ul class="rd-navbar-nav">
												<li class="rd-nav-item "><a class="rd-nav-link" href="index.php"><i class="icon fa fa-home"></i> Home</a>
												</li>
												<li class="rd-nav-item "><a class="rd-nav-link" href="login.php"> <i class="icon fa fa-user-circle"></i> login </a>
												</li>

												<li class="rd-nav-item "><a class="rd-nav-link" href="viagens.php"><i class="icon fa fa-suitcase "></i>
														Pacotes</a>
												</li>
												<li class="rd-nav-item active"><a class="rd-nav-link" href="cart.php"><i class="icon fa fa-shopping-cart "></i> Carrinho</a>

												</li>
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




			<aside id="colorlib-hero" class="breadcrumbs">
				<div class="flexslider">
					<ul class="slides">
						<li style="background-image: url(images/3.jpg);">
							<div class="overlay"></div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
										<div class="slider-text-inner text-center">
											<h1>Carrinho de compras</h1>
											<h2 class="bread"><span><a href="index.php">Home</a></span><span>Carrinho de
													compras</span></h2>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</aside>

			<div class="colorlib-shop">
				<div class="container">
					<div class="row row-pb-md">
						<div class="col-md-10 col-md-offset-1">
							<div class="process-wrap">
								<div class="process text-center active">
									<p><span>01</span></p>
									<h3>Carrinho de compras</h3>
								</div>
								<div class="process text-center">
									<p><span>02</span></p>
									<h3> Pagamento </h3>
								</div>
								<div class="process text-center">
									<p><span>03</span></p>
									<h3>Finalizado</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-pb-md">
						<div class="col-md-10 col-md-offset-1">
							<div class="product-name">
								<div class="one-forth text-center">
									<span>Detalhes dos pacotess</span>
								</div>
								<div class="one-eight text-center">
									<span>Preço</span>
								</div>
								<div class="one-eight text-center">
									<span>Quantidade</span>
								</div>
								<div class="one-eight text-center">
									<span>Total</span>
								</div>
								<div class="one-eight text-center">
									<span>Remover</span>
								</div>
							</div>

							<?php
							$count = 0;
							$total = 0;
							foreach ($resultado_carrinho as $row) {
								echo '
											
								<div class="product-cart">
									<div class="one-forth">
										<div class="product-img" style="background-image: url(images/' . $row[2] . '.jpg);">
										</div>
										<div class="display-tc">
											<h3 id="nome">' . $row[0] . '</h3>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span class="price" for="id_valor" id="id_valor">R$ ' .
									number_format($row[1], 2, ",", ".") . '</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<form method="post" action="../App/Controller/updateQtd.php">
												<input type="number" for="id_quantidade" name="id_quantidade" id="id_quantidade" class="form-control  input-number text-center" value="' . $row[4] . '" min="1" max="100"> 
												<input style="visibility: hidden; width:2%;height:2%;" type="number" name="codigo" value="' . $row[3] . '"> <br>
												<button class="btn btn-primary"> alterar </button>
											</form>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span for="id_total" class="price" id="id_total" name="id_total" >R$ ' . number_format($row[1] * $row[4], 2, ",", ".") . '</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<a href="../App/Controller/delete.php?pacotes=' . $row[3] . '" class="closed" style="background-color: #FFC300"></a>
										</div>
									</div>
								</div>
							';

								$count = $row[1] * $row[4];
								$total = $count + $total;
							}
							?>

						</div>
					</div>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="total-wrap">
								<div class="row">
									<div class="col-md-8">
										<form action="#">
											<div class="row form-group">
											</div>
										</form>
									</div>
									<div class="col-md-3 col-md-push-1 text-center">
										<div class="total">
											<div class="grand-total">
												<p><span><strong>Total:</strong></span> <span>R$ <?php echo number_format($total, 2, ",", ".");
																									?></span></p>
											</div>
										</div>
										<?php
										if ($count == 0) {
											echo '<p><a class="btn btn-primary"   style="opacity: 0.5;
  filter: alpha(opacity=50)"> Proximo </a disabled></p>';
										} else {
											echo '<p><a href="checkout.php?proximo=true&carrinho=true" class="btn btn-primary"> Proximo </a></p>';
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

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
									<li class="address1"><a href="https://encurtador.com.br/prR18"><i class="icon fa fa-location-arrow">
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