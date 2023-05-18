<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Editar Pacote</title>
</head>

<body>
    <?php
   include "includes/conexao.php";
   $codigo = $_GET["codigo"];
   $result = $mysqli->query("SELECT * FROM `pacotes` WHERE `codigo` = $codigo") or die($mysqli->error);
   $pacote = $result->fetch_assoc();
   ?>
    <div class="container">
        <div class="modal-header">
            <h5 class="modal-title">Editar pacote</h5>
        </div>
        <form class="form-sm" action="process.php" method="POST">
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label class="form-label" for="nome">ID</label>
                    <input class="form-control" type="text" name="codigo" id="" value="<?php echo $pacote["codigo"]; ?>"
                        readonly>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" id="" value="<?php echo $pacote["nome"]; ?>">
                </div>



                <div class="form-group mb-3">
                    <label class="form-label" for="duracao">Duração</label>
                    <input class="form-control" type="tel" name="duracao" id=""
                        value="<?php echo $pacote["duracao"]; ?>">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="valor_ingresso">Valor</label>
                    <input class="form-control" type="valor_ingresso" name="valor" id=""
                        value="<?php echo $pacote["valor"]; ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="em_cartaz">Data de ida</label>
                    <input class="form-control" type="date" name="data_ida" id=""
                        value="<?php echo $pacote["data_ida"]; ?>">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="em_cartaz">Data de volta</label>
                    <input class="form-control" type="date" name="data_volta" id=""
                        value="<?php echo $pacote["data_volta"]; ?>">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="em_cartaz">descrição</label>
                    <input class="form-control" type="descricao" name="descricao" id=""
                        value="<?php echo $pacote["descricao"]; ?>">
                </div>


                <div class="form-group mb-3">
                    <label class="form-label" for="em_cartaz">disponivel?</label>
                    <input class="form-control" type="disponivel" name="disponivel" id=""
                        value="<?php echo $pacote["disponivel"]; ?>">
                </div>






            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning" name="editar">Editar</button>
            </div>
        </form>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>