<?php
session_start();
include_once '../../DataBase/conexao.php';
include_once 'ClienteController.php';

$user = new ClienteController();

    $conexao = new Conexao();
    $conexao = $conexao->conexao();

    $stmt = $conexao->prepare('UPDATE pacote SET quantidade = :quantidade WHERE pacotes_codigo = codigo ');
    $stmt->execute( array(
                    ':quantidade' => $_POST['id_quantidade'],
                    ':codigo' => $_POST['codigo']
                    )
                );
    $stmt = null;  


header('Location: ../../template_store/cart.php');
