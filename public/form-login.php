		<?php
		include_once '../DataBase/conexao.php';
		include_once '../App/Controller/ClienteController.php';

		$user = new ClienteController();

		if (isset($_POST['enviar'])) {
			$email = trim($_POST['email']);
			$senha = trim(md5($_POST['senha']));
			if ($user->login($email, $senha)) {
				header('Location: shop.php');
				exit;
			} else {
				echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL= login.php'>
							<script type=\"text/javascript\">
								alert(\"Senha ou email incorretos!\");
							</script>
						";
			}
		}
		?>
		<!DOCTYPE html>
		<html>

		<head>
			<!-- Seus cabeçalhos e estilos aqui -->
		</head>

		<body>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

			<!-- Stylesheets-->
			<form align="center" method="POST" class="colorlib-form" action="">
				<div class="limiter" align="center">

					<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
						<form class="login100-form validate-form" align="center">

							<li class="rd-nav-item active" align="center"><img src="images/LOG0.png" width="150">
							</li>


							<div align="left" class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="email" name="email" class="form-control" placeholder="✉️ Digite seu email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" required>
							</div>

							<div align="left" class="col-md-12">
								<label for="senha">Senha</label>
								<input type="password" id="senha" name="senha" class="form-control" placeholder="🔒 Digite sua senha" required>
							</div>
					</div>
					<div class="flex-c-m">
						<a href="facebook.com" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="twitter.com" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="gmail.com" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>
					<div class="form-group">
						<div align="center">
							<div>

								<label> <a href="../public/cadastro.php"> Cadastre-se </a> </label>
							</div>
							<input class="btn btn-primary" type="submit" name="enviar" style="background-color: #007bff; color: #fff; font-size: 14px; padding: 8px 16px; border: none; border-radius: 4px; width: 100px;">
						</div>
					</div>
				</div>
				</div>
			</form>


			</form>
			</div>
			<div id="dropDownSelect1"></div>
		</body>

		</html>