<?php
session_start();

if (isset($_GET["exit"])) {
  session_destroy();
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="login.css" rel="stylesheet">
  <title>LOGIN | ADM </title>
</head>

<body>
  <main class="conte">
    <form action="./includes/session.php" method="post" id="form" name="form">
      <h2>Login</h2>
      <hr>
      <input type="text" name="login" id="login" placeholder=" Insira o nome de usuário" />
      <br>
      <br>

      <input type="password" name="senha" id="senha" placeholder=" Entre com a senha" />
      <br>
      <br>

      <input type="submit" value="Concluir ">
    </form>
    <?php
    if (isset($_GET["error"])) {
      echo "<br><strong>Login e/ou senha inválidos!</strong>";
    }
    ?>
  </main>
</body>

</html>