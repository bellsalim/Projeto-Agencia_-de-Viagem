<?php
/**
 * Este arquivo retorna todos os pedidos concluidos do cliente.
 */
include_once '../DataBase/conexao.php';

class ListController {

    public static function selectList() {
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare('SELECT pedidoConcluido.nomePacotes, pedidoConcluido.valorPacotes, pedidoConcluido.imagemPacotes, pedidoConcluido.qtdPacotes
        FROM pedidoConcluido 
        WHERE pedidoConcluido.cliente_cpf = "'.$_SESSION["user_cpf"].'";');
        $stmt->execute();
        $pCarrinho = $stmt->fetchAll();
        $stmt = null;
        return $pCarrinho;
    }
}

/*SELECT Pacotes.nome, Pacotes.valor FROM finalizacompra INNER JOIN carrinho ON carrinho.idcarrinho = finalizacompra.carrinho_idcarrinho INNER JOIN carrinho_has_Pacotes ON carrinho.idcarrinho = carrinho_has_Pacotes.carrinho_idcarrinho INNER JOIN Pacotes ON Pacotes.idPacotes = carrinho_has_Pacotes.Pacotes_idPacotes WHERE carrinho.cliente_cpf = "000000";*/
