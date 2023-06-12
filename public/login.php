<?php
session_start();

include_once '../App/Controller/ClienteController.php';

$user = new ClienteController();

$result = $user->isLoggedIn();
if ($result) {
    header('Location: viagens.php');
}

?>

<!DOCTYPE HTML>
<html>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-2">
                            <div id="colorlib-logo"><a href="index.php"></a></div>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <div align="left">
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php"><i
                                                class="icon fa fa-home"></i> Home</a>
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
                    </div>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="container" style="width: 40%;  background-color: #808080;">
                <?php
                include_once    "../public/form-login.php";
                ?>
            </div>
        </div>

    </div>
    </div>

</body>

</html>