<?php
include "./includes/conexao.php";

if (isset($_POST["adicionar"])) {
   $nome = $_POST["nome"];
   $data_ida = $_POST["data_ida"];
   $data_volta = $_POST["data_volta"];
   $duracao = $_POST["duracao"];
   $valor = $_POST["valor"];
   $descricao = $_POST["descricao"];
   $disponivel = $_POST["disponivel"];
 


   $mysqli->query("INSERT INTO `pacotes`(`nome`, `data_ida`,`data_volta`, `duracao`, `valor`, `descricao`, `disponivel`) VALUES ('$nome', '$data_ida','$data_volta', '$duracao', '$valor','$descricao','$disponivel')") or die($mysqli->error);
   $conexao = mysqli_connect('localhost', 'root', '', 'agencia');
 
   header("location: lista.php");
   
}

if (isset($_POST["editar"])) {
   $codigo = $_POST["codigo"];
   $nome = $_POST["nome"];
   $data_ida = $_POST["data_ida"];
   $data_volta = $_POST["data_volta"];
   $duracao = $_POST["duracao"];
   $valor = $_POST["valor"];
   $disponivel = $_POST["disponivel"];
   $descricao = $_POST["descricao"];
   

   $mysqli->query("UPDATE `pacotes` SET `nome`='$nome',`data_ida`='$data_ida',`data_volta`='$data_volta',`duracao`= '$duracao', `valor`='$valor', `descricao`='$descricao', `disponivel`='$disponivel' WHERE codigo = $codigo") or die($mysqli->error);

   header("location: lista.php");
}

if (isset($_GET["delete"])) {
   $codigo = $_GET["delete"];
   $mysqli->query("DELETE FROM `pacotes` WHERE codigo = $codigo") or die($mysqli->error);

   header("location: lista.php");
}