<?php
/**
 * Arquivo que retorna todos os pacotes disponiveis do db
 */
include_once '../DataBase/conexao.php';

class PacotesController {

    public static function allPacotes(){
        $conexao = new Conexao();
        $conexao = $conexao->conexao();
        $stmt = $conexao->prepare("SELECT * FROM pacotes;");
        $stmt->execute();
        $pacotes = $stmt->fetchAll();
        $stmt = null;
        return $pacotes;
    }
}
