<?php

	session_start();
	include_once '../../DataBase/conexao.php';
	include_once 'ClienteController.php';

	$user = new ClienteController();

    $conexao = new Conexao();
    $conexao = $conexao->conexao();

    $stmt = $conexao->prepare('DELETE FROM carrinho_has_pacotes WHERE pacotes_codigo = :codigo ');
    $stmt->execute( array(
                    ':codigo' => $_GET['pacotes']
                    )
                );
    $stmt = null;  


header('Location: ../../public/cart.php');
