<?php
session_start();

$postLogin = $_POST["login"];
$postSenha = $_POST["senha"];

$login = array("admin");
$senha = array("0123");

$tamArray = count($login);

$msg = FALSE;

for ($i = 0; $i < $tamArray; $i++) {
  if ($postLogin == $login[$i] && $postSenha == $senha[$i]) {
    $msg = TRUE;
    break;
  }
}

if ($msg) {
  $_SESSION["logado"] = TRUE;
  $_SESSION["user"] = $postLogin;

  header("Location: ../eventos/lista.php");
} else {
  header("Location: ../login.php?error=1");
}
