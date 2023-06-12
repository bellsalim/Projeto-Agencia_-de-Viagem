<?php
include_once '../../DataBase/conexao.php';

class Pacotes {
    private codigo;
    private nome;
    private data_ida;
    private data_volta;
    private duracao;
    private valor;
    private descricao;
    private disponivel;
    private local;
    

    public function getCodigo(){
        return $this->codigo;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome(){
        return $this->nome = $nome;
    }    
    public function getData_ida(){
        return $this->data_ida;
    }
    
    public function getData_ida(){
        return $this->data_ida = $data_ida;
    }   
    public function getData_volta(){
        return $this->data_ida;
    }
    
    public function getData_volta(){
        return $this->data_volta = $data_volta;
    }   
       public function getDuracao(){
        return $this->duracao;
    }
    
    public function setDuracao(){
        return $this->duracao = $duracao;
    }    
    public function getValor(){
        return $this->valor;
    }
        
    public function setValor(){
        return $this->valor = $valor;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setDescricao(){
        return $this->descricao = $descricao;
    }
    public function getDisponivel(){
        return $this->disponivel;
    }
    
    public function setDisponivel(){
        return $this->disponivel = $disponivel;
    }
    public function getLocal(){
        return $this->local;
    }
    
    public function setLocal(){
        return $this->local = $local;
    }

    
}


?>